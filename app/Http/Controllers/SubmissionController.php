<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Client;
use App\Models\Job;
use App\Models\Submission;
use App\Models\User;
use App\Models\Vendor;
use App\Models\VendorJob;
use App\Models\VendorTmJob;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;

class SubmissionController extends Controller
{
    // public function index()
    // {
    //     if (Auth::user()->user_type == 'admin') {
    //         $submissions = Submission::with([
    //             'vendor' => function ($query) {
    //                 $query->withTrashed();
    //             },
    //             'client' => function ($query) {
    //                 $query->withTrashed();
    //             },
    //             'job' => function ($query) {
    //                 $query->withTrashed();
    //             },
    //             'candidate' => function ($query) {
    //                 $query->withTrashed();
    //             },
    //             'user' => function ($query) {
    //                 $query->withTrashed();
    //             }
    //         ])
    //             ->withTrashed()
    //             ->paginate(6);
    //         // dd($submissions[4]);
    //     } else if (Auth::user()->user_type == 'vendor') {
    //         $vendor_id = Auth::user()->vendor_id;
    //         $submissions = Submission::with('vendor', 'client', 'job', 'candidate')->where('vendor_id', $vendor_id)->withTrashed()->paginate(6);
    //     } else if (Auth::user()->user_type == 'vendor team member') {
    //         $user_id = Auth::user()->vendor_id;
    //         $vendor = User::where('id', $user_id)->first();
    //         $vendor_id = $vendor->vendor_id;
    //         $submissions = Submission::with('vendor', 'client', 'job', 'candidate')->where('vendor_id', $vendor_id)->withTrashed()->paginate(6);
    //     }
    //     dd($submissions);
    //     return view('submission.index', compact('submissions'));
    // }
    public function index()
    {
        $submissions = Submission::with([
            'vendor' => function ($query) {
                $query->withTrashed();
            },
            'client' => function ($query) {
                $query->withTrashed();
            },
            'job' => function ($query) {
                $query->withTrashed();
            },
            'candidate' => function ($query) {
                $query->withTrashed();
            },
            'user' => function ($query) {
                $query->withTrashed();
            }
        ])
            ->when(Auth::user()->user_type == 'vendor', function ($query) {
                $vendor_id = Auth::user()->vendor_id;
                $query->where('vendor_id', $vendor_id);
            })
            ->when(Auth::user()->user_type == 'vendor team member', function ($query) {
                $user_id = Auth::user()->vendor_id;
                $vendor = User::where('id', $user_id)->first();
                $vendor_id = $vendor->vendor_id;
                $query->where('vendor_id', $vendor_id);
            })
            ->withTrashed()
            ->paginate(6);
        return view('submission.index', compact('submissions'));
    }

    public function show(Submission $submission)
    {
        // dd($submission);
        $vendor = $submission->vendor()->withTrashed()->first();
        $client = $submission->client()->withTrashed()->first();
        $job = $submission->job()->withTrashed()->first();
        $candidate = $submission->candidate()->withTrashed()->first();

        return view('submission.show', compact('submission', 'vendor', 'client', 'job', 'candidate'));
    }

    public function sendEmail(Submission $submission)
    {
        // dd($submission);
        $vendor = $submission->vendor;
        $client = $submission->client;
        $job = $submission->job;
        $candidate = $submission->candidate;

        // Render the email content using a Blade view
        $emailContent = View::make('mail.submission_email', compact('vendor', 'client', 'job', 'candidate', 'submission'))->render();

        // Send the email using the Mail::send method
        Mail::send([], [], function ($message) use ($client, $emailContent) {
            $message->to($client->email);
            $message->subject('Submission Details');
            $message->setBody($emailContent, 'text/html');
        });

        return redirect()->route('submissions')->with('success', 'Email sent successfully');
    }

    // public function status(Request $request , Submission $submission){
    //     if($request->status == 1){
    //         $job = Job::where('id',$submission->job->id)->first();
    //         if($job){
    //             $job->delete();
    //         }
    //         $all_submissions = Submission::where('job_id',$submission->job->id)->get();
    //         foreach($all_submissions as $sub){
    //             if($sub->candidate_id == $submission->candidate_id && $sub->job_id == $submission->job_id){
    //                 $sub->status = 1;
    //                 $sub->save();
    //             }else{
    //                 $sub->status = 3;
    //                 $sub->save();
    //             }
    //         }
    //     }
    //     return response()->json([
    //         'message' => 'Status Changed Successfully',
    //     ]);
    // }

    public function status(Request $request, Submission $submission)
    {
        if ($request->status == 1 && $submission->job) {

            // completed job time
            $job_duration = Job::where('id', $submission->job_id)->first();
            $job_duration->completed_at = Carbon::now();
            $job_duration->save();

            // Soft delete the job
            $submission->job->delete();

            // Soft delete vendor assignments
            $deleted_vendor_assignments = VendorJob::where('job_id', $submission->job_id)->get();
            foreach ($deleted_vendor_assignments as $vendor) {
                if (!($vendor->vendor_id == $submission->vendor_id && $vendor->job_id == $submission->job_id)) {
                    $vendor->delete();
                }
            }

            // Soft delete team member assignments
            $deleted_team_member_assignments = VendorTmJob::where('job_id', $submission->job_id)->get();
            foreach ($deleted_team_member_assignments as $team_member) {
                if (!($team_member->vendor_id == $submission->vendor_id && $team_member->job_id == $submission->job_id)) {
                    $team_member->delete();
                }
            }

            // Update all submissions for the job
            Submission::where('job_id', $submission->job_id)
                ->update([
                    'status' => DB::raw('CASE
                                    WHEN candidate_id = ' . $submission->candidate_id . ' AND job_id = ' . $submission->job_id . ' THEN 1
                                    ELSE 3
                                END')
                ]);
        } else {
            // Restore the job
            if ($submission->job()->onlyTrashed()) {
                $submission->job()->onlyTrashed()->restore();
                $submission->job()->update([
                    'completed_at' => null
                ]);
            }

            // Restore vendor assignments
            $restore_assignments = VendorJob::where('job_id', $submission->job_id)->get();
            foreach ($restore_assignments as $job) {
                if ($job->onlyTrashed()) {
                    $job->onlyTrashed()->restore();
                }
            }

            // Update all submissions for the job
            if ($submission->status != 2) {
                Submission::where('job_id', $submission->job_id)
                    ->update([
                        'status' => 2
                    ]);
            }

            $submission->status = $request->status;
            $submission->save();
        }

        return response()->json([
            'message' => 'Status Changed Successfully',
        ]);
    }

    public function delete(Submission $submission)
    {
        $submission->forceDelete();
        return redirect()->route('submissions')->with('success', 'Submission Deleted Successfully');
    }
}

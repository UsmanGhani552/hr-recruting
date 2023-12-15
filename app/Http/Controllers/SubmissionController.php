<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Client;
use App\Models\Job;
use App\Models\Submission;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
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
        $vendor = $submission->vendor;
        $client = $submission->client;
        $job = $submission->job;
        $candidate = $submission->candidate;
        // dd($candidate);
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
            // Soft delete the job
            $submission->job->delete();

            // Update all submissions for the job
            Submission::where('job_id', $submission->job_id)
                ->update([
                    'status' => DB::raw('CASE
                                    WHEN candidate_id = ' . $submission->candidate_id . ' AND job_id = ' . $submission->job_id . ' THEN 1
                                    ELSE 3
                                END')
                ]);
        } else {
            $submission->status = $request->status;
            $submission->save();
        }

        return response()->json([
            'message' => 'Status Changed Successfully',
        ]);
    }

    public function delete(Submission $submission)
    {
        $submission->delete();
        return redirect()->route('submissions')->with('success', 'Submission Deleted Successfully');
    }
}

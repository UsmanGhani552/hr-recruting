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
    public function index(){
        if(Auth::user()->user_type == 'admin'){
            $submissions = Submission::with('vendor', 'client', 'job', 'candidate','user')->paginate(6);
            // dd($submissions[4]);
        }
        else if(Auth::user()->user_type == 'vendor'){
            $vendor_id = Auth::user()->vendor_id;
            $submissions = Submission::with('vendor', 'client', 'job', 'candidate')->where('vendor_id',$vendor_id)->paginate(6);
        }
        else if(Auth::user()->user_type == 'vendor team member'){
            $user_id = Auth::user()->vendor_id;
            $vendor = User::where('id', $user_id)->first();
            $vendor_id = $vendor->vendor_id;
            $submissions = Submission::with('vendor', 'client', 'job', 'candidate')->where('vendor_id',$vendor_id)->paginate(6);
        }
        return view('submission.index',compact('submissions'));
    }

    public function show(Submission $submission){
        $vendor = $submission->vendor;
        $client = $submission->client;
        $job = $submission->job;
        $candidate = $submission->candidate;
        // dd($candidate);
        return view('submission.show',compact('submission','vendor','client','job','candidate'));
    }

    public function sendEmail(Submission $submission) {
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

    public function delete(Submission $submission){
        $submission->delete();
        return redirect()->route('submissions')->with('success','Submission Deleted Successfully');
    }


}

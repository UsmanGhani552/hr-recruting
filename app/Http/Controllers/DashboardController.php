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

class DashboardController extends Controller
{
    public function index(){
        $vendors = Vendor::all();
        $clients = Client::all();
        $jobs = Job::all();
        $candidates = Candidate::all();
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
        return view('dashboard.index',compact('vendors','clients','jobs','candidates','submissions'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Client;
use App\Models\Job;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewDetailsController extends Controller
{
    public function jobDetails(Job $job){
        // dd($job);
        $clients = Client::all();
        $states =  DB::table('states')->get();
        $cities =  DB::table('cities')->get();
        return view('view-details.job_details', compact('job', 'clients', 'states', 'cities'));
    }

    public function clientDetails(Client $client)
    {
        $states =  DB::table('states')->get();
        $cities =  DB::table('cities')->get();
        return view('view-details.client_details', compact('client', 'states', 'cities'));
    }

    public function candidateDetails(Candidate $candidate)
    {
        $vendors = Vendor::all();
        $states =  DB::table('states')->get();
        $cities =  DB::table('cities')->get();
        return view('view-details.candidate_details', compact('vendors', 'candidate', 'states', 'cities'));
    }

    public function vendorDetails(Vendor $vendor)
    {
        $states =  DB::table('states')->get();
        $cities =  DB::table('cities')->get();
        return view('view-details.vendor_details', compact('vendor', 'states', 'cities'));
    }

    public function teamDetails(User $team)
    {
        return view('view-details.team_details', compact('team'));
    }
}

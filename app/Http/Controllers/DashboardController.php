<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\City;
use App\Models\Client;
use App\Models\Job;
use App\Models\Submission;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    public function index()
    {
        $vendors = Vendor::all();
        $clients = Client::all();
        $vendor_earning = Job::onlyTrashed()->sum('vendor_amount');
        $admin_earning = Job::onlyTrashed()->sum('admin_amount');
        $total_earning = $vendor_earning + $admin_earning;
        $active_clients = Client::where('status', 1)->get();
        $count_active_clients = count($active_clients);
        $inactive_clients = Client::where('status', 0)->get();
        $count_inactive_clients = count($inactive_clients);
        $jobs = Job::all();
        $approved_jobs = Job::onlyTrashed()->get();
        // dd($approved_jobs);
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



        // Your logic to calculate the rate of job acceptance for the past six months
        $labels = []; // Array to store month names
        $points = []; // Array to store the number of jobs accepted for each month

        // Loop through the past six months
        for ($i = 5; $i >= 0; $i--) {
            $month = now()->subMonths($i);
            $labels[] = $month->format('M'); // Get month name (e.g., Jan, Feb)

            // Your logic to calculate the number of accepted jobs for each month
            $acceptedJobsCount = Job::withTrashed()->where('status', '1')
                ->whereMonth('completed_at', $month->month)
                ->whereYear('completed_at', $month->year)
                ->count();

            $points[] = $acceptedJobsCount;
        }
        // dd($labels,$points);

        $total_jobs = count(Job::withTrashed()->get());
        $accepted_jobs = count(Job::onlyTrashed()->get());
        $gross_percent_jobs = [round(($accepted_jobs * 100) / $total_jobs)];
        // dd($gross_percent_jobs);




        return view('dashboard.index', compact('vendors', 'clients', 'count_active_clients', 'count_inactive_clients', 'jobs', 'approved_jobs', 'candidates', 'submissions', 'admin_earning', 'vendor_earning', 'total_earning', 'labels', 'points','gross_percent_jobs'));
    }

    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where("state_id", $request->state_id)
                                    ->get(["name", "id"]);

        return response()->json($data);
    }
}

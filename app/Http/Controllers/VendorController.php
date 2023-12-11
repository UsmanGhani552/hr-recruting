<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Client;
use App\Models\ClientVendor;
use App\Models\Folder;
use App\Models\Job;
use App\Models\Team;
use App\Models\User;
use App\Models\Vendor;
use App\Models\VendorInvitation;
use App\Models\VendorJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = Vendor::all();
        return view('vendor.dashboard', compact('vendors'));
    }
    public function create()
    {
        $states =  DB::table('states')->get();
        $cities =  DB::table('cities')->get();
        return view('vendor.create', compact('states', 'cities'));
    }

    public function show(Vendor $vendor)
    {
        // dd($vendor);
        $jobs = $vendor->jobs()->with('clients')->get();
        $clients = $vendor->clients;
        $candidates = Candidate::where('vendor_id', $vendor->id)->get();
        $teams = User::where('vendor_id', $vendor->id)->get();
        return view('vendor.assignment', compact('vendor', 'jobs', 'clients', 'candidates', 'teams'));
    }

    public function vendorJob(Vendor $vendor, Job $job)
    {
        // dd($vendor,$job);
        $clients = Client::all();
        $states =  DB::table('states')->get();
        $cities =  DB::table('cities')->get();
        return view('vendor.vendor_jobs', compact('job', 'clients', 'states', 'cities'));
    }

    public function vendorClient(Vendor $vendor, Client $client)
    {
        // dd($vendor,$job);
        // $clients = Client::all();
        $states =  DB::table('states')->get();
        $cities =  DB::table('cities')->get();
        return view('vendor.vendor_clients', compact('client', 'states', 'cities'));
    }

    public function vendorCandidate(Vendor $vendor, Candidate $candidate)
    {
        // dd($vendor,$job);
        $vendors = Vendor::all();
        $states =  DB::table('states')->get();
        $cities =  DB::table('cities')->get();
        return view('vendor.vendor_candidates', compact('vendor', 'vendors', 'candidate', 'states', 'cities'));
    }

    public function vendorTeam(Vendor $vendor, User $team)
    {
        // dd($vendor,$job);
        // $clients = Client::all();
        // $states =  DB::table('states')->get();
        // $cities =  DB::table('cities')->get();
        return view('vendor.vendor_teams', compact('team'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'company_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required | confirmed',
            'home' => 'required',
            'state' => 'required',
            'city' => 'required',
        ]);
        // dd('asd');
        $vendor = new Vendor();
        $vendor->first_name = $request->first_name;
        $vendor->last_name = $request->last_name;
        $vendor->company_name = $request->company_name;
        $vendor->email = $request->email;
        $vendor->phone = $request->phone;
        $vendor->home = $request->home;
        $vendor->state_id = $request->state;
        $vendor->city_id = $request->city;

        if ($vendor->save()) {
            $vendor_login = new User();
            $vendor_login->vendor_id = $vendor->id;
            $vendor_login->name = $vendor->first_name;
            $vendor_login->email = $request->email;
            $vendor_login->password =  Hash::make($request->password);
            if ($vendor_login->save()) {
                $vendorInvitation = VendorInvitation::where('email', $vendor_login->email)->first();
                $vendorInvitation->status = 1;
                $vendorInvitation->save();

                $vendor_email = $vendor->email;
                $fetch_admin = User::where('id', 1)->first();
                $admin_email = $fetch_admin->email;
                Mail::send('mail.vendor_welcome', [], function ($message) use ($vendor_email) {
                    $message->to($vendor_email);
                    $message->subject('Welcome Email');
                });
                Mail::send('mail.admin_notify', [], function ($message) use ($admin_email) {
                    $message->to($admin_email);
                    $message->subject('Vendor Registered');
                });
            };
        };
        return redirect()->route('vendor-dashboard')->withSuccess('Vendor Created Successfully');
    }

    public function edit(Vendor $vendor)
    {
        return view('vendor.edit', compact('vendor'));
    }

    public function update(Request $request, Vendor $vendor)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'company_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'home' => 'required',
        ]);
        $vendor->first_name = $request->first_name;
        $vendor->last_name = $request->last_name;
        $vendor->company_name = $request->company_name;
        $vendor->email = $request->email;
        $vendor->phone = $request->phone;
        $vendor->home = $request->home;
        $vendor->password = Hash::make($request->password);
        $vendor->save();
        return redirect()->route('vendor-dashboard')->withSuccess('Vendor Updated Successfully');
    }

    public function delete(Vendor $vendor)
    {
        $vendor->delete();
        return redirect()->route('vendor-dashboard')->withSuccess('Vendor Deleted Successfully');
    }

    public function changeVendorStatus(Request $request, Vendor $vendor)
    {
        dd($vendor);
        $vendor->status = $request->status;
        $vendor->save();
        return response()->json([
            'message' => 'Status Chnaged Successfully'
        ]);
    }

    public function searchClient(Request $request)
    {
        $query = $request->input('query');
        $clients = Client::where('name', 'LIKE', "%$query%")
            ->get();
        return response()->json($clients);
    }

    public function searchJob(Request $request)
    {
        $query = $request->input('query');
        // dd($query);
        $jobs = Job::where('title', 'LIKE', "%$query%")
            ->get();
        return response()->json($jobs);
    }

    public function searchFolder(Request $request)
    {
        $query = $request->input('query');
        $folders = Folder::with('folderItems')->where('title', 'LIKE', "%$query%")
            ->get();
        return response()->json($folders);
    }

    public function assignClient(Request $request)
    {
        // dd($request->vendors,$request->clients);
        foreach ($request->vendors as $vendor) {
            foreach ($request->clients as $client) {
                $existingRecord = ClientVendor::where('vendor_id', $vendor)
                    ->where('client_id', $client)
                    ->first();
                if (!$existingRecord) {
                    // If the record doesn't exist, create a new one
                    $client_vendors = new ClientVendor();
                    $client_vendors->vendor_id = $vendor;
                    $client_vendors->client_id = $client;
                    if ($client_vendors->save()) {
                        // Fetch all jobs associated with the current client
                        $jobs = Job::where('client_id', $client)->pluck('id')->toArray();

                        // Insert all job records for the current vendor
                        $job_vendor_records = [];
                        $now = now(); // Get the current timestamp

                        foreach ($jobs as $job) {
                            $job_vendor_records[] = [
                                'vendor_id' => $vendor,
                                'job_id' => $job,
                                'created_at' => $now,
                                'updated_at' => $now,
                            ];
                        }

                        // Use insert to insert multiple records at once
                        VendorJob::insert($job_vendor_records);
                    };
                }
            }
        }
        return response()->json([
            'message' => 'Vendor assigned successfully'
        ]);
    }

    public function assignJob(Request $request)
    {
        // dd($request->vendors,$request->clients);
        foreach ($request->vendors as $vendor) {
            foreach ($request->jobs as $job) {
                // Check if the record already exists
                $existingRecord = VendorJob::where('vendor_id', $vendor)
                    ->where('job_id', $job)
                    ->first();
                if (!$existingRecord) {
                    $vendor_jobs = new VendorJob();
                    $vendor_jobs->vendor_id = $vendor;
                    $vendor_jobs->job_id = $job;
                    $vendor_jobs->save();
                }
            }
        }
        return response()->json([
            'message' => 'Vendor assigned successfully'
        ]);
    }

    public function assignFolder(Request $request)
    {
        // dd($request->vendors, $request->clients, $request->jobs);

        if (!empty($request->clients)) {
            foreach ($request->clients as $client) {
                if (!is_null($client)) {
                    foreach ($request->vendors as $vendor) {
                        if (!is_null($vendor)) {
                            // Check if the record already exists
                            $existingRecord = ClientVendor::where('vendor_id', $vendor)
                                ->where('client_id', $client)
                                ->first();

                            if (!$existingRecord) {
                                // If the record doesn't exist, create a new one
                                $client_vendors = new ClientVendor();
                                $client_vendors->vendor_id = $vendor;
                                $client_vendors->client_id = $client;
                                $client_vendors->save();
                            }
                        }
                    }
                }
            }
        }

        if (!empty($request->jobs)) {
            foreach ($request->jobs as $job) {
                if (!is_null($job)) {
                    foreach ($request->vendors as $vendor) {
                        if (!is_null($vendor)) {
                            // Check if the record already exists
                            $existingRecord = VendorJob::where('vendor_id', $vendor)
                                ->where('job_id', $job)
                                ->first();

                            if (!$existingRecord) {
                                $vendor_jobs = new VendorJob();
                                $vendor_jobs->vendor_id = $vendor;
                                $vendor_jobs->job_id = $job;
                                $vendor_jobs->save();
                            }
                        }
                    }
                }
            }
        }

        return response()->json([
            'message' => 'Folder assign successfully'
        ]);
    }

    public function activeStatus(Request $request)
    {
        foreach ($request->vendors as $vendor_id) {
            $vendor = Vendor::where('id', $vendor_id)->first();
            $vendor->status = 1;
            $vendor->save();
        }
        return response()->json([
            'message' => 'Status Updated Successfully'
        ]);
    }

    public function inactiveStatus(Request $request)
    {
        foreach ($request->vendors as $vendor_id) {
            $vendor = Vendor::where('id', $vendor_id)->first();
            $vendor->status = 0;
            $vendor->save();
        }
        return response()->json([
            'message' => 'Status Updated Successfully'
        ]);
    }
}

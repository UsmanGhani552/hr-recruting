<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Client;
use App\Models\ClientVendor;
use App\Models\Job;
use App\Models\Team;
use App\Models\Vendor;
use App\Models\VendorInvitation;
use App\Models\VendorJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

    public function show(Vendor $vendor){
        // dd($vendor);
        $jobs = $vendor->jobs()->with('clients')->get();
        $clients = $vendor->clients;
        $candidates = Candidate::where('vendor_id',$vendor->id)->get();
        $teams = Team::where('vendor_id',$vendor->id)->get();
        // dd($candidates);
        return view('vendor.assignment',compact('jobs','clients','candidates','teams'));
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

        $vendor = new Vendor();
        $vendor->first_name = $request->first_name;
        $vendor->last_name = $request->last_name;
        $vendor->company_name = $request->company_name;
        $vendor->email = $request->email;
        $vendor->phone = $request->phone;
        $vendor->password = Hash::make($request->password);
        $vendor->home = $request->home;
        $vendor->state_id = $request->state;
        $vendor->city_id = $request->city;

        if ($vendor->save()) {
            $vendorInvitation = VendorInvitation::where('email', $vendor->email)->first();
            $vendorInvitation->status = 1;
            $vendorInvitation->save();
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
                    $client_vendors->save();
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

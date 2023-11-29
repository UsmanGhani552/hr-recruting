<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Job;
use App\Models\Vendor;
use App\Models\VendorJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::all();
        return view('job.index',compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states =  DB::table('states')->get();
        $cities =  DB::table('cities')->get();
        $clients = Client::all();
        return view('job.create',compact('states','cities','clients'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'client' => 'required',
            'department' => 'required',
            'internal_job_code' => 'required',
            'employment_type' => 'required',
            'minimum_experience' => 'required',
            'salary_range' => 'required',
            'currency' => 'required',
            'state' => 'required',
            'city' => 'required',
            'country' => 'required',
            'duration' => 'required',
            'job_type' => 'required',
            'postal_code' => 'required',
            // 'description' => 'required',
            'notes' => 'required',
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        // dd('asdas');
        $images = [];
        if ($files = $request->file('images')) {
            foreach($files as $file){
                $name = $file->getClientOriginalName();
                $filename = time() . '.' . $name;
                $file->move(public_path('jobs/') , $filename);
                $images[] = $filename;
            }
        }

        $job = new Job();
        $job->title = $request->title;
        $job->client_id = $request->client;
        $job->department = $request->department;
        $job->internal_job_code = $request->internal_job_code;
        $job->employment_type = $request->employment_type;
        $job->minimum_experience = $request->minimum_experience;
        $job->salary_range = $request->salary_range;
        $job->currency = $request->currency;
        $job->city_id = $request->city;
        $job->state_id = $request->state;
        $job->country = $request->country;
        $job->duration = $request->duration;
        $job->job_type = $request->job_type;
        $job->postal_code = $request->postal_code;
        $job->description = 'lorem xyz';
        $job->notes = $request->notes;
        $job->images = implode('|' , $images);
        $job->save();
        return redirect()->route('job')->withSuccess('Job Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        $vendors = $job->vendors;
        return view('job.assignment',compact('job','vendors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        $states =  DB::table('states')->get();
        $cities =  DB::table('cities')->get();
        $clients = Client::all();
        return view('job.edit',compact('states','cities','clients','job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        $request->validate([
            'title' => 'required',
            'client' => 'required',
            'department' => 'required',
            'internal_job_code' => 'required',
            'employment_type' => 'required',
            'minimum_experience' => 'required',
            'salary_range' => 'required',
            'currency' => 'required',
            'state' => 'required',
            'city' => 'required',
            'country' => 'required',
            'duration' => 'required',
            'job_type' => 'required',
            'postal_code' => 'required',
            // 'description' => 'required',
            'notes' => 'required',
            // 'images' => 'required',
            // 'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $images = [];
        if ($files = $request->file('images')) {
            $destiantion = public_path($job->images);
            if(File::exists($destiantion)){
                File::delete($destiantion);
            }
            foreach($files as $file){
                $name = $file->getClientOriginalName();
                $filename = time() . '.' . $name;
                $file->move(public_path('jobs/') , $filename);
                $images[] = $filename;
            }
        }

        $job->title = $request->title;
        $job->client_id = $request->client;
        $job->department = $request->department;
        $job->internal_job_code = $request->internal_job_code;
        $job->employment_type = $request->employment_type;
        $job->minimum_experience = $request->minimum_experience;
        $job->salary_range = $request->salary_range;
        $job->currency = $request->currency;
        $job->city_id = $request->city;
        $job->state_id = $request->state;
        $job->country = $request->country;
        $job->duration = $request->duration;
        $job->job_type = $request->job_type;
        $job->postal_code = $request->postal_code;
        $job->description = 'lorem abc';
        $job->notes = $request->notes;
        $job->images = implode('|' , $images);
        $job->save();
        return redirect()->route('job')->withSuccess('Job Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function delete(Job $job)
    {
        $job->delete();
        return redirect()->route('job')->withSuccess('Job Deleted Successfully');
    }

    public function changeJobStatus(Request $request , Job $job)
    {
        $job->status = $request->status;
        $job->save();
        return response()->json([
            'message' => 'Status Chnaged Successfully'
        ]);
    }

    public function searchVendor(Request $request)
    {
        $query = $request->input('query');
        $vendors = Vendor::where('first_name','LIKE', "%$query%")
        ->orWhere('last_name','LIKE', "%$query%")
        ->get();
        return response()->json($vendors);
    }

    public function assignVendor(Request $request){
        // dd($request->vendors,$request->clients);
        foreach($request->jobs as $job){
            foreach($request->vendors as $vendor){
                 // Check if the record already exists
                 $existingRecord = VendorJob::where('vendor_id', $vendor)
                 ->where('job_id', $job)
                 ->first();
                 if(!$existingRecord){
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

    public function activeStatus(Request $request){
        foreach($request->jobs as $job_id){
            $job = Job::where('id',$job_id)->first();
            $job->status = 1;
            $job->save();
        }
        return response()->json([
            'message' => 'Status Updated Successfully'
        ]);
    }

    public function inactiveStatus(Request $request){
        foreach($request->jobs as $job_id){
            $job = Job::where('id',$job_id)->first();
            $job->status = 0;
            $job->save();
        }
        return response()->json([
            'message' => 'Status Updated Successfully'
        ]);
    }

    public function bulkDelete(Request $request){
        foreach($request->jobs as $job_id){
            $job = Job::where('id',$job_id)->first();
            $job->delete();
        }
        return response()->json([
            'message' => 'Jobs Deleted Successfully'
        ]);
    }
}

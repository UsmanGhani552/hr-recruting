<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Client;
use App\Models\Job;
use App\Models\Submission;
use App\Models\User;
use App\Models\Vendor;
use App\Models\VendorJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $states =  DB::table('states')->get();
    //     $cities =  DB::table('cities')->get();
    //     $user = Auth::user();
    //     if (Auth::user()->user_type == 'admin') {
    //         $jobs = Job::withTrashed()->paginate(6);
    //     } else if (Auth::user()->user_type == 'vendor') {
    //         $jobs = $user->vendor->jobs()->with('clients')->withTrashed()->paginate(6);
    //     } else if (Auth::user()->user_type == 'vendor team member') {
    //         $jobs = $user->load('jobs.clients')->jobs()->withTrashed()->paginate(6);
    //     }
    //     return view('job.index', compact('states', 'cities', 'jobs'));
    // }

    public function index(Request $request)
    {
        $states = DB::table('states')->get();
        $cities = DB::table('cities')->get();
        $clients = Client::all();
        $user = Auth::user();

        $query = Job::withTrashed();

        if ($user->user_type == 'vendor') {
            $vendor = $user->vendor;
            $query->whereHas('vendors', function ($q) use ($vendor) {
                $q->where('vendor_id', $vendor->id);
            });
        } elseif ($user->user_type == 'vendor team member') {
            // $vendorTeamMember = $user->vendorTeamMember;
            $query->whereHas('teamMembers', function ($q) use ($user) {
                $q->where('team_member_id', $user->id);
            });
        }
        // Apply additional filters based on request parameters
        if ($request->filled('state')) {
            $query->where('state_id', $request->input('state'));
        }

        if ($request->filled('city')) {
            $query->where('city_id', $request->input('city'));
        }
        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->input('title') . '%');
        }
        if ($request->filled('client')) {
            $query->where('client_id', $request->input('client'));
        }
        if ($request->filled('department')) {
            $query->where('department', $request->input('department'));
        }
        if ($request->filled('employment_type')) {
            $query->where('employment_type', $request->input('employment_type'));
        }
        if ($request->filled('job_type')) {
            $query->where('job_type', $request->input('job_type'));
        }
        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        $jobs = $query->paginate(6);

        return view('job.index', compact('states', 'cities', 'jobs','clients'));
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
        return view('job.create', compact('states', 'cities', 'clients'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'percentage' => 'required',
            // 'actual_salary' => 'required',
            'vendor_percentage' => 'required',
            'admin_percentage' => 'required',
        ]);
        // dd('asdas');
        $images = [];
        if ($files = $request->file('images')) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $filename = time() . '.' . $name;
                $file->move(public_path('jobs/'), $filename);
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
        $job->images = implode('|', $images);
        $job->percentage = $request->percentage;
        // $job->actual_salary = $request->actual_salary;
        $job->vendor_percentage = $request->vendor_percentage;
        $job->admin_percentage = $request->admin_percentage;
        // $job->vendor_amount = $request->actual_salary * ($request->vendor_percentage / 100);
        // $job->admin_amount = $request->actual_salary * ($request->admin_percentage / 100);
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
        $vendors = $job->vendors()->paginate(6);
        return view('job.assignment', compact('job', 'vendors'));
    }

    public function submission(Job $job)
    {
        // dd($job->clients);
        $client = $job->clients;
        $user = Auth::user();
        if ($user->user_type == 'admin') {
            $vendor = Auth::user();
            $candidates = Candidate::all();
        } else if ($user->user_type == 'vendor') {
            $vendor = $user->vendor;
            $candidates = Candidate::where('vendor_id', $vendor->id)->get();
        } else if ($user->user_type == 'vendor team member') {
            $user_id = $user->vendor_id;
            $vendor_id = User::where('id', $user_id)->first();
            $vendor = $vendor_id->vendor;
            // dd($vendor);
            $candidates = Candidate::where('vendor_id', $vendor_id->vendor_id)->get();

            // dd($candidates);
        }
        // dd($candidates);
        return view('job.submission', compact('job', 'client', 'vendor', 'candidates'));
    }

    public function storeSubmission(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'job_id' => 'required',
            'client_id' => 'required',
            'vendor_id' => 'required',
            'candidate_id' => 'required',
            'file' => 'required',
            'file.*' => 'image|mimes:jpeg,png,jpg',
        ]);

        $additional_documents = [];
        if ($files = $request->file('file')) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $filename = time() . '.' . $name;
                $file->move(public_path('candidates/'), $filename);
                $additional_documents[] = $filename;
            }
        }
        $existing_record = Submission::where('job_id', $request->job_id)->where('client_id', $request->client_id)->where('vendor_id', $request->vendor_id)->where('candidate_id', $request->candidate_id)->first();
        if (!$existing_record) {
            $submission = new Submission();
            $submission->job_id = $request->job_id;
            $submission->client_id = $request->client_id;
            $submission->vendor_id = $request->vendor_id;
            $submission->candidate_id = $request->candidate_id;
            if (Auth::user()->user_type == 'vendor team member') {
                $submission->team_member_id = Auth::user()->id;
            }
            $submission->additional_documents = implode('|', $additional_documents);
            $submission->save();
            return redirect()->route('submissions')->with('success', 'Job Submitted Successfully');
        } else {
            return back()->with('error', 'This Job Has Already Been Submitted');
        }
    }



    // public function jobVendor(Job $job,Vendor $vendor){
    //     // dd($vendor,$job);
    //     // $clients = Client::all();
    //     // $states =  DB::table('states')->get();
    //     // $cities =  DB::table('cities')->get();
    //     return view('job.job_vendors',compact('job','vendor'));
    // }

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
        return view('job.edit', compact('states', 'cities', 'clients', 'job'));
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
            if (File::exists($destiantion)) {
                File::delete($destiantion);
            }
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $filename = time() . '.' . $name;
                $file->move(public_path('jobs/'), $filename);
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
        $job->images = implode('|', $images);
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

    public function changeJobStatus(Request $request, Job $job)
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
        $vendors = Vendor::where('first_name', 'LIKE', "%$query%")
            ->orWhere('last_name', 'LIKE', "%$query%")
            ->get();
        return response()->json($vendors);
    }

    public function assignVendor(Request $request)
    {
        // dd($request->vendors,$request->clients);
        foreach ($request->jobs as $job) {
            foreach ($request->vendors as $vendor) {
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
        foreach ($request->jobs as $job_id) {
            $job = Job::where('id', $job_id)->first();
            $job->status = 1;
            $job->save();
        }
        return response()->json([
            'message' => 'Status Updated Successfully'
        ]);
    }

    public function inactiveStatus(Request $request)
    {
        foreach ($request->jobs as $job_id) {
            $job = Job::where('id', $job_id)->first();
            $job->status = 0;
            $job->save();
        }
        return response()->json([
            'message' => 'Status Updated Successfully'
        ]);
    }

    public function bulkDelete(Request $request)
    {
        foreach ($request->jobs as $job_id) {
            $job = Job::where('id', $job_id)->first();
            $job->delete();
        }
        return response()->json([
            'message' => 'Jobs Deleted Successfully'
        ]);
    }
}

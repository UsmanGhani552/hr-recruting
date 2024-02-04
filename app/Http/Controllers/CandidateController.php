<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Submission;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class CandidateController extends Controller
{
    // public function index(){

    //     $vendors = Vendor::all();
    //     $states =  DB::table('states')->get();
    //     $cities =  DB::table('cities')->get();

    //     if(Auth::user()->user_type == 'admin'){
    //         $candidates = Candidate::paginate(6);
    //     }
    //     else if(Auth::user()->user_type == 'vendor'){
    //         $vendor_id = Auth::user()->load('vendor')->vendor_id;
    //         // dd($vendor_id);
    //         $candidates = Candidate::where('vendor_id',$vendor_id)->paginate(6);

    //     }else if(Auth::user()->user_type == 'vendor team member'){

    //         $vendor = Auth::user()->vendor_id;
    //         $vendor_id = User::where('id',$vendor)->first();
    //         // dd($vendor_id->vendor_id);
    //         $candidates = Candidate::where('vendor_id',$vendor_id->vendor_id)->paginate(6);
    //     }
    //     return view('candidate.index' , compact('candidates','vendors','states','cities'));
    // }

    public function index(Request $request)
    {
        $vendors = Vendor::all();
        $states = DB::table('states')->get();
        $cities = DB::table('cities')->get();

        $user = Auth::user();
        $query = Candidate::withTrashed();

        if ($user->user_type == 'vendor') {
            $vendor_id = $user->load('vendor')->vendor_id;
            $query->where('vendor_id', $vendor_id);
        } elseif ($user->user_type == 'vendor team member') {
            $vendor = $user->vendor_id;
            $vendor_id = User::where('id', $vendor)->first();
            $query->where('vendor_id', $vendor_id->vendor_id);
        }

        if ($request->filled('state')) {
            $query->where('state_id', $request->input('state'));
        }

        if ($request->filled('city')) {
            $query->where('city_id', $request->input('city'));
        }

        if ($request->filled('name')) {
            $query->where('first_name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->filled('phone')) {
            $query->where('phone', 'like', '%' . $request->input('phone') . '%');
        }

        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->input('email') . '%');
        }

        if ($request->filled('position')) {
            $query->where('position', 'like', '%' . $request->input('position') . '%');
        }

        if ($request->filled('vendor')) {
            $query->where('vendor_id', $request->input('vendor'));
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        // Apply additional filters in a similar manner

        $candidates = $query->orderBy('id', 'DESC')->paginate(6);

        return view('candidate.index', compact('candidates', 'vendors', 'states', 'cities'));
    }

    public function create()
    {
        $states =  DB::table('states')->get();
        $cities =  DB::table('cities')->get();
        if(Auth::user()->user_type == 'admin'){
            $vendor = Auth::user();
        }
        else if (Auth::user()->user_type == 'vendor') {
            $vendor = Auth::user()->vendor;
        } else if (Auth::user()->user_type == 'vendor team member') {
            $authenticated_user_id = Auth::user()->vendor_id;
            $vendor_id = User::where('id', $authenticated_user_id)->first();
            $vendor = $vendor_id->vendor;
        }
        // dd($vendor);
        return view('candidate.create', compact('states', 'cities', 'vendor'));
    }

    public function show(Candidate $candidate)
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
            },
            'teamMember' => function ($query) {
                $query->withTrashed();
            }
        ])->where('candidate_id', $candidate->id)->paginate(6);
        // dd($vendors);
        return view('candidate.assignment', compact('candidate', 'submissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'state' => 'required',
            'city' => 'required',
            'country' => 'required',
            'vendor' => 'required',
            // 'method_of_communication' => 'required',
            'highest_education' => 'required',
            'years_of_experience' => 'required',
            'position' => 'required',
            'work_authorization' => 'required',
            'expected_pay_rate' => 'required',
            'availability_to_start' => 'required',
            'availability_to_interview' => 'required',
            'postal_code' => 'required',
            'resume' => 'required',
            'status' => 'required',
            'notes' => 'required',
        ]);

        $candidate = new Candidate();
        if ($request->hasFile('resume')) {
            $file = $request->file('resume');
            $name = $file->getClientOriginalName();
            $filename = time() . '.' . $name;
            $file->move(public_path('candidates/'), $filename);
            $candidate->resume = 'candidates/' . $filename;
        }


        $candidate->first_name = $request->first_name;
        $candidate->last_name = $request->last_name;
        $candidate->email = $request->email;
        $candidate->phone = $request->phone;
        $candidate->state_id = $request->state;
        $candidate->city = $request->city;
        $candidate->country = $request->country;
        $candidate->vendor_id = $request->vendor;
        // $candidate->method_of_communication = $request->method_of_communication;
        $candidate->highest_education = $request->highest_education;
        $candidate->years_of_experience = $request->years_of_experience;
        $candidate->position = $request->position;
        $candidate->work_authorization = $request->work_authorization;
        $candidate->expected_pay_rate = $request->expected_pay_rate;
        $candidate->availability_to_start = $request->availability_to_start;
        $candidate->availability_to_interview = $request->availability_to_interview;
        $candidate->postal_code = $request->postal_code;

        $candidate->status = $request->status;
        $candidate->notes = $request->notes;
        $candidate->save();
        return redirect()->route('candidate')->withSuccess('Candidate Created Successfully');
    }

    public function edit(Candidate $candidate)
    {
        $states =  DB::table('states')->get();
        $cities =  DB::table('cities')->get();
        $vendors = Vendor::all();
        return view('candidate.edit', compact('candidate', 'states', 'cities', 'vendors'));
    }

    public function update(Request $request, Candidate $candidate)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'state' => 'required',
            'city' => 'required',
            'country' => 'required',
            'vendor' => 'required',
            // 'method_of_communication' => 'required',
            'highest_education' => 'required',
            'years_of_experience' => 'required',
            'position' => 'required',
            'work_authorization' => 'required',
            'expected_pay_rate' => 'required',
            'availability_to_start' => 'required',
            'availability_to_interview' => 'required',
            'postal_code' => 'required',
            'status' => 'required',
            'notes' => 'required',
        ]);

        if ($request->hasFile('resume')) {
            $destination = public_path($candidate->resume);

            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('resume');
            $name = $file->getClientOriginalName();
            $filename = time() . '.' . $name;
            $file->move(public_path('candidates/'), $filename);
            $candidate->resume = 'candidates/' . $filename;
        }

        $candidate->first_name = $request->first_name;
        $candidate->last_name = $request->last_name;
        $candidate->email = $request->email;
        $candidate->phone = $request->phone;
        $candidate->state_id = $request->state;
        $candidate->city = $request->city;
        $candidate->country = $request->country;
        $candidate->vendor_id = $request->vendor;
        // $candidate->method_of_communication = $request->method_of_communication;
        $candidate->highest_education = $request->highest_education;
        $candidate->years_of_experience = $request->years_of_experience;
        $candidate->position = $request->position;
        $candidate->work_authorization = $request->work_authorization;
        $candidate->expected_pay_rate = $request->expected_pay_rate;
        $candidate->availability_to_start = $request->availability_to_start;
        $candidate->availability_to_interview = $request->availability_to_interview;
        $candidate->postal_code = $request->postal_code;
        $candidate->status = $request->status;
        $candidate->notes = $request->notes;
        $candidate->save();
        return redirect()->route('candidate')->withSuccess('Candidate Updated Successfully');
    }
    
    public function delete(Candidate $candidate)
    {
        $candidate->delete();
        return redirect()->route('candidate')->withSuccess('Candidate Deleted Successfully');
    }

    public function changeCandidateStatus(Request $request, Candidate $candidate)
    {
        $candidate->status = $request->status;
        $candidate->save();
        return response()->json([
            'message' => 'Status Chnaged Successfully'
        ]);
    }

    public function activeStatus(Request $request)
    {
        foreach ($request->candidates as $candidate_id) {
            $candidate = Candidate::where('id', $candidate_id)->first();
            $candidate->status = 1;
            $candidate->save();
        }

        return response()->json([
            'message' => 'Status Updated Successfully'
        ]);
    }

    public function inactiveStatus(Request $request)
    {
        foreach ($request->candidates as $candidate_id) {
            $candidate = Candidate::where('id', $candidate_id)->first();
            $candidate->status = 0;
            $candidate->save();
        }

        return response()->json([
            'message' => 'Status Updated Successfully'
        ]);
    }

    public function bulkDelete(Request $request)
    {
        foreach ($request->candidates as $candidate_id) {
            $candidate = Candidate::where('id', $candidate_id)->first();
            $candidate->delete();
        }

        return response()->json([
            'message' => 'Candidate Deleted Successfully'
        ]);
    }
}

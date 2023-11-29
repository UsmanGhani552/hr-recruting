<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class CandidateController extends Controller
{
    public function index(){
        $candidates = Candidate::all();
        return view('candidate.index',compact('candidates'));
    }
    
    public function create(){
        $states =  DB::table('states')->get();
        $cities =  DB::table('cities')->get();
        $vendors = Vendor::all();
        return view('candidate.create',compact('states','cities','vendors'));
    }

    public function store(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'state' => 'required',
            'city' => 'required',
            'country' => 'required',
            'vendor' => 'required',
            'method_of_communication' => 'required',
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
            $filename = time().'.' . $name;
            $file->move(public_path('candidates/'), $filename);
            $candidate->resume = 'candidates/'.$filename;
        }


        $candidate->first_name = $request->first_name;
        $candidate->last_name = $request->last_name;
        $candidate->email = $request->email;
        $candidate->phone = $request->phone;
        $candidate->state_id = $request->state;
        $candidate->city_id = $request->city;
        $candidate->country = $request->country;
        $candidate->vendor_id = $request->vendor;
        $candidate->method_of_communication = $request->method_of_communication;
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

    public function edit(Candidate $candidate){
        $states =  DB::table('states')->get();
        $cities =  DB::table('cities')->get();
        $vendors = Vendor::all();
        return view('candidate.edit',compact('candidate','states','cities','vendors'));
    }

    public function update(Request $request , Candidate $candidate){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'state' => 'required',
            'city' => 'required',
            'country' => 'required',
            'vendor' => 'required',
            'method_of_communication' => 'required',
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
            $filename = time().'.' . $name;
            $file->move(public_path('candidates/'), $filename);
            $candidate->resume = 'candidates/'.$filename;
        }

        $candidate->first_name = $request->first_name;
        $candidate->last_name = $request->last_name;
        $candidate->email = $request->email;
        $candidate->phone = $request->phone;
        $candidate->state_id = $request->state;
        $candidate->city_id = $request->city;
        $candidate->country = $request->country;
        $candidate->vendor_id = $request->vendor;
        $candidate->method_of_communication = $request->method_of_communication;
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
    public function delete(Candidate $candidate){
        $candidate->delete();
        return redirect()->route('candidate')->withSuccess('Candidate Deleted Successfully');
    }

    public function changeCandidateStatus(Request $request , Candidate $candidate)
    {
        $candidate->status = $request->status;
        $candidate->save();
        return response()->json([
            'message' => 'Status Chnaged Successfully'
        ]);
    }

    public function activeStatus(Request $request){
        foreach($request->candidates as $candidate_id){
            $candidate = Candidate::where('id',$candidate_id)->first();
            $candidate->status = 1;
            $candidate->save();
        }

        return response()->json([
            'message' => 'Status Updated Successfully'
        ]);
    }

    public function inactiveStatus(Request $request){
        foreach($request->candidates as $candidate_id){
            $candidate = Candidate::where('id',$candidate_id)->first();
            $candidate->status = 0;
            $candidate->save();
        }

        return response()->json([
            'message' => 'Status Updated Successfully'
        ]);
    }

    public function bulkDelete(Request $request){
        foreach($request->candidates as $candidate_id){
            $candidate = Candidate::where('id',$candidate_id)->first();
            $candidate->delete();
        }

        return response()->json([
            'message' => 'Candidate Deleted Successfully'
        ]);
    }


}

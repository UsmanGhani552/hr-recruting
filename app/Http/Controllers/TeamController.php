<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Job;
use App\Models\Team;
use App\Models\User;
use App\Models\VendorTmClient;
use App\Models\VendorTmJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('vendor_id' , Auth::user()->id);

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->input('email') . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        $teams = $query->paginate(6);
        return view('team.index', compact('teams'));
    }
    public function create()
    {
        return view('team.create');
    }

    public function show(User $team)
    {
        $jobs = $team->jobs()->with('clients')->withTrashed()->get();
        // dd($jobs->toArray());
        $clients = $team->clients;
        return view('team.assignment',compact('team','jobs','clients'));
    }

    public function deleteAssignedJob(User $team , Job $job){
        $delete_assigment = VendorTmJob::where('team_member_id',$team->id)->where('job_id',$job->id)->first();
        dd($delete_assigment);
        $delete_assigment->delete();
        return back()->withSuccess('Assigned Job Removed Successfully');
    }

    public function deleteAssignedClient(User $team, Client $client){
        $delete_assigment = VendorTmClient::where('team_member_id',$team->id)->where('client_id',$client->id)->first();
        dd($delete_assigment);
        $delete_assigment->delete();
        return back()->withSuccess('Assigned Client Removed Successfully');
    }

    // public function teamJob(User $team, Job $job)
    // {
    //     // dd($vendor,$job);
    //     $clients = Client::all();
    //     $states =  DB::table('states')->get();
    //     $cities =  DB::table('cities')->get();
    //     return view('team.team_jobs', compact('job', 'clients', 'states', 'cities'));
    // }

    // public function teamClient(User $team, Client $client)
    // {
    //     $states =  DB::table('states')->get();
    //     $cities =  DB::table('cities')->get();
    //     return view('team.team_clients', compact('client', 'states', 'cities'));
    // }

    public function store(Request $request)
    {
        $request->validate([
            // 'first_name' => 'required',
            // 'last_name' => 'required',
            'name' => 'required',
            // 'company_name' => 'required',
            'email' => 'required',
            'password' => 'required | confirmed',
        ]);
        $team = new User();
        $team->name = $request->name;
        // $team->last_name = $request->last_name;
        $team->vendor_id = Auth::user()->id;
        $team->email = $request->email;
        $team->password = Hash::make($request->password);
        $team->save();
        $team->assignRole('vendor team member');
        // $team->syncRoles('$request->roles');
        return redirect()->route('team')->withSuccess('Team Created Successfully');
    }

    public function edit(Team $team)
    {
        return view('team.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        $request->validate([
            // 'first_name' => 'required',
            // 'last_name' => 'required',
            // 'company_name' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'confirmed',
        ]);
        // dd('sad');
        // $team->first_name = $request->first_name;
        // $team->last_name = $request->last_name;
        // $team->company_name = $request->company_name;
        $team->company_name = $request->name;
        $team->vendor_id = Auth::user()->id;
        $team->email = $request->email;
        $team->password = Hash::make($request->password);
        $team->save();
        return redirect()->route('team')->withSuccess('Team Updated Successfully');
    }

    public function delete(Team $team)
    {
        $team->delete();
        return redirect()->route('team')->withSuccess('Team Deleted Successfully');
    }

    public function changeTeamStatus(Request $request, User $team)
    {
        // dd($team);
        $team->status = $request->status;
        $team->save();
        return response()->json([
            'message' => 'Status Chnaged Successfully'
        ]);
    }

    public function activeStatus(Request $request)
    {
        // dd($request->folders);
        foreach ($request->teams as $team_id) {
            $team = Team::where('id', $team_id)->first();
            $team->status = 1;
            $team->save();
        }
        return response()->json([
            'message' => 'Status Updated Successfully'
        ]);
    }

    public function inactiveStatus(Request $request)
    {
        foreach ($request->teams as $team_id) {
            $team = Team::where('id', $team_id)->first();
            $team->status = 0;
            $team->save();
        }
        return response()->json([
            'message' => 'Status Updated Successfully'
        ]);
    }

    public function assignClient(Request $request)
    {
        // dd($request->vendors,$request->clients);
        foreach ($request->teams as $team_member) {
            foreach ($request->clients as $client) {
                $existingRecord = VendorTmClient::where('team_member_id', $team_member)
                    ->where('client_id', $client)
                    ->first();
                if (!$existingRecord) {
                    // If the record doesn't exist, create a new one
                    $vendors_tm_clients = new VendorTmClient();
                    $vendors_tm_clients->team_member_id = $team_member;
                    $vendors_tm_clients->client_id = $client;
                    if ($vendors_tm_clients->save()) {
                        // Fetch all jobs associated with the current client
                        $jobs = Job::where('client_id', $client)->pluck('id')->toArray();

                        // Insert all job records for the current vendor
                        $job_vendor_records = [];
                        $now = now(); // Get the current timestamp

                        foreach ($jobs as $job) {
                            $job_vendor_records[] = [
                                'team_member_id' => $team_member,
                                'job_id' => $job,
                                'created_at' => $now,
                                'updated_at' => $now,
                            ];
                        }

                        // Use insert to insert multiple records at once
                        VendorTmJob::insert($job_vendor_records);
                    };
                }
            }
        }
        return response()->json([
            'message' => 'Client assigned successfully'
        ]);
    }

    public function assignJob(Request $request)
    {
        // dd($request->vendors,$request->clients);
        foreach ($request->teams as $team_member) {
            foreach ($request->jobs as $job) {
                // Check if the record already exists
                $existingRecord = VendorTmJob::where('team_member_id', $team_member)
                    ->where('job_id', $job)
                    ->first();
                if (!$existingRecord) {
                    $vendors_tm_jobs = new VendorTmJob();
                    $vendors_tm_jobs->team_member_id = $team_member;
                    $vendors_tm_jobs->job_id = $job;
                    $vendors_tm_jobs->save();
                }
            }
        }
        return response()->json([
            'message' => 'Job assigned successfully'
        ]);
    }
}

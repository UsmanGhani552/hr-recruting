<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeamController extends Controller
{
    public function index(){
        $teams = Team::all();
        return view('team.index',compact('teams'));
    }
    public function create(){
        return view('team.create');
    }

    public function show(){
        return view('team.assignment');
    }

    public function store(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'company_name' => 'required',
            'email' => 'required',
            'password' => 'required | confirmed',
        ]);
        $team = new Team();
        $team->first_name = $request->first_name;
        $team->last_name = $request->last_name;
        $team->company_name = $request->company_name;
        $team->email = $request->email;
        $team->password = Hash::make($request->password);
        $team->save();
        return redirect()->route('team')->withSuccess('Team Created Successfully');
    }

    public function edit(Team $team){
        return view('team.edit',compact('team'));
    }

    public function update(Request $request , Team $team){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'company_name' => 'required',
            'email' => 'required',
            'password' => 'confirmed',
        ]);
        // dd('sad');
        $team->first_name = $request->first_name;
        $team->last_name = $request->last_name;
        $team->company_name = $request->company_name;
        $team->email = $request->email;
        $team->password = Hash::make($request->password);
        $team->save();
        return redirect()->route('team')->withSuccess('Team Updated Successfully');
    }
    public function delete(Team $team){
        $team->delete();
        return redirect()->route('team')->withSuccess('Team Deleted Successfully');
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

}

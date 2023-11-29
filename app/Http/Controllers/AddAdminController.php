<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AddAdminController extends Controller
    {
        // function __construct()
        // {
        //     $this->middleware('role_or_permission:User access|User create|User edit|User delete', ['only' => ['index','show']]);
        //     $this->middleware('role_or_permission:User create', ['only' => ['create','store']]);
        //     $this->middleware('role_or_permission:User edit', ['only' => ['edit','update']]);
        //     $this->middleware('role_or_permission:User delete', ['only' => ['destroy']]);

        // }
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $admins = User::where('user_type','=','admin')->get();
            return view('admin.add-admin.index',compact('admins'));
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            $roles = Role::all();
            return view('admin.add-admin.create',compact('roles'));
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
                'name'=>'required',
                'email' => 'required|email|unique:users',
                'password'=>'required|confirmed'
            ]);
            $addAdmin = new User;
            // dd($addAdmin);

            $addAdmin->name = $request->name;
            $addAdmin->email = $request->email;
            $addAdmin->user_type = 'admin';
            $addAdmin->password = bcrypt($request->password);
            $addAdmin->email_verified_at = now();
            $addAdmin->save();

            $addAdmin->syncRoles($request->roles);
            return redirect()->route('add-admin.index')->withSuccess('Admin created !!!');
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit(User $addAdmin)
        {
            $roles = Role::all();
            return view('admin.add-admin.edit',compact('addAdmin','roles'));
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request,User $addAdmin)
        {
            $validated = $request->validate([
                'name'=>'required',
                'email' => 'required|email|unique:users,email,'.$addAdmin->id.',id',
            ]);

            if($request->password != null){
                $request->validate([
                    'password' => 'required|confirmed'
                ]);
                $validated['password'] = bcrypt($request->password);
            }

            $addAdmin->update($validated);

            $addAdmin->syncRoles($request->roles);
            return redirect()->route('add-admin.index')->withSuccess('Admin updated !!!');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy(User $addAdmin)
        {
            $addAdmin->delete();
            return redirect()->route('add-admin.index')->withSuccess('Admin deleted !!!');
        }
    }

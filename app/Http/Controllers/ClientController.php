<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientVendor;
use App\Models\Job;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->user_type == 'admin'){
            $clients = Client::all();
        } else if(Auth::user()->user_type == 'vendor'){
            $clients = Auth::user()->load('vendor.clients')->vendor->clients;
        } else if(Auth::user()->user_type == 'vendor team member'){
            $clients = Auth::user()->load('clients')->clients;
        }
        return view('client.index',compact('clients'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $vendors = Vendor::where('first_name','LIKE', "%$query%")
        ->orWhere('last_name','LIKE', "%$query%")
        ->get();
        return response()->json($vendors);
    }

    public function searchSelected(Request $request , Client $client)
    {
        $query = $request->input('query');
        $vendors = Vendor::where('first_name','LIKE', "%$query%")
        ->orWhere('last_name','LIKE', "%$query%")
        ->get();
        $selected_vendors = ClientVendor::where('client_id' , $client->id)->get();
        return response()->json([$vendors,$selected_vendors]);
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
        $vendors = Vendor::all();
        return view('client.create',compact('states','cities','vendors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'website' => 'required',
            'linkedln_page' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'marital_status' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'company_size' => 'required',
            'industry' => 'required',
            'year_founded' => 'required',
            'admin_documents' => 'required',
            'admin_documents.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'vendor_documents' => 'required',
            'vendor_documents.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $vendor_images = [];
        if ($files = $request->file('vendor_documents')) {
            foreach($files as $file){
                $name = $file->getClientOriginalName();
                $filename = time() . '.' . $name;
                $file->move(public_path('clients/') , $filename);
                $vendor_images[] = $filename;
            }
        }

        $admin_images = [];
        if ($files = $request->file('admin_documents')) {
            foreach($files as $file){
                $name = $file->getClientOriginalName();
                $filename = time() . '.' . $name;
                $file->move(public_path('clients/') , $filename);
                $admin_images[] = $filename;
            }
        }

        $client = new Client();
        $client->name = $request->name;
        $client->website = $request->website;
        $client->linkedln_page = $request->linkedln_page;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->address = $request->address;
        $client->marital_status = $request->marital_status;
        $client->state_id = $request->state;
        $client->city_id = $request->city;
        $client->state_id = $request->state;
        $client->country = $request->country;
        $client->company_size = $request->company_size;
        $client->industry = $request->industry;
        $client->year_founded = $request->year_founded;
        $client->vendor_documents = implode('|' , $vendor_images);
        $client->admin_documents = implode('|' , $admin_images);
        $save_data = $client->save();
        if($save_data){
            foreach($request->vendor as $vendor_id){
                $client_vendor = new ClientVendor();
                $client_vendor->client_id = $client->id;
                $client_vendor->vendor_id = $vendor_id;
                $client_vendor->save();
            }
        }
        return redirect()->route('client')->withSuccess('Client Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        $jobs = Job::where('client_id',$client->id)->get();
        $vendors = $client->vendors;
        // dd($vendors);
        return view('client.assignment',compact('client','jobs','vendors'));
    }

    public function clientJob(Client $client, Job $job){
        // dd($vendor,$job);
        $clients = Client::all();
        $states =  DB::table('states')->get();
        $cities =  DB::table('cities')->get();
        return view('client.client_jobs',compact('client','job','clients','states','cities'));
    }
    public function clientVendor(Client $client,Vendor $vendor){
        // dd($vendor,$job);
        // $clients = Client::all();
        $states =  DB::table('states')->get();
        $cities =  DB::table('cities')->get();
        return view('client.client_vendors',compact('client','vendor','states','cities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $states =  DB::table('states')->get();
        $cities =  DB::table('cities')->get();
        $vendors = Vendor::all();
        return view('client.edit',compact('states','cities','vendors','client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required',
            'website' => 'required',
            'linkedln_page' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'marital_status' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'company_size' => 'required',
            'industry' => 'required',
            'year_founded' => 'required',
            // 'admin_documents' => 'required',
            // 'admin_documents.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
            // 'vendor_documents' => 'required',
            // 'vendor_documents.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $vendor_images = [];
        if ($files = $request->file('vendor_documents')) {
            $destination = public_path($client->vendor_documents);

            if (File::exists($destination)) {
                File::delete($destination);
            }
            foreach($files as $file){
                $name = $file->getClientOriginalName();
                $filename = time() . '.' . $name;
                $file->move(public_path('clients/') , $filename);
                $vendor_images[] = $filename;
            }
        }

        $admin_images = [];
        if ($files = $request->file('admin_documents')) {
            $destination = public_path($client->admin_documents);

            if (File::exists($destination)) {
                File::delete($destination);
            }

            foreach($files as $file){
                $name = $file->getClientOriginalName();
                $filename = time() . '.' . $name;
                $file->move(public_path('clients/') , $filename);
                $admin_images[] = $filename;
            }
        }

        $client->name = $request->name;
        $client->website = $request->website;
        $client->linkedln_page = $request->linkedln_page;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->address = $request->address;
        $client->marital_status = $request->marital_status;
        $client->state_id = $request->state;
        $client->city_id = $request->city;
        $client->state_id = $request->state;
        $client->country = $request->country;
        $client->company_size = $request->company_size;
        $client->industry = $request->industry;
        $client->year_founded = $request->year_founded;
        $client->vendor_documents = implode('|' , $vendor_images);
        $client->admin_documents = implode('|' , $admin_images);
        $save_data = $client->save();
        if($save_data){
            ClientVendor::where('client_id' , $client->id)->delete();
            foreach($request->vendor as $vendor_id){
                $client_vendor = new ClientVendor();
                $client_vendor->client_id = $client->id;
                $client_vendor->vendor_id = $vendor_id;
                $client_vendor->save();
            }
        }
        return redirect()->route('client')->withSuccess('Client Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function delete(Client $client)
    {
        $client->delete();
        return redirect()->route('client')->withSuccess('Client Deleted Successfully');
    }

    public function changeClientStatus(Request $request , Client $client)
    {
        $client->status = $request->status;
        $client->save();
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
        foreach($request->clients as $client){
            foreach($request->vendors as $vendor){
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
        return response()->json([
            'message' => 'Vendor assign successfully'
        ]);
    }

    public function activeStatus(Request $request){
        foreach($request->clients as $client_id){
            $client = Client::where('id',$client_id)->first();
            $client->status = 1;
            $client->save();
        }
        return response()->json([
            'message' => 'Status Updated Successfully'
        ]);
    }

    public function inactiveStatus(Request $request){
        foreach($request->clients as $client_id){
            $client = Client::where('id',$client_id)->first();
            $client->status = 0;
            $client->save();
        }
        return response()->json([
            'message' => 'Status Updated Successfully'
        ]);
    }
}

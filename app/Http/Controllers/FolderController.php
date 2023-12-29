<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientVendor;
use App\Models\Folder;
use App\Models\FolderJobClient;
use App\Models\Job;
use App\Models\VendorJob;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Folder::with('folderItems');
        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->input('title') . '%');
        }

        $folders = $query->paginate(6);
        return view('folder.index', compact('folders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        $jobs = Job::all();
        return view('folder.create', compact('clients', 'jobs'));
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
        $jobs = Job::where('title', 'LIKE', "%$query%")
            ->get();
        return response()->json($jobs);
    }

    public function searchSelectedClients(Request $request, Folder $folder)
    {
        $query = $request->input('query');
        $clients = Client::where('name', 'LIKE', "%$query%")
            ->get();
        $selected_clients = FolderJobClient::where('folder_id', $folder->id)->get();
        return response()->json([$clients, $selected_clients]);
    }

    public function searchSelectedJobs(Request $request, Folder $folder)
    {
        $query = $request->input('query');
        $jobs = Job::where('title', 'LIKE', "%$query%")
            ->get();
        $selected_jobs = FolderJobClient::where('folder_id', $folder->id)->get();
        return response()->json([$jobs, $selected_jobs]);
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
            'category' => 'required',
            'jobs' => 'required_without:clients', // job is required when client is not present
            'clients' => 'required_without:jobs', // client is required when job is not present
        ]);

        $folder = new Folder();
        $folder->title = $request->title;
        $folder->category = $request->category;
        $save_data = $folder->save();
        if ($save_data) {
            if ($request->filled('jobs')) {
                foreach ($request->jobs as $job_id) {
                    $folder_client_job = new FolderJobClient();
                    $folder_client_job->category = $folder->category;
                    $folder_client_job->folder_id = $folder->id;
                    $folder_client_job->job_id = $job_id;
                    $folder_client_job->save();
                }
            }
            if ($request->filled('clients')) {
                foreach ($request->clients as $client_id) {
                    $folder_client_job = new FolderJobClient();
                    $folder_client_job->category = $folder->category;
                    $folder_client_job->folder_id = $folder->id;
                    $folder_client_job->client_id = $client_id;
                    $folder_client_job->save();
                }
            }
        }
        return redirect()->route('folder')->withSuccess('Folder Created Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Folder $folder)
    {
        $clients = Client::all();
        $jobs = Job::all();
        return view('folder.edit', compact('folder', 'jobs', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Folder $folder)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'jobs' => 'required_without:clients', // job is required when client is not present
            'clients' => 'required_without:jobs', // client is required when job is not present
        ]);

        $folder->title = $request->title;
        $folder->category = $request->category;
        $save_data = $folder->save();
        if ($save_data) {
            FolderJobClient::where('folder_id', $folder->id)->delete();
            if ($request->filled('jobs')) {
                foreach ($request->jobs as $job_id) {
                    $folder_client_job = new FolderJobClient();
                    $folder_client_job->category = $folder->category;
                    $folder_client_job->folder_id = $folder->id;
                    $folder_client_job->job_id = $job_id;
                    $folder_client_job->save();
                }
            }
            if ($request->filled('clients')) {
                foreach ($request->clients as $client_id) {
                    $folder_client_job = new FolderJobClient();
                    $folder_client_job->category = $folder->category;
                    $folder_client_job->folder_id = $folder->id;
                    $folder_client_job->client_id = $client_id;
                    $folder_client_job->save();
                }
            }
        }
        return redirect()->route('folder')->withSuccess('Folder Created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function delete(Folder $folder)
    {
        $folder->delete();
        return redirect()->route('folder')->withSuccess('Folder Deleted Successfully');
    }

    public function changeStatus(Request $request, Folder $folder)
    {
        $folder->status = $request->status;
        $folder->save();
        return response()->json([
            'message' => 'Status Chnaged Successfully'
        ]);
    }

    public function assignVendor(Request $request)
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
            'message' => 'Vendor assign successfully'
        ]);
    }

    public function activeStatus(Request $request)
    {
        // dd($request->folders);
        foreach ($request->folders as $folder_id) {
            $folder = folder::where('id', $folder_id)->first();
            $folder->status = 1;
            $folder->save();
        }
        return response()->json([
            'message' => 'Status Updated Successfully'
        ]);
    }

    public function inactiveStatus(Request $request)
    {
        foreach ($request->folders as $folder_id) {
            $folder = folder::where('id', $folder_id)->first();
            $folder->status = 0;
            $folder->save();
        }
        return response()->json([
            'message' => 'Status Updated Successfully'
        ]);
    }

    public function bulkDelete(Request $request){
        dd($request->folders);
        foreach($request->folders as $folder_id){
            $folder = Folder::where('id',$folder_id)->first();
            $folder->delete();
        }
        return response()->json([
            'message' => 'Candidate Deleted Successfully'
        ]);
    }
}

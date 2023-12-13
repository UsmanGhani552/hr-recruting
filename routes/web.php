<?php

use App\Http\Controllers\AddAdminController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Submission;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\VendorInvitationController;
use App\Http\Controllers\ViewDetailsController;
use App\Models\Candidate;
use App\Models\Client;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});


//auth
// Route::view('/login','login');
Route::view('/registerr', 'register');
Route::get('/vendor/create', [VendorController::class, 'create'])->name('vendor-create');
Route::post('/vendor/store', [VendorController::class, 'store'])->name('vendor-store');

Route::middleware('auth')->group(function () {
    //dashboard
    Route::view('/dashboard', 'dashboard.index')->name('dashboard');


    Route::controller(PermissionController::class)->prefix('/permission')->name('permission.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{permission}', 'edit')->name('edit');
        Route::post('/update/{permission}', 'update')->name('update');
        Route::get('/destroy/{permission}', 'destroy')->name('destroy');
    });

    Route::controller(RoleController::class)->prefix('/role')->name('role.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{role}', 'edit')->name('edit');
        Route::post('/update/{role}', 'update')->name('update');
        Route::get('/delete/{role}', 'destroy')->name('delete');
    });

    Route::controller(AddAdminController::class)->prefix('/add-admin')->name('add-admin.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{addAdmin}', 'edit')->name('edit');
        Route::post('/update/{addAdmin}', 'update')->name('update');
        Route::get('/destroy/{addAdmin}', 'destroy')->name('destroy');
    });

     // ---------------------------------------------------- vendor ----------------------------------------------------

     Route::get('/vendor/dashboard', [VendorController::class, 'index'])->name('vendor-dashboard');
     Route::get('/vendor/edit/{vendor}', [VendorController::class, 'edit'])->name('vendor-edit');
     Route::post('/vendor/update/{vendor}', [VendorController::class, 'update'])->name('vendor-update');
     Route::get('/vendor/delete/{vendor}', [VendorController::class, 'delete'])->name('vendor-delete');
     Route::view('/vendor/submission', 'vendor.submission')->name('vendor-submission');
     Route::get('/vendor/change-status/{vendor}', [VendorController::class, 'changeVendorStatus'])->name('vendor.change-status');
     Route::get('/vendor/assignment/{vendor}', [VendorController::class, 'show'])->name('vendor-assignment');

     // vendor view assignments
     Route::get('/vendor/{vendor}/job/{job}', [VendorController::class, 'vendorJob'])->name('vendor.job.details');
     Route::get('/vendor/{vendor}/client/{client}', [VendorController::class, 'vendorclient'])->name('vendor.client.details');
     Route::get('/vendor/{vendor}/team/{team}', [VendorController::class, 'vendorteam'])->name('vendor.team.details');
     Route::get('/vendor/{vendor}/candidate/{candidate}', [VendorController::class, 'vendorcandidate'])->name('vendor.candidate.details');

     //vendor invitation
     Route::get('/vendor/invite', [VendorInvitationController::class, 'index'])->name('vendor-invite');
     Route::post('/vendor/invite/send-email', [VendorInvitationController::class, 'sendEmail'])->name('vendor-send-email');
     // Route::get('/vendor/change-status/{vendor}', [VendorController::class, 'changeVendorStatus'])->name('vendor.change-status');

     //bulk actions
     Route::get('/vendor/search-client', [VendorController::class, 'searchClient'])->name('vendor.search-client');
     Route::get('/vendor/search-job', [VendorController::class, 'searchJob'])->name('vendor.search-job');
     Route::get('/vendor/search-folder', [VendorController::class, 'searchFolder'])->name('vendor.search-folder');
     Route::post('/vendor/assign-client', [VendorController::class, 'assignClient'])->name('vendor.assign-client');
     Route::post('/vendor/assign-job', [VendorController::class, 'assignJob'])->name('vendor.assign-job');
     Route::post('/vendor/assign-folder', [VendorController::class, 'assignFolder'])->name('vendor.assign-folder');
     Route::post('/vendor/active-status', [VendorController::class, 'activeStatus'])->name('vendor.active-status');
     Route::post('/vendor/inactive-status', [VendorController::class, 'inactiveStatus'])->name('vendor.inactive-status');

     // ---------------------------------------------------end vendor--------------------------------------------------


     // ------------------------------------------------------candidate ----------------------------------------------

    Route::view('/candidate/assignment', 'candidate.assignment')->name('candidate.assignment');
    Route::get('/candidate/', [CandidateController::class, 'index'])->name('candidate');
    Route::get('/candidate/create', [CandidateController::class, 'create'])->name('candidate.create');
    Route::post('/candidate/store', [CandidateController::class, 'store'])->name('candidate.store');
    Route::get('/candidate/edit/{candidate}', [CandidateController::class, 'edit'])->name('candidate.edit');
    Route::post('/candidate/update/{candidate}', [CandidateController::class, 'update'])->name('candidate.update');
    Route::get('/candidate/delete/{candidate}', [CandidateController::class, 'delete'])->name('candidate.delete');
    Route::get('/candidate/change-status/{candidate}', [CandidateController::class, 'changeCandidateStatus'])->name('candidate.change-status');
    // bulk actions
    Route::post('/candidate/active-status', [CandidateController::class, 'activeStatus'])->name('candidate.active-status');
    Route::post('/candidate/inactive-status', [CandidateController::class, 'inactiveStatus'])->name('candidate.inactive-status');
    Route::post('/candidate/bulk-delete', [CandidateController::class, 'bulkDelete'])->name('candidate.bulk-delete');

    // -------------------------------------------------------end candidate ----------------------------------------------



    // -------------------------------------------------------team ----------------------------------------------

    Route::view('/team/add-new-candidate', 'team.add_new_candidate')->name('team-add-new-candidate');
    Route::get('/team/', [TeamController::class, 'index'])->name('team');
    Route::get('/team/create', [TeamController::class, 'create'])->name('team.create');
    Route::post('/team/store', [TeamController::class, 'store'])->name('team.store');
    Route::get('/team/edit/{team}', [TeamController::class, 'edit'])->name('team.edit');
    Route::post('/team/update/{team}', [TeamController::class, 'update'])->name('team.update');
    Route::get('/team/delete/{team}', [TeamController::class, 'delete'])->name('team.delete');
    Route::get('/team/assignment/{team}', [TeamController::class, 'show'])->name('team.show');
    Route::get('/team/change-status/{team}', [TeamController::class, 'changeTeamStatus'])->name('team.change-status');
    // view assignment
    Route::get('/team/{team}/job/{job}', [TeamController::class, 'teamJob'])->name('team.job.details');
    Route::get('/team/{team}/client/{client}', [TeamController::class, 'teamClient'])->name('team.client.details');
    // bulk actions
    Route::post('/team/active-status', [TeamController::class, 'activeStatus'])->name('team.active-status');
    Route::post('/team/inactive-status', [TeamController::class, 'inactiveStatus'])->name('team.inactive-status');
    Route::post('/team/assign-client', [TeamController::class, 'assignClient'])->name('team.assign-client');
    Route::post('/team/assign-job', [TeamController::class, 'assignJob'])->name('team.assign-job');

    // ---------------------------------------------------end team------------------------------------------------------



    // ---------------------------------------------------jobs ----------------------------------------------

    Route::get('/jobs/assignment/{job}', [JobController::class, 'show'])->name('job.show');
    Route::get('/job', [JobController::class, 'index'])->name('job');
    Route::get('/job/create', [JobController::class, 'create'])->name('job.create');
    Route::post('/job/store', [JobController::class, 'store'])->name('job.store');
    Route::get('/job/edit/{job}', [JobController::class, 'edit'])->name('job.edit');
    Route::post('/job/update/{job}', [JobController::class, 'update'])->name('job.update');
    Route::get('/job/delete/{job}', [JobController::class, 'delete'])->name('job.delete');
    Route::get('/jobs/submission/{job}',[JobController::class, 'submission'])->name('job.submission');
    Route::post('/jobs/store-submission',[JobController::class, 'storeSubmission'])->name('job.store-submission');
    Route::get('/job/change-status/{job}', [JobController::class, 'changeJobStatus'])->name('job.change-status');
    Route::get('/job/{job}/vendor/{vendor}', [JobController::class, 'jobvendor'])->name('job.vendor.details');
    // bulk actions
    Route::get('/job/search-vendor', [jobController::class, 'searchVendor'])->name('job.search-vendor');
    Route::post('/job/assign-vendor', [jobController::class, 'assignVendor'])->name('job.assign-vendor');
    Route::post('/job/active-status', [JobController::class, 'activeStatus'])->name('job.active-status');
    Route::post('/job/inactive-status', [JobController::class, 'inactiveStatus'])->name('job.inactive-status');
    Route::post('/job/bulk-delete', [JobController::class, 'bulkDelete'])->name('job.bulk-delete');

    // ------------------------------------------------------end job------------------------------------------------------



   // -------------------------------------------------------client ----------------------------------------------

    Route::get('/client', [ClientController::class, 'index'])->name('client');
    Route::get('/client/create', [ClientController::class, 'create'])->name('client.create');
    Route::post('/client/store', [ClientController::class, 'store'])->name('client.store');
    Route::get('/client/search-vendors', [ClientController::class, 'search'])->name('vendor.search');
    Route::get('/client/selected-vendors/{client}', [ClientController::class, 'searchSelected'])->name('vendor.selected');
    Route::get('/client/edit/{client}', [ClientController::class, 'edit'])->name('client.edit');
    Route::post('/client/update/{client}', [ClientController::class, 'update'])->name('client.update');
    Route::get('/client/delete/{client}', [ClientController::class, 'delete'])->name('client.delete');
    Route::get('/client/assignment/{client}', [ClientController::class, 'show'])->name('client.show');
    Route::view('/client/submission-details', 'client.submission_details')->name('jobs-submission-details');
    Route::get('/client/change-status/{client}', [ClientController::class, 'changeClientStatus'])->name('client.change-status');
    Route::get('/client/{client}/job/{job}', [ClientController::class, 'clientJob'])->name('client.job.details');
    Route::get('/client/{client}/vendor/{vendor}', [ClientController::class, 'clientvendor'])->name('client.vendor.details');
    // bulk actions
    Route::get('/client/search-vendor', [ClientController::class, 'searchVendor'])->name('client.search-vendor');
    Route::post('/client/assign-vendor', [ClientController::class, 'assignVendor'])->name('client.assign-vendor');
    Route::post('/client/active-status', [ClientController::class, 'activeStatus'])->name('client.active-status');
    Route::post('/client/inactive-status', [ClientController::class, 'inactiveStatus'])->name('client.inactive-status');

    // -----------------------------------------------------end client----------------------------------------------



    // --------------------------------------------------------folder ------------------------------------------------

    Route::get('/folder/', [FolderController::class, 'index'])->name('folder');
    Route::get('/folder/create', [FolderController::class, 'create'])->name('folder.create');
    Route::get('/folder/search-clients', [FolderController::class, 'searchClient'])->name('folder.search');
    Route::get('/folder/search-jobs', [FolderController::class, 'searchJob'])->name('folder.jobs');
    Route::get('/folder/selected-clients/{folder}', [FolderController::class, 'searchSelectedClients'])->name('folder.selected-clients');
    Route::get('/folder/selected-jobs/{folder}', [FolderController::class, 'searchSelectedJobs'])->name('folder.selected-jobs');
    Route::post('/folder/store', [FolderController::class, 'store'])->name('folder.store');
    Route::get('/folder/edit/{folder}', [FolderController::class, 'edit'])->name('folder.edit');
    Route::post('/folder/update/{folder}', [FolderController::class, 'update'])->name('folder.update');
    Route::get('/folder/delete/{folder}', [FolderController::class, 'delete'])->name('folder.delete');
    Route::get('/folder/change-status/{folder}', [FolderController::class, 'changeStatus'])->name('folder.change-status');
    // bulk actions
    // Route::get('/client/search-vendor', [ClientController::class, 'searchVendor'])->name('client.search-vendor');
    Route::post('/folder/assign-vendor', [FolderController::class, 'assignVendor'])->name('folder.assign-vendor');
    Route::post('/folder/active-status', [FolderController::class, 'activeStatus'])->name('folder.active-status');
    Route::post('/folder/inactive-status', [FolderController::class, 'inactiveStatus'])->name('folder.inactive-status');
    Route::post('/folder/bulk-delete', [FolderController::class, 'bulkDelete'])->name('folder.bulk-delete');

    // -----------------------------------------------------------end folder ----------------------------------------------

       // ------------------------------------------------------ Submission ----------------------------------------------------

       Route::get('/submissions/', [SubmissionController::class, 'index'])->name('submissions');
       Route::get('/submission/delete/{submission}', [SubmissionController::class, 'delete'])->name('submission.delete');
       Route::get('/submission/show/{submission}', [SubmissionController::class, 'show'])->name('submission.show');
       Route::get('/submission/send-email/{submission}', [SubmissionController::class, 'sendEmail'])->name('submission.send-email');

       // -------------------------------------------------- view details -------------------------------------------------------

       Route::get('/job/{job}', [ViewDetailsController::class, 'jobDetails'])->name('job.details');
       Route::get('/client/{client}', [ViewDetailsController::class, 'clientDetails'])->name('client.details');
       Route::get('/candidate/{candidate}', [ViewDetailsController::class, 'candidateDetails'])->name('candidate.details');
       Route::get('/vendor/{vendor}', [ViewDetailsController::class, 'vendorDetails'])->name('vendor.details');
       Route::get('/team/{team}', [ViewDetailsController::class, 'teamDetails'])->name('team.details');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

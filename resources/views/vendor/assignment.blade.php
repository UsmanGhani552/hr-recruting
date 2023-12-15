<?php
$title = 'Vendor Assignment';
$keywords = '';
$desc = '';
$pageclass = 'demopg';
use App\Models\Job;
?>

@extends('layout.master')

@section('top_nav')
    @include('layout.header')
@endsection

@section('main_content')
    <section class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="bnr_left">
                        <p>Vendors Dashboard/ Zach HR</p>
                    </div>
                </div>

                <div class="col-md-6 text-end">

                </div>
            </div>
        </div>
    </section>


    <div class="container">
        <section class="vender-assignment">

            <div id="tabs-container">
                <ul class="tabs-menu">
                    <li class="current"><a href="#tab-1">Jobs</a></li>
                    <li><a href="#tab-2">Clients</a></li>
                    <li><a href="#tab-3">Teams</a></li>
                    <li><a href="#tab-4">Candidates</a></li>
                    <li><a href="#tab-5">Submissions</a></li>
                </ul>
                <div class="tab">
                    <div id="tab-1" class="tab-content">
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6 text-end">
                                <ul class="vendordash_invite">
                                    <li>
                                        <a class="cbtn" href="javascript:;"><img
                                                src="{{ asset('assets/images/filter.png') }}">Filters</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <br>
                        <div class="outbox outbox2">
                            <table>
                                <thead>
                                    <tr>
                                        <th>
                                            <label for="">
                                                ID
                                            </label>
                                        </th>
                                        <th>Job Title</th>
                                        <th>Client Name</th>
                                        <th>Department</th>
                                        <th>Country</th>
                                        <th>Salary Range</th>
                                        <th>
                                            <div class="mydropdown">
                                                <ul class="dropbtn icons">
                                                    <li></li>
                                                    <li></li>
                                                    <li></li>
                                                </ul>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($jobs as $job)
                                        <tr>
                                            <td>
                                                <label for="">

                                                    {{ $job->id }}
                                                </label>
                                            </td>
                                            <td>{{ $job->title }}</td>
                                            <td>{{ $job->clients->name }}</td>
                                            <td>{{ $job->department }}</td>
                                            <td>{{ $job->country }}</td>
                                            <td>{{ $job->salary_range }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <ul class="dropbtn icons">
                                                        <li></li>
                                                        <li></li>
                                                        <li></li>
                                                    </ul>
                                                    <div id="myDropdown" class="dropdown-content">
                                                        <a href="{{ route('job.details', $job->id) }}"><img
                                                                src="{{ asset('assets/images/eye.png') }}">View</a>
                                                        <a href="{{ route('job.submission', $job->id) }}"><img
                                                                src="{{ asset('assets/images/eye.png') }}">Submission</a>
                                                        <a
                                                            href="{{ route('vendor.delete-assigned-job', ['job' => $job->id, 'vendor' => $vendor->id]) }}"><img
                                                                src="{{ asset('assets/images/delete.png') }}">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="showrow">
                                        Show rows
                                        <select>
                                            <option>5 items</option>
                                            <option>10 items</option>
                                            <option>20 items</option>
                                        </select>
                                    </label>
                                </div>
                                @include('layout.pagination', ['paginator' => $jobs])
                            </div>

                        </div>
                    </div>
                    <div id="tab-2" class="tab-content">
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6 text-end">
                                <ul class="vendordash_invite">
                                    <li>
                                        <a class="cbtn" href="javascript:;"><img
                                                src="{{ asset('assets/images/filter.png') }}">Filters</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <br>
                        <div class="outbox outbox2">
                            <table>
                                <thead>
                                    <tr>
                                        <th>
                                            <label for="">
                                                ID
                                            </label>
                                        </th>
                                        <th>Client Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Address</th>
                                        <th>No. of Jobs</th>
                                        <th>
                                            <div class="mydropdown">
                                                <ul class="dropbtn icons">
                                                    <li></li>
                                                    <li></li>
                                                    <li></li>
                                                </ul>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($clients as $client)
                                        <?php $no_of_jobs = Job::where('client_id', $client->id)->count(); ?>
                                        <tr>
                                            <td>
                                                <label for="">

                                                    {{ $client->id }}
                                                </label>
                                            </td>
                                            <td>{{ $client->name }}</td>
                                            <td>{{ $client->email }}</td>
                                            <td>{{ $client->phone }}</td>
                                            <td>{{ $client->address }}</td>
                                            <td>
                                                @if (!empty($no_of_jobs))
                                                    {{ $no_of_jobs }}
                                                @else
                                                    None
                                                @endif
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <ul class="dropbtn icons">
                                                        <li></li>
                                                        <li></li>
                                                        <li></li>
                                                    </ul>
                                                    <div id="myDropdown" class="dropdown-content">
                                                        <a href="{{ route('client.details', $client->id) }}"><img
                                                                src="{{ asset('assets/images/eye.png') }}">View</a>
                                                        <a
                                                            href="{{ route('vendor.delete-assigned-client', ['client' => $client->id, 'vendor' => $vendor->id]) }}"><img
                                                                src="{{ asset('assets/images/delete.png') }}">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="showrow">
                                        Show rows
                                        <select>
                                            <option>5 items</option>
                                            <option>10 items</option>
                                            <option>20 items</option>
                                        </select>
                                    </label>
                                </div>
                                @include('layout.pagination', ['paginator' => $clients])
                            </div>

                        </div>
                    </div>
                    <div id="tab-3" class="tab-content">
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6 text-end">
                                <ul class="vendordash_invite">
                                    <li>
                                        <a class="cbtn" href="javascript:;"><img
                                                src="{{ asset('assets/images/filter.png') }}">Filters</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <br>
                        <div class="outbox outbox2">
                            <table>
                                <thead>
                                    <tr>
                                        <th>
                                            <label for="">
                                                ID
                                            </label>
                                        </th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Company Name</th>
                                        <th>
                                            <div class="mydropdown">
                                                <ul class="dropbtn icons">
                                                    <li></li>
                                                    <li></li>
                                                    <li></li>
                                                </ul>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($teams as $team)
                                        <tr>
                                            <td>
                                                <label for="">

                                                    {{ $team->id }}
                                                </label>
                                            </td>
                                            <td>{{ $team->name }}</td>
                                            <td>{{ $team->email }}</td>
                                            <td>{{ Auth::user()->name }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <ul class="dropbtn icons">
                                                        <li></li>
                                                        <li></li>
                                                        <li></li>
                                                    </ul>
                                                    <div id="myDropdown" class="dropdown-content">
                                                        <a href="{{ route('team.details', $team->id) }}"><img
                                                                src="{{ asset('assets/images/eye.png') }}">View</a>
                                                        <a
                                                            href="{{ route('vendor.delete-team-member', ['team' => $team->id, 'vendor' => $vendor->id]) }}"><img
                                                                src="{{ asset('assets/images/delete.png') }}">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="showrow">
                                        Show rows
                                        <select>
                                            <option>5 items</option>
                                            <option>10 items</option>
                                            <option>20 items</option>
                                        </select>
                                    </label>
                                </div>
                                @include('layout.pagination', ['paginator' => $teams])
                            </div>

                        </div>
                    </div>
                    <div id="tab-4" class="tab-content">
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6 text-end">
                                <ul class="vendordash_invite">
                                    <li>
                                        <a class="cbtn" href="javascript:;"><img
                                                src="{{ asset('assets/images/filter.png') }}">Filters</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <br>
                        <div class="outbox outbox2">
                            <table>
                                <thead>
                                    <tr>
                                        <th>
                                            <label for="">
                                                ID
                                            </label>
                                        </th>
                                        <th>Candidate Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Country</th>
                                        <th>
                                            <div class="mydropdown">
                                                <ul class="dropbtn icons">
                                                    <li></li>
                                                    <li></li>
                                                    <li></li>
                                                </ul>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($candidates as $candidate)
                                        <tr>
                                            <td>
                                                <label for="">

                                                    {{ $candidate->id }}
                                                </label>
                                            </td>
                                            <td>{{ $candidate->first_name }} {{ $candidate->last_name }}</td>
                                            <td>{{ $candidate->email }}</td>
                                            <td>{{ $candidate->phone }}</td>
                                            <td>{{ $candidate->country }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <ul class="dropbtn icons">
                                                        <li></li>
                                                        <li></li>
                                                        <li></li>
                                                    </ul>
                                                    <div id="myDropdown" class="dropdown-content">
                                                        <a href="{{ route('candidate.details', $candidate->id) }}"><img
                                                                src="{{ asset('assets/images/eye.png') }}">View</a>
                                                        <a
                                                            href="{{ route('vendor.delete-candidate', ['candidate' => $candidate->id, 'vendor' => $vendor->id]) }}"><img
                                                                src="{{ asset('assets/images/delete.png') }}">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="showrow">
                                        Show rows
                                        <select>
                                            <option>5 items</option>
                                            <option>10 items</option>
                                            <option>20 items</option>
                                        </select>
                                    </label>
                                </div>
                                @include('layout.pagination', ['paginator' => $candidates])
                            </div>

                        </div>
                    </div>
                    <div id="tab-5" class="tab-content">
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6 text-end">
                                <ul class="vendordash_invite">
                                    <li>
                                        <a class="cbtn" href="javascript:;"><img
                                                src="{{ asset('assets/images/filter.png') }}">Filters</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <br>
                        <div class="outbox outbox2">
                            <table>
                                <thead>
                                    <tr>
                                        <th>
                                            <label for="">
                                                ID
                                            </label>
                                        </th>
                                        <th>Job Title</th>
                                        <th>Client</th>
                                        <th>Vendor</th>
                                        <th>Candidate</th>
                                        <th>
                                            <div class="mydropdown">
                                                <ul class="dropbtn icons">
                                                    <li></li>
                                                    <li></li>
                                                    <li></li>
                                                </ul>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>

                                @foreach ($submissions as $submission)
                                        <tr>
                                            <td>
                                                <label for="">
                                                    <input type="checkbox" name="" value="{{ $submission->id }}"
                                                        class="submission-checkbox">
                                                    {{ $submission->id }}
                                                </label>
                                            </td>
                                            <td>{{ $submission->job->title }}</td>
                                            <td>{{ $submission->client->name }}</td>
                                            @if ($submission->vendor_id == 1)
                                                <td>{{ $submission->user->name }}</td>
                                            @else
                                                <td>{{ $submission->vendor->first_name }}
                                                    {{ $submission->vendor->last_name }}</td>
                                            @endif
                                            <td>{{ $submission->candidate->first_name }}
                                                {{ $submission->candidate->last_name }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <ul class="dropbtn icons">
                                                        <li></li>
                                                        <li></li>
                                                        <li></li>
                                                    </ul>
                                                    <div id="myDropdown" class="dropdown-content">
                                                        {{-- @can('Submission edit') --}}
                                                        <a href="{{ route('submission.show', $submission->id) }}"><img
                                                                src="{{ asset('assets/images/edit.png') }}">view</a>
                                                        {{-- @endcan --}}
                                                        @can('Submission delete')
                                                            <a href="{{ route('submission.delete', $submission->id) }}"><img
                                                                    src="{{ asset('assets/images/delete.png') }}">Delete</a>
                                                        @endcan
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                            </table>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="showrow">
                                        Show rows
                                        <select>
                                            <option>5 items</option>
                                            <option>10 items</option>
                                            <option>20 items</option>
                                        </select>
                                    </label>
                                </div>
                                @include('layout.pagination', ['paginator' => $submissions])
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    @include('layout.footer')
@endsection

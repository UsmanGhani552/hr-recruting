<?php
$title = 'Client Assisment';
$keywords = '';
$desc = '';
$pageclass = 'cleintasist';
use App\Models\Team;
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
                        <p>Dashboard/</p>
                    </div>
                </div>

                <div class="col-md-6 text-end">

                </div>
            </div>
        </div>
    </section>

    <section class="vender-assignment">
        <div class="container">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div id="tabs-container">
                <ul class="tabs-menu">
                    <li class="current"><a href="#tab-1">Jobs</a></li>
                    <li><a href="#tab-2">Vendors</a></li>
                    <li><a href="#tab-3">Submissions</a></li>
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
                                        <th>Department</th>
                                        <th>Employment Type</th>
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
                                    @foreach ($jobs as $job)
                                        <tr>
                                            <td>
                                                <label for="">

                                                    {{ $job->id }}
                                                </label>
                                            </td>
                                            <td>{{ $job->title }}</td>
                                            <td>{{ $job->department }}</td>
                                            <td>{{ $job->employment_type }}</td>
                                            <td>{{ $job->country }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <ul class="dropbtn icons">
                                                        <li></li>
                                                        <li></li>
                                                        <li></li>
                                                    </ul>
                                                    <div id="myDropdown" class="dropdown-content">
                                                        <a
                                                            href="{{ route('job.details', $job->id) }}"><img
                                                                src="{{ asset('assets/images/eye.png') }}">View</a>
                                                        <a href="{{route('job.submission',$job->id)}}"><img
                                                                src="{{ asset('assets/images/eye.png') }}">Submission</a>
                                                        <a href="{{route('client.delete-assigned-job', ['client' => $client->id, 'job' => $job->id])}}"><img
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
                                        <th>Vendor Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Team Members</th>
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
                                    @foreach ($vendors as $vendor)
                                        <?php $teams = Team::where('vendor_id', $vendor->id)->count(); ?>
                                        <tr>
                                            <td>
                                                <label for="">

                                                    {{ $vendor->id }}
                                                </label>
                                            </td>
                                            <td>{{ $vendor->first_name }} {{ $vendor->last_name }}</td>
                                            <td>{{ $vendor->email }}</td>
                                            <td>{{ $vendor->phone }}</td>
                                            <td>{{ $teams }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <ul class="dropbtn icons">
                                                        <li></li>
                                                        <li></li>
                                                        <li></li>
                                                    </ul>
                                                    <div id="myDropdown" class="dropdown-content">
                                                        <a href="{{ route('vendor.details', $vendor->id) }}"><img
                                                                src="{{ asset('assets/images/eye.png') }}">View</a>
                                                        <a href="{{route('vendor.delete-assigned-client', ['client' => $client->id, 'vendor' => $vendor->id])}}"><img
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
                                @include('layout.pagination', ['paginator' => $vendors])
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

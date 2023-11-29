<?php
$title = "Vendor Assignment";
$keywords = "";
$desc = "";
$pageclass = "demopg";
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

<section class="vender-assignment">
	<div class="container">
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
                                    <a class="cbtn" href="javascript:;"><img src="{{asset('assets/images/filter.png')}}">Filters</a>
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

                                                {{$job->id}}
                                                </label>
                                            </td>
                                            <td>{{$job->title}}</td>
                                            <td>{{$job->clients->name}}</td>
                                            <td>{{$job->department}}</td>
                                            <td>{{$job->country}}</td>
                                            <td>{{$job->salary_range}}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <ul class="dropbtn icons">
                                                        <li></li>
                                                        <li></li>
                                                        <li></li>
                                                    </ul>
                                                    <div id="myDropdown" class="dropdown-content">
                                                        <a href="javascript:;"><img src="{{asset('assets/images/eye.png')}}">View</a>
                                                        <a href="javascript:;"><img src="{{asset('assets/images/delete.png')}}">Delete</a>
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
                                    <div class="col-md-6">
                                        <ul class="pagination">
                                            <li><a href="javascript:;"><i class="fa fa-angle-left"></i></a></li>
                                            <li><a href="javascript:;">1</a></li>
                                            <li><a href="javascript:;">2</a></li>
                                            <li><a href="javascript:;">3</a></li>
                                            <li><a href="javascript:;">4</a></li>
                                            <li><a href="javascript:;"><i class="fa fa-angle-right"></i></a></li>
                                        </ul>
                                    </div>
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
                                    <a class="cbtn" href="javascript:;"><img src="{{asset('assets/images/filter.png')}}">Filters</a>
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
                                        <?php $no_of_jobs = Job::where('client_id', $client->id)->count() ?>
                                        <tr>
                                            <td>
                                                <label for="">

                                                {{$client->id}}
                                                </label>
                                            </td>
                                            <td>{{$client->name}}</td>
                                            <td>{{$client->email}}</td>
                                            <td>{{$client->phone}}</td>
                                            <td>{{$client->address}}</td>
                                            <td>@if(!empty($no_of_jobs))
                                                {{$no_of_jobs}}
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
                                                        <a href="javascript:;"><img src="{{asset('assets/images/eye.png')}}">View</a>
                                                        <a href="javascript:;"><img src="{{asset('assets/images/delete.png')}}">Delete</a>
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
                                    <div class="col-md-6">
                                        <ul class="pagination">
                                            <li><a href="javascript:;"><i class="fa fa-angle-left"></i></a></li>
                                            <li><a href="javascript:;">1</a></li>
                                            <li><a href="javascript:;">2</a></li>
                                            <li><a href="javascript:;">3</a></li>
                                            <li><a href="javascript:;">4</a></li>
                                            <li><a href="javascript:;"><i class="fa fa-angle-right"></i></a></li>
                                        </ul>
                                    </div>
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
                                    <a class="cbtn" href="javascript:;"><img src="{{asset('assets/images/filter.png')}}">Filters</a>
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

                                                {{$team->id}}
                                                </label>
                                            </td>
                                            <td>{{$team->first_name}} {{$team->last_name}}</td>
                                            <td>{{$team->email}}</td>
                                            <td>{{$team->company_name}}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <ul class="dropbtn icons">
                                                        <li></li>
                                                        <li></li>
                                                        <li></li>
                                                    </ul>
                                                    <div id="myDropdown" class="dropdown-content">
                                                        <a href="javascript:;"><img src="{{asset('assets/images/eye.png')}}">View</a>
                                                        <a href="javascript:;"><img src="{{asset('assets/images/delete.png')}}">Delete</a>
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
                                    <div class="col-md-6">
                                        <ul class="pagination">
                                            <li><a href="javascript:;"><i class="fa fa-angle-left"></i></a></li>
                                            <li><a href="javascript:;">1</a></li>
                                            <li><a href="javascript:;">2</a></li>
                                            <li><a href="javascript:;">3</a></li>
                                            <li><a href="javascript:;">4</a></li>
                                            <li><a href="javascript:;"><i class="fa fa-angle-right"></i></a></li>
                                        </ul>
                                    </div>
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
                                    <a class="cbtn" href="javascript:;"><img src="{{asset('assets/images/filter.png')}}">Filters</a>
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

                                                {{$candidate->id}}
                                                </label>
                                            </td>
                                            <td>{{$candidate->first_name}} {{$candidate->last_name}}</td>
                                            <td>{{$candidate->email}}</td>
                                            <td>{{$candidate->phone}}</td>
                                            <td>{{$candidate->country}}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <ul class="dropbtn icons">
                                                        <li></li>
                                                        <li></li>
                                                        <li></li>
                                                    </ul>
                                                    <div id="myDropdown" class="dropdown-content">
                                                        <a href="javascript:;"><img src="{{asset('assets/images/eye.png')}}">View</a>
                                                        <a href="javascript:;"><img src="{{asset('assets/images/delete.png')}}">Delete</a>
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
                                    <div class="col-md-6">
                                        <ul class="pagination">
                                            <li><a href="javascript:;"><i class="fa fa-angle-left"></i></a></li>
                                            <li><a href="javascript:;">1</a></li>
                                            <li><a href="javascript:;">2</a></li>
                                            <li><a href="javascript:;">3</a></li>
                                            <li><a href="javascript:;">4</a></li>
                                            <li><a href="javascript:;"><i class="fa fa-angle-right"></i></a></li>
                                        </ul>
                                    </div>
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
                                    <a class="cbtn" href="javascript:;"><img src="{{asset('assets/images/filter.png')}}">Filters</a>
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
                                            <th>Vendor Name</th>
                                            <th>Candidate Name</th>
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
                                        <tr>
                                            <td>
                                                <label for="">

                                                SKN1200
                                                </label>
                                            </td>
                                            <td>Robert</td>
                                            <td>robert@gmail.com</td>
                                            <td>000-000-000 </td>
                                            <td>12 </td>
                                            <td>
                                                <div class="dropdown">
                                                    <ul class="dropbtn icons">
                                                        <li></li>
                                                        <li></li>
                                                        <li></li>
                                                    </ul>
                                                    <div id="myDropdown" class="dropdown-content">
                                                        <a href="javascript:;"><img src="{{asset('assets/images/eye.png')}}">View</a>
                                                        <a href="javascript:;"><img src="{{asset('assets/images/delete.png')}}">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">

                                                SKN1200
                                                </label>
                                            </td>
                                            <td>Robert</td>
                                            <td>robert@gmail.com</td>
                                            <td>000-000-000 </td>
                                            <td>12 </td>
                                            <td>
                                                <div class="dropdown">
                                                    <ul class="dropbtn icons">
                                                        <li></li>
                                                        <li></li>
                                                        <li></li>
                                                    </ul>
                                                    <div id="myDropdown" class="dropdown-content">
                                                        <a href="javascript:;"><img src="{{asset('assets/images/eye.png')}}">View</a>
                                                        <a href="javascript:;"><img src="{{asset('assets/images/delete.png')}}">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">

                                                SKN1200
                                                </label>
                                            </td>
                                            <td>Robert</td>
                                            <td>robert@gmail.com</td>
                                            <td>000-000-000 </td>
                                            <td>12 </td>
                                            <td>
                                                <div class="dropdown">
                                                    <ul class="dropbtn icons">
                                                        <li></li>
                                                        <li></li>
                                                        <li></li>
                                                    </ul>
                                                    <div id="myDropdown" class="dropdown-content">
                                                        <a href="javascript:;"><img src="{{asset('assets/images/eye.png')}}">View</a>
                                                        <a href="javascript:;"><img src="{{asset('assets/images/delete.png')}}">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">

                                                SKN1200
                                                </label>
                                            </td>
                                            <td>Robert</td>
                                            <td>robert@gmail.com</td>
                                            <td>000-000-000 </td>
                                            <td>12 </td>
                                            <td>
                                                <div class="dropdown">
                                                    <ul class="dropbtn icons">
                                                        <li></li>
                                                        <li></li>
                                                        <li></li>
                                                    </ul>
                                                    <div id="myDropdown" class="dropdown-content">
                                                        <a href="javascript:;"><img src="{{asset('assets/images/eye.png')}}">View</a>
                                                        <a href="javascript:;"><img src="{{asset('assets/images/delete.png')}}">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">

                                                SKN1200
                                                </label>
                                            </td>
                                            <td>Robert</td>
                                            <td>robert@gmail.com</td>
                                            <td>000-000-000 </td>
                                            <td>12 </td>
                                            <td>
                                                <div class="dropdown">
                                                    <ul class="dropbtn icons">
                                                        <li></li>
                                                        <li></li>
                                                        <li></li>
                                                    </ul>
                                                    <div id="myDropdown" class="dropdown-content">
                                                        <a href="javascript:;"><img src="{{asset('assets/images/eye.png')}}">View</a>
                                                        <a href="javascript:;"><img src="{{asset('assets/images/delete.png')}}">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">

                                                SKN1200
                                                </label>
                                            </td>
                                            <td>Robert</td>
                                            <td>robert@gmail.com</td>
                                            <td>000-000-000 </td>
                                            <td>12 </td>
                                            <td>
                                                <div class="dropdown">
                                                    <ul class="dropbtn icons">
                                                        <li></li>
                                                        <li></li>
                                                        <li></li>
                                                    </ul>
                                                    <div id="myDropdown" class="dropdown-content">
                                                        <a href="javascript:;"><img src="{{asset('assets/images/eye.png')}}">View</a>
                                                        <a href="javascript:;"><img src="{{asset('assets/images/delete.png')}}">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">

                                                SKN1200
                                                </label>
                                            </td>
                                            <td>Robert</td>
                                            <td>robert@gmail.com</td>
                                            <td>000-000-000 </td>
                                            <td>12 </td>
                                            <td>
                                                <div class="dropdown">
                                                    <ul class="dropbtn icons">
                                                        <li></li>
                                                        <li></li>
                                                        <li></li>
                                                    </ul>
                                                    <div id="myDropdown" class="dropdown-content">
                                                        <a href="javascript:;"><img src="{{asset('assets/images/eye.png')}}">View</a>
                                                        <a href="javascript:;"><img src="{{asset('assets/images/delete.png')}}">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">

                                                SKN1200
                                                </label>
                                            </td>
                                            <td>Robert</td>
                                            <td>robert@gmail.com</td>
                                            <td>000-000-000 </td>
                                            <td>12 </td>
                                            <td>
                                                <div class="dropdown">
                                                    <ul class="dropbtn icons">
                                                        <li></li>
                                                        <li></li>
                                                        <li></li>
                                                    </ul>
                                                    <div id="myDropdown" class="dropdown-content">
                                                        <a href="javascript:;"><img src="{{asset('assets/images/eye.png')}}">View</a>
                                                        <a href="javascript:;"><img src="{{asset('assets/images/delete.png')}}">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">

                                                SKN1200
                                                </label>
                                            </td>
                                            <td>Robert</td>
                                            <td>robert@gmail.com</td>
                                            <td>000-000-000 </td>
                                            <td>12 </td>
                                            <td>
                                                <div class="dropdown">
                                                    <ul class="dropbtn icons">
                                                        <li></li>
                                                        <li></li>
                                                        <li></li>
                                                    </ul>
                                                    <div id="myDropdown" class="dropdown-content">
                                                        <a href="javascript:;"><img src="{{asset('assets/images/eye.png')}}">View</a>
                                                        <a href="javascript:;"><img src="{{asset('assets/images/delete.png')}}">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">

                                                SKN1200
                                                </label>
                                            </td>
                                            <td>Robert</td>
                                            <td>robert@gmail.com</td>
                                            <td>000-000-000 </td>
                                            <td>12 </td>
                                            <td>
                                                <div class="dropdown">
                                                    <ul class="dropbtn icons">
                                                        <li></li>
                                                        <li></li>
                                                        <li></li>
                                                    </ul>
                                                    <div id="myDropdown" class="dropdown-content">
                                                        <a href="javascript:;"><img src="{{asset('assets/images/eye.png')}}">View</a>
                                                        <a href="javascript:;"><img src="{{asset('assets/images/delete.png')}}">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">

                                                SKN1200
                                                </label>
                                            </td>
                                            <td>Robert</td>
                                            <td>robert@gmail.com</td>
                                            <td>000-000-000 </td>
                                            <td>12 </td>
                                            <td>
                                                <div class="dropdown">
                                                    <ul class="dropbtn icons">
                                                        <li></li>
                                                        <li></li>
                                                        <li></li>
                                                    </ul>
                                                    <div id="myDropdown" class="dropdown-content">
                                                        <a href="javascript:;"><img src="{{asset('assets/images/eye.png')}}">View</a>
                                                        <a href="javascript:;"><img src="{{asset('assets/images/delete.png')}}">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">

                                                SKN1200
                                                </label>
                                            </td>
                                            <td>Robert</td>
                                            <td>robert@gmail.com</td>
                                            <td>000-000-000 </td>
                                            <td>12 </td>
                                            <td>
                                                <div class="dropdown">
                                                    <ul class="dropbtn icons">
                                                        <li></li>
                                                        <li></li>
                                                        <li></li>
                                                    </ul>
                                                    <div id="myDropdown" class="dropdown-content">
                                                        <a href="javascript:;"><img src="{{asset('assets/images/eye.png')}}">View</a>
                                                        <a href="javascript:;"><img src="{{asset('assets/images/delete.png')}}">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
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
                                    <div class="col-md-6">
                                        <ul class="pagination">
                                            <li><a href="javascript:;"><i class="fa fa-angle-left"></i></a></li>
                                            <li><a href="javascript:;">1</a></li>
                                            <li><a href="javascript:;">2</a></li>
                                            <li><a href="javascript:;">3</a></li>
                                            <li><a href="javascript:;">4</a></li>
                                            <li><a href="javascript:;"><i class="fa fa-angle-right"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
				</div>
			</div>
		</div>
	</div>
</section>
@include('layout.footer')
@endsection



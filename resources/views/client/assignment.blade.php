<?php
$title = "Client Assisment";
$keywords = "";
$desc = "";
$pageclass = "cleintasist";
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

                                                {{$job->id}}
                                                </label>
                                            </td>
                                            <td>{{$job->title}}</td>
                                            <td>{{$job->department}}</td>
                                            <td>{{$job->employment_type}}</td>
                                            <td>{{$job->country}}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <ul class="dropbtn icons">
                                                        <li></li>
                                                        <li></li>
                                                        <li></li>
                                                    </ul>
                                                    <div id="myDropdown" class="dropdown-content">
                                                        <a href="javascript:;"><img src="{{asset('assets/images/eye.png')}}">View</a>
                                                        <a href="javascript:;"><img src="{{asset('assets/images/eye.png')}}">Submission</a>
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
                                        <?php $teams = Team::where('vendor_id',$vendor->id)->count() ?>
                                        <tr>
                                            <td>
                                                <label for="">

                                                {{$vendor->id}}
                                                </label>
                                            </td>
                                            <td>{{$vendor->first_name}} {{$vendor->last_name}}</td>
                                            <td>{{$vendor->email}}</td>
                                            <td>{{$vendor->phone}}</td>
                                            <td>{{ $teams }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <ul class="dropbtn icons">
                                                        <li></li>
                                                        <li></li>
                                                        <li></li>
                                                    </ul>
                                                    <div id="myDropdown" class="dropdown-content">
                                                        <a href="javascript:;"><img src="{{asset('assets/images/eye.png')}}">View</a>
                                                        <a href="javascript:;"><img src="{{asset('assets/images/eye.png')}}">Submission</a>
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
                                            <th>Job Title</th>
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
                                        <tr>
                                            <td>
                                                <label for="">

                                                SKN1200
                                                </label>
                                            </td>
                                            <td>Designer</td>
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
                                                        <a href="javascript:;"><img src="{{asset('assets/images/eye.png')}}">Submission</a>
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



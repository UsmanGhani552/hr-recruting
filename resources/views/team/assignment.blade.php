<?php
$title = "Team Assisment";
$keywords = "";
$desc = "";
$pageclass = "cleintasist";
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
				<p>Dashboard / Team Members Assignments/</p>
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
				<li class="current"><a href="#tab-1">Clients</a></li>
				<li><a href="#tab-2">Staf Member</a></li>
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
                                            <th>Client Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Country</th>
                                            <th>Created at</th>
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
                                            <td>United States</td>
                                            <td>2020-06-02 14:21:55</td>
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
                                        <tr>
                                            <td>
                                                <label for="">

                                                SKN1200
                                                </label>
                                            </td>
                                            <td>Developer</td>
                                            <td>robert@gmail.com</td>
                                            <td>000-000-000 </td>
                                            <td>United States</td>
                                            <td>2020-06-02 14:21:55</td>
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
                                        <tr>
                                            <td>
                                                <label for="">

                                                SKN1200
                                                </label>
                                            </td>
                                            <td>Designer</td>
                                            <td>robert@gmail.com</td>
                                            <td>000-000-000 </td>
                                            <td>United States</td>
                                            <td>2020-06-02 14:21:55</td>
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
                                        <tr>
                                            <td>
                                                <label for="">

                                                SKN1200
                                                </label>
                                            </td>
                                            <td>Developer</td>
                                            <td>robert@gmail.com</td>
                                            <td>000-000-000 </td>
                                            <td>United States</td>
                                            <td>2020-06-02 14:21:55</td>
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
                                        <tr>
                                            <td>
                                                <label for="">

                                                SKN1200
                                                </label>
                                            </td>
                                            <td>Developer</td>
                                            <td>robert@gmail.com</td>
                                            <td>000-000-000 </td>
                                            <td>United States</td>
                                            <td>2020-06-02 14:21:55</td>
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
                                        <tr>
                                            <td>
                                                <label for="">

                                                SKN1200
                                                </label>
                                            </td>
                                            <td>Designer</td>
                                            <td>robert@gmail.com</td>
                                            <td>000-000-000 </td>
                                            <td>United States</td>
                                            <td>2020-06-02 14:21:55</td>
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
                                        <tr>
                                            <td>
                                                <label for="">

                                                SKN1200
                                                </label>
                                            </td>
                                            <td>Developer</td>
                                            <td>robert@gmail.com</td>
                                            <td>000-000-000 </td>
                                            <td>United States</td>
                                            <td>2020-06-02 14:21:55</td>
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
                                        <tr>
                                            <td>
                                                <label for="">

                                                SKN1200
                                                </label>
                                            </td>
                                            <td>Designer</td>
                                            <td>robert@gmail.com</td>
                                            <td>000-000-000 </td>
                                            <td>United States</td>
                                            <td>2020-06-02 14:21:55</td>
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
                                        <tr>
                                            <td>
                                                <label for="">

                                                SKN1200
                                                </label>
                                            </td>
                                            <td>Developer</td>
                                            <td>robert@gmail.com</td>
                                            <td>000-000-000 </td>
                                            <td>United States</td>
                                            <td>2020-06-02 14:21:55</td>
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
                                        <tr>
                                            <td>
                                                <label for="">

                                                SKN1200
                                                </label>
                                            </td>
                                            <td>Developer</td>
                                            <td>robert@gmail.com</td>
                                            <td>000-000-000 </td>
                                            <td>United States</td>
                                            <td>2020-06-02 14:21:55</td>
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
                                        <tr>
                                            <td>
                                                <label for="">

                                                SKN1200
                                                </label>
                                            </td>
                                            <td>Developer</td>
                                            <td>robert@gmail.com</td>
                                            <td>000-000-000 </td>
                                            <td>United States</td>
                                            <td>2020-06-02 14:21:55</td>
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
                                        <tr>
                                            <td>
                                                <label for="">

                                                SKN1200
                                                </label>
                                            </td>
                                            <td>Designer</td>
                                            <td>robert@gmail.com</td>
                                            <td>000-000-000 </td>
                                            <td>United States</td>
                                            <td>2020-06-02 14:21:55</td>
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
                                            <label for="orderid">
                                            <input type="checkbox" name="" id="orderid">
                                            Order ID
                                            </label>
                                            </th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Company Name</th>
                                            <th>Status</th>
                                            <th>Created at</th>
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
                                                <input type="checkbox" name="" id="">
                                                SKN1200
                                                </label>
                                            </td>
                                            <td>Brooklyn Simmons</td>
                                            <td>robert@gmail.com</td>
                                            <td>Abcd Company </td>
                                            <td>Inactive </td>
                                            <td>2020-06-02 14:21:55 </td>
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
                                        <tr>
                                            <td>
                                                <label for="">
                                                <input type="checkbox" name="" id="">
                                                SKN1200
                                                </label>
                                            </td>
                                            <td>Jacob Jones</td>
                                            <td>robert@gmail.com</td>
                                            <td>Abcd Company </td>
                                            <td>Active </td>
                                            <td>2020-06-02 14:21:55 </td>
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
                                        <tr>
                                            <td>
                                                <label for="">
                                                <input type="checkbox" name="" id="">
                                                SKN1200
                                                </label>
                                            </td>
                                            <td>Marvin McKinney</td>
                                            <td>robert@gmail.com</td>
                                            <td>Abcd Company </td>
                                            <td>Active </td>
                                            <td>2020-06-02 14:21:55 </td>
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
                                        <tr>
                                            <td>
                                                <label for="">
                                                <input type="checkbox" name="" id="">
                                                SKN1200
                                                </label>
                                            </td>
                                            <td>Bessie Cooper</td>
                                            <td>robert@gmail.com</td>
                                            <td>Abcd Company </td>
                                            <td>Active </td>
                                            <td>2020-06-02 14:21:55 </td>
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
                                        <tr>
                                            <td>
                                                <label for="">
                                                <input type="checkbox" name="" id="">
                                                SKN1200
                                                </label>
                                            </td>
                                            <td>Arlene McCoy</td>
                                            <td>robert@gmail.com</td>
                                            <td>Abcd Company </td>
                                            <td>Inactive </td>
                                            <td>2020-06-02 14:21:55 </td>

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
                                        <tr>
                                            <td>
                                                <label for="">
                                                <input type="checkbox" name="" id="">
                                                SKN1200
                                                </label>
                                            </td>
                                            <td>Ralph Edwards</td>
                                            <td>robert@gmail.com</td>
                                            <td>Abcd Company </td>
                                            <td>Active </td>
                                            <td>2020-06-02 14:21:55 </td>
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
                                        <tr>
                                            <td>
                                                <label for="">
                                                <input type="checkbox" name="" id="">
                                                SKN1200
                                                </label>
                                            </td>
                                            <td>Ralph Edwards</td>
                                            <td>robert@gmail.com</td>
                                            <td>Abcd Company </td>
                                            <td>Inactive </td>
                                            <td>2020-06-02 14:21:55 </td>

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
                                        <tr>
                                            <td>
                                                <label for="">
                                                <input type="checkbox" name="" id="">
                                                SKN1200
                                                </label>
                                            </td>
                                            <td>Marvin McKinney</td>
                                            <td>robert@gmail.com</td>
                                            <td>Abcd Company </td>
                                            <td>Inactive </td>
                                            <td>2020-06-02 14:21:55 </td>

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
                                        <tr>
                                            <td>
                                                <label for="">
                                                <input type="checkbox" name="" id="">
                                                SKN1200
                                                </label>
                                            </td>
                                            <td>Bessie Cooper</td>
                                            <td>robert@gmail.com</td>
                                            <td>Abcd Company </td>
                                            <td>Active </td>
                                            <td>2020-06-02 14:21:55 </td>
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
                                        <tr>
                                            <td>
                                                <label for="">
                                                <input type="checkbox" name="" id="">
                                                SKN1200
                                                </label>
                                            </td>
                                            <td>Bessie Cooper</td>
                                            <td>robert@gmail.com</td>
                                            <td>Abcd Company </td>
                                            <td>Active </td>
                                            <td>2020-06-02 14:21:55 </td>
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
                                        <tr>
                                            <td>
                                                <label for="">
                                                <input type="checkbox" name="" id="">
                                                SKN1200
                                                </label>
                                            </td>
                                            <td>Arlene McCoy</td>
                                            <td>robert@gmail.com</td>
                                            <td>Abcd Company </td>
                                            <td>Active </td>
                                            <td>2020-06-02 14:21:55 </td>
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
                                        <tr>
                                            <td>
                                                <label for="">
                                                <input type="checkbox" name="" id="">
                                                SKN1200
                                                </label>
                                            </td>
                                            <td>Brooklyn Simmons</td>
                                            <td>robert@gmail.com</td>
                                            <td>Abcd Company </td>
                                            <td>Inactive </td>
                                            <td>2020-06-02 14:21:55 </td>

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



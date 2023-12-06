<?php
$title = "Edit Invite";
$keywords = "";
$desc = "";
$pageclass = "vinvitepg";
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
				<p>Dashboard / Edit profile</p>
				</div>
			</div>

			<div class="col-md-6 text-end">

			</div>
		</div>
	</div>
</section>

<section class="vendor_invite">
	<div class="container">
		<div class="row align-items-center justify-content-center">
			<div class="col-md-6">
				<h6>Edit Profile</h6>
				<div class="outbox">
					<form action="{{route('vendor-update' , $vendor->id)}}" method="POST">
                        @csrf
					    <div class="row">

							<div class="col-md-6">
								<label class="form-group">
									First Name
									<input type="text" name="first_name" value="{{$vendor->first_name}}" class="form-controll" placeholder="First Name" {{Auth::user()->id == 1 ? '' : 'disabled'}}>
								</label>
							</div>

							<div class="col-md-6">
								<label class="form-group">
									Last Name
									<input type="text" value="{{$vendor->last_name}}" name="last_name" class="form-controll" placeholder="Last Name" {{Auth::user()->id == 1 ? '' : 'disabled'}}>
								</label>
							</div>

							<div class="col-md-12">
								<label class="form-group">
									Company Name
									<input type="text" name="company_name" value="{{$vendor->company_name}}" class="form-controll" placeholder="Company Name" {{Auth::user()->id == 1 ? '' : 'disabled'}}>
								</label>
							</div>

							<div class="col-md-6">
								<label class="form-group">
									Home/Office
									<input type="text" name="home" value="{{$vendor->home}}" class="form-controll" placeholder="Home/Office">
								</label>
							</div>
							<div class="col-md-6">
								<label class="form-group">
									Phone No
									<input type="tel" name="phone" value="{{$vendor->phone}}" class="form-controll" placeholder="Home/Office" {{Auth::user()->id == 1 ? '' : 'disabled'}}>
								</label>
							</div>

							<div class="col-md-12">
								<label class="form-group">
									Email
									<input type="email" name="email" value="{{$vendor->email}}" class="form-controll" placeholder="Home/Office" {{Auth::user()->id == 1 ? '' : 'disabled'}}>
								</label>
							</div>

							<br>
							<h6>Reset Password</h6>
							<br>

							<div class="col-md-6">
								<label class="form-group">
									Password
									<input type="password" name="" class="form-controll" placeholder="Password" {{Auth::user()->id == 1 ? '' : 'disabled'}}>
								</label>
							</div>

							<div class="col-md-6">
								<label class="form-group">
									Confirm Password
									<input type="password" name="" class="form-controll" placeholder="Confirm Password" {{Auth::user()->id == 1 ? '' : 'disabled'}}>
								</label>
							</div>

						<div class="form-group">
							<input type="submit" name="" value="Submit" {{Auth::user()->id == 1 ? '' : 'disabled'}}>
						</div>
					</div>
				  </form>

				</div>
			</div>
		</div>
	</div>
</section>
@include('layout.footer')
@endsection



<?php
$title = "Add New Candidate";
$keywords = "";
$desc = "";
$pageclass = "adnewcand";
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
				<p>Dashboard / Add Team Member</p>
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
				<div class="outbox">
					<h6>Edit Profile</h6>
					<form>
					    <div class="row" style="margin: 0;">

							<div class="col-md-6">
								<label class="form-group">
									First Name
									<input type="text" name="" class="form-controll" placeholder="First Name">
								</label>
							</div>

							<div class="col-md-6">
								<label class="form-group">
									Last Name
									<input type="text" name="" class="form-controll" placeholder="Last Name">
								</label>
							</div>

							<div class="col-md-12">
								<label class="form-group">
									Company Name

									<select class="form-controll">
										<option selected="selected">ABC Technology</option>
										<option>---</option>
										<option>---</option>
										<option>---</option>
									</select>
								</label>
							</div>


							<div class="col-md-12">
								<label class="form-group">
									Email
									<input type="email" name="" class="form-controll" placeholder="Robert@gmail.com">
								</label>
							</div>

							<br>
							<h6>Reset Password</h6>
							<br>
							<div class="col-md-6">
								<label class="form-group">
									Password
									<input type="password" name="" class="form-controll" placeholder="Password">
								</label>
							</div>

							<div class="col-md-6">
								<label class="form-group">
									Confirm Password
									<input type="password" name="" class="form-controll" placeholder="Confirm Password">
								</label>
							</div>

						<div class="form-group">
							<input type="submit" name="" value="Submit">
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



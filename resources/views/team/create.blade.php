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
		<div class="row">

			<div class="col-md-6">
				<div class="outbox">
					<h6>Add Team Member</h6>
					<form method="POST" action="{{route('team.store')}}">
                        @csrf
					    <div class="row">
							{{-- <div class="col-md-12">
								<label class="form-group">
									Company Name
									<select class="form-controll" name="company_name">
										<option selected="selected" value="ABC Technology">ABC Technology</option>
										<option value="XYZ Technology">XYZ Technology</option>
									</select>
                                    @error('company_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
								</label>
							</div> --}}

							{{-- <div class="col-md-6">
								<label class="form-group">
                                    First Name
                                    <input type="text" name="first_name" class="form-controll"
                                        placeholder="Enter First Name">
                                        @error('first_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </label>
							</div>

							<div class="col-md-6">
								<label class="form-group">
                                    Last Name
                                    <input type="text" name="last_name" class="form-controll"
                                        placeholder="Enter Last Name">
                                        @error('last_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </label>
							</div> --}}

							<div class="col-md-12">
								<label class="form-group">
                                    Name
                                    <input type="text" name="name" class="form-controll"
                                        placeholder="Enter Name">
                                        @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </label>
							</div>

							<div class="col-md-12">
								<label class="form-group">
                                    Email
                                    <input type="email" name="email" class="form-controll"
                                        placeholder="Email Address">
                                        @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </label>
							</div>

							<div class="col-md-6">
                                <label class="form-group">
                                    Password
                                    <input type="password" name="password" class="form-controll"
                                        placeholder="000-000-000 ">
                                        @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label class="form-group">
                                    Confirm Password
                                    <input type="password" name="password_confirmation" class="form-controll"
                                        placeholder="000-000-000 ">
                                </label>
                            </div>

						<div class="form-group">
							<input type="submit" value="Submit">
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



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
					<h6>Add permission</h6>
					<form method="POST" action="{{route('permission.store')}}">
                        @csrf
					    <div class="row">

							<div class="col-md-6">
								<label class="form-group">
                                    Permission Name
                                    <input type="text" name="name" class="form-controll"
                                        placeholder="Enter permission Name">
                                        @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
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



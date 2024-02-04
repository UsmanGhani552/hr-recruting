<?php
$title = "Contact";
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
				<p>Dashboard / Contact</p>
				</div>
			</div>

			<div class="col-md-6 text-end">

			</div>
		</div>
	</div>
</section>

<section class="vendor_invite">
	<div class="container">
        @if (Session::has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
		<div class="row d-flex justify-content-center">

			<div class="col-md-6">
				<div class="outbox">
					<h6>Contact Us</h6>
					<form method="POST" action="{{route('contact.store')}}">
                        @csrf
					    <div class="row">

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

							<div class="col-md-12">
                                <label class="form-group">
                                    Message
                                    <textarea name="message" class="form-controll"></textarea>
                                    {{-- <input type="password" name="password" class="form-controll"
                                        placeholder="000-000-000 "> --}}
                                        @error('message')
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



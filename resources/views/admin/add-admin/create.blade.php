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
					<form method="POST" action="{{route('add-admin.store')}}">
                        @csrf
					    <div class="row">

							<div class="col-md-12">
								<label class="form-group">
                                    Name
                                    <input type="text" name="name" class="form-controll"
                                        placeholder="Name">
                                        @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </label>
							</div>
							<div class="col-md-12">
								<label class="form-group">
                                    Email
                                    <input type="text" name="email" class="form-controll"
                                        placeholder="Email Address">
                                        @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </label>
							</div>
                            <div class="col-md-6">
                                <label class="form-group" for="email">
                                    Password
                                    <input id="password" type="password" placeholder="Enter Password"
                                        class="form-controll @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label class="form-group" for="email">
                                    Confirm Password
                                    {{-- <input type="tel" name="" class="form-controll" id="email" placeholder="000-000-000 "> --}}
                                        <input id="password-confirm" type="password" class="form-controll"
                                            name="password_confirmation" required autocomplete="new-password">
                                </label>
                            </div>
                            <div class="col-md-12">
								<label class="form-group">
									Roles
									{{-- <select class="form-controll" name="company_name">
                                        @foreach ($permissions as $permission)
										<option name="permissions[]" value="{{$permission->id}}">{{ $permission->name }}</option>
                                        @endforeach
									</select> --}}
                                    @foreach ($roles as $role)
                                        <div class="mb-10 fv-row">
                                            <div class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" name="roles[]" type="checkbox" value="{{$role->id}}" id="role{{$role->id}}" />
                                                <label class="form-check-label" for="role{{$role->id}}">
                                                    {{ $role->name }}
                                                </label>
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                        @endforeach
                                    @error('permissions')
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



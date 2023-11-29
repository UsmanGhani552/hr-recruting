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
					<form method="POST" action="{{route('role.store')}}">
                        @csrf
					    <div class="row">

							<div class="col-md-12">
								<label class="form-group">
                                    Role Name
                                    <input type="text" name="name" class="form-controll"
                                        placeholder="Email Address">
                                        @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </label>
							</div>
                            <div class="col-md-12">
								<label class="form-group">
									Permissions
									{{-- <select class="form-controll" name="company_name">
                                        @foreach ($permissions as $permission)
										<option name="permissions[]" value="{{$permission->id}}">{{ $permission->name }}</option>
                                        @endforeach
									</select> --}}
                                    @foreach ($permissions as $permission)
                                        <div class="mb-10 fv-row">
                                            <div class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" name="permissions[]" type="checkbox" value="{{$permission->id}}" id="role{{$permission->id}}" />
                                                <label class="form-check-label" for="role{{$permission->id}}">
                                                    {{ $permission->name }}
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



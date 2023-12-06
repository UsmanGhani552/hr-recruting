<?php
$title = 'Add New Candidate';
$keywords = '';
$desc = '';
$pageclass = 'adnewcand';
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
                        <h6>Edit Profile</h6>
                        <form action="{{ route('team.update',$team->id) }}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="col-md-12">
                                    <label class="form-group">
                                        Name
                                        <input type="text" name="name" value="{{ $team->name }}"
                                            class="form-controll" placeholder="First Name">
                                    </label>
                                </div>

                                {{-- <div class="col-md-6">
                                    <label class="form-group">
                                        Last Name
                                        <input type="text" value="{{ $team->last_name }}" name="last_name"
                                            class="form-controll" placeholder="Last Name">
                                    </label>
                                </div> --}}

                                {{-- <div class="col-md-12">
                                    <label class="form-group">
                                        Company Name
                                        <select class="form-controll" name="company_name">
                                            <option {{ $team->company_name == 'ABC Technology' ? 'selected' : '' }}
                                                value="ABC Technology">ABC Technology</option>
                                            <option {{ $team->company_name == 'XYZ Technology' ? 'selected' : '' }}
                                                value="XYZ Technology">XYZ Technology</option>
                                        </select>
                                        @error('company_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div> --}}


                                <div class="col-md-12">
                                    <label class="form-group">
                                        Email
                                        <input type="email" name="email" value="{{ $team->email }}"
                                            class="form-controll" placeholder="Home/Office">
                                    </label>
                                </div>

                                <br>
                                <h6>Reset Password</h6>
                                <br>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        Password
                                        <input type="password" name="password" class="form-controll" placeholder="Password">
                                    </label>
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-group">
                                        Confirm Password
                                        <input type="password" name="password_confirmation" class="form-controll"
                                            placeholder="Confirm Password">
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

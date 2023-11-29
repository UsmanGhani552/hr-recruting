<?php
$title = 'Add Client';
$keywords = '';
$desc = '';
$pageclass = 'addclient';
?>
@extends('layout.master')

@section('top_nav')
    @include('layout.header')
@endsection

@section('main_content')
    <section class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="bnr_left">
                        <p>Dashboard / Add Candidate</p>
                    </div>
                </div>

                <div class="col-md-6 text-end">

                </div>
            </div>
        </div>
    </section>

    <section class="vendor_invite addclient">
        <div class="container">
            <form method="POST" action="{{route('candidate.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <h6>Add Candidate</h6>
                        <div class="outbox admorebox">


                            <div class="row">
                                <div class="col-lg-2 col-md-4">
                                    <label class="form-group">
                                        First Name
                                        <input type="text" name="first_name" class="form-controll"
                                            placeholder="Enter First Name">
                                        @error('first_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                    </label>
                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <label class="form-group">
                                        Last Name
                                        <input type="text" name="last_name" class="form-controll"
                                            placeholder="Enter Last Name">
                                        @error('last_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <label class="form-group">
                                        Phone Number
                                        <input type="tel" name="phone" class="form-controll"
                                            placeholder="000-000-000 ">
                                        @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <label class="form-group">
                                        Email
                                        <input type="email" name="email" class="form-controll"
                                            placeholder="Email Address">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <label class="form-group">
                                        Method of Communication
                                        <select class="form-controll" name="method_of_communication">
                                            <option>Phone</option>
                                            <option>Computer</option>
                                        </select>
                                        @error('method_of_communication')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <label class="form-group">
                                        Highest Education
                                        <select class="form-controll" name="highest_education">
                                            <option>Graduate</option>
                                            <option>High School</option>
                                        </select>
                                        @error('highest_education')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <label class="form-group">
                                        Years of experience
                                        <input type="text" name="years_of_experience" class="form-controll"
                                            placeholder="Years of experience">
                                    </label>
                                    @error('years_of_experience')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <label class="form-group">
                                        Position
                                        <input type="text" name="position" class="form-controll" placeholder="Position">
                                    </label>
                                    @error('position')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <label class="form-group">
                                        Work Authorization*
                                        <input type="text" name="work_authorization" class="form-controll"
                                            placeholder="Work Authorization">
                                    </label>
                                    @error('work_authorization')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <label class="form-group">
                                        Expected Pay Rate
                                        <input type="text" name="expected_pay_rate" class="form-controll"
                                            placeholder="Expected Pay Rate">
                                    </label>
                                    @error('expected_pay_rate')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <label class="form-group">
                                        Availability to Start
                                        <select class="form-controll" name="availability_to_start">
                                            <option>January</option>
                                            <option>March</option>
                                        </select>
                                        @error('availability_to_start')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <label class="form-group">
                                        Availability to Interview
                                        <select class="form-controll" name="availability_to_interview">
                                            <option>January</option>
                                            <option>March</option>
                                        </select>
                                        @error('availability_to_interview')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <label class="form-group">
                                        Country
                                        <select class="form-controll" name="country">
                                            <option>United States</option>
                                        </select>
                                        @error('country')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <label class="form-group">
                                        State
                                        <select class="form-controll select2" name="state">
                                            <option></option>
                                            @foreach ($states as $state)
                                                <option value={{ $state->id }}>{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('state')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <label class="form-group">
                                        City
                                        <select class="form-controll select2" name="city">
                                            <option></option>
                                            @foreach ($cities as $city)
                                                <option value={{ $city->id }}>{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('city')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <label class="form-group">
                                        Postal Code
                                        <input type="text" name="postal_code" class="form-controll"
                                            placeholder="Postal Code">
                                    </label>
                                    @error('postal_code')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                </div>

                                <div class="col-lg-2 col-md-4">
                                    <label class="form-group">
                                        Status
                                        <select class="form-controll" name="status">
                                            <option value="1">Active</option>
                                            <option value="0">InActive</option>
                                        </select>
                                        @error('city')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>

                                <div class="col-lg-2 col-md-4">
                                    <label class="form-group">
                                        Vendor
                                        <select class="form-controll" name="vendor">
                                            @foreach ($vendors as $vendor)
                                            <option value="{{$vendor->id}}" >{{$vendor->first_name}} {{$vendor->last_name}}</option>
                                            @endforeach
                                        </select>
                                    </label>
                                </div>

                                <div class="col-lg-2 col-md-4">
                                    <div class="file-hidden-list"></div>
                                    <div class="new_job_fileupload">

                                        <div class="file-list">
                                        </div>

                                        <label class="form-group">
                                            <div class="uploadoc">
                                                {{-- <a href="javascript:;" id="addFile" class="add-button">Upload</a> --}}
                                                <input type="file" name="resume">
                                                {{-- <span><img src="{{ asset('assets/images/upload.png') }}"></span> --}}
                                            </div>
                                        </label>

                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <label class="form-group">
                                        Additional Notes (Optional)
                                        <textarea class="form-controll" placeholder="Message" name="notes"></textarea>
                                    </label>
                                    @error('notes')
                                            <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-4 col-md-4">
                                </div>
                                <div class="col-lg-4 col-md-4">
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <input type="submit" name="" value="Submit">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </form>
        </div>
    </section>
    @include('layout.footer')
@endsection

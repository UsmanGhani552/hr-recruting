<?php
$title = 'Create Job';
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
                <div class="col-md-6">
                    <div class="bnr_left">
                        <p>Jobs / Create Job </p>
                    </div>
                </div>

                <div class="col-md-6 text-end">

                </div>
            </div>
        </div>
    </section>

    <section class="vendor_invite addclient">
        <div class="container">
            <form action="{{ route('job.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <h6>Jobs</h6>
                        <div class="outbox admorebox">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-group">
                                        Job Title*
                                        <input type="text" name="title" class="form-controll" placeholder="Title">
                                        @error('title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        Client Name
                                        <select class="form-controll" name="client">
                                            <option disabled selected>Select Client</option>
                                            @foreach ($clients as $client)
                                                <option value="{{$client->id }}">{{ $client->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('client')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        Department
                                        <select class="form-controll" name="department">
                                            <option disabled selected>Select</option>
                                            <option>Software</option>
                                            <option>Design</option>
                                        </select>
                                        @error('department')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        Internal Job Code*
                                        <select class="form-controll" name="internal_job_code">
                                            <option disabled selected>Select</option>
                                            <option>001</option>
                                            <option>002</option>
                                            <option>003</option>
                                        </select>
                                        @error('internal_job_code')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        Employment type
                                        <select class="form-controll" name="employment_type">
                                            <option disabled selected>Select</option>
                                            <option value="Temporary">Temporary</option>
                                            <option value="Permanent">Permanent</option>
                                        </select>
                                        @error('employment_type')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        Minimum experience*
                                        <input type="text" name="minimum_experience" class="form-controll"
                                            placeholder="Enter Minimum experience">
                                        @error('minimum_experience')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        Salary Range*
                                        <input type="text" name="salary_range" class="form-controll"
                                            placeholder="Enter Salary Range">
                                        @error('salary_range')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        Currency*
                                        <input type="text" name="currency" class="form-controll"
                                            placeholder="Enter Currency">
                                        @error('currency')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        Duration
                                        <input type="text" name="duration" class="form-controll"
                                            placeholder="Enter state">
                                        @error('duration')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        Job Type
                                        <select class="form-controll" name="job_type">
                                            <option disabled selected>Select</option>
                                            <option value="Temporary">Temporary</option>
                                            <option value="Permanent">Permanent</option>
                                        </select>
                                        @error('job_type')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        City*
                                        <select class="form-controll" name="city">
                                            <option disabled selected>Select city</option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('city')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        State*
                                        <select class="form-controll" name="state">
                                            <option disabled selected>Selct state</option>
                                            @foreach ($states as $state)
                                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('state')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        Country*
                                        <select class="form-controll" name="country">
                                            <option disabled selected>Select country</option>
                                            <option value="United States">United States</option>
                                        </select>
                                        @error('country')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        Postal Code
                                        <input type="text" name="postal_code" class="form-controll"
                                            placeholder="Postal Code">
                                        @error('postal_code')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>

                                <div class="col-md-12">
                                    <div class="file-hidden-list"></div>
                                    <div class="new_job_fileupload">

                                        <div class="file-list">
                                        </div>

                                        {{-- <label class="form-group">
                                            <div class="uploadoc">
                                                <a href="javascript:;" id="addFile" class="add-button">Upload</a>
                                                <span><img src="{{ asset('assets/images/upload.png') }}"></span>
                                            </div>
                                        </label> --}}
                                        <label class="form-group">
                                            Images
                                            <div class="uploadoc">
                                                <input type="file" name="images[]" multiple>
                                            </div>
                                            @error('images')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </label>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="file-hidden-list"></div>
                                </div>

                                <hr>

                                <div class="col-md-6">
                                    <label class="form-group">
                                        Peercentage or Amount
                                        <select class="form-controll" name="percentage">
                                            <option disabled selected>Select</option>
                                            <option value="Percentage">Percentage</option>
                                            <option value="Amount">Amount</option>
                                        </select>
                                        @error('job_type')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        Actual Salary
                                        <input type="number" name="actual_salary" class="form-controll" disabled
                                            placeholder="Enter Actual Salary">
                                        @error('actual_salary')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        Vendor*
                                        <input type="number" name="vendor_percentage" class="form-controll"
                                            placeholder="Enter Vendor Percentage">
                                        @error('vendor_percentage')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        Admin*
                                        <input type="number" name="admin_percentage" class="form-controll"
                                            placeholder="Enter Admin Percentage">
                                        @error('admin_percentage')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>



                                <div class="form-group">
                                    <input type="submit" name="" value="Submit">
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-8">
                        <h6>Description</h6>
                        <div class="outbox">
                            <div id="summernote" name="description"></div>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <br>
                        <h6>Vendor Seen Area</h6>
                        <div class="outbox">
                            <textarea class="form-controll" name="notes"></textarea>
                            @error('notes')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>


                </div>
            </form>
        </div>
    </section>
    @include('layout.footer')
@endsection

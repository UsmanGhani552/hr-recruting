<?php
$title = 'Submission Detail';
$keywords = '';
$desc = '';
$pageclass = 'subdetail';
?>
@extends('layout.master')

@section('top_nav')
    @include('layout.header')
@endsection

@section('main_content')
    <form action="{{ route('job.store-submission') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <section class="banner">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="bnr_left">
                            Dashboard / Jobs
                        </div>
                    </div>

                    <div class="col-md-6 text-end">

                    </div>
                </div>
            </div>
        </section>

        <section class="csection submison_cont">
            <div class="container">
                @if (Session::has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="alert alert-success d-none" id="success"></div>
                <div class="submision_stat">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Submissions</h6>
                        </div>

                        <div class="col-md-6 text-end">
                            <label>
                                Status
                                <select class="form-select" id="status" aria-label="Default select example">
                                    <option {{ $submission->status == 1 ? 'selected' : '' }} value="1">Approved
                                    </option>
                                    <option {{ $submission->status == 2 ? 'selected' : '' }} value="2">Pending</option>
                                    <option {{ $submission->status == 3 ? 'selected' : '' }} value="3">Reject</option>
                                </select>
                            </label>
                        </div>
                    </div>
                </div>
                <br><br>
                <h6>Jobs</h6>
                <div class="outbox">
                    <table>
                        <tbody>
                            <tr>
                                <td style="border-top: 0; border-left: 0;">
                                    <h5>Job Title:</h5>
                                    {{ $job->title }}
                                </td>
                                <td style="border-top: 0;">
                                    <h5>Client name:</h5>
                                    {{ $job->client_id }}
                                </td>
                                <td style="border-top: 0;">
                                    <h5>Department:</h5>
                                    {{ $job->department }}
                                </td>
                                <td style="border-top: 0;">
                                    <h5>Internal Job Code:</h5>
                                    {{ $job->internal_job_code }}
                                </td>
                                <td style="border-top: 0; border-right: 0;">
                                    <h5>Employment type:</h5>
                                    {{ $job->employment_type }}
                                </td>
                            </tr>
                            <tr>
                                <td style="border-bottom: 0; border-left: 0;">
                                    <h5>Salary Range:</h5>
                                    {{ $job->salary_range }}
                                </td>
                                <td style="border-bottom: 0;">
                                    <h5>Currency:</h5>
                                    {{ $job->currency }}
                                </td>
                                <td style="border-bottom: 0;">
                                    <h5>Minimum experience:</h5>
                                    {{ $job->minimum_experience }}
                                </td>
                                <td style="border-bottom: 0;">
                                    <h5>Status:</h5>
                                    {{ $job->status }}
                                </td>
                                <td style="border-bottom: 0; border-right: 0;">
                                    <a href="{{ route('job.details', $job->id) }}">VIEW DETAILS</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <br>
                <h6>Submited For (Client)</h6>
                <div class="outbox">
                    <table>
                        <tbody>
                            <tr>
                                <td style="border-top: 0; border-left: 0;">
                                    <h5>Client Name::</h5>
                                    {{ $client->name }}
                                </td>
                                <td style="border-top: 0;">
                                    <h5>Website::</h5>
                                    {{ $client->website }}
                                </td>
                                <td style="border-top: 0;">
                                    <h5>Phone No::</h5>
                                    {{ $client->phone }}
                                </td>
                                <td style="border-top: 0;">
                                    <h5>Email::</h5>
                                    {{ $client->email }}
                                </td>
                                <td style="border-top: 0; border-right: 0;">
                                    <h5>Location:</h5>
                                    <a href="javascript:;">View</a>
                                </td>
                            </tr>
                            <tr>
                                <td style="border-bottom: 0; border-left: 0;">
                                    <h5>Company Size:</h5>
                                    {{ $client->company_size }}
                                </td>
                                <td style="border-bottom: 0;">
                                    <h5>Industry:</h5>
                                    {{ $client->industry }}
                                </td>
                                <td style="border-bottom: 0;">
                                    <h5>Year Founded:</h5>
                                    {{ $client->year_founded }}
                                </td>
                                <td style="border-bottom: 0;">

                                </td>
                                <td style="border-bottom: 0; border-right: 0;">
                                    <a href="{{ route('client.details', $client->id) }}">VIEW DETAILS</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <br>
                <h6>Submitted by (Vendor)</h6>
                <div class="outbox">
                    <table>
                        <tbody>
                            <tr>
                                <td style="border-top: 0; border-left: 0;">
                                    <h5>First Name::</h5>
                                    {{ Auth::user()->id != 1 ? $vendor->first_name : Auth::user()->name }}
                                </td>
                                <td style="border-top: 0;">
                                    <h5>Last Name::</h5>
                                    {{ $vendor->last_name }}
                                </td>
                                <td style="border-top: 0;">
                                    <h5>Phone No:</h5>
                                    {{ $vendor->phone ?? '' }}
                                </td>
                                <td style="border-top: 0;">
                                    <h5>Email:</h5>
                                    {{ $vendor->email }}
                                </td>
                                <td style="border-top: 0; border-right: 0;">
                                    <h5>Location:</h5>
                                    <a href="javascript:;">View</a>
                                </td>
                            </tr>
                            <tr>
                                <td style="border-bottom: 0; border-left: 0;">
                                    <h5>Company Name:</h5>
                                    {{ $vendor->company_name ?? '' }}
                                </td>
                                <td style="border-bottom: 0;">
                                    <h5>status:</h5>
                                    {{ $vendor->status ?? '' }}
                                </td>
                                <td style="border-bottom: 0;">

                                </td>
                                <td style="border-bottom: 0;">

                                </td>
                                <td style="border-bottom: 0; border-right: 0;">
                                    <a href="{{ route('vendor.details', $vendor->id) }}">VIEW DETAILS</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <br>
                <h6>Candidate</h6>
                <div class="outbox">
                    <table>
                        <tbody>
                            <tr>
                                <td style="border-top: 0; border-left: 0;">
                                    <h5>First Name:</h5>
                                    <p id="first_name">
                                        {{ $candidate->first_name }}
                                    </p>
                                </td>
                                <td style="border-top: 0;">
                                    <h5>Last name:</h5>
                                    <p id="last_name">
                                        {{ $candidate->last_name }}
                                    </p>
                                </td>
                                <td style="border-top: 0;">
                                    <h5>Phone:</h5>
                                    <p id="phone">
                                        {{ $candidate->phone }}
                                    </p>
                                </td>
                                <td style="border-top: 0;">
                                    <h5>Email:</h5>
                                    <p id="email">
                                        {{ $candidate->email }}
                                    </p>
                                </td>
                                <td style="border-top: 0; border-right: 0;">
                                    <h5>Location:</h5>
                                    <a href="javascript:;">View</a>
                                </td>
                            </tr>
                            <tr>
                                <td style="border-bottom: 0; border-left: 0;">
                                    <h5>Work Authentication:</h5>
                                    <p id="work_authorization">
                                        {{ $candidate->work_authorization }}
                                    </p>
                                </td>
                                <td style="border-bottom: 0;">
                                    <h5>Exp Pay Rate:</h5>
                                    <p id="expected_pay_rate">
                                        {{ $candidate->expected_pay_rate }}
                                    </p>
                                </td>
                                <td style="border-bottom: 0;">
                                    <h5>Availabilty to Start:</h5>
                                    <p id="availability_to_start">
                                        {{ $candidate->availability_to_start }}
                                    </p>
                                </td>
                                <td style="border-bottom: 0;">
                                    <h5>Experience:</h5>
                                    <p id="years_of_experience">
                                        {{ $candidate->years_of_experience }}
                                    </p>
                                </td>
                                <td style="border-bottom: 0; border-right: 0;">
                                    <a href="{{ route('candidate.details', $candidate->id) }}">VIEW DETAILS</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br><br>

                {{-- salary popup --}}
                <div class="popup pop" id="salary-popup">
                    <div class="overlay">
                        <a class="close" href="javascript:;">X</a>
                        <h5>Enter Actual Salary</h5>
                        <form>
                            {{-- <ul class="tabs-menu2">
                                <li class="current"><a href="#tab-21">Vendors</a></li>
                            </ul> --}}

                            <div class="tab">
                                <div id="tab-21" class="tab-content2">
                                    <div class="form-group">
                                        <input type="number" id="actual_salary" name="actual_salary" class="form-controll"
                                            placeholder="Enter Actual Salary">
                                    </div>
                                    {{-- <ul id="search-vendor-results">
                                    </ul> --}}
                                    <input class="cbtn" id="assign-salary-btn" type="button" value="Enter">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- salary popup --}}
                <div class="popup pop" id="proceed-popup">
                    <div class="overlay">
                        <a class="close" href="javascript:;">X</a>
                        <h5>Dp You want To Proceed</h5>
                        <form>
                            <div class="tab">
                                <div id="tab-21" class="tab-content2">
                                    <div class="form-group">
                                    </div>
                                    <input class="cbtn" id="proceed-btn" type="button" value="Enter">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- <h6>Assigned Candidates</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="outbox">
                            <select id="candidateDropdown" class="selectpicker" aria-label="Default select example"
                                data-live-search="true">
                                <option value="1" selected></option>
                                @foreach ($candidates as $candidate)
                                    <option value="{{ $candidate->id }}" data-candidate_id="{{ $candidate->id }}"
                                        data-first_name="{{ $candidate->first_name }}"
                                        data-last_name="{{ $candidate->last_name }}" data-phone="{{ $candidate->phone }}"
                                        data-email="{{ $candidate->email }}"
                                        data-work_authorization="{{ $candidate->work_authorization }}"
                                        data-expected_pay_rate="{{ $candidate->expected_pay_rate }}"
                                        data-availability_to_start="{{ $candidate->availability_to_start }}"
                                        data-years_of_experience="{{ $candidate->years_of_experience }}">
                                        {{ $candidate->first_name }} {{ $candidate->last_name }}</option>
                                @endforeach
                                <option value="1">One</option>
							<option value="2">Two</option>
							<option value="3">Three</option>
							<option value="4">Four</option>
                            </select>
                            <div class="file-hidden-list"></div>


                            <div class="uploadoc">
                                <a href="javascript:;" id="addFile" class="add-button">Upload Doc</a>
                                <span><img src="{{ asset('assets/images/upload.png') }}"></span>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="outbox">
                            <div class="file-list">
                            </div>
                        </div>
                    </div>

                </div> --}}
                <div class="image-container">
                    @if ($submission->additional_documents)
                        @foreach (explode('|', $submission->additional_documents) as $filename)
                            <img src="{{ asset('candidates/' . $filename) }}" alt="Image" width="200px"
                                height="200px">
                        @endforeach
                    @endif
                </div>
                <br><br>
                <div class="row">
                    <div class="col-md-10">
                    </div>
                    <div class="col-md-2 text-end">
                        <input type="hidden" name="submission_id" id="submission_id" value="{{ $submission->id }}">
                        <input type="hidden" name="job_id" value="{{ $job->id }}">
                        <input type="hidden" name="client_id" value="{{ $client->id }}">
                        <input type="hidden" name="vendor_id" value="{{ $vendor->id }}">
                        <input type="hidden" name="candidate_id" class="candidate_id">
                        <input type="submit" value="Save">
                    </div>
                </div>
                <a href="{{ route('submission.send-email', $submission->id) }}">Send Email</a>

            </div>
        </section>
    </form>
    @include('layout.footer')
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.popup .overlay .close').on('click', function() {
                $('.pop').removeClass('openpop');
            });

            $('#status').change(function() {
                // Get the selected option
                var selectedOption = $(this).find('option:selected').val();
                // Get the submission id
                var submission_id = $('#submission_id').val();


                if (selectedOption == '1') {
                    $('#salary-popup').addClass('openpop');
                } else {
                    $('#proceed-popup').addClass('openpop');
                }

                $('#assign-salary-btn').on('click', function() {
                    // Get the salary value
                    var salaryValue = $('#actual_salary').val();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('input[name="_token"]').val()
                        }
                    });

                    $.ajax({
                        method: 'POST',
                        url: '/submission/status/' + submission_id,
                        data: {
                            status: selectedOption,
                            _token: "{{ csrf_token() }}",
                            actual_salary: salaryValue
                        },
                        success: function(response) {
                            $('#salary-popup').removeClass('openpop');
                            $('#success').removeClass('d-none');
                            $('#success').text(response.message);

                        }
                    });
                });

                $('#proceed-btn').on('click', function() {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('input[name="_token"]').val()
                        }
                    });

                    $.ajax({
                        method: 'POST',
                        url: '/submission/status/' + submission_id,
                        data: {
                            status: selectedOption,
                            _token: "{{ csrf_token() }}",
                        },
                        success: function(response) {
                            $('#proceed-popup').removeClass('openpop');
                            $('#success').removeClass('d-none');
                            $('#success').text(response.message);
                        }
                    });
                })

            });


        });
    </script>
@endpush

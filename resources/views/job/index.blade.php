<?php
$title = 'Client Dashboard';
$keywords = '';
$desc = '';
$pageclass = 'clientdash';
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
                        <p>Dashboard / Jobs</p>
                    </div>
                </div>

                <div class="col-md-6 text-end">

                </div>
            </div>
        </div>
    </section>

    <section class="venderdashboar">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    @if (Auth::user()->id == 1)
                        <div class="sik-dropdown" id="sik-select">
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                ...
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li>
                                    <span class="dropdown-item" data-value="active">
                                        <img class="" src="{{ asset('assets/images/bulk1.png') }}" alt="btc" />
                                        Active
                                    </span>
                                </li>
                                <li>
                                    <span class="dropdown-item" data-value="inactive">
                                        <img class="" src="{{ asset('assets/images/bulk1.png') }}" alt="btc" />
                                        Inactive
                                    </span>
                                </li>
                                <li>
                                    <span class="dropdown-item" data-value="client">
                                        <img class="" src="{{ asset('assets/images/bulk4.png') }}" alt="btc" />
                                        Assign Vendors
                                    </span>
                                </li>
                                <li>
                                    <span class="dropdown-item" data-value="job">
                                        <img class="" src="{{ asset('assets/images/delete.png') }}" alt="btc" />
                                        Delete
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <button type="submit" class="cbtn" id="assign-btn">
                            Apply
                        </button>
                    @endif

                    {{-- vendor popup --}}
                    <div class="popup vendor_pop" id="vendor-popup">
                        <div class="overlay">
                            <a class="close" href="javascript:;">X</a>
                            <h5>Assign Vendors</h5>
                            <form>
                                <ul class="tabs-menu2">
                                    <li class="current"><a href="#tab-21">Vendors</a></li>
                                </ul>

                                <div class="tab">
                                    <div id="tab-21" class="tab-content2">
                                        <div class="form-group">
                                            <input type="search" id="search-vendor" name="" class="form-controll"
                                                placeholder="Search by name or email...">
                                        </div>
                                        <ul id="search-vendor-results">
                                        </ul>
                                        <input class="cbtn" id="assign-vendor-btn" type="button" value="Assign">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
                <div class="col-md-6 text-end">
                    <ul class="vendordash_invite">
                        <li>
                            <a class="cbtn filter_brn" href="javascript:;"><img
                                    src="{{ asset('assets/images/filter.png') }}">Filters</a>
                        </li>
                        <li>
                            <a class="cbtn searchjob_folder" href="javascript:;"><img
                                    src="{{ asset('assets/images/folder.png') }}">Add Folder</a>
                        </li>
                        @can('Job create')
                            <li>
                                <a class="cbtn addjob_pop" href="{{ route('job.create') }}"><img
                                        src="{{ asset('assets/images/invite.png') }}">ADD JOB</a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </div>
            <div class="filterform">
                <form action="{{ route('job') }}" method="get">

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input id="title" type="text" class="form-control" name="title" placeholder="">
                    </div>

                    <div class="form-group">
                        <label class="form-group">
                            Client Name
                            <select class="form-controll" name="client">
                                <option disabled selected>Select Client</option>
                                @foreach ($clients as $client)
                                    <option value="{{$client->id }}">{{ $client->name }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>

                    <div class="form-group">
                        <label class="form-group">
                            Department
                            <select class="form-controll" name="department">
                                <option disabled selected>Select</option>
                                <option>Software</option>
                                <option>Design</option>
                            </select>
                        </label>
                    </div>

                    <div class="form-group">
                        <label class="form-group">
                            Employment type
                            <select class="form-controll" name="employment_type">
                                <option disabled selected>Select</option>
                                <option value="Temporary">Temporary</option>
                                <option value="Permanent">Permanent</option>
                            </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="form-group">
                            Job Type
                            <select class="form-controll" name="job_type">
                                <option disabled selected>Select</option>
                                <option value="Temporary">Temporary</option>
                                <option value="Permanent">Permanent</option>
                            </select>
                        </label>
                    </div>

                    <div class="form-group">
                        <label class="form-group">
                            City*
                            <select class="form-controll" name="city">
                                <option disabled selected>Select city</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="form-group">
                            State*
                            <select class="form-controll" name="state">
                                <option disabled selected>Selct state</option>
                                @foreach ($states as $state)
                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="form-group">
                            Status
                            <select class="form-controll" name="status">
                                <option disabled selected>Selct state</option>
                                <option value="1">Active</option>
                                <option value="0">In-Active</option>
                            </select>
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="created_at_to">To</label>
                        <input id="created_at_to" type="date" class="form-control" name="created_at_to" placeholder="" >
                    </div>

                    <div class="form-group">
                        <label for="created_at_from">From</label>
                        <input id="created_at_from" type="date" class="form-control" name="created_at_from" placeholder="" >
                    </div>


                    <div class="form_bottons">
                        <button class="cbtn" type="submit">Apply</button>
                        <button class="cbtn btnreset" id="reset-btn" type="reset">Reset</button>
                    </div>

                </form>
            </div>
            <br>
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div id="sucess-asigment-msg"> </div>
            <div class="outbox outbox2">
                <table>
                    <thead>
                        <tr>
                            <th>
                                <label for="orderid">
                                    <input type="checkbox" name="" id="orderid">
                                    ID
                                </label>
                            </th>
                            <th>Title</th>
                            <th>Job Type</th>
                            <th>Department</th>
                            <th>Salary Range</th>
                            @can('Job status')
                                <th>Status</th>
                            @endcan
                            <th>
                                <div class="mydropdown">
                                    <ul class="dropbtn icons">
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                    </ul>
                                </div>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @can('Job access')
                            @foreach ($jobs as $job)
                                <tr>
                                    <td>
                                        <label for="">
                                            <input type="checkbox" name="" class="job-checkbox"
                                                value="{{ $job->id }}">
                                            {{ $job->id }}
                                        </label>
                                    </td>
                                    <td>{{ $job->title }}</td>
                                    <td>{{ $job->job_type }}</td>
                                    <td>{{ $job->department }}</td>
                                    <td>{{ $job->salary_range }}</td>
                                    @can('Job status')
                                        <td>
                                            <input data-id="{{ $job->id }}" class="toggle-class" type="checkbox"
                                                data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                                data-on="Active" data-off="InActive" {{ $job->status ? 'checked' : '' }}>
                                        </td>
                                    @endcan
                                    <td>
                                        <div class="dropdown">
                                            <ul class="dropbtn icons">
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                            </ul>
                                            @if ($job->deleted_at == null)
                                            <div id="myDropdown" class="dropdown-content">
                                                <a href="{{ route('job.show', $job->id) }}"><img
                                                        src="{{ asset('assets/images/eye.png') }}">View</a>
                                                @can('Job edit')
                                                    <a href="{{ route('job.edit', $job->id) }}"><img
                                                            src="{{ asset('assets/images/edit.png') }}">Edit</a>
                                                @endcan
                                                    <a href="{{ route('job.submission', $job->id) }}"><img
                                                            src="{{ asset('assets/images/eye.png') }}">Submission</a>
                                                @can('Job delete')
                                                    <a href="{{ route('job.delete', $job->id) }}"><img
                                                            src="{{ asset('assets/images/delete.png') }}">Delete</a>
                                                @endcan
                                            </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endcan
                    </tbody>
                </table>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <label class="showrow">
                            Show rows
                            <select>
                                <option>5 items</option>
                                <option>10 items</option>
                                <option>20 items</option>
                            </select>
                        </label>
                    </div>
                    @include('layout.pagination', ['paginator' => $jobs])
                </div>

            </div>

        </div>
    </section>
    @include('layout.footer')
@endsection

@push('scripts')
    <script>
        $(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var job_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: 'job/change-status/' + job_id,
                    data: {
                        'status': status,
                        'job_id': job_id
                    },
                    success: function(response) {
                        console.log(response)
                    }
                });
            })
        })
        $(document).ready(function() {

            $('.popup .overlay .close').on('click', function() {
                $('.vendor_pop').removeClass('openpop');
            });

            $('#assign-btn').on('click', function() {
                // Get the value of the hidden input field
                var selectedValue = $('#assignment_id').val();
                console.log(selectedValue);
                if (selectedValue == 'client') {
                    $('#vendor-popup').addClass('openpop');
                } else if (selectedValue == 'active') {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('input[name="_token"]').val()
                        }
                    });
                    let jobs = [];
                    $('.job-checkbox:checked').each(function() {
                        jobs.push($(this).val());
                    });
                    console.log(jobs);
                    $.ajax({
                        method: 'POST',
                        url: "{{ url('/job/active-status') }}",
                        data: {
                            jobs: jobs,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            sessionStorage.setItem('success_message', response.message);
                            location.reload();
                        }
                    });

                } else if (selectedValue == 'inactive') {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('input[name="_token"]').val()
                        }
                    });
                    let jobs = [];
                    $('.job-checkbox:checked').each(function() {
                        jobs.push($(this).val());
                    });

                    $.ajax({
                        method: 'POST',
                        url: "{{ url('/job/inactive-status') }}",
                        data: {
                            jobs: jobs,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            sessionStorage.setItem('success_message', response.message);
                            location.reload();
                        }
                    });

                } else if (selectedValue == 'job') {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('input[name="_token"]').val()
                        }
                    });
                    let jobs = [];
                    $('.job-checkbox:checked').each(function() {
                        jobs.push($(this).val());
                    });

                    $.ajax({
                        method: 'POST',
                        url: "{{ url('/job/bulk-delete') }}",
                        data: {
                            jobs: jobs,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            sessionStorage.setItem('success_message', response.message);
                            location.reload();
                        }
                    });

                }
            });

            function fetchData(query = '') {
                const url = "{{ url('/job/search-vendor') }}";
                const resultsContainer = '#search-vendor-results';
                console.log(resultsContainer)
                $.ajax({
                    method: 'GET',
                    url: url,
                    data: {
                        query: query
                    },
                    success: function(response) {
                        console.log(response);
                        var results = '';
                        $.each(response, function(index, vendor) {
                            results += '<tr>' +
                                '<td><label><input type="checkbox" class="vendor-checkbox" name="vendor[]" value="' +
                                vendor.id + '">' + vendor.id + '<label></td>' +
                                '<td>' + vendor.first_name + ' ' + vendor.last_name + '</td>' +
                                '</tr>'
                        });
                        $(resultsContainer).html(results);
                    }
                })
            }
            fetchData(); // Load jobs data initially

            $('#search-vendor').on('input', function() {
                const query = $(this).val();
                fetchData(query);
            });


            $('#assign-vendor-btn').on('click', function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    }
                });

                let vendors = [];
                $('.vendor-checkbox:checked').each(function() {
                    vendors.push($(this).val());
                })
                let jobs = [];
                $('.job-checkbox:checked').each(function() {
                    jobs.push($(this).val());
                })

                $.ajax({
                    method: 'POST',
                    url: "{{ url('/job/assign-vendor') }}",
                    data: {
                        vendors: vendors,
                        jobs: jobs,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        sessionStorage.setItem('success_message', response.message);
                        location.reload();
                    }
                });
            });

            $('#reset-btn').on('click',function(){
                console.log('asd');
                $('.form-control').val('');
            })

            // Check if there's a success message in sessionStorage
            const successMessage = sessionStorage.getItem('success_message');

            // Display the success message if it exists
            if (successMessage) {
                // Set a delay of 500 milliseconds (adjust as needed)
                setTimeout(function() {
                    $('#sucess-asigment-msg').addClass('alert');
                    $('#sucess-asigment-msg').addClass('alert-success');
                    $('#sucess-asigment-msg').text(
                        successMessage); // Use successMessage instead of response.message
                }, 500);

                // Clear the message after displaying
                setTimeout(function() {
                    $('#sucess-asigment-msg').removeClass('alert');
                    $('#sucess-asigment-msg').removeClass('alert-success');
                    $('#sucess-asigment-msg').text('');
                    sessionStorage.removeItem('success_message');
                }, 5000); // Adjust the delay (in milliseconds) as needed
            }

        });
    </script>
@endpush

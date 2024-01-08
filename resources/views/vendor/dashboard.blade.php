<?php
$title = 'Vendor Dashboard';
$keywords = '';
$desc = '';
$pageclass = 'vdashbord';
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
                        <p>Vendor Dashboard</p>
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
                    <div class="sik-dropdown" id="sik-select">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                                    Assign Clients
                                </span>
                            </li>
                            <li>
                                <span class="dropdown-item" data-value="job">
                                    <img class="" src="{{ asset('assets/images/bulk3.png') }}" alt="btc" />
                                    Assign Jobs
                                </span>
                            </li>
                            <li>
                                <span class="dropdown-item" data-value="folder">
                                    <img class="" src="{{ asset('assets/images/bulk2.png') }}" alt="btc" />
                                    Assign Folders
                                </span>
                            </li>
                        </ul>
                    </div>

                    <button type="submit" id="assign-btn" class="cbtn">
                        Apply
                    </button>

                    {{-- client popup --}}
                    <div class="popup vendor_pop" id="client-popup">
                        <div class="overlay">
                            <a class="close" href="javascript:;">X</a>
                            <h5>Assign Clients</h5>
                            <form>
                                <ul class="tabs-menu2">
                                    <li class="current"><a href="#tab-21">Clients</a></li>
                                </ul>

                                <div class="tab">
                                    <div id="tab-21" class="tab-content2">
                                        <div class="form-group">
                                            <input type="search" name="" class="form-controll" id="search-client"
                                                placeholder="Search by name or email...">
                                        </div>
                                        <ul id="search-client-results">
                                        </ul>
                                        <input class="cbtn" id="assign-client-btn" type="button" value="Assign">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    {{-- Job popup --}}
                    <div class="popup vendor_pop" id="job-popup">
                        <div class="overlay">
                            <a class="close" href="javascript:;">X</a>
                            <h5>Assign Jobs</h5>
                            <form>
                                <ul class="tabs-menu2">
                                    <li class="current"><a href="#tab-21">Jobs</a></li>
                                </ul>

                                <div class="tab">
                                    <div id="tab-21" class="tab-content2">
                                        <div class="form-group">
                                            <input type="search" id="search-job" name="" class="form-controll"
                                                placeholder="Search by name or email...">
                                        </div>
                                        <ul id="search-job-results">
                                        </ul>
                                        <input class="cbtn" id="assign-job-btn" type="button" value="Assign">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    {{-- folder popup --}}
                    <div class="popup vendor_pop" id="folder-popup">
                        <div class="overlay">
                            <a class="close" href="javascript:;">X</a>
                            <h5>Assign Folders</h5>
                            <form>
                                <ul class="tabs-menu2">
                                    <li class="current"><a href="#tab-21">Folders</a></li>
                                </ul>

                                <div class="tab">
                                    <div id="tab-21" class="tab-content2">
                                        <div class="form-group">
                                            <input type="search" id="search-folder" name=""
                                                class="form-controll" placeholder="Search by name or email...">
                                        </div>
                                        <ul id="search-folder-results">
                                        </ul>
                                        <input class="cbtn" id="assign-folder-btn" type="button" value="Assign">
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
                        @can('Vendor create')
                            <li>
                                <a class="cbtn" href="{{ route('vendor-invite') }}"><img
                                        src="{{ asset('assets/images/invite.png') }}">INVITE VENDOR</a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </div>
            <div class="filterform">
                <form action="{{ route('vendor') }}" method="get">

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" type="text" class="form-control" name="name" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone No</label>
                        <input id="phone" type="tel" class="form-control" name="phone" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="company_name">Company name</label>
                        <input id="company_name" type="text" class="form-control" name="company_name"
                            placeholder="">
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
                        <input id="created_at_to" type="date" class="form-control" name="created_at_to"
                            placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="created_at_from">From</label>
                        <input id="created_at_from" type="date" class="form-control" name="created_at_from"
                            placeholder="">
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
            <div id="sucess-asigment-msg"></div>
            <div class="outbox outbox2">
                <table>
                    <thead>
                        <tr>
                            <th>
                                <label for="orderid">
                                    <input type="checkbox" name="" id="id">
                                    ID
                                </label>
                            </th>
                            <th>Vendor Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Team Members</th>
                            @can('Vendor status')
                                <th>Status</th>
                            @endcan
                            <th>Created at</th>
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
                        @can('Vendor access')
                            @foreach ($vendors as $vendor)
                                <tr>
                                    <td>
                                        <label for="">
                                            <input type="checkbox" name="vendor[]" value="{{ $vendor->id }}"
                                                class="vendor-checkbox">
                                            {{ $vendor->id }}
                                        </label>
                                    </td>
                                    <td>{{ $vendor->first_name }} {{ $vendor->last_name }}</td>
                                    <td>{{ $vendor->email }}</td>
                                    <td>{{ $vendor->phone }}</td>
                                    <td>12</td>
                                    @can('Vendor status')
                                        <td>
                                            <input data-id="{{ $vendor->id }}" class="toggle-class" type="checkbox"
                                                data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                                data-on="Active" data-off="InActive" {{ $vendor->status ? 'checked' : '' }}>
                                        </td>
                                    @endcan
                                    <td>{{ $vendor->created_at }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <ul class="dropbtn icons">
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                            </ul>
                                            <div id="myDropdown" class="dropdown-content">
                                                <a href="{{ route('vendor-assignment', $vendor->id) }}"><img
                                                        src="{{ asset('assets/images/eye.png') }}">View</a>
                                                @can('Vendor edit')
                                                    <a href="{{ route('vendor-edit', $vendor->id) }}"><img
                                                            src="{{ asset('assets/images/edit.png') }}">Edit</a>
                                                @endcan
                                                @can('Vendor delete')
                                                    <a href="{{ route('vendor-delete', $vendor->id) }}"><img
                                                            src="{{ asset('assets/images/delete.png') }}">Delete</a>
                                                @endcan
                                            </div>
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
                    @include('layout.pagination', ['paginator' => $vendors])
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
                var vendor_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: 'vendor/change-status/' + vendor_id,
                    data: {
                        'status': status,
                        'vendor_id': vendor_id
                    },
                    success: function(response) {
                        console.log(response)
                    }
                });
            })
        });
        $(document).ready(function() {

            $('.popup .overlay .close').on('click', function() {
                $('.vendor_pop').removeClass('openpop');
            });

            $('#assign-btn').on('click', function() {
                // Get the value of the hidden input field
                var selectedValue = $('#assignment_id').val();
                console.log(selectedValue);
                if (selectedValue == 'client') {
                    $('#client-popup').addClass('openpop');
                } else if (selectedValue == 'job') {
                    $('#job-popup').addClass('openpop');
                } else if (selectedValue == 'active') {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('input[name="_token"]').val()
                        }
                    });
                    let vendors = [];
                    $('.vendor-checkbox:checked').each(function() {
                        vendors.push($(this).val());
                    });
                    console.log(vendors);
                    $.ajax({
                        method: 'POST',
                        url: "{{ url('/vendor/active-status') }}",
                        data: {
                            vendors: vendors,
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
                    let vendors = [];
                    $('.vendor-checkbox:checked').each(function() {
                        vendors.push($(this).val());
                    });

                    $.ajax({
                        method: 'POST',
                        url: "{{ url('/vendor/inactive-status') }}",
                        data: {
                            vendors: vendors,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            sessionStorage.setItem('success_message', response.message);
                            location.reload();
                        }
                    });

                } else if (selectedValue == 'folder') {
                    $('#folder-popup').addClass('openpop');
                }
            });

            function fetchData(query = '', isJob = false) {
                const url = isJob ? '/vendor/search-job' : '/vendor/search-client';
                const resultsContainer = isJob ? '#search-job-results' : '#search-client-results';
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
                        $.each(response, function(index, data) {
                            results += '<tr>' +
                                '<td><label><input class="' + (isJob ? 'job-checkbox' :
                                    'client-checkbox') + '" type="checkbox" name="' +
                                (isJob ? 'job[]' : 'client[]') + '" value="' +
                                data.id + '">' + data.id + '<label></td>' +
                                '<td>' + (isJob ? data.title : data.name) + '</td>' +
                                '</tr>'
                        });
                        $(resultsContainer).html(results);
                    }
                })
            }
            fetchData('', true); // Load jobs data initially
            fetchData('', false); // Load clients data initially

            function fetchFolder(query = '') {
                const url = '/vendor/search-folder';
                const resultsContainer = '#search-folder-results';
                console.log('asd');
                $.ajax({
                    method: 'GET',
                    url: url,
                    data: {
                        query: query
                    },
                    success: function(response) {
                        console.log(response);
                        var results = '';
                        $.each(response, function(index, folder) {
                            let checkboxValue = JSON.stringify({
                                'folders': folder.id,
                                'clients': folder.folder_items.filter(item => item
                                    .folder_id === folder.id).map(item => item
                                    .client_id),
                                'jobs': folder.folder_items.filter(item => item
                                    .folder_id === folder.id).map(item => item
                                    .job_id),
                            });

                            // Escape double quotes within the JSON string
                            checkboxValue = checkboxValue.replace(/"/g, '&quot;');

                            results += '<tr>' +
                                '<td><label><input type="checkbox" class="folder-checkbox" name="folder[]" value="' +
                                checkboxValue + '">' + folder.id + '</label></td>' +
                                '<td>' + folder.title + '</td>' +
                                '</tr>';
                        });
                        $(resultsContainer).html(results);
                    }
                })
            }
            fetchFolder();

            $('#search-folder').on('input', function() {
                const query = $(this).val();
                fetchFolder(query);
            });

            $('#search-job, #search-client').on('input', function() {
                const query = $(this).val();
                const isJob = $(this).attr('id') === 'search-job';
                fetchData(query, isJob);
            });


            $('#assign-client-btn').on('click', function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    }
                });

                let vendors = [];
                $('.vendor-checkbox:checked').each(function() {
                    vendors.push($(this).val());
                })
                let clients = [];
                $('.client-checkbox:checked').each(function() {
                    clients.push($(this).val());
                })

                $.ajax({
                    method: 'POST',
                    url: '/vendor/assign-client',
                    data: {
                        vendors: vendors,
                        clients: clients,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        sessionStorage.setItem('success_message', response.message);
                        location.reload();
                    }
                    error: function(xhr, status, error) {
                        console.error('AJAX Error: ', status, error);
                    }
                });
            });

            $('#assign-job-btn').on('click', function() {

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
                    url: '/vendor/assign-job',
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

            $('#assign-folder-btn').on('click', function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    }
                });

                // Extract client and job information from the selected folder checkbox
                var folderCheckbox = $('.folder-checkbox:checked');
                // console.log(folderCheckbox);
                // Array to store client and job information
                var clients = [];
                var jobs = [];

                // Loop through folderItems to collect client and job information
                folderCheckbox.each(function() {
                    // var folderInfoString = $(this).val();
                    // console.log('Folder Info String:', folderInfoString);

                    var folderInfo = JSON.parse($(this).val());

                    // Assuming folderInfo has 'clients' and 'jobs' arrays
                    clients = clients.concat(folderInfo.clients);
                    jobs = jobs.concat(folderInfo.jobs);
                });

                // Now you have both clients and jobs associated with the selected folder
                console.log(clients);
                console.log(jobs);

                let vendors = [];
                $('.vendor-checkbox:checked').each(function() {
                    vendors.push($(this).val());
                });
                7
                console.log(vendors);

                $.ajax({
                    method: 'POST',
                    url: '/vendor/assign-folder',
                    data: {
                        vendors: vendors,
                        jobs: jobs,
                        clients: clients,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        console.log(response);

                        sessionStorage.setItem('success_message', response.message);
                        location.reload();

                    }
                });
            });

            $('#reset-btn').on('click', function() {
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

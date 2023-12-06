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
                            <a class="cbtn" href="javascript:;"><img
                                    src="{{ asset('assets/images/filter.png') }}">Filters</a>
                        </li>
                        <li>
                            <a class="cbtn searchjob_folder" href="{{ route('folder.create') }}"><img
                                    src="{{ asset('assets/images/folder.png') }}">Add Folder</a>
                        </li>
                        <li>
                            {{-- <a class="cbtn addjob_pop" href="{{route('job.create')}}"><img src="{{asset('assets/images/invite.png')}}">ADD F</a> --}}
                        </li>
                    </ul>
                </div>
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
                                    <input type="checkbox" name="" id="orderid">
                                    ID
                                </label>
                            </th>
                            <th>Title</th>
                            <th>Category</th>
                            {{-- <th>Status</th> --}}
                            {{-- <th>Department</th> --}}
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
                        @foreach ($folders as $folder)
                            <tr>
                                <td>
                                    <label for="">
                                        <input type="checkbox" name="" class="folder-checkbox"
                                            value="{{ json_encode([
                                                'folders' => $folder->id,
                                                'clients' => $folder->folderItems->where('folder_id', $folder->id)->pluck('client_id'),
                                                'jobs' => $folder->folderItems->where('folder_id', $folder->id)->pluck('job_id'),
                                            ]) }}">
                                        {{ $folder->id }}
                                    </label>
                                </td>
                                <td>{{ $folder->title }}</td>
                                <td>{{ $folder->category }}</td>
                                {{-- <td>
                                    <input data-id="{{ $folder->id }}" class="toggle-class" type="checkbox"
                                        data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                        data-off="InActive" {{ $folder->status ? 'checked' : '' }}>
                                </td> --}}
                                {{-- <td>{{$folder->department}}</td> --}}
                                <td>
                                    <div class="dropdown">
                                        <ul class="dropbtn icons">
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                        </ul>
                                        <div id="myDropdown" class="dropdown-content">
                                            <a href="#"><img src="{{ asset('assets/images/eye.png') }}">View</a>
                                            <a href="{{ route('folder.edit', $folder->id) }}"><img
                                                    src="{{ asset('assets/images/edit.png') }}">Edit</a>
                                            <a href="{{ route('folder.delete', $folder->id) }}"><img
                                                    src="{{ asset('assets/images/delete.png') }}">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
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
                    <div class="col-md-6">
                        <ul class="pagination">
                            <li><a href="javascript:;"><i class="fa fa-angle-left"></i></a></li>
                            <li><a href="javascript:;">1</a></li>
                            <li><a href="javascript:;">2</a></li>
                            <li><a href="javascript:;">3</a></li>
                            <li><a href="javascript:;">4</a></li>
                            <li><a href="javascript:;"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </div>
                </div>

            </div>

        </div>
    </section>
    @include('layout.footer')
@endsection

@push('scripts')
    <script>
        // $(function() {
        //     $('.toggle-class').change(function() {
        //         var status = $(this).prop('checked') == true ? 1 : 0;
        //         var folder_id = $(this).data('id');

        //         $.ajax({
        //             type: "GET",
        //             dataType: "json",
        //             url: 'folder/change-status/' + folder_id,
        //             data: {
        //                 'status': status,
        //                 'folder_id': folder_id
        //             },
        //             success: function(response) {
        //                 console.log(response)
        //             }
        //         });
        //     })
        // });
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

                    var folderCheckbox = $('.folder-checkbox:checked');
                    var folderId = folderCheckbox.data('folder-id');

                    var folders = [];
                    folderCheckbox.each(function() {
                        var folderInfo = JSON.parse($(this).val());
                        folders = folders.concat(folderInfo.folders);
                    });
                    console.log(folders);

                    $.ajax({
                        method: 'POST',
                        url: '/folder/active-status',
                        data: {
                            folders: folders,
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
                    var folderCheckbox = $('.folder-checkbox:checked');
                    var folderId = folderCheckbox.data('folder-id');

                    var folders = [];
                    folderCheckbox.each(function() {
                        var folderInfo = JSON.parse($(this).val());
                        folders = folders.concat(folderInfo.folders);
                    });
                    console.log(folders);

                    $.ajax({
                        method: 'POST',
                        url: '/folder/inactive-status',
                        data: {
                            folders: folders,
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

                    var folderCheckbox = $('.folder-checkbox:checked');
                    var folderId = folderCheckbox.data('folder-id');

                    var folders = [];
                    folderCheckbox.each(function() {
                        var folderInfo = JSON.parse($(this).val());
                        folders = folders.concat(folderInfo.folders);
                    });
                    console.log(folders);

                    $.ajax({
                        method: 'POST',
                        url: '/folder/bulk-delete',
                        data: {
                            folders: folders,
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
                const url = '/job/search-vendor';
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

                // Extract client and job information from the selected folder checkbox
                var folderCheckbox = $('.folder-checkbox:checked');
                var folderId = folderCheckbox.data('folder-id');

                // Array to store client and job information
                var clients = [];
                var jobs = [];

                // Loop through folderItems to collect client and job information
                folderCheckbox.each(function() {
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
                })

                $.ajax({
                    method: 'POST',
                    url: '/folder/assign-vendor',
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

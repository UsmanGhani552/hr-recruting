<?php
$title = 'Client Dashboard';
$keywords = '';
$desc = '';
$pageclass = 'clientdash';
?>@extends('layout.master')

@section('top_nav')
    @include('layout.header')
@endsection

@section('main_content')

    <section class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="bnr_left">
                        <p>Dashboard / Clients</p>
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
                    @if(Auth::user()->id == 1)
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
                            {{-- <li>
							<span class="dropdown-item" data-value="job">
								<img class="" src="{{asset('assets/images/bulk3.png')}}" alt="btc" />
								Assign Jobs
							</span>
						</li> --}}
                        </ul>
                    </div>
                    <button type="submit" id="assign-btn" class="cbtn">
                        Apply
                    </button>
                    @endif
                    {{-- client popup --}}
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
                                            <input type="search" name="" class="form-controll" id="search-vendor"
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
                            <a class="cbtn searchclient_folder" href="javascript:;"><img
                                    src="{{ asset('assets/images/folder.png') }}">Add Folder</a>
                        </li>
                        @can('Client create')
                            <li>
                                <a class="cbtn addclint_pop" href="{{ route('client.create') }}"><img
                                        src="{{ asset('assets/images/invite.png') }}">ADD CLIENT</a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </div>
            <div class="filterform">
                <form action="{{ route('client') }}" method="get">

                     <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" type="text" class="form-control" name="name" placeholder="" >
                    </div>

                    <div class="form-group">
                        <label for="phonenumber">Phone No</label>
                        <input id="phonenumber" type="tel" class="form-control" name="phone" placeholder="" >
                    </div>

                    <div class="form-group">
                        <label for="homephone"></label>
                        <input id="homephone" type="tel" class="form-control" name="home" placeholder="" >
                    </div>

                    <div class="form-group">
                        <label for="emailaddres">Email</label>
                        <input id="emailaddres" type="email" class="form-control" name="email" placeholder="" >
                    </div>

                    <div class="form-group">
                        <label for="industry">Inustry</label>
                        <input id="industry" type="text" class="form-control" name="industry" placeholder="" >
                    </div>

                    <div class="form_bottons">
                        <button class="cbtn" type="submit">Apply</button>
                        <button class="cbtn btnreset" type="reset">Reset</button>
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
                                    Order ID
                                </label>
                            </th>
                            <th>Client Name</th>
                            <th>Client Email</th>
                            <th>Phone Number</th>
                            @can('Client status')
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
                        @can('Client access')
                            @foreach ($clients as $client)
                                <tr>
                                    <td>
                                        <label for="">
                                            <input type="checkbox" name="" class="client-checkbox"
                                                value="{{ $client->id }}">
                                            {{ $client->id }}
                                        </label>
                                    </td>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td>{{ $client->phone }}</td>
                                    @can('Client status')
                                    <td>
                                        <input data-id="{{ $client->id }}" class="toggle-class" type="checkbox"
                                            data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                            data-off="InActive" {{ $client->status ? 'checked' : '' }}>
                                    </td>
                                    @endcan
                                    <td>
                                        <div class="dropdown">
                                            <ul class="dropbtn icons">
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                            </ul>
                                            <div id="myDropdown" class="dropdown-content">
                                                <a href="{{ route('client.show', $client->id) }}"><img
                                                        src="{{ asset('assets/images/eye.png') }}">View</a>
                                                @can('Client edit')
                                                    <a href="{{ route('client.edit', $client->id) }}"><img
                                                            src="{{ asset('assets/images/edit.png') }}">Edit</a>
                                                @endcan
                                                @can('Client delete')
                                                    <a href="{{ route('client.delete', $client->id) }}"><img
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
                    @include('layout.pagination', ['paginator' => $clients])
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
                var client_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: 'client/change-status/' + client_id,
                    data: {
                        'status': status,
                        'client_id': client_id
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
                    $('#vendor-popup').addClass('openpop');
                } else if (selectedValue == 'active') {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('input[name="_token"]').val()
                        }
                    });
                    let clients = [];
                    $('.client-checkbox:checked').each(function() {
                        clients.push($(this).val());
                    });
                    console.log(clients);
                    $.ajax({
                        method: 'POST',
                        url: "{{url('/client/active-status')}}",
                        data: {
                            clients: clients,
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
                    let clients = [];
                    $('.client-checkbox:checked').each(function() {
                        clients.push($(this).val());
                    });

                    $.ajax({
                        method: 'POST',
                        url: "{{url('/client/inactive-status')}}",
                        data: {
                            clients: clients,
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
                const url = "{{url('/client/search-vendor')}}";
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
                let clients = [];
                $('.client-checkbox:checked').each(function() {
                    clients.push($(this).val());
                })

                $.ajax({
                    method: 'POST',
                    url: "{{url('/client/assign-vendor')}}",
                    data: {
                        vendors: vendors,
                        clients: clients,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        sessionStorage.setItem('success_message', response.message);
                        location.reload();
                    }
                });
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
    </script>
@endpush

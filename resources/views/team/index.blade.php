<?php
$title = 'Team Dashboard';
$keywords = '';
$desc = '';
$pageclass = 'mainteam';
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
                        <p>Dashboard / Teams</p>
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
                        </ul>
                    </div>
                    <button type="submit" class="cbtn" id="assign-btn">
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

                </div>
                <div class="col-md-6 text-end">
                    <ul class="vendordash_invite">
                        <li>
                            <a class="cbtn" href="javascript:;"><img
                                    src="{{ asset('assets/images/filter.png') }}">Filters</a>
                        </li>
                        <li>
                            <a class="cbtn" href="{{ route('team.create') }}"><img
                                    src="{{ asset('assets/images/invite.png') }}">ADD TEAM</a>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Company Name</th>
                            <th>Created at</th>
                            @can('Team status')
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
                        @foreach ($teams as $team)
                            <tr>
                                <td>
                                    <label for="">
                                        <input type="checkbox" name="" value="{{ $team->id }}"
                                            class="team-checkbox">
                                        {{ $team->id }}
                                    </label>
                                </td>
                                <td>{{ $team->name }}</td>
                                <td>{{ $team->email }}</td>
                                <td>{{ Auth::user()->name }}</td>
                                <td>{{ $team->created_at }}</td>
                                @can('Team status')
                                    <td>
                                        <input data-id="{{ $team->id }}" class="toggle-class" type="checkbox"
                                            data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                            data-on="Active" data-off="InActive" {{ $team->status ? 'checked' : '' }}>
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
                                            <a href="{{route('team.show', $team->id)}}"><img
                                                    src="{{ asset('assets/images/eye.png') }}">View</a>
                                            <a href="{{ route('team.edit', $team->id) }}"><img
                                                    src="{{ asset('assets/images/edit.png') }}">Edit</a>
                                            <a href="{{ route('team.delete', $team->id) }}"><img
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
        $(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var team_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: 'team/change-status/' + team_id,
                    data: {
                        'status': status,
                        'team_id': team_id
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

                    let teams = [];
                    $('.team-checkbox:checked').each(function() {
                        teams.push($(this).val());
                    });

                    $.ajax({
                        method: 'POST',
                        url: '/team/active-status',
                        data: {
                            teams: teams,
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
                    let teams = [];
                    $('.team-checkbox:checked').each(function() {
                        teams.push($(this).val());
                    });

                    $.ajax({
                        method: 'POST',
                        url: '/team/inactive-status',
                        data: {
                            teams: teams,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            sessionStorage.setItem('success_message', response.message);
                            location.reload();
                        }
                    });

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

                let teams = [];
                $('.team-checkbox:checked').each(function() {
                    teams.push($(this).val());
                })
                let clients = [];
                $('.client-checkbox:checked').each(function() {
                    clients.push($(this).val());
                })

                $.ajax({
                    method: 'POST',
                    url: '/team/assign-client',
                    data: {
                        teams: teams,
                        clients: clients,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        sessionStorage.setItem('success_message', response.message);
                        location.reload();
                    }
                });
            });

            $('#assign-job-btn').on('click', function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    }
                });

                let teams = [];
                $('.team-checkbox:checked').each(function() {
                    teams.push($(this).val());
                })
                let jobs = [];
                $('.job-checkbox:checked').each(function() {
                    jobs.push($(this).val());
                })
                console.log(teams)
                console.log(jobs)

                $.ajax({
                    method: 'POST',
                    url: '/team/assign-job',
                    data: {
                        teams: teams,
                        jobs: jobs,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
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

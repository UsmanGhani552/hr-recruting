<?php
$title = 'Candidate Main';
$keywords = '';
$desc = '';
$pageclass = 'maincadidate';
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
                        <p>Dashboard / Candidate</p>
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
                </div>
                <div class="col-md-6 text-end">
                    <ul class="vendordash_invite">
                        <li>
                            <a class="cbtn" href="javascript:;"><img
                                    src="{{ asset('assets/images/filter.png') }}">Filters</a>
                        </li>
                        @can('Candidate create')
                            <li>
                                <a class="cbtn" href="{{ route('candidate.create') }}"><img
                                        src="{{ asset('assets/images/invite.png') }}">ADD Candidates</a>
                            </li>
                        @endcan
                    </ul>
                </div>
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
                            <th>Candidate Name</th>
                            <th>Candidate Email</th>
                            <th>Phone Number</th>
                            @can('Candidate status')
                            <th>Status</th>
                            @endcan
                            <th>
                                <div class="mydropdown">
                                    <ul class="dropbtn icons">
                                        {{-- <li></li>
									<li></li>
									<li></li> --}}
                                        Actions
                                    </ul>

                                </div>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @can('Candidate access')
                            @foreach ($candidates as $candidate)
                                <tr>
                                    <td>
                                        <label for="">
                                            <input type="checkbox" name="" value="{{ $candidate->id }}"
                                            class="candidate-checkbox">
                                            {{ $candidate->id }}
                                        </label>
                                    </td>
                                    <td>{{ $candidate->first_name }} {{ $candidate->last_name }}</td>
                                    <td>{{ $candidate->email }}</td>
                                    <td>{{ $candidate->phone }}</td>
                                    @can('Candidate status')
                                    <td>
                                        <input data-id="{{ $candidate->id }}" class="toggle-class" type="checkbox"
                                            data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                            data-off="InActive" {{ $candidate->status ? 'checked' : '' }}>
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
                                                <a href="{{route('candidate.assignment')}}"><img src="{{ asset('assets/images/eye.png') }}">View</a>
                                                @can('Candidate edit')
                                                    <a href="{{ route('candidate.edit', $candidate->id) }}"><img
                                                            src="{{ asset('assets/images/edit.png') }}">Edit</a>
                                                @endcan
                                                @can('Candidate delete')
                                                    <a href="{{ route('candidate.delete', $candidate->id) }}"><img
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
                    @include('layout.pagination', ['paginator' => $candidates])
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
                var candidate_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: 'candidate/change-status/' + candidate_id,
                    data: {
                        'status': status,
                        'candidate_id': candidate_id
                    },
                    success: function(response) {
                        console.log(response)
                    }
                });
            });
        });

        $(document).ready(function() {

            $('#assign-btn').on('click', function() {
                // Get the value of the hidden input field
                var selectedValue = $('#assignment_id').val();
                console.log(selectedValue);
                if (selectedValue == 'active') {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('input[name="_token"]').val()
                        }
                    });
                    let candidates = [];
                    $('.candidate-checkbox:checked').each(function() {
                        candidates.push($(this).val());
                    });
                    console.log(candidates);
                    $.ajax({
                        method: 'POST',
                        url: '/candidate/active-status',
                        data: {
                            candidates: candidates,
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
                    let candidates = [];
                    $('.candidate-checkbox:checked').each(function() {
                        candidates.push($(this).val());
                    });

                    $.ajax({
                        method: 'POST',
                        url: '/candidate/inactive-status',
                        data: {
                            candidates: candidates,
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
                    let candidates = [];
                    $('.candidate-checkbox:checked').each(function() {
                        candidates.push($(this).val());
                    });

                    $.ajax({
                        method: 'POST',
                        url: '/candidate/bulk-delete',
                        data: {
                            candidates: candidates,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            sessionStorage.setItem('success_message', response.message);
                            location.reload();
                        }
                    });

                }
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

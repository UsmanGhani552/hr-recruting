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
                        <p>Dashboard / Submission</p>
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
                            <th>Job Title</th>
                            <th>Client Name</th>
                            <th>Vendor Name</th>
                            <th>Candidate Name</th>

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
                        @can('Submission access')
                            @foreach ($submissions as $submission)
                                <tr>
                                    <td>
                                        <label for="">
                                            <input type="checkbox" name="" value="{{ $submission->id }}"
                                                class="submission-checkbox">
                                            {{ $submission->id }}
                                        </label>
                                    </td>
                                    <td>{{ $submission->job->title }}</td>
                                    <td>{{ $submission->client->name }}</td>
                                    @if ($submission->vendor_id == 1)
                                        <td>{{ $submission->user->name }}</td>
                                    @else
                                        <td>{{ $submission->vendor->first_name }} {{ $submission->vendor->last_name }}</td>
                                    @endif
                                    <td>{{ $submission->candidate->first_name }} {{ $submission->candidate->last_name }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <ul class="dropbtn icons">
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                            </ul>
                                            <div id="myDropdown" class="dropdown-content">
                                                {{-- @can('Submission edit') --}}
                                                    <a href="{{ route('submission.show', $submission->id) }}"><img
                                                            src="{{ asset('assets/images/edit.png') }}">view</a>
                                                {{-- @endcan --}}
                                                @can('Submission delete')
                                                    <a href="{{ route('submission.delete', $submission->id) }}"><img
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
                    @include('layout.pagination', ['paginator' => $submissions])
                </div>

            </div>

        </div>
    </section>

    @include('layout.footer')
@endsection

{{-- @push('scripts')
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
@endpush --}}

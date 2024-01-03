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
                    {{-- <div class="sik-dropdown" id="sik-select">
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
                    </button> --}}
                </div>
                <div class="col-md-6 text-end">
                    <ul class="vendordash_invite">
                        <li>
                            <a class="cbtn filter_brn" href="javascript:;"><img
                                    src="{{ asset('assets/images/filter.png') }}">Filters</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="filterform">
                <form action="{{ route('submissions') }}" method="get">

                    <div class="form-group">
                        <label class="form-group">
                            Status
                            <select class="form-controll" name="status">
                                <option disabled selected>Selct state</option>
                                <option value="1">Approved</option>
                                <option value="2">Pending</option>
                                <option value="3">Rejected</option>
                            </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="form-group">
                            Vendor
                            <select class="form-controll" name="vendor">
                                <option disabled selected>Select Vendor</option>
                                @foreach ($vendors as $vendor)
                                    <option value="{{ $vendor->id }}">{{ $vendor->first_name }} {{ $vendor->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="form-group">
                            job
                            <select class="form-controll" name="job">
                                <option disabled selected>Select job</option>
                                @foreach ($jobs as $job)
                                    <option value="{{ $job->id }}">{{ $job->title }}
                                    </option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="form-group">
                            client
                            <select class="form-controll" name="client">
                                <option disabled selected>Select client</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }}
                                    </option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="form-group">
                            candidate
                            <select class="form-controll" name="candidate">
                                <option disabled selected>Select candidate</option>
                                @foreach ($candidates as $candidate)
                                    <option value="{{ $candidate->id }}">{{ $candidate->first_name }} {{ $candidate->last_name }}
                                    </option>
                                @endforeach
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
                                    Order ID
                                </label>
                            </th>
                            <th>Job Title</th>
                            <th>Client Name</th>
                            <th>Vendor Name</th>
                            <th>Team Member</th>
                            <th>Candidate Name</th>
                            <th>Vendor Commision</th>
                            @if (Auth::user()->id == 1)
                                <th>Admin Commision</th>
                            @endif
                            <th>Created At</th>
                            <th>Completed At</th>
                            <th>Status</th>

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
                                    <td>{{ $submission->teamMember->name ?? '-'}}</td>
                                    <td>{{ $submission->candidate->first_name }} {{ $submission->candidate->last_name }}</td>
                                    <td>{{ $submission->job->vendor_amount ?? '-' }}</td>
                                    @if (Auth::user()->id == 1)
                                        <td>{{ $submission->job->admin_amount ?? '-' }}</td>
                                    @endif
                                    <td>{{ $submission->job->created_at }}</td>
                                    <td>{{ $submission->job->completed_at ?? '-' }}</td>
                                    <td>
                                        @if ($submission->status == 1)
                                            <div class="badge bg-success">Approved</div>
                                        @elseif($submission->status == 2)
                                            <div class="badge bg-warning">Pending</div>
                                        @else
                                            <div class="badge bg-danger">Rejected</div>
                                        @endif
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

@push('scripts')
    <script>
        // $(function() {
        //     $('.toggle-class').change(function() {
        //         var status = $(this).prop('checked') == true ? 1 : 0;
        //         var candidate_id = $(this).data('id');

        //         $.ajax({
        //             type: "GET",
        //             dataType: "json",
        //             url: 'candidate/change-status/' + candidate_id,
        //             data: {
        //                 'status': status,
        //                 'candidate_id': candidate_id
        //             },
        //             success: function(response) {
        //                 console.log(response)
        //             }
        //         });
        //     });
        // });

        $(document).ready(function() {
            $('#reset-btn').on('click',function(){
                console.log('asd');
                $('.form-control').val('');
            })
            // $('#assign-btn').on('click', function() {
            //     // Get the value of the hidden input field
            //     var selectedValue = $('#assignment_id').val();
            //     console.log(selectedValue);
            //     if (selectedValue == 'active') {
            //         $.ajaxSetup({
            //             headers: {
            //                 'X-CSRF-TOKEN': $('input[name="_token"]').val()
            //             }
            //         });
            //         let candidates = [];
            //         $('.candidate-checkbox:checked').each(function() {
            //             candidates.push($(this).val());
            //         });
            //         console.log(candidates);
            //         $.ajax({
            //             method: 'POST',
            //             url: '/candidate/active-status',
            //             data: {
            //                 candidates: candidates,
            //                 _token: "{{ csrf_token() }}"
            //             },
            //             success: function(response) {
            //                 sessionStorage.setItem('success_message', response.message);
            //                 location.reload();
            //             }
            //         });

            //     } else if (selectedValue == 'inactive') {
            //         $.ajaxSetup({
            //             headers: {
            //                 'X-CSRF-TOKEN': $('input[name="_token"]').val()
            //             }
            //         });
            //         let candidates = [];
            //         $('.candidate-checkbox:checked').each(function() {
            //             candidates.push($(this).val());
            //         });

            //         $.ajax({
            //             method: 'POST',
            //             url: '/candidate/inactive-status',
            //             data: {
            //                 candidates: candidates,
            //                 _token: "{{ csrf_token() }}"
            //             },
            //             success: function(response) {
            //                 sessionStorage.setItem('success_message', response.message);
            //                 location.reload();
            //             }
            //         });

            //     } else if (selectedValue == 'job') {
            //         $.ajaxSetup({
            //             headers: {
            //                 'X-CSRF-TOKEN': $('input[name="_token"]').val()
            //             }
            //         });
            //         let candidates = [];
            //         $('.candidate-checkbox:checked').each(function() {
            //             candidates.push($(this).val());
            //         });

            //         $.ajax({
            //             method: 'POST',
            //             url: '/candidate/bulk-delete',
            //             data: {
            //                 candidates: candidates,
            //                 _token: "{{ csrf_token() }}"
            //             },
            //             success: function(response) {
            //                 sessionStorage.setItem('success_message', response.message);
            //                 location.reload();
            //             }
            //         });

            //     }
            // });

            // // Check if there's a success message in sessionStorage
            // const successMessage = sessionStorage.getItem('success_message');

            // // Display the success message if it exists
            // if (successMessage) {
            //     // Set a delay of 500 milliseconds (adjust as needed)
            //     setTimeout(function() {
            //         $('#sucess-asigment-msg').addClass('alert');
            //         $('#sucess-asigment-msg').addClass('alert-success');
            //         $('#sucess-asigment-msg').text(
            //         successMessage); // Use successMessage instead of response.message
            //     }, 500);

            //     // Clear the message after displaying
            //     setTimeout(function() {
            //         $('#sucess-asigment-msg').removeClass('alert');
            //         $('#sucess-asigment-msg').removeClass('alert-success');
            //         $('#sucess-asigment-msg').text('');
            //         sessionStorage.removeItem('success_message');
            //     }, 5000); // Adjust the delay (in milliseconds) as needed
            // }
        });
    </script>
@endpush

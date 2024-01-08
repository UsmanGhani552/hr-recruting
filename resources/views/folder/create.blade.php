<?php
$title = 'Create Folder';
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
                        <p>Folder / Create Folder </p>
                    </div>
                </div>

                <div class="col-md-6 text-end">

                </div>
            </div>
        </div>
    </section>

    <section class="vendor_invite addclient">
        <div class="container">
            <form method="POST" action="{{ route('folder.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <h6>Client</h6>
                        <div class="outbox admorebox">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-group">
                                        Folder title*
                                        <input type="text" name="title" class="form-controll"
                                            placeholder="Enter Title">
                                        @error('title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>

                                </div>

                                <div class="col-md-6">
                                    <label class="form-group">
                                        Category*
                                        <select class="form-controll" name="category" id="category-select">
                                            <option disabled selected>Select Catgeory</option>
                                            <option value="Job">Job</option>
                                            <option value="Client">Client</option>
                                        </select>
                                        @error('category')
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

                    <div class="col-md-6 d-none" id="job-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row adclientsearch">
                                    <div class="col-md-6">
                                        <h6>Assign Job</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="search" id="search-job" class="form-controll"
                                                placeholder="Search by name">
                                        </div>
                                    </div>
                                </div>
                                <div class="outbox outbox2">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>
                                                    <label for="orderid">
                                                        {{-- <input type="checkbox" name="" id="orderid"> --}}
                                                        ID
                                                    </label>
                                                </th>
                                                <th>Job Title</th>
                                            </tr>
                                        </thead>
                                        <tbody id="search-results-jobs">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-none" id="client-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row adclientsearch">
                                    <div class="col-md-6">
                                        <h6>Assign Client</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="search" id="search-client" class="form-controll"
                                                placeholder="Search by name">
                                        </div>
                                    </div>
                                </div>
                                <div class="outbox outbox2">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>
                                                    <label for="orderid">
                                                        {{-- <input type="checkbox" name="" id="orderid"> --}}
                                                        ID
                                                    </label>
                                                </th>
                                                <th>Client Name</th>
                                            </tr>
                                        </thead>
                                        <tbody id="search-results-clients">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" id="category-flash-msg" style="margin-top: 35px">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="outbox outbox2 text-center">
                                    <h6>Please select Catgeory First</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    @include('layout.footer')
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            function fetchData(query = '', isJob = false) {
                const url = isJob ? '/folder/search-jobs' : '/folder/search-clients';
                const resultsContainer = isJob ? '#search-results-jobs' : '#search-results-clients';

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
                                '<td><label><input type="checkbox" name="' +
                                (isJob ? 'jobs[]' : 'clients[]') +
                                '" value="' + data.id + '">' + data.id + '<label></td>' +
                                '<td>' + (isJob ? data.title : data.name) + '</td>' +
                                '</tr>';
                        });
                        $(resultsContainer).html(results);
                    }
                });
            }
            fetchData('' , true); // Load jobs data initially
            fetchData('' , false); // Load clients data initially

            $('#search-job, #search-client').on('input', function() {
                const query = $(this).val();
                const isJob = $(this).attr('id') === 'search-job';
                fetchData(query, isJob);
            });

            $('#category-select').on('change', function() {
                let selectedCategory = $(this).val();
                if (selectedCategory == 'Job') {
                    $('#client-content').addClass('d-none');
                    $('#job-content').removeClass('d-none');
                    $('#category-flash-msg').addClass('d-none');
                } else if (selectedCategory == 'Client') {
                    $('#job-content').addClass('d-none');
                    $('#client-content').removeClass('d-none');
                    $('#category-flash-msg').addClass('d-none');
                } else {
                    $('#category-flash-msg').removeClass('d-none');
                }
            });
        });
    </script>
@endpush

<?php
$title = 'Create Job';
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
                        <p>Folder / Edit Folder </p>
                    </div>
                </div>

                <div class="col-md-6 text-end">

                </div>
            </div>
        </div>
    </section>

    <section class="vendor_invite addclient">
        <div class="container">
            <form method="POST" action="{{ route('folder.update' , $folder->id) }}" >
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <h6>Folder</h6>
                        <div class="outbox admorebox">
                            <input type="hidden" id="folder-id" value="{{ $folder->id }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-group">
                                        Folder title*
                                        <input type="text" name="title" class="form-controll" placeholder="Enter Title"
                                            value="{{ $folder->title }}">
                                        @error('title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>

                                </div>

                                <div class="col-md-6">
                                    <label class="form-group">
                                        Category*
                                        <select class="form-controll" name="category" id="category-select">
                                            <option value="Job" {{ $folder->category == 'Job' ? 'selected' : '' }} {{ $folder->category !== 'Job' ? 'disabled' : '' }}>Job
                                            </option>
                                            <option value="Client" {{ $folder->category == 'Client' ? 'selected' : '' }} {{ $folder->category !== 'Client' ? 'disabled' : '' }}>
                                                Client</option>
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
                </div>
            </form>
        </div>
    </section>
    @include('layout.footer')
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            function fetchJobs(query = '') {
                let folderId = $('#folder-id').val();
                $.ajax({
                    method: 'GET',
                    url: '/folder/selected-jobs/' + folderId,
                    data: {
                        query: query
                    },
                    success: function(response) {
                        // console.log(response);
                        let totalJobs = response[0];
                        let selectedJobs = response[1];

                        var results = '';
                        $.each(totalJobs, function(index, job) {
                            isChecked = false;
                            for(let i = 0 ; i < selectedJobs.length ; i++){
                                if(selectedJobs[i].job_id == job.id){
                                    isChecked = true;
                                    break;
                                }
                            }
                            results += '<tr>' +
                                '<td><label><input type="checkbox" name="jobs[]" value="' +
                                job.id + '" ' + (isChecked ? 'checked' : '') + '>' + job.id + '<label></td>' +
                                '<td>' + job.title + '</td>' +
                                '</tr>'
                        });
                        $('#search-results-jobs').html(results);
                    }
                });
            }
            fetchJobs();

            $('#search-job').on('input', function() {
                var query = $(this).val();
                fetchJobs(query)
            });

            function fetchClients(query = '') {
                let folderId = $('#folder-id').val();
                $.ajax({
                    method: 'GET',
                    url: '/folder/selected-clients/' + folderId,
                    data: {
                        query: query
                    },
                    success: function(response) {
                        let totalClients = response[0];
                        let selectedClients = response[1];

                        var results = '';
                        $.each(totalClients, function(index, client) {
                            isChecked = false;
                            for (let i = 0 ; i < selectedClients.length ; i++) {
                                if (selectedClients[i].client_id == client.id) {
                                    isChecked = true;
                                    break;
                                }
                            }
                            results += '<tr>' +
                                '<td><label><input type="checkbox" name="clients[]" value="' +
                                client.id + '" ' + (isChecked ? 'checked' : '') + '>' + client.id + '<label></td>' +
                                '<td>' + client.name + '</td>' +
                                '</tr>'
                        });
                        $('#search-results-clients').html(results);
                    }
                });
            }
            fetchClients();
            $('#search-client').on('input', function() {
                var query = $(this).val();
                fetchClients(query)
            });
        });
        $('#category-select').on('change', function() {
            let selectedCategory = $(this).val();
            console.log(selectedCategory);
            if (selectedCategory == 'Job') {
                $('#client-content').addClass('d-none');
                $('#job-content').removeClass('d-none');
            } else if (selectedCategory == 'Client') {
                $('#job-content').addClass('d-none');
                $('#client-content').removeClass('d-none');
            }
        }).trigger('change');
    </script>
@endpush

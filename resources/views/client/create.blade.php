<?php
$title = 'Add Client';
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
                        <p>Client / Add New Client</p>
                    </div>
                </div>

                <div class="col-md-6 text-end">

                </div>
            </div>
        </div>
    </section>

    <section class="vendor_invite addclient">
        <div class="container">
            <form method="POST" action="{{ route('client.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <h6>Client</h6>
                        <div class="outbox admorebox">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-group">
                                        Client Name*
                                        <input type="text" name="name" class="form-controll"
                                            placeholder="Enter email/username">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>

                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        Website
                                        <input type="text" name="website" class="form-controll"
                                            placeholder="Enter email/username">
                                        @error('website')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>

                                </div>
                                <div class="col-md-12">
                                    <label class="form-group">
                                        LinkedIn Page
                                        <input type="text" name="linkedln_page" class="form-controll"
                                            placeholder="Enter you company name">
                                        @error('linkedln_page')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>

                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        Email
                                        <input type="email" name="email" class="form-controll"
                                            placeholder="Enter your Email">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>

                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        Phone No
                                        <input type="tell" name="phone" class="form-controll" placeholder="Phone">
                                        @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>

                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        Address*
                                        <select class="form-controll" name="address">
                                            <option></option>
                                            <option>Address 1</option>
                                            <option>Address 2</option>
                                            <option>Address 3</option>
                                            <option>Address 4</option>
                                        </select>
                                        @error('address')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        City*
                                        <select class="form-controll" name="city">
                                            @foreach ($cities as $city)
                                                <option></option>
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('city')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        State*
                                        <select class="form-controll" name="state">
                                            @foreach ($states as $state)
                                                <option></option>
                                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('state')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        Country*
                                        <select class="form-controll" name="country">
                                            <option></option>
                                            <option>United States</option>
                                            @error('country')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </select>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        Company Size
                                        <input type="text" name="company_size" class="form-controll"
                                            placeholder="Company Size">
                                        @error('company_size')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        Industry
                                        <input type="text" name="industry" class="form-controll"
                                            placeholder="Company Size">
                                        @error('industry')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        Year Founded
                                        <input type="date" name="year_founded" class="form-controll"
                                            placeholder="Company Size">
                                        @error('year_founded')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-group">
                                        Status*
                                        <select class="form-controll" name="marital_status">
                                            <option></option>
                                            <option>married</option>
                                            <option>Single</option>
                                        </select>
                                        @error('marital_status')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <div class="file-hidden-list"></div>
                                    <label class="form-group">
                                        Upload Documents For Vendor
                                        <div class="uploadoc">
                                            {{-- <a href="javascript:;" id="addFile" class="add-button">Upload</a>
                                            <span><img src="{{ asset('assets/images/upload.png') }}"></span> --}}
                                            <input type="file" name="vendor_documents[]" multiple>
                                        </div>
                                        @error('vendor_documents')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <div class="file-hidden-list2"></div>
                                    <label class="form-group">
                                        Upload All Documents (for Admin)
                                        <div class="uploadoc">
                                            {{-- <a href="javascript:;" id="addFile2" class="add-button">Upload</a>
                                            <span><img src="{{ asset('assets/images/upload.png') }}"></span> --}}
                                            <input type="file" name="admin_documents[]" multiple>
                                        </div>
                                        @error('admin_documents')
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

                    <div class="col-md-8">

                        <h6>Uploaded Documents for Vendors</h6>
                        <div class="outbox adclientbox">
                            <div class="file-list">
                            </div>
                        </div>
                        <br>
                        <br>

                        <h6>Uploaded Documents for Admin</h6>
                        <div class="outbox adclientbox">
                            <div class="file-list2">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row adclientsearch">
                                    <div class="col-md-6">
                                        <h6>Assign Vendors</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="search" id="search-input" class="form-controll"
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
                                                <th>Vendor Name</th>
                                            </tr>
                                        </thead>
                                        <tbody id="search-results">
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
                function fetchData(query = '') {
                    $.ajax({
                        method: 'GET',
                        url: '/client/search-vendors',
                        data: {
                            query: query
                        },
                        success: function(response) {
                            console.log(response);
                            var results = '';
                            $.each(response, function(index, vendor) {
                                results += '<tr>' +
                                    '<td><label><input type="checkbox" name="vendor[]" value="' +
                                    vendor.id + '">' + vendor.id + '<label></td>' +
                                    '<td>' + vendor.first_name + ' ' + vendor.last_name + '</td>' +
                                    '</tr>'
                            });
                            $('#search-results').html(results);
                        }
                    })
                }
                fetchData();
                $('#search-input').on('input', function() {
                    var query = $(this).val();
                    fetchData(query);
                });
            });
        </script>
    @endpush

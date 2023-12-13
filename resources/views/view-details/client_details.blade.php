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
                        <p>Client / Edit New Client</p>
                    </div>
                </div>

                <div class="col-md-6 text-end">

                </div>
            </div>
        </div>
    </section>

    <section class="vendor_invite addclient">
        <div class="container">
            <form method="POST" action="{{ route('client.update', $client->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <input type="hidden" value="{{$client->id}}" id="client_id">
                    <div class="col-md-4">
                        <h6>Client</h6>
                        <div class="outbox admorebox">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-group">
                                        Client Name*
                                        <input type="text" name="name" class="form-controll" {{Auth::user()->id == 1 ? '' : 'disabled'}}
                                            placeholder="Enter email/username" value="{{ $client->name }}">
                                    </label>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        Website
                                        <input type="text" name="website" class="form-controll" {{Auth::user()->id == 1 ? '' : 'disabled'}}
                                            placeholder="Enter email/username" value="{{ $client->website }}">
                                    </label>
                                    @error('webiste')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label class="form-group">
                                        LinkedIn Page
                                        <input type="text" name="linkedln_page" class="form-controll" {{Auth::user()->id == 1 ? '' : 'disabled'}}
                                            placeholder="Enter you company name" value="{{ $client->linkedln_page }}">
                                    </label>
                                    @error('linkedln_page')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        Email
                                        <input type="email" name="email" class="form-controll" {{Auth::user()->id == 1 ? '' : 'disabled'}}
                                            placeholder="Enter your Email" value="{{ $client->email }}">
                                    </label>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        Phone No
                                        <input type="tell" name="phone" class="form-controll" placeholder="Phone" {{Auth::user()->id == 1 ? '' : 'disabled'}}
                                            value="{{ $client->phone }}">
                                    </label>
                                    @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        Address*
                                        <select class="form-controll" name="address" {{Auth::user()->id == 1 ? '' : 'disabled'}}>
                                            <option value="{{ $client->address }}"
                                                {{ $client->address == 'Address 1' ? 'selected' : '' }}>Address 1</option>
                                            <option value="{{ $client->address }}"
                                                {{ $client->address == 'Address 2' ? 'selected' : '' }}>Address 2</option>
                                            <option value="{{ $client->address }}"
                                                {{ $client->address == 'Address 3' ? 'selected' : '' }}>Address 3</option>
                                            <option value="{{ $client->address }}"
                                                {{ $client->address == 'Address 4' ? 'selected' : '' }}>Address 4</option>
                                        </select>
                                        @error('address')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        City*
                                        <select class="form-controll" name="city" {{Auth::user()->id == 1 ? '' : 'disabled'}}>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}"
                                                    {{ $client->city_id == $city->id ? 'selected' : '' }}>
                                                    {{ $city->name }}</option>
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
                                        <select class="form-controll" name="state" {{Auth::user()->id == 1 ? '' : 'disabled'}}>
                                            @foreach ($states as $state)
                                                <option value="{{ $state->id }}"
                                                    {{ $client->state_id == $state->id ? 'selected' : '' }}>
                                                    {{ $state->name }}</option>
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
                                        <select class="form-controll" name="country" {{Auth::user()->id == 1 ? '' : 'disabled'}}>
                                            <option value="United States">United States</option>
                                            @error('country')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </select>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        Company Size
                                        <input type="text" name="company_size" class="form-controll" {{Auth::user()->id == 1 ? '' : 'disabled'}}
                                            placeholder="Company Size" value="{{ $client->company_size }}">
                                        @error('company_size')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        Industry
                                        <input type="text" name="industry" class="form-controll" {{Auth::user()->id == 1 ? '' : 'disabled'}}
                                            placeholder="Company Size" value="{{ $client->industry }}">
                                        @error('industry')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        Year Founded
                                        <input type="date" name="year_founded" class="form-controll" {{Auth::user()->id == 1 ? '' : 'disabled'}}
                                            placeholder="Company Size" value="{{ $client->year_founded }}">
                                        @error('year_founded')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-group">
                                        Status*
                                        <select class="form-controll" name="marital_status" {{Auth::user()->id == 1 ? '' : 'disabled'}}>
                                            <option value="married"
                                                {{ $client->marital_status == 'married' ? 'selected' : '' }}>married
                                            </option>
                                            <option value="Single"
                                                {{ $client->marital_status == 'Single' ? 'selected' : '' }}>Single</option>
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
                                            <input type="file" name="vendor_documents[]" multiple {{Auth::user()->id == 1 ? '' : 'disabled'}}>
                                            @error('vendor_documnets')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <div class="file-hidden-list2"></div>
                                    <label class="form-group">
                                        Upload All Documents (for Admin)
                                        <div class="uploadoc">
                                            {{-- <a href="javascript:;" id="addFile2" class="add-button">Upload</a>
                                            <span><img src="{{ asset('assets/images/upload.png') }}"></span> --}}
                                            <input type="file" name="admin_documents[]" multiple {{Auth::user()->id == 1 ? '' : 'disabled'}}>
                                            @error('admin_documnets')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <input type="submit" name="" value="Submit" {{Auth::user()->id == 1 ? '' : 'disabled'}}>
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
                                            <input type="search" id="search-input" class="form-controll" {{Auth::user()->id == 1 ? '' : 'disabled'}}
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
                let client_id = $('#client_id').val();
                $.ajax({
                    method: 'GET',
                    url: '/client/selected-vendors/'+client_id,
                    data: {
                        query: query
                    },
                    success: function(response) {
                        // console.log(response);
                        let allVendors = response[0];
                        let selectedVendors = response[1];
                        var results = '';
                        $.each(allVendors, function(index, vendor) {
                            // var isChecked = selectedVendors.some(function(selected) {
                            //     return selected.vendor_id === vendor.id;
                            // });
                            let isChecked = false;
                            for(let i = 0 ; i < selectedVendors.length ; i++){
                                if(selectedVendors[i].vendor_id == vendor.id){
                                    isChecked = true;
                                    break;
                                }
                            }

                            results += '<tr>' +
                                '<td><label><input type="checkbox" name="vendor[]" value="' +
                                vendor.id + '" ' + (isChecked ? 'checked' : '') + '>' + vendor
                                .id + '</label></td>' +
                                '<td>' + vendor.first_name + ' ' + vendor.last_name + '</td>' +
                                '</tr>';
                        });

                        $('#search-results').html(results);
                    }
                });
            }
            fetchData();
            $('#search-input').on('input', function() {
                var query = $(this).val();
                fetchData(query);
            });
        });
    </script>
@endpush

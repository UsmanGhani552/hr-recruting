<?php
$title = 'Register';
$keywords = '';
$desc = '';
$pageclass = 'register-page';
?>

@extends('layout.master')

@section('top_nav')
    @include('layout.header')
@endsection

@section('main_content')
    <section class="vender_login">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <figure>
                        <img src="{{ asset('assets/images/register-img.png') }}">
                    </figure>
                </div>
                <div class="col-md-6">
                    <div class="box">
                        <h2>Vendor invite</h2>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                            totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae</p>
                        <form method="POST" action="{{ route('vendor-store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-group">
                                        First Name
                                        <input type="text" name="first_name" class="form-controll"
                                            placeholder="Enter First Name">
                                            @error('first_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        Last Name
                                        <input type="text" name="last_name" class="form-controll"
                                            placeholder="Enter Last Name">
                                            @error('last_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>

                                </div>
                                <div class="col-md-12">
                                    <label class="form-group">
                                        Company Name
                                        <input type="text" name="company_name" class="form-controll"
                                            placeholder="Enter you company name">
                                        @error('company_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>

                                </div>

                                <div class="col-md-6">
                                    <label class="form-group">
                                        Email
                                        <input type="email" name="email" class="form-controll"
                                            placeholder="Email Address">
                                            @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        Phone No
                                        <input type="tel" name="phone" class="form-controll"
                                            placeholder="000-000-000 ">
                                            @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        Password
                                        <input type="password" name="password" class="form-controll"
                                            placeholder="000-000-000 ">
                                            @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        Confirm Password
                                        <input type="password" name="password_confirmation" class="form-controll"
                                            placeholder="000-000-000 ">
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-group">
                                        Home/Office
                                        <input type="tel" name="home" class="form-controll"
                                            placeholder="000-000-000 ">
                                            @error('home')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                {{-- <div class="col-md-6">
                                <label class="form-group">
                                      State
                                      <input type="text" name="" class="form-controll" placeholder="enter state">
                                </label>
                                </div> --}}
                                <div class="col-md-6">
                                    <label class="form-group">
                                        State
                                        <select class="form-controll select2" name="state">
                                            <option></option>
                                            @foreach ($states as $state)
                                                <option value={{ $state->id }}>{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('state')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        City
                                        <select class="form-controll select2" name="city">
                                            <option></option>
                                            @foreach ($cities as $city)
                                                <option value={{ $city->id }}>{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('city')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                {{-- <div class="col-md-6">
                                <label class="form-group">
                                      City
                                      <input type="text" name="" class="form-controll" placeholder="city">
                                </label>
                                </div> --}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="btn" type="submit" name="" value="Submit">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    @include('layout.footer')
@endsection
<style>
    .select2-container--default .select2-selection--single .select2-selection__placeholder {
        display: block;
        width: 100%;
        border: 1px solid #C1C7CD;
        height: 54px;
        border-radius: 10px;
        background: #EEEEEE;
        color: #9FA6B2;
        padding: 10px 10px;
        /* margin: 10px 0px; */
    }

    span.select2-selection.select2-selection--single.select2-selection--clearable {
        display: block;
        width: 100%;
        border: 1px solid #C1C7CD;
        height: 54px;
        border-radius: 10px;
        background: #EEEEEE;
        color: #9FA6B2;
        padding: 10px 10px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #444;
        line-height: 28px;
        padding: 0px !important;
    }

    .select2-container--default .select2-selection--single {
        background-color: #fff;
        border: none !important;
        border-radius: 4px;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        display: none;
    }

    span.select2-selection.select2-selection--single {
        margin-bottom: 18px;
        margin-top: 3px;
    }
</style>

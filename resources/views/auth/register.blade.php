{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


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
                        <form method="POST" {{ route('register') }}>
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-group" for="email">
                                        First Name
                                        {{-- <input type="text" name="" class="form-controll" id="email" placeholder="Enter email/username"> --}}
                                        <input id="name" type="text"
                                            class="form-controll @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group" for="email">
                                        Last Name
                                        <input type="text" name="" class="form-controll" id="email"
                                            placeholder="Enter email/username">
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-group" for="email">
                                        Company Name
                                        <input type="text" name="" class="form-controll" id="email"
                                            placeholder="enter you company name">
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group" for="email">
                                        Email
                                        {{-- <input type="email" name="" class="form-controll" id="email" placeholder="Email Address"> --}}
                                        <input id="email" type="email"
                                            class="form-controll @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group" for="email">
                                        Phone No
                                        <input type="tel" name="" class="form-controll" id="email"
                                            placeholder="000-000-000 ">
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group" for="email">
                                        Password
                                        {{-- <input type="tel" name="" class="form-controll" id="email" placeholder="000-000-000 "> --}}
                                        <input id="password" type="password"
                                            class="form-controll @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group" for="email">
                                        Confirm Password
                                        {{-- <input type="tel" name="" class="form-controll" id="email" placeholder="000-000-000 "> --}}
                                            <input id="password-confirm" type="password" class="form-controll"
                                                name="password_confirmation" required autocomplete="new-password">
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-group">
                                        Home/Office
                                        <input type="tel" name="" class="form-controll" id="email"
                                            placeholder="000-000-000 ">
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        State
                                        <input type="text" name="" class="form-controll" id="email"
                                            placeholder="enter state">
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-group">
                                        City
                                        <input type="text" name="" class="form-controll" id="email"
                                            placeholder="city">
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="btn" type="submit" name="" value="Submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>
    @include('layout.footer')
@endsection

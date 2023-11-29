<?php
$title = "Home Screen";
$keywords = "";
$desc = "";
$pageclass = "home-page";
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
                            <img src="{{asset('assets/images/login-img.png')}}">
                      </figure>
                </div>
                <div class="col-md-6">
                      <div class="box">
                            <h2>LOGIN</h2>
                            <p>To keep connected with us please login with your personal information by email address and password</p>
                            <form>
                                  <label class="form-group" for="email">
                                        Email
                                        <input type="email" name="" class="form-controll" id="email" placeholder="Enter Email">
                                  </label>
                                  <label class="form-group" for="pasword">
                                        Password
                                        <input type="email" name="" class="form-controll" id="password" placeholder="********************">
                                  </label>

                                  <label class="form-group">
                                        <ul>
                                              <li>Forgot <a href="javascript:;">Email</a></li>
                                              <li>or <a href="javascript:;">Password?</a></li>
                                        </ul>
                                  </label>
                                  <div class="form-group">
                                        <input class="btn" type="submit" name="" value="Login">
                                  </div>
                                  <p>Don’t have an account? <a href="">Sign up now</a></p>
                            </form>
                      </div>
                </div>
          </div>
    </div>
</section>

@include('layout.footer')
@endsection



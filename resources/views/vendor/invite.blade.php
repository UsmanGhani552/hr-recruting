<?php
$title = 'Vendor Invite';
$keywords = '';
$desc = '';
$pageclass = 'vinvitepg';
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
                        <p>Dashboard/</p>
                    </div>
                </div>

                <div class="col-md-6 text-end">

                </div>
            </div>
        </div>
    </section>

    <section class="vendor_invite">
        <div class="container">
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
            <div class="row">
                <div class="col-md-4">
                    <h6>Vendors</h6>
                    <div class="outbox admorebox">
                        <form action="{{ route('vendor-send-email') }}" method="POST">
                            @csrf
                            <div class="sendinvit">
                                <div class="addemailmore">
                                    <label class="form-group">
                                        Email Address
                                        <input type="email" name="email[]" class="form-controll"
                                            placeholder="Enter email">
                                            @error('email.*')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                    </label>
                                </div>
                                <ul>
                                    <li><a href="javascript:;" class="addmore"><img
                                                src="{{ asset('assets/images/plus.png') }}"> Add More</a></li>
                                    <li>
                                        <a href="javascript:;" class="delete">- Remove</a>
                                    </li>
                                </ul>

                                <div class="form-group">
                                    <input type="submit" name="" value="Submit">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

                <div class="col-md-8">
                    <h6>Vendors Invitations</h6>
                    <div class="outbox outbox2">
                        <table>
                            <thead>
                                <tr>
                                    <th>
                                        <label for="orderid">
                                            <input type="checkbox" name="" id="orderid">
                                            ID
                                        </label>
                                    </th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>
                                        <div class="mydropdown">
                                            <ul class="dropbtn icons">
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                            </ul>
                                        </div>
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($vendorInvitations as $vendorInvitation)
                                <tr>
                                    <td>
                                        <label for="">
                                            <input type="checkbox" name="" id="">
                                            {{ $loop->index + 1 }}
                                        </label>
                                    </td>
                                    <td>{{$vendorInvitation->email}}</td>
                                    <td class="active">{{$vendorInvitation->status == 1 ? 'Active' : 'Pending'}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <ul class="dropbtn icons">
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                            </ul>
                                            <div id="myDropdown" class="dropdown-content">
                                                <a href="{{route('vendor-resend-email',$vendorInvitation->id)}}"><img
                                                        src="{{ asset('assets/images/eye.png') }}">Resend</a>
                                                <a href="{{route('vendor-delete-invite',$vendorInvitation->id)}}"><img
                                                        src="{{ asset('assets/images/delete.png') }}">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- <label class="showrow">
                                    Show rows
                                    <select>
                                        <option>5 items</option>
                                        <option>10 items</option>
                                        <option>20 items</option>
                                    </select>
                                    </label> -->
                            </div>
                            {{-- <div class="col-md-6">
                                <ul class="pagination">
                                    <li><a href="javascript:;"><i class="fa fa-angle-left"></i></a></li>
                                    <li><a href="javascript:;">1</a></li>
                                    <li><a href="javascript:;">2</a></li>
                                    <li><a href="javascript:;">3</a></li>
                                    <li><a href="javascript:;">4</a></li>
                                    <li><a href="javascript:;"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div> --}}
                            @include('layout.pagination', ['paginator' => $vendorInvitations])
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('layout.footer')
@endsection

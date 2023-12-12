<?php
$title = 'Vendor Assignment';
$keywords = '';
$desc = '';
$pageclass = 'demopg';
use App\Models\Job;
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
                        <p>Vendors Dashboard/ Zach HR</p>
                    </div>
                </div>

                <div class="col-md-6 text-end">

                </div>
            </div>
        </div>
    </section>

    <section class="vender-assignment">
        <div class="container">
            <div id="tabs-container">
                {{-- <ul class="tabs-menu">
                    <li class="current"><a href="#tab-1">Permissions</a></li>
                    <li><a href="{{route('role.index')}}">Roles</a></li>
                    <li><a href="#tab-3">Users</a></li>
                </ul> --}}
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <a class="nav-link active" href="{{route('permission.index')}}" aria-current="page">Permissions</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{route('role.index')}}">Roles</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{route('add-admin.index')}}">Users</a>
                    </li>
                  </ul>
                <div class="tab">
                    <div id="tab-1" class="tab-content">
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6 text-end">
                                <ul class="vendordash_invite">
                                    <li>
                                        <a class="cbtn" href="javascript:;"><img
                                                src="{{ asset('assets/images/filter.png') }}">Filters</a>
                                    </li>
                                    <li>
                                        <a class="cbtn" href="{{ route('permission.create') }}"><img
                                                src="{{ asset('assets/images/invite.png') }}">Add Permission</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <br>
                        <div class="outbox outbox2">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td>
                                                {{ $permission->name }}
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <ul class="dropbtn icons">
                                                        <li></li>
                                                        <li></li>
                                                        <li></li>
                                                    </ul>
                                                    <div id="myDropdown" class="dropdown-content">
                                                        <a href="{{ route('permission.edit', $permission->id) }}"><img
                                                                src="{{ asset('assets/images/edit.png') }}">Edit</a>
                                                        <a href="{{ route('permission.destroy', $permission->id) }}"><img
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
                                    <label class="showrow">
                                        Show rows
                                        <select>
                                            <option>5 items</option>
                                            <option>10 items</option>
                                            <option>20 items</option>
                                        </select>
                                    </label>
                                </div>
                                @include('layout.pagination', ['paginator' => $permissions])
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('layout.footer')
@endsection

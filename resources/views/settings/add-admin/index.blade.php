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
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <a class="nav-link" href="{{route('permission.index')}}">Permissions</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="{{route('role.index')}}">Roles</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="{{route('add-admin.index')}}"  aria-current="page">Users</a>
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
                                        <a class="cbtn" href="{{ route('add-admin.create') }}"><img
                                                src="{{ asset('assets/images/invite.png') }}">ADD TEAM</a>
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
                                        <th>Email</th>
                                        <th>Roles</th>
                                        <th class="text-end">
                                            <div class="mydropdown">
                                                Action
                                            </div>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @can('User access')
                                        @foreach ($admins as $admin)
                                            <tr>
                                                <!--begin::Last login=-->
                                                <td>
                                                    {{ $admin->name }}
                                                </td>
                                                <td>
                                                    {{ $admin->email }}
                                                </td>
                                                <td>
                                                    <ul class="d-flex flex-wrap gap-2">
                                                        @foreach ($admin->roles as $role)
                                                            <li class="list-unstyled">
                                                                <div class="badge bg-primary rounded-pill">
                                                                    {{ $role->name }}
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <ul class="dropbtn icons">
                                                            <li></li>
                                                            <li></li>
                                                            <li></li>
                                                        </ul>
                                                        <div id="myDropdown" class="dropdown-content">
                                                            <a href="javascript:;"><img src="{{ asset('assets/images/eye.png') }}">View</a>
                                                            @can('User edit')
                                                                <a href="{{ route('add-admin.edit', $admin->id) }}"><img
                                                                        src="{{ asset('assets/images/edit.png') }}">Edit</a>
                                                            @endcan
                                                            @can('User delete')
                                                                <a href="{{ route('add-admin.destroy', $admin->id) }}"><img
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
                                @include('layout.pagination', ['paginator' => $admins])
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('layout.footer')
@endsection

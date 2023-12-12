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
                    <li><a href="{{route('permission.index')}}">Permissions</a></li>
                    <li><a>Roles</a></li>
                    <li><a>Users</a></li>
                </ul> --}}
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <a class="nav-link" href="{{route('permission.index')}}" aria-current="page">Permissions</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="{{route('role.index')}}">Roles</a>
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
                                        <a class="cbtn" href="{{ route('role.create') }}"><img
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
                                        <th>Permission</th>
                                        <th class="text-end">
                                            <div class="mydropdown">
                                                Action
                                            </div>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <!--begin::Last login=-->
                                            <td>
                                                {{ $role->name }}
                                            </td>
                                            <td>
                                                <ul class="d-flex flex-wrap gap-2">
                                                    @foreach ($role->permissions as $permission)
                                                        <li class="list-unstyled">
                                                            <div class="badge bg-primary text-light">
                                                                {{ $permission->name }}
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
                                                        <a href="{{ route('role.edit', $role->id) }}"><img
                                                                src="{{ asset('assets/images/edit.png') }}">Edit</a>
                                                        <a href="{{ route('role.delete', $role->id) }}"><img
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
                                @include('layout.pagination', ['paginator' => $roles])
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('layout.footer')
@endsection

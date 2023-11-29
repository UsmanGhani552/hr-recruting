<?php
$title = 'Team Dashboard';
$keywords = '';
$desc = '';
$pageclass = 'mainteam';
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
                        <p>Dashboard / Permission</p>
                    </div>
                </div>

                <div class="col-md-6 text-end">

                </div>
            </div>
        </div>
    </section>

    <section class="venderdashboar">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="sik-dropdown" id="sik-select">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            ...
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li>
                                <span class="dropdown-item" data-value="active">
                                    <img class="" src="{{ asset('assets/images/bulk1.png') }}" alt="btc" />
                                    Active
                                </span>
                            </li>
                            <li>
                                <span class="dropdown-item" data-value="inactive">
                                    <img class="" src="{{ asset('assets/images/bulk1.png') }}" alt="btc" />
                                    Inactive
                                </span>
                            </li>
                            <li>
                                <span class="dropdown-item" data-value="client">
                                    <img class="" src="{{ asset('assets/images/bulk4.png') }}" alt="btc" />
                                    Assign Team
                                </span>
                            </li>
                            <li>
                                <span class="dropdown-item" data-value="job">
                                    <img class="" src="{{ asset('assets/images/bulk3.png') }}" alt="btc" />
                                    Assign Staff
                                </span>
                            </li>
                        </ul>
                    </div>
                    <button type="submit" class="cbtn">
                        Apply
                    </button>
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
            <br>
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="outbox outbox2">
                <table>
                    <thead>
                        <tr>
                            {{-- <th>
						<label for="orderid">
						<input type="checkbox" name="" id="orderid">
						ID
						</label>
						</th> --}}
                            <th>Name</th>
                            <th>Permission</th>
                            <th class="text-end">
                                <div class="mydropdown">
                                    {{-- <ul class="dropbtn icons">
									<li></li>
									<li></li>
									<li></li>
								</ul> --}}
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
                    <div class="col-md-6">
                        <ul class="pagination">
                            <li><a href="javascript:;"><i class="fa fa-angle-left"></i></a></li>
                            <li><a href="javascript:;">1</a></li>
                            <li><a href="javascript:;">2</a></li>
                            <li><a href="javascript:;">3</a></li>
                            <li><a href="javascript:;">4</a></li>
                            <li><a href="javascript:;"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </div>
                </div>

            </div>

        </div>
    </section>
    @include('layout.footer')
@endsection

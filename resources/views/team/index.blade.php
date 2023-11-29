<?php
$title = "Team Dashboard";
$keywords = "";
$desc = "";
$pageclass = "mainteam";
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
				<p>Dashboard / Teams</p>
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
								<img class="" src="{{asset('assets/images/bulk1.png')}}" alt="btc" />
								Active
							</span>
						</li>
						<li>
							<span class="dropdown-item" data-value="inactive">
								<img class="" src="{{asset('assets/images/bulk1.png')}}" alt="btc" />
								Inactive
							</span>
						</li>
						<li>
							<span class="dropdown-item" data-value="client">
								<img class="" src="{{asset('assets/images/bulk4.png')}}" alt="btc" />
								Assign Team
							</span>
						</li>
						<li>
							<span class="dropdown-item" data-value="job">
								<img class="" src="{{asset('assets/images/bulk3.png')}}" alt="btc" />
								Assign Staff
							</span>
						</li>
					</ul>
				</div>
				<button type="submit" class="cbtn" id="assign-btn">
					Apply
				</button>
			</div>
			<div class="col-md-6 text-end">
				<ul class="vendordash_invite">
					<li>
						<a class="cbtn" href="javascript:;"><img src="{{asset('assets/images/filter.png')}}">Filters</a>
					</li>
					<li>
						<a class="cbtn" href="{{route('team.create')}}"><img src="{{asset('assets/images/invite.png')}}">ADD TEAM</a>
					</li>
				</ul>
			</div>
		</div>
		<br>
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
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
						<th>Name</th>
						<th>Email</th>
						<th>Company Name</th>
						<th>Created at</th>
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
                    @foreach ($teams as $team)
					<tr>
						<td>
							<label for="">
							<input type="checkbox" name="" value="{{ $team->id }}"
                            class="team-checkbox">
							{{$team->id}}
							</label>
						</td>
						<td>{{$team->first_name}} {{$team->last_name}}</td>
						<td>{{$team->email}}</td>
						<td>{{$team->company_name}}</td>
						<td>{{$team->created_at}}</td>
						<td>{{$team->status}} </td>
						<td>
							<div class="dropdown">
								<ul class="dropbtn icons">
									<li></li>
									<li></li>
									<li></li>
								</ul>
								<div id="myDropdown" class="dropdown-content">
									<a href="javascript:;"><img src="{{asset('assets/images/eye.png')}}">View</a>
									<a href="{{route('team.edit',$team->id)}}"><img src="{{asset('assets/images/edit.png')}}">Edit</a>
									<a href="{{route('team.delete',$team->id)}}"><img src="{{asset('assets/images/delete.png')}}">Delete</a>
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
@push('scripts')
    <script>
        // $(function() {
        //     $('.toggle-class').change(function() {
        //         var status = $(this).prop('checked') == true ? 1 : 0;
        //         var folder_id = $(this).data('id');

        //         $.ajax({
        //             type: "GET",
        //             dataType: "json",
        //             url: 'folder/change-status/' + folder_id,
        //             data: {
        //                 'status': status,
        //                 'folder_id': folder_id
        //             },
        //             success: function(response) {
        //                 console.log(response)
        //             }
        //         });
        //     })
        // });
        $(document).ready(function() {

            $('.popup .overlay .close').on('click', function() {
                $('.vendor_pop').removeClass('openpop');
            });

            $('#assign-btn').on('click', function() {
                // Get the value of the hidden input field
                var selectedValue = $('#assignment_id').val();
                console.log(selectedValue);
                if (selectedValue == 'client') {
                    $('#vendor-popup').addClass('openpop');

                } else if (selectedValue == 'active') {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('input[name="_token"]').val()
                        }
                    });

                    let teams = [];
                    $('.team-checkbox:checked').each(function() {
                        teams.push($(this).val());
                    });

                    $.ajax({
                        method: 'POST',
                        url: '/team/active-status',
                        data: {
                            teams: teams,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            sessionStorage.setItem('success_message', response.message);
                            location.reload();
                        }
                    });

                } else if (selectedValue == 'inactive') {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('input[name="_token"]').val()
                        }
                    });
                    let teams = [];
                    $('.team-checkbox:checked').each(function() {
                        teams.push($(this).val());
                    });

                    $.ajax({
                        method: 'POST',
                        url: '/team/inactive-status',
                        data: {
                            teams: teams,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            sessionStorage.setItem('success_message', response.message);
                            location.reload();
                        }
                    });

                }
            });

            // Check if there's a success message in sessionStorage
            const successMessage = sessionStorage.getItem('success_message');

            // Display the success message if it exists
            if (successMessage) {
                // Set a delay of 500 milliseconds (adjust as needed)
                setTimeout(function() {
                    $('#sucess-asigment-msg').addClass('alert');
                    $('#sucess-asigment-msg').addClass('alert-success');
                    $('#sucess-asigment-msg').text(
                    successMessage); // Use successMessage instead of response.message
                }, 500);

                // Clear the message after displaying
                setTimeout(function() {
                    $('#sucess-asigment-msg').removeClass('alert');
                    $('#sucess-asigment-msg').removeClass('alert-success');
                    $('#sucess-asigment-msg').text('');
                    sessionStorage.removeItem('success_message');
                }, 5000); // Adjust the delay (in milliseconds) as needed
            }
        });
    </script>
@endpush



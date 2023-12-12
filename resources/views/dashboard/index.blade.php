<?php
$title = "Vander Dashboard";
$keywords = "";
$desc = "";
$pageclass = "vender_dashboar";
?>
@extends('layout.master')

@section('top_nav')
    @include('layout.header')
@endsection

@section('main_content')

<section class="banner vendashbnr">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="bnr_left">
				<p>Dashboard</p>
				<h3>Welcome Back, {{Auth::user()->name}}</h3>
				<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
				</div>
			</div>

			<div class="col-md-6 text-end">
				<p>Saturday, 1 July 2023</p>
			</div>
		</div>

		<ul class="row">
			<li class="col-md-3">
				<div class="box">
					<h3>
						<small>Total Vendors</small>
						250
					</h3>
				</div>
			</li>
			<li class="col-md-3">
				<div class="box">
					<h3>
						<small>Total Client</small>
						310
					</h3>
				</div>
			</li>
			<li class="col-md-3">
				<div class="box">
					<h3>
						<small>Total Staff</small>
						500
					</h3>
				</div>
			</li>
			<li class="col-md-3">
				<div class="box">
					<h3>
						<small>Total Jobs</small>
						650
					</h3>
				</div>
			</li>
		</ul>

	</div>
</section>

<section class="login_act">
	<div class="container">
		<div class="row">
			<div class="col-md-6 recenact">
				<div class="outbox">
					<h6>Recent Vendors Login Activity</h6>
				<table>
					<thead>
						<tr>
							<th>Name:</th>
							<th></th>
							<th>Time :</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Jane Cooper</td>
							<td></td>
							<td style="color: #94A3B8;">Saturday, 1 July 2023</td>
						</tr>
						<tr>
							<td>Wade Warren</td>
							<td></td>
							<td style="color: #94A3B8;">Saturday, 1 July 2023</td>
						</tr>
						<tr>
							<td>Esther Howard</td>
							<td></td>
							<td style="color: #94A3B8;">Saturday, 1 July 2023</td>
						</tr>
						<tr>
							<td>Cameron Williamson</td>
							<td></td>
							<td style="color: #94A3B8;">Saturday, 1 July 2023</td>
						</tr>
						<tr>
							<td>Cameron Williamson</td>
							<td></td>
							<td style="color: #94A3B8;">Saturday, 1 July 2023</td>
						</tr>
					</tbody>
				</table>
				</div>
			</div>


			<div class="col-md-6">
				<div class="outbox">
					<h6>Recent Submissions</h6>
				<table>
					<thead>
						<tr>
							<th>Client Name:</th>
							<th>Job Title:</th>
							<th>Candidate Name:</th>
							<th>Status :</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Jane Cooper</td>
							<td>Jane Cooper</td>
							<td>Jane Cooper</td>
							<td style="color: #FF9B25;">Inprocess</td>
						</tr>
						<tr>
							<td>Wade Warren</td>
							<td>Wade Warren</td>
							<td>Wade Warren</td>
							<td style="color: #24D164;">Approved</td>
						</tr>
						<tr>
							<td>Esther Howard</td>
							<td>Esther Howard</td>
							<td>Esther Howard</td>
							<td style="color: #ED4F75;">Decline</td>
						</tr>
						<tr>
							<td>Cameron Williamson</td>
							<td>Cameron Williamson</td>
							<td>Cameron Williamson</td>
							<td style="color: #94A3B8;">Pending</td>
						</tr>
						<tr>
							<td>Brooklyn Simmons</td>
							<td>Brooklyn Simmons</td>
							<td>Brooklyn Simmons</td>
							<td style="color: #24D164;">Approved</td>
						</tr>
					</tbody>
				</table>
				</div>
			</div>
		</div>

		<br>
		<div class="row">
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-7">
						<div class="outbox">
							<h6>Rate of Acceptance</h6>

							<div class="cell">
						    	<div id="chart3"></div>
						  	</div>

						</div>
					</div>
					<div class="col-md-5">
						<div class="outbox jobduration">
						<h6>Recent Submissions</h6>
						<table>
							<tbody>
								<tr>
									<td>Job Title</td>
									<td style="color: #94A3B8;">Durations</td>
								</tr>
								<tr>
									<td>Brooklyn Simmons</td>
									<td style="color: #94A3B8;">02</td>
								</tr>
								<tr>
									<td>Brooklyn Simmons</td>
									<td style="color: #94A3B8;">02</td>
								</tr>
								<tr>
									<td>Brooklyn Simmons</td>
									<td style="color: #94A3B8;">02</td>
								</tr>
							</tbody>
						</table>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="row">
					<div class="col-md-4">
						<div class="outbox">
							<h6>Gross Revenue</h6>
							<!-- <figure>
								<img src="../images/chart.png">
							</figure> -->
							<div class="chart-area"></div>
						</div>
					</div>

					<div class="col-md-5">
						<div class="outbox clientstat">
							<h6>Client Status</h6>
							<ul>
								<li>
									<span><img src="{{asset('assets/images/client_icon.png')}}"></span>
									<p>Active</p>
									<h4>152</h4>
								</li>
								<li>
									<span><img src="{{asset('assets/images/client_icon2.png')}}"></span>
									<p>Inactive</p>
									<h4>40</h4>
								</li>
								<li>
									<span><img src="{{asset('assets/images/client_icon3.png')}}"></span>
									<p>On Hold</p>
									<h4>25</h4>
								</li>
							</ul>

							<div class="clientbox">
								<h4>
									<small>On-time Activeation Rate</small>
									95%
								</h4>
								<img src="{{asset('assets/images/client_rates.png')}}">
							</div>

						</div>
					</div>

					<div class="col-md-3">
						<ul class="clientamout">
							<li>
								<span>
									<img src="{{asset('assets/images/shopping-cart-discount.png')}}">
								</span>
								<h4>
									<small>Total Amount</small>
									$1,234
								</h4>
							</li>
							<li>
								<span>
									<img src="{{asset('assets/images/currency-dollar.png')}}">
								</span>
								<h4>
									<small>Vendor Earning</small>
									$10,566
								</h4>
							</li>
							<li>
								<span>
									<img src="{{ asset('assets/images/coin.png') }}">
								</span>
								<h4>
									<small>Net Profit</small>
									$5,566
								</h4>
							</li>
						</ul>
					</div>

				</div>
			</div>


		</div>

	</div>
</section>

    @include('layout.footer')
@endsection

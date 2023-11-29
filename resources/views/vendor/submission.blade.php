
<?php
$title = "Demo Page";
$keywords = "";
$desc = "";
$pageclass = "demopg";
?>
@extends('layout.master')

@section('top_nav')
    @include('layout.header')
@endsection

@section('main_content')
<section class="banner">
	<form action="" method="POST">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="bnr_left">
				Dashboard / Submission
				</div>
			</div>

			<div class="col-md-6 text-end">

			</div>
		</div>
	</div>
</section>

<section class="csection submison_cont">
	<div class="container">
		<div class="submision_stat">
			<div class="row">
				<div class="col-md-6">
					<h6>Submissions</h6>
				</div>

				<div class="col-md-6 text-end">
					<label>
						Status
						<select class="form-select" aria-label="Default select example">
							<option selected>Active</option>
							<option value="1">Pending</option>
							<option value="2">Inprocess</option>
							<option value="3">Decline</option>
						</select>
					</label>
				</div>
			</div>
		</div>
		<br><br>
		<h6>Jobs</h6>
		<div class="outbox">
			<table>
				<tbody>
					<tr>
						<td style="border-top: 0; border-left: 0;">
							<h5>Job Title:</h5>
							Designer
						</td>
						<td style="border-top: 0;">
							<h5>Client name:</h5>
							Jonathan Tan
						</td>
						<td style="border-top: 0;">
							<h5>Department:</h5>
							Production
						</td>
						<td style="border-top: 0;">
							<h5>Internal Job Code:</h5>
							ADV-56356
						</td>
						<td style="border-top: 0; border-right: 0;">
							<h5>Employment type:</h5>
							Full Time
						</td>
					</tr>
					<tr>
						<td style="border-bottom: 0; border-left: 0;">
							<h5>Salary Range:</h5>
							7000K - 8000K
						</td>
						<td style="border-bottom: 0;">
							<h5>Currency:</h5>
							Dollar $
						</td>
						<td style="border-bottom: 0;">
							<h5>Minimum experience:</h5>
							7 Years
						</td>
						<td style="border-bottom: 0;">
							<h5>Status:</h5>
							Open
						</td>
						<td style="border-bottom: 0; border-right: 0;">
							<a href="../jobs/new-job.php">VIEW DETAILS</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<br>
		<br>
		<h6>Submited For (Client)</h6>
		<div class="outbox">
			<table>
				<tbody>
					<tr>
						<td style="border-top: 0; border-left: 0;">
							<h5>Job Title:</h5>
							Designer
						</td>
						<td style="border-top: 0;">
							<h5>Client name:</h5>
							Jonathan Tan
						</td>
						<td style="border-top: 0;">
							<h5>Department:</h5>
							Production
						</td>
						<td style="border-top: 0;">
							<h5>Internal Job Code:</h5>
							ADV-56356
						</td>
						<td style="border-top: 0; border-right: 0;">
							<h5>Employment type:</h5>
							Full Time
						</td>
					</tr>
					<tr>
						<td style="border-bottom: 0; border-left: 0;">
							<h5>Salary Range:</h5>
							7000K - 8000K
						</td>
						<td style="border-bottom: 0;">
							<h5>Currency:</h5>
							Dollar $
						</td>
						<td style="border-bottom: 0;">
							<h5>Minimum experience:</h5>
							7 Years
						</td>
						<td style="border-bottom: 0;">
							<h5>Status:</h5>
							Open
						</td>
						<td style="border-bottom: 0; border-right: 0;">
							<a href="../client/add-client.php">VIEW DETAILS</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<br>
		<br>
		<h6>Submitted by (Vendor)</h6>
		<div class="outbox">
			<table>
				<tbody>
					<tr>
						<td style="border-top: 0; border-left: 0;">
							<h5>Job Title:</h5>
							Designer
						</td>
						<td style="border-top: 0;">
							<h5>Client name:</h5>
							Jonathan Tan
						</td>
						<td style="border-top: 0;">
							<h5>Department:</h5>
							Production
						</td>
						<td style="border-top: 0;">
							<h5>Internal Job Code:</h5>
							ADV-56356
						</td>
						<td style="border-top: 0; border-right: 0;">
							<h5>Employment type:</h5>
							Full Time
						</td>
					</tr>
					<tr>
						<td style="border-bottom: 0; border-left: 0;">
							<h5>Salary Range:</h5>
							7000K - 8000K
						</td>
						<td style="border-bottom: 0;">
							<h5>Currency:</h5>
							Dollar $
						</td>
						<td style="border-bottom: 0;">
							<h5>Minimum experience:</h5>
							7 Years
						</td>
						<td style="border-bottom: 0;">
							<h5>Status:</h5>
							Open
						</td>
						<td style="border-bottom: 0; border-right: 0;">
							<a href="">VIEW DETAILS</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<br>
		<br>
		<h6>Candidate</h6>
		<div class="outbox">
			<table>
				<tbody>
					<tr>
						<td style="border-top: 0; border-left: 0;">
							<h5>Job Title:</h5>
							Designer
						</td>
						<td style="border-top: 0;">
							<h5>Client name:</h5>
							Jonathan Tan
						</td>
						<td style="border-top: 0;">
							<h5>Department:</h5>
							Production
						</td>
						<td style="border-top: 0;">
							<h5>Internal Job Code:</h5>
							ADV-56356
						</td>
						<td style="border-top: 0; border-right: 0;">
							<h5>Employment type:</h5>
							Full Time
						</td>
					</tr>
					<tr>
						<td style="border-bottom: 0; border-left: 0;">
							<h5>Salary Range:</h5>
							7000K - 8000K
						</td>
						<td style="border-bottom: 0;">
							<h5>Currency:</h5>
							Dollar $
						</td>
						<td style="border-bottom: 0;">
							<h5>Minimum experience:</h5>
							7 Years
						</td>
						<td style="border-bottom: 0;">
							<h5>Status:</h5>
							Open
						</td>
						<td style="border-bottom: 0; border-right: 0;">
							<a href="javascript:;">VIEW DETAILS</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<br><br>

		<h6>Assigned Candidates</h6>
		<div class="row">
			<div class="col-md-4">
				<div class="outbox">
						<select class="selectpicker" multiple aria-label="Default select example" data-live-search="true">
							<option value="1" selected="">Search</option>
							<option value="1">One</option>
							<option value="2">Two</option>
							<option value="3">Three</option>
							<option value="4">Four</option>
						</select>
						<div class="file-hidden-list"></div>
					</form>

					<!-- <div class="uploadoc">
						<button id="addFile" class="add-button">Upload Doc</button>
						<span><img src="../images/upload.png"></span>
					</div> -->

					<div class="uploadoc">
						<a href="javascript:;" id="addFile" class="add-button">Upload Doc</a>
						<span><img src="{{asset('assets/images/upload.png')}}"></span>
					</div>

				</div>
			</div>

			<div class="col-md-8">
				<div class="outbox">
					<div class="file-list">
					</div>
				</div>
			</div>

		</div>
		<br><br>
		<div class="row">
			<div class="col-md-10">
			</div>
			<div class="col-md-2 text-end">
				<input type="submit" name="" value="Save">
			</div>
		</div>

	</div>
</section>
    @include('layout.footer')
@endsection



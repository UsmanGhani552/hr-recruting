@extends('layout.master')

@section('top_nav')
    @include('layout.header')
@endsection

@section('main_content')
<div class="popup job_folder_pop">
	<div class="overlay">
		<a class="close" href="javascript:;">X</a>
		<h5>Folder Title</h5>
		<form>

		    <div class="tab">
		    	<div id="tab-21" class="tab-content2">		    		<div class="form-group">
		    			<input type="text" name="" class="form-controll" placeholder="Type folder name">
		    		</div>

		    		<input class="cbtn" type="submit" name="" value="Create">
		    	</div>
		    	<div id="tab-22" class="tab-content2">
		    		<div class="form-group">
		    			<input type="search" name="" class="form-controll" placeholder="Search by name or email...">
		    		</div>
		    		<ul>
		    			<li>Kylee Danford <i class="fa fa-check-circle-o"></i></li>
		    			<li>Kylee Danford <i class="fa fa-check-circle-o"></i></li>
		    			<li>Kylee Danford</li>
		    			<li>Kylee Danford <i class="fa fa-check-circle-o"></i></li>
		    			<li>Kylee Danford </li>
		    		</ul>
		    		<input class="cbtn" type="submit" name="" value="Assign">
		    	</div>
		    </div>
		</form>
	</div>
</div>
@include('layout.footer')
@endsection



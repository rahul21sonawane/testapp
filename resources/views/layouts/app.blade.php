<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Autozone') }}</title>
	
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
	<link rel="stylesheet" href=	"https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
	<link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
	<script src="{{ asset('js/jquery.validate.js') }}"></script>  
	<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script> 
</head>
<body>
@guest
@if (Route::has('login'))
@endif
@else	
<div class="container">
	<div class="row">
		<div class="note">
			<div class="col-3 logo">
				<img class="imglogo" src="{{ asset('images/image.png') }}" alt="Image not available">
			</div>
			<div class="col-md-8">
			   <h2 class="heading-new">AUTO ZONE</h2>
				<p class="subtitle">PLOT NO.604/1, NH- 07, BESIDE NEW CHURCHA POLICE STATION, SHIVPUR, DISTRICT - KORIYA, (C.G.) 497339 MOBILE NO- 9302050692 </p>
			</div>
			@if(Route::is('admin') )	
			<div class="col-md-1" style="float: right;">
				<a class="btn btn-danger btn-sm" href="{{ route('logout') }}"
				   onclick="event.preventDefault();
								 document.getElementById('logout-form').submit();">
					<span class="glyphicon glyphicon-log-out"></span> {{ __('Logout') }}
				</a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
					@csrf
				</form>	
			</div>
			@endif
		</div>
		@if(Route::current()->getName() != 'home')
			<nav aria-label="breadcrumb no-print">
				<ol class="breadcrumb mt-2 no-print">
					<li class="breadcrumb-item no-print"><a href="{{ route('admin') }}">Advisor</a></li>
					@php
						$link = url('/');
					@endphp
					@foreach(request()->segments() as $segment)
						@php
							$link .= "/" . request()->segment($loop->iteration);
						@endphp
						@if(rtrim(request()->route()->getPrefix(), '/') != $segment && ! preg_match('/[0-9]/', $segment))
							<li class="no-print breadcrumb-item {{ $loop->last ? 'active' : '' }}">
								@if($loop->last || $segment == 'edit' || $segment == 'view')
									{{ ($segment) }}
								@else
									<a class="no-print" href="{{ $link }}">{{ ($segment) }}</a>
								@endif
							</li>
						@endif
						<?php if($segment== 'edit' || $segment== 'view') { break;} ?>
							
					@endforeach
				</ol>
			</nav>
		@endif 
	</div>
</div>
@endguest
<div class="container">  
	@yield('content')
</div>
</body>
</html>

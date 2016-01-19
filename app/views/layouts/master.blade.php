<!DOCTYPE html>
<html lang="EN">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    	<!-- Add CSRF Token as a meta tag in your head -->
    	<meta name="csrf-token" content="{{{ csrf_token() }}}">
    	@yield('title')
        <link rel="shortcut icon" href="/img/parking.png">
    	{{-- Link tag for Bootstrap --}}
    	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    	@yield('top-script')
	</head>
	<body>
		@include('partials.navbar')

		@if (Session::has('successMessage'))
        	<div class="alert alert-success">{{{ Session::get('successMessage') }}}</div>
    	@endif

    	@if (Session::has('errorMessage'))
        	<div class="alert alert-danger">{{{ Session::get('errorMessage') }}}</div>
    	@endif

    	@yield('content')

    	@include('partials.footer')

    	{{-- Script tags for jQuery and Bootstrap --}}
    	<script src="/js/jquery.js"></script>
    	<script src="/js/bootstrap.min.js"></script>

		@yield('bottom-script')
	</body>
<html>
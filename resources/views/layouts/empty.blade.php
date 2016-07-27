<!doctype html>
<html lang="ru-RU">
	<head>
		<meta charset="utf-8" />
		<title>Администрирование - @yield('title')</title>
		<meta name="description" content="" />
		<meta name="Author" content="Nikolay Grinchar" />
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

		<!-- WEB FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext" rel="stylesheet" type="text/css" />

		<!-- CORE CSS -->
		<link href="{{ URL::asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
		
		<!-- THEME CSS -->
		<link href="{{ URL::asset('assets/css/essentials.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ URL::asset('assets/css/layout.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ URL::asset('assets/css/color_scheme/green.css') }}" rel="stylesheet" type="text/css" id="color_scheme" />


	</head>
	<!--
		.boxed = boxed version
	-->
	<body>

		<!-- WRAPPER -->
		<div id="wrapper" class="clearfix">

		




			<!-- 
				MIDDLE 
			-->
			<section class="margin-left-0" id="middle">
	
				<div id="content" style="padding-top:20px" class="col-md-12 col-sm-12">
					@include('flash::message')
					@include('errors.list')
					@yield('content')
				</div>
			</section>
			<!-- /MIDDLE -->

		</div>



	
		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = '{{ URL::asset('assets/plugins') }}/';</script>
		<script type="text/javascript" src="{{ URL::asset('assets/plugins/jquery/jquery-2.1.4.min.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('assets/js/app.js') }}"></script>
		<script type="text/javascript">
		    $.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
		    });
		</script>
		@yield('page_script')
	</body>
</html>
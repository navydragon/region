<!doctype html>
<html lang="ru-RU">
	<head>
		<meta charset="utf-8" />
		<title>Администрирование - @yield('title')</title>
		<meta name="description" content="" />
		<meta name="Author" content="Nikolay Grinchar" />

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
				ASIDE 
				Keep it outside of #wrapper (responsive purpose)
			-->
			<aside id="aside">
				<!--
					Always open:
					<li class="active alays-open">

					LABELS:
						<span class="label label-danger pull-right">1</span>
						<span class="label label-default pull-right">1</span>
						<span class="label label-warning pull-right">1</span>
						<span class="label label-success pull-right">1</span>
						<span class="label label-info pull-right">1</span>
				-->
				<nav id="sideNav"><!-- MAIN MENU -->
					<ul class="nav nav-list">
						<li class="active"><!-- dashboard -->
							<a class="dashboard" href="/admin">
								<i class="main-icon fa fa-dashboard"></i> <span>Администрирование</span>
							</a>
						</li>
						<li>
							<a href="/admin/commissions">
								<i class="main-icon fa fa-table"></i>
								<span class="label label-success pull-right">2</span> <span>Комиссии</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-menu-arrow pull-right"></i>
								<i class="main-icon fa fa-book"></i> <span>Мероприятия</span>
							</a>
							<ul><!-- submenus -->
								<li><a href="#">Задания</a></li>
								<li><a href="/admin/surveys">Анкеты</a></li>
								<li><a href="#">Тестирования</a></li>
							</ul>
						</li>
						
						
					</ul>

					<!-- SECOND MAIN LIST -->
					<h3>MORE</h3>
					<ul class="nav nav-list">
						<li>
							<a href="calendar.html">
								<i class="main-icon fa fa-calendar"></i>
								<span class="label label-warning pull-right">2</span> <span>Calendar</span>
							</a>
						</li>
						<li>
							<a href="../../HTML/start.html">
								<i class="main-icon fa fa-link"></i>
								<span class="label label-danger pull-right">PRO</span> <span>Frontend</span>
							</a>
						</li>
					</ul>

				</nav>

				<span id="asidebg"><!-- aside fixed background --></span>
			</aside>
			<!-- /ASIDE -->


			<!-- HEADER -->
			<header id="header">

				<!-- Mobile Button -->
				<button id="mobileMenuBtn"></button>

				<!-- Logo -->
				<span class="logo pull-left">
					<img src="{{ URL::asset('assets/images/rzd.png') }}" alt="admin panel"  />
				</span>

				<!--<form method="get" action="page-search.html" class="search pull-left hidden-xs">
					<input type="text" class="form-control" name="k" placeholder="Поиск..." />
				</form> -->

				<nav>

					<!-- OPTIONS LIST -->
					<ul class="nav pull-right">

						<!-- USER OPTIONS -->
						<li class="dropdown pull-left">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
								<img class="user-avatar" alt="" src="{{ URL::asset('assets/images/noavatar.jpg') }}" height="34" /> 
								<span class="user-name">
									<span class="hidden-xs">
										{{ Auth::user()->name }} <i class="fa fa-angle-down"></i>
									</span>
								</span>
							</a>
							<ul class="dropdown-menu hold-on-click">
								<li><!-- my calendar -->
									<a href="calendar.html"><i class="fa fa-calendar"></i> Calendar</a>
								</li>
								<li><!-- my inbox -->
									<a href="#"><i class="fa fa-envelope"></i> Inbox
										<span class="pull-right label label-default">0</span>
									</a>
								</li>
								<li><!-- settings -->
									<a href="page-user-profile.html"><i class="fa fa-cogs"></i> Settings</a>
								</li>

								<li class="divider"></li>

								<li><!-- lockscreen -->
									<a href="page-lock.html"><i class="fa fa-lock"></i> Lock Screen</a>
								</li>
								<li><!-- logout -->
									<a href="{{ url('/logout') }}"><i class="fa fa-power-off"></i> Log Out</a>
								</li>
							</ul>
						</li>
						<!-- /USER OPTIONS -->

					</ul>
					<!-- /OPTIONS LIST -->

				</nav>

			</header>
			<!-- /HEADER -->


			<!-- 
				MIDDLE 
			-->
			<section id="middle">
				<header id="page-header">
					<h1>@yield('title')</h1>
				</header>
				<div id="content" class="padding-20">
					@include('flash::message')
					@yield('content')

				</div>
				
			</section>
			<!-- /MIDDLE -->

		</div>



	
		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = '{{ URL::asset('assets/plugins') }}/';</script>
		<script type="text/javascript" src="{{ URL::asset('assets/plugins/jquery/jquery-2.1.4.min.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('assets/js/app.js') }}"></script>
		
		
	</body>
</html>
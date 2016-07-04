<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->


    <head>
        <meta charset="utf-8" />
        <title>Система проведения комиссий по проверке знаний требований охраны труда в ОАО "РЖД"</title>
        <meta name="keywords" content="HTML5,CSS3,Template" />
        <meta name="description" content="" />
        <meta name="Author" content="MIIT IEF" />

        <!-- mobile settings -->
        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

        <!-- WEB FONTS : use %7C instead of | (pipe) -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />

        <!-- CORE CSS -->
        <link href="{{ URL::asset('assets/front/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        
        <!-- THEME CSS -->
        <link href="{{ URL::asset('assets/front/css/essentials.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/front/css/layout.css') }}" rel="stylesheet" type="text/css" />

        <!-- PAGE LEVEL SCRIPTS -->
        <link href="{{ URL::asset('assets/front/css/header-1.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/front/css/color_scheme/blue.css') }}" rel="stylesheet" type="text/css" id="color_scheme" />
    </head>

    <!--
        AVAILABLE BODY CLASSES:
        
        smoothscroll            = create a browser smooth scroll
        enable-animation        = enable WOW animations

        bg-grey                 = grey background
        grain-grey              = grey grain background
        grain-blue              = blue grain background
        grain-green             = green grain background
        grain-blue              = blue grain background
        grain-orange            = orange grain background
        grain-yellow            = yellow grain background
        
        boxed                   = boxed layout
        pattern1 ... patern11   = pattern background
        menu-vertical-hide      = hidden, open on click
        
        BACKGROUND IMAGE [together with .boxed class]
        data-background="assets/images/boxed_background/1.jpg"
    -->
    <body class="smoothscroll enable-animation">

        <!-- SLIDE TOP -->
       
        <!-- /SLIDE TOP -->


        <!-- wrapper -->
        <div id="wrapper">

            <!-- 
                AVAILABLE HEADER CLASSES

                Default nav height: 96px
                .header-md      = 70px nav height
                .header-sm      = 60px nav height

                .noborder       = remove bottom border (only with transparent use)
                .transparent    = transparent header
                .translucent    = translucent header
                .sticky         = sticky header
                .static         = static header
                .dark           = dark header
                .bottom         = header on bottom
                
                shadow-before-1 = shadow 1 header top
                shadow-after-1  = shadow 1 header bottom
                shadow-before-2 = shadow 2 header top
                shadow-after-2  = shadow 2 header bottom
                shadow-before-3 = shadow 3 header top
                shadow-after-3  = shadow 3 header bottom

                .clearfix       = required for mobile menu, do not remove!

                Example Usage:  class="clearfix sticky header-sm transparent noborder"
            -->
            <div id="header" class="sticky clearfix header-sm">

                <!-- TOP NAV -->
                <header id="topNav">
                    <div class="container">

                        <!-- Mobile Menu Button -->
                        <button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Logo -->
                        <a class="logo pull-left" href="/">
                            <img src="{{ URL::asset('assets/images/rzd.png') }}" alt="" />
                        </a>

                        <!-- 
                            Top Nav 
                            
                            AVAILABLE CLASSES:
                            submenu-dark = dark sub menu
                        -->
                        @if (Auth::check())
                            <div class="navbar-collapse pull-left nav-main-collapse collapse">
                                <nav class="nav-main">
                                    <ul id="topMain" class="nav nav-pills nav-main nav-onepage">
                                        <li><!-- HOME -->
                                            <a href="/home">
                                                КОМИССИИ
                                            </a>
                                        </li>
                                        @if (Auth::user()->is_admin() == true)
                                            <li><!-- FEATURES -->
                                                <a href="/admin">
                                                    АДМИНИСТРИРОВАНИЕ
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        
                            <ul class="nav pull-right">

                        <!-- USER OPTIONS -->
                        <li class="dropdown pull-left">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="true">
                                <img class="user-avatar" alt="" src="http://region/assets/images/noavatar.jpg" height="34"> 
                                <span class="user-name">
                                    <span class="hidden-xs">
                                        {{Auth::user()->short_name()}} <i class="fa fa-angle-down"></i>
                                    </span>
                                </span>
                            </a>
                            <ul class="dropdown-menu hold-on-click">
                                <li><!-- my calendar -->
                                    <a href="#"><i class="fa fa-calendar"></i> Календарь</a>
                                </li>
                                <li><!-- settings -->
                                    <a href="/profile/edit"><i class="fa fa-cogs"></i> Профиль</a>
                                </li>

                                <li class="divider"></li>
                                <li><!-- logout -->
                                    <a href="http://region/logout"><i class="fa fa-power-off"></i> Выйти </a>
                                </li>
                            </ul>
                        </li>
                        <!-- /USER OPTIONS -->

                    </ul>
                        @endif
                    </div>
                </header>
                <!-- /Top Nav -->

            </div>

            <section class="page-header page-header-xs">
                <div class="container">
                 <h4 class="nomargin">  @yield('title') </h4>
                        @yield('breadcrumbs')
                </div>
            </section>
            <!-- /PAGE HEADER -->




            <!-- -->
            <section>
                    <div class="container">
                    @yield('content')
                    </div>
            </section>
            <!-- / -->




            <!-- FOOTER -->
            <footer id="footer">
                <div class="container">

                    <div class="row">
                        
                        <div class="col-md-6">
                            <h4>Техническая поддержка (МИИТ):</h4>
                            <!-- Small Description -->
                            <p>По всем техническим вопросам просьба обращаться:</p>
                            <h5>Кабинет "Программы электронного образования</h5>
                            <div class="col-md-6">
                            <h5>Гринчар Николай</h5>
                                <!-- Contact Address -->
                                <address>
                                    <ul class="list-unstyled">
                                        <li class="footer-sprite phone">
                                            Phone: +7(905)7192695
                                        </li>
                                        <li class="footer-sprite email">
                                            <a href="mailto:panova@miit.edu.mps">panova@miit.edu.mps</a>
                                        </li>
                                        <li class="footer-sprite email">
                                            <a href="mailto:ief07@bk.ru">ief07@bk.ru</a>
                                        </li>
                                    </ul>
                                </address>
                                <!-- /Contact Address -->
                            </div>

                            <div class="col-md-6">
                            <h5>Алешин Андрей</h5>
                                <!-- Contact Address -->
                                <address>
                                    <ul class="list-unstyled">
                                        <li class="footer-sprite phone">
                                            Phone: +7(919)7789920
                                        </li>
                                        <li class="footer-sprite email">
                                            <a href="mailto:panova@miit.edu.mps">panova@miit.edu.mps</a>
                                        </li>
                                        <li class="footer-sprite email">
                                            <a href="mailto:ief07@bk.ru">ief07@bk.ru</a>
                                        </li>
                                    </ul>
                                </address>
                                <!-- /Contact Address -->
                            </div>
                        </div>

                        <div class="col-md-6">
                            <h4>Организационная поддержка (ЦБТ):</h4>
                            <!-- Small Description -->
                            <p>По организационным вопросам просьба обращаться:</p>
                            <h5>Нормативный отдел ЦБТ</h5>
                            <div class="col-md-6">
                            <h5>Королева Елена Валентиновна, начальник отдела</h5>
                                <!-- Contact Address -->
                                <address>
                                    <ul class="list-unstyled">
                                        <li class="footer-sprite phone">
                                            Phone: +7(905)7192695
                                        </li>
                                        <li class="footer-sprite email">
                                            <a href="mailto:panova@miit.edu.mps">panova@miit.edu.mps</a>
                                        </li>
                                        <li class="footer-sprite email">
                                            <a href="mailto:ief07@bk.ru">ief07@bk.ru</a>
                                        </li>
                                    </ul>
                                </address>
                                <!-- /Contact Address -->
                            </div>

                            <div class="col-md-6">
                            <h5>Прохоров Виктор Сергеевич, главный специалист</h5>
                                <!-- Contact Address -->
                                <address>
                                    <ul class="list-unstyled">
                                        <li class="footer-sprite phone">
                                            Phone: +7(919)7789920
                                        </li>
                                        <li class="footer-sprite email">
                                            <a href="mailto:panova@miit.edu.mps">panova@miit.edu.mps</a>
                                        </li>
                                        <li class="footer-sprite email">
                                            <a href="mailto:ief07@bk.ru">ief07@bk.ru</a>
                                        </li>
                                    </ul>
                                </address>
                                <!-- /Contact Address -->
                            </div>
                        </div>


                    </div>

                </div>

                <div class="copyright">
                    <div class="container">
                        &copy;  ОАО "Российские железные дороги" Все права защищены.
                    </div>
                    <div class="container">
                        Разработчик: Московский Государственный Университет Путей Сообщения (МИИТ)
                    </div>
                </div>
            </footer>
            <!-- /FOOTER -->

        </div>
        <!-- /wrapper -->


        <!-- SCROLL TO TOP -->
        <a href="#" id="toTop"></a>


        <!-- PRELOADER -->
        <div id="preloader">
            <div class="inner">
                <span class="loader"></span>
            </div>
        </div><!-- /PRELOADER -->


        <!-- JAVASCRIPT FILES -->
        <script type="text/javascript">var plugin_path = '{{ URL::asset('assets/front/plugins') }}/';</script>
        <script type="text/javascript" src="{{ URL::asset('assets/front/plugins/jquery/jquery-2.1.4.min.js') }}"></script>

        <script type="text/javascript" src="{{ URL::asset('assets/front/js/scripts.js') }}"></script>
        
       
       
    </body>
</html>


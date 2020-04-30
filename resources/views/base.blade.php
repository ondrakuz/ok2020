<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="description" content="@yield('description')" />
        <title>@yield('title', env('APP_NAME'))</title>

        <!-- Custom fonts for this theme -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/theme.css') }}" rel="stylesheet" />
        
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/freelancer.js') }}"></script>
        <script src="{{ asset('js/jqBootstrapValidation.js') }}"></script>
        <script type="text/javascript" >
	    //<![CDATA[

            jQuery.htmlPrefilter = function( html ) {
            	return html;
            };
            	    	
    	//]]>
    	</script>
	</head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="{{ env('APP_URL') }}">{{ env('APP_NAME') }}</a><button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu <i class="fas fa-bars"></i></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                    @if (!empty($menus))
                    	@foreach ($menus->all() as $menu)
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ env('APP_URL') }}/menu/{{ $menu->url }}">{{ $menu->name }}</a></li>
                        @endforeach
                    @endif
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image--><img class="masthead-avatar mb-5" src="{{ env('APP_URL') }}/assets/img/avataaars.svg" alt="" /><!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">Ondřej Kužel</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">Webdeveloper - C/C++ Developer</p>
            </div>
        </header>
        <!-- Content Section -->
        <div class="container body">
            @if ($errors->any())
                <div class="alert alert-danger mb-4">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </div>
        <!-- Copyright Section-->
        <footer class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright © Ondřej Kužel 2020</small></div>
        </footer>
        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
        <div class="scroll-to-top d-lg-none position-fixed">
            <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
        </div>
        @stack('scripts')
    </body>
</html>

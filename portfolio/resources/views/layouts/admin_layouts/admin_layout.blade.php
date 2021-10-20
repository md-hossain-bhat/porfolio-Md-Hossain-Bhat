<!doctype html>
<html lang="en" class="color-sidebar sidebarcolor3">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!--favicon-->
	<link rel="icon" href="{{asset('backEnd/images/favicon-32x32.png')}}" type="image/png" />
	<!--plugins-->
	<link href="{{asset('backEnd/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
	<link href="{{asset('backEnd/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link href="{{asset('backEnd/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{asset('backEnd/css/pace.min.css')}}" rel="stylesheet" />
	<script src="{{asset('backEnd/js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{asset('backEnd/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="{{asset('backEnd/css/app.css')}}" rel="stylesheet">
	<link href="{{asset('backEnd/css/icons.css')}}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{asset('backEnd/css/dark-theme.css')}}" />
	<link rel="stylesheet" href="{{asset('backEnd/css/semi-dark.css')}}" />
	<link rel="stylesheet" href="{{asset('backEnd/css/header-colors.css')}}" />
	@yield("css_script")
	<title>{{ config('app.name') }} | @yield('title') </title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
        @include("layouts.admin_layouts.admin_sitebar")
		<!--end sidebar wrapper -->
		<!--start header -->
        @include("layouts.admin_layouts.admin_header")
		<!--end header -->
		<!--start page wrapper -->
		@yield('content')
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		@include("layouts.admin_layouts.admin_footer")
	</div>
	<!--end wrapper-->

	<!-- Bootstrap JS -->
	<script src="{{asset('backEnd/js/bootstrap.bundle.min.js')}}"></script>
	<!--plugins-->
	<script src="{{asset('backEnd/js/jquery.min.js')}}"></script>
	<script src="{{asset('backEnd/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{asset('backEnd/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{asset('backEnd/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<!--app JS-->
	<script src="{{asset('backEnd/js/app.js')}}"></script>
	<script src="{{asset('backEnd/js/custom_js.js')}}"></script>
	@yield("js_script")
</body>
</html>
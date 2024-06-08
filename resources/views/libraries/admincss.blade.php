<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}">
<!-- Font Awesome CSS -->
<link rel="stylesheet" href="{{ asset('admin/vendor/font-awesome/css/font-awesome.min.css') }}">
<!-- Custom Font Icons CSS -->
<link rel="stylesheet" href="{{ asset('admin/css/font.css') }}">
<!-- Google fonts - Muli -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
<!-- Theme stylesheet -->
<link rel="stylesheet" href="{{ asset('admin/css/style.default.css') }}" id="theme-stylesheet">
<!-- Custom stylesheet - for your changes -->
<link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
<!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('admin/img/favicon.ico') }}">
<!-- Tweaks for older IEs -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @stack('styles')

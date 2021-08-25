<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Welcome to Home</title>
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('asset/img/favicon.png') }}" />
        <link rel="stylesheet" href="{{ asset('asset/admin/css/layout.css') }}" />
        <link rel="stylesheet" href="{{ asset('asset/admin/css/bootstrap-select.css') }}" />
        <link rel="stylesheet" href="{{ asset('asset/admin/css/sidebar.css') }}" />
        <link rel="stylesheet" href="{{ asset('asset/admin/css/style.css') }}" />
        <link rel="stylesheet" href="{{ asset('asset/admin/css/responsive.css') }}" />
        <link rel="stylesheet" href="{{ asset('asset/admin/css/fontawesome.min.css') }}" />
        <link href="{{ asset('asset/admin/css/slim.min.css') }}" rel="stylesheet" type="text/css"/>
        @stack('stylesheet')
        <script src="{{ asset('asset/admin/js/slim.jquery.js') }}"></script>
    </head>
    <body>
        @include('admin.layout.header')
        @yield('appContent')
        @include('admin.layout.footer')                
    </body>
</html>
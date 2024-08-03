<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="icon" href="{{asset('asset/img/core-img/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('asset/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>
    @include('partial.client.navbar')
    @include('partial.client.header')
    @yield('content')
    @include('partial.client.footer')
    <script src="{{asset('asset/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <script src="{{asset('asset/js/bootstrap/popper.min.js')}}js/"></script>
    <script src="{{asset('asset/js/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{asset('asset/js/plugins/plugins.js')}}"></script>
    <script src="{{asset('asset/js/active.js')}}"></script>
</body>

</html>

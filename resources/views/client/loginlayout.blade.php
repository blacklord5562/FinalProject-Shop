<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="{{asset('style/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('style/all.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('style/brands.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('style/style.css')}}">
    <script src="{{asset('style/jquery.min.js')}}"></script>
    <script src="{{asset('style/bootstrap.bundle.min.js')}}"></script>
    <title>@yield('title')</title>
</head>
<body style="background-image: linear-gradient(45deg,black,turquoise); background-repeat: no-repeat; min-height: 100vh;">
<div class="container mt-5 border border-1 border-success rounded-5 my-2 shadow-lg">
    <div class="row">
        <div class="text-center p-5 border border-dark borderr my-4 text-dark fs-4 border-2 mx-auto">
            <i class="fa fa-user"></i>
        </div>
    </div>
    <div class="row">
        @yield('content')
    </div>
</div>
</body>
</html>

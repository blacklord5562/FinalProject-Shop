<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{asset('style/front/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('style/front/Jqery/jquery.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('style/front/swiper/swiper-bundle.min.css')}}">
    <link href="{{asset('style/front/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('style/front/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <link href="{{asset('style/front/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('style/front/style/brands.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('style/front/style/all.css')}}" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">فرنوشاپ</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @foreach($menu as $menuItem)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ $menuItem->url ? url($menuItem->url) : '#' }}">
                            {{ $menuItem->title }}
                        </a>
                    </li>
                @endforeach
                <li class="nav-item">
                    <a class="nav-link" href="{{ Auth::check() ? (Auth::user()->role === 'admin' ? route('admin.dashboard') : route('home')) : route('login') }}">
                        <i class="fa fa-user"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa fa-shopping-cart"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container my-5">
    <h1 class="text-center">محصولات</h1>

    <!-- Search Bar -->
    <form method="GET" action="{{ route('product.list') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="نام محصول را جستجو کنید ..." value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">جستحو</button>
        </div>
    </form>

    <!-- Product Grid -->
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <!-- Product Image -->
                    <a href="{{ url('/product/' . $product->id) }}">
                        <img src="{{ asset('storage/product/' . $product->pic) }}" class="card-img-top" alt="{{ $product->title }}">
                    </a>
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $product->title }}</h5>
                        <p class="card-text text-success">${{ number_format($product->price) }}</p>
                        <a href="{{ url('/product/' . $product->id) }}" class="stretched-link"></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>

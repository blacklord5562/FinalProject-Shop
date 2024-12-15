<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{ asset('style/front/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('style/front/Jqery/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('style/front/swiper/swiper-bundle.min.css') }}">
    <link href="{{ asset('style/front/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('style/front/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <link href="{{ asset('style/front/product.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('style/front/style/brands.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('style/front/style/all.css') }}" rel="stylesheet" type="text/css">
    <title>Product Details</title>
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

<!-- Product Details Section -->
<div class="product-detail container my-5">
    <div class="row">
        <!-- Product Image -->
        <div class="col-md-6 product-image d-flex align-items-center justify-content-center">
            <!-- Use asset() to link to the image stored in the storage folder -->
            <img src="{{ asset('storage/product/' . $product->pic) }}" alt="{{ $product->title }}" class="img-fluid">
        </div>

        <!-- Product Information -->
        <div class="col-md-6 product-info text-center">
            <h1>{{ $product->title }}</h1>
            <p class="description">{{ $product->description }}</p>
            <p class="status">Status: <span>{{ $product->status ? 'Available' : 'Unavailable' }}</span></p>
            <p class="price">Price: ${{ number_format($product->price) }} <span class="discount">({{ $product->discount }}% off!)</span></p>
            <p class="category">Category: {{ $product->category->title ?? 'N/A' }}</p>

            <button class="btn btn-success add-to-basket">
                <i class="fas fa-shopping-basket"></i> Add to Basket
            </button>
            <!-- Product Features -->
            <div class="features mt-4">
                <h2>Product Features</h2>
                <ul>
                    @foreach($product->attributes as $attribute)
                        <li>{{ $attribute->title }}: {{ $attribute->pivot->value }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

</body>
</html>

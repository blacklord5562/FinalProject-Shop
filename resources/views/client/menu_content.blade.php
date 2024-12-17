<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('style/front/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <title>{{ $menu->title }}</title>
</head>
<body>
<!-- Navigation Menu -->
<div class="container-fluid bg1cls text-white py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-around">
                @foreach($menus as $menuItem)
                    @if($menuItem->title === 'محصولات')
                        <!-- Special route for 'محصولات' -->
                        <a href="{{ route('product.list') }}" class="text-white text-decoration-none">
                            {{ $menuItem->title }}
                        </a>
                    @elseif($menuItem->title === 'صفحه اصلی')
                        <!-- Special route for 'صفحه اصلی' -->
                        <a href="{{ route('test') }}" class="text-white text-decoration-none">
                            {{ $menuItem->title }}
                        </a>
                    @else
                        <!-- Default menu links -->
                        <a href="{{ route('menu.content', $menuItem->id) }}" class="text-white text-decoration-none">
                            {{ $menuItem->title }}
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>


<!-- Menu Title -->
<div class="container my-4 text-center">
    <h1>{{ $menu->title }}</h1>
</div>

<!-- Menu Content: Pages -->
<div class="container my-4">
    <div class="row">
        @forelse($pages as $page)
            <div class="col-md-6 mb-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="card-title">{{ $page->title }}</h3>
                        <p class="card-text">{{ $page->description }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p>محتوایی برای این منو موجود نیست.</p>
            </div>
        @endforelse
    </div>
</div>

<!-- Menu Pictures -->
<div class="container my-4">
    <h3 class="text-center mb-4">تصاویر</h3>
    <div class="row">
        @forelse($pictures as $picture)
            <div class="col-md-3 mb-4">
                <img src="{{ asset('storage/' . $picture->pic) }}" alt="{{ $picture->title }}" class="img-fluid rounded">
                <p class="text-center mt-2">{{ $picture->title }}</p>
            </div>
        @empty
            <div class="col-12 text-center">
                <p>عکسی برای این منو موجود نیست.</p>
            </div>
        @endforelse
    </div>
</div>

<script src="{{ asset('style/front/bootstrap/bootstrap.bundle.min.js') }}"></script>
</body>
</html>

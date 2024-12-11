@extends('client.master')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <!-- User Info Section -->
            <div class="col-md-12 mb-6">
                <div class="card">
                    <div class="card-header">
                        <h5>اطلاعات کاربر</h5>
                    </div>
                    <div class="card-body">
                        <!-- Profile Picture -->
                        <div class="d-flex align-items-center mb-3">
                            @if(auth()->user()->profile_picture)
                                <img
                                    src="{{ asset('storage/' . auth()->user()->profile_picture) }}"
                                    alt="User Profile Picture"
                                    class="img-fluid mx-4"
                                    width="100"
                                    height="100">
                            @else
                                <i class="fa fa-user"></i>
                            @endif
                            <div class="ml-3">
                                <h5>{{ Auth::user()->name }}</h5>
                                <p class="mb-0">{{ Auth::user()->email }}</p>
                                <p>عضو از: {{ Auth::user()->created_at->format('F Y') }}</p>
                                <p>شماره تلفن:{{Auth::user()->phone}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Shopping Status Section -->
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5>سبد خرید</h5>
                    </div>
                    <div class="card-body">
                        <!-- Current Shopping -->
                        <div class="mb-3">
                            <h6>خرید فعلی</h6>
                            <p>Status: <strong>در حال انجام</strong></p>
                            <p>Items in cart: <strong>3</strong></p>
                        </div>

                        <!-- Before Shopping -->
                        <div class="mb-3">
                            <h6>قبل از خرید</h6>
                            <p>Status: <strong>معلق</strong></p>
                            <p>Items to add: <strong>5</strong></p>
                        </div>

                        <!-- Wishlist -->
                        <div class="mb-3">
                            <h6>لیست علاقه‌مندی‌ها</h6>
                            <p>Items in wishlist: <strong>8</strong></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Orders Section -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5>سفارشات جاری</h5>
                    </div>
                    <div class="card-body">
                        <!-- Current Orders -->
                        <div class="mb-3">
                            <h6>سفارشات فعلی</h6>
                            <p>Status: <strong>در حال پردازش</strong></p>
                            <p>Items in cart: <strong>3</strong></p>
                        </div>

                        <!-- Before Orders -->
                        <div class="mb-3">
                            <h6>قبل از سفارش</h6>
                            <p>Status: <strong>معلق</strong></p>
                            <p>Items to add: <strong>5</strong></p>
                        </div>

                        <!-- Wishlist -->
                        <div class="mb-3">
                            <h6>لیست علاقه‌مندی‌ها</h6>
                            <p>Items in wishlist: <strong>8</strong></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Previous Orders Section -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5>سفارشات قبلی</h5>
                    </div>
                    <div class="card-body">
                        <!-- Previous Orders -->
                        <div class="mb-3">
                            <h6>سفارشات قبلی</h6>
                            <p>Status: <strong>تکمیل شده</strong></p>
                            <p>Items in cart: <strong>3</strong></p>
                        </div>

                        <!-- Wishlist -->
                        <div class="mb-3">
                            <h6>لیست علاقه‌مندی‌ها</h6>
                            <p>Items in wishlist: <strong>8</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="footer mt-4">
        <div class="container text-center">
            <p>© 2024 Your Company. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Support Button -->
    <button class="btn btn-support btn-primary position-fixed bottom-0 end-0 m-3 col-2" onclick="window.location.href='mailto:support@example.com';">
        <i class="fas fa-headset"></i> تماس با پشتیبانی
    </button>
@endsection

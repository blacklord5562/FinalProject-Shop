@extends('client.loginlayout')

@section('content')
    <div class="container-fluid d-flex align-items-center justify-content-center min-vh-100 p-0">
        <div class="row justify-content-center w-100">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-lg rounded-lg">
                    <div class="card-header text-center bg-primary text-white">
                        <h4>{{ __('ورود') }}</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Input -->
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('ایمیل:') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password Input -->
                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('رمزعبور:') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Remember Me Checkbox -->
                            <div class="mb-3 form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">{{ __('مرا به خاطر بسپار') }}</label>
                            </div>

                            <!-- Login Button -->
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ورود') }}
                                </button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('رمز عبور را فراموش کرده اید؟') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>

                    <!-- Create Account Button -->
                    <div class="card-footer text-center">
                        <a class="btn btn-secondary" href="{{ route('register') }}">
                            {{ __('اکانت ندارید؟ یکی بسازید!') }}
                        </a>
                    </div>
                    <div class="card-footer text-center">
                        <a class="btn btn-secondary" href="{{ url('/') }}">
                            {{ __('بازگشت به صفحه اصلی') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

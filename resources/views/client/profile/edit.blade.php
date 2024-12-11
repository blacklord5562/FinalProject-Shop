@extends('client.master')

@section('content')
    <div class="container">
        <h2>ویرایش پروفایل</h2>
        @if(session('success'))
            @if($user)
                <h1>ویرایش پروفایل: {{ $user->name }}</h1>
            @else
                <h1>کاربر یافت نشد</h1>
            @endif
        @endif

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}">
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $user->phone) }}">
            </div>

            <div class="form-group">
                <label for="birthday">Birthday</label>
                <input type="date" name="birthday" id="birthday" class="form-control" value="{{ old('birthday', $user->birthday) }}">
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="address" id="address" class="form-control">{{ old('address', $user->address) }}</textarea>
            </div>

            <div class="form-group">
                <label for="profile_picture">Profile Picture</label>
                <input type="file" name="profile_picture" id="profile_picture" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
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

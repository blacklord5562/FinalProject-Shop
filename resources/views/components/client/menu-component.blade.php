<nav class="nav">
    <div class="dropdown" >
        <button class="text-white dropdown-toggle btn" data-bs-toggle="dropdown" id="nid">
            منو
        </button>
        <ul class="dropdown-menu">
            <li class="nav-item">
                <a href="{{ route('profile.edit') }}" class="nav-link text-dark">ویرایش پروفایل </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/client') }}" class="nav-link text-dark">بازگشت به خانه</a>
            </li>
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <input type="submit" class="nav-link text-dark" value="خروج">
                </form>
            </li>

        </ul>

    </div>
</nav>

<nav class="nav">
    <div class="dropdown" >
        <button class="text-white dropdown-toggle btn" data-bs-toggle="dropdown" id="nid">
            منو
        </button>
        <ul class="dropdown-menu">
            <li class="nav-item">
                <a href="{{route('menu.create')}}" class="nav-link text-dark">ایجاد منو</a>
            </li>
            <li class="nav-item">
                <a href="{{route('menu.index')}}" class="nav-link text-dark">لیست منو ها</a>
            </li>
        </ul>
        <button class="text-white dropdown-toggle btn" data-bs-toggle="dropdown" id="nid">
            صفحه
        </button>
        <ul class="dropdown-menu">
            <li class="nav-item">
                <a href="{{route('page.create')}}" class="nav-link text-dark">ایجاد صفحه</a>
            </li>
            <li class="nav-item">
                <a href="{{route('page.index')}}" class="nav-link text-dark">لیست صفحه ها</a>
            </li>
        </ul>
        <button class="text-white dropdown-toggle btn" data-bs-toggle="dropdown" id="nid">
            عکس
        </button>
        <ul class="dropdown-menu">
            <li class="nav-item">
                <a href="{{route('picture.create')}}" class="nav-link text-dark">ایجاد عکس</a>
            </li>
            <li class="nav-item">
                <a href="{{route('picture.index')}}" class="nav-link text-dark">لیست عکس ها</a>
            </li>
        </ul>
        <button class="text-white dropdown-toggle btn" data-bs-toggle="dropdown" id="nid">
            گالری
        </button>
        <ul class="dropdown-menu">
            <li class="nav-item">
                <a href="{{route('admin.create.gallery')}}" class="nav-link text-dark">ایجاد گالری</a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.list.gallery')}}" class="nav-link text-dark">لیست گالری ها</a>
            </li>
            <li class="dropdown-divider"></li>
            <li class="nav-item">
                <a href="{{route('picturegal.create')}}" class="nav-link text-dark">ایجاد عکس گالری</a>
            </li>
            <li class="nav-item">
                <a href="{{route('picturegal.index')}}" class="nav-link text-dark">لیست عکس گالری</a>
            </li>
        </ul>
        <button class="text-white dropdown-toggle btn" data-bs-toggle="dropdown" id="nid">
            گروه کالاها
        </button>
        <ul class="dropdown-menu">
            <li class="nav-item">
                <a href="{{route('category.create')}}" class="nav-link text-dark">ایجاد گروه کالا</a>
            </li>
            <li class="nav-item">
                <a href="{{route('category.index')}}" class="nav-link text-dark">لیست گروه کالاها</a>
            </li>
            <li class="dropdown-divider"></li>
            <li class="nav-item">
                <a href="{{route('attribute.create')}}" class="nav-link text-dark">ایجاد صفت گروه کالا</a>
            </li>
            <li class="nav-item">
                <a href="{{route('attribute.index')}}" class="nav-link text-dark">لیست صفت گروه کالا</a>
            </li>
        </ul>
        <button class="text-white dropdown-toggle btn" data-bs-toggle="dropdown" id="nid">
            محصولات
        </button>
        <ul class="dropdown-menu">
            <li class="nav-item">
                <a href="{{route('product.creating')}}" class="nav-link text-dark">ایجاد کالا</a>
            </li>
            <li class="nav-item">
                <a href="{{route('product.index')}}" class="nav-link text-dark">لیست کالاها</a>
            </li>
        </ul>
    </div>
</nav>

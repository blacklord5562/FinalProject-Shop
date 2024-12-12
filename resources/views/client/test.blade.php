{{--<ul>--}}
{{--@foreach($menu as $m)--}}
{{--    <li>{{$m->title}}</li>--}}
{{--@endforeach--}}
{{--</ul>--}}
    <!DOCTYPE html>
<html lang="en">
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
<div class="burger text-white smalldis text-center" id="burgerid">
    <label class="fs-3 border-bottom">منو کاربری</label><br>
    <button class="burgerbtn">خانه</button>
    <button class="burgerbtn">فروشگاه</button>
    <button class="burgerbtn">سرویس ها</button>
    <button class="burgerbtn">درباره ما</button>
    <button class="burgerbtn">بلاگ</button>
    <button class="burgerbtn">ارتباط با ما</button>
</div>
<div class="container-fluid bg1cls text-white">
    <div class="container   p-3">
        <div class="row">
            <div class="col-md-2 col-1 ps-5 bigdis">
                <button class="btn">
                    <a class="fa fa-user text-white"
                       href="{{ Auth::check() ? (Auth::user()->role === 'admin' ? route('admin.dashboard') : route('home')) : route('login') }}">
                    </a>
                </button>
                <button class="btn">
                    <a class="fa fa-shopping-cart text-white " id="shoping" href=""></a>
                </button>
            </div>
            <div class="col-5 justify-content-end ps-2 smalldis">
                <button class="btn">
                    <a class="fa fa-user text-white "></a>
                </button>
                <button class="btn">
                    <a class="fa fa-shopping-cart text-white"></a>
                </button>
                <button class="btn">
                    <a class="fa fa-bars text-white texdec" onclick="openslide()"></a>
                </button>
            </div>

            <div class="col-md-5 col-1 d-flex justify-content-around">
                @foreach($menu as $menuItem)
                    <div class="diactiv bigdis">
                        {{ $menuItem->title }}<br>
                        <div class="underlinehovercls mt-2"></div>
                    </div>
                @endforeach
            </div>
            <div class="col-5 text-end fs-4">
                فرنوشاپ
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg1cls text-white">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-12 py-6">
                <h1 dir="rtl">استودیو طراحی داخلی مدرن</h1>
                <p dir="rtl">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
                <br>
                <a class="btn btn-warning me-3 px-4 rounded-4">خرید</a>
                <a class="btn btn-secondary px-4 rounded-4">کاوش</a>
            </div>
            <div class="col-md-7 col-12">
                <img src="{{asset('style/front/images/couch.png')}}" class="img-fluid">
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg2cls py-5">
    <div class="container">
        <div class="row" id="product-container">
            <div class="col-md-3 col-6">
                <h2 class="mb-4 section-title" dir="rtl">ساخته شده با بهترین متریال ها.</h2>
                <p class="fs-6" dir="rtl"> این یک نوشته آزمایشی است که به طراحان و برنامه نویسان کمک میکند تا این عزیزان با بهره گیری از این نوشته تستی و آزمایشی بتوانند نمونه تکمیل شده از پروژه و طرح خودشان را به کارفرما نمایش دهند، </p>
                <button class="btn btn-success rounded-pill fs-6">جست و جو</button>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg2cls py-5">
    <div class="row justify-content-center">
        <div class="col-12 p-0">
            <div class="swiper myswiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide d-flex">
                        <div class="col-6">
                            <div class="text-center">
                                <img src="{{asset('style/front/images/product-1.png')}}" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-6 justify-content-center align-items-center">
                            <div class="text-center bg1cls h-100 p-5 rounded-4">
                                <p class="fs-6 text-white" dir="rtl"> این یک نوشته آزمایشی است که به طراحان و برنامه نویسان کمک میکند تا این عزیزان با بهره گیری از این نوشته تستی و آزمایشی بتوانند نمونه تکمیل شده از پروژه و طرح خودشان را به کارفرما نمایش دهند، </p>
                                <p class="fs-6 text-white" dir="rtl"> این یک نوشته آزمایشی است که به طراحان و برنامه نویسان کمک میکند تا این عزیزان با بهره گیری از این نوشته تستی و آزمایشی بتوانند نمونه تکمیل شده از پروژه و طرح خودشان را به کارفرما نمایش دهند، </p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide d-flex">
                        <div class="col-6">
                            <div class="text-center">
                                <img src="{{asset('style/front/images/product-2.png')}}" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-6 justify-content-center align-items-center">
                            <div class="text-center bg1cls h-100 p-5 rounded-4">
                                <p class="fs-6 text-white" dir="rtl"> این یک نوشته آزمایشی است که به طراحان و برنامه نویسان کمک میکند تا این عزیزان با بهره گیری از این نوشته تستی و آزمایشی بتوانند نمونه تکمیل شده از پروژه و طرح خودشان را به کارفرما نمایش دهند، </p>
                                <p class="fs-6 text-white" dir="rtl"> این یک نوشته آزمایشی است که به طراحان و برنامه نویسان کمک میکند تا این عزیزان با بهره گیری از این نوشته تستی و آزمایشی بتوانند نمونه تکمیل شده از پروژه و طرح خودشان را به کارفرما نمایش دهند، </p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide d-flex">
                        <div class="col-6">
                            <div class="text-center">
                                <img src="{{asset('style/front/images/product-3.png')}}" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-6 justify-content-center align-items-center">
                            <div class="text-center bg1cls h-100 p-5 rounded-4">
                                <p class="fs-6 text-white" dir="rtl"> این یک نوشته آزمایشی است که به طراحان و برنامه نویسان کمک میکند تا این عزیزان با بهره گیری از این نوشته تستی و آزمایشی بتوانند نمونه تکمیل شده از پروژه و طرح خودشان را به کارفرما نمایش دهند، </p>
                                <p class="fs-6 text-white" dir="rtl"> این یک نوشته آزمایشی است که به طراحان و برنامه نویسان کمک میکند تا این عزیزان با بهره گیری از این نوشته تستی و آزمایشی بتوانند نمونه تکمیل شده از پروژه و طرح خودشان را به کارفرما نمایش دهند، </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination spagein"></div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid bg2cls py-5">
    <div class="container">
        <div class="row" id="product-container2">
            <div class="col-md-3 col-6">
                <h2 class="mb-4 section-title" dir="rtl">ساخته شده با بهترین متریال ها.</h2>
                <p class="fs-6" dir="rtl"> این یک نوشته آزمایشی است که به طراحان و برنامه نویسان کمک میکند تا این عزیزان با بهره گیری از این نوشته تستی و آزمایشی بتوانند نمونه تکمیل شده از پروژه و طرح خودشان را به کارفرما نمایش دهند، </p>
                <button class="btn btn-success rounded-pill fs-6">جست و جو</button>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-12 py-5">
            <a class="fa-solid fa-envelope text-secondary fs-5 texdec mb-5"> مشترک شدن در خبرنامه </a><br>
            <form class="d-flex justify-content-around">
                <input type="text" class="form-control" placeholder="نام خود را وارد کنید">
                <input type="email" class="form-control" placeholder="ایمیل خود را وارد کنید">
                <button class="fa fa-paper-plane btn btn-success"></button>
            </form>
        </div>
        <div class="col-md-4 offset-md-2 col-12 py-5 justify-content-center bigdis">
            <div class="topcls">
                <img src="{{asset('style/front/images/sofa.png')}}" alt="Image" class="img-fluid">
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-5 offset-md-2 col-4 offset-4 text-start fs-2">
            فرنوشاپ
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-12 py-5">
            <div class="d-flex justify-content-around">
                <div class="col-6">
                    <p class="fs-6" dir="rtl">پیر مردی هر روز تو محله می دید پسر کی با کفش های پاره و پای برهنه با توپ پلاستیکی فوتبال بازی می کند، روزی رفت ی کتانی نو خرید و اومد و به پسرک گفت بیا این کفشا رو بپوش…پسرک کفشا رو پوشید و خوشحال رو به پیر مرد کرد و گفت: شما خدایید؟! پیر مرد لبش را گزید و گفت نه! پسرک گفت پس دوست خدایی، چون من دیشب فقط به خدا گفتم كه کفش ندارم…</p>
                </div>
                <div class="col-3">
                    <ul>
                        <li class="py-2 textnone">درباره ما</li>
                        <li class="py-2 textnone">سرویس ها</li>
                        <li class="py-2 textnone">پشتیبانی</li>
                        <li class="py-2 textnone">ارتباط با ما</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-2 col-12">
            <div class="d-flex justify-content-around">
                <a class="btn btn-outline-success fab fa-facebook rounded-pill fs-3 mx-1"></a>
                <a class="btn btn-outline-success fab fa-twitter rounded-pill fs-3 mx-1"></a>
                <a class="btn btn-outline-success fab fa-instagram rounded-pill fs-3 mx-1"></a>
                <a class="btn btn-outline-success fab fa-linkedin rounded-pill fs-3 mx-1"></a>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="container py-5">
    <div class="row">
        <div class="col-md-6 col-12">
            Copyright ©2024. All Rights Reserved- Mohamadreza Nezhadhosein
        </div>
        <div class="col-md-2 offset-md-4 col-4 offset-8">
            <div class="justify-content-center">
                <a href="https://www.google.com" class="texdec">قوانین و مقررات</a>
            </div>
        </div>
    </div>
</div>
<script>
    let myswiper=new Swiper('.myswiper',{
        loop:true,
        pagination:{
            el:'.spagein'
        }
    });
    let products = [
        { id: 1, image: "style/front/images/product-1.png", price: 3780000, title: "صندلی مدرن" },
        { id: 2, image: "style/front/images/product-2.png", price: 5259000, title: "مبل راحتی" },
        { id: 3, image: "style/front/images/product-3.png", price: 2599000, title: "صندلی کلاسیک" },
        // Add more products as needed
    ];

    function addToBasket(productId) {

        //  productId = productId.toString();


        let basket = JSON.parse(sessionStorage.getItem('basket')) || {};

        console.log(basket);
        if (basket[productId]) {
            basket[productId]++;
        } else {
            basket[productId] = 1;
        }

        sessionStorage.setItem('basket', JSON.stringify(basket));

        updateBasketCount();
    }

    function updateBasketCount() {
        let basket = JSON.parse(sessionStorage.getItem('basket')) || {};
        let totalCount = Object.values(basket).reduce((acc, count) => acc + count, 0);
        document.getElementById('shoping').innerHTML = " " + totalCount;
    }

    function showBasket() {
        let basket = JSON.parse(sessionStorage.getItem('basket')) || {};
        let basketContent = "";
        let totalPrice = 0;

        //          console.log("Current basket:", basket);  // Debugging log
//return;
        for (let productId in basket) {
            let item = products.find(p => p.id == productId);
            console.log(item);
            if (item) {
                let itemTotalPrice = item.price * basket[productId];
                totalPrice += itemTotalPrice;
                basketContent +=item.title+''+Number(basket[productId] * item.price);

            } else {
                console.log(`Product not found for ID: ${productId}`);  // Debugging log
            }
        }

        basketContent = 'Total Price:'+totalPrice+'toman';

        alert(basketContent);
    }

    window.onload = function() {
        let productContainer = document.getElementById('product-container');
        let productContainer2 = document.getElementById('product-container2');
        products.forEach(product => {
            productContainer.innerHTML += `
            <div class="col-md-3 col-6 text-center">
                <div class="showcls rounded-2">
                    <img src="${product.image}" class="img-fluid"><br>
                    ${product.title}<br>${product.price}<br><br>
                    <div class="discls">
                        <a class="fa fa-cart-plus btn btn-outline-success rounded-pill" onclick="addToBasket(${product.id})"></a>
                    </div>
                </div>
            </div>
        `;
        })

        products.forEach(product => {
            productContainer2.innerHTML += `
            <div class="col-md-3 col-6 text-center">
                <div class="showcls rounded-2">
                    <img src="${product.image}" class="img-fluid"><br>
                    ${product.title}<br>${product.price}<br><br>
                    <div class="discls">
                        <a class="fa fa-cart-plus btn btn-outline-success rounded-pill" onclick="addToBasket(${product.id})"></a>
                    </div>
                </div>
            </div>
        `;
        })
    }
    document.getElementById('shoping').onclick = showBasket;
    updateBasketCount();

    function openslide(){
        document.getElementById("burgerid").style.display="block";
    }
    var modal = document.getElementById('burgerid');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

</script>
</body>
</html>

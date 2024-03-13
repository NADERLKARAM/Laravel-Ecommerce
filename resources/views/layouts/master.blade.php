<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>Fruitkha - Slider Version</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <!-- mean menu css -->
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.min.css') }}">
    <!-- main style -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <!-- responsive -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">




    <style>
        .subtitle {
            letter-spacing: 0px !important;
        }
        .active {
    font-weight: bold;
    /* Add more styling as needed */
}
    </style>

</head>

<body>

    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

    <!-- header -->
    <div class="top-header-area" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="/">
                                <img src="{{ asset('assets/img/logo.png') }}" alt="">
                            </a>
                        </div>
                        <!-- logo -->

                        <!-- menu start -->
                        <nav class="main-menu" dir="rtl">
                            <ul>
                                <li class="current-list-item"><a href="/">الرئيسية</a>
                                </li>
                               
                                <li><a href="/category">الأقسام</a></li>
                                @if(auth()->check() && auth()->user()->role == 'admin')
                                <li><a href="/products/productTable">جميع المنتجات</a></li>
                                <li><a href="/products/create">اضافة منتج</a></li>
                                <li><a href="/categories/create">اضافة قسم</a></li>
                                @endif
                                 <li><a href="/products">جميع المنتجات</a></li>
                                <li><a href="/review">اراء العملاء </a></li>



                                @guest
                                    @if (Route::has('login'))
                                        <li>
                                            <a href="{{ route('login') }}">تسجيل دخول</a>
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li>
                                            <a href="{{ route('register') }}"> مستخدم جديد</a>
                                        </li>
                                    @endif
                                @else
                                    <li>
                                        <a  href="#">
                                            {{ Auth::user()->name }}
                                        </a>
									</li>


                                    <li>
                                            <a  href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
														 document.getElementById('logout-form').submit();">
                                                 تسخيل الخروج
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                    </li>
                                @endguest



                                <li>
                                    <div class="header-icons">
                                        <a class="shopping-cart" href="/cart"><i
                                                class="fas fa-shopping-cart"></i></a>
                                        <a class="mobile-hide search-bar-icon" href="#"><i
                                                class="fas fa-search"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                        <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                        <div class="mobile-menu"></div>
                        <!-- menu end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->

    <!-- search area -->
    <div class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="close-btn"><i class="fas fa-window-close"></i></span>
                    <div class="search-bar">
                        <div class="search-bar-tablecell">
                            <h3 style="letter-spacing: 0px;">البحث فى جميع المنتجات الخاصة بنا</h3>
                            <form action="{{ route('products.index') }}" method="get">
                                @csrf
                                <input type="text" name="searchkey" placeholder="ابحث عن المنتجات">
                                <button type="submit">بحث <i class="fas fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end search area -->

    <!-- home page slider -->
    <div class="homepage-slider">
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle">متعة التسوق عبر فروعنا</p>
                                <h1>احدث صيحات الموضة والتسوق</h1>
                                <div class="hero-btns">
                                    <a href="" class="boxed-btn">سجل معنا</a>
                                    <a href="/contact" class="bordered-btn">تواصل معنا</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-center">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle">توصيل باقل الاسعار حتى باب المنزل</p>
                                <h1>100% مأكولات طبيعة</h1>
                                <div class="hero-btns">
                                    <a href="" class="boxed-btn">سجل معنا</a>
                                    <a href="/contact" class="bordered-btn">تواصل معنا</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-right">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle">عروض يومية على جميع المنتجات</p>
                                <h1>خصومات لا نهائية علي جميع المنتجات</h1>
                                <div class="hero-btns">
                                    <a href="" class="boxed-btn">سجل معنا</a>
                                    <a href="/contact" class="bordered-btn">تواصل معنا</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>














    @yield('content')














    <!-- footer -->
    <div class="footer-area">
        <div class="container" dir="rtl" style="text-align: right">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box about-widget">
                        <h2 class="widget-title">من نحن</h2>
                        <p>🌹❤ اللهم صل على سيدنا محمد وعلى اله وصحبه وسلم❤🌹

                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box get-in-touch">
                        <h2 class="widget-title">تواصل معنا</h2>
                        <ul>
                            <li> اسطانبول تركيا  </li>
                            <li>naedrkamal4@gmail.com</li>
                            <li>+905527090175</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box pages">
                        <h2 class="widget-title">الصفحات</h2>
                        <ul>
                            <li><a href="/">الرئيسية</a></li>
                            <li><a href="about.html">من نحن</a></li>
                            <li><a href="/products">المنتجات</a></li>
                            <li><a href="category">الاقسام</a></li>
                            <li><a href="contact.html">تواصل معنا</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box subscribe">
                        <h2 class="widget-title">النشرة البريدية
                        </h2>
                        <p>اشترك لتصلك كل التحديثات على بريديك الالكترونى
                        </p>
                        <form action="/subscribe">
                            <input type="email" placeholder="Email">
                            <button type="submit"><i class="fas fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end footer -->

    <!-- copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 ">
                    <p>حقوق الملكية محفوظة لدى موقع &copy; 2023 - <a>

                    </p>

                </div>
                <div class="col-lg-6 text-right col-md-12">
                    <div class="social-icons">
                        <ul>
                            <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end copyright -->

    <!-- jquery -->
    <script src="{{ asset('assets/js/jquery-1.11.3.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- count down -->
    <script src="{{ asset('assets/js/jquery.countdown.js') }}"></script>
    <!-- isotope -->
    <script src="{{ asset('assets/js/jquery.isotope-3.0.6.min.js') }}"></script>
    <!-- waypoints -->
    <script src="{{ asset('assets/js/waypoints.js') }}"></script>
    <!-- owl carousel -->
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <!-- magnific popup -->
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.meanmenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/sticker.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>

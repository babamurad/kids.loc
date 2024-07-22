<!DOCTYPE html>
<html>

<head>
    <title>@yield('title') - Körpe</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('js/fontawesome-free/css/all.css') }}">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" >

    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Grand+Hotel&family=Lora:wght@400;500;700&display=swap"
          rel="stylesheet">

    <script>
        document.addEventListener('livewire:navigated', () => {
            //isotope
            $('.isotope-container').isotope({
                // options
                itemSelector: '.item',
                layoutMode: 'masonry'
            });


            var $grid = $('.entry-container').isotope({
                itemSelector: '.entry-item',
                layoutMode: 'masonry'
            });


            // Initialize Isotope
            var $container = $('.isotope-container').isotope({
                // options
                itemSelector: '.item',
                layoutMode: 'masonry'
            });

            console.log('navigated');
        })
    </script>
</head>

<body>

@livewire('svg-component')

<header id="header">
    <nav class="header-top bg-dark py-1">
        <div class="container">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <ul class="info d-flex flex-wrap list-unstyled m-0">
                    <li class="location text-capitalize text-white d-flex align-items-center me-4">
                        <svg class="me-1" width="18" height="18">
                            <use xlink:href="#location"></use>
                        </svg>State Road 54 Trinity, Florida

                    </li>
                    <li class="phone text-capitalize text-white d-flex align-items-center me-4">
                        <svg class="me-1" width="18" height="18">
                            <use xlink:href="#phone"></use>
                        </svg>call: 666 333 9999
                    </li>

                </ul>
                <div class="social">
                        @auth
                            @livewire('user.logout-component')
                        @endauth
                        @guest
                        <ul class="info d-flex flex-wrap list-unstyled m-0">
                            <li class="social-icon text-white d-flex align-items-center me-3">
                                <a href="{{ route('login') }}" wire:navigate>Login</a>
                            </li>
                            <li class="social-icon text-white d-flex align-items-center me-3">
                                |
                            </li>
                            <li class="social-icon text-white d-flex align-items-center ">
                                <a href="{{ route('register') }}" wire:navigate>Register</a>
                            </li>
                        </ul>
                        @endguest


                </div>
            </div>
        </div>
    </nav>

    <nav id="primary-header" class="navbar navbar-expand-lg py-3">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/main-logo.png') }}" class="logo">
            </a>
            <button class="navbar-toggler border-0 d-flex d-lg-none order-3 p-2 shadow-none" type="button"
                    data-bs-toggle="offcanvas" data-bs-target="#bdNavbar" aria-controls="bdNavbar" aria-expanded="false">
                <svg class="navbar-icon" width="60" height="60">
                    <use xlink:href="#navbar-icon"></use>
                </svg>
            </button>
            <div class="header-bottom offcanvas offcanvas-end" id="bdNavbar" aria-labelledby="bdNavbarOffcanvasLabel">
                <div class="offcanvas-header px-4 pb-0">
                    <button type="button" class="btn-close btn-close-black" data-bs-dismiss="offcanvas" aria-label="Close"
                            data-bs-target="#bdNavbar"></button>
                </div>
                <div class="offcanvas-body align-items-center justify-content-end">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item px-3 py-2 py-lg-0">
                            <a class="nav-link p-0 {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}" wire:navigate>Baş sahypa</a>
                        </li>
                        <li class="nav-item px-3 py-2 py-lg-0">
                            <a class="nav-link p-0 {{ Route::currentRouteName() == 'teachers' ? 'active' : '' }}" href="{{ route('teachers') }}" wire:navigate>Mugallymlar</a>
                        </li>
                        <li class="nav-item px-3 py-2 py-lg-0">
                            <a class="nav-link p-0 " href="{{ route('articles') }}" wire:navigate>Goşmaça</a>
                        </li>
                        <li class="nav-item px-3 py-2 py-lg-0">
                            <a class="nav-link p-0 " href="#">Jadyly sandyk</a>
                        </li>
                        <li class="nav-item px-3 py-2 py-lg-0">
                            <a class="nav-link p-0 {{ Route::currentRouteName() == 'about-us' ? 'active' : '' }}" href="{{ route('about-us') }}" wire:navigate>Biz barada</a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </nav>
</header>
<main>
    {{ $slot }}
</main>

<footer id="footer" class="bg-gray">

    <div class="container text-center pt-4">
        <div class="row">
            <div class="col-sm-6">
                <h2>Mekdebe çenli bilim we terbiýe</h2>
                <h5>Türkmenistanyň Bilim Ministrligi</h5>
            </div>
            <div class="col-sm-6">
                <a class="navbar-brand" href="#">
                    <h2>Ministrlik</h2>
                </a>
                <ul class="info list-unstyled mt-4">
                    <li class="location text-capitalize mb-2 d-flex justify-content-center align-items-center">
                        <svg class="text-primary me-1" width="18" height="18">
                            <use xlink:href="#location"></use>
                        </svg>744000, Aşgabat ş., Arçabil şaýoly, 104
                    </li>
                    <li class="email text-capitalize mb-2 d-flex justify-content-center align-items-center">
                        <svg class="text-primary me-1" width="18" height="18">
                            <use xlink:href="#email"></use>
                        </svg>info@education.gov.tm
                    </li>
                    <li class="phone text-capitalize mb-2 d-flex justify-content-center align-items-center">
                        <svg class="text-primary me-1" width="18" height="18">
                            <use xlink:href="#phone"></use>
                        </svg>+(99312) 44-86-93
                    </li>
                    <li class="clock text-capitalize mb-2 d-flex justify-content-center align-items-center">
                        <svg class="text-primary me-1" width="18" height="18">
                            <use xlink:href="#clock"></use>
                        </svg>8:00-18:00, Sat: Closed
                    </li>
                </ul>

            </div>
        </div>
    </div>
    <div class="bg-gray border-top">
        <div class="text-center py-4">
            <p class="mb-0">©2024 © Ähli hukuklar goralan
                <a href="https://www.education.gov.tm/" target="_blank" class="text-decoration-underline fw-semibold"> Türkmenistanyň Bilim Ministrlig</a>
            </p>
        </div>
    </div>
</footer>

<script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
{{--<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>--}}
<script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/plugins.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
<script src="{{ asset('js/iconify-icon.min.js') }}"></script>
</body>
@stack('close-btn')

</html>

<!DOCTYPE html>
<html>

<head>
    <title>Kindergarten - Daycare and Kindergarten Website Template</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Grand+Hotel&family=Lora:wght@400;500;700&display=swap"
          rel="stylesheet">
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
                    <ul class="info d-flex flex-wrap list-unstyled m-0">
                        <li class="social-icon text-white d-flex align-items-center me-3">
                            <a href="#"> <svg width="18" height="18">
                                    <use xlink:href="#facebook"></use>
                                </svg> </a>
                        </li>
                        <li class="social-icon text-white d-flex align-items-center me-3">
                            <a href="#"> <svg width="18" height="18">
                                    <use xlink:href="#instagram"></use>
                                </svg> </a>
                        </li>
                        <li class="social-icon text-white d-flex align-items-center ">
                            <a href="#"> <svg width="18" height="18">
                                    <use xlink:href="#twitter"></use>
                                </svg> </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <nav id="primary-header" class="navbar navbar-expand-lg py-3">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/main-logo.png') }}" class="logo img-fluid">
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
                            <a class="nav-link active p-0" aria-current="page" href="#">Baş sahypa</a>
                        </li>
                        <li class="nav-item px-3 py-2 py-lg-0">
                            <a class="nav-link p-0" href="#">Biz barada</a>
                        </li>
                        <li class="nav-item px-3 py-2 py-lg-0">
                            <a class="nav-link p-0" href="#">Mugallymlar</a>
                        </li>
                        <li class="nav-item px-3 py-2 py-lg-0">
                            <a class="nav-link p-0" href="#">Jadyly sandyk</a>
                        </li>
                        <li class="nav-item px-3 py-2 py-lg-0">
                            <a class="nav-link p-0" href="#">Goşmaça</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>

{{ $slot }}

<footer id="footer" class="bg-gray">
    <div class="container text-center padding-medium">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/main-logo.png') }}" class="logo img-fluid">
        </a>
        <ul class="info text-center list-unstyled mt-4">
            <li class="location text-capitalize mb-2 d-flex justify-content-center align-items-center">
                <svg class="text-primary me-1" width="18" height="18">
                    <use xlink:href="#location"></use>
                </svg>Dallas, Texas
            </li>
            <li class="email text-capitalize mb-2 d-flex justify-content-center align-items-center">
                <svg class="text-primary me-1" width="18" height="18">
                    <use xlink:href="#email"></use>
                </svg>youremail@gmail.com
            </li>
            <li class="phone text-capitalize mb-2 d-flex justify-content-center align-items-center">
                <svg class="text-primary me-1" width="18" height="18">
                    <use xlink:href="#phone"></use>
                </svg>888 333 9999
            </li>
            <li class="clock text-capitalize mb-2 d-flex justify-content-center align-items-center">
                <svg class="text-primary me-1" width="18" height="18">
                    <use xlink:href="#clock"></use>
                </svg>8:00-18:00, Sat: Closed
            </li>
        </ul>
        <div class="social-links mt-5">
            <ul class="d-flex justify-content-center list-unstyled gap-2 m-0">
                <li class="social">
                    <a href="#">
                        <iconify-icon class="social-icon" icon="ri:facebook-fill"></iconify-icon>
                    </a>
                </li>
                <li class="social">
                    <a href="#">
                        <iconify-icon class="social-icon" icon="ri:twitter-fill"></iconify-icon>
                    </a>
                </li>
                <li class="social">
                    <a href="#">
                        <iconify-icon class="social-icon" icon="ri:pinterest-fill"></iconify-icon>
                    </a>
                </li>
                <li class="social">
                    <a href="#">
                        <iconify-icon class="social-icon" icon="ri:instagram-fill"></iconify-icon>
                    </a>
                </li>
                <li class="social">
                    <a href="#">
                        <iconify-icon class="social-icon" icon="ri:youtube-fill"></iconify-icon>
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <div class="bg-gray border-top">
        <div class="text-center py-4">
            <p class="mb-0">©2024 Kindergarten. Free HTML Template by:
                <a href="#" target="_blank" class="text-decoration-underline fw-semibold"> TemplatesJungle</a>
            </p>
        </div>
    </div>
</footer>

<script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('js/plugins.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>

</html>
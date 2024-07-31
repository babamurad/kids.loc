<!DOCTYPE html>
<html lang="tk">

<head>
    <meta charset="utf-8" />
    <title>@yield('title') - Kids</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}">

    <!-- App css -->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/theme.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- jQuery  -->
    <script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}"></script>
    {{-- @stack('editor-css') --}}
    {{-- @livewireStyles   --}}
    {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}


</head>

<body>

<!-- Begin page -->
<div id="layout-wrapper">

    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

        <div data-simplebar class="h-100">

            <div class="navbar-brand-box">
                <a href="{{ route('teacher.dashboard') }}" class="logo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.25em" height="1em" viewBox="0 0 640 512"><path fill="#f1a017" d="M320 0a40 40 0 1 1 0 80a40 40 0 1 1 0-80m44.7 164.3l11.1 88.7c1.6 13.2-7.7 25.1-20.8 26.8s-25.1-7.7-26.8-20.8l-4.4-35h-7.6l-4.4 35c-1.6 13.2-13.6 22.5-26.8 20.8s-22.5-13.6-20.8-26.8l11.1-88.8l-19.8 16.8c-10.1 8.6-25.3 7.3-33.8-2.8s-7.3-25.3 2.8-33.8l27.9-23.6c18.9-16 42.9-24.8 67.6-24.8s48.7 8.8 67.6 24.7l27.9 23.6c10.1 8.6 11.4 23.7 2.8 33.8s-23.7 11.4-33.8 2.8l-19.8-16.7zM40 64c22.1 0 40 17.9 40 40v160.2c0 17 6.7 33.3 18.7 45.3l51.1 51.1c8.3 8.3 21.3 9.6 31 3.1c12.9-8.6 14.7-26.9 3.7-37.8l-15.2-15.2l-32-32c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l32 32l15.2 15.2l25.3 25.3c21 21 32.8 49.5 32.8 79.2V464c0 26.5-21.5 48-48 48h-66.7c-17 0-33.3-6.7-45.3-18.7l-99.8-99.9C10.1 375.4 0 351 0 325.5V104c0-22.1 17.9-40 40-40m560 0c22.1 0 40 17.9 40 40v221.5c0 25.5-10.1 49.9-28.1 67.9L512 493.3c-12 12-28.3 18.7-45.3 18.7H400c-26.5 0-48-21.5-48-48v-78.9c0-29.7 11.8-58.2 32.8-79.2l25.3-25.3l15.2-15.2l32-32c12.5-12.5 32.8-12.5 45.3 0s12.5 32.8 0 45.3l-32 32l-15.2 15.2c-11 11-9.2 29.2 3.7 37.8c9.7 6.5 22.7 5.2 31-3.1l51.1-51.1c12-12 18.7-28.3 18.7-45.3V104c0-22.1 17.9-40 40-40z"/></svg>{{--                    <img src="{{ asset('admin/assets/images/logo-dark.png') }}" />--}}
                    <span class="text-primary">Körpe</span>
                </a>
            </div>

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
{{--                    <li class="menu-title">Menu</li>--}}
                    <li>
                        <a href="{{ route('teacher.dashboard') }}" class="waves-effect" wire:navigate>
                            <i class="bx bx-home-circle"></i><span>Dolandyryş</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{  route('teacher.teacher-lessons', ['teacherId' => auth()->user()->teacher->id]) }}" class="waves-effect" wire:navigate>
                            <i class="bx bxs-notepad"></i><span>Sapaklar</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{  route('teacher.change.password') }}" class="waves-effect" wire:navigate>
                            <i class="bx bx-lock"></i><span>Paroly üýtgetmek</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
    <!-- Left Sidebar End -->

    <header id="page-topbar">
        <div class="navbar-header">

            <div class="d-flex align-items-left">
                <button type="button" class="btn btn-sm mr-2 d-lg-none px-3 font-size-16 header-item waves-effect"
                        id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>

                <div class="dropdown d-none d-sm-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="mdi mdi-plus"></i> Täze döret
                        <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                    </button>
                    <div class="dropdown-menu">

                        <!-- item-->
                        <a href="{{ route('teacher.teacher-lessons.create', ['teacherId' => auth()->user()->teacher->id]) }}" class="dropdown-item notify-item">
                            Sapak
                        </a>
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center">
                <div class="dropdown d-none d-sm-inline-block ml-2">
                    <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-search-dropdown" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                        <i class="mdi mdi-magnify"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                         aria-labelledby="page-header-search-dropdown">

                        <form class="p-3">
                            <div class="form-group m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ..."
                                           aria-label="Recipient's username">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><i
                                                class="mdi mdi-magnify"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="d-inline-block">
                    <a href="{{ route('home') }}" type="button" class="btn mt-3 header-item noti-icon waves-effect" target="_blank">
                        <i class="bx bx-globe text-primary"></i>
                    </a>
                </div>

                @livewire('user.profile')

            </div>
        </div>
    </header>

    <div class="main-content">

        <div class="page-content">
            {{ $slot }}

            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

    </div>

</div>
<!-- END layout-wrapper -->

<!-- Overlay-->
<div class="menu-overlay"></div>

<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                2024 © S.Seydi ad. TDMI
            </div>
            <div class="col-sm-6">
                <div class="text-sm-right d-none d-sm-block">
                    Design & Develop by Ruslan Donmezow
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('admin/assets/js/metismenu.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/waves.js') }}"></script>
<script src="{{ asset('admin/assets/js/simplebar.min.js') }}"></script>

<!-- Morris Js-->
<script src="{{ asset('admin/assets/plugins/morris-js/morris.min.js') }}"></script>
<!-- Raphael Js-->
<script src="{{ asset('admin/assets/plugins/raphael/raphael.min.js') }}"></script>

@stack('editor-js')
<!-- Morris Custom Js-->
<script src="{{ asset('admin/assets/pages/dashboard-demo.js') }}"></script>

<!-- App js -->
<script src="{{ asset('admin/assets/js/theme.js') }}"></script>

<!-- include summernote css/js -->
<link href="{{ asset('admin/assets/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet">
<script src="{{ asset('admin/assets/plugins/summernote/summernote-bs4.js') }}"></script>


</body>

</html>

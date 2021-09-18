<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>

    <title>SIM PKM UII</title>


    @include('layouts.style')
</head>

<body id="page-top">
    <nav class="navbar navbar-expand navbar-dark static-top shadow bg-white">
        <a class="navbar-brand mr-1" href="">
            <img src="{{ asset('storage/images/logo.png') }}" style="width: 150px; padding: 5px 5px; margin-right: 5px;"
                alt="">
        </a>
        {{-- <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars" style="color: #093697"></i>
        </button> --}}

        <!-- Navbar Search -->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        </form>

        <!-- Navbar -->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span style="color: #093697">
                        {{ Auth::user()->name }} <i class="fas fa-sign-out-alt"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </nav>

    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('layouts.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                {{-- @include('includes.navbar') --}}

                @yield('content')

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('includes.admin.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    {{-- <script>
        $(document).ready(function(){
        // halaman default
        $('#konten').load('home');

        // fungsi yang mengatur konten mana yang akan ditampilkan
        $('#menu a').click(function(){
        // mengambil data dari href
        var hal = $(this).attr('href');
        // konten akan diisi oleh menu yang dipilih sesuai dengan isi dari href yang dipilih
        $('#konten').load(hal+'.php');
        return false;
        });
        });
    </script> --}}
</body>

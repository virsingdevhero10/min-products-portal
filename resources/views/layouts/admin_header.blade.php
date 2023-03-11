<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('build/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('build/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">


  <!-- Vendor CSS Files -->
  <link href="{{asset('build/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('build/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('build/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('build/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('build/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('build/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('build/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('build/assets/css/style.css')}}" rel="stylesheet">
  <script type="text/javascript">
      var SITE_URL = '{{URL::to('/')}}'
  </script>

</head>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ route('admin.dashboard') }}" class="logo d-flex align-items-center">
        <img src="{{asset('build/assets/img/logo.png')}}" alt="">
        <span class="d-none d-lg-block"> 
            Mini Products Portal
        </span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li>

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="{{route('admin.profile.index')}}" data-bs-toggle="dropdown">
            <img src="{{asset('build/assets/img/profile_picture.png')}}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">
               @auth
                {{Auth::user()->name}}
               @endauth
            </span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              @auth
                <h6>{{Auth::user()->name}}</h6>
                <span>Super Admin</span>
              @endauth
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{route('admin.profile.index')}}">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="javasacript:void(0)" data-bs-toggle="modal" data-bs-target="#logoutModel">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul>
        </li>

      </ul>
    </nav>

  </header>

@include('layouts.admin_sidebar')
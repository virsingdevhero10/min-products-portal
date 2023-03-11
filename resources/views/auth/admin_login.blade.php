@extends('layouts.login_app')
@section('title', 'Admin Login')
@section('content')
<main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                </a>
              </div><!-- End Logo -->
              <div class="card mb-3">
                <div class="card-body">
                   <div class="mt-3">
                      @if (Session::has('danger'))
                      <div class="alert alert-danger" role="alert">
                          {{ Session::get('danger') }}
                      </div>
                      @endif
                      @if (Session::has('success'))
                      <div class="alert alert-success" role="alert">
                          {{ Session::get('success') }}
                      </div>
                      @endif
                  </div>
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Super Admin Login</h5>
                    <p class="text-center small">Enter your email & password to login</p>
                  </div>
                  <form action="{{route('admin.admin.admin_login')}}" id="admin_login_form" method="post" class="row g-3">
                    @csrf
                    <div class="form-group mb-50">
                        <label class="text-bold-600" for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" tabindex="1" placeholder="Email address"></div>
                    <div class="form-group">
                        <label class="text-bold-600" for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password"  placeholder="Password">
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      </div>
  </main><!-- End #main -->
@endsection

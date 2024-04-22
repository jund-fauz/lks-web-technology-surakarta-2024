@extends('partials.raw')

@section('title', 'User Login Page')

@section('head')
<link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
<style>
  #remembermelabel {
    margin-left: 0;
  }
</style>
@endsection

@section('template-content')
<div class="container-fluid page-body-wrapper full-page-wrapper">
  <div class="content-wrapper d-flex align-items-center auth px-0">
    <div class="row w-100 mx-0">
      <div class="col-lg-4 mx-auto">
        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
          <h4>Selamat Datang di Website Pendaftaran Ormas Solo</h4>
          <h6 class="font-weight-light">Silahkan masuk untuk melanjutkan</h6>
          <form class="pt-3" action="login" method="POST">
            @csrf
            <div class="form-group">
              <input class="form-control form-control-lg" id="username" placeholder="Username" name="username" value="{{ old('username') }}">
            </div>
            <div class="form-group">
              <input type="password" class="form-control form-control-lg" id="password" placeholder="Password" name="password">
            </div>
            <div class="mt-3">
              <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Masuk</button>
            </div>
            @if (Session::get('message'))
                <div class="mt-3">
                  <p style="color: red">{{ Session::get('message') }}</p>
                </div>
            @endif
            </div>
            <div class="text-center mt-4 font-weight-light">
              Don't have an account? <a href="register" class="text-primary">Create</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
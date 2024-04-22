@extends('partials.main')

@section('head')
    <style>
      .edit-container {
        height: 85dvh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
      }
    </style>
@endsection

@section('content')
    <div class="edit-container">
        <h1><i class="mdi mdi-account"></i> Ubah Info Akun</h1>
        <form class="pt-3" action="/user/edit" method="POST">
            @csrf
            <div class="form-group">
                <input required class="form-control form-control-lg" id="username" placeholder="Username" name="username"
                    value="{{ $user['username'] }}" style="width: 25vw">
            </div>
            <div class="form-group">
                <input required type="text" class="form-control form-control-lg" id="password" placeholder="Password"
                    name="password" value="{{ $user['password'] }}">
            </div>
            <div class="form-group">
                <input required type="text" class="form-control form-control-lg" id="nama_lengkap" placeholder="Nama Lengkap"
                    name="nama_lengkap" value="{{ $user['nama_lengkap'] }}">
            </div>
            <div class="form-group">
                <input required type="email" class="form-control form-control-lg" id="email" placeholder="Email" name="email"
                    value="{{ $user['email'] }}">
            </div>
            <div class="form-group">
                <input required type="text" class="form-control form-control-lg" id="no_hp" placeholder="Nomer HP"
                    name="no_hp" value="{{ $user['no_hp'] }}">
            </div>
            @if (Session::get('message'))
                <p class="mt-1 mb-1" style="color:red">{{ Session::get('message') }}</p>
            @endif
            <div class="mt-3">
                <button class="btn btn-rounded btn-success btn-lg font-weight-medium auth-form-btn">Ubah</button>
            </div>
        </form>
    </div>
@endsection

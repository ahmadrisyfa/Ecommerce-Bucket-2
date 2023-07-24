@extends('template.website.index')
@section('content_slider_website')
@section('content_website')
<div class="all-title-box">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <h2>Register</h2>
              <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                  <li class="breadcrumb-item active">Register</li>
              </ul>
          </div>
      </div>
  </div>
</div>
<div class="card">
  <div class="services-box-main">
      <div class="container">
          <div class="card">

          <div class="row py-5">
        <form method="post" role="form" action="{{url('register')}}" class="col-md-6 m-auto">
          @csrf
          <div class="mb-3">
            <label for="name">Nama:</label>
            <input type="text" class="form-control mt-1 @error('name')is-invalid @enderror" required id="name" name="name" placeholder="Silahkan Masukan Nama Anda">
            @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>  
            @enderror
          </div>  
          <div class="mb-3">
            <label for="email">Email:</label>
            <input type="email" class="form-control mt-1 @error('email')is-invalid @enderror" required id="email" name="email" placeholder="Silahkan Masukan Email Anda">
            @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>  
            @enderror
          </div>         
          <div class="mb-3">
            <label for="password">Password:</label>
            <input type="password" class="form-control mt-1 @error('password')is-invalid @enderror" required id="password" name="password" placeholder="Silahkan Masukan Password Anda">
            @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>  
            @enderror
          </div>           
          <div class="row">
            <div class="col mt-2">
              <button type="submit" class="btn btn-success px-3">Registrasi</button>
              <p class="mt-1">Sudah Punya Akun? <a href="{{url('login')}}">Login Sekarang</a></p>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
</div>
@endsection
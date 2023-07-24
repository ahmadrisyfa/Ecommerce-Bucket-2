@extends('template.website.index')
@section('content_website')

  <!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Login</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active">Login</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Services  -->
<div class="card">
    <div class="services-box-main">
        <div class="container">
            @if(session()->has('LoginError'))
            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                        {{ session('LoginError') }}
            </div>
          @endif 
          @if(session()->has('berhasil_registrasi'))
          <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
              <i class="bi bi-check-circle me-1"></i>
                      {{ session('berhasil_registrasi') }}
          </div>
          @endif 
            <div class="card">

            <div class="row py-5">
                <form class="col-md-6 m-auto" method="post" role="form" action="{{route('login')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="email">Email:</label>
                        <input type="email" autofocus class="form-control mt-1" required id="email" name="email" placeholder="Silahkan Masukan Email Anda">
                    </div>         
                    <div class="mb-3">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control mt-1" required id="password" name="password" placeholder="Silahkan Masukan Password Anda">
                    </div>           
                    <div class="row">
                        <div class="col mt-2">
                            <button type="submit" class="btn btn-success px-3">Login</button>
                            <p class="mt-1">Belum Registrasi? <a href="{{url('register')}}">Silahkan Registrasi</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        </div>
    </div>
</div>
   
@endsection
@extends('template.website.index')
@section('content_website')
@if(session()->has('berhasil'))
<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
    <i class="bi bi-check-circle me-1"></i>
            {{ session('berhasil') }}
</div>
@endif 
<div id="slides-shop" class="cover-slides">
    <ul class="slides-container">
        @foreach ($dataslider as $value)
        <li class="text-left">
            <img src="{{asset('storage/'.$value->gambar)}}" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20" style="font-size: 50px;text-transform:capitalize"><strong>{{$value->judul}}</strong></h1>
                        <p class="m-b-40">{{$value->deskripsi}}</p>
                    </div>
                </div>
            </div>
        </li>     
        @endforeach
      
    </ul>
    <div class="slides-navigation">
        <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
        <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
    </div>
</div>


<div class="products-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Products Category Paling Banyak Di Minati</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
                </div>
            </div>
        </div>          

        <div class="row special-list">           
            @foreach ($dataproductcategory as $index => $value)
            @php
                $backgroundColor = '';
                if ($index == 0) {
                    $backgroundColor = '#ff6666';
                } elseif ($index == 1) {
                    $backgroundColor = '#fcaeae';
                } 
            @endphp
            <div class="col-lg-4 col-md-4 special-grid top-featured" style="height:500px;overflow:hidden;">
                <div class="products-single fix" >
                    <div class="box-img-hover">
                        <div class="type-lb">
                            <p class="sale" style="background-color: greenyellow;color:black">Sale</p>
                        </div>
                        <img src="{{asset('storage/'.$value->gambar1)}}" style="width: 300px;height:400px;overflow:hidden" class="img-fluid" alt="Image">
                        <div class="mask-icon">                               
                            <a class="cart" href="{{url('product/'.$value->id.'/detail')}}"><i class="fas fa-eye mr-1"></i>Detail</a>
                        </div>
                    </div>
                    <div class="why-text" style="height: 150px">
                        <h3><a href="{{url('product/'.$value->id.'/detail')}}">{{$value->nama}}</a></h3>
                        <h5 style="color:gold"> @currency($value->harga)   </h5>
                        <p>{{ Str::limit(strip_tags($value->deskripsi), 80) }}</p>
                    </div>
                </div>
            </div>
            @endforeach
           
        </div>
    </div>
</div>

<div class="products-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Products Size Paling Banyak Di Minati</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
                </div>
            </div>
        </div>          

        <div class="row special-list">     
            <div class="col-lg-12">
            @foreach ($dataproductsize as $index => $value)
            @php
                $backgroundColor = '';
                if ($index == 0) {
                    $backgroundColor = '#ff6666';
                } elseif ($index == 1) {
                    $backgroundColor = '#fcaeae';
                } 
            @endphp
            <div class="col-lg-4 col-md-4 special-grid top-featured" style="height:500px;overflow:hidden;">
                <div class="products-single fix" >
                    <div class="box-img-hover">
                        <div class="type-lb">
                            <p class="sale" style="background-color: greenyellow;color:black">Sale</p>
                        </div>
                        <img src="{{asset('storage/'.$value->gambar1)}}" style="width: 300px;height:400px;overflow:hidden" class="img-fluid" alt="Image">
                        <div class="mask-icon">                               
                            <a class="cart" href="{{url('product/'.$value->id.'/detail')}}"><i class="fas fa-eye mr-1"></i>Detail</a>
                        </div>
                    </div>
                    <div class="why-text" style="height: 150px">
                        <h3><a href="{{url('product/'.$value->id.'/detail')}}">{{$value->nama}}</a></h3>
                        <h5 style="color:gold"> @currency($value->harga)   </h5>
                        <p>{{ Str::limit(strip_tags($value->deskripsi), 80) }}</p>
                    </div>
                </div>
            </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
 <!-- Start Categories  -->
 <div class="categories-shop" style="background-color: #747171">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Category Terbaru</h1>
                    <p style="color:black">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
                </div>
            </div>

            
            @foreach ($category as $value)
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"style="height:500px;overflow:hidden;" >
                <div class="shop-cat-box" style="border:1px solid white">
                    <img class="img-fluid"  src="{{asset('storage/'.$value->gambar)}}"style="width: 300px;height:400px;overflow:hidden"   alt="" />
                    <a class="btn hvr-hover" style="background-color:white;color:#747171" href="{{url('category/'.$value->id.'/detail')}}">{{$value->nama}}</a>
                </div>
                
            </div>      
            @endforeach

        </div>
    </div>
</div>
<div class="hubungi-kami" style="background-color: #FBFCFC;">
    <div class="container">
        <h1 class="text-center pb-4" style="padding-top: 100px;color:  #151E28;">Hubungi Kami</h1>
        @if ($contactWebsite = \App\Models\ContactWebsite::first())  
        @php
      $contactWebsite = \App\Models\ContactWebsite::first()->get();
    @endphp
     
    @foreach ($contactWebsite as $value)  
    <div class="row" style="padding-bottom: 100px;">
        <div class="col-md-4">
            <div class="card card-body contact-hubungi-kami" style="text-align: center">
                <i class="fas fa-map-marker-alt"style="margin-bottom:10px"></i>
                <h4 class="font-weight-bold">KANTOR KAMI</h4>
                <p style="text-transform:capitalize">{{$value->alamat}}</p>
                <p><a href="https://maps.app.goo.gl/8Yb7GbD8mDHbScFf9?g_st=iw" target="_blank" style="color:#ab6a3e;text-decoration: underline;font-weight: bold;">Lihat di
                    maps</a></p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-body contact-hubungi-kami" style="text-align: center">
                <i class="fas fa-phone-square" style="margin-bottom:10px"></i>
                <h4 class="font-weight-bold">HUBUNGI KAMI DI</h4>
                <b>
                    <p>{{$value->no_telp1}}</p>
                    @if ($value->no_telp2 == null)
                        
                    @else
                    <p>{{$value->no_telp2}}</p>

                    @endif
                </b>
                @if ($value->email == null)
                    
                @else
                <p style="color:#ab6a3e">{{$value->email}}</p>
                @endif
                <p><a href="https://instagram.com/tart_tuns?igshid=MzRlODBiNWFlZA==" style="color:#ab6a3e;text-decoration: underline;font-weight: bold;">Instagram</a>
                </p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-body contact-hubungi-kami" style="text-align: center">
                <i class="fas fa-envelope" style="margin-bottom: 10px"></i>
                <h4 class="font-weight-bold">CUSTOMER SERVICE</h4>
                <p>Butuh bantuan kami? <br> Kami dengan senang hati <br> membantu Anda.</p>

                <p><a href="https://wa.me/62895321217600" target="_blank" style="color:#ab6a3e;text-decoration: underline;font-weight: bold;">Chat via
                        Whatsapp</a></p>
            </div>
        </div>
    </div>
    @endforeach
    @else
        <div class="row" style="padding-bottom: 100px;">
            <div class="col-md-4">
                {{-- <div class="card card-body contact-hubungi-kami"  style="text-align: center;height:230px;overflow:hidden"> --}}
                <div class="card card-body contact-hubungi-kami"  style="text-align: center;">
                    <i class="fas fa-map-marker-alt"style="margin-bottom:10px"></i>
                    <h4 class="font-weight-bold">KANTOR KAMI</h4>
                    <p>Jl. Jakarta, <br> Jakarta, Indonesia</p>
                    <p><a href="https://maps.app.goo.gl/8Yb7GbD8mDHbScFf9?g_st=iw" target="_blank" style="color:#ab6a3e;text-decoration: underline;font-weight: bold;">Lihat di
                            maps</a></p>
                </div>
            </div>
            <div class="col-md-4">
                {{-- <div class="card card-body contact-hubungi-kami" style="text-align: center;height:230px;overflow:hidden"> --}}
                <div class="card card-body contact-hubungi-kami" style="text-align: center;">
                    <i class="fas fa-phone-square" style="margin-bottom:10px"></i>
                    <h4 class="font-weight-bold">HUBUNGI KAMI DI</h4>
                    <b>
                        <p>(+62) - 0895-3212-17600</p>
                    </b>
                    <p style="color:#ab6a3e">info@bucket2.com</p>
                    <p><a href="https://instagram.com/tart_tuns?igshid=MzRlODBiNWFlZA==" style="color:#ab6a3e;text-decoration: underline;font-weight: bold;">Instagram</a>
                    </p>

                </div>
            </div>
            <div class="col-md-4">
                {{-- <div class="card card-body contact-hubungi-kami" style="text-align: center;height:230px;overflow:hidden"> --}}
                <div class="card card-body contact-hubungi-kami" style="text-align: center;">
                    <i class="fas fa-envelope" style="margin-bottom: 10px"></i>
                    <h4 class="font-weight-bold">CUSTOMER SERVICE</h4>
                    <p>Butuh bantuan kami? <br> Kami dengan senang hati <br> membantu Anda.</p>
                    <p><a href="https://wa.me/62895321217600" target="_blank" style="color:#ab6a3e;text-decoration: underline;font-weight: bold;">Chat via
                            Whatsapp</a></p>
                </div>
            </div>
        </div>
    @endif
    </div>


</div>
@endsection
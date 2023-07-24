@extends('template.website.index')
@section('content_website')
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Detail Size</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active">Detail Size</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="products-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h2>Daftar Product Size</h2>
                </div>
            </div>
        </div>   
        <div class="row special-list">                   
            @foreach ($product as $value)                   
            <div class="col-lg-4 col-md-4 special-grid top-featured" style="height:500px;overflow:hidden;">
                <div class="products-single fix" >
                    <div class="box-img-hover">
                        <div class="type-lb">
                            <p class="sale" style="background-color: greenyellow;color:black">Sale</p>
                        </div>
                        <img src="{{asset('storage/'.$value->gambar1)}}" style="width: 300px" class="img-fluid" alt="Image">
                        <div class="mask-icon">                               
                            <a class="cart" href="{{url('product/'.$value->id.'/detail')}}"><i class="fas fa-eye mr-1"></i>Detail</a>
                        </div>
                    </div>
                    <div class="why-text" style="height: 150px">
                        <h3 class="text-center"><a href="{{url('product/'.$value->id.'/detail')}}">{{$value->nama}}</a></h3>
                        <h5> @currency($value->harga)   </h5>
                        <p> {{Illuminate\Support\Str::of($value->deskripsi)->words(10)}}</p>
                    </div>
                </div>
            </div>
            @endforeach
           
        </div>
    </div>
</div>
@endsection
@extends('template.website.index')
@section('content_website')
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Detail Product</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active">Detail Product</li>
                </ul>
            </div>
        </div>
    </div>
</div>
    
        <!-- Start Shop Detail  -->
        <div class="shop-detail-box-main">
            <div class="container">
                @if(session()->has('berhasil'))
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    <i class="bi bi-check-circle me-1"></i>
                            {{ session('berhasil') }}
                </div>
                @endif 
                <div class="row">
                    <div class="col-xl-5 col-lg-5 col-md-6">
                        <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active"> <img style="height: 500px;overflow:hidden;" class="d-block w-100" src="{{asset('storage/'.$data->gambar1)}}" alt="First slide"> </div>    
                                @if($data->gambar2)
                                <div class="carousel-item"> <img style="height: 500px;overflow:hidden;" class="d-block w-100" src="{{asset('storage/'.$data->gambar2)}}" alt="Second slide"> </div> 
                                @endif
                                @if($data->gambar3)
                                <div class="carousel-item"> <img style="height: 500px;overflow:hidden;" class="d-block w-100" src="{{asset('storage/'.$data->gambar3)}}" alt="Third slide"> </div> 
                                @endif
                                @if($data->gambar4)
                                <div class="carousel-item"> <img style="height: 500px;overflow:hidden;" class="d-block w-100" src="{{asset('storage/'.$data->gambar4)}}" alt="Third slide"> </div> 
                                @endif
                                @if($data->gambar5)
                                <div class="carousel-item"> <img style="height: 500px;overflow:hidden;" class="d-block w-100" src="{{asset('storage/'.$data->gambar5)}}" alt="Third slide"> </div> 
                                @endif
                            </div>
                            <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev"> 
                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                            <span class="sr-only">Previous</span> 
                        </a>
                            <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next"> 
                            <i class="fa fa-angle-right" aria-hidden="true"></i> 
                            <span class="sr-only">Next</span> 
                        </a>
                            <ol class="carousel-indicators" style="margin-top: 10px;background-color:white">
                                <li data-target="#carousel-example-1" data-slide-to="0" class="active">
                                    <img style="height: 150px;overflow:hidden" class="d-block w-100 img-fluid" src="{{asset('storage/'.$data->gambar1)}}" alt="" />
                                </li>
                                @if($data->gambar2)
                                <li data-target="#carousel-example-1" data-slide-to="1">
                                    <img style="height: 150px;overflow:hidden" class="d-block w-100 img-fluid" src="{{asset('storage/'.$data->gambar2)}}" alt="" />
                                </li>
                                @endif
                                @if($data->gambar3)
                                <li data-target="#carousel-example-1" data-slide-to="2">
                                    <img style="height: 150px;overflow:hidden" class="d-block w-100 img-fluid" src="{{asset('storage/'.$data->gambar3)}}" alt="" />
                                </li>
                                @endif
                                @if($data->gambar4)
                                <li data-target="#carousel-example-1" data-slide-to="3">
                                    <img style="height: 150px;overflow:hidden" class="d-block w-100 img-fluid" src="{{asset('storage/'.$data->gambar4)}}" alt="" />
                                </li>
                                @endif
                                @if($data->gambar5)
                                <li data-target="#carousel-example-1" data-slide-to="4">
                                    <img style="height: 150px;overflow:hidden" class="d-block w-100 img-fluid" src="{{asset('storage/'.$data->gambar5)}}" alt="" />
                                </li>   
                                @endif                             
                            </ol>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-6">
                        <div class="single-product-details">
                            <h2>{{$data->nama}}</h2>
                            <h5 style="color:gold"> @currency($data->harga)</h5>
                            <p>
                                    <h4>Category: {{$data->category->nama}}</h4>
                                    <h4>Size: {{$data->size->nama}}</h4>
                                    <h4>Deskripsi:</h4>
                                    <p>{!!$data->deskripsi!!}</p>
                                    <form action="{{url('cart')}}" method="post">
                                        @csrf
                                    <ul>                                        
                                        <li>
                                            <div class="form-group">
                                                <label class="control-label">Quantity:</label>
                                                <input class="form-control" value="1" min="1" max="21110" name="quantity" required type="number">
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-group">
                                                <label class="control-label">Kartu Ucapan:</label>
                                                <textarea class="form-control" name="kartu_ucapan" required type="text"></textarea>
                                            </div>
                                        </li>
                                        @if ($data->category->nama == 'Box Flower')
                                        <li>
                                            <div class="form-group">
                                                <label class="control-label">Warna:</label>
                                                <input class="form-control" name="warna" required type="text">
                                            </div>
                                        </li>                                            
                                        @endif
                                        @if ($data->category->nama == 'Buket Wisuda')
                                        <li>
                                            <div class="form-group">
                                                <label class="control-label">Warna:</label>
                                                <input class="form-control" name="warna" required type="text">
                                            </div>
                                        </li>    
                                        @endif
                                        @if ($data->category->nama == 'Buket Bunga')
                                        <li>
                                            <div class="form-group">
                                                <label class="control-label">Warna:</label>
                                                <input class="form-control" name="warna" required type="text">
                                            </div>
                                        </li>    
                                        @endif
                                    </ul>
                                    <input type="hidden" name="product_id" value="{{$data->id}}">
                                    <input type="hidden" name="total" value="{{$data->harga}}">

                                    <div class="add-to-btn">
                                        <div class="add-comp">
                                            <button class="btn hvr-hover" data-fancybox-close="" type="submit" style="color: white"><i class="fa fa-shopping-bag" style="margin-right: 3px"></i> Add To cart</button>
                                        </div>
                                    </div>
                                    </form>
                                       
                        </div>
                    </div>
                </div>
                 
    
            </div>
        </div>

        <div class="products-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="title-all text-center">
                            <h1>Products Yang Mungkin Anda Cari</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
                        </div>
                    </div>
                </div>          
        
                <div class="row special-list">                   
                    @foreach ($productRandom as $value)                   
                    <div class="col-lg-4 col-md-6 special-grid top-featured" style="height:500px;overflow:hidden;">
                        <div class="products-single fix" >
                            <div class="box-img-hover">
                                <div class="type-lb">
                                    <p class="sale" style="background-color: greenyellow;color:black">Sale</p>
                                </div>
                                <img src="{{asset('storage/'.$value->gambar1)}}" style="width: 300px;height:400px;overflow:hidden"  class="img-fluid" alt="Image">
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
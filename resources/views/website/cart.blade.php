@extends('template.website.index')
@section('content_website')
     <!-- Start All Title Box -->
     <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Cart</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            @if(session()->has('berhasil'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                        {{ session('berhasil') }}
            </div>
            @endif 
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table" style="border: 1px solid #D33B33">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Images</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $total = 0;
                                @endphp
                                @foreach ($data as $value)
                                    
                                <tr>
                                <td class="name-pr">
                                    <a href="{{url('product/'.$value->id.'/detail')}}">
                                        {{$value->product->nama}}
                                    </a>
                                    @if ($value->kartu_ucapan)                                        
                                        <p>*Kartu Ucapan: {{$value->kartu_ucapan}}</p>
                                    @endif
                                    @if ($value->warna)                                        
                                        <p>*Warna: {{$value->warna}}</p>
                                    @endif
                                </td>
                                    <td class="thumbnail-img">
                                        <a href="{{url('product/'.$value->id.'/detail')}}">
									        <img class="img-fluid" src="{{asset('storage/'.$value->product->gambar1)}}" alt="" />
								        </a>
                                    <td class="price-pr">
                                        <p>@currency($value->product->harga)</p>
                                    </td>
                                    <td class="quantity-box">{{$value->quantity}}</td>
                                    <td class="total-pr">
                                        <p>@currency($value->product->harga * $value->quantity)</p>
                                    </td>
                                    <td class="remove-pr">
                                        <form action="{{url('cart/'.$value->id.'/hapus')}}" method="get">
                                            @csrf
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini?');" ><i class="fa fa-trash" style="margin-right: 5px"></i>Hapus</button>   
                                        </form>
                                    </td>
                                </tr>   
                                @php
                                $harga = $value->total;
                                $jumlah = $value->quantity;
                                $subtotal = $harga * $jumlah;                                                                           
                                $total += $subtotal;
                                @endphp
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
           

            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Detail Order</h3>
                        <div class="d-flex">
                            <h4>Jumlah Order</h4>
                            <div class="ml-auto font-weight-bold">{{$hitungdata}}</div>
                        </div> 
                        <hr>                       
                        <div class="d-flex gr-total">
                            <h5>Grand Total</h5>
                            <div class="ml-auto h5"> @currency($total)</div>
                        </div>
                        <hr> </div>
                </div>
                @if ($data->isEmpty()) 
                <div class="col-12 d-flex shopping-box"><span href="{{url('checkout')}}" style="color: white" class="ml-auto btn hvr-hover">Silahkan Tambahkan Data Ke Keranjang</span> </div>
                @else
                <div class="col-12 d-flex shopping-box"><a href="{{url('checkout')}}" class="ml-auto btn hvr-hover">Checkout</a> </div>
                @endif
            </div>

        </div>
    </div>
@endsection
@extends('template.website.index')
@section('content_website')
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Checkout</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">           
            <div class="row">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>Informasi Pengiriman</h3>
                        </div>
                        <form action="{{url('checkout-data')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="username">Nama *</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="name" name="name" value="{{auth()->user()->name}}" required>
                                </div>
                            </div>                           
                            <div class="mb-3">
                                <label for="address">No Telepon *</label>
                                <input type="number" class="form-control" id="no_telepon" name="no_telepon" value="{{auth()->user()->no_telepon ?? ''}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="address2">Alamat *</label>
                                <textarea type="text" class="form-control" id="alamat" name="alamat"required>{{auth()->user()->alamat ?? ''}}</textarea>
                            </div>   
                            <div class="mb-3">
                                <label for="address2">Catatan *</label>
                                <textarea type="text" class="form-control" id="catatan" name="catatan" required></textarea>
                            </div>                                                    
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="row">                      
                        <div class="col-md-12 col-lg-12">
                            <div class="odr-box">
                                <div class="title-left">
                                    <h3>Shopping cart</h3>
                                </div>
                                <div class="rounded p-2 bg-light">
                                    @php
                                    $total = 0;
                                    @endphp
                                    @foreach ($data as $value)                
                                    @php
                                        $subtotal = $value->total * $value->quantity;
                                        $total += $subtotal;
                                        if ($value->quantity > 1) {
                                            $total -= 5000;
                                        }
                                    @endphp
                                    <div class="media mb-2 border-bottom">
                                        <div class="media-body"> <a href="{{url('product/'.$value->id.'/detail')}}">{{$value->product->nama}}</a>
                                            <div class="small text-muted">Price: @currency($value->product->harga) <span class="mx-2">|</span> Qty: {{$value->quantity}} <span class="mx-2">|</span> Subtotal: @currency($subtotal)</div>
                                        </div>
                                    </div>
                                    @endforeach    
                                    <input type="hidden" name="total" value="{{$total}}">
                                    <img class="img-preview mt-3 mb-3"style="width:200px">
                                          <div class="row">
                                                <label for="inputText" class="col-sm-6 col-form-labe">Foto Transaksi*</label>
                                                <div class="col-sm-12">
                                                  <input  required name="foto_transaksi[]" type="file" onchange="previewImage()" id="gambar" class="form-control">
                                                </div>
                                                  <span class="col-sm-12 mt-2"><p>Silahkan Kirim Jumlah Uang @currency($total) <br> Ke Rekening: <b style="color: rgba(7, 83, 116, 0.998)">0823-8067-332-1890 (Admin)</b> Untuk Melanjutkan Proses</p></span>
                                          </div>  
                                    @php
                                    $total += (count($data) > 1) ? 0 : 5000;
                                    @endphp                                
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="order-box">
                                <div class="title-left">
                                    <h3>Your order</h3>
                                </div>
                                <div class="d-flex">
                                    <div class="font-weight-bold">Product</div>
                                    <div class="ml-auto font-weight-bold">Total</div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>Sub Total</h4>
                                    <div class="ml-auto font-weight-bold"> @currency($subtotal) </div>
                                </div>
                                <div class="d-flex">
                                    <h4>Ongkir</h4>
                                    @if (count($data) > 1)
                                    <div class="ml-auto font-weight-bold"> Gratis</div>
                                    @else
                                    <div class="ml-auto font-weight-bold">Rp. 5.000 </div>
                                    @endif
                                </div>                                                               
                                <hr>
                                <div class="d-flex gr-total">
                                    <h5>Grand Total</h5>
                                    <div class="ml-auto h5"> @currency($total) </div>
                                </div>
                                <hr> </div>
                        </div>
                        @php
                  
                        $cekdatacart = \App\Models\Cart::where('user_id', auth()->user()->id)->get();
                        @endphp
                        @if ($cekdatacart->isEmpty()) 
                            <div class="col-12 d-flex shopping-box"> <span  style="color: white" class="ml-auto btn hvr-hover">SIlahkan Tambahkan Data Ke Keranjang</span> </div>
                        @else
                            <div class="col-12 d-flex shopping-box"> <button type="submit" style="color: white" class="ml-auto btn hvr-hover">Checkout</button> </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        function previewImage() {
        
        const gambar = document.querySelector('#gambar');
        const imgpreview = document.querySelector('.img-preview');
      
        imgpreview.style.display = 'block';
      
        const oFReader = new FileReader();
        oFReader.readAsDataURL(gambar.files[0]);
      
        oFReader.onload = function(oFREvent){
          imgpreview.src = oFREvent.target.result;
        }
      }
      </script>
@endsection
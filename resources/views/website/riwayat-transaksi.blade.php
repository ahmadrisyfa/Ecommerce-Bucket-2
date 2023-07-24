@extends('template.website.index')
@section('content_website')
     <!-- Start All Title Box -->
     <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Riwayat Transaksi</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">Riwayat Transaksi</li>
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
                                    <th>No</th>
                                    <th>Foto Transaksi</th>
                                    <th>Tanggal pesanan</th>
                                    <th>Proses</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>                               
                                @foreach ($data as $value)
                                    
                                <tr>
                                <td>{{$loop->iteration}}</td>                                
                                <td class="thumbnail-img">                                     
									<img class="img-fluid" src="{{asset('storage/'.$value->foto_transaksi)}}" alt="" />
                                </td>
                                <td class="quantity-box">{{$value->created_at}}</td>
                                <td class="total-pr">
                                @if ($value->proses == 1)
                                    <span class="btn btn-success">Sudah Di Konfirmasi</span>
                                @else
                                    <span class="btn btn-info">Belum Di Konfirmasi</span>
                                @endif    
                                </td>    
                                    <td class="remove-pr">
                                       <a href="{{url('riwayat-transaksi/'.$value->created_at)}}" class="btn btn-primary"><i class="fa fa-eye" style="margin-right:5px"></i>Detail</a>
                                    </td>
                                </tr>                                  
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                    
        </div>
    </div>
@endsection
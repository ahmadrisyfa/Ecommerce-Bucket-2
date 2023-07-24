@extends('template.website.index')
@section('content_website')
     <!-- Start All Title Box -->
     <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Detail Transaksi</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">Detail Transaksi</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="row">
        <div class="container">

        <!-- Inline text elements -->
        <div class="col">
          <div class="card mb-4 mt-2">
            <h5 class="card-header">Detail Transaksi</h5>
            <div class="card-body">
              <table class="table table-borderless">
                <tbody>               
                    @foreach ($data as $value)                    
                  <tr>
                    <td class="align-middle" style="color:black:font-weight:bold">Product</td>
                    <td class="py-3">
                      <p class="mb-0">: {{$value->product->nama}}</p>
                    </td>                
                  </tr>
                  <tr>
                    <td class="align-middle">Harga</td>
                    <td class="py-3">
                      <p class="mb-0">: {{$value->product->harga}}</p>
                    </td>
                  </tr>
                  <tr>
                    <td class="align-middle">Quantity</td>
                    <td class="py-3">
                      <p class="mb-0">: {{$value->quantity}}</p>
                    </td>
                  </tr>
                  @endforeach                  
                  <tr>
                    <td class="align-middle">Catatan</td>
                    <td class="py-3">
                      <p class="mb-0">: {{$value->catatan}}</p>
                    </td>
                  </tr>                  
                  @if ($value->kartu_ucapan)
                  <tr>
                    <td class="align-middle">Kartu Ucapan</td>
                    <td class="py-3">
                      <p class="mb-0">: {{$value->kartu_ucapan}}</p>
                    </td>
                  </tr>                  
                  @endif
                  @if ($value->warna)
                  <tr>
                    <td class="align-middle">Warna</td>
                    <td class="py-3">
                      <p class="mb-0">: {{$value->warna}}</p>
                    </td>
                  </tr>                  
                  @endif
                  <tr>
                    <td class="align-middle">Tanggal Di Pesan</td>
                    <td class="py-3">
                      <p class="mb-0">: {{$value->created_at}}</p>
                    </td>
                  </tr>                  
                  <tr>
                    <td class="align-middle">Foto Transaksi</td>
                    <td class="py-3">
                      <p class="mb-0">: <img src="{{asset('storage/'.$value->foto_transaksi)}}" width="200px" alt=""></p>
                    </td>
                  </tr>   
                  <tr>
                    <td class="align-middle">Proses</td>
                    <td class="py-3">
                    <p class="mb-0">: 
                        @if ($value->proses == 1)
                            <span class="btn btn-success">Sudah Di Konfirmasi</span>
                        @else
                        <span class="btn btn-success">Belum Di Konfirmasi</span>
                        @endif
                    </p>
                    </td>
                  </tr>
                </tbody>
                <tr>
                    <td class="align-middle">
                        <a href="{{url('riwayat-transaksi')}}" class="btn btn-primary">Kembali</a>
                    </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
    </div>
</div>

@endsection
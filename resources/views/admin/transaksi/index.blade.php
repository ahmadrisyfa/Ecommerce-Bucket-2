@extends('template.admin.index')
@section('content_admin')
<div class="row">
        <div class="card">
        <div class="col-sm-12">
            <div class="card-body">
              @if(session()->has('berhasil'))
              <div class="alert alert-success alert-dismissible" role="alert">
                {{session('berhasil')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            <p>Data Transaksi</p>     
            <form action="{{url('admin/transaksi/search')}}" method="post">
              @csrf
              <div class="col-md-3 col-sm-4 ">
                   Dari Tanggal <input id="fromDate" name="fromDate" value="{{ request('fromDate') }}"
                      class="date-picker form-control" type="date" required>
              </div>
              <div class="col-md-3 col-sm-4 ">
                  Sampai Tanggal
                  <input id="toDate" name="toDate" value="{{ request('toDate') }}" class="date-picker form-control"
                      type="date" required>
              </div>
              <div class="col-md-3" style="margin-top: 18px;">
      
                  <button class="btn btn-info" style="font-weight:bold" type="submit"><i class="fa fa-search"
                          style="margin-right:8px"></i>Cari</button>
                          <a href="{{url('admin/cetak/transaksi')}}" style="font-weight:bold" class="btn btn-primary"><i class="bi bi-printer-fill" style="margin-right:10px"></i>Cetak</a>
      
              </div>
          </form>
          <div class="table-responsive text-nowrap">
            <table class="table  table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Pembeli</th>
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
                  <td>{{$value->user->name}}</td>
                  <td><img src="{{asset('storage/'.$value->foto_transaksi)}}" alt="" width="40px"></td>
                  <td>{{$value->created_at}}</td>
                  <td>
                    @if ($value->proses == 1)
                      <span class="btn btn-success">Sudah Di Konfirmasi</span>
                    @else
                    <span class="btn btn-primary">Belum Di Konfirmasi</span>                      
                    @endif
                  </td>
                  <td>
                    <a href="{{url('admin/detail/'.$value->created_at.'/transaksi')}}" class="btn btn-sm btn-primary"><i class="bx bx-eye" style="margin-right: 5px"></i>Detail</a>                  
                    <a href="{{url('admin/konfirmasi-proses/'.$value->created_at.'/transaksi')}}" class="btn btn-sm btn-info"><i class="bx bx-pencil" style="margin-right: 5px"></i>Perbarui Proses</a>                  

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
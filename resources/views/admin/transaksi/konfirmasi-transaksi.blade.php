@extends('template.admin.index')
@section('content_admin')
<div class="row">
    <!-- Inline text elements -->
    <div class="col">
      <div class="card mb-4">
        <h5 class="card-header">Detail Transaksi</h5>
        <div class="card-body">
          <table class="table table-borderless">
            <tbody>               
                @foreach ($data as $value)                    
              <tr>
                <td class="align-middle">Product</td>
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
                <td class="align-middle">Nama Pembeli</td>
                <td class="py-3">
                  <p class="mb-0">: {{$value->user->name}}</p>
                </td>
              </tr>
              <tr>
                <td class="align-middle">Alamat</td>
                <td class="py-3">
                  <p class="mb-0">: {{$value->user->alamat}}</p>
                </td>
              </tr>
              <tr>
                <td class="align-middle">No Telepon:</td>
                <td class="py-3">
                  <p class="mb-0">: {{$value->user->no_telepon}}</p>
                </td>
              </tr>
              <tr>
                <td class="align-middle">Catatan:</td>
                <td class="py-3">
                  <p class="mb-0">: {{$value->catatan}}</p>
                </td>
              </tr>                  
              @if ($value->kartu_ucapan)
              <tr>
                <td class="align-middle">Kartu Ucapan:</td>
                <td class="py-3">
                  <p class="mb-0">: {{$value->kartu_ucapan}}</p>
                </td>
              </tr>                  
              @endif
              @if ($value->warna)
              <tr>
                <td class="align-middle">Warna:</td>
                <td class="py-3">
                  <p class="mb-0">: {{$value->warna}}</p>
                </td>
              </tr>                  
              @endif
              <tr>
                <td class="align-middle">Tanggal Di Pesan:</td>
                <td class="py-3">
                  <p class="mb-0">: {{$value->created_at}}</p>
                </td>
              </tr> 
              <tr>
                <td class="align-middle">Total Yang Harus Pembeli Transfer:</td>
                <td class="py-3">
                  <p class="mb-0">: @currency($value->total)</p>
                </td>
              </tr>  
              <tr>
                <td class="align-middle">Foto Transaksi:</td>
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
              <tr>

              <td class="align-middle">
                <form action="{{url('admin/konfirmasi-proses/'.$value->created_at.'/transaksi')}}" method="Post">
                    @csrf
                    @method('PUT')
                    <div class="col mb-3">
                    <label for="defaultSelect" class="form-label">Proses Transaksi</label>
                        <select  class="form-select" required name="proses">
                        <option value="" disabled selected style="text-align: center">-- Silahkan Pilih Proses Transaksi --</option>
                        <option value="0"  @if ($value->proses == 0) selected  @endif>Belum Di Konfirmasi</option>               
                        <option value="1"  @if ($value->proses == 1) selected  @endif>Sudah Di Konfirmasi</option>               
                        </select>
                    </div>
                    <td><button type="submit" class="btn btn-success">Submit</button></td>
                </form>
              </td>  
            </tr>

            </tbody>
            <tr>
                <td class="align-middle">
                    <a href="{{url('admin/transaksi')}}" class="btn btn-info">Kembali</a>
                </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
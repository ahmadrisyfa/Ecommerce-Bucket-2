@extends('template.admin.index')
@section('content_admin')
<div class="col-md-12 col-sm-12  ">
    <div class="x_panel">
        
       
        <div class="card">
            <h2 style="margin-top:10px;margin-left:10px">Form Cetak Transaksi</h2>        
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">               
                           <div class="card-body pt-4 pb-2">
                                <div class="col-sm-12">
                                    <a href="{{url('admin/transaksi/cetak-semua-data')}}" style="width:100%;color:black" class="btn btn-info" target="_blank"><i class="fa fa-print" style="margin-right:10px"></i>Cetak Semua Data</a>
                                </div>
                           </div>
                    </div>
                    <div class="row">
                        <div class="card-body pt-4 pb-2">
                            <div class="col-sm-12">
                                <form action="{{url('admin/transaksi/cetak-data-pertanggal')}}" method="post" target="_blank">
                                    @csrf
                                    <div style="margin-top:10px">
                                        Dari Tanggal <input id="fromDate" name="fromDate" value="{{ request('fromDate') }}"
                                            class="date-picker form-control" type="date" required>
                                    </div>
                                    <div >
                                        Sampai Tanggal
                                        <input id="toDate" name="toDate" value="{{ request('toDate') }}" class="date-picker form-control"
                                            type="date" required>
                                    </div>                       
                                    <button type="submit" style="color:black;width:100%" class="btn btn-primary mt-3" target="_blank"><i class="fa fa-print" style="margin-right:10px"></i>Cetak Data Per Tanggal</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-6 ml-2 mt-2">
                            <a href="{{url('admin/transaksi')}}" class="btn btn-info" style="color:white;margin-left:10px;margin-bottom:10px">Ke Detail Transaksi</a>
                        </div>
                    </div>
                        
                </div>         
            </div>
        </div>
        
    </div>
</div>
        
@endsection
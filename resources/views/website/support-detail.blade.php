@extends('template.website.index')
@section('content_website')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Support</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active">Support</li>
                </ul>
            </div>
        </div>
    </div>
  </div>

    <div class="container">
        <div class="row mb-2">
            <div class="col-lg-12">
                <div class="title-all text-center mt-2">
                    <h2>{{$data->judul}}</h2>
                </div>
                {!! $data->deskripsi !!}
            </div>
        </div>   
    </div>
@endsection
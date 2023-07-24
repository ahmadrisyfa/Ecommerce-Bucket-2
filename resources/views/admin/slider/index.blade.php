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
            <p class="">Silahkan Tambahkan Data Slider</p>      
            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#createslider"><i class="bx bx-plus-circle" style="margin-right: 5px"></i>Tambah Data</button>
          <div class="table-responsive text-nowrap">
            <table class="table  table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Deskripsi</th>
                  <th>Gambar</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $value)
                    
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$value->judul}}</td>
                  <td>{{$value->deskripsi}}</td>
                  <td><img src="{{asset('storage/'.$value->gambar)}}" alt="" width="40px"></td>
                  <td>
                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editslider{{$value->id}}"><i class="bx bx-pencil" style="margin-right: 5px"></i>Edit</button>                  
                    <a href="{{url('admin/slider/'.$value->id.'/hapus')}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini?');"  class="btn btn-sm" style="background-color: #f54a58;color:white"><i class="bx bx-trash" style="margin-right: 5px"></i>Hapus</a>

                  </td>
                </tr>  
                <div class="modal fade" id="editslider{{$value->id}}" tabindex="-1" aria-labelledby="editslider{{$value->id}}Label" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel3">Silahkan Edit Data Slider</h5>
                        <button type="button"class="btn-close"data-bs-dismiss="modal"aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="{{ url('admin/slider/'.$value->id.'/edit') }}" method="POST"  enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <div class="row">
                            <div class="col mb-3">
                              <label for="nameLarge" class="form-label">Judul</label>
                              <input type="text" id="nameLarge" class="form-control" name="judul" value="{{$value->judul}}" required placeholder="Enter Name slider" />
                            </div>
                          </div>
                          <div class="row">
                            <div class="col mb-3">
                              <label for="nameLarge" class="form-label">Deskripsi</label>
                              <textarea type="text" id="nameLarge" class="form-control" name="deskripsi" required placeholder="Enter Name slider" >{{$value->deskripsi}}</textarea>
                            </div>
                          </div>
                        <div class="row">                       
                          <div class="col-md-3">
                              <input type="hidden" class="mb-3 mt-3" name="oldImage" value="{{ old('gambar', $value->gambar)}}">
                              <img src="{{ asset('storage/'. $value->gambar) }}" class="img-preview-edit mb-3 mt-3" style="width: 200px">
                          </div>
                        </div>                        
                        <div class="row">
                          <div class="col mb-3">
                            <label for="nameLarge" class="form-label">Gambar</label>
                            <input type="file" id="gambar" onchange="previewImageedit()"class="form-control" name="gambar" placeholder="Enter Name" />
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                          Close
                        </button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </form>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>






<div class="modal fade" id="createslider" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel3">Silahkan Tambah Data Slider</h5>
        <button type="button"class="btn-close"data-bs-dismiss="modal"aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ url('admin/slider/create') }}" method="POST"  enctype="multipart/form-data">
          @csrf
        <div class="row">
          <div class="col mb-3">
            <label for="nameLarge" class="form-label">Judul</label>
            <input type="text" id="nameLarge" class="form-control" name="judul" required placeholder="Enter Name slider" />
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="nameLarge" class="form-label">Deskripsi</label>
            <textarea type="text" id="nameLarge" class="form-control" name="deskripsi" required placeholder="Enter Name slider" ></textarea>
          </div>
        </div>
        <div class="row">                       
            <img class="img-preview-create mb-3 mt-3" style="width: 200px">
        </div>                        
        <div class="row">
          <div class="col mb-3">
            <label for="nameLarge" class="form-label">Gambar</label>
            <input type="file" id="gambar-create" required onchange="previewImagecreate()"class="form-control" name="gambar" placeholder="Enter Name" />
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
          Close
        </button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </form>
      </div>
    </div>
  </div>
</div>



<script>
  function previewImageedit() {
  
  const gambar = document.querySelector('#gambar');
  const imgpreview = document.querySelector('.img-preview-edit');

  imgpreview.style.display = 'block';

  const oFReader = new FileReader();
  oFReader.readAsDataURL(gambar.files[0]);

  oFReader.onload = function(oFREvent){
    imgpreview.src = oFREvent.target.result;
  }
}
function previewImagecreate() {
  
  const gambar = document.querySelector('#gambar-create');
  const imgpreview = document.querySelector('.img-preview-create');

  imgpreview.style.display = 'block';

  const oFReader = new FileReader();
  oFReader.readAsDataURL(gambar.files[0]);

  oFReader.onload = function(oFREvent){
    imgpreview.src = oFREvent.target.result;
  }
}
</script>
@endsection
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
            <p class="">Silahkan Tambahkan Data support</p>      
            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#createsupport"><i class="bx bx-plus-circle" style="margin-right: 5px"></i>Tambah Data</button>
          <div class="table-responsive text-nowrap">
            <table class="table  table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $value)
                    
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$value->judul}}</td>
                  <td>
                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editsupport{{$value->id}}"><i class="bx bx-pencil" style="margin-right: 5px"></i>Edit</button>                  
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#viewsupport{{$value->id}}"><i class="bx bx-eye" style="margin-right: 5px"></i>View</button>                  
                    <a href="{{url('admin/support/'.$value->id.'/hapus')}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini?');"  class="btn btn-sm" style="background-color: #f54a58;color:white"><i class="bx bx-trash" style="margin-right: 5px"></i>Hapus</a>

                  </td>
                </tr>  
                <div class="modal fade" id="editsupport{{$value->id}}" tabindex="-1" aria-labelledby="editsupport{{$value->id}}Label" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel3">Silahkan Edit Data Support</h5>
                        <button type="button"class="btn-close"data-bs-dismiss="modal"aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="{{ url('admin/support/'.$value->id.'/edit') }}" method="POST"  enctype="multipart/form-data">
                          @csrf
                          @method('PUT')                        
                        <div class="row">
                          <div class="col mb-3">
                            <label for="nameLarge" class="form-label">Judul</label>
                            <input type="text" id="nameLarge" value="{{$value->judul}}" class="form-control" name="judul" required placeholder="Enter Judul support" />
                          </div>
                        </div>
                        <div class="row">
                          <div class="col mb-3">
                            <label for="nameLarge" class="form-label">Deskripsi</label>
                            <textarea style="height: 200px" type="text" id="nameLarge" class="form-control" name="deskripsi" required >{!!$value->deskripsi!!}</textarea>
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

                <div class="modal fade" id="viewsupport{{$value->id}}" tabindex="-1" aria-labelledby="viewsupport{{$value->id}}Label" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel3">Detail Data Support</h5>
                        <button type="button"class="btn-close"data-bs-dismiss="modal"aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                                          
                        <div class="row">
                          <div class="col mb-3">
                            <label for="nameLarge" class="form-label">Judul</label>
                            <input type="text" disabled value="{{$value->judul}}" id="nameLarge" class="form-control" name="judul" required placeholder="Enter Judul support" />
                          </div>
                        </div>
                        <div class="row">
                          <div class="col mb-3">
                            <label for="nameLarge" class="form-label">Deskripsi</label>
                            <textarea style="height: 200px"  disabled ="text" id="nameLarge" class="form-control" name="deskripsi" required >{!!$value->deskripsi!!}</textarea>

                          </div>
                        </div>                                                                  
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                          Close
                        </button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
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






<div class="modal fade" id="createsupport" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel3">Silahkan Tambah Data Support</h5>
        <button type="button"class="btn-close"data-bs-dismiss="modal"aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ url('admin/support/create') }}" method="POST"  enctype="multipart/form-data">
          @csrf
        <div class="row">
          <div class="col mb-3">
            <label for="nameLarge" class="form-label">Judul</label>
            <input type="text" id="nameLarge" class="form-control" name="judul" required placeholder="Enter Judul support" />
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="nameLarge" class="form-label">Deskripsi</label>
            <textarea type="text" id="nameLarge" class="form-control" name="deskripsi" required ></textarea>
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
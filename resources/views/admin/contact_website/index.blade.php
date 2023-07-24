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
            <div class="alert alert-info alert-dismissible" role="alert">
             Data Yang Pertama Di Inputkan Yang Akan Tampil!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <p class="">Silahkan Tambahkan Data Contact Website</p>      
            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#createcontact_website"><i class="bx bx-plus-circle" style="margin-right: 5px"></i>Tambah Data</button>
          <div class="table-responsive text-nowrap">
            <table class="table  table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>No Telepon 1</th>
                  <th>No Telepon 2</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $value)
                    
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$value->no_telp1}}</td>
                  @if(!empty($value->no_telp2))
                  <td>{{$value->no_telp2}}</td>
                  @else
                  <td>Tidak Ada Data No Telp 2</td>
                  @endif
                  <td>{{$value->email}}</td>
                  <td>{{$value->alamat}}</td>

                  <td>
                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editcontact_website{{$value->id}}"><i class="bx bx-pencil" style="margin-right: 5px"></i>Edit</button>                  
                    <a href="{{url('admin/contact_website/'.$value->id.'/hapus')}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini?');"  class="btn btn-sm" style="background-color: #f54a58;color:white"><i class="bx bx-trash" style="margin-right: 5px"></i>Hapus</a>

                  </td>
                </tr>  
                <div class="modal fade" id="editcontact_website{{$value->id}}" tabindex="-1" aria-labelledby="editcontact_website{{$value->id}}Label" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel3">Silahkan Edit Data Contact Website</h5>
                        <button type="button"class="btn-close"data-bs-dismiss="modal"aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="{{ url('admin/contact_website/'.$value->id.'/edit') }}" method="POST"  enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <div class="row">
                            <div class="col mb-3">
                              <label for="nameLarge" class="form-label">Email</label>
                              <input type="email" id="nameLarge" class="form-control" name="email" value="{{$value->email}}" required placeholder="Enter Email" />
                            </div>
                          </div>   
                          <div class="row g-2">
                            <div class="col mb-0">
                              <label for="emailBasic" class="form-label">No Telepon 1</label>
                              <input type="number" name="no_telp1" id="gambar-create" value="{{$value->no_telp1}}" required class="form-control" />
                            </div>
                            <div class="col mb-0">
                              <label for="dobBasic" class="form-label">No Telepon 2</label>
                              <input type="number" name="no_telp2" id="gambar-create" value="{{$value->no_telp2}}" class="form-control">
                            </div>
                          </div>         
                          <div class="row">
                            <div class="col mb-3">
                              <label for="nameLarge" class="form-label">Alamat</label>
                              <textarea type="text" id="nameLarge" class="form-control" name="alamat" >{{$value->alamat}}</textarea>
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





<div class="modal fade" id="createcontact_website" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel3">Silahkan Tambah Data Contact Website</h5>
        <button type="button"class="btn-close"data-bs-dismiss="modal"aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ url('admin/contact_website/create') }}" method="POST"  enctype="multipart/form-data">
          @csrf
        <div class="row">
          <div class="col mb-3">
            <label for="nameLarge" class="form-label">Email</label>
            <input type="email" id="nameLarge" class="form-control" name="email" required placeholder="Enter Email" />
          </div>
        </div>   
        <div class="row g-2">
          <div class="col mb-0">
            <label for="emailBasic" class="form-label">No Telepon 1</label>
            <input type="number" name="no_telp1" id="gambar-create" required class="form-control" />
          </div>
          <div class="col mb-0">
            <label for="dobBasic" class="form-label">No Telepon 2</label>
            <input type="number" name="no_telp2" id="gambar-create"  class="form-control">
          </div>
        </div>         
        <div class="row">
          <div class="col mb-3">
            <label for="nameLarge" class="form-label">Alamat</label>
            <textarea type="text" id="nameLarge" class="form-control" name="alamat" required placeholder="Enter Contact Website" ></textarea>
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

@endsection
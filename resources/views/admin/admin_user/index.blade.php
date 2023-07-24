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
            <p>Data Admin User</p>      
          <div class="table-responsive text-nowrap">
            <table class="table  table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>email</th>
                  <th>Peran</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $value)
                    
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$value->name}}</td>
                  <td>{{$value->email}}</td>
                  <td>
                    @if ($value->admin == 1)
                      <span class="btn btn-success">Admin</span>
                    @else
                    <span class="btn btn-primary">User</span>                      
                    @endif
                  </td>
                  <td>
                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editadmin_user{{$value->id}}"><i class="bx bx-pencil" style="margin-right: 5px"></i>Edit</button>                  
                  </td>
                </tr>  
                <div class="modal fade" id="editadmin_user{{$value->id}}" tabindex="-1" aria-labelledby="editadmin_user{{$value->id}}Label" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel3">Silahkan Edit Data Admin User</h5>
                        <button type="button"class="btn-close"data-bs-dismiss="modal"aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="{{ url('admin/admin_user/'.$value->id.'/edit') }}" method="POST"  enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                        <div class="row">
                          <div class="col mb-3">
                            <label for="nameLarge" class="form-label">Nama</label>
                            <input type="text" id="nameLarge" class="form-control" value="{{$value->name}}" disabled name="nama" required placeholder="Enter Name" />
                          </div>
                        </div>
                        <div class="row">
                          <div class="col mb-3">
                            <label for="nameLarge" class="form-label">Email</label>
                            <input type="text" id="nameLarge" class="form-control" value="{{$value->email}}" disabled name="email" required placeholder="Enter Name" />
                          </div>
                        </div>
                        <div class="row">
                          <div class="col mb-3">
                            <label for="defaultSelect" class="form-label">Pilih Peran</label>
                              <select id="defaultSelect" class="form-select" required name="admin">
                                <option value="" disabled selected style="text-align: center">-- Silahkan Pilih Peran --</option>
                                  <option value="0" @if ($value->admin == 0) selected  @endif>User</option>               
                                  <option value="1" @if ($value->admin == 1) selected  @endif>Admin</option>               
                              </select>
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
@endsection
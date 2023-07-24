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
            <p class="">Silahkan Tambahkan Data Product</p>      
            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#createproduct"><i class="bx bx-plus-circle" style="margin-right: 5px"></i>Tambah Data</button>
          <div class="table-responsive text-nowrap">
            <table class="table  table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Gambar</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $value)
                    
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$value->nama}}</td>
                  <td><img src="{{asset('storage/'.$value->gambar1)}}" alt="" width="40px"></td>
                  <td>
                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editproduct{{$value->id}}"><i class="bx bx-pencil" style="margin-right: 5px"></i>Edit</button>                  
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#detailproduct{{$value->id}}"><i class="bx bx-eye" style="margin-right: 5px"></i>View</button>                  
                    <a href="{{url('admin/product/'.$value->id.'/hapus')}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini?');"  class="btn btn-sm" style="background-color: #f54a58;color:white"><i class="bx bx-trash" style="margin-right: 5px"></i>Hapus</a>
                  </td>
                </tr>  
                <div class="modal fade" id="editproduct{{$value->id}}" tabindex="-1" aria-labelledby="editproduct{{$value->id}}Label" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel3">Silahkan Edit Data Product</h5>
                        <button type="button"class="btn-close"data-bs-dismiss="modal"aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="{{ url('admin/product/'.$value->id.'/edit') }}" method="POST"  enctype="multipart/form-data">
                          @csrf
                          @method('PUT')                          
                            <div class="row">
                              <div class="col mb-3">
                                <label for="nameLarge" class="form-label">Nama</label>
                                <input type="text" id="nameLarge" class="form-control" value="{{$value->nama}}" name="nama" required  />
                              </div>
                            </div>    
                            <div class="row">
                              <div class="col mb-3">
                                <label for="defaultSelect" class="form-label">Category</label>
                                  <select id="defaultSelect" class="form-select" required name="category_id">
                                    <option value="" disabled selected style="text-align: center">-- Silahkan Pilih Data Category --</option>
                                    @foreach ($category as $categoryData)   
                                    @if($value->category_id == $categoryData->id)
                                        <option value=" {{ $categoryData->id }}" selected>{{$categoryData->nama}} </option>
                                        @else
                                        <option value=" {{ $categoryData->id }} ">{{$categoryData->nama}} </option>
                                        @endif                                 
                                    @endforeach      
                                  </select>
                              </div>
                            </div>  
                            <div class="row">
                              <div class="col mb-3">
                                <label for="defaultSelect" class="form-label">Size</label>
                                  <select id="defaultSelect" class="form-select" required name="size_id">
                                    <option value="" disabled selected style="text-align: center">-- Silahkan Pilih Data Size --</option>
                                    @foreach ($size as $sizeData)   
                                    @if($value->size_id == $sizeData->id)
                                        <option value=" {{ $sizeData->id }}" selected>{{$sizeData->nama}} </option>
                                        @else
                                        <option value=" {{ $sizeData->id }} ">{{$sizeData->nama}} </option>
                                        @endif                                 
                                    @endforeach      
                                  </select>
                              </div>
                            </div>  
                            <div class="row g-2">
                              <div class="col mb-0">
                                  <input type="hidden" class="mb-3 mt-3" name="oldImage1" value="{{ old('gambar1', $value->gambar1)}}">
                                  <img src="{{ asset('storage/'. $value->gambar1) }}" class="img-preview-edit-1 mb-3 mt-3" style="width: 200px">
                              </div>
                              <div class="col mb-0">
                                  <input type="hidden" class="mb-3 mt-3" name="oldImage2" value="{{ old('gambar2', $value->gambar2)}}">
                                   @if(!empty($value->gambar2))
                                  <img src="{{ asset('storage/'. $value->gambar2) }}" class="img-preview-edit-2 mb-3 mt-3" style="width: 200px">
                                  @endif
                              </div>
                            </div>        
                            <div class="row g-2">
                              <div class="col mb-0">
                                <label for="emailBasic" class="form-label">Gambar 1</label>
                                <input type="file" name="gambar1" id="gambar-edit1"  onchange="previewImageedit1()" class="form-control" />
                              </div>
                              <div class="col mb-0">
                                <label for="dobBasic" class="form-label">Gambar 2</label>
                                <input type="file" name="gambar2" id="gambar-edit2"  onchange="previewImageedit2()" class="form-control">
                              </div>
                            </div> 
                            
                            <div class="row g-2">
                              <div class="col mb-0">
                                  <input type="hidden" class="mb-3 mt-3" name="oldImage3" value="{{ old('gambar3', $value->gambar3)}}">
                                   @if(!empty($value->gambar3))
                                  <img src="{{ asset('storage/'. $value->gambar3) }}" class="img-preview-edit-3 mb-3 mt-3" style="width: 200px">
                                  @endif
                              </div>
                              <div class="col mb-0">
                                  <input type="hidden" class="mb-3 mt-3" name="oldImage4" value="{{ old('gambar4', $value->gambar4)}}">
                                   @if(!empty($value->gambar4))
                                  <img src="{{ asset('storage/'. $value->gambar4) }}" class="img-preview-edit-4 mb-3 mt-3" style="width: 200px">
                                  @endif
                              </div>
                            </div>        
                            <div class="row g-2">
                              <div class="col mb-0">
                                <label for="emailBasic" class="form-label">Gambar 3</label>
                                <input type="file" name="gambar3" id="gambar-edit3"  onchange="previewImageedit3()" class="form-control" />
                              </div>
                              <div class="col mb-0">
                                <label for="dobBasic" class="form-label">Gambar 4</label>
                                <input type="file" name="gambar4" id="gambar-edit4"  onchange="previewImageedit4()" class="form-control">
                              </div>
                            </div> 
                            <div class="row g-2">
                              <div class="col mb-0">
                                  <input type="hidden" class="mb-3 mt-3" name="oldImage5" value="{{ old('gambar5', $value->gambar5)}}">
                                   @if(!empty($value->gambar5))
                                  <img src="{{ asset('storage/'. $value->gambar5) }}" class="img-preview-edit-5 mb-3 mt-3" style="width: 200px">
                                  @endif
                              </div>         
                            </div>        
                            <div class="row g-2">
                              <div class="col mb-0">
                                <label for="emailBasic" class="form-label">Gambar 5</label>
                                <input type="file" name="gambar5" id="gambar-edit5"  onchange="previewImageedit5()" class="form-control" />
                              </div>
                              <div class="col mb-0">
                                <label for="emailBasic" class="form-label">Harga</label>
                                <input type="number" id="emailBasic" required name="harga" value="{{$value->harga}}" class="form-control" />
                              </div>
                            </div> 
                            <div class="row">          
                              <div class="col mb-3">
                                <label for="dobBasic" class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" style="height: 100px" required id="dobBasic" class="form-control">{{$value->deskripsi}}</textarea>
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
                <div class="modal fade" id="detailproduct{{$value->id}}" tabindex="-1" aria-labelledby="detailproduct{{$value->id}}Label" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel3">Detail Data Product</h5>
                        <button type="button"class="btn-close"data-bs-dismiss="modal"aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                                                 
                            <div class="row">
                              <div class="col mb-3">
                                <label for="nameLarge" class="form-label">Nama:</label>
                                <input type="text" disabled  id="nameLarge" class="form-control" value="{{$value->nama}}" name="nama" required  />
                              </div>
                            </div>    
                            <div class="row">
                              <div class="col mb-3">
                                <label for="nameLarge" class="form-label">Category:</label>
                                <input type="text" disabled  id="nameLarge" class="form-control" value="{{$value->category->nama}}" name="nama" required  />

                              </div>
                            </div>  
                            <div class="row g-2">
                              <div class="col mb-0">
                                <label for="emailBasic" class="form-label">Gambar 1:</label>
                                  <img src="{{ asset('storage/'. $value->gambar1) }}" class="img-preview-edit-1 mb-3 mt-3" style="width: 200px">
                              </div>
                              <div class="col mb-0">
                                <label for="emailBasic" class="form-label">Gambar 2:</label>
                                   @if(!empty($value->gambar2))
                                  <img src="{{ asset('storage/'. $value->gambar2) }}" class="img-preview-edit-2 mb-3 mt-3" style="width: 200px">
                                  @else
                                  <p>*Tidak Ada Gambar 2</p>
                                  @endif
                              </div>
                            </div>                                  
                            
                            <div class="row g-2">
                              <div class="col mb-0">
                                <label for="emailBasic" class="form-label">Gambar 3:</label>
                                   @if(!empty($value->gambar3))
                                  <img src="{{ asset('storage/'. $value->gambar3) }}" class="img-preview-edit-3 mb-3 mt-3" style="width: 200px">
                                  @else
                                  <p>*Tidak Ada Gambar 3</p>
                                  @endif
                              </div>
                              <div class="col mb-0">
                                <label for="emailBasic" class="form-label">Gambar 4:</label>
                                   @if(!empty($value->gambar4))
                                  <img src="{{ asset('storage/'. $value->gambar4) }}" class="img-preview-edit-4 mb-3 mt-3" style="width: 200px">
                                  @else
                                  <p>*Tidak Ada Gambar 4</p>
                                  @endif
                              </div>
                            </div>                                    
                            <div class="row g-2">
                              <div class="col mb-0">
                                <label for="emailBasic" class="form-label">Gambar 5:</label>
                                   @if(!empty($value->gambar5))
                                  <img src="{{ asset('storage/'. $value->gambar5) }}" class="img-preview-edit-5 mb-3 mt-3" style="width: 200px">
                                  @else
                                  <p>*Tidak Ada Gambar 5</p>
                                  @endif
                              </div> 
                            </div>
                            <div class="row">                              
                              <div class="col mb-3">
                                <label for="emailBasic" class="form-label">Harga:</label>
                                <input type="number" disabled="emailBasic" required name="harga" value="{{$value->harga}}" class="form-control" />
                              </div>
                            </div> 
                            <div class="row">          
                              <div class="col mb-3">
                                <label for="dobBasic" class="form-label">Deskripsi:</label>
                                <textarea name="deskripsi" style="height: 100px"  disabled required id="dobBasic" class="form-control">{{$value->deskripsi}}</textarea>
                              </div>
                            </div>                     
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                          Close
                        </button>
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






<div class="modal fade" id="createproduct" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel3">Silahkan Tambah Data Product</h5>
        <button type="button"class="btn-close"data-bs-dismiss="modal"aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ url('admin/product/create') }}" method="POST"  enctype="multipart/form-data">
          @csrf
        <div class="row">
          <div class="col mb-3">
            <label for="nameLarge" class="form-label">Nama</label>
            <input type="text" id="nameLarge" class="form-control" name="nama" required  />
          </div>
        </div>    
        <div class="row">
          <div class="col mb-3">
            <label for="defaultSelect" class="form-label">Category</label>
              <select id="defaultSelect" class="form-select" required name="category_id">
                <option value="" disabled selected style="text-align: center">-- Silahkan Pilih Data Category --</option>
                  @foreach ($category as $data)
                      <option value="{{$data->id}}">{{$data->nama}}</option>
                  @endforeach          
              </select>
          </div>
        </div>  
        <div class="row">
          <div class="col mb-3">
            <label for="defaultSelect" class="form-label">Size</label>
              <select id="defaultSelect" class="form-select" required name="size_id">
                <option value="" disabled selected style="text-align: center">-- Silahkan Pilih Data Size --</option>
                  @foreach ($size as $data)
                      <option value="{{$data->id}}">{{$data->nama}}</option>
                  @endforeach          
              </select>
          </div>
        </div>  
        <div class="row g-2">
          <div class="col mb-0">
            <img class="img-preview-create1 mb-3 mt-3" style="width: 200px">
            
          </div>
          <div class="col mb-0">
            <img class="img-preview-create2 mb-3 mt-3" style="width: 200px">
          </div>
        </div>        
        <div class="row g-2">
          <div class="col mb-0">
            <label for="emailBasic" class="form-label">Gambar 1</label>
            <input type="file" name="gambar1" id="gambar-create1" required onchange="previewImagecreate1()" class="form-control" />
          </div>
          <div class="col mb-0">
            <label for="dobBasic" class="form-label">Gambar 2</label>
            <input type="file" name="gambar2" id="gambar-create2"  onchange="previewImagecreate2()" class="form-control">
          </div>
        </div> 
        
        <div class="row g-2">
          <div class="col mb-0">
            <img class="img-preview-create3 mb-3 mt-3" style="width: 200px">
            
          </div>
          <div class="col mb-0">
            <img class="img-preview-create4 mb-3 mt-3" style="width: 200px">
          </div>
        </div>        
        <div class="row g-2">
          <div class="col mb-0">
            <label for="emailBasic" class="form-label">Gambar 3</label>
            <input type="file" name="gambar3" id="gambar-create3"  onchange="previewImagecreate3()" class="form-control" />
          </div>
          <div class="col mb-0">
            <label for="dobBasic" class="form-label">Gambar 4</label>
            <input type="file" name="gambar4" id="gambar-create4"  onchange="previewImagecreate4()" class="form-control">
          </div>
        </div> 
        <div class="row g-2">
          <div class="col mb-0">
            <img class="img-preview-create5 mb-3 mt-3" style="width: 200px">
            
          </div>         
        </div>        
        <div class="row g-2">
          <div class="col mb-0">
            <label for="emailBasic" class="form-label">Gambar 5</label>
            <input type="file" name="gambar5" id="gambar-create5"  onchange="previewImagecreate5()" class="form-control" />
          </div>
          <div class="col mb-0">
            <label for="emailBasic" class="form-label">Harga</label>
            <input type="number" id="emailBasic" required name="harga" class="form-control" />
          </div>
        </div> 
        <div class="row">          
          <div class="col mb-3">
            <label for="dobBasic" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" style="height: 100px" required id="dobBasic" class="form-control"></textarea>
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
function previewImagecreate1() {
  
  const gambar = document.querySelector('#gambar-create1');
  const imgpreview = document.querySelector('.img-preview-create1');

  imgpreview.style.display = 'block';

  const oFReader = new FileReader();
  oFReader.readAsDataURL(gambar.files[0]);

  oFReader.onload = function(oFREvent){
    imgpreview.src = oFREvent.target.result;
  }
}
function previewImagecreate2() {
  
  const gambar = document.querySelector('#gambar-create2');
  const imgpreview = document.querySelector('.img-preview-create2');

  imgpreview.style.display = 'block';

  const oFReader = new FileReader();
  oFReader.readAsDataURL(gambar.files[0]);

  oFReader.onload = function(oFREvent){
    imgpreview.src = oFREvent.target.result;
  }
}
function previewImagecreate3() {
  
  const gambar = document.querySelector('#gambar-create3');
  const imgpreview = document.querySelector('.img-preview-create3');

  imgpreview.style.display = 'block';

  const oFReader = new FileReader();
  oFReader.readAsDataURL(gambar.files[0]);

  oFReader.onload = function(oFREvent){
    imgpreview.src = oFREvent.target.result;
  }
}
function previewImagecreate4() {
  
  const gambar = document.querySelector('#gambar-create4');
  const imgpreview = document.querySelector('.img-preview-create4');

  imgpreview.style.display = 'block';

  const oFReader = new FileReader();
  oFReader.readAsDataURL(gambar.files[0]);

  oFReader.onload = function(oFREvent){
    imgpreview.src = oFREvent.target.result;
  }
}
function previewImagecreate5() {
  
  const gambar = document.querySelector('#gambar-create5');
  const imgpreview = document.querySelector('.img-preview-create5');

  imgpreview.style.display = 'block';

  const oFReader = new FileReader();
  oFReader.readAsDataURL(gambar.files[0]);

  oFReader.onload = function(oFREvent){
    imgpreview.src = oFREvent.target.result;
  }
}
function previewImageedit1() {
  
  const gambar = document.querySelector('#gambar-edit1');
  const imgpreview = document.querySelector('.img-preview-edit-1');

  imgpreview.style.display = 'block';

  const oFReader = new FileReader();
  oFReader.readAsDataURL(gambar.files[0]);

  oFReader.onload = function(oFREvent){
    imgpreview.src = oFREvent.target.result;
  }
}
function previewImageedit2() {
  
  const gambar = document.querySelector('#gambar-edit2');
  const imgpreview = document.querySelector('.img-preview-edit-2');

  imgpreview.style.display = 'block';

  const oFReader = new FileReader();
  oFReader.readAsDataURL(gambar.files[0]);

  oFReader.onload = function(oFREvent){
    imgpreview.src = oFREvent.target.result;
  }
}
function previewImageedit3() {
  
  const gambar = document.querySelector('#gambar-edit3');
  const imgpreview = document.querySelector('.img-preview-edit-3');

  imgpreview.style.display = 'block';

  const oFReader = new FileReader();
  oFReader.readAsDataURL(gambar.files[0]);

  oFReader.onload = function(oFREvent){
    imgpreview.src = oFREvent.target.result;
  }
}
function previewImageedit4() {
  
  const gambar = document.querySelector('#gambar-edit4');
  const imgpreview = document.querySelector('.img-preview-edit-4');

  imgpreview.style.display = 'block';

  const oFReader = new FileReader();
  oFReader.readAsDataURL(gambar.files[0]);

  oFReader.onload = function(oFREvent){
    imgpreview.src = oFREvent.target.result;
  }
}
function previewImageedit5() {
  
  const gambar = document.querySelector('#gambar-edit5');
  const imgpreview = document.querySelector('.img-preview-edit-5');

  imgpreview.style.display = 'block';

  const oFReader = new FileReader();
  oFReader.readAsDataURL(gambar.files[0]);

  oFReader.onload = function(oFREvent){
    imgpreview.src = oFREvent.target.result;
  }
}
</script>
@endsection
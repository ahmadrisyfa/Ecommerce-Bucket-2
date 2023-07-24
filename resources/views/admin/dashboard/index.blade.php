@extends('template.admin.index')
@section('content_admin')
    <div class="col-lg-12 col-md-12 ">
      <div class="row">

        <div class="col-lg-6 col-md-12 col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img src="{{asset('template_admin')}}/assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded" />
                </div>
                <div class="dropdown">
                  <button
                    class="btn p-0"
                    type="button"
                    id="cardOpt1"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="cardOpt1">
                    <a class="dropdown-item" href="{{url('admin/admin_user')}}">View More</a>
                  </div>
                </div>
              </div>
              <span class="fw-semibold d-block mb-1">Total User</span>
              <h3 class="card-title mb-2">{{$totaluser}}</h3>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img src="{{asset('template_admin')}}/assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded" />
                </div>
                <div class="dropdown">
                  <button
                    class="btn p-0"
                    type="button"
                    id="cardOpt1"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="cardOpt1">
                    <a class="dropdown-item" href="{{url('admin/admin_user')}}">View More</a>
                  </div>
                </div>
              </div>
              <span>Total Admin</span>
              <h3 class="card-title text-nowrap mb-1">{{$totaladmin}}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>                
    <div class="col-md-12 col-lg-12 order-1 ">
      <div class="row">
        <div class="col-lg-6 col-md-12 col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img src="{{asset('template_admin')}}/assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded" />
                </div>
                <div class="dropdown">
                  <button
                    class="btn p-0"
                    type="button"
                    id="cardOpt1"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="cardOpt1">
                    <a class="dropdown-item" href="{{url('admin/product')}}">View More</a>
                  </div>
                </div>
              </div>
              <span class="d-block mb-1">Total Product</span>
              <h3 class="card-title text-nowrap mb-2">{{$totalProduct}}</h3>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img src="{{asset('template_admin')}}/assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded" />
                </div>
                <div class="dropdown">
                  <button
                    class="btn p-0"
                    type="button"
                    id="cardOpt1"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="cardOpt1">
                    <a class="dropdown-item" href="{{url('admin/category')}}">View More</a>
                  </div>
                </div>
              </div>
              <span class="fw-semibold d-block mb-1">Total Category</span>
              <h3 class="card-title mb-2">{{$totalCategory}}</h3>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img src="{{asset('template_admin')}}/assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded" />
                </div>
                <div class="dropdown">
                  <button
                    class="btn p-0"
                    type="button"
                    id="cardOpt1"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="cardOpt1">
                    <a class="dropdown-item" href="{{url('admin/size')}}">View More</a>
                  </div>
                </div>
              </div>
              <span class="fw-semibold d-block mb-1">Total Size</span>
              <h3 class="card-title mb-2">{{$totalSize}}</h3>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img src="{{asset('template_admin')}}/assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded" />
                </div>
                <div class="dropdown">
                  <button
                    class="btn p-0"
                    type="button"
                    id="cardOpt1"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="cardOpt1">
                    <a class="dropdown-item" href="{{url('admin/transaksi')}}">View More</a>
                  </div>
                </div>
              </div>
              <span class="fw-semibold d-block mb-1">Total Product Terjual</span>
              <h3 class="card-title mb-2">{{$totalterjual}}</h3>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img src="{{asset('template_admin')}}/assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded" />
                </div>
                <div class="dropdown">
                  <button
                    class="btn p-0"
                    type="button"
                    id="cardOpt1"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="cardOpt1">
                    <a class="dropdown-item" href="{{url('admin/transaksi')}}">View More</a>
                  </div>
                </div>
              </div>
              <span>
                <input  type="file" name="file" id="changeAuthorPictureFile" class="d-none" onchange="this.dispatchEvent(new InputEvent('input'))">
                <a href="#" class="btn btn-info"onclick="event.preventDefault();document.getElementById('changeAuthorPictureFile').click();">
                  <b>Ganti foto Profil</b> 
                </a>               
              </span> 
            </div>
          </div>
        </div>
                          
      </div>
    </div>
    
@endsection
@section('css_admin')
    <link rel="stylesheet" href="{{ asset('IjaboCropTool/ijaboCropTool.min.css') }}">
@endsection
@section('script_admin')
<script src="{{ asset('IjaboCropTool/ijaboCropTool.min.js') }}"></script>

<script>

  $('#changeAuthorPictureFile').ijaboCropTool({
          preview : '',
          setRatio:1,
          allowedExtensions: ['jpg', 'jpeg','png'],
          buttonsText:['Simpan','Batal'],
          buttonsColor:['#30bf7d','#ee5155', -15],
          processUrl:'{{ route("change-profile-picture") }}',
          withCSRF:['_token','{{ csrf_token() }}'],
          onSuccess:function(message, element, status){
             alert(message);
             location.reload();
          },
          onError:function(message, element, status){
            alert(message);
          }
  });
</script>
@endsection
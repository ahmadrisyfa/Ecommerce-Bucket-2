
<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Bucket | E-Commerce</title>

    <meta name="description" content="" />
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('template_admin')}}/assets/img/favicon/favicon.ico" />
    @yield('css_admin')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('template_admin')}}/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('template_admin')}}/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('template_admin')}}/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('template_admin')}}/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('template_admin')}}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="{{asset('template_admin')}}/assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{asset('template_admin')}}/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('template_admin')}}/assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="{{url('admin/dashboard')}}" class="app-brand-link">
              @if ($nameWebsite = \App\Models\NamaDanLogo::first())  
              @php
              $nameWebsite = \App\Models\NamaDanLogo::first()->get();
              @endphp
              @foreach ($nameWebsite as $value)
              <img src="{{ asset('storage/'. $value->gambar) }}" alt="Logo" width="30px" class="footer-logo">
              <span class="app-brand-text demo menu-text fw-bolder ms-2">{{$value->nama}}</span>
              @endforeach
              @else
              <span class="app-brand-text demo menu-text fw-bolder ms-2">Sneat</span>
              @endif
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <li class="menu-item ">
              <a href="{{url('admin/dashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>            

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Data Website</span>
            </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons bx bxs-washer' ></i>
                <div data-i18n="Account Settings">Category</div>
              </a>
              <ul class="menu-sub">                
                <li class="menu-item">
                  <a href="{{url('admin/category')}}" class="menu-link">
                    <div data-i18n="Account">Detail Category</div>
                  </a>
                </li>              
              </ul>
            </li>  
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons bx bxs-wine'></i>
                <div data-i18n="Account Settings">Product</div>
              </a>
              <ul class="menu-sub">                
                <li class="menu-item">
                  <a href="{{url('admin/product')}}" class="menu-link">
                    <div data-i18n="Account">Detail Product</div>
                  </a>
                </li>              
              </ul>
            </li> 
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons bx bx-slider-alt'></i>
                <div data-i18n="Account Settings">Slider</div>
              </a>
              <ul class="menu-sub">                
                <li class="menu-item">
                  <a href="{{url('admin/slider')}}" class="menu-link">
                    <div data-i18n="Account">Detail Slider</div>
                  </a>
                </li>              
              </ul>
            </li>            
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">               
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div data-i18n="Account Settings">Support</div>
              </a>
              <ul class="menu-sub">                
                <li class="menu-item">
                  <a href="{{url('admin/support')}}" class="menu-link">
                    <div data-i18n="Account">Detail Support</div>
                  </a>
                </li>              
              </ul>
            </li> 
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons bx bx-font-size'></i>
                <div data-i18n="Account Settings">Size</div>
              </a>
              <ul class="menu-sub">                
                <li class="menu-item">
                  <a href="{{url('admin/size')}}" class="menu-link">
                    <div data-i18n="Account">Detail Size</div>
                  </a>
                </li>              
              </ul>
            </li> 
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons bx bxs-user-pin' ></i>
                <div data-i18n="Account Settings">Admin User</div>
              </a>
              <ul class="menu-sub">                
                <li class="menu-item">
                  <a href="{{url('admin/admin_user')}}" class="menu-link">
                    <div data-i18n="Account">Detail Admin User</div>
                  </a>
                </li>              
              </ul>
            </li> 
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons bx bx-money'></i>
                <div data-i18n="Account Settings">Transaksi</div>
              </a>
              <ul class="menu-sub">                
                <li class="menu-item">
                  <a href="{{url('admin/transaksi')}}" class="menu-link">
                    <div data-i18n="Account">Detail Transaksi</div>
                  </a>
                </li>              
              </ul>
            </li> 
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Sistem Website</span>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons bx bxs-store-alt'></i>
                <div data-i18n="Account Settings">Nama Dan Logo</div>
              </a>
              <ul class="menu-sub">                
                <li class="menu-item">
                  <a href="{{url('admin/nama_dan_logo')}}" class="menu-link">
                    <div data-i18n="Account">Detail Nama Dan Logo</div>
                  </a>
                </li>              
              </ul>
            </li> 
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Account Settings">Contact Website</div>
              </a>
              <ul class="menu-sub">                
                <li class="menu-item">
                  <a href="{{url('admin/contact_website')}}" class="menu-link">
                    <div data-i18n="Account">Detail Contact Website</div>
                  </a>
                </li>              
              </ul>
            </li> 
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  @include('template.admin.waktu')                
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-3">
                  <a href="{{url('admin/dashboard')}}" style="font-weight: bold;text-transform:capitalize">{{auth()->user()->name}}</a>
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="{{auth()->user()->picture}}" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="{{auth()->user()->picture}}" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">{{auth()->user()->name}}</span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>                   
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Setting</span>
                      </a>
                    </li> 
                    <li>
                      <a class="dropdown-item" href="{{url('/')}}">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Ke Website</span>
                      </a>
                    </li> 
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <form action="{{url('logout')}}" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item"> 
                          <i class="bx bx-power-off me-2"></i>
                          <span class="align-middle">Log Out</span>
                        </button>
                      </form>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                @yield('content_admin')
              </div>
             
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  @if ($nameWebsite = \App\Models\NamaDanLogo::first())  
                  @php
                  $nameWebsite = \App\Models\NamaDanLogo::first()->get();
                  @endphp
                  @foreach ($nameWebsite as $value)
                  <p style="font-size: 12px;">© Copyright {{date('Y')}} | {{$value->nama}}
                  @endforeach
                  @else
                  <p style="font-size: 12px;">© Copyright {{date('Y')}} | Sneat
                  @endif
                </div>                
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{asset('template_admin')}}/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="{{asset('template_admin')}}/assets/vendor/libs/popper/popper.js"></script>
    <script src="{{asset('template_admin')}}/assets/vendor/js/bootstrap.js"></script>
    <script src="{{asset('template_admin')}}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="{{asset('template_admin')}}/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{asset('template_admin')}}/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="{{asset('template_admin')}}/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="{{asset('template_admin')}}/assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
   @yield('script_admin')

  </body>
</html>
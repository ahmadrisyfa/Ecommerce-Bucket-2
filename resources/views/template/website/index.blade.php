
<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Ecommerce Bucket - Ecommerce</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{asset('website')}}/images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{asset('website')}}/images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('website')}}/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{asset('website')}}/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('website')}}/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('website')}}/css/custom.css">

    <!--[if lt IE 9]>
      <script src="{{asset('website')}}/https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="{{asset('website')}}/https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>


    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    @if ($namaDanLogo = \App\Models\NamaDanLogo::first())  
                    @php
                      $namaDanLogo = \App\Models\NamaDanLogo::first()->get();
                    @endphp
                   @foreach ($namaDanLogo as $value)   
                   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('storage/'.$value->gambar)}}" style="width: 60px;margin-right:6px" class="logo" alt=""><b>{{$value->nama}}</b></a>                 
                    @endforeach
                    @else <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                        <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('website')}}/images/logo.png" style="width: 120px;margin-right:6px" class="logo" alt=""><b>Contoh</b></a>                    
                    @endif                   
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item"><a class="nav-link" href="{{url('/')}}">Home</a></li>
                        <li class="dropdown">
                            <a class="nav-link" href="#" data-toggle="dropdown"><i class="fa fa-angle-right mr-1"></i>Category</a>
                            @if ($Category = \App\Models\Category::get())  
                            @php
                              $Category = \App\Models\Category::get();
                            @endphp
                           <ul class="dropdown-menu" aria-labelledby="aboutDropdown">
                           @foreach ($Category as $value)                              
                               <li><a class="dropdown-item" href="{{url('category/'.$value->id.'/detail')}}">{{$value->nama}}</a></li>  
                            @endforeach
                            </ul>
                            @endif
                        </li>
                        <li class="dropdown">
                            <a class="nav-link" href="#" data-toggle="dropdown"><i class="fa fa-angle-right mr-1"></i>Size</a>
                            @if ($size = \App\Models\Size::get())  
                            @php
                              $size = \App\Models\Size::get();
                            @endphp
                           <ul class="dropdown-menu" aria-labelledby="aboutDropdown">
                            @foreach ($size as $value)                              
                               <li><a class="dropdown-item" href="{{url('size/'.$value->id.'/detail')}}">{{$value->nama}}</a></li>  
                            @endforeach
                            </ul>
                            @endif
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown"><i class="fa fa-angle-right mr-1"></i>Support</a>
                            @if ($support = \App\Models\support::get())  
                            @php
                              $support = \App\Models\support::get();
                            @endphp
                           <ul class="dropdown-menu" aria-labelledby="aboutDropdown">
                           @foreach ($support as $value)                              
                               <li><a class="dropdown-item" href="{{url('support/'.$value->id.'/detail')}}">{{Illuminate\Support\Str::of($value->judul)->words(10)}}</a></li>
                            @endforeach
                            </ul>
                            @endif
                        </li>                       
                        <li class="dropdown">
                            @auth
                            <a style="text-transform: capitalize" class="nav-link dropdown-toggle" href="#" id="aboutDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-user"></i>  {{auth()->user()->name}}
                            </a>
                             @else
                                <a class="nav-link dropdown-toggle" href="#" id="aboutDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                                  <i class="fa fa-user"></i> Akun Saya
                                  </a>
                            @endauth
                            <ul class="dropdown-menu" aria-labelledby="aboutDropdown">
                                @auth
                                <li><a class="dropdown-item" href="#">Profile</a></li>  
                                <li><a class="dropdown-item" href="{{url('riwayat-transaksi')}}">Riwayat Transaksi</a></li>    

                                @if (auth()->user()->admin == 1)
                                <li><a class="dropdown-item" href="{{url('admin/dashboard')}}">Website Admin</a></li>    
                                @endif                              
                                <form action="{{url('logout')}}" method="Post">
                                    @csrf
                                    <li><button type="submit" class="dropdown-item">Log Out</button></li>   
                                </form>                                    
                                @else                                
                                <li><a class="dropdown-item" href="{{url('login')}}">Login</a></li>                               
                                @endauth
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        @auth                            
                        @php
                        $hitungcart = \App\Models\Cart::where('user_id',auth()->user()->id)->count();
                        @endphp
                        <li class="side-menu"><a href="{{url('/cart')}}">
						<i class="fa fa-shopping-bag"></i>
                            <span class="badge">{{$hitungcart}}</span></a>
                        </li>
                        @else
                        <li class="side-menu"><a href="{{url('/cart')}}">
                            <i class="fa fa-shopping-bag"></i>
                                <span class="badge">0</span></a>
                            </li>
                        @endif
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>            
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->
   

   @yield('content_website')

  


    <footer>
        <div class="footer-main" style="background-color:#4c4545">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link" >
                            <h4 style="color:white;font-weight:bold">About ThewayShop</h4>
                            <p style="color:white;font-weight:bold">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link">
                            <h4 style="color:white;font-weight:bold">Information</h4>
                            <ul>
                                <li style="color:white;font-weight:bold">About Us</li>
                                <li style="color:white;font-weight:bold">Customer Service</li>
                                <li style="color:white;font-weight:bold">Our Sitemap</li>
                                <li style="color:white;font-weight:bold">Terms &amp; Conditions</li>
                                <li style="color:white;font-weight:bold">Privacy Policy</li>
                                <li style="color:white;font-weight:bold">Delivery Information</li>
                            </ul>
                        </div>
                    </div>

                    
                    @if ($ContactWebsite = \App\Models\ContactWebsite::first())  
                    @php
                      $ContactWebsite = \App\Models\ContactWebsite::first()->get();
                    @endphp
                   @foreach ($ContactWebsite as $value)   
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link" style="color:white;font-weight:bold">
                            <h4 style="color:white;font-weight:bold">Contact Us</h4>
                            <ul>
                                <li>
                                    <p><i class="fas fa-map-marker-alt"></i> Address: {{$value->alamat}}</p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone-square"></i> Phone: {{$value->no_telp1}}@if($value->no_telp2) & {{$value->no_telp2}} @endif</p>
                                </li>
                                <li>
                                    <p><i class="fas fa-envelope"></i> Email: {{$value->email}}</p>
                                </li>
                            </ul>
                        </div>
                    </div>                                         
                    @endforeach
                    @else
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link" style="color:white;font-weight:bold">
                            <h4 style="color:white;font-weight:bold">Contact Us</h4>
                            <ul>
                                <li>
                                    <p><i class="fas fa-map-marker-alt"></i> Address: Michael I. Days 3756 <br>Preston Street Wichita,<br> KS 67213 </p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone-square"></i> Phone: +1-888 705 770</p>
                                </li>
                                <li>
                                    <p><i class="fas fa-envelope"></i> Email: contactinfo@gmail.com </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @endif


                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->

    <!-- Start copyright  -->
    @if ($namaDanLogo = \App\Models\NamaDanLogo::first())  
    @php
      $namaDanLogo = \App\Models\NamaDanLogo::first()->get();
    @endphp
   @foreach ($namaDanLogo as $value)                      
   <div class="footer-copyright" style="background-color:#747171">
    <p class="footer-company">All Rights Reserved. &copy; {{date('Y')}} <a href="#">{{$value->nama}}</a> Design By :
        <a href="{{url('/')}}">{{$value->nama}}</a></p>
    </div>
    @endforeach
    @else     
      <div class="footer-copyright" style="background-color:#747171">
          <p class="footer-company">All Rights Reserved. &copy; {{date('Y')}} <a href="#">ThewayShop</a> Design By :
              <a href="{{url('/')}}">html design</a></p>
      </div>
    @endif
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="{{asset('website')}}/js/jquery-3.2.1.min.js"></script>
    <script src="{{asset('website')}}/js/popper.min.js"></script>
    <script src="{{asset('website')}}/js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="{{asset('website')}}/js/jquery.superslides.min.js"></script>
    <script src="{{asset('website')}}/js/bootstrap-select.js"></script>
    <script src="{{asset('website')}}/js/inewsticker.js"></script>
    <script src="{{asset('website')}}/js/bootsnav.js."></script>
    <script src="{{asset('website')}}/js/images-loded.min.js"></script>
    <script src="{{asset('website')}}/js/isotope.min.js"></script>
    <script src="{{asset('website')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('website')}}/js/baguetteBox.min.js"></script>
    <script src="{{asset('website')}}/js/form-validator.min.js"></script>
    <script src="{{asset('website')}}/js/contact-form-script.js"></script>
    <script src="{{asset('website')}}/js/custom.js"></script>
</body>

</html>
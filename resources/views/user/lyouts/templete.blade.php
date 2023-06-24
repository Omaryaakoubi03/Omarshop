<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Omar Shop</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.min.css')}}">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/style.css')}}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{asset('home/css/responsive.css')}}">
    <!-- fevicon -->
    <link rel="icon" href="{{asset('home/images/fevicon.png')}}" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{asset('home/')}}css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">

    <!-- font awesome -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--  -->
    <!-- owl stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('home/css/owl.carousel.min.css')}}">
    <link rel="stylesoeet" href="{{asset('home/css/owl.theme.default.min.cs')}}s">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
</head>
<body>
<!-- banner bg main start -->
<div class="banner_bg_main">
    <!-- header top section start -->
    <div class="container">
        <div class="header_section_top ">
            <div class="row">
                <div class="col-sm-12">
                    <div class="custom_menu">
                        <ul>
                            <li><a href="http://127.0.0.1:8000/">Home</a></li>
                            <li><a href="{{route('newrelease')}}">Track Order</a></li>
                            <li><a href="{{route('todaysdeal')}}">Cantact me</a></li>
                            <li><a href="{{route('customservice')}}">Customer Service</a></li>
                            @guest
                                <li >
                                    <a href="{{ route('login') }}">Login</a>
                                </li>
                                <li >
                                    <a href="{{ route('register') }}">Signup</a>
                                </li>
                            @else
                                <li class="dropdown downlogin" >
                                    <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu downlogin" aria-labelledby="navbarDropdown" >
                                        <a class="dropdown-item" href="{{route('userprofile')}}">Profile</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header top section start -->
    <!-- logo section start -->
    <div class="logo_section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="logo"><a href="{{route('home')}}" class="fashion_taital" style="font-size: 25px ;color: white">OBA Shop</a></div>
                </div>
            </div>
        </div>
    </div>
    <!-- logo section end -->
    <!-- header section start -->
    <div class="header_section">
        <div class="container">
            <div class="containt_main">
                <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

                    @php
                    $categories=App\Models\Category::latest()->get();
                    @endphp
                    @foreach( $categories as $categorie)
                        <a href="{{route('categorypage',[$categorie->id,$categorie->slug])}}">{{$categorie->category_name}}</a>
                    @endforeach


                </div>
                <span class="toggle_icon" onclick="openNav()"><img class="nvicon" src="{{asset('home/images/toggle-icon.png')}}"></span>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Category
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @foreach( $categories as $categorie)
                            <a class="dropdown-item" href="{{route('categorypage',[$categorie->id,$categorie->slug])}}">{{$categorie->category_name}}</a>

                        @endforeach

                    </div>
                </div>
                <div class="main">
                    <!-- Another variation with a button -->
                        <form class="input-group" action="{{ route('home') }}" method="GET">
                            @csrf


                        <input type="text" class="form-control" name="serch" placeholder="Search this blog">
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="submit" style="background-color: #f26522; border-color:#f26522 ">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                        </form>

                </div>
                <div class="header_box">
                    <div class="lang_box ">
                        <a href="#" title="Language" class="nav-link" data-toggle="dropdown" aria-expanded="true">
                            <img src="{{asset('home/images/flag-uk.png')}}" alt="flag" class="mr-2 " title="United Kingdom"> English <i class="fa fa-angle-down ml-2" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu ">
                            <a href="#" class="dropdown-item">
                                <img src="{{asset('home/images/flag-france.png')}}" class="mr-2" alt="flag">
                                French
                            </a>
                        </div>
                    </div>
                    <div class="login_menu">
                        <ul>
                            @php
                                $total=\App\Models\Cart::count();

                            @endphp
                            <li><a href="{{route('addtocart')}}">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span class="padding_10">Cart ({{$total}})</span></a>
                            </li>
                            <li><a href="{{route('userprofile')}}">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <span class="padding_10">Profile</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header section end -->
    <!-- banner section start -->


    <!-- banner section end -->
</div>
<!-- banner bg main end -->

<!-- commn part sstart -->
<div class="containerc py-5" style="margin-top:200px">
    @yield('main-content')
</div>


<!-- comon part end --><!-- footer section start -->
<div class="footer_section layout_padding">
    <div class="container">
        <div class="footer_logo"><a href="index.html" class="fashion_taital" style="font-size: 25px ;color: black">OBA Shop</a></div>
        <div class="input_bt">
            <input type="text" class="mail_bt" placeholder="Your Email" name="Your Email">
            <span class="subscribe_bt" id="basic-addon2"><a href="#">Subscribe</a></span>
        </div>
        <div class="footer_menu">
            <ul>
                <li><a href="{{route('home')}}">Home</a></li>
                <li><a href="{{route('newrelease')}}">Track Order</a></li>
                <li><a href="{{route('todaysdeal')}}">Cantact me</a></li>
                <li><a href="{{route('customservice')}}">Customer Service</a></li>
            </ul>
        </div>
        <div class="location_main">Help Line  Number : <a href="#">+212 669285915</a></div>
    </div>
</div>

<!-- footer section end -->
<!-- copyright section start -->

<!-- copyright section end -->
<!-- Javascript files-->
<script src="{{asset('home/js/jquery.min.js')}}"></script>
<script src="{{asset('home/js/popper.min.js')}}"></script>
<script src="{{asset('home/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('home/js/jquery-3.0.0.min.js')}}"></script>
<script src="{{asset('home/js/plugin.js')}}"></script>
<!-- sidebar -->
<script src="{{asset('home/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('home/js/custom.js')}}"></script>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>
</body>
</html>

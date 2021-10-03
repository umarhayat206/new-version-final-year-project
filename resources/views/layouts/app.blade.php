<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    @yield('css')


</head>
<style>
    /* .navbar ul li a 
{
    color: white;
}

.navbar-brand:hover
{ color:white;
    font-family: "Playfair Display", serif;
} */
    .navbar-brand {
        color: white;
        font-family: "Playfair Display", serif;
    }

    /* home page css */
    .banner {
        -webkit-background-size: cover;
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        height: 100vh;
    }

    .banner3 {
        -webkit-background-size: cover;
        background-size: cover;
        /* background-position: center center; */
        background-repeat: no-repeat;
        height: 100vh;
    }

    .carousel-caption {
        padding-bottom: 180px;
        font-family: poppins;
    }

    .carousel-caption h2 {
        font-size: 70px;
        text-transform: uppercase;
        font-weight: bold;
    }

    .carousel-caption h2 span {
        color: #343a40 !important;
    }

    .carousel-caption a {
        background: #343a40 !important;
        padding: 15px 35px;
        display: inline-block;
        margin-top: 15px;
        color: #fff;
        text-transform: uppercase;
        border-radius: 25px;
    }

    .carousel-control.right {
        background-image: none;
    }

    .carousel-control.left {
        background-image: none;
    }

    .carousel-indicators .active {
        background-color: #343a40 !important;

    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .carousel-caption {
            padding-bottom: 180px;
        }

        .carousel-caption h2 {
            font-size: 50px;
        }
    }

    @media only screen and (max-width: 767px) {

        .carousel-caption {
            padding-bottom: 170px;
        }

        .carousel-caption h2 {
            font-size: 25px;
        }

        .carousel-caption h3 {
            font-size: 18px;
        }

        .carousel-caption a {
            padding: 10px 25px;
        }
    }

    .after-slider-h1 {
        font-family: poppins;
        color: #343a40 !important;
        font-weight: bold;
    }

    #services-div {
        overflow: hidden;
        border-bottom-color: rgb(255, 209, 175);
        border-bottom-style: solid;
        border-bottom-width: 1px;

        border-left-color: rgb(255, 209, 175);
        border-left-style: solid;
        border-left-width: 1px;
        border-right-color: rgb(255, 209, 175);
        border-right-style: solid;
        border-right-width: 1px;
        border-top-color: rgb(33, 37, 41);
        border-top-style: none;
        border-top-width: 0px;
        margin-bottom: 20px;
    }

    #about-us-h1 {
        font-family: "Playfair Display", serif;
        font-weight: 550;
    }

    #about-us-p {
        font-size: 16px;
        line-height: 32px;
        color: #7f7f7f;
        font-weight: 400;
    }

    /* home page css end here */
    #contcatus-detail {
        margin-top: -20px;
        padding: px;
    }

    .contactus-div1 {
        margin-top: -40px;
        height: 200px;
        background-color: white;

    }

    #contactus-detail-div {
        height: 130px;
        background-color: white;
        margin-bottom: 20px;
    }

    #contactus-detail-p {
        font-size: 16px;
        padding: 20px;
    }

    #contactus-input-div {
        height: auto;
        background-color: white;
        padding: 50px;
        margin-bottom: 20px;
    }

    #contactus-input {
        height: 50px;
        border-radius: 0px;
    }

    .dbox {
        width: 100%;
        margin-bottom: 25px;
        padding: 0 20px;
    }

    @media (min-width: 768px) {
        .dbox {
            margin-bottom: 0;
            padding: 0;
        }
    }

    .dbox p {
        margin-bottom: 0;
    }

    .dbox p span {
        font-weight: 500;
        color: #000;
    }

    .dbox p a {
        color: #2553b8;
    }

    .dbox .icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: #343a40;
        margin: 0 auto;
        margin-bottom: 20px;
    }

    .dbox .icon span {
        font-size: 20px;
        color: #fff;
    }

    .dbox .text {
        width: 100%;
    }

    #map {
        width: 100%;
    }

    @media (max-width: 767.98px) {
        #map {
            height: 300px;
        }
    }

    #div-footer {
        width: 100%;
        height: auto;
        /* background-color:rgb(33, 37, 41); */
        background-color: #343a40 !important;
        color: white;
        padding: 50px;
        margin-top: -53px;

    }

    #h1-footer-1 {
        font-family: "Playfair Display", serif;
    }

    #ul-footer {
        list-style-type: none;
        margin: 0px;
        padding: 0px;
        overflow: hidden;
        line-height: 35px;
    }

    #ul-footer li a {
        color: white;
        text-decoration: none;
    }

    #logo_img-footer {
        height: 70px;
        width: 230px;

    }

    #footer-border {
        border-top: 1px solid rgba(255, 255, 255, 0.2);
        padding-bottom: 20px;
    }

</style>

<body>
    @include('sweetalert::alert')
    <script>
        AOS.init();
      </script>
    <div id="app">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                    <b>E-VOTE</b>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contactus') }}">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('aboutus') }}">About Us</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('contactus') }}">About Us</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('public.notifications') }}">Notifications</a>
                        </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest

                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                            @if (Auth::user()->hasRole('voter'))
                            <li class="nav-item">
                                {{-- <a class="nav-link" href="{{ route('castvote') }}">Cast Vote</a> --}}
                                <a class="nav-link" 
                                    style="cursor: pointer;" href="{{route('results.index')}}">Results</a>

                            </li>
                                <li class="nav-item">
                                    {{-- <a class="nav-link" href="{{ route('castvote') }}">Cast Vote</a> --}}
                                    <a class="nav-link" onclick="castVote({{ Auth::user()->id }})"
                                        style="cursor: pointer;">Cast Vote</a>

                                </li>
                            @endif
                            @if (Auth::user()->hasRole('super-admin|admin'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if (Auth::user()->hasRole('voter'))
                                    <a class="dropdown-item" href="{{ route('profile') }}">
                                        Profile
                                    </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <div id="div-footer">
        <div class="container">

            <div>
                <div class="row">
                    <div class="col-lg-3">
                        <div style="height:200px;border-bottom:20px;">
                            <h1 id="h1-footer-1"><b>E-VOTE</b></h1>
                            <p style="font-size:14px;">
                                Lorem ipsum dolor sit amet, consectetur<br> adipiscing eliteiusmod tempor incididunt<br>
                                ut labore et dolore.
                            </p><br />
                            <i class="fab fa-facebook" style="font-size:28px"></i>
                            <i class="fab fa-twitter" style="font-size:28px"></i>
                            <i class="fab fa-instagram" style="font-size:28px"></i>



                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div style="height:200px;border-bottom: 20px;">
                            <h3 id=""><b>Menu</b></h3>
                            <ul id="ul-footer">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="aboutus.html">About Us</a></li>
                                <li><a href="contactus.html">Contact us</a></li>
                                <li><a href="login.html">Log In</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div style="height:200px">
                            <h3 id=""><b>Help</b></h3>
                            <ul id="ul-footer">

                                <li><a href="#">Term & Condition</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Faqs</a></li>
                                <li><a href="#">Contact</a></li>

                            </ul>

                        </div>
                    </div>


                    <div class="col-lg-3">
                        <div style="height:200px">
                            <h4 id=""><b>Have a Questions?</b></h4><br />
                            <span class="glyphicon glyphicon-map-marker"> </span>
                            <div style="transform:translate(35px,-20px)">
                                <p style="font-size:14px;">203 Fake St. Mountain <br />View, San Francisco,
                                    <br />California, USA
                                </p>
                            </div>

                            <div style="transform:translateY(-20px)">
                                <a href="#" style="color:white;text-decoration:none;"><span
                                        class="glyphicon glyphicon-earphone ear2"></span>
                                    <div style="transform:translate(35px,-20px)">
                                        <p style="font-size:14px;">+2 392 3929 210</p>
                                    </div>
                                </a>
                            </div>

                            <div style="transform:translateY(-30px)">
                                <a href="#" style="color:white;text-decoration:none;"><span class="fab fa-envelope">
                                    </span>
                                    <div style="transform:translate(35px,-20px)">
                                        <p style="font-size:14px;">info@yourdomain.com</p>
                                    </div>
                                </a>
                            </div>


                        </div>
                    </div>

                </div>
            </div> <br><br>
            <div id="footer-border"></div><br>
            <div>
                <center><span>Copyright ©2019 All rights reserved </span></center>

            </div>
        </div>
    </div>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    @stack('js')
    <script>
        function castVote() {
            $.ajax({
                type: "get",
                url: "{{ route('castvote') }}",
                success: function(response) {

                    if (response.status == 0) {
                        swal(response.msg, {
                            icon: "warning",
                        })

                    } else {
                        console.log('from else block');
                        window.location = "{{ route('castvote') }}"


                    }

                }

            })
        }
    </script>
    
</body>

</html>

@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('animate.css') }}">
@endsection
@section('content')
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin-top:-25px;">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="banner" style="background-image: url(vote3.png);"></div>
                <div class="carousel-caption">
                    <h2 class="animate__animated animate__bounceInRight" style="animation-delay: 1s">Online voting system
                    </h2>
                    <h3 class="animate__animated animate__bounceInLeft" style="animation-delay: 2s">Highly Secured Tools and
                        Platform</h3>
                    <p class="animate__animated animate__bounceInRight" style="animation-delay: 3s"><a href="#">Read
                            More</a></p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="banner3" style="background-image: url(vote2.png);"></div>
                <div class="carousel-caption">
                    <h2 class="animate__animated animate__slideInDown" style="animation-delay: 1s"><span>Latest Technology
                        </span></h2>
                    <h3 class="animate__animated animate__fadeInUp" style="animation-delay: 2s;color:#343a40 !important">A
                        lot of reports with filters and export features</h3>
                    <p class="animate__animated animate__zoomIn" style="animation-delay: 3s"><a href="#">Contact us</a></p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="banner" style="background-image: url(vote1.png);"></div>
                <div class="carousel-caption">
                    <h2 class="animate__animated animate__zoomIn" style="animation-delay: 1s">We Are <span>Diligent</span>
                    </h2>
                    <h3 class="animate__animated animate__fadeInLeft" style="animation-delay: 2s">Web Design and Development
                        Agency</h3>
                    <p class="animate__animated animate__zoomIn" style="animation-delay: 3s"><a href="#">Contact us</a></p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div><br><br><br>


    <div class="container">
        <h1 class="text-center after-slider-h1">Welcome to online voting system</h1><br><br>
        <div class="row">
            <div class="col-lg-4 col-md-4" data-aos="fade-up">

                <div id="services-div">
                    <img src="after2.png" height="250px" width="100%"><br><br>
                    <h2 id="about-us-h1" class="text-center">Online Voting</h2>
                    <p id="about-us-p" class="text-center">
                        Lorem ipsum dolor sit amet,<br> consectetur adipisicing elit, sed<br> do eiusmod tempor incididunt
                        ut
                    </p><br><br>
                </div>

            </div>
            <div class="col-lg-4 col-md-4" data-aos="fade-up" data-aos-delay="300">

                <div id="services-div">
                    <img src="after1.png" height="250px" width="100%"><br><br>
                    <h2 id="about-us-h1" class="text-center">Candidate Managment</h2>
                    <p id="about-us-p" class="text-center">
                        Lorem ipsum dolor sit amet,<br> consectetur adipisicing elit, sed<br> do eiusmod tempor incididunt
                        ut
                    </p><br><br>
                </div>

            </div>
            <div class="col-lg-4 col-md-4" data-aos="fade-up" data-aos-delay="600">

                <div id="services-div">
                    <img src="after3.jpg" height="250px" width="100%"><br><br>
                    <h2 id="about-us-h1" class="text-center">Voter Managment</h2>
                    <p id="about-us-p" class="text-center">
                        Lorem ipsum dolor sit amet,<br> consectetur adipisicing elit, sed<br> do eiusmod tempor incididunt
                        ut
                    </p><br><br>
                </div>

            </div>
        </div><br><br>
        <h1 class="text-center after-slider-h1">About Us</h1><br><br>
        <div class="row">
          
            <div class="col-xl-6 col-md-6 col-sm-6" data-aos="fade-right">
                <div>
                    <img src="login.jpg" width="98%" height="500px">
                </div>
            </div>
            <div class="col-xl-6 col-md-6 col-sm-6" data-aos="fade-left">
                <div>
                    <p id="about-us-p">
                        Lorem ipsum dolor sit amet, consectetur adipiscing eliteiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Qpsum suspendisse ultrices gravida. Risus commodo viverra
                        maecenas accumsan lacus vel facilisis. Quis ipsum suspendisse ultr.Risus commodo viverra maecenas
                        accumsan lacus vel facilisis. Quis ipsum suspendisse ultr.Risus commodo viverra maecenas accumsan
                        lacus
                        vel facilisis. Quis ipsum suspendisse ultr.Risus commodo viverra maecenas accumsan lacus vel
                        facilisis.
                        Quis ipsum suspendisse ultr. Lorem ipsum dolor sit amet, consectetur adipiscing eliteiusmod tempor
                        incididunt ut
                        labore et dolore magna aliqua. Qpsum suspendisse ultrices gravida. Risus commodo viverra
                        maecenas accumsan lacus vel facilisis. Quis ipsum suspendisse ultr.Risus commodo viverra maecenas
                        accumsan lacus vel facilisis. Qpsum suspendisse ultrices gravida. Risus commodo viverra
                        maecenas accumsan lacus vel facilisis. Quis ipsum suspendisse ultr.Risus commodo viverra maecenas
                        accumsan lacus vel facilisis.

                    </p>

                </div>
            </div>
        </div><br><br>

    </div>

    <br><br>
@endsection

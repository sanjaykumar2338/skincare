
@extends('layouts.homepage')
@section('content')

    <!-- ========== Start banner-section ========== -->
    <section class="banner">
        <div class="container">
            <h2 class="heading-style"> about us </h2>
        </div>
    </section>
    <!-- ========== End banner-section ========== -->

    <!-- ========== Start about us ========== -->
    <section class="about-us">
        <div class="container">
            <div class="row ">
                <div class="col-lg-6 col-md-12 ">
                    <div id="carouselExampleone" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{url('/asset/frontend/images/s-.jpg')}}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{url('/asset/frontend/images/c-3.jpg')}}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{url('/asset/frontend/images/s-2.jpg')}}" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleone"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleone"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="right-text">
                        <h3>Skin Care Specialist</h3>
                        <li>block and wihit head removal </li>
                        <li>herbal deep pealing</li>
                        <li>anto aging facelifit treatment</li>
                        <li>acne tratment</li>
                        <li>microdemabraion pealing</li>
                        <li>ultrasound facial</li>
                        <li>skin toa removal</li>
                        <a href="tel:+15164458035"><button class="btn-style"> contact now</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>    
@stop

       
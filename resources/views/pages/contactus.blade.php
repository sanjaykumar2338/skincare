@extends('layouts.homepage')
  @section('content')
    <!-- header close  -->
    @if (Session::has('message'))
       <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
        
    <!-- ========== Start banner-section ========== -->
    <section class="contact-banner">
        <div class="container">
            <h3>Contact Us</h3>
        </div>
    </section>
    <!-- ========== End banner-section ========== -->

    <!-- ========== Start form-section ========== -->
    <section class="form-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12 ">
                    <div class="img-style">
                        <div class="set">
                            <div class="icon">
                                <i class="fa-solid fa-calendar-days"></i>
                            </div>
                            <div class="text">
                                <h4>BOOK YOUR SLOT</h4>
                                <p>&nbsp;</p>
                            </div>
                        </div>

                    </div>


                    <!-- number  -->
                    <div class="contact-d">
                        <h3>skincare center</h3>
                        <li>
                            <i class="fa-solid fa-phone"></i>
                            <span>+15164458035</span>

                        </li>

                        <li>
                            <i class="fa-solid fa-location-dot"></i>
                            <span>P9Q6+9W Garden City, New York, USA</span>

                        </li>

                        <li>
                            <i class="fa-solid fa-envelope"></i>
                            <span>info@skincaregardencity.com

                            </span>

                        </li>

                    </div>

                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 col-12  s-padding">
                    <form action="{{url('/contact-us-save')}}" method="post" name="contactus">
                        @csrf
                        <span>REACH US</span>
                        <h3>CONTACT FORM </h3>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae excepturi quas in
                            consequuntur aliquid?</p>

                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" placeholder="Your name" required name="name">
                            </div>

                            <div class="col-md-12">
                                <input type="tel" placeholder="mobile number" required name="contact_number">
                            </div>

                            <div class="col-md-12">
                                <input type="text" placeholder="email address" required name="email">
                            </div>

                            <div class="col-md-12">
                                <input type="text" placeholder="message" required name="message">
                            </div>

                            <button class="btn-style"> submit</button>
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </section>

    <!-- ========== End form-section ========== -->

    <!-- ========== Start map ========== -->
    <section class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d24765012.226797476!2d-115.8252389!3d40.738424!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c27d5bba560555%3A0xd51faf176955486a!2sSkin%20Care%20Garden%20City!5e0!3m2!1sen!2sin!4v1688545693892!5m2!1sen!2sin"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>

    </section>
    <!-- ========== End map ========== -->
@stop
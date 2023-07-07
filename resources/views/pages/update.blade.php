@extends('layouts.homepage')
  @section('content')
    <!-- header close  -->
    @if (Session::has('message'))
       <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
        
<!-- ========== Start banner-up ========== -->
<section class="updates-banner">
        <div class="container">
            <h2>new updates</h2>

        </div>
    </section>
    <!-- ========== End banner-up ========== -->

    <!-- ========== Start text-all ========== -->
    <section class="text-all">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="text-style">
                        <h4>
                            <li>If you looking for just fancy place don't come to us</li>
                        </h4>
                        <p>If you looking for just fancy place don't come to us, but if you want good service, deep cleaning facial , remove black and white heads, pealing and lifting treatments WELCOME, you will be happy!
                        </p>
                        <h4>
                            <li>My Dear Customers,
                        </li>
                        </h4>
                        <p>My Dear Customers,
Thank you very much for supporting me!
I love you very much and i wish to all of you Joy, Peace and a lot of Happiness in the New Year.
Happy New Year,
Tanya.
                        </p>
                        <h4>
                            <li>Open by appointment all week</li>
                        </h4>                        
                        <p>Open by appointment all week
                        </p>
                        <h4>
                            <li>I would like to thank all my customers for their support in this difficult time.</li>
                        </h4>
                        
                        <p>I would like to thank all my customers for their support in this difficult time.  I hope everyone remains well and safe. Hope to see you  soon.  
                        </p>

                        <h4>
                            <li>The Perfect Eyebrow Shape!</li>
                        </h4>
                        
                        <p>Take care of your look... Keep your eyebrows clean and shapely.
                            Call for Appointment! 
                        </p>

                        <h4>
                            <li>Skin Therapy & Treatment!</li>
                        </h4>
                        
                        <p>The best treatment that is more than skin deep. Keep your skin happy. Call of Appointment!

                        </p>

                        <h4>
                            <li>Get a Facial Now!</li>
                        </h4>
                        
                        <p>Rejuvenate your face with an amazing cleaning treatment
                        Call for Appointment!
                        </p>

                    </div>

                </div>

            </div>

        </div>
    </section>
    <!-- ========== End text-all ========== -->
@stop
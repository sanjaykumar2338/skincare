
@extends('layouts.homepage')
@section('content')

    <!-- ========== Start banner-section ========== -->
    <section class="gallery-banner">
        <div class="container">
            <h2> GALLERY</h2>
        </div>
        </div>
    </section>
    
    <!-- ========== Start gallery-pic ========== -->
    <section class="gallery-pic">
        <div class="container">
            <h2 class="heading-style">Latest Gallery</h2>
            <div class="row">
              @foreach(File::glob(public_path('asset/frontend/more_images').'/*') as $path)    
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="img-box">
                        <img src="{{ str_replace(public_path(), '', $path) }}" alt="">
                        <div class="overlay">
                            <i class="fa-solid fa-magnifying-glass-plus" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#onestaticBackdrop"></i>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="onestaticBackdrop" data-bs-backdrop="onestatic"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="onestaticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                    <div class="modal-body">
                                        <img src="{{ str_replace(public_path(), '', $path) }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              @endforeach
            </div>
        </div>
    </section>

    <!-- ========== End gallery-pic ========== -->  
@stop

       
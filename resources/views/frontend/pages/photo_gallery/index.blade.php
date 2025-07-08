@extends('frontend.layouts.app')

@section('page.title', 'Photo Gallery')

@section('page.description',
    'Check out for photo gallery.')

@section('page.type', 'website')

@section('page.content')

    <!----------========== Photo gallery start ===============-------------------->
    <section class="sm-at banner1">
        <img class="inner-banner-image" src="assets/frontend/images/Photo-Gallery-1.jpg"/>
        <div class="container mt235">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrums_section paddtb80">
                        <h1 class="sm-aboutus color-white1">Photo Gallery</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ url(route('index')) }}">Home</a></li>
                                <li class="breadcrumb-item"><a>»</a></li>
                                <li class="breadcrumb-item"><a><b>Photo Gallery</b></a></li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </section>



    <section class="photo_gallery pt-lg-5 pb-lg-5 pt-4 pb-4">
        <div class="container">
            <h3 class="heading_title text-center pddtop_0 pb-3 ">Online Training</h3>
            <div class="row">
                <div class="col-md-3 col-6 p-1 content_one">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/vmvare_gllaery11.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/vmvare_gllaery11.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-6 p-1 content_one">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/vmvare_gllaery22.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/vmvare_gllaery22.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-6 p-1 content_one">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/vmvare_gllaery33.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/vmvare_gllaery33.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-6 p-1 content_one">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/aws_gallery11.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/aws_gallery11.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-6 p-1 content_one">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/aws_gallery22.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/aws_gallery22.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-6 p-1 content_one">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/aws_gallery33.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/aws_gallery33.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-6 p-1 content_one">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/azure_gllaery11.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/azure_gllaery11.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-6 p-1 content_one">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/azure_gllaery22.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/azure_gllaery22.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-6 p-1 content_one">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/azure_gllaery33.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/azure_gllaery33.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-6 p-1 content_one">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/mcse_gllaery11.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/mcse_gllaery11.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-6 p-1 content_one">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/mcse_gllaery22.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/mcse_gllaery22.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-6 p-1 content_one">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/mcse_gllaery33.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/mcse_gllaery33.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>

                <div class="col-md-12 p-1 text-center">
                    <a href="#" class="loadmore_button linked_bttn" id="loadMore_one">Load More</a>
                </div>

                <div class="col-md-12 p-1 text-center">
                <button type="button" onclick="formModal('{{ url(route('component.form')) }}?section=Photo Gallery - Online Training Section&title=Book a FREE Demo&current_page={{ urlencode(url()->current()) }}')" 
                     class="btn booka_demo_button"> Book a FREE Demo </button>
                </div>

            </div>
        </div>
    </section>


    <section class="photo_gallery pt-lg-5 pb-lg-5 pt-4 pb-4 gray_bg1 classroom_tr">
        <div class="container">
            <h3 class="heading_title text-center pddtop_0 pb-3 ">Classroom Training</h3>
            <div class="row">
                <div class="col-md-3 col-6 p-1 content_two">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/2-1.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/2-1.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-6 p-1 content_two">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/3-2.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/3-2.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-6 p-1 content_two">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/4-1.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/4-1.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-6 p-1 content_two">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/5-1.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/5-1.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-6 p-1 content_two">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/6-2.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/6-2.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-6 p-1 content_two">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/7-1.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/7-1.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-6 p-1 content_two">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/8-2.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/8-2.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-6 p-1 content_two">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/9-1.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/9-1.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-6 p-1 content_two">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/10-1.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/10-1.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-6 p-1 content_two">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/11.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/11.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-6 p-1 content_two">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/12.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/12.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-6 p-1 content_two">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/13.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/13.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-6 p-1 content_two">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/14.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/14.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-6 p-1 content_two">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/15.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/15.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-6 p-1 content_two">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/16-1.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/16-1.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-6 p-1 content_two">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/img-17.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/img-17.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-6 p-1 content_two">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/img-18.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/img-18.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-6 p-1 content_two">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/img-19.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/img-19.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-6 p-1 content_two">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/img-20.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/img-20.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-6 p-1 content_two">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/img-21.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/img-21.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-6 p-1 content_two">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/img-22.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/img-22.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-6 p-1 content_two">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/img-23.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/img-23.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-6 p-1 content_two">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/img-24.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/img-24.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-6 p-1 content_two">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/img-25.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/img-25.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-6 p-1 content_two">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/img-26.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/img-26.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-6 p-1 content_two">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/img-27.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/img-27.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-6 p-1 content_two">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/img-28.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/img-28.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-6 p-1 content_two">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/img-29.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/img-29.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-6 p-1 content_two">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/img-30.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/img-30.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-6 p-1 content_two">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/img-31.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/img-31.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-6 p-1 content_two">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/img-32.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/img-32.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-6 p-1 content_two">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/img-33.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/img-33.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-6 p-1 content_two">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/img-34.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/img-34.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-6 p-1 content_two">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/img-35.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/img-35.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-6 p-1 content_two">
                    <div class="gallery_box">
                        <a href="/assets/frontend/images/img-36.jpg" data-fancybox="gallery">
                            <img src="/assets/frontend/images/img-36.jpg" class="img-fluid d-block w-100 lazyload" alt>
                        </a>
                    </div>
                </div>



                <div class="col-md-12 p-1 text-center">
                    <a href="#" class="loadmore_button linked_bttn" id="loadMore_two">Load More</a>
                </div>

                <div class="col-md-12 p-1 text-center">
                <button type="button" onclick="formModal('{{ url(route('component.form')) }}?section=Photo Gallery - Classroom Training Section&title=Book a FREE Demo&current_page={{ urlencode(url()->current()) }}')" 
                     class="btn booka_demo_button"> Book a FREE Demo </button>
                </div>

            </div>
        </div>
    </section>

    <!-------------=============== Photo gallery end =============== -------------------->

@endsection

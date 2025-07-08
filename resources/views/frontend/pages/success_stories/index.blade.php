@extends('frontend.layouts.app')

@section('page.title', 'Success Stories')

@section('page.description', 'Check out the Attari Classes success stories.')

@section('page.type', 'website')

@section('page.content')

    <!----------========== success story start ===============-------------------->

    <section class="">
        <img class="inner-banner-image" src="assets/frontend/images/Success.jpg"/>
        <div class="container mt235">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrums_section paddtb80">
                        <h1 class="sm-aboutus color-white1">Success Stories</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ url(route('index')) }}">Home</a></li>
                                <li class="breadcrumb-item"><a>»</a></li>
                                <li class="breadcrumb-item"><a><b>Success Stories</b></a></li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="succes_story_page images_container pt-lg-5 pb-lg-5 pt-4 pb-4">
        <div class="container">
        <div class="row"> 
        
        <div class="col-md-8 col-12 widths70">
            <div class="row" id="image-container">
                <!-- Images will be appended here -->
            </div>
            <div id="success_stories_loading" style="display: none; text-align: center;">
                <div class="success-stories-spinner"></div>
            </div> 
            <div class="loadmore_button1">
                <a href="javascript:void(0)" id="load-more-btn" style="display: none;">Load More</a> <!-- Load More Button for mobile -->
            </div> 
        </div>
    
            {{--<div class="col-md-8 col-12 widths70">
			<div class="row">
			    

			    <div class="col-md-4 images content_loadmore">
                    <a href="/assets/frontend/images/succes_stroy_sep_112.jpg" data-fancybox="gallery">
                        <img src="/assets/frontend/images/succes_stroy_sep_112.jpg" data-src="/assets/frontend/images/succes_stroy_sep_112.jpg" />
                    </a>
                </div>
                  <div class="col-md-4 images content_loadmore">
                    <a href="/assets/frontend/images/succes_stroy_sep_21.jpg" data-fancybox="gallery">
                        <img src="/assets/frontend/images/succes_stroy_sep_21.jpg" data-src="/assets/frontend/images/succes_stroy_sep_21.jpg" />
                    </a>
                </div>
                <div class="col-md-4 images content_loadmore">
                    <a href="/assets/frontend/images/succes_stroy_sep_20.jpg" data-fancybox="gallery">
                        <img src="/assets/frontend/images/succes_stroy_sep_20.jpg" data-src="/assets/frontend/images/succes_stroy_sep_20.jpg" />
                    </a>
                </div>
                <div class="col-md-4 images content_loadmore">
                    <a href="/assets/frontend/images/succes_stroy_sep_1.jpg" data-fancybox="gallery">
                        <img src="/assets/frontend/images/succes_stroy_sep_1.jpg" data-src="/assets/frontend/images/succes_stroy_sep_1.jpg" />
                    </a>
                </div>
                <div class="col-md-4 images content_loadmore">
                    <a href="/assets/frontend/images/succes_stroy_sep_2.jpg" data-fancybox="gallery">
                        <img src="/assets/frontend/images/succes_stroy_sep_2.jpg" data-src="/assets/frontend/images/succes_stroy_sep_2.jpg" />
                    </a>
                </div>
                <div class="col-md-4 images content_loadmore">
                    <a href="/assets/frontend/images/succes_stroy_sep_3.jpg" data-fancybox="gallery">
                        <img src="/assets/frontend/images/succes_stroy_sep_3.jpg" data-src="/assets/frontend/images/succes_stroy_sep_3.jpg" />
                    </a>
                </div>
                <div class="col-md-4 images content_loadmore">
                    <a href="/assets/frontend/images/succes_stroy_sep_4.jpg" data-fancybox="gallery">
                        <img src="/assets/frontend/images/succes_stroy_sep_4.jpg" data-src="/assets/frontend/images/succes_stroy_sep_4.jpg" />
                    </a>
                </div>
                <div class="col-md-4 images content_loadmore">
                    <a href="/assets/frontend/images/succes_stroy_sep_5.jpg" data-fancybox="gallery">
                        <img src="/assets/frontend/images/succes_stroy_sep_5.jpg" data-src="/assets/frontend/images/succes_stroy_sep_5.jpg" />
                    </a>
                </div>
                <div class="col-md-4 images content_loadmore">
                    <a href="/assets/frontend/images/succes_stroy_sep_6.jpg" data-fancybox="gallery">
                        <img src="/assets/frontend/images/succes_stroy_sep_6.jpg" data-src="/assets/frontend/images/succes_stroy_sep_6.jpg" />
                    </a>
                </div>
                <div class="col-md-4 images content_loadmore">
                    <a href="/assets/frontend/images/succes_stroy_sep_7.jpg" data-fancybox="gallery">
                        <img src="/assets/frontend/images/succes_stroy_sep_7.jpg" data-src="/assets/frontend/images/succes_stroy_sep_7.jpg" />
                    </a>
                </div>
                
                <div class="col-md-4 images content_loadmore">
                    <a href="/assets/frontend/images/succes_story_whtsp_24.jpg" data-fancybox="gallery">
                        <img src="/assets/frontend/images/succes_story_whtsp_24.jpg" data-src="/assets/frontend/images/succes_story_whtsp_24.jpg" />
                    </a>
                </div>
                <div class="col-md-4 images content_loadmore">
                    <a href="/assets/frontend/images/succes_story_whtsp_25.jpg" data-fancybox="gallery">
                        <img src="/assets/frontend/images/succes_story_whtsp_25.jpg" data-src="/assets/frontend/images/succes_story_whtsp_25.jpg" />
                    </a>
                </div>
                <div class="col-md-4 images content_loadmore">
                    <a href="/assets/frontend/images/succes_story_whtsp_26.jpg" data-fancybox="gallery">
                        <img src="/assets/frontend/images/succes_story_whtsp_26.jpg" data-src="/assets/frontend/images/succes_story_whtsp_26.jpg" />
                    </a>
                </div>
                <div class="col-md-4 images content_loadmore">
                    <a href="/assets/frontend/images/succes_story_whtsp_27.jpg" data-fancybox="gallery">
                        <img src="/assets/frontend/images/succes_story_whtsp_27.jpg" data-src="/assets/frontend/images/succes_story_whtsp_27.jpg" />
                    </a>
                </div>
               

                 <div class="col-md-4 images content_loadmore">
                    <a href="/assets/frontend/images/succes_story_whtsp_28.jpg" data-fancybox="gallery">
                        <img src="/assets/frontend/images/succes_story_whtsp_28.jpg" data-src="/assets/frontend/images/succes_story_whtsp_28.jpg" />
                    </a>
                </div>

                <div class="col-md-4 images content_loadmore">
                    <a href="/assets/frontend/images/succes_story_whtsp_19.jpg" data-fancybox="gallery">
                        <img src="/assets/frontend/images/succes_story_whtsp_19.jpg" data-src="/assets/frontend/images/succes_story_whtsp_19.jpg" />
                    </a>
                </div>
                <div class="col-md-4 images content_loadmore">
                    <a href="/assets/frontend/images/succes_story_whtsp_20.jpg" data-fancybox="gallery">
                        <img src="/assets/frontend/images/succes_story_whtsp_20.jpg" data-src="/assets/frontend/images/succes_story_whtsp_20.jpg" />
                    </a>
                </div>
                <div class="col-md-4 images content_loadmore">
                    <a href="/assets/frontend/images/succes_story_whtsp_21.jpg" data-fancybox="gallery">
                        <img src="/assets/frontend/images/succes_story_whtsp_21.jpg" data-src="/assets/frontend/images/succes_story_whtsp_21.jpg" />
                    </a>
                </div>
                

                <div class="col-md-4 images content_loadmore">
                    <a href="/assets/frontend/images/succes_story_whtsp_22.jpg" data-fancybox="gallery">
                        <img src="/assets/frontend/images/succes_story_whtsp_22.jpg" data-src="/assets/frontend/images/succes_story_whtsp_22.jpg" />
                    </a>
                </div>
                <div class="col-md-4 images content_loadmore">
                    <a href="/assets/frontend/images/succes_story_whtsp_22 (1).jpg" data-fancybox="gallery">
                        <img src="/assets/frontend/images/succes_story_whtsp_22 (1).jpg" data-src="/assets/frontend/images/succes_story_whtsp_22 (1).jpg" />
                    </a>
                </div>

                <div class="col-md-4 images content_loadmore">
                    <a href="/assets/frontend/images/succes_story_whtsp_18.jpg" data-fancybox="gallery">
                        <img src="/assets/frontend/images/succes_story_whtsp_18.jpg" data-src="/assets/frontend/images/succes_story_whtsp_18.jpg" />
                    </a>
                </div>
                <div class="col-md-4 images content_loadmore">
                    <a href="/assets/frontend/images/succes_story_whtsp_17.jpg" data-fancybox="gallery">
                        <img src="/assets/frontend/images/succes_story_whtsp_17.jpg" data-src="/assets/frontend/images/succes_story_whtsp_17.jpg" />
                    </a>
                </div>
               
                 <div class="col-md-4 images content_loadmore">
                    <a href="/assets/frontend/images/succes_story_whtsp_16.jpg" data-fancybox="gallery">
                        <img src="/assets/frontend/images/succes_story_whtsp_16.jpg" data-src="/assets/frontend/images/succes_story_whtsp_16.jpg" />
                    </a>
                </div>
                <div class="col-md-4 images content_loadmore">
                    <a href="/assets/frontend/images/succes_story_whtsp_15.jpg" data-fancybox="gallery">
                        <img src="/assets/frontend/images/succes_story_whtsp_15.jpg" data-src="/assets/frontend/images/succes_story_whtsp_15.jpg" />
                    </a>
                </div>
                <div class="col-md-4 images content_loadmore">
                    <a href="/assets/frontend/images/succes_story_whtsp_1.jpg" data-fancybox="gallery">
                        <img src="/assets/frontend/images/succes_story_whtsp_1.jpg" data-src="/assets/frontend/images/succes_story_whtsp_1.jpg" />
                    </a>
                </div>
                <div class="col-md-4 images content_loadmore">
                    <a href="/assets/frontend/images/succes_story_whtsp_2.jpg" data-fancybox="gallery">
                        <img src="/assets/frontend/images/succes_story_whtsp_2.jpg" data-src="/assets/frontend/images/succes_story_whtsp_2.jpg" />
                    </a>
                </div>

                <div class="col-md-4 images content_loadmore">
                    <a href="/assets/frontend/images/succes_story_whtsp_3.jpg" data-fancybox="gallery">
                        <img src="/assets/frontend/images/succes_story_whtsp_3.jpg" data-src="/assets/frontend/images/succes_story_whtsp_3.jpg" />
                    </a>
                </div>
                <div class="col-md-4 images content_loadmore">
                    <a href="/assets/frontend/images/succes_story_whtsp_4.jpg" data-fancybox="gallery">
                        <img src="/assets/frontend/images/succes_story_whtsp_4.jpg" data-src="/assets/frontend/images/succes_story_whtsp_4.jpg" />
                    </a>
                </div>
                <div class="col-md-4 images content_loadmore">
                    <a href="/assets/frontend/images/succes_story_whtsp_5.jpg" data-fancybox="gallery">
                        <img src="/assets/frontend/images/succes_story_whtsp_5.jpg" data-src="/assets/frontend/images/succes_story_whtsp_5.jpg" />
                    </a>
                </div>
                <div class="col-md-4 images content_loadmore">
                    <a href="/assets/frontend/images/succes_story_whtsp_6.jpg" data-fancybox="gallery">
                        <img src="/assets/frontend/images/succes_story_whtsp_6.jpg" data-src="/assets/frontend/images/succes_story_whtsp_6.jpg" />
                    </a>
                </div>
            
        
                 <div class="col-md-4 images content_loadmore">
                    <a href="/assets/frontend/images/succes_story_whtsp_7.jpg" data-fancybox="gallery">
                        <img src="/assets/frontend/images/succes_story_whtsp_7.jpg" data-src="/assets/frontend/images/succes_story_whtsp_7.jpg" />
                    </a>
                </div>
                <div class="col-md-4 images content_loadmore">
                    <a href="/assets/frontend/images/succes_story_whtsp_8.jpg" data-fancybox="gallery">
                        <img src="/assets/frontend/images/succes_story_whtsp_8.jpg" data-src="/assets/frontend/images/succes_story_whtsp_8.jpg" />
                    </a>
                </div>
                <div class="col-md-4 images content_loadmore">
                    <a href="/assets/frontend/images/succes_story_whtsp_9.jpg" data-fancybox="gallery">
                        <img src="/assets/frontend/images/succes_story_whtsp_9.jpg" data-src="/assets/frontend/images/succes_story_whtsp_9.jpg" />
                    </a>
                </div>
                <div class="col-md-4 images content_loadmore">
                    <a href="/assets/frontend/images/succes_story_whtsp_10.jpg" data-fancybox="gallery">
                        <img src="/assets/frontend/images/succes_story_whtsp_10.jpg" data-src="/assets/frontend/images/succes_story_whtsp_10.jpg" />
                    </a>
                </div>

                 <div class="col-md-4 images content_loadmore">
                    <a href="/assets/frontend/images/succes_story_whtsp_11.jpg" data-fancybox="gallery">
                        <img src="/assets/frontend/images/succes_story_whtsp_11.jpg" data-src="/assets/frontend/images/succes_story_whtsp_11.jpg" />
                    </a>
                </div>
                <div class="col-md-4 images content_loadmore">
                    <a href="/assets/frontend/images/succes_story_whtsp_12.jpg" data-fancybox="gallery">
                        <img src="/assets/frontend/images/succes_story_whtsp_12.jpg" data-src="/assets/frontend/images/succes_story_whtsp_12.jpg" />
                    </a>
                </div>
                <div class="col-md-4 images content_loadmore">
                    <a href="/assets/frontend/images/succes_story_whtsp_13.jpg" data-fancybox="gallery">
                        <img src="/assets/frontend/images/succes_story_whtsp_13.jpg" data-src="/assets/frontend/images/succes_story_whtsp_13.jpg" />
                    </a>
                </div>
                <div class="col-md-4 images content_loadmore">
                    <a href="/assets/frontend/images/succes_story_whtsp_14.jpg" data-fancybox="gallery">
                        <img src="/assets/frontend/images/succes_story_whtsp_14.jpg" data-src="/assets/frontend/images/succes_story_whtsp_14.jpg" />
                    </a>
                </div>



            </div>
            <div class="loadmore_button1"><a href="#" id="loadMore">Load More</a></div>
            
            </div>--}}

            <div class="col-md-4 col-12 widths30">

            <div class="succes_page_form d-block sticky-top">
                 
                @include('frontend.component.common_form', [
                'section' => 'Book a Free Demo - Success Story Page',
                'title'  => 'Book a <b>FREE</b> Demo',
                'Headingclassname'  => 'color_white',
            ])
            </div>
        </div>
        </div>
    </section>

    <!-------------=============== success story end =============== -------------------->

@endsection

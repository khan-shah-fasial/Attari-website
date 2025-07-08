@extends('frontend.layouts.app')

@section('page.title', 'Page not found - Attari Classes')

@section('page.description', 'Page not found - Attari Classes')

@section('page.type', 'website')

@section('page.content')



<!--  ----------------- 404 start --------------------- -->


<section class="not_found">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="container_404 d-flex align-items-center justify-content-center flex-column">
                    <h2>We were unable to find the page you are looking for</h2>
                    <img class="not_found_img" src="/assets/frontend/images/sorry_bg.png">
                </div>
            </div>
        </div>
    </div>
</section>


@php
    $learning = DB::table('cms')->where('status', 1)->where('zone', 0)->get(['course_id','slug']);
@endphp
<section class="other_courses pb-5" style="background:#f4f4f4;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4 class="section_heading pb-3 text-center" style="font-weight:500;"> We offer following courses</h4>
                    <div class="owl-carousel owl-theme trending_course">

                        @php $filtered1 = $learning->where('course_id', 5)->first(); @endphp
                        @if($filtered1)
                            <div class="item">
                                <div class="other_crs_box">
                                    <a href="{{ url(route('course.detail', ['slug' => $filtered1->slug] )) }}"><img src="/assets/frontend/images/vmware-vsphere-e1627535142798.jpg" /></a>
                                </div>
                            </div>
                        @endif

                        @php $filtered2 = $learning->where('course_id', 7)->first(); @endphp
                        @if($filtered2)
                            <div class="item">
                                <div class="other_crs_box">
                                    <a href="{{ url(route('course.detail', ['slug' => $filtered2->slug] )) }}"><img src="/assets/frontend/images/aws.jpg" /></a>
                                </div>
                            </div>
                        @endif

                        @php $filtered3 = $learning->where('course_id', 8)->first(); @endphp
                        @if($filtered3)
                            <div class="item">
                                <div class="other_crs_box">
                                    <a href="{{ url(route('course.detail', ['slug' => $filtered3->slug] )) }}"><img src="/assets/frontend/images/azure.jpg" /></a>
                                </div>
                            </div>
                        @endif    

                        @php $filtered4 = $learning->where('course_id', 9)->first(); @endphp
                        @if($filtered4)
                            <div class="item">
                                <div class="other_crs_box">
                                    <a href="{{ url(route('course.detail', ['slug' => $filtered4->slug] )) }}"><img src="/assets/frontend/images/microsft.jpg" /></a>
                                </div>
                            </div>
                        @endif

                        @php $filtered5 = $learning->where('course_id', 10)->first(); @endphp
                        @if($filtered5)
                            <div class="item">
                                <div class="other_crs_box">
                                    <a href="{{ url(route('course.detail', ['slug' => $filtered5->slug] )) }}"><img src="/assets/frontend/images/ccna.jpg" /></a>
                                </div>
                            </div>
                        @endif
                        </div>
                </div>
            </div>
        </div>
    </section>




<!--  ----------------- 404 End --------------------- -->


@endsection
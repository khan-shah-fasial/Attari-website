@extends('frontend.layouts.app')

@section('page.title', 'Terms of Service')

@section('page.description', 'Check out for our website conditions and rules and regulations.')

@section('page.type', 'website')

@section('page.content')
    <!-- -------------------- terms start ---------------- -->
  <section class="privecy_policy">
        <section class="sm-at banner1">
            <img class="inner-banner-image" src="assets/frontend/images/privacypolicy.jpg"/>
            <div class="container mt235">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrums_section paddtb80">
                            <h1 class="sm-aboutus color-white1">Terms of Service</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="{{ url(route('index')) }}">Home</a></li>
                                    <li class="breadcrumb-item"><a>»</a></li>
                                    <li class="breadcrumb-item"><a><b>Terms of Service</b></a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="our_website">

            <div class="container">
                <div class="row">
                    @php echo html_entity_decode(get_settings('terms_content')) @endphp
                </div>
            </div>
        </section>
    </section>

    <!-- -------------------- terms end   ---------------- -->

@endsection

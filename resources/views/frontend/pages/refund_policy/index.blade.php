@extends('frontend.layouts.app')

@section('page.title', 'Refunds & Cancellations')

@section('page.description', 'Please check for the Attari Classes return and cancellation policy.')

@section('page.type', 'website')

@section('page.content')
    <!-- -------------------- Refund policy start ---------------- -->
    <style>
        .our_website {
            padding-top: 50px;
        }

        .privacy_heading {
            color: #012749;
            font-weight: 500;
            line-height: 1.2em;

        }

        .our_website .items {
            list-style: none;
            padding-left: 0px;
        }
    </style>
    <section class="privecy_policy">
       
          <section class="sm-at banner1">
              <img class="inner-banner-image" src="assets/frontend/images/privacypolicy.jpg"/>
            <div class="container mt235">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrums_section paddtb80">
                            <h1 class="sm-aboutus color-white1">Refunds & Cancellations</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="{{ url(route('index')) }}">Home</a></li>
                                    <li class="breadcrumb-item"><a>»</a></li>
                                    <li class="breadcrumb-item"><a><b>Refunds & Cancellations</b></a></li>
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
                    @php echo html_entity_decode(get_settings('refund_policy_content')) @endphp
                </div>
            </div>
        </section>
    </section>

    <!-- -------------------- Refund policy  end   ---------------- -->

@endsection

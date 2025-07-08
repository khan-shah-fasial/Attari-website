@php
  
  $vmwareCourse = DB::table('courses')->where('id', 5)->first();
  $awsCourse = DB::table('courses')->where('id', 7)->first();
  $azureCourse = DB::table('courses')->where('id', 8)->first();

@endphp
<section class="services">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-lg-3 mb-0 mt-5">
                <h4 class="services_headign">Virtualization & Cloud Computing</h4>
            </div>
        
       
            <div class="col-md-4 box_services"> 
                <a href="{{ url($vmwareCourse->slug_url)}}-online">
            <img src="{{ asset('storage/' . $vmwareCourse->thumbnail_1) }}" width="380"
                    height="224" class="image_width1" alt="VMware vSphere 7 ">
                
                    <div class="text_box">
                        <h5 class="text_services_heading">
                            {{$vmwareCourse->alias4}}
                        </h5>
                        <p class="text_services_para"> <i class="fa fa-clock-o" aria-hidden="true"></i> 40 Hours Approx.
                            <br /> <i class="fa fa-calendar-check-o" aria-hidden="true"></i> View Batch Schedule
                        </p>
                    </div>
                </a>
            </div>
        

        
            <div class="col-md-4 box_services"> 
                <a href="{{ url($awsCourse->slug_url)}}-online">
            <img src="{{ asset('storage/' . $awsCourse->thumbnail_1) }}" width="380"
                    height="224" class="image_width1" alt="VMware vSphere 7 ">
                
                    <div class="text_box">
                        <h5 class="text_services_heading">
                            {{$awsCourse->alias4}}
                        </h5>
                        <p class="text_services_para"> <i class="fa fa-clock-o" aria-hidden="true"></i> 40 Hours Approx.
                            <br /> <i class="fa fa-calendar-check-o" aria-hidden="true"></i> View Batch Schedule
                        </p>
                    </div>
                </a>
            </div>
        

        
            <div class="col-md-4 box_services"> 
                <a href="{{ url($azureCourse->slug_url)}}-online">
            <img src="{{ asset('storage/' . $azureCourse->thumbnail_1) }}" width="380"
                    height="224" class="image_width1" alt="VMware vSphere 7 ">
                
                    <div class="text_box">
                        <h5 class="text_services_heading">
                            {{$azureCourse->alias4}}
                        </h5>
                        <p class="text_services_para"> <i class="fa fa-clock-o" aria-hidden="true"></i> 40 Hours Approx.
                            <br /> <i class="fa fa-calendar-check-o" aria-hidden="true"></i> View Batch Schedule
                        </p>
                    </div>
                </a>
            </div>
        

        </div>
    </div>
</section>
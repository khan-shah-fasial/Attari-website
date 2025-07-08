@extends('frontend.layouts.app')

@section('page.title', 'Attari Classes provides Online Training, Classroom Training & Video Learning')

@section('page.description',
    'Attari Classes provides classroom and online training for domestic and international students all over the world for for VMware vSphere, AWS Cloud, Azure Cloud, MCSE, and CCNA Courses')

@section('page.type', 'website')

@section('page.content')

    <!----------========== training option start ===============-------------------->

    <section class="">
        <img class="inner-banner-image" src="assets/frontend/images/Training-Options.jpg"/>
        <div class="container mt235">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrums_section paddtb80">
                        <h1 class="sm-aboutus color-white1">Training Option</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ url(route('index')) }}">Home</a></li>
                                <li class="breadcrumb-item"><a>»</a></li>
                                <li class="breadcrumb-item"><a><b>Training Option</b></a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-----------------------------Online Training ---------------->

    <section class="training pb-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 paddmobile4">
                    <h2 class="training_heading">
                        Online Training with Live Hands-on Practical
                    </h2>
                    <p class="training_para">
                        Labs and Software are available on Cloud for practicals,you can
                        Interact with trainer live during the training and resolve
                        queires, also get access to topic wise Live Recorded Lectures on
                        our Learning Management System(LMS)
                    </p>
                    <div class="row mt-5">
                        <div class="col-md-3 col-6  training_icons_box">
                            <img src="/assets/frontend/images/cloud_softwere.webp" alt="" />
                            <p class="para">Free Cloud Labs & Software</p>
                        </div>
                        <div class="col-md-3 col-6 training_icons_box">
                            <img src="/assets/frontend/images/hand_practical.webp" alt="" />
                            <p class="para">Live hands-on Practicals</p>
                        </div>
                        <div class="col-md-3 col-6 training_icons_box">
                            <img src="/assets/frontend/images/teacher-1.svg" alt="" />
                            <p class="para">Instructor-Led</p>
                        </div>
                        <div class="col-md-3 col-6 training_icons_box">
                            <img src="/assets/frontend/images/free_practice.webp" alt="" />
                            <p class="para">Free Practice Tests</p>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-3 col-6 training_icons_box">
                            <img src="/assets/frontend/images/modules.webp" alt="" />
                            <p class="para">Interactive Modules</p>
                        </div>
                        <div class="col-md-3 col-6 training_icons_box ppdd00">
                            <img src="/assets/frontend/images/live_record.webp" alt="" />
                            <p class="para">Topic wise Live Recorded Lectures</p>
                        </div>
                        <div class="col-md-3 col-6 training_icons_box">
                            <img src="/assets/frontend/images/Online-Training.webp" alt="" />
                            <p class="para">Online Training Material</p>
                        </div>
                        <div class="col-md-3 col-6 training_icons_box">
                            <img src="/assets/frontend/images/whatsapp.png" alt="" />
                            <p class="para">Trainer Support on WhatsApp</p>
                        </div>
                    </div>
                    <div class="training_btn none">
                        <button type="button" onclick="formModal('{{ url(route('component.form')) }}?section=Online Training - Training Options Page&title=Book a FREE Demo&current_page={{ urlencode(url()->current()) }}')" class="btn bookfreedemo_button">Book a FREE Demo</button>

                    </div>
                </div>
                <div class="col-lg-6 img_content">
                    <div class="row">
                        <div class="col-6 padd4 marginleftright0">
                            <div class="gallery_boxex img_transition">
                                <a href="/assets/frontend/images/vmvare_gllaery1.jpg" data-fancybox="gallery">
                                    <img src="/assets/frontend/images/vmvare_gllaery1.jpg" data-src="/assets/frontend/images/vmvare_gllaery1.jpg" />
                                </a>
                            </div>
                        </div>
                        <div class="col-6 padd4 marginleftright0">
                            <div class="gallery_boxex img_transition">
                                <a href="/assets/frontend/images/vmvare_gllaery2.jpg" data-fancybox="gallery">
                                    <img src="/assets/frontend/images/vmvare_gllaery2.jpg" data-src="/assets/frontend/images/vmvare_gllaery2.jpg" />
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 padd4 marginleftright0">
                            <div class="gallery_boxex img_transition">
                                <a href="/assets/frontend/images/vmvare_gllaery3.jpg" data-fancybox="gallery">
                                    <img src="/assets/frontend/images/vmvare_gllaery3.jpg" data-src="/assets/frontend/images/vmvare_gllaery3.jpg" />
                                </a>
                            </div>
                        </div>
                        <div class="col-6 padd4 marginleftright0">
                            <div class="gallery_boxex img_transition">
                                <a href="/assets/frontend/images/mcse_gllaery3.jpg" data-fancybox="gallery">
                                    <img src="/assets/frontend/images/mcse_gllaery3.jpg" data-src="/assets/frontend/images/mcse_gllaery3.jpg" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-------------------------------Testimonial ------------------------ -->

<section id="testimonials" class="testiminilas_sec pt-5 pb-5 gray_bgg1 ">
  <div class="container">
    <h2 class="main_heads text-center mb-3"> What Our Students Says About Online Training </h2>
    <div class="large-12 columns mt-4">
      <div class="owl-carousel owl-theme slider_content_dots">
        <div class="item">
          <div class="testimonial_box">
            <div class="testimonial__header">
              <div class="row">
                <div class="col-lg-9 col-10">
                  <div class="testimonial__image">
                    <img src="https://lh3.googleusercontent.com/a-/ALV-UjXOW58CDLBcENB3vkq6SAOMEU0ODXAXh05D1qzpWo4zb-o=w60-h60-p-rp-mo-br100" class="img-fluid d-block w-100 lazyload" alt>
                    <span class="testimonial__name">Rahul Kolambekar</span>
                  </div>
                </div>
                <div class="col-lg-3 col-2">
                  <div class="testimonial__icon">
                    <i aria-hidden="true" class="fab fa-google-plus"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="testimonial__content">
              <div class="testimonial__text">
                <p> I have just completed VMware vSphere 8 online training sessions from Attari classes. Its really a good experience, especially trainer Mr. Maqsood Sir gives training with very understanding examples of real time issues that make my concepts clear and its totally practical based training session. Also, online LMS is the best tool to revise concepts at any time. It’s really one of the best place to learn VMware vSphere concepts. </p>
              </div>
            </div>
          </div>
        </div>
		
        <div class="item">
          <div class="testimonial_box">
            <div class="testimonial__header">
              <div class="row">
                <div class="col-lg-9 col-10">
                  <div class="testimonial__image">
                    <img src="https://lh3.googleusercontent.com/a-/ALV-UjWdmhyhjNWg4g9oCaNdjT6zioyYpYsjx7pbqpE3DAiU37Q=w60-h60-p-rp-mo-br100" class="img-fluid d-block w-100 lazyload" alt>
                    <span class="testimonial__name">Yogesh Sonawane</span>
                  </div>
                </div>
                <div class="col-lg-3 col-2">
                  <div class="testimonial__icon">
                    <i aria-hidden="true" class="fab fa-google-plus"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="testimonial__content">
              <div class="testimonial__text">
                <p>I have completed VMWare Training from Attari classes. I will recommend Attari Classes to everyone who is looking for online training. Maqsood sir has a very good experience in his area. He has cleared all our doubts with real-life examples and answered all our questions.</p>
              </div>
            </div>
          </div>
        </div>
		
        <div class="item">
          <div class="testimonial_box">
            <div class="testimonial__header">
              <div class="row">
                <div class="col-lg-9 col-10">
                  <div class="testimonial__image">
                    <img src="https://lh3.googleusercontent.com/a-/ALV-UjUgZ_HoT_Iq_lvQ747dCIAgeE1aT1fLmr9oEbAddfsYnok=w60-h60-p-rp-mo-br100" class="img-fluid d-block w-100 lazyload" alt>
                    <span class="testimonial__name">Iyiola Peter</span>
                  </div>
                </div>
                <div class="col-lg-3 col-2">
                  <div class="testimonial__icon">
                    <i aria-hidden="true" class="fab fa-google-plus"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="testimonial__content">
              <div class="testimonial__text">
                <p>This is hands down the best online training I have ever attended. I took the AWS solutions Architect Associate classes and it was a great experience. The trainer,Mr Maqsood, is very knowledgeable and makes every concept relatable and easy to understand. The LMS portal through which all recorded sessions are made available to students makes it easy to go over each lecture for as long and often as is needed. The classes are hands-on and easy to follow as the instructor makes sure each concept are understood. I highly recommend for anyone seeking expertise in virtualisation and cloud technologies.</p>
              </div>
            </div>
          </div>
        </div>
		
        <div class="item">
          <div class="testimonial_box">
            <div class="testimonial__header">
              <div class="row">
                <div class="col-lg-9 col-10">
                  <div class="testimonial__image">
                    <img src="https://lh3.googleusercontent.com/a-/ALV-UjUVQEMg4PlygsWjEb2D8IuPUZ9MeiSvb0lBPXSOvQdwAoQn=w60-h60-p-rp-mo-br100" class="img-fluid d-block w-100 lazyload" alt>
                    <span class="testimonial__name">Vijay Dhasal</span>
                  </div>
                </div>
                <div class="col-lg-3 col-2">
                  <div class="testimonial__icon">
                    <i aria-hidden="true" class="fab fa-google-plus"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="testimonial__content">
              <div class="testimonial__text">
                <p>I have completed the AWS Cloud online training of Attari Classes. It was a great learning experience by Masqood Sir who is having outstanding teaching skills with practical examples which are always relates with life and the best thing here is Live Practical with trainer. Attari classes provides LMS portal which is great for practice as well as for understanding remaining portion. Thank you</p>
              </div>
            </div>
          </div>
        </div>
		
        <div class="item">
          <div class="testimonial_box">
            <div class="testimonial__header">
              <div class="row">
                <div class="col-lg-9 col-10">
                  <div class="testimonial__image">
                    <img src="https://lh3.googleusercontent.com/a-/ALV-UjWgTETwtNks_NV0cxcWaRsIwAnGgQKn6BRnfhhGMF47ew=w60-h60-p-rp-mo-ba2-br100" class="img-fluid d-block w-100 lazyload" alt>
                    <span class="testimonial__name">Mithun Munde</span>
                  </div>
                </div>
                <div class="col-lg-3 col-2">
                  <div class="testimonial__icon">
                    <i aria-hidden="true" class="fab fa-google-plus"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="testimonial__content">
              <div class="testimonial__text">
                <p>I have completed Azure Cloud Administrator Training from Attari classes. I will recommend Attari Classes to everyone who is looking for online training. Zameer sir has a very good experience in his area. He has cleared all our doubts with real-life examples and answered all our questions. Thank you Zameer Sir :).</p>
              </div>
            </div>
          </div>
        </div>
		
        <div class="item">
          <div class="testimonial_box">
            <div class="testimonial__header">
              <div class="row">
                <div class="col-lg-9 col-10">
                  <div class="testimonial__image">
                    <img src="https://lh3.googleusercontent.com/a-/ALV-UjXQGNqnwNZzV9tJSViEdHX7pR921rxVutF7cXX1mNhsWhbN=w60-h60-p-rp-mo-ba3-br100" class="img-fluid d-block w-100 lazyload" alt>
                    <span class="testimonial__name">Saurabh Dhuri</span>
                  </div>
                </div>
                <div class="col-lg-3 col-2">
                  <div class="testimonial__icon">
                    <i aria-hidden="true" class="fab fa-google-plus"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="testimonial__content">
              <div class="testimonial__text">
                <p>I have completed Azure Cloud Administrator online training from Atari Classes. Attari class structure are well designed and offer a comprehensive learning experience. The class trainer zameer sir teaches very well and explains in a simple and unique way. Hands-on practice was done very well </p>
              </div>
            </div>
          </div>
        </div>
		
        <div class="item">
          <div class="testimonial_box">
            <div class="testimonial__header">
              <div class="row">
                <div class="col-lg-9 col-10">
                  <div class="testimonial__image">
                    <img src="https://lh3.googleusercontent.com/a-/ALV-UjWZsHZWw7grASLjG-4K8ljeKj87IKeKi-B-dZi6TEpzVQ8=w60-h60-p-rp-mo-br100" class="img-fluid d-block w-100 lazyload" alt>
                    <span class="testimonial__name">Sumit Jain</span>
                  </div>
                </div>
                <div class="col-lg-3 col-2">
                  <div class="testimonial__icon">
                    <i aria-hidden="true" class="fab fa-google-plus"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="testimonial__content">
              <div class="testimonial__text">
                <p>I have taken online training of MCSE from attari classes, I must say the way of teaching and explanation from ZAMEER Sir is just awesome very easy to understand and the best part they provide LMS access with no expiry which is very very useful for practice and clear doubts </p>
              </div>
            </div>
          </div>
        </div>
		
        <div class="item">
          <div class="testimonial_box">
            <div class="testimonial__header">
              <div class="row">
                <div class="col-lg-9 col-10">
                  <div class="testimonial__image">
                    <img src="https://lh3.googleusercontent.com/a-/ALV-UjUFkEeyptS_sfsd0kgDZhw31oe55Jt0U-0NtPkOYx2B_OM=w60-h60-p-rp-mo-br100" class="img-fluid d-block w-100 lazyload" alt>
                    <span class="testimonial__name">Imran Lateef</span>
                  </div>
                </div>
                <div class="col-lg-3 col-2">
                  <div class="testimonial__icon">
                    <i aria-hidden="true" class="fab fa-google-plus"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="testimonial__content">
              <div class="testimonial__text">
                <p>Have completed my MCSE online training course from Attari classes & learnt a lot from Zameer sir, as he is an excellent trainer, the way of explaining topic is amazing, i've never seen anything like it before in my life. </p>
              </div>
            </div>
          </div>
        </div>
		
        <div class="item">
          <div class="testimonial_box">
            <div class="testimonial__header">
              <div class="row">
                <div class="col-lg-9 col-10">
                  <div class="testimonial__image">
                    <img src="https://lh3.googleusercontent.com/a-/ALV-UjXbPM7NT66a4SUlPxijJqXtt3a9x4zURl1oAsWoTmz6AyIO=w60-h60-p-rp-mo-ba3-br100" class="img-fluid d-block w-100 lazyload" alt>
                    <span class="testimonial__name">Tejas Mendon</span>
                  </div>
                </div>
                <div class="col-lg-3 col-2">
                  <div class="testimonial__icon">
                    <i aria-hidden="true" class="fab fa-google-plus"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="testimonial__content">
              <div class="testimonial__text">
                <p>I had opt for CCNA online training , Zameer sir is well updated to the course and helps alot with any issues during the training and is available for any doubt clearing on WhatsApp, u can choose this course if u want to start your journey in IT . LMS is provided which is a +++ , Really enjoyed learning!!! Will be learning further courses from here !!
              </div>
            </div>
          </div>
         </div>
			
			
            <div class="item">
              <div class="testimonial_box">
                <div class="testimonial__header">
                  <div class="row">
                    <div class="col-lg-9 col-10">
                      <div class="testimonial__image">
                        <img src="https://lh3.googleusercontent.com/a-/ALV-UjVNt4z4t15Ta__DsbImr5NltXpRGMvLB3ClC9JIDnGSFRA=w60-h60-p-rp-mo-br100" class="img-fluid d-block w-100 lazyload" alt>
                        <span class="testimonial__name">Suraj rai VJTI</span>
                      </div>
                    </div>
                    <div class="col-lg-3 col-2">
                      <div class="testimonial__icon">
                        <i aria-hidden="true" class="fab fa-google-plus"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="testimonial__content">
                  <div class="testimonial__text">
                    <p>My Name is Suraj & I have done Online CCNA Course in MARCH 2021. One of the best technical institutes I have ever been to. Attari Classes does complete justice to every rupee of the fess we have paid. My Trainer Mr. Zameer is excellent , his way of teaching is zillion times better than most instructors have ever met. In the 2 hours lecture he will only focus & speak about topics related to course and nothing else. Best part about course was, necessary theory with more hands on practical. Mr. Zameer puts best efforts in clearing concepts, protocols, and repeats it until he gets confirmation from all students. Trainer performs practical's live along with students and ensures all are in sync with him. He has taught us imp networking concepts, Protocols, Routing and switching, and how to troubleshoot most common issues observed in production environments.What I have experienced is, Attari classes focus mainly on what is needed daily in production environment. Thankful to Attari classes, Zameer Sir. </p>
                  </div>
                </div>
              </div>
            </div>
			
          </div>
        </div>
      </div>
</section>

    <section class="enquiry_mobile_form d-block d-lg-none d-md-none">
        <div class="container">
            @include('frontend.component.common_form', [
                'section' => 'Training Option Page - After What Our Students Says Section - Book A Free Demo - Mobile View',
                'title'  => 'Book a <b>FREE</b> Demo',
                'Headingclassname'  => 'color_white',
            ])
        </div>
    </section>
    <!-- ----------------------Training online classs------------------------------->

    <section class="training pb-5 pt-5">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 right order-lg-2 ps-md-4 paddmobile4">
                    <h2 class="training_heading">
                        Classroom Training with Hands-on Practical
                    </h2>
                    <p class="training_para">
                        We have High tech Infrastructure in our Classrooms, using High end labs candidates can perform live
                        practical’s along with the trainer, also get access to topic wise Live Recorded Lectures on our
                        Learning Management System(LMS)
                    </p>
                    <div class="row mt-5">
                       
                        <div class="col-md-3 col-6 training_icons_box">
                            <img src="/assets/frontend/images/infrastructure.png" alt="" />
                            <p class="para">State Of Art Infrastructure</p>
                        </div>
                        
                         <div class="col-md-3 col-6 training_icons_box">
                            <img src="/assets/frontend/images/online_training.png" alt="" />
                            <p class="para">High End Labs</p>
                        </div>
                        
                        
                         <div class="col-md-3 col-6 training_icons_box">
                            <img src="/assets/frontend/images/3442194.png" alt="" />
                            <p class="para">Online Learning Portal</p>
                        </div>
                        
                         <div class="col-md-3 col-6 training_icons_box">
                            <img src="/assets/frontend/images/whatsapp.png" alt="" />
                            <p class="para">Trainer Support on WhatsApp</p>
                        </div>
                        
                        <div class="col-md-3 col-6 training_icons_box">
                            <img src="/assets/frontend/images/free_practice.webp" alt="" />
                            <p class="para">Free Practice Tests</p>
                        </div>
                        
                        
                        
                        <div class="col-md-3 col-6 training_icons_box">
                            <img src="/assets/frontend/images/modules.webp" alt="" />
                            <p class="para">Interactive Modules</p>
                        </div>
                        
                         
                        
                         <div class="col-md-3 col-6 training_icons_box">
                            <img src="/assets/frontend/images/cloud_softwere.webp" alt="" />
                            <p class="para">Free Cloud Labs & Software</p>
                        </div>
                        
                        <div class="col-md-3 col-6 training_icons_box ppdd00">
                            <img src="/assets/frontend/images/live_record.webp" alt="" />
                            <p class="para">Topic wise Live Recorded Lectures</p>
                        </div>
                        
                    </div>
                    <div class="training_btn none">
                        <button type="button" onclick="formModal('{{ url(route('component.form')) }}?section=Classroom Training - Training Options Page&title=Book a FREE Demo&current_page={{ urlencode(url()->current()) }}')" 
                        class="btn bookfreedemo_button"> Book a FREE Demo</button>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1 img_content">
                    <div class="row">
                        <div class="col-6 padd4 marginleftright0">
                            <div class="gallery_boxex">
                                <a href="/assets/frontend/images/35.jpg" data-fancybox="gallery">
                                    <img src="/assets/frontend/images/35.jpg" data-src="/assets/frontend/images/35.jpg" />
                                </a>
                            </div>
                        </div>
                        <div class="col-6 padd4 marginleftright0">
                            <div class="gallery_boxex">
                                <a href="/assets/frontend/images/36.jpg" data-fancybox="gallery">
                                    <img src="/assets/frontend/images/36.jpg" data-src="/assets/frontend/images/36.jpg" />
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 padd4 marginleftright0">
                            <div class="gallery_boxex">
                                <a href="/assets/frontend/images/16.jpg" data-fancybox="gallery">
                                    <img src="/assets/frontend/images/16.jpg" data-src="/assets/frontend/images/16.jpg" />
                                </a>
                            </div>
                        </div>
                        <div class="col-6 padd4 marginleftright0">
                            <div class="gallery_boxex">
                                <a href="/assets/frontend/images/17.jpg" data-fancybox="gallery">
                                    <img src="/assets/frontend/images/17.jpg" data-src="/assets/frontend/images/17.jpg" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-------------------------------Testimonial ------------------------ -->

<section id="testimonials" class="testiminilas_sec pt-5 pb-5 gray_bgg1 ">
  <div class="container">
    <h2 class="main_heads text-center mb-3"> What Our Students Says About Classroom Training </h2>
    <div class="large-12 columns mt-4">
      <div class="owl-carousel owl-theme slider_content_dots">
        <div class="item">
          <div class="testimonial_box">
            <div class="testimonial__header">
              <div class="row">
                <div class="col-lg-9 col-10">
                  <div class="testimonial__image">
                    <img src="https://lh3.googleusercontent.com/a-/ALV-UjUYWB-ZIM-FAwQPIcm_p1YfgQDeLiV5YJ2Fc2B-kgjQqw=w60-h60-p-rp-mo-br100" class="img-fluid d-block w-100 lazyload" alt>
                    <span class="testimonial__name">Rohit Parab</span>
                  </div>
                </div>
                <div class="col-lg-3 col-2">
                  <div class="testimonial__icon">
                    <i aria-hidden="true" class="fab fa-google-plus"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="testimonial__content">
              <div class="testimonial__text">
                <p> I have attended the VM Ware batch at Attari Classes, I am experiencing so much positive out from training & live practical which is based on production environment, everything learning from scratch,Good online platform & classroom training provisioning, and Learning Management System (LMS) also,
Maqsood Sir is Amazing, extremely talented & well experienced trainer (VM Ware & AWS),
Back Room & Support staff also extremely supportive & cooperative.

Definitely I will recommend to my friends, colleague to join Attari Classes.

Thank & Regards ❤️</p>
              </div>
            </div>
          </div>
        </div>
		
        <div class="item">
          <div class="testimonial_box">
            <div class="testimonial__header">
              <div class="row">
                <div class="col-lg-9 col-10">
                  <div class="testimonial__image">
                    <img src="https://lh3.googleusercontent.com/a-/ALV-UjVHI7MgwIEQtxF8YduRq_A1IGy236TDBT1LfkhGDhs73pA=w60-h60-p-rp-mo-ba3-br100" class="img-fluid d-block w-100 lazyload" alt>
                    <span class="testimonial__name">Ahmad Reja</span>
                  </div>
                </div>
                <div class="col-lg-3 col-2">
                  <div class="testimonial__icon">
                    <i aria-hidden="true" class="fab fa-google-plus"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="testimonial__content">
              <div class="testimonial__text">
                <p>I have just complet the VMware course from Attari classes. I attained classroom training. The experience has been tremendous. The Maqsood Sheikha sir is highly professional and experienced in the way teaching skills highly commendable.
Maqsood Sir explain all the concepts with simple examples which make you understand the concept easily.
One more commendable point which I have experienced is LMS. It's very helpful to understand doubts and regular practice.
I would highly recommend to my friends and colleague to attain Attari classes.
Overall I m very ecstatic with the Attari Classes training.
Thank you Mr. Maqsood sir and Attari Classes.</p>
              </div>
            </div>
          </div>
        </div>
		
        <div class="item">
          <div class="testimonial_box">
            <div class="testimonial__header">
              <div class="row">
                <div class="col-lg-9 col-10">
                  <div class="testimonial__image">
                    <img src="https://lh3.googleusercontent.com/a-/ALV-UjUCPu6luap4jBtqg-iCbVGXok-6jYtCqAtHMYe3Fbx-USY=w60-h60-p-rp-mo-br100" class="img-fluid d-block w-100 lazyload" alt>
                    <span class="testimonial__name">Brian Lobo</span>
                  </div>
                </div>
                <div class="col-lg-3 col-2">
                  <div class="testimonial__icon">
                    <i aria-hidden="true" class="fab fa-google-plus"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="testimonial__content">
              <div class="testimonial__text">
                <p>I've attended AWS Solution Architect course in hybrid (attended online & offline classroom). The training was smooth and trainer (Maqsood sir) explained with amazing examples. They also provide LMS portal which is helpful to revise/practice AWS concepts.
</p>
              </div>
            </div>
          </div>
        </div>
		
        <div class="item">
          <div class="testimonial_box">
            <div class="testimonial__header">
              <div class="row">
                <div class="col-lg-9 col-10">
                  <div class="testimonial__image">
                    <img src="https://lh3.googleusercontent.com/a-/ALV-UjXH5nnrw-8mWCvKjfnx7uJgl3s_VrQlc8m_z6WZpma2Jw=w60-h60-p-rp-mo-br100" class="img-fluid d-block w-100 lazyload" alt>
                    <span class="testimonial__name">Nadeem Khan</span>
                  </div>
                </div>
                <div class="col-lg-3 col-2">
                  <div class="testimonial__icon">
                    <i aria-hidden="true" class="fab fa-google-plus"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="testimonial__content">
              <div class="testimonial__text">
                <p>I completed my AWS Solution architect associate online training from Attari classes it was great learning experience. Its one of Very excellent institute in India where you feel like attending training on classroom.

One more better option is there LMS ( learning management system) where you can refer all live recorded lacture and do revision.

And special thanks to Maqsood Sir he is a very excellent trainer. Clearing doubt live during lacture also providing support in WhatsApp post lacture. I like very much his examples to clearing concept of every topic.</p>
              </div>
            </div>
          </div>
        </div>
		
        <div class="item">
          <div class="testimonial_box">
            <div class="testimonial__header">
              <div class="row">
                <div class="col-lg-9 col-10">
                  <div class="testimonial__image">
                    <img src="https://lh3.googleusercontent.com/a-/ALV-UjXIyjF9EYXGQbDE_dzfqb8Xm5kI-9hvUSFI0MeNLhkCEjg=w60-h60-p-rp-mo-br100" class="img-fluid d-block w-100 lazyload" alt>
                    <span class="testimonial__name">Musaddik Patel</span>
                  </div>
                </div>
                <div class="col-lg-3 col-2">
                  <div class="testimonial__icon">
                    <i aria-hidden="true" class="fab fa-google-plus"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="testimonial__content">
              <div class="testimonial__text">
                <p>It was an very good experience to get an Azure training form Attari Classes. Earlier I have completed Vmware classroom training and I feel same classroom experience I got from online training also. I haven't attend all live session but got the recorded sessions and  the with trainer like Maqsood Sir and Zameer sir, recorded sessions are also very good. Attari class is recommended for all those who wants to be an expert in cloud services and virtualization.
</p>
              </div>
            </div>
          </div>
        </div>
		
        <div class="item">
          <div class="testimonial_box">
            <div class="testimonial__header">
              <div class="row">
                <div class="col-lg-9 col-10">
                  <div class="testimonial__image">
                    <img src="https://lh3.googleusercontent.com/a-/ALV-UjUHqauaDXzalI2WQAulj6jrJ7SQVpxPgiqTMOkQ-RmXBzE=w60-h60-p-rp-mo-br100" class="img-fluid d-block w-100 lazyload" alt>
                    <span class="testimonial__name">Amit Yadav</span>
                  </div>
                </div>
                <div class="col-lg-3 col-2">
                  <div class="testimonial__icon">
                    <i aria-hidden="true" class="fab fa-google-plus"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="testimonial__content">
              <div class="testimonial__text">
                <p>I have attended Azure Administrator course offline.
Zameer sir's unique style of teaching made the classroom session enjoyable.
Zameer Sir clears all Azure students doubts until you understand the concept by giving real time examples.
LMS learning portal is very useful to revise the concepts.
I have recommended Attari Classes to others for VMware and Azure and will continue to do so.
Thank you, Zameer Sir & Maqsood Sir, for wonderful session.</p>
              </div>
            </div>
          </div>
        </div>
		
        <div class="item">
          <div class="testimonial_box">
            <div class="testimonial__header">
              <div class="row">
                <div class="col-lg-9 col-10">
                  <div class="testimonial__image">
                    <img src="https://lh3.googleusercontent.com/a-/ALV-UjUL4Xt7B_mfDJZ32kGRxjvbaGsdIWmbozYcqCB1gpZfhUw=w60-h60-p-rp-mo-ba2-br100" class="img-fluid d-block w-100 lazyload" alt>
                    <span class="testimonial__name">Nilesh Ingale</span>
                  </div>
                </div>
                <div class="col-lg-3 col-2">
                  <div class="testimonial__icon">
                    <i aria-hidden="true" class="fab fa-google-plus"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="testimonial__content">
              <div class="testimonial__text">
                <p>I joined Attari classes for MCSE Course.
They have both options available for the training , online and offline/classroom, I had joined the classroom training and it was a good experience.

Zameer Sir is highly experience trainer, His teaching skills are very very very good.
Also trainers are always available for support on WhatsApp.
As a student, you feel pushed to learn and try new level of competencies.

I would highly recommend Attari classes to my friends and colleagues.
I am now planning for my AZURE training from Zameer Sir in coming days.

Overall I am very very Happy with the training.</p>
              </div>
            </div>
          </div>
        </div>
		
        <div class="item">
          <div class="testimonial_box">
            <div class="testimonial__header">
              <div class="row">
                <div class="col-lg-9 col-10">
                  <div class="testimonial__image">
                    <img src="https://lh3.googleusercontent.com/a-/ALV-UjWvyP3kavA2mikmW3WNXLvpIeMlvw-I7sb35K7DEKXL4oI=w60-h60-p-rp-mo-ba2-br100" class="img-fluid d-block w-100 lazyload" alt>
                    <span class="testimonial__name">Renji Mathew</span>
                  </div>
                </div>
                <div class="col-lg-3 col-2">
                  <div class="testimonial__icon">
                    <i aria-hidden="true" class="fab fa-google-plus"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="testimonial__content">
              <div class="testimonial__text">
                <p>Excellent Training provided by Trainer Zameer for MCSA-CCNA-Azure, professional case studies explained, apt Presentations on the topics, additional research information provided. Infrastructure of classroom is very good and helps cover all pratical sessions with sufficient systems available for students...overall a very good class and provides good learning atmosphere... recommended for beginners as well as experienced professionals...Thank You Zameer Sir and Attari Classes!!!
 </p>
              </div>
            </div>
          </div>
        </div>
		
        <div class="item">
          <div class="testimonial_box">
            <div class="testimonial__header">
              <div class="row">
                <div class="col-lg-9 col-10">
                  <div class="testimonial__image">
                    <img src="https://lh3.googleusercontent.com/a-/ALV-UjXJMUJMdkCRHdy2ov1khCyyJNg18hIUmjnyykl_txooUwU=w60-h60-p-rp-mo-br100" class="img-fluid d-block w-100 lazyload" alt>
                    <span class="testimonial__name">
Mohammad Firoz Mansuri</span>
                  </div>
                </div>
                <div class="col-lg-3 col-2">
                  <div class="testimonial__icon">
                    <i aria-hidden="true" class="fab fa-google-plus"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="testimonial__content">
              <div class="testimonial__text">
                <p>It was good experience to learn CCNA from zameer sir(attari classes), The zameer sir has a good knowledge and know how to teach and have a good flow over lectures.It was the best experience for me to learn from him
</p>
              </div>
            </div>
          </div>
         </div>
			
			
            <div class="item">
              <div class="testimonial_box">
                <div class="testimonial__header">
                  <div class="row">
                    <div class="col-lg-9 col-10">
                      <div class="testimonial__image">
                        <img src="https://lh3.googleusercontent.com/a-/ALV-UjUzPy-T7cWHMbDbz7pWQjqkitAhHQYJHRBq0tfJ__cDgiI=w60-h60-p-rp-mo-br100" class="img-fluid d-block w-100 lazyload" alt>
                        <span class="testimonial__name">Khalil Temkar</span>
                      </div>
                    </div>
                    <div class="col-lg-3 col-2">
                      <div class="testimonial__icon">
                        <i aria-hidden="true" class="fab fa-google-plus"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="testimonial__content">
                  <div class="testimonial__text">
                    <p>The training was excellent and deep knowledge was received in a friendly environment. I have learn CCNA here & Zameer Sir have excellent teaching skills and knowledge. Thanks Sir for sharing your knowledge.</p>
                  </div>
                </div>
              </div>
            </div>
			
          </div>
        </div>
      </div>
</section>




    <!-- -------------Free learning --------------- -->

    <section class="lms training pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 paddmobile4">
                    <h2 class="lms_heading">
                        Self Paced Learning -
                        <strong>Live Recorded Video Lectures</strong>
                    </h2>
                    <p class="lms_para">
                        You get access to topic wise Live Recorded Lectures of our
                        courses on Learning Management System(LMS), lectures on LMS are
                        updated regularly and even new topics are added whenever
                        required, you can access LMS even after course is completed, so
                        revision and upgrading yourself in future is easy
                    </p>
                    <div class="row">
                        <div class="col-lg-3 col-6 training_icons_box ppdd00">
                            <img src="/assets/frontend/images/live_record.webp" alt="" />
                            <p class="para">Topic wise Live Recorded Lectures</p>
                        </div>
                        <div class="col-lg-3 col-6 training_icons_box ppdd00">
                            <img src="/assets/frontend/images/online_classroom_trainign.webp" alt="" />
                            <p class="para">Upgrade to Online or Classroom Training</p>
                        </div>
                        <div class="col-lg-3 col-6 training_icons_box">
                            <img src="/assets/frontend/images/regulary.webp" alt="" />
                            <p class="para">LMS updated regulary</p>
                        </div>
                        <div class="col-lg-3 col-6 training_icons_box">
                            <img src="/assets/frontend/images/3442194.webp" alt="" />
                            <p class="para">Online Learning Portal</p>
                        </div>
                    </div>
                    <div class="training_btn text-md-start text-center">
                        <a target="_blank" href="https://lms.attariclasses.in/">Visit Video Portal</a>

                    </div>
                </div>
                <div class="col-md-6 lms_img">
                    <img src="/assets/frontend/images/lms_images-1024x750.webp" alt="" />
                </div>
            </div>
        </div>
    </section>

    <!-- -----------------adv lms ------------------------- -->

    <section class="adv_lms">
        <div class="bg_adv">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="pb-3 fw-normal">Advantages of LMS</h2>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-6 lms_box"> <i class="far fa-clock"></i>
                                <p>24*7 Learning</p>
                            </div>
                            <div class="col-6 lms_box"> <i aria-hidden="true" class="fas fa-laptop"></i>
                                <p>Live Recorded Lectures</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-6 lms_box"> <i aria-hidden="true" class="fas fa-chalkboard-teacher"></i>
                                <p>Premium Content</p>
                            </div>
                            <div class="col-6 lms_box"> <i aria-hidden="true" class="fas fa-laptop-code"></i>
                                <p>Learn At Your Own Pace</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-6 lms_box"> <i aria-hidden="true" class="fas fa-globe-africa"></i>
                                <p>Access From Anywhere, Any Device</p>
                            </div>
                            <div class="col-6 lms_box"> <i aria-hidden="true" class="fas fa-certificate"></i>
                                <p>Course Completion Certificate</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-6 lms_box"> <i aria-hidden="true" class="far fa-edit"></i>
                                <p>Free Practice Exam</p>
                            </div>
                            <div class="col-6 lms_box"> <i aria-hidden="true" class="fas fa-exchange-alt"></i>
                                <p>Revise & Learn Multiple Times</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-------------------------------Testimonial ------------------------ -->


    <section id="testimonials" class="testiminilas_sec pt-5 pb-5 gray_bgg1 ">
  <div class="container">
    <h2 class="main_heads text-center mb-3"> What Our Students Says About LMS </h2>
    <div class="large-12 columns mt-4">
      <div class="owl-carousel owl-theme slider_content_dots">
        <div class="item">
          <div class="testimonial_box">
            <div class="testimonial__header">
              <div class="row">
                <div class="col-lg-9 col-10">
                  <div class="testimonial__image">
                    <img src="https://lh3.googleusercontent.com/a-/ALV-UjV-3tXeWwZWL6HpsS1jE6XxA3MrQBiwiZQdfvJWCbRdRg=w60-h60-p-rp-mo-br100" class="img-fluid d-block w-100 lazyload" alt>
                    <span class="testimonial__name">Shailesh Pandit</span>
                  </div>
                </div>
                <div class="col-lg-3 col-2">
                  <div class="testimonial__icon">
                    <i aria-hidden="true" class="fab fa-google-plus"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="testimonial__content">
              <div class="testimonial__text">
                <p> I have Complete my VMware training from Attari classes.
One of the best classes in VMware. If you want to do coursed in VMware, please do from Attari Classed.Maqsood Sir one of the best Trainer in VMware.
The Way of Training as well Practical teach by Maqsood Sir is Fanatic. Lms is Facility is very useful for Practical Purpose if you missed any Lecture during Training Period. Once Thanks so much Maqsood Sir & Attari Classes.</p>
              </div>
            </div>
          </div>
        </div>
		
        <div class="item">
          <div class="testimonial_box">
            <div class="testimonial__header">
              <div class="row">
                <div class="col-lg-9 col-10">
                  <div class="testimonial__image">
                    <img src="https://lh3.googleusercontent.com/a-/ALV-UjWZ4svbJY0T0jPysnO8-ez6enmOmyZs55GpS2wAFy8bmnY=w60-h60-p-rp-mo-br100" class="img-fluid d-block w-100 lazyload" alt>
                    <span class="testimonial__name">Nizamuddin Ansari</span>
                  </div>
                </div>
                <div class="col-lg-3 col-2">
                  <div class="testimonial__icon">
                    <i aria-hidden="true" class="fab fa-google-plus"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="testimonial__content">
              <div class="testimonial__text">
                <p>I have successful completed VMware Training Batches March 2023 at ATTARI Classes, and it is a Hybrid Classes (LMS on Cloud) with very smart teaching technique (Maqsood Sir) has been provided to us and He has depth professional knowledge of Virtualization IT industrial and during the ongoing batch Maqsood Sir responded very smartly and guided very practically for IT career.
My understanding to very comprehensive deal for Virtualization Infra career.</p>
              </div>
            </div>
          </div>
        </div>
		
        <div class="item">
          <div class="testimonial_box">
            <div class="testimonial__header">
              <div class="row">
                <div class="col-lg-9 col-10">
                  <div class="testimonial__image">
                    <img src="https://lh3.googleusercontent.com/a-/ALV-UjUurkzBG4iBgByzgOJVrCaG2zyxkh6brnbtFKHOgPeNEgw=w60-h60-p-rp-mo-ba4-br100" class="img-fluid d-block w-100 lazyload" alt>
                    <span class="testimonial__name">Amit Verma</span>
                  </div>
                </div>
                <div class="col-lg-3 col-2">
                  <div class="testimonial__icon">
                    <i aria-hidden="true" class="fab fa-google-plus"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="testimonial__content">
              <div class="testimonial__text">
                <p>Hi my self Amit , I'm a working professional. I have been enrolled in Attari classes for AWS training as a hybrid attempt some of the lectures in in-person and the rest of the training online. Must say the teaching style of Maqsood sir with lots of in depth details of AWS services.

The bonus point is LMS which keeps updating as per the latest services in AWS 😁 which is accessible anytime 24x7./p>
              </div>
            </div>
          </div>
        </div>
		
        <div class="item">
          <div class="testimonial_box">
            <div class="testimonial__header">
              <div class="row">
                <div class="col-lg-9 col-10">
                  <div class="testimonial__image">
                    <img src="https://lh3.googleusercontent.com/a-/ALV-UjV-Secvr1WnJlvJlBoY12Ql5bTLB_N-Xy1Yf8gMRZ8Tqg=w60-h60-p-rp-mo-br100" class="img-fluid d-block w-100 lazyload" alt>
                    <span class="testimonial__name">Mohammed Rashid Ansari</span>
                  </div>
                </div>
                <div class="col-lg-3 col-2">
                  <div class="testimonial__icon">
                    <i aria-hidden="true" class="fab fa-google-plus"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="testimonial__content">
              <div class="testimonial__text">
                <p>I’m happy I enrolled in Attari AWS Solution Architect Associates, The Class room is good hybrid (offline & online) the LMS module is the best it allows for future revision and updates.
Maqsood Sir has a wonderful personality and extensive understanding of AWS, his practical experience is also excellent and helps to build confidence.
I can without a doubt advise my friends and colleagues to who are looking.

I am great full to Maqsood Sir and his team.</p>
              </div>
            </div>
          </div>
        </div>
		
        <div class="item">
          <div class="testimonial_box">
            <div class="testimonial__header">
              <div class="row">
                <div class="col-lg-9 col-10">
                  <div class="testimonial__image">
                    <img src="https://lh3.googleusercontent.com/a-/ALV-UjU7Sq74lEax-lkt1z4dJe5_s4s-OHMqsU_gH5Qkg7RZXXI=w60-h60-p-rp-mo-br100" class="img-fluid d-block w-100 lazyload" alt>
                    <span class="testimonial__name">Tejas Rane</span>
                  </div>
                </div>
                <div class="col-lg-3 col-2">
                  <div class="testimonial__icon">
                    <i aria-hidden="true" class="fab fa-google-plus"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="testimonial__content">
              <div class="testimonial__text">
                <p>I have taken Azure administrator online Training from Attari Classes. According to my experience the training was excellent. The LMS feature of Attari Classes is very beautiful, in this you can revise complete course multiple times. Thanks to Zameer sir, explained the overall topics in easiest way & entire training was practical oriented. If anyone want to pursue Azure administration, then I would like to recommend you Attari Classes.</p>
              </div>
            </div>
          </div>
        </div>
		
        <div class="item">
          <div class="testimonial_box">
            <div class="testimonial__header">
              <div class="row">
                <div class="col-lg-9 col-10">
                  <div class="testimonial__image">
                    <img src="https://lh3.googleusercontent.com/a-/ALV-UjX-oTlMSAJp6fio2U79POzqvY18Ix8r8cii0fx3rpuNjWs=w60-h60-p-rp-mo-br100" class="img-fluid d-block w-100 lazyload" alt>
                    <span class="testimonial__name">Vikas Kandekar</span>
                  </div>
                </div>
                <div class="col-lg-3 col-2">
                  <div class="testimonial__icon">
                    <i aria-hidden="true" class="fab fa-google-plus"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="testimonial__content">
              <div class="testimonial__text">
                <p>I'm attending azure training from attari online class and it's a best experience for me. Trainer has good experience in azure. If there is any questions or doubt in your mind releted to azure answer are always available with trainer. Duo to internet speed issue sometime few point got skipped but duo to LMS portal i can clear those points after online class over. LMS portal is very helpful for me.
</p>
              </div>
            </div>
          </div>
        </div>
		
        <div class="item">
          <div class="testimonial_box">
            <div class="testimonial__header">
              <div class="row">
                <div class="col-lg-9 col-10">
                  <div class="testimonial__image">
                    <img src="https://lh3.googleusercontent.com/a-/ALV-UjVt4XIdhrdW5G6XfSVBdzexST2kFOlaT9_jTs91e1hMVE8=w60-h60-p-rp-mo-br100" class="img-fluid d-block w-100 lazyload" alt>
                    <span class="testimonial__name">Mohd Irshad</span>
                  </div>
                </div>
                <div class="col-lg-3 col-2">
                  <div class="testimonial__icon">
                    <i aria-hidden="true" class="fab fa-google-plus"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="testimonial__content">
              <div class="testimonial__text">
                <p>As per my first time experience, Attari Class is one of the best online training for MCSE with practical.
I have attended Attari class for learning MCSE .
Zameer Sir is one of the best trainer for MCSE, the way of his teaching style was amazing.. Vice is Very Clear Thanx Zameer Sir.

They are providing LMS feature to us, it is really helps to revisit the topics and lectures multiple times.
After this course I think I've been moving a step and ahead.</p>
              </div>
            </div>
          </div>
        </div>
		
        <div class="item">
          <div class="testimonial_box">
            <div class="testimonial__header">
              <div class="row">
                <div class="col-lg-9 col-10">
                  <div class="testimonial__image">
                    <img src="https://lh3.googleusercontent.com/a-/ALV-UjV9GqkW2qrVUgHpF54bvon379Nq81MpIneCk86SjErjuvU=w60-h60-p-rp-mo-br100" class="img-fluid d-block w-100 lazyload" alt>
                    <span class="testimonial__name">Prathamesh Rane</span>
                  </div>
                </div>
                <div class="col-lg-3 col-2">
                  <div class="testimonial__icon">
                    <i aria-hidden="true" class="fab fa-google-plus"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="testimonial__content">
              <div class="testimonial__text">
                <p>I have attained training of MCSE from Attari Class, Course contents are very deep & LMS is always available for revision, I really appreciate Zameer sir who was always ready to support & share the knowledge. He had explained every concept very well.

Support staff is also very polite & helpful

Thanks a lot attari classes</p>
              </div>
            </div>
          </div>
        </div>
		
        <div class="item">
          <div class="testimonial_box">
            <div class="testimonial__header">
              <div class="row">
                <div class="col-lg-9 col-10">
                  <div class="testimonial__image">
                    <img src="https://lh3.googleusercontent.com/a-/ALV-UjUmOhOY88poyqw4PFe8GGJiNyzH6WMKpUk_eO21Y9TYwUY=w60-h60-p-rp-mo-br100" class="img-fluid d-block w-100 lazyload" alt>
                    <span class="testimonial__name">Reena T</span>
                  </div>
                </div>
                <div class="col-lg-3 col-2">
                  <div class="testimonial__icon">
                    <i aria-hidden="true" class="fab fa-google-plus"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="testimonial__content">
              <div class="testimonial__text">
                <p>I'm learning CCNA online nd The best part is LMS so u can watch training videos after training also. Thanks to Zameer sir for his excellent teaching skill. He is very polite.
</p>
              </div>
            </div>
          </div>
         </div>
			
			
            <div class="item">
              <div class="testimonial_box">
                <div class="testimonial__header">
                  <div class="row">
                    <div class="col-lg-9 col-10">
                      <div class="testimonial__image">
                        <img src="https://lh3.googleusercontent.com/a-/ALV-UjXxlbJTf0Et4zhPTA-i_p6SV2cWK6aSWt8y34cnGCjQ33g=w60-h60-p-rp-mo-br100" class="img-fluid d-block w-100 lazyload" alt>
                        <span class="testimonial__name">Naman Sharma</span>
                      </div>
                    </div>
                    <div class="col-lg-3 col-2">
                      <div class="testimonial__icon">
                        <i aria-hidden="true" class="fab fa-google-plus"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="testimonial__content">
                  <div class="testimonial__text">
                    <p>Positive environment, Quality learning, Deep teaching

From Attari classes I have done CCNA and Zameer sir has cleared many concept of CCNA with easy learning and he always motivate students for bright future.Best part of attari class is
1. Zameer sir and 2.LMS after the lecture we can view the classes again and Zameer is always 24×7 ready to clear any doubt.</p>
                  </div>
                </div>
              </div>
            </div>
			
          </div>
        </div>
      </div>
</section>

    <section class="enquiry_mobile_form d-block d-lg-none d-md-none">
        <div class="container">
        @include('frontend.component.common_form', [
                'section' => 'Training Option Page - Bottom Section - Book A Free Demo - Mobile View',
                'title'  => 'Book a <b>FREE</b> Demo',
                'Headingclassname'  => 'color_white',
            ])
            
        </div>
    </section>


    <!-------------=============== training option end =============== -------------------->

@endsection
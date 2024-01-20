<div>
 
    <div class="main-wraper">

        <section class="section bg-profile" id="profile_ripple">
            <div class="zoo-profile">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-print-6 align-self-center mb-3 mb-lg-0">
                            <div class="zoo-profile-main">
                                <div class="zoo-profile-main-pic"><img src="{{ asset('storage/'.$Header->image) }}" width="100" alt="my photo"
                                        class="rounded-circle"> <span class="zoo-user-message"><i
                                            class="uil uil-comment-dots"></i></span></div>
                                <!--end zoo-profile-main-pic-->
                                <div class="zoo-profile_user-detail">
                                    <h5 class="zoo-user-name">{{ $Header->name }}</h5>
                                    <p class="cd-headline loading-bar"><span class="cd-words-wrapper">
                                        @if($Header->i_can_do)
                                        @foreach($Header->i_can_do as $title)
                                        @if($loop->first)
                                        <b class="is-visible">{{ $title }}</b>
                                        @else
                                        <b>{{ $title }}</b>
                                        @endif
                                        @endforeach
                                        
                                        @endif
                                     </span></p>
                                </div><!--end zoo-profile_user-detail-->
                            </div><!--end profile-main-pic-->
                        </div><!--end col-->
                        <div class="col-sm-4 col-print-4 ml-auto">
                            <ul class="list-unstyled personal-detail">
                                <li><i class="'uil uil-phone-volume mr-2"></i> <b>phone </b>: {{ $Header->phone }}</li>
                                <li class="mt-2"><i class="uil uil-envelope mt-2 mr-2"></i> <b>Email </b>:
                                    {{ $Header->email }}</li>
                            </ul><!--end personal-detail-->
                            <ul class="list-inline social-icon mb-0">
                                @if($Header->soicalMedai)
                                @foreach($Header->soicalMedai as $icons)
                                @if($icons['status'] == true)
                                @if($icons['link'] !=null)
                                <li class="list-inline-item"><a href="{{ $icons['link'] }}" target="_blank">
                                    <img src="{{ asset('storage/'.$icons['icon']) }}" width="25" alt="my photo">
                                </a></li>
                                @endif
                                @endif

                                @endforeach
                                
                                @endif
                               
                            </ul><!--end social-icon-->
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end container-->
            </div><!--end zoo-profile-->
        </section>
       


        <section class="section-md">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4 class="header-title mb-3">{{ $AboutMe->section_title }}</h4>
                    </div><!--end col-->
                    <div class="col-sm-6 col-print-6">
                        <h4 class="text-primary font-weight-bold">{{ $AboutMe->name }}</h4>
                        <p>{{ $AboutMe->description }}</p><a href="{{ asset('storage/'.$AboutMe->download_cv) }}"
                            class="btn btn-sm btn-soft-primary" download>Download CV</a>
                    </div><!--end col-->
                    <div class="col-sm-5 col-print-5 offset-lg-1 align-self-center">
                        @if($AboutMe->info )
                        @foreach($AboutMe->info  as $data)
                        <p><span class="personal-detail-title">{{ $data['label_name'] }}</span> <span class="personal-detail-info">{{ $data['title'] }}</span></p>
                        @endforeach
                                @endif
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section>


        <section class="section-md">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4 class="header-title mb-3">{{ $EducationAndSkill->section_title }}</h4>
                    </div><!--end col-->
                    <div class="col-sm-6 col-print-6">
                        <div class="row">
                            <div class="col-sm-6 col-print-6">
                                <div class="resume-icon"><i class="uil uil-graduation-hat"></i>
                                    <h5 class="mt-n2">المؤهل العلمي</h5>
                                </div><!--end resume-icon-->
                                <div class="timeline">
                                @if($EducationAndSkill->educations)
                                @foreach($EducationAndSkill->educations as $data)
                                @if($data['education_status'] == true)
                                    <div class="time-item">
                                        <div class="item-info">
                                            <div class="font-14">{{ $data['date'] }}</div>
                                            <h5 class="my-1 text-dark">{{ $data['education_title'] }}</h5>
                                            <p>{{ $data['education_name'] }}</p>
                                        </div>
                                    </div>

                                    @endif
                                    @endforeach 
                                    @endif

                                </div>

                                <!--end timeline-->
                            </div><!--end col-->

                            <div class="col-sm-6 col-print-6">
                                <div class="resume-icon"><i class="uil uil-suitcase-alt"></i>
                                    <h5 class="mt-n2">الخبرات السابقة</h5>
                                </div><!--end resume-icon-->
                                <div class="timeline">

                                       @if($EducationAndSkill->skills)
                                @foreach($EducationAndSkill->skills as $data)
                                    @if($data['experience_status'] == true)
                                    <div class="time-item">
                                        <div class="item-info">
                                            <div class="font-14">{{ $data['date'] }}</div>
                                            <h5 class="my-1 text-dark">{{ $data['experience_job_title'] }}</h5>
                                            <p>{{ $data['experience_name'] }}</p>
                                        </div>
                                    </div>
                                    @endif

                                    @endforeach 
                                    @endif
                                  
                                </div><!--end timeline-->
                            </div><!--end col-->

                        </div><!--end row-->
                    </div><!--end col-->
                    <div class="col-sm-6 col-print-6 align-self-center">
                        <div class="skills mt-4">

                            @if($EducationAndSkill->skill_and_tools)
                            @foreach($EducationAndSkill->skill_and_tools as $data)
                                
                            <div class="skill-box">
                                <h4 class="skill-title">{{ $data['title'] }}</h4>
                                <div class="progress-line"><span data-percent="{{ $data['percentage'] }}" style="width: {{ $data['percentage'] }}%;"><span
                                            class="percent-tooltip">{{ $data['percentage'] }}%</span></span></div>
                            </div>

                                @endforeach 
                                @endif

                          
                            
                        </div><!--end skill-->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section>
        
       
        <section class="bg-funfact section-md">
            <div class="container">
                <div class="row justify-content-center" id="counter">
                    @if($Counter->count() > 0)
                    @foreach($Counter as $data)
                   
                    <div class="col-sm-4 digit-counter">
                        <div class="media">
                            <img  width="75" class="text-warning mr-2 align-self-center"  src="{{ asset('storage/'. $data->image) }}" alt="counter icon">
                            <div class="media-body align-self-center">
                                <h3 class="mb-1"><span class="counter-value" data-count="{{ $data->counter_number }}">0</span>+</h3>
                                <h5 class="counter-name mt-0">{{ $data->counter_title }}</h5>
                            </div>
                        </div><!--end media-->
                    </div><!--end col-->
                    @endforeach

                    @endif
                   

                </div><!--end row-->
            </div><!--end container-->
        </section>
       


        <section class="section-md my-work">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4 class="header-title mb-3">أعمالي ومراجعة العملاء</h4>
                    </div><!--end col-->
                    <div class="col-sm-6 col-print-6 align-self-center">
                        <div class="p-4">
                            <div class="text-center">
                                {{-- <h2><i class="uil uil-feedback text-primary"></i></h2> --}}
                            </div><!--end /div-->
                            <div id="carouselExampleFade2" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">

                                    @if($Review->count() > 0)

                                    @foreach($Review as $Review_client)
                                    @if($Review_client->status == true)
                                    @if($loop->first)

                                    <div class="carousel-item active">
                                        <div class="text-center">
                                            <p class="px-4">{{ $Review_client->clientReview }}</p>
                                            <div><img src="{{ asset("storage/".$Review_client->clientImage) }}" width="50" alt=""
                                                    class="rounded-circle thumb-md mb-2">
                                                <p class="mb-0 text-primary"><b>{{ $Review_client->clientName }}</b></p><small
                                                    class="text-muted">{{ $Review_client->clientJob }}</small>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="carousel-item">
                                        <div class="text-center">
                                            <p class="px-4">{{ $Review_client->clientReview }}</p>
                                            <div><img src="{{ asset("storage/".$Review_client->clientImage) }}" width="50" alt=""
                                                    class="rounded-circle thumb-md mb-2">
                                                <p class="mb-0 text-primary"><b>{{ $Review_client->clientName }}</b></p><small
                                                    class="text-muted">{{ $Review_client->clientJob }}</small>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endif
                                    @endforeach
                                    @endif


                                </div><!--end carousel-inner-->
                            </div><!--end carousel-->
                        </div><!--end /div-->
                    </div><!--end col-->
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <ul class="col container-filter categories-filter mb-4" id="filter">
                                        <li><a class="categories active" data-filter="*">All</a></li>
                                        <li><a class="categories" data-filter=".design">UI/UX Design</a></li>
                                        <li><a class="categories" data-filter=".frontend">Frontend</a></li>
                                        <li><a class="categories" data-filter=".backend">Backend</a></li>
                                    </ul><!--end col-->
                                </div><!-- End portfolio  -->
                                <div class="row container-grid nf-col-3 projects-wrapper">
                                    <div class="col-md-4 col-6 p-0 nf-item design">
                                        <div class="item-box"><a class="cbox-gallary1 mfp-image"
                                                href="images/portfolio/1.jpg" title="Apple"><img class="item-container"
                                                    src="images/portfolio/1.jpg" alt="7">
                                                <div class="item-mask">
                                                    <div class="item-caption">
                                                        <h5 class="text-white">Apple</h5>
                                                        <p class="text-white">UI/UX Design</p>
                                                    </div>
                                                </div>
                                            </a></div><!--end item-box-->
                                    </div><!--end col-->
                                    <div class="col-md-4 col-6 p-0 nf-item backend">
                                        <div class="item-box"><a class="cbox-gallary1 mfp-image"
                                                href="images/portfolio/2.jpg" title="Samsung"><img
                                                    class="item-container mfp-fade" src="images/portfolio/2.jpg"
                                                    alt="2">
                                                <div class="item-mask">
                                                    <div class="item-caption">
                                                        <h5 class="text-light">Samsung</h5>
                                                        <p class="text-light">Android</p>
                                                    </div>
                                                </div>
                                            </a></div><!--end item-box-->
                                    </div><!--end col-->
                                    <div class="col-md-4 col-6 p-0 nf-item design frontend">
                                        <div class="item-box"><a class="cbox-gallary1 mfp-image"
                                                href="images/portfolio/3.jpg" title="Facebook"><img
                                                    class="item-container" src="images/portfolio/3.jpg" alt="4">
                                                <div class="item-mask">
                                                    <div class="item-caption">
                                                        <h5 class="text-light">Facebook</h5>
                                                        <p class="text-light">Frontend</p>
                                                    </div>
                                                </div>
                                            </a></div><!--end item-box-->
                                    </div><!--end col-->
                                    <div class="col-md-4 col-6 p-0 nf-item design frontend">
                                        <div class="item-box"><a class="cbox-gallary1 mfp-image"
                                                href="images/portfolio/5.jpg" title="WhatsApp"><img
                                                    class="item-container" src="images/portfolio/5.jpg" alt="5">
                                                <div class="item-mask">
                                                    <div class="item-caption">
                                                        <h5 class="text-light">WhatsApp</h5>
                                                        <p class="text-light">Graphic Design</p>
                                                    </div>
                                                </div>
                                            </a></div><!--end item-box-->
                                    </div><!--end col-->
                                    <div class="col-md-4 col-6 p-0 nf-item design">
                                        <div class="item-box"><a class="cbox-gallary1 mfp-image"
                                                href="images/portfolio/6.jpg" title="Nokia"><img class="item-container"
                                                    src="images/portfolio/6.jpg" alt="6">
                                                <div class="item-mask">
                                                    <div class="item-caption">
                                                        <h5 class="text-light">Nokia</h5>
                                                        <p class="text-light">Web Design</p>
                                                    </div>
                                                </div>
                                            </a></div><!--end item-box-->
                                    </div><!--end col-->
                                    <div class="col-md-4 col-6 p-0 nf-item backend frontend">
                                        <div class="item-box"><a class="cbox-gallary1 mfp-image"
                                                href="images/portfolio/4.jpg" title="Oppo"><img class="item-container"
                                                    src="images/portfolio/4.jpg" alt="1">
                                                <div class="item-mask">
                                                    <div class="item-caption">
                                                        <h5 class="text-light">Oppo</h5>
                                                        <p class="text-light">Backend</p>
                                                    </div>
                                                </div>
                                            </a></div><!--end item-box-->
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section>
        


        <section class="section-md my-clients">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-2 col-6"><img src="images/brand/1.png" alt="" class="img-fluid"></div>
                    <!--end col-->
                    <div class="col-md-2 col-6"><img src="images/brand/2.png" alt="" class="img-fluid"></div>
                    <!--end col-->
                    <div class="col-md-2 col-6"><img src="images/brand/3.png" alt="" class="img-fluid"></div>
                    <!--end col-->
                    <div class="col-md-2 col-6"><img src="images/brand/4.png" alt="" class="img-fluid"></div>
                    <!--end col-->
                    <div class="col-md-2 col-6"><img src="images/brand/5.png" alt="" class="img-fluid"></div>
                    <!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <section class="section-md contact-form">
            <div class="container">
                <div class="row">
                    <div class="col-12 mb-3">
                        <h4 class="header-title mb-3">Contact Me</h4>
                    </div><!--end col-->
                    <div class="col-sm-4">
                        <div class="contact-info">
                            <div class="icon"><i class="uil uil-phone-volume"></i></div>
                            <div class="content">
                                <h5>Free Call To Me:</h5><span>(+1) 234-567-8910</span>
                            </div>
                        </div><!--end contact-info-->
                        <div class="contact-info">
                            <div class="icon"><i class="uil uil-envelope"></i></div>
                            <div class="content">
                                <h5>Mail Me:</h5><span>Your@example.com</span>
                            </div>
                        </div><!--end contact-info-->
                        <div class="contact-info">
                            <div class="icon"><i class="uil uil-map-marker"></i></div>
                            <div class="content">
                                <h5>Find Me:</h5><span>123 Lorem Ipsum, USA</span>
                            </div>
                        </div><!--end contact-info-->
                    </div><!--end col-->
                    <div class="col-sm-8">
                        <div class="contact-form">
                            <div id="message"></div>
                            <form method="post" action="https://mannatthemes.com/zoovara/horizontal-rtl/php/contact.php"
                                name="contact-form" id="contact-form">
                                <div class="row">
                                    <div class="form-group col-md-6"><label>Name</label> <input type="text" name="name"
                                            class="form-control" id="name"></div><!--end col-->
                                    <div class="form-group col-md-6"><label>Email address</label> <input type="email"
                                            name="email" class="form-control" id="email"></div><!--end col-->
                                    <div class="form-group col-md-12"><label>Message</label> <textarea rows="4"
                                            name="message" class="form-control" id="comments"></textarea></div>
                                    <!--end col-->
                                    <div class="form-group col-md-12"><input type="submit" value="Submit now"
                                            name="submit" id="submit" class="btn btn-primary px-5 py-2">
                                        <div id="simple-msg"></div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </form><!--end form-->
                        </div><!--end contact-form-->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <section class="section-md thanks-text">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="text-center">Thank you !</h3>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <footer class="footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <p class="copyright mb-0 py-4">© 2019. Design By Mannat-Theme</p>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </footer><!--end footer-area-->
    </div>
</div>

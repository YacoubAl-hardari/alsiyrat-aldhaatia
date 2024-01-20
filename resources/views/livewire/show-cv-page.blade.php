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
                                    <h5 class="zoo-user-name text-white">{{ $Header->name }}</h5>
                                    <p class="cd-headline loading-bar"><span class="cd-words-wrapper">
                                        @if($Header->i_can_do)
                                        @foreach($Header->i_can_do as $title)
                                        @if($loop->first)
                                        <b class="is-visible text-white">{{ $title }}</b>
                                        @else
                                        <b class="text-white">{{ $title }}</b>
                                        @endif
                                        @endforeach
                                        
                                        @endif
                                     </span></p>
                                </div><!--end zoo-profile_user-detail-->
                            </div><!--end profile-main-pic-->
                        </div><!--end col-->
                        <div class="col-sm-4 col-print-4 ml-auto">
                            <ul class="list-unstyled personal-detail">
                                <li class="text-white"><i class="'uil uil-phone-volume mr-2 text-white"></i> <b class="text-white">الهاتف </b>: {{ $Header->phone }}</li>
                                <li class="mt-2 text-white"><i class="uil uil-envelope mt-2 mr-2 text-white"></i> <b class="text-white">البريد الالكتروني </b>:
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
                            class="btn btn-sm btn-soft-primary" download>تحميل CV</a>
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
                   
                    <div class="col-sm-4 digit-counter my-2">
                        <div class="media">
                            <img  width="75" class="text-warning mr-2 align-self-center"  src="{{ asset('storage/'. $data->image) }}" alt="counter icon">
                            <div class="media-body align-self-center">
                                <h3 class="mb-1 text-white"><span class="counter-value text-white" data-count="{{ $data->counter_number }}">0</span>+</h3>
                                <h5 class="counter-name mt-0 text-white">{{ $data->counter_title }}</h5>
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
                                        <li><a class="categories active" data-filter="*">الكل</a></li>

                                        @if($MyWorkCategory->count() > 0)
                                        @foreach($MyWorkCategory as $MyWorkCategory_data)
                                        @if($MyWorkCategory_data->status == true)
                                        <li><a class="categories text-muted"  data-filter=".{{ $MyWorkCategory_data->name }}">{{ $MyWorkCategory_data->name }}</a></li>
                                        @endif
                                        @endforeach
                                        @endif

                                    </ul><!--end col-->
                                </div><!-- End portfolio  -->
                                <div class="row container-grid nf-col-3 projects-wrapper">

                                    @if($MyWork->count() > 0)
                                    @foreach($MyWork as $MyWork_data)
                                    @if($MyWork_data->status == true)
                                    <div class="col-md-4 col-6 p-0 nf-item {{ $MyWork_data->categories->name }}">
                                        <div class="item-box"><a class="cbox-gallary1 mfp-image"
                                                href="{{ asset('storage/'.$MyWork_data->image) }}" title="{{ $MyWork_data->title }}"><img class="item-container"
                                                    src="{{ asset('storage/'.$MyWork_data->image) }}" alt="7">
                                                <div class="item-mask">
                                                    <div class="item-caption">
                                                        <h5 class="text-white">{{ $MyWork_data->title }}</h5>
                                                        <p class="text-white">{{ $MyWork_data->categories->name }}</p>
                                                    </div>
                                                </div>
                                            </a></div><!--end item-box-->
                                    </div>
                                    @endif
                                    @endforeach
                                    @endif
                                   

                                </div><!--end row-->
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section>
        


        @if($ClientLogo->count() >0)
        <section class="section-md my-clients">
            <div class="container">
                <div class="row justify-content-between">

                    @foreach($ClientLogo as $logo)
                    <div class="col-md-2 col-6"><img src="{{ asset('storage/'.$logo->image) }}" alt="{{ $logo->name }}" style="aspect-ratio: 2/1;" class="img-fluid "></div>
                    @endforeach

                </div><!--end row-->
            </div><!--end container-->
        </section>
        @endif


        @if($ContactMe)
        <section class="section-md contact-form">
            <div class="container">
                <div class="row">
                    <div class="col-12 mb-3">
                        <h4 class="header-title mb-3">{{ $ContactMe->section_title }}</h4>
                    </div><!--end col-->
                    <div class="col-sm-4">
                        <div class="contact-info">
                            <div class="icon"><i class="uil uil-phone-volume"></i></div>
                            <div class="content" dir="ltr">
                                <h5>اتصل بنا:</h5><span>{{ $ContactMe->phone  }}</span>
                            </div>
                        </div><!--end contact-info-->
                        <div class="contact-info">
                            <div class="icon"><i class="uil uil-envelope"></i></div>
                            <div class="content">
                                <h5>البريدالالكتروني:</h5><span>{{ $ContactMe->email }}</span>
                            </div>
                        </div><!--end contact-info-->
                        <div class="contact-info">
                            <div class="icon"><i class="uil uil-map-marker"></i></div>
                            <div class="content">
                                <h5>العنوان:</h5><span>{{ $ContactMe->location }}</span>
                            </div>
                        </div><!--end contact-info-->
                    </div><!--end col-->
                    <div class="col-sm-8">
                        <div class="contact-form">
                            <div id="message"></div>
                            <form method="post" action="#"
                                name="contact-form" id="contact-form">
                                <div class="row">
                                    <div class="form-group col-md-6"><label>الاسم</label> <input type="text" name="الاسم"
                                            class="form-control" id="name"></div><!--end col-->
                                    <div class="form-group col-md-6"><label>البريد الالكتروني</label> <input type="email"
                                            name="email" class="form-control" id="email"></div><!--end col-->
                                    <div class="form-group col-md-12"><label>الرسالة</label> <textarea rows="4"
                                            name="message" class="form-control" id="comments"></textarea></div>
                                    <!--end col-->
                                    <div class="form-group col-md-12"><input type="submit" value="إرسال"
                                            name="submit" id="submit" class="btn btn-primary px-5 py-2">
                                        <div id="simple-msg"></div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </form><!--end form-->
                        </div><!--end contact-form-->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section>
        @endif
        
     
        <section class="section-md thanks-text">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="text-center">شكراً جزيلاً لتواصلك معنا</h3>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section>
        

        <footer class="footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <p class="copyright mb-0 py-4">© 2024. Yacoub Al-Haidari</p>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </footer><!--end footer-area-->
    </div>
</div>

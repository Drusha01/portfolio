<div  style="min-height:80vh;@if($mode == 0) background:#282828;color:white @else background:#fff;color:dark @endif" class="p-0 m-0">;
    @if($about_page_data && $about_page_active)
    <?php $color_toggle = !$color_toggle;?>
    <section id="about" class=" text-center text-sm-start" style="@if($color_toggle) @if($mode == 0) background:#282828;color:white @else background:#fff;color:dark @endif @else @if($mode == 0) background:#242424;color:white @else background:#F9F9F9;color:dark @endif @endif">
        <div class="container">
            <div class="d-sm-flex align-items-center">
                <img class="img-sm-fluid w-50  " src="{{asset('storage/content/about_pages/'.$about_page_data['0']->image)}}" alt="logo" class="logo">
                <div class="p-3">
                    <h1>  <span class="text-danger">{{$about_page_data['0']->header}}</span></h1>
                    <p class="lead my-4 d-none d-sm-block ">{{$about_page_data['0']->content}}</p>
                    <button class="btn btn-outline-primary btn-lg"> Hire Me</button>
                </div>
            </div>
        </div>
    </section>
    @else
    <!-- <section id="about" class="p-lg-0 pt-lg-0 text-center text-sm-start" @if($mode == 0) style="background:#282828;color:white" @else bg-dark style="background:#fff;color:dark" @endif>
        <div class="container">
            <div class="d-sm-flex align-items-center">
                <img class="img-sm-fluid w-50  " src="{{ asset('assets/page/drusha.png') }}" alt="logo" class="logo">
                <div class="p-3">
                    <h1> Hi, I am <span class="text-danger"> Hanrickson E. Dumapit </span></h1>
                    <p class="lead my-4 d-none d-sm-block ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi quod eligendi eius quidem natus hic rerum aspernatur cupiditate veritatis necessitatibus.</p>
                    <button class="btn btn-outline-primary btn-lg"> Hire Me</button>
                </div>
            </div>
        </div>
    </section> -->
    @endif

    @if(($links_data && $links_active) || ($about_content_data && $about_content_active) )
    <?php $color_toggle = !$color_toggle;?>
    <section id="about-content" class="p-1"  style="@if($color_toggle) @if($mode == 0) background:#282828;color:white @else background:#fff;color:dark @endif @else @if($mode == 0) background:#242424;color:white @else background:#F9F9F9;color:dark @endif @endif">
        @if($links_data && $links_active)
        <div class="container  my-5 p-sm-1">
            <div class="align-items-center text-center">
                <div class="row d-flex justify-content-center">
                    @foreach($links_data as $key => $value)
                        @if( ($key) == $links_max_display )
                            @break;
                        @endif
                        <div class=" col-md-3 px-md-5 col-6 mb-4">
                            <a href="@if($value->link){{$value->link}} @else # @endif" target="_blank" class="link-underline link-underline-opacity-0">
                                <img src="{{asset('storage/content/links/'.$value->image)}}" alt="" width="60px" >
                            </a>    
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
        @if($about_content_data && $about_content_active)
        <div class="container p-5">
            <div class="row d-flex justify-content-center g-md-5">
                <div class="col-md-6 text-center">
                    <img class="img-fluid " src="{{asset('storage/content/about_content/'.$about_content_data['0']->image)}}" alt="" style="border-radius:50%;width:300px" >
                </div>
                <div class="col-md-6">
                    <h3 class="h1 pb-3 text-uppercase">{{$about_content_data['0']->header}}</h3>
                    <p class="h5 pb-2">{{$about_content_data['0']->content}}</p>
                </div>
            </div>
        </div>
        @endif
    </section>
    @else
    <!-- <section id="about-content" class="p-1" style="@if($mode == 0) background:#242424;color:white @else background:#F9F9F9;color:dark @endif">
        <div class="container  my-5 p-sm-1">
            <div class="align-items-center text-center">
                <div class="row ">
                    <div class=" col-md-3 px-md-5 col-6 mb-4">
                        <a href="#" class="link-underline link-underline-opacity-0">
                            <img src="{{ asset('assets/logo/facebook.png') }}" alt="" width="60px" >
                        </a>    
                    </div>
                    <div class="col-md-3 px-md-5 col-6 mb-4">
                        <a href="#" class="link-underline link-underline-opacity-0">
                            <img src="{{ asset('assets/logo/instagram.png') }}" alt="" width="60px" >
                        </a>
                    </div>
                    <div class="col-md-3 px-md-5 col-6 mb-4">
                        <a href="#" class="link-underline link-underline-opacity-0">
                            <img src="{{ asset('assets/logo/linkedin.png') }}" alt="" width="60px" >
                        </a> 
                    </div>
                    <div class="col-md-3 px-md-5 col-6 mb-4">
                        <a href="#" class="link-underline link-underline-opacity-0">
                            <img src="{{ asset('assets/logo/github.png') }}" alt="" width="60px" >
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container p-5">
            <div class="row d-flex justify-content-center g-md-5">
                <div class="col-md-6 text-center">
                    <img class="img-fluid " src="{{ asset('assets/page/coding.jpg') }}" alt="" style="border-radius:50%;width:300px" >
                </div>
                <div class="col-md-6">
                    <h3 class="h1 pb-3 text-uppercase">About</h3>
                    <p class="h5 pb-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Debitis modi nulla, veritatis deleniti harum velit ipsum et sunt doloremque magni quia placeat reprehenderit quas minus voluptatibus ipsam eligendi id esse!</p>
                    <p class="h5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Qui illum neque commodi consectetur dolorem veritatis aut quis architecto doloribus voluptate.</p>
                </div>
            </div>
        </div>
    </section> -->
    @endif
    @if($experience_data && $experience_active)
    <?php $color_toggle = !$color_toggle;?>
    <section id="experience" class="pt-5 pb-5"style="@if($color_toggle) @if($mode == 0) background:#282828;color:white @else background:#fff;color:dark @endif @else @if($mode == 0) background:#242424;color:white @else background:#F9F9F9;color:dark @endif @endif">
        <div class="container my-5 p-sm-1">
            <div class="align-items-center">
                <h3 class="h1 pb-5 text-uppercase text-center">Experiences</h3>
                <div class="row">
                    @foreach($experience_data as $key => $value)
                        @if( ($key) == $experience_max_display )
                            @break;
                        @endif
                            <div class="col-12 p-5">
                                <div class="row">
                                    <div class="col-sm-12 col-md-2">
                                        <img class="pt-2 pb-2 " src="{{asset('storage/content/experience/'.$value->logo)}}" alt="" width="80px" >
                                    </div>
                                    <div class="col-10">
                                        <a href="@if($value->link) {{$value->link}} @else # @endif"  class="link-underline link-underline-opacity-0 @if($mode == 1) link-dark @else link-light @endif ">
                                            <h3>{{$value->title}}</h3>
                                        </a>
                                        <p>{{date_format(date_create($value->start_date), "F Y ")}} - @if($value->end_date){{date_format(date_create($value->end_date), "F Y ")}} @else Present @endif | @if($value->location) {{$value->location}} @endif</p>
                                        <p>{{$value->type}}</p>
                                    </div>
                                </div>
                            </div>
                            @if ($key !== array_key_last($experience_data)) 
                            <div class="col-12 p-1">
                                <hr>
                            </div>
                            @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @else
    <!-- <section id="experience" class="pt-5 pb-5" @if($mode == 0) style="background:#282828;color:white" @else bg-dark style="background:#fff;color:dark" @endif>
        <div class="container my-5 p-sm-1">
            <div class="align-items-center">
                <h3 class="h1 pb-5 text-uppercase text-center">Experiences</h3>
                <div class="row">
                    <div class="col-12 p-5">
                        <div class="row">
                            <div class="col-sm-12 col-md-2">
                                <img class="pt-2 pb-2 " src="{{ asset('assets/page/atgs.jpg') }}" alt="" width="80px" >
                            </div>
                            <div class="col-10">
                                <a href="#"  class="link-underline link-underline-opacity-0 @if($mode == 1) link-dark @else link-light @endif ">
                                    <h3 >Ally Techno Grit Solutions</h3>
                                </a>
                                <p>June 2023 - Sept 2023 | Brgy. San Antonio Pasig City, Metro Manila</p>
                                <p>Internship</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    @endif
    @if($education_data && $education_active)
    <?php $color_toggle = !$color_toggle;?>
    <section id="education" class="pt-5 pb-5" style="@if($color_toggle) @if($mode == 0) background:#282828;color:white @else background:#fff;color:dark @endif @else @if($mode == 0) background:#242424;color:white @else background:#F9F9F9;color:dark @endif @endif"> 
        <div class="container my-5 p-sm-1">
            <div class="align-items-center">
                <h3 class="h1 pb-5 text-uppercase text-center ">Education</h3>
                <div class="row">
                    @foreach($education_data as $key => $value)
                        @if( ($key) == $education_max_display )
                            @break;
                        @endif
                        <div class="col-12 p-5">
                            <div class="row">
                                <div class="col-sm-12 col-md-2">
                                    <img class="pt-2 pb-2 rounded-circle" src="{{asset('storage/content/education/'.$value->logo)}}" alt="" width="80px" >
                                </div>
                                <div class="col-10">
                                    <a href="@if($value->link) {{$value->link}} @else # @endif"  class="link-underline link-underline-opacity-0 @if($mode == 1) link-dark @else link-light @endif ">
                                        <h3>{{$value->title}}</h3>
                                    </a>
                                    <p>{{date_format(date_create($value->start_date), "Y ")}} - @if($value->end_date){{date_format(date_create($value->end_date), "Y ")}} @else Present @endif | @if($value->location) {{$value->location}} @endif</p>
                                    <p>{{$value->type}}</p>
                                </div>
                            </div>
                        </div>
                        @if ($key !== array_key_last($education_data)) 
                            <div class="col-12 p-1">
                                <hr>
                            </div>
                        @endif
                    @endforeach
                    
                </div>
            </div>
        </div>
    </section>
    @else
    <!-- <section id="education" class="pt-5 pb-5" style="@if($mode == 0) background:#242424;color:white @else background:#F9F9F9;color:dark @endif"> 
        <div class="container my-5 p-sm-1">
            <div class="align-items-center">
                <h3 class="h1 pb-5 text-uppercase text-center ">Education</h3>
                <div class="row">
                    <div class="col-12 p-5">
                        <div class="row">
                            <div class="col-sm-12 col-md-2">
                                <img class="pt-2 pb-2 rounded-circle" src="{{ asset('assets/page/wmsu_white.jpg') }}" alt="" width="80px" >
                            </div>
                            <div class="col-10">
                                <a href="#"  class="link-underline link-underline-opacity-0 @if($mode == 1) link-dark @else link-light @endif ">
                                    <h3 >Western Mindanao State University</h3>
                                </a>
                                <p>2020 - Present | Normal Rd, Zamboanga, 7000 Zamboanga del Sur</p>
                                <p>Bachelor's</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 p-1">
                        <hr>
                    </div>
                    <div class="col-12 p-5">
                        <div class="row">
                            <div class="col-sm-12 col-md-2">
                                <img class="pt-2 pb-2 rounded-circle" src="{{ asset('assets/page/pilar_college.png') }}" alt="" width="80px" >
                            </div>
                            <div class="col-10">
                                <a href="#"  class="link-underline link-underline-opacity-0 @if($mode == 1) link-dark @else link-light @endif ">
                                    <h3 >Pilar College, Inc</h3>
                                </a>
                                <p>2016 - 2018 | RT Lim Boulevard, Zamboanga, 7000 Zamboanga del Sur</p>
                                <p>Secondary</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 p-1">
                        <hr>
                    </div>
                    <div class="col-12 p-5">
                        <div class="row">
                            <div class="col-sm-12 col-md-2">
                                <img class="pt-2 pb-2 rounded-circle" src="{{ asset('assets/page/pilar_college.png') }}" alt="" width="80px" >
                            </div>
                            <div class="col-10">
                                <a href="#"  class="link-underline link-underline-opacity-0 @if($mode == 1) link-dark @else link-light @endif ">
                                    <h3 >Pilar College, Inc</h3>
                                </a>
                                <p>2012 - 2016 | RT Lim Boulevard, Zamboanga, 7000 Zamboanga del Sur</p>
                                <p>Secondary</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 p-1">
                        <hr>
                    </div>
                    <div class="col-12 p-5">
                        <div class="row">
                            <div class="col-sm-12 col-md-2">
                                <img class="pt-2 pb-2 rounded-circle" src="{{ asset('assets/page/mes.jpg') }}" alt="" width="80px" >
                            </div>
                            <div class="col-10">
                                <a href="#"  class="link-underline link-underline-opacity-0 @if($mode == 1) link-dark @else link-light @endif ">
                                    <h3 >Malagutay Elementary School</h3>
                                </a>
                                <p>2006 - 2012 | Malagutay, Zamboanga, 7000 Zamboanga del Sur</p>
                                <p>Primary</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section> -->
    @endif

    

</div>

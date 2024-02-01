<div style="z-index:2;">
    @if($homepage_data )
        @foreach( $homepage_data as $key => $value)
            @if( $value->table_name == 'About Page' && $value->table_isactive == 1 )
                <?php $color_toggle = !$color_toggle;
                    $this->about_page_data = DB::table('about_pages')
                    ->where('user_id','=',$this->user_id )
                    ->get()
                    ->toArray();
                ?>
                @if($this->about_page_data)
                    <section id="about" class="p-lg-0 pt-lg-0 text-center text-sm-start" style="@if($color_toggle) @if($mode == 0) background:#282828;color:white @else background:#fff;color:dark @endif @else @if($mode == 0) background:#242424;color:white @else background:#F9F9F9;color:dark @endif @endif">
                        <div class="container">
                            <div class="d-sm-flex align-items-center">
                                <img class="img-sm-fluid w-50  " alt="Hanrickson E. Dumapit Web Developer"  src="{{asset('storage/content/about_pages/'.$this->about_page_data['0']->image)}}" alt="logo" class="logo">
                                <div class="p-3">
                                    <h1>  <span class="text-danger">{{$this->about_page_data['0']->header}}</span></h1>
                                    <p class="lead my-4 d-none d-sm-block ">{{$this->about_page_data['0']->content}}</p>
                                    <button class="btn btn-outline-primary btn-lg"> Hire Me</button>
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
            @elseif( $value->table_name == 'About Contents' && $value->table_isactive == 1 || $value->table_name == 'Links' && $value->table_isactive == 1 )
                @if($value->table_name == 'Links' && $value->table_isactive == 1)
                    <?php 
                    $color_toggle = !$color_toggle;
                    $this->links_data = DB::table('links')
                    ->where('user_id','=',$this->user_id )
                    ->orderBy('number_order','asc')
                    ->get()
                    ->toArray();
                    $this->about_content_data = null;
                    ?>
                @endif
                @if( $value->table_name == 'About Contents' && $value->table_isactive == 1)
                    <?php
                    $this->about_content_data = DB::table('about_content')
                    ->where('user_id','=',$this->user_id )
                    ->get()
                    ->toArray();
                    $this->links_data = null;
                    ?>
                @endif
                    @if($this->about_content_data || $this->links_data)
                    <section id="about-content" class="p-1"  style="@if($color_toggle) @if($mode == 0) background:#282828;color:white @else background:#fff;color:dark @endif @else @if($mode == 0) background:#242424;color:white @else background:#F9F9F9;color:dark @endif @endif">
                        @if($this->links_data && $value->table_isactive == 1 )
                        <div class="container  my-5 p-sm-1">
                            <div class="align-items-center text-center">
                                <div class="row d-flex justify-content-center">
                                    @foreach($this->links_data as $link_key => $link_value)
                                        @if( ($link_key) == $value->table_max_display )
                                            @break;
                                        @endif
                                        <div class=" col-md-3 px-md-5 col-6 mb-4">
                                            <a href="@if($link_value->link){{$link_value->link}} @else # @endif" target="_blank" class="link-underline link-underline-opacity-0">
                                                <img  alt="Hanrickson E. Dumapit Web Developer" src="{{asset('storage/content/links/'.$link_value->image)}}" alt="" width="60px" >
                                            </a>    
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($this->about_content_data && $value->table_isactive == 1)
                        <div class="container p-5">
                            <div class="row d-flex justify-content-center g-md-5">
                                <div class="col-md-6 text-center">
                                    <img class="img-fluid "  alt="Hanrickson E. Dumapit Web Developer" src="{{asset('storage/content/about_content/'.$this->about_content_data['0']->image)}}" alt="" style="border-radius:50%;width:300px" >
                                </div>
                                <div class="col-md-6">
                                    <h3 class="h1 pb-3 text-uppercase">{{$this->about_content_data['0']->header}}</h3>
                                    <p class="h5 pb-2">{{$this->about_content_data['0']->content}}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                    </section>
                @endif
            @elseif( $value->table_name == 'Skills' && $value->table_isactive == 1 )
                <?php 
                $color_toggle = !$color_toggle;
                    $this->skill_data = DB::table('skills')
                    ->where('user_id','=',$this->user_id )
                    ->orderBy('number_order','asc')
                    ->get()
                    ->toArray();
                ?>
                @if($this->skill_data)
                    <section id="skills" class="pt-5 pb-5" style="@if($color_toggle) @if($mode == 0) background:#282828;color:white @else background:#fff;color:dark @endif @else @if($mode == 0) background:#242424;color:white @else background:#F9F9F9;color:dark @endif @endif">
                        <div class="container my-5">
                            <div class="align-items-center ">
                                <h3 class="h1 pb-5 text-uppercase text-center">Skills</h3>
                                <div class="row text-center">
                                    @foreach($this->skill_data as $skill_key => $skill_value)
                                        @if( ($skill_key) == $value->table_max_display )
                                            @break;
                                        @endif
                                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 mb-4 pb-sm-5 pb-md-3 pb-lg-5 d-flex justify-content-center" style="" >
                                                <a href="#" class="link-underline link-underline-opacity-0">
                                                    <div class=" border border-dark @if($mode == 1) bg-light @else  bg-secondary @endif rounded-4 " style="--bs-bg-opacity: .5;width:180px;height:200px">
                                                        <div style="height:135px">
                                                            <img class="pt-4 pb-2"  alt="Hanrickson E. Dumapit Web Developer" src="{{asset('storage/content/skills/'.$skill_value->image)}}" alt="" width="80px" >
                                                        </div>
                                                        <h3 class="@if($mode == 1) text-dark @else  text-light @endif align-text-bottom">{{$skill_value->header}}</h3>
                                                    </div>
                                                </a>
                                            </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
            @elseif( $value->table_name == 'Projects' && $value->table_isactive == 1 )
                <?php 
                $color_toggle = !$color_toggle;
                    $this->projects = DB::table('projects')
                    ->where('user_id','=',$this->user_id )
                    ->orderBy('number_order','asc')
                    ->get()
                    ->toArray();
                ?>
                @if($this->projects)
                    <section id="projects" class="pt-5 pb-5" style="@if($color_toggle) @if($mode == 0) background:#282828;color:white @else background:#fff;color:dark @endif @else @if($mode == 0) background:#242424;color:white @else background:#F9F9F9;color:dark @endif @endif">
                        <div class="container my-5 p-sm-1">
                            <div class="align-items-center">
                                <h3 class="h1 pb-5 text-uppercase text-center">Projects</h3>
                                <div class="container swiper projects" >
                                    <div class="swiper-wrapper">
                                        @foreach($this->projects as $project_key => $project_value)
                                            @if( ($project_key) == $value->table_max_display )
                                                @break;
                                            @endif
                                                <?php 
                                                    $project_image_contents = DB::table('project_image_contents')
                                                    ->where('project_id','=', $project_value->id)
                                                    ->where('user_id','=',$this->user_id)
                                                    ->orderBy('number_order','asc')
                                                    ->first();
                                                ?>
                                                <div class="swiper-slide border border-dark rounded-4 @if($mode == 1) bg-light @else bg-secondary @endif ">
                                                    <div class="row p-2">
                                                        <div class="col-6" >
                                                            <img class="p-2 rounded-start-4"  alt="Hanrickson E. Dumapit Projects" src="{{asset('storage/content/project_image_contents/'. $project_image_contents->image)}}" alt="Hanrickson E. Dumapit, Drusha" style="width:100%;height:100%;object-fit:contain">
                                                        </div>
                                                        <div class="col-6 col-xs-6 p-sm-3 " style="max-height:650px;overflow: auto;">
                                                            <div class="row">
                                                                <h3 class="text-start text-info pt-md-5 pt-sm-5" style="width:inherit;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                                                    {{$project_value->title}}
                                                                </h3>
                                                            </div>
                                                        <div class="row">
                                                                <div class="col">
                                                                    <a class="justify-content-start link-underline link-underline-opacity-0 " target="_blank" href="@if($project_value->link) {{$project_value->link}} @else # @endif"> 
                                                                        <button class="text-start btn @if($mode == 0) btn-outline-light @else btn-outline-dark @endif btn-md m-1 px-3"><strong>  {{$project_value->button}}</strong> </button>
                                                                    </a>
                                                                </div>
                                                        </div>
                                                        <div class="row pt-3 d-none">
                                                            <div class="col">
                                                                <p class="text-start h6 d-none d-md-block " style="width:inherit;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                                                    <span class="m-1 p-2 badge @if($mode == 0) text-bg-light text-dark @else  text-bg-secondary text-light @endif">
                                                                        Secondary
                                                                    </span> 
                                                                    <span class="m-1 p-2 badge @if($mode == 0) text-bg-light text-dark @else  text-bg-secondary text-light @endif">
                                                                        Secondary
                                                                    </span> 
                                                                    <span class="m-1 p-2 badge @if($mode == 0) text-bg-light text-dark @else  text-bg-secondary text-light @endif">
                                                                        Secondary
                                                                    </span> 
                                                                    <span class="m-1 p-2 badge @if($mode == 0) text-bg-light text-dark @else  text-bg-secondary text-light @endif">
                                                                        Secondary
                                                                    </span> 
                                                                    <span class="m-1 p-2 badge @if($mode == 0) text-bg-light text-dark @else  text-bg-secondary text-light @endif">
                                                                        Secondary
                                                                    </span> 
                                                                    <span class="m-1 p-2 badge @if($mode == 0) text-bg-light text-dark @else  text-bg-secondary text-light @endif">
                                                                        Secondary
                                                                    </span> 
                                                                    <span class="m-1 p-2 badge @if($mode == 0) text-bg-light text-dark @else  text-bg-secondary text-light @endif">
                                                                        Secondary
                                                                    </span> 
                                                                    <span class="m-1 p-2 badge @if($mode == 0) text-bg-light text-dark @else  text-bg-secondary text-light @endif">
                                                                        Secondary
                                                                    </span> 
                                                                    <span class="m-1 p-2 badge @if($mode == 0) text-bg-light text-dark @else  text-bg-secondary text-light @endif">
                                                                        Secondary
                                                                    </span> 
                                                                    <span class="m-1 p-2 badge @if($mode == 0) text-bg-light text-dark @else  text-bg-secondary text-light @endif">
                                                                        Secondary
                                                                    </span> 
                                                                    <span class="m-1 p-2 badge @if($mode == 0) text-bg-light text-dark @else  text-bg-secondary text-light @endif">
                                                                        Secondary
                                                                    </span> 
                                                                    <span class="m-1 p-2 badge @if($mode == 0) text-bg-light text-dark @else  text-bg-secondary text-light @endif">
                                                                        Secondary
                                                                    </span> 
                                                                    <span class="m-1 p-2 badge @if($mode == 0) text-bg-light text-dark @else  text-bg-secondary text-light @endif">
                                                                        Secondary
                                                                    </span> 
                                                                    <span class="m-1 p-2 badge @if($mode == 0) text-bg-light text-dark @else  text-bg-secondary text-light @endif">
                                                                        Secondary
                                                                    </span> 
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="row pt-3">
                                                            <div class="col">
                                                                <p class="text-start lead d-none d-lg-block overflow-auto" style="width:inherit;max-height:450px" >
                                                                    {{$project_value->content}}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>       
                                        @endforeach                         
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-pagination"></div>
                                    <script>
                                        var swiper = new Swiper(".projects", {
                                        spaceBetween: 30,
                                        centeredSlides: true,
                                        autoplay: {
                                            delay: 2500,
                                            disableOnInteraction: false,
                                        },
                                        pagination: {
                                            el: ".swiper-pagination",
                                            clickable: true,
                                        },
                                        navigation: {
                                            nextEl: ".swiper-button-next",
                                            prevEl: ".swiper-button-prev",
                                        },
                                        });
                                    </script>
                                </div>
                                <div class="p-4 text-center"><a href="/projects" class="link-underline link-underline-opacity-0"><h4>View All</h4></a></div>
                            </div>
                        </div>
                    </section>
                @endif
            @elseif( $value->table_name == 'Blogs' && $value->table_isactive == 1 )
                <?php 
                $color_toggle = !$color_toggle;
                    $this->blogs = DB::table('blogs')
                    ->where('user_id','=',$this->user_id )
                    ->orderBy('date_created','asc')
                    ->get()
                    ->toArray();
                ?>
                @if($this->blogs)
                <section id="blog" class="pt-5 pb-5" style="@if($color_toggle) @if($mode == 0) background:#282828;color:white @else background:#fff;color:dark @endif @else @if($mode == 0) background:#242424;color:white @else background:#F9F9F9;color:dark @endif @endif">
                    <div class="container my-5 p-sm-1">
                        <div class="align-items-center">
                            <h3 class="h1 pb-5 text-uppercase text-center ">MyBlog</h3>
                            <div class="row p-3 d-flex justify-content-center">
                                @foreach($this->blogs as $blog_key => $blog_value)
                                    @if( ($blog_key) == $value->table_max_display )
                                        @break;
                                    @endif
                                    
                                        <div class="col-lg-5 col-md-6 rounded-4 m-3 border @if($mode == 1) border-dark @else border-light @endif" style="height:600px">
                                            <div class="row" >
                                                <div class="col-12 rounded-4">
                                                    <img class="pt-3 pb-3 " alt="Hanrickson E. Dumapit Web Developer" src="{{asset('storage/content/blogs/'. $blog_value->image)}}" alt="" style="object-fit:cover;width:inherit;max-height:350px" >
                                                </div>
                                            </div>
                                            @if(isset($this->user_id) && $this->user_id ==1 )
                                                <a href="blogdetails/{{$blog_value->id}}" class=" link-underline link-underline-opacity-0 @if($mode == 1) text-dark @else text-light @endif">
                                            @endif
                                            <div class="row" >
                                                <div class="col-12">
                                                    <h2  style="width:inherit;overflow: hidden;text-overflow: ellipsis;white-space: nowrap; " >{{$blog_value->title}}</h2>
                                                </div>
                                            </div>
                                            @if(isset($this->user_id) && $this->user_id ==1 )
                                                </a>
                                            @endif
                                            <?php 
                                                $this->tag_data = DB::table('blog_tags as bt')
                                                    ->select(
                                                        'bt.id',
                                                        'tag_details',
                                                        'bt.tag_id'
                                                    )
                                                    ->join('tags as t','t.id','bt.tag_id')
                                                    ->where('user_id','=',$this->user_id )
                                                    ->where('blog_id','=',$blog_value->id)
                                                    ->get()
                                                    ->toArray();
                                            ?>
                                            @if($this->tag_data )
                                            <div class="row p-1" >
                                                <div class="col-12">
                                                    <div style="width:inherit;overflow: hidden;text-overflow: ellipsis;white-space: nowrap; " >
                                                        @foreach($this->tag_data as $tag_key => $tag_value)
                                                            <a href="/blog/@if(isset($this->user_id) && $this->user_id !=1 ){{$this->user_id.'/'}}@endif{{'tag/'.$tag_value->tag_details}}">
                                                                <span class="m-1 p-2 badge @if($mode == 0) text-bg-light text-dark @else  text-bg-secondary text-light @endif">
                                                                    {{$tag_value->tag_details}}
                                                                </span>
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            <div class="row p-1" >
                                                <div class="col-12">
                                                    <p class="overflow-auto h6" style="width:inherit;max-height:200px" >
                                                        {{$blog_value->content}}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </section>    
                @endif
            @elseif( $value->table_name == 'Experiences' && $value->table_isactive == 1 )
                <?php 
                    $color_toggle = !$color_toggle;
                    $this->experience_data = DB::table('experiences')
                        ->where('user_id','=',$this->user_id )
                        ->orderBy('number_order','asc')
                        ->get()
                        ->toArray();
                    ?>
                
                @if($this->experience_data)
                    <section id="experience" class="pt-5 pb-5"style="@if($color_toggle) @if($mode == 0) background:#282828;color:white @else background:#fff;color:dark @endif @else @if($mode == 0) background:#242424;color:white @else background:#F9F9F9;color:dark @endif @endif">
                        <div class="container my-5 p-sm-1">
                            <div class="align-items-center">
                                <h3 class="h1 pb-5 text-uppercase text-center">Experiences</h3>
                                <div class="row">
                                    @foreach($this->experience_data as $exp_key => $exp_value)
                                        @if( ($exp_key) == $value->table_max_display )
                                            @break;
                                        @endif
                                            <div class="col-12 p-5">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-2">
                                                        <img class="pt-2 pb-2 "  alt="Hanrickson E. Dumapit Experience" src="{{asset('storage/content/experience/'.$exp_value->logo)}}" alt="" width="80px" >
                                                    </div>
                                                    <div class="col-10">
                                                        <a href="@if($exp_value->link) {{$exp_value->link}} @else # @endif"  class="link-underline link-underline-opacity-0 @if($mode == 1) link-dark @else link-light @endif ">
                                                            <h3>{{$exp_value->title}}</h3>
                                                        </a>
                                                        <p>{{date_format(date_create($exp_value->start_date), "F Y ")}} - @if($exp_value->end_date){{date_format(date_create($exp_value->end_date), "F Y ")}} @else Present @endif | @if($exp_value->location) {{$exp_value->location}} @endif</p>
                                                        <p>{{$exp_value->type}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @if ($exp_key !== array_key_last($this->experience_data)) 
                                            <div class="col-12 p-1">
                                                <hr>
                                            </div>
                                            @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
            @elseif( $value->table_name == 'Educations' && $value->table_isactive == 1 )
                <?php 
                $color_toggle = !$color_toggle;
                $this->education_data = DB::table('education')
                    ->where('user_id','=',$this->user_id )
                    ->orderBy('number_order','asc')
                    ->get()
                    ->toArray();
                ?>
                @if($this->education_data)
                    <section id="education" class="pt-5 pb-5" style="@if($color_toggle) @if($mode == 0) background:#282828;color:white @else background:#fff;color:dark @endif @else @if($mode == 0) background:#242424;color:white @else background:#F9F9F9;color:dark @endif @endif"> 
                        <div class="container my-5 p-sm-1">
                            <div class="align-items-center">
                                <h3 class="h1 pb-5 text-uppercase text-center ">Education</h3>
                                <div class="row">
                                    @foreach($this->education_data as $educ_key => $educ_value)
                                        @if( ($educ_key) == $value->table_max_display )
                                            @break;
                                        @endif
                                        <div class="col-12 p-5">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-2">
                                                    <img class="pt-2 pb-2 rounded-circle"   alt="Hanrickson E. Dumapit Web Developer" src="{{asset('storage/content/education/'.$educ_value->logo)}}" alt="" width="80px" >
                                                </div>
                                                <div class="col-10">
                                                    <a href="@if($educ_value->link) {{$educ_value->link}} @else # @endif"  class="link-underline link-underline-opacity-0 @if($mode == 1) link-dark @else link-light @endif ">
                                                        <h3>{{$educ_value->title}}</h3>
                                                    </a>
                                                    <p>{{date_format(date_create($educ_value->start_date), "Y ")}} - @if($educ_value->end_date){{date_format(date_create($educ_value->end_date), "Y ")}} @else Present @endif | @if($educ_value->location) {{$educ_value->location}} @endif</p>
                                                    <p>{{$educ_value->type}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @if ($educ_key !== array_key_last($this->education_data)) 
                                            <div class="col-12 p-1">
                                                <hr>
                                            </div>
                                        @endif
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
            @endif
        @endforeach
    @else
    <h2>NO DATA ADDED YET</h2>
    @endif
</div>
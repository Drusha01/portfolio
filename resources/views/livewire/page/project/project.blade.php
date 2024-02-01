<div class="p-0 m-0" style="min-height:80vh;@if($mode == 0) background:#282828;color:white; @else background:#fff;color:dark; @endif  font-family: 'Open Sans', sans-serif;font-size: 16px;">
    <section id="project" class="" >
        <div class="container text-center  ">
            <div class="align-items-center">
                <h3 class="h1 pb-2 pt-4 text-uppercase">Projects</h3>
            </div>
            <div>

         
            @if($project_data)
                @foreach ($project_data as $key =>$value)
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-12 col-md-12 col-sm-12 mx-lg-5 shadow ">
                        <div class="col-12 p-0 m-0 ">
                            @if(count($value['project_image_contents'])>0)
                            <div class="row">
                                <div class="col-12 p-0">
                                    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper-{{$key}}-1 ">
                                        <div class="swiper-wrapper mb-2" style="width:inherit;max-height:650px">
                                                @foreach($value['project_image_contents'] as $pic_key =>$pic_value)
                                                    <div class="swiper-slide">
                                                        <img  alt="Hanrickson E. Dumapit Web Developer" src="{{asset('storage/content/project_image_contents/'.$pic_value['image'])}}" style="object-fit:cover;width:inherit;max-height:650px"/>
                                                    </div>
                                                @endforeach
                                        </div>
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                    
                                    </div>
                                </div>
                            </div>
                        
                            <div class="row">
                                <div class="col-12 shadow p-0">
                                    <div thumbsSlider="" class="swiper mySwiper-{{$key}}-2" >
                                        <div class="swiper-wrapper" style="max-width:inherit;max-height:150px;">
                                            @foreach($value['project_image_contents'] as $pic_key =>$pic_value)
                                                <img  alt="Hanrickson E. Dumapit Web Developer" class="col-3 swiper-slide" src="{{asset('storage/content/project_image_contents/'.$pic_value['image'])}}" />
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="row">
                                <p class="h4 text-start px-5 pt-5" style="width:inherit;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><strong>{{$value['title']}}</strong></h2>
                            </div>
                            <div class="row">
                                <div class="col-12 text-start px-5 py-2"><span><i class="bi bi-person"></i> {{$value['user_firstname'].' '.$value['user_middlename'].' '.$value['user_lastname']}}   &#160; &#160; &#160; &#160;<i class="bi bi-clock"></i> &#160;{{date_format(date_create($value['date_created']), "F d, Y ")}}</span></div>
                            </div>
                            @if(strlen($value['button'])>0)
                                <div class="row">
                                    <div class="col-6 text-start px-5 py-2">
                                        <a href="{{$value['link']}}" target="_blank">
                                            <button class="btn @if($mode) btn-primary @else btn-outline-primary @endif">
                                                {{$value['button']}}
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-12 text-start px-5 py-2 overflow-hidden"  style="max-height:200px" >
                                    <p>{{$value['content']}}</p>
                                
                                </div>
                            </div>
                            @if(count($value['project_developers'])>0)
                                <div class="row pt-5">
                                    <div class="col pt-5 text-center">
                                        <h2>Developers</h2>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center " >
                                    @foreach($value['project_developers'] as $pd_key =>$pd_value)
                                        <div class="col-md-6 col-lg-4 d-flex justify-content-center pt-5 pb-3 px-2" style="min-height:500px;">
                                            <div class="card mx-3 shadow" style="width: 18rem; @if($mode == 0) background:#282828;color:white; @else background:#fff;color:dark; @endif">
                                                <img  alt="Hanrickson E. Dumapit Web Developer" src="{{asset('storage/content/developers/'.$pd_value['image'])}}" style="max-width:inherit;max-height:200px;object-fit:cover;" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title py-2">{{$pd_value['full_name']}}</h5>
                                                    <h6 class="text-secondary py-2">{{$pd_value['role']}}</h6>
                                                    <a href="{{$pd_value['linkedinlink']}}" target="_blank" class="btn @if($mode) btn-primary @else btn-outline-primary @endif align-items-center"><i class="bi bi-linkedin fs-5"></i> Linkedin</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        
                            <div class="row">
                                <div class="col-12 py-4 m-0 opacity-0">
                                    &#160;
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 py-4 m-0 opacity-0">
                        &#160;
                    </div>
                </div>
                <script>
                    var swiper = new Swiper(".mySwiper-{{$key}}-2", {
                    loop: true,
                    spaceBetween: 10,
                    slidesPerView: 4,
                    freeMode: true,
                    watchSlidesProgress: true,
                    });
                    var swiper2 = new Swiper(".mySwiper-{{$key}}-1", {
                    loop: true,
                    spaceBetween: 10,
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                    thumbs: {
                        swiper: swiper,
                    },
                    });
                </script>
                @endforeach
            @endif
            </div>
        </div>
    </section>
</div>

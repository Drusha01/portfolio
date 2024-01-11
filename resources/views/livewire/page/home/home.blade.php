<div>
    <div style="z-index:2;">
        <section id="home" class="p-lg-0 pt-lg-0 text-center text-sm-start" style="@if($mode == 0) background:transparent;color:white @else background:transparent;color:dark @endif">
            <div class="container">
                <div class="d-sm-flex align-items-center">
                    <div class="p-3">
                        <h1> Hi, I am <span class="text-danger"> Hanrickson E. Dumapit </span></h1>
                        <p class="lead my-4 d-none d-md-block ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi quod eligendi eius quidem natus hic rerum aspernatur cupiditate veritatis necessitatibus.</p>
                        <button class="btn btn-outline-primary btn-lg"> Hire Me</button>
                    </div>
                    <img class="img-sm-fluid w-50" src="{{ asset('assets/page/drusha.png') }}" alt="logo" class="logo">
                </div>
            </div>
        </section>
        <section id="about" class="p-1" style="@if($mode == 0) background:#242424;color:white @else background:#F9F9F9;color:dark @endif">
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
            </div>
        </section>
        <section id="skills" class="pt-5 pb-5" style="@if($mode == 0) background:#282828;color:white @else background:#fff;color:dark @endif">
            <div class="container my-5 p-sm-1">
                <div class="align-items-center ">
                    <h3 class="h1 pb-5 text-uppercase text-center">Skills</h3>
                    <div class="row gx-5 text-center">
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4 pb-sm-5 pb-md-3 pb-lg-5 d-flex justify-content-center" style="" >
                            <a href="#" class="link-underline link-underline-opacity-0">
                                <div class=" border border-dark @if($mode == 1) bg-light @else  bg-secondary @endif rounded-4 " style="--bs-bg-opacity: .5;width:200px;height:230px">
                                    <img class="pt-4 pb-2" src="{{ asset('assets/logo/github.png') }}" alt="" width="80px" >
                                    <h3 class="@if($mode == 1) text-dark @else  text-light @endif pt-5">sdfasd</h3>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4 pb-sm-5 pb-md-3 pb-lg-5 d-flex justify-content-center" style="" >
                            <a href="#" class="link-underline link-underline-opacity-0">
                                <div class=" border border-dark @if($mode == 1) bg-light @else  bg-secondary @endif rounded-4 " style="--bs-bg-opacity: .5;width:200px;height:230px">
                                    <img class="pt-4 pb-2" src="{{ asset('assets/logo/github.png') }}" alt="" width="80px" >
                                    <h3 class="@if($mode == 1) text-dark @else  text-light @endif pt-5">sdfasd</h3>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4 pb-sm-5 pb-md-3 pb-lg-5 d-flex justify-content-center" style="" >
                            <a href="#" class="link-underline link-underline-opacity-0">
                                <div class=" border border-dark @if($mode == 1) bg-light @else  bg-secondary @endif rounded-4 " style="--bs-bg-opacity: .5;width:200px;height:230px">
                                    <img class="pt-4 pb-2" src="{{ asset('assets/logo/github.png') }}" alt="" width="80px" >
                                    <h3 class="@if($mode == 1) text-dark @else  text-light @endif pt-5">sdfasd</h3>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4 pb-sm-5 pb-md-3 pb-lg-5 d-flex justify-content-center" style="" >
                            <a href="#" class="link-underline link-underline-opacity-0">
                                <div class=" border border-dark @if($mode == 1) bg-light @else  bg-secondary @endif rounded-4 " style="--bs-bg-opacity: .5;width:200px;height:230px">
                                    <img class="pt-4 pb-2" src="{{ asset('assets/logo/github.png') }}" alt="" width="80px" >
                                    <h3 class="@if($mode == 1) text-dark @else  text-light @endif pt-5">sdfasd</h3>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4 pb-sm-5 pb-md-3 pb-lg-5 d-flex justify-content-center" style="" >
                            <a href="#" class="link-underline link-underline-opacity-0">
                                <div class=" border border-dark @if($mode == 1) bg-light @else  bg-secondary @endif rounded-4 " style="--bs-bg-opacity: .5;width:200px;height:230px">
                                    <img class="pt-4 pb-2" src="{{ asset('assets/logo/github.png') }}" alt="" width="80px" >
                                    <h3 class="@if($mode == 1) text-dark @else  text-light @endif pt-5">sdfasd</h3>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4 pb-sm-5 pb-md-3 pb-lg-5 d-flex justify-content-center" style="" >
                            <a href="#" class="link-underline link-underline-opacity-0">
                                <div class=" border border-dark @if($mode == 1) bg-light @else  bg-secondary @endif rounded-4 " style="--bs-bg-opacity: .5;width:200px;height:230px">
                                    <img class="pt-4 pb-2" src="{{ asset('assets/logo/github.png') }}" alt="" width="80px" >
                                    <h3 class="@if($mode == 1) text-dark @else  text-light @endif pt-5">sdfasd</h3>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4 pb-sm-5 pb-md-3 pb-lg-5 d-flex justify-content-center" style="" >
                            <a href="#" class="link-underline link-underline-opacity-0">
                                <div class=" border border-dark @if($mode == 1) bg-light @else  bg-secondary @endif rounded-4 " style="--bs-bg-opacity: .5;width:200px;height:230px">
                                    <img class="pt-4 pb-2" src="{{ asset('assets/logo/github.png') }}" alt="" width="80px" >
                                    <h3 class="@if($mode == 1) text-dark @else  text-light @endif pt-5">sdfasd</h3>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4 pb-sm-5 pb-md-3 pb-lg-5 d-flex justify-content-center" style="" >
                            <a href="#" class="link-underline link-underline-opacity-0">
                                <div class=" border border-dark @if($mode == 1) bg-light @else  bg-secondary @endif rounded-4 " style="--bs-bg-opacity: .5;width:200px;height:230px">
                                    <img class="pt-4 pb-2" src="{{ asset('assets/logo/github.png') }}" alt="" width="80px" >
                                    <h3 class="@if($mode == 1) text-dark @else  text-light @endif pt-5">sdfasd</h3>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4 pb-sm-5 pb-md-3 pb-lg-5 d-flex justify-content-center" style="" >
                            <a href="#" class="link-underline link-underline-opacity-0">
                                <div class=" border border-dark @if($mode == 1) bg-light @else  bg-secondary @endif rounded-4 " style="--bs-bg-opacity: .5;width:200px;height:230px">
                                    <img class="pt-4 pb-2" src="{{ asset('assets/logo/github.png') }}" alt="" width="80px" >
                                    <h3 class="@if($mode == 1) text-dark @else  text-light @endif pt-5">sdfasd</h3>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4 pb-sm-5 pb-md-3 pb-lg-5 d-flex justify-content-center" style="" >
                            <a href="#" class="link-underline link-underline-opacity-0">
                                <div class=" border border-dark @if($mode == 1) bg-light @else  bg-secondary @endif rounded-4 " style="--bs-bg-opacity: .5;width:200px;height:230px">
                                    <img class="pt-4 pb-2" src="{{ asset('assets/logo/github.png') }}" alt="" width="80px" >
                                    <h3 class="@if($mode == 1) text-dark @else  text-light @endif pt-5">sdfasd</h3>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4 pb-sm-5 pb-md-3 pb-lg-5 d-flex justify-content-center" style="" >
                            <a href="#" class="link-underline link-underline-opacity-0">
                                <div class=" border border-dark @if($mode == 1) bg-light @else  bg-secondary @endif rounded-4 " style="--bs-bg-opacity: .5;width:200px;height:230px">
                                    <img class="pt-4 pb-2" src="{{ asset('assets/logo/github.png') }}" alt="" width="80px" >
                                    <h3 class="@if($mode == 1) text-dark @else  text-light @endif pt-5">sdfasd</h3>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4 pb-sm-5 pb-md-3 pb-lg-5 d-flex justify-content-center" style="" >
                            <a href="#" class="link-underline link-underline-opacity-0">
                                <div class=" border border-dark @if($mode == 1) bg-light @else  bg-secondary @endif rounded-4 " style="--bs-bg-opacity: .5;width:200px;height:230px">
                                    <img class="pt-4 pb-2" src="{{ asset('assets/logo/github.png') }}" alt="" width="80px" >
                                    <h3 class="@if($mode == 1) text-dark @else  text-light @endif pt-5">sdfasd</h3>
                                </div>
                            </a>
                        </div>
                        

                    </div>
                </div>
            </div>
        </section>
        <section id="projects" class="pt-5 pb-5" style="@if($mode == 0) background:#242424;color:white @else background:#F9F9F9;color:dark @endif">
            <div class="container my-5 p-sm-1">
                <div class="align-items-center">
                    <h3 class="h1 pb-5 text-uppercase text-center">Projects</h3>
                    <div class="container swiper projects" >
                        <div class="swiper-wrapper">
                            <div class="swiper-slide border border-dark rounded-4 @if($mode == 1) bg-light @else bg-secondary @endif ">
                                <div class="row p-2">
                                    <div class="col-6" >
                                        <img class="p-2 rounded-start-4" src="{{ asset('assets/page/dev.png') }}" alt="logo" style="width:100%;height:100%;object-fit:contain">
                                    </div>
                                    <div class="col-6 col-xs-6 p-sm-3 " style="max-height:600px;overflow: auto;">
                                        <h3 class="text-start text-info pt-md-5 pt-sm-5 text-wrap ">ProjectName asdfasdfsdfasdfasdf</h3>
                                        <a class="justify-content-start link-underline link-underline-opacity-0 " href=""> 
                                            <button class="text-start btn @if($mode == 0) btn-outline-light @else btn-outline-dark @endif btn-md m-1 px-3"> Visit Site</button>
                                        </a>
                                        <div class="col-12">
                                            <p class="text-start h6 d-none d-md-block " >
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
                                            <p class="text-start lead my-4 d-none d-lg-block">
                                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptate quaerat voluptatem obcaecati laudantium a, iure praesentium quam. Numquam atque cumque porro, reprehenderit esse reiciendis. Temporibus corrupti laborum at possimus iste. Qui, sed nostrum, facere adipisci, quisquam labore fugit dolore iusto quidem aspernatur commodi obcaecati earum asperiores atque ipsam voluptate repellendus nisi! Obcaecati quo necessitatibus totam fugiat reprehenderit sit praesentium laudantium dolore dolorum perspiciatis ducimus eveniet ea numquam, placeat quod? Ratione, dignissimos tenetur. Illo adipisci excepturi, rem sit officiis similique corporis ad alias assumenda minus, rerum quasi impedit officia et voluptatum, animi quisquam eum earum nisi possimus. Voluptatum rerum autem deleniti.
                                            </p>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div> 
                            <div class="swiper-slide border border-dark rounded-4 @if($mode == 1) bg-light @else bg-secondary @endif ">
                                <div class="row p-2">
                                    <div class="col-6" >
                                        <img class="p-2 rounded-start-4" src="{{ asset('assets/page/dev.png') }}" alt="logo" style="width:100%;height:100%;object-fit:contain">
                                    </div>
                                    <div class="col-6 col-xs-6 p-sm-3 " style="max-height:600px;overflow: auto;">
                                        <h3 class="text-start text-info pt-md-5 pt-sm-5 text-wrap ">ProjectName asdfasdfsdfasdfasdf</h3>
                                        <a class="justify-content-start link-underline link-underline-opacity-0 " href=""> 
                                            <button class="text-start btn @if($mode == 0) btn-outline-light @else btn-outline-dark @endif btn-md m-1 px-3"> Visit Site</button>
                                        </a>
                                        <div class="col-12">
                                            <p class="text-start h6 d-none d-md-block " >
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
                                            <p class="text-start lead my-4 d-none d-lg-block">
                                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptate quaerat voluptatem obcaecati laudantium a, iure praesentium quam. Numquam atque cumque porro, reprehenderit esse reiciendis. Temporibus corrupti laborum at possimus iste. Qui, sed nostrum, facere adipisci, quisquam labore fugit dolore iusto quidem aspernatur commodi obcaecati earum asperiores atque ipsam voluptate repellendus nisi! Obcaecati quo necessitatibus totam fugiat reprehenderit sit praesentium laudantium dolore dolorum perspiciatis ducimus eveniet ea numquam, placeat quod? Ratione, dignissimos tenetur. Illo adipisci excepturi, rem sit officiis similique corporis ad alias assumenda minus, rerum quasi impedit officia et voluptatum, animi quisquam eum earum nisi possimus. Voluptatum rerum autem deleniti.
                                            </p>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>                           
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

        <section id="experience" class="pt-5 pb-5" style="@if($mode == 0) background:#282828;color:white @else background:#fff;color:dark @endif">
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
        </section>
        <section id="education" class="pt-5 pb-5" style="@if($mode == 0) background:#242424;color:white @else background:#F9F9F9;color:dark @endif">
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
        </section>

        <!-- <section id="testimonials" class="p-5" style="@if($mode == 0) background:#282828;color:white @else background:#fff;color:dark @endif">
            <div class="container  text-center my-5 p-sm-1">
                <div class="align-items-center">
                    <h3 class="h1 pb-5 text-uppercase">Testimonials</h3>
                    <div class="swiper testimonials" style="width:400px;height:600px">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide border border-dark rounded-4 @if($mode == 1) bg-light @else bg-secondary @endif">
                                <img class="p-1 rounded" src="{{ asset('assets/logo/github.png') }}" alt="" width="150px" >
                                <h3 class="text-start p-2">Hanrickson E. Dumapit</h3>
                            </div>
                            <div class="swiper-slide border border-dark rounded-4 @if($mode == 1) bg-light @else bg-secondary @endif">
                                <img class="p1" src="{{ asset('assets/logo/github.png') }}" alt="" width="150px" >
                            </div>
                            <div class="swiper-slide border border-dark rounded-4 @if($mode == 1) bg-light @else bg-secondary @endif">
                                <img class="p-1 rounded" src="{{ asset('assets/logo/github.png') }}" alt="" width="150px" >
                            </div>
                            <div class="swiper-slide border border-dark rounded-4 @if($mode == 1) bg-light @else bg-secondary @endif">
                                <img class="p-1 rounded" src="{{ asset('assets/logo/github.png') }}" alt="" width="150px" >
                            </div>
                            <div class="swiper-slide border border-dark rounded-4 @if($mode == 1) bg-light @else bg-secondary @endif">
                                <img class="p-1 rounded" src="{{ asset('assets/logo/github.png') }}" alt="" width="150px" >
                            </div>
                            <div class="swiper-slide border border-dark rounded-4 @if($mode == 1) bg-light @else bg-secondary @endif">
                                <img class="p-1 rounded" src="{{ asset('assets/logo/github.png') }}" alt="" width="150px" >
                            </div>
                            <div class="swiper-slide border border-dark rounded-4 @if($mode == 1) bg-light @else bg-secondary @endif">
                                <img class="p-1 rounded" src="{{ asset('assets/logo/github.png') }}" alt="" width="150px" >
                            </div>
                            <div class="swiper-slide border border-dark rounded-4 @if($mode == 1) bg-light @else bg-secondary @endif">
                                <img class="p-1 rounded" src="{{ asset('assets/logo/github.png') }}" alt="" width="150px" >
                            </div>
                            <div class="swiper-slide border border-dark rounded-4 @if($mode == 1) bg-light @else bg-secondary @endif">
                                <img class="p-1 rounded" src="{{ asset('assets/logo/github.png') }}" alt="" width="150px" >
                            </div>
                            <div class="swiper-slide border border-dark rounded-4 @if($mode == 1) bg-light @else bg-secondary @endif">
                                <img class="p-1 rounded" src="{{ asset('assets/logo/github.png') }}" alt="" width="150px" >
                            </div>
                            <div class="swiper-slide border border-dark rounded-4 @if($mode == 1) bg-light @else bg-secondary @endif">
                                <img class="p-1 rounded" src="{{ asset('assets/logo/github.png') }}" alt="" width="150px" >
                            </div>
                            <div class="swiper-slide border border-dark rounded-4 @if($mode == 1) bg-light @else bg-secondary @endif">
                                <img class="p-1 rounded" src="{{ asset('assets/logo/github.png') }}" alt="" width="150px" >
                            </div>
                            <div class="swiper-slide border border-dark rounded-4 @if($mode == 1) bg-light @else bg-secondary @endif">
                                <img class="" src="{{ asset('assets/logo/github.png') }}" alt="" width="150px" >
                            </div>

                        </div>
                    </div>
                    <script>
                        var swiper = new Swiper(".testimonials", {
                        effect: "cards",
                        grabCursor: true,
                        });
                    </script>

                </div>
            </div>
        </section> -->
    </div>
</div>
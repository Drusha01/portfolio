<div>
    <section id="about" class="p-lg-0 pt-lg-0 text-center text-sm-start" @if($mode == 0) style="background:#282828;color:white" @else bg-dark style="background:#fff;color:dark" @endif>
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
    </section>
    <section id="about-content" class="p-1" style="@if($mode == 0) background:#242424;color:white @else background:#F9F9F9;color:dark @endif">
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
    </section>
    <section id="experience" class="pt-5 pb-5" @if($mode == 0) style="background:#282828;color:white" @else bg-dark style="background:#fff;color:dark" @endif>
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

</div>

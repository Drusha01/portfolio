<div>
    <div style="z-index:2;">
        <section id="home" class="p-lg-0 pt-lg-0 text-center text-sm-start" style="@if($mode == 0) background:transparent;color:white @else background:transparent;color:dark @endif">
            <div class="container">
                <div class="d-sm-flex align-items-center">
                    <div class="p-3">
                        <h1> Hi, I am <span class="text-danger"> Hanrickson E. Dumapit </span></h1>
                        <p class="lead my-4 d-none d-md-block ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi quod eligendi eius quidem natus hic rerum aspernatur cupiditate veritatis necessitatibus.</p>
                        <button class="btn btn-outline-primary btn-lg m-2"> Hire Me</button>
                    </div>
                    <img class="img-sm-fluid w-50" src="{{ asset('assets/page/drusha.png') }}" alt="logo" class="logo">
                </div>
            </div>
        </section>
        <section id="about" class="p-1" style="@if($mode == 0) background:#242424;color:white @else background:#F9F9F9;color:dark @endif">
            <div class="container  text-center my-5 p-sm-1">
                <div class="d-flex justify-content-center">
                    <div class="row">
                        <div class=" col-md-3 px-md-5 col-6 mb-4">
                            <img src="{{ asset('assets/logo/facebook.png') }}" alt="" width="60px" >
                        </div>
                        <div class="col-md-3 px-md-5 col-6 mb-4">
                            <img src="{{ asset('assets/logo/instagram.png') }}" alt="" width="60px" >
                        </div>
                        <div class="col-md-3 px-md-5 col-6 mb-4">
                        <img src="{{ asset('assets/logo/linkedin.png') }}" alt="" width="60px" >
                        </div>
                        <div class="col-md-3 px-md-5 col-6 mb-4">
                        <img src="{{ asset('assets/logo/github.png') }}" alt="" width="60px" >
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
                            <h3 class="h1 pb-3">About</h3>
                            <p class="h5 pb-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Debitis modi nulla, veritatis deleniti harum velit ipsum et sunt doloremque magni quia placeat reprehenderit quas minus voluptatibus ipsam eligendi id esse!</p>
                            <p class="h5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Qui illum neque commodi consectetur dolorem veritatis aut quis architecto doloribus voluptate.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="skills" class="p-2 " style="@if($mode == 0) background:#282828;color:white @else background:#fff;color:dark @endif">
            <div class="container">
                skills
            </div>
        </section>
        <section id="about" class="p-2 " style="@if($mode == 0) background:#242424;color:white @else background:#F9F9F9;color:dark @endif">
            <div class="container">
                about
            </div>
        </section>
    </div>
</div>
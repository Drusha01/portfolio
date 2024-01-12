<div  wire:scroll>
    <div style="z-index:2;">
        <section id="home" class="p-lg-0 pt-lg-0 text-center text-sm-start" style="@if($mode == 0) background:transparent;color:white @else background:transparent;color:dark @endif">
            <div class="container">
                <div class="d-sm-flex align-items-center">
                    <div class="p-3">
                        <h1> Hi, I am <span class="text-danger"> Hanrickson E. Dumapit </span></h1>
                        <p class="lead my-4 d-none d-md-block ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi quod eligendi eius quidem natus hic rerum aspernatur cupiditate veritatis necessitatibus.</p>
                        <button class="btn btn-outline-primary btn-lg d-none d-md-block "> Hire Me</button>
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
                                    <div class="col-6 col-xs-6 p-sm-3 " style="max-height:650px;overflow: auto;">
                                        <div class="row">
                                            <h3 class="text-start text-info pt-md-5 pt-sm-5" style="width:inherit;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis quisquam aliquid delectus omnis odit, nulla tenetur. Omnis cum sint eveniet.
                                            </h3>
                                        </div>
                                       <div class="row">
                                            <div class="col">
                                                <a class="justify-content-start link-underline link-underline-opacity-0 " href=""> 
                                                    <button class="text-start btn @if($mode == 0) btn-outline-light @else btn-outline-dark @endif btn-md m-1 px-3"><strong>Visit Site</strong> </button>
                                                </a>
                                            </div>
                                       </div>
                                       <div class="row pt-3">
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
                                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sit, numquam porro id molestias, suscipit commodi quis esse impedit accusantium dignissimos molestiae eaque aliquid atque, natus et sed. Odit aperiam obcaecati optio! Commodi nemo ducimus magnam nisi consequatur quis praesentium, tempora illum dicta fugiat nam velit dolorum fuga, ullam, molestias facere rem ipsa totam vitae. Beatae architecto velit minima voluptatibus, eos porro, debitis repellat odit a quisquam officiis deleniti ipsum possimus, voluptates ea in! Aspernatur corporis odio ab enim nesciunt pariatur in et! Vitae repellat ipsum, praesentium eum autem omnis sint at, possimus pariatur dolorum ab hic veritatis fugiat provident facilis cum ratione, beatae error sed est veniam. Maxime, et, iure ullam porro dolores architecto nam placeat facere velit earum doloribus! Natus iste corporis veritatis perspiciatis! Eius nesciunt ea porro nostrum, quam assumenda totam laboriosam itaque provident repellendus deserunt velit modi iure dolores praesentium! Sequi corrupti incidunt aperiam quae, provident laudantium alias, voluptates voluptatem illo, ex perferendis. Aliquam, nostrum soluta consequuntur rerum molestias dicta laboriosam, unde esse, omnis et placeat totam a optio. Sint libero mollitia quas asperiores alias, aliquid perferendis sit hic rem incidunt maiores, suscipit eius. Non corporis molestias suscipit aliquid, accusantium blanditiis rerum fugit vero odio. Magnam commodi perferendis dolores quae corporis reprehenderit eveniet esse dolorum vitae, officiis maiores perspiciatis vel ipsum distinctio alias totam accusamus quo dolore porro saepe nisi aut incidunt. Rerum quod impedit, voluptates iure, consequuntur sint saepe laboriosam incidunt ea, nulla doloribus ipsum consequatur quos possimus cum repellendus aliquam? Doloremque, unde consequuntur. Magni, error. Laudantium fuga voluptas nesciunt corporis, fugit officia quam quidem vel itaque, deleniti fugiat cupiditate? Doloribus quo vitae reiciendis impedit aspernatur exercitationem, unde aperiam porro aut laudantium voluptate magni facilis quod magnam id. Deserunt aut corrupti totam perferendis dolor aspernatur at ipsam nemo quos fugiat quisquam rem, eligendi, adipisci eum, iusto voluptatum neque! Eius maxime aperiam, ipsam eligendi totam minus repellat facere asperiores dolore dicta, voluptas laudantium. Ab omnis repellat mollitia facere quaerat ad doloremque, consequuntur illo voluptates placeat. Nobis vitae ab officia ducimus quaerat beatae architecto nulla consectetur voluptatum nam. Voluptatem nihil asperiores, cumque veritatis amet eos reprehenderit harum maiores nesciunt ad qui est molestiae optio delectus alias suscipit. Facilis laborum voluptatibus libero ipsum rerum distinctio. A, omnis quod? Nostrum temporibus qui culpa, amet quidem voluptatem aliquam voluptatibus eligendi odio doloribus! Enim neque earum nobis vitae, exercitationem dolor similique quaerat nisi consequuntur, quia obcaecati dolorem? Tempore accusamus molestiae ipsa eligendi dolorum esse asperiores iure magni modi impedit numquam velit nisi architecto vel perspiciatis iste quos veniam, iusto eos sunt alias nostrum sapiente labore laudantium? Placeat possimus deserunt eveniet magni, voluptatum facilis ullam est officiis asperiores labore nobis aliquam veniam quasi blanditiis officia quisquam harum debitis, ipsa nulla animi. Voluptatem, officiis quod nobis adipisci consequatur itaque fuga unde minima soluta! Commodi maxime laudantium iste ipsam harum corrupti sed, qui nam ad eaque optio nobis ut sit perspiciatis vero hic tempore voluptates. Nisi commodi quos quibusdam maxime praesentium sit itaque eveniet magnam ut, neque blanditiis eum nobis illum optio quia dolorum. Ex!
                                                </p>
                                            </div>
                                       </div>
                                    </div>
                                </div>
                            </div>       
                            <div class="swiper-slide border border-dark rounded-4 @if($mode == 1) bg-light @else bg-secondary @endif ">
                                <div class="row p-2">
                                    <div class="col-6" >
                                        <img class="p-2 rounded-start-4" src="{{ asset('assets/page/dev.png') }}" alt="logo" style="width:100%;height:100%;object-fit:contain">
                                    </div>
                                    <div class="col-6 col-xs-6 p-sm-3 " style="max-height:650px;overflow: auto;">
                                        <div class="row">
                                            <h3 class="text-start text-info pt-md-5 pt-sm-5" style="width:inherit;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis quisquam aliquid delectus omnis odit, nulla tenetur. Omnis cum sint eveniet.
                                            </h3>
                                        </div>
                                       <div class="row">
                                            <div class="col">
                                                <a class="justify-content-start link-underline link-underline-opacity-0 " href=""> 
                                                    <button class="text-start btn @if($mode == 0) btn-outline-light @else btn-outline-dark @endif btn-md m-1 px-3"><strong>Visit Site</strong> </button>
                                                </a>
                                            </div>
                                       </div>
                                       <div class="row pt-3">
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
                                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sit, numquam porro id molestias, suscipit commodi quis esse impedit accusantium dignissimos molestiae eaque aliquid atque, natus et sed. Odit aperiam obcaecati optio! Commodi nemo ducimus magnam nisi consequatur quis praesentium, tempora illum dicta fugiat nam velit dolorum fuga, ullam, molestias facere rem ipsa totam vitae. Beatae architecto velit minima voluptatibus, eos porro, debitis repellat odit a quisquam officiis deleniti ipsum possimus, voluptates ea in! Aspernatur corporis odio ab enim nesciunt pariatur in et! Vitae repellat ipsum, praesentium eum autem omnis sint at, possimus pariatur dolorum ab hic veritatis fugiat provident facilis cum ratione, beatae error sed est veniam. Maxime, et, iure ullam porro dolores architecto nam placeat facere velit earum doloribus! Natus iste corporis veritatis perspiciatis! Eius nesciunt ea porro nostrum, quam assumenda totam laboriosam itaque provident repellendus deserunt velit modi iure dolores praesentium! Sequi corrupti incidunt aperiam quae, provident laudantium alias, voluptates voluptatem illo, ex perferendis. Aliquam, nostrum soluta consequuntur rerum molestias dicta laboriosam, unde esse, omnis et placeat totam a optio. Sint libero mollitia quas asperiores alias, aliquid perferendis sit hic rem incidunt maiores, suscipit eius. Non corporis molestias suscipit aliquid, accusantium blanditiis rerum fugit vero odio. Magnam commodi perferendis dolores quae corporis reprehenderit eveniet esse dolorum vitae, officiis maiores perspiciatis vel ipsum distinctio alias totam accusamus quo dolore porro saepe nisi aut incidunt. Rerum quod impedit, voluptates iure, consequuntur sint saepe laboriosam incidunt ea, nulla doloribus ipsum consequatur quos possimus cum repellendus aliquam? Doloremque, unde consequuntur. Magni, error. Laudantium fuga voluptas nesciunt corporis, fugit officia quam quidem vel itaque, deleniti fugiat cupiditate? Doloribus quo vitae reiciendis impedit aspernatur exercitationem, unde aperiam porro aut laudantium voluptate magni facilis quod magnam id. Deserunt aut corrupti totam perferendis dolor aspernatur at ipsam nemo quos fugiat quisquam rem, eligendi, adipisci eum, iusto voluptatum neque! Eius maxime aperiam, ipsam eligendi totam minus repellat facere asperiores dolore dicta, voluptas laudantium. Ab omnis repellat mollitia facere quaerat ad doloremque, consequuntur illo voluptates placeat. Nobis vitae ab officia ducimus quaerat beatae architecto nulla consectetur voluptatum nam. Voluptatem nihil asperiores, cumque veritatis amet eos reprehenderit harum maiores nesciunt ad qui est molestiae optio delectus alias suscipit. Facilis laborum voluptatibus libero ipsum rerum distinctio. A, omnis quod? Nostrum temporibus qui culpa, amet quidem voluptatem aliquam voluptatibus eligendi odio doloribus! Enim neque earum nobis vitae, exercitationem dolor similique quaerat nisi consequuntur, quia obcaecati dolorem? Tempore accusamus molestiae ipsa eligendi dolorum esse asperiores iure magni modi impedit numquam velit nisi architecto vel perspiciatis iste quos veniam, iusto eos sunt alias nostrum sapiente labore laudantium? Placeat possimus deserunt eveniet magni, voluptatum facilis ullam est officiis asperiores labore nobis aliquam veniam quasi blanditiis officia quisquam harum debitis, ipsa nulla animi. Voluptatem, officiis quod nobis adipisci consequatur itaque fuga unde minima soluta! Commodi maxime laudantium iste ipsam harum corrupti sed, qui nam ad eaque optio nobis ut sit perspiciatis vero hic tempore voluptates. Nisi commodi quos quibusdam maxime praesentium sit itaque eveniet magnam ut, neque blanditiis eum nobis illum optio quia dolorum. Ex!
                                                </p>
                                            </div>
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
        <section id="blog" class="pt-5 pb-5" style="@if($mode == 0)  background:#282828;color:white @else background:#fff;color:dark @endif">
            <div class="container my-5 p-sm-1">
                <div class="align-items-center">
                    <h3 class="h1 pb-5 text-uppercase text-center ">MyBlog</h3>
                    <div class="row p-3 d-flex justify-content-center">
                        <div class="col-lg-5 col-md-6 rounded-4 m-3 border @if($mode == 1) border-dark @else border-light @endif" style="height:600px">
                            <div class="row" >
                                <div class="col-12 rounded-4">
                                    <img class="pt-3 pb-3 " src="{{ asset('assets/page/coding.jpg') }}" alt="" style="object-fit:cover;width:inherit;max-height:300px" >
                                </div>
                            </div>
                            <div class="row" >
                                <div class="col-12">
                                    <h2  style="width:inherit;overflow: hidden;text-overflow: ellipsis;white-space: nowrap; " >Lorem ipsum, dolor sit amet consectetur adipisicing elit. Incidunt ad obcaecati quis ducimus accusantium cumque quos tenetur sequi assumenda rerum!</h2>
                                </div>
                            </div>
                            <div class="row p-1" >
                                <div class="col-12">
                                    <div style="width:inherit;overflow: hidden;text-overflow: ellipsis;white-space: nowrap; " >
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
                                    </div>
                                </div>
                            </div>
                            <div class="row p-1" >
                                <div class="col-12">
                                    <p class="overflow-auto h6" style="width:inherit;max-height:200px" >
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi debitis magnam explicabo fugiat voluptatibus alias eum repudiandae? Velit dolor ad sapiente deleniti error voluptas ipsa magni et in vero nostrum saepe autem tempore iure ducimus eveniet pariatur recusandae, ut, impedit repellat eius? Dicta quod nostrum adipisci, sequi, vitae magnam dignissimos quo doloribus omnis possimus, officia harum animi aperiam itaque beatae ipsum facilis molestias similique! Voluptatibus aperiam explicabo ullam quaerat necessitatibus provident porro similique! Ea odio quas iure ut sed eligendi vero enim assumenda. Provident similique doloribus molestias suscipit assumenda, quaerat, maiores atque itaque ad in explicabo iste repellendus eveniet! Voluptas, numquam incidunt quasi porro modi dignissimos minima omnis quia! Neque, non repellendus necessitatibus reiciendis, nobis distinctio, omnis debitis officiis repudiandae libero est voluptate consectetur eos soluta inventore totam dolorum ullam quas et fuga ut exercitationem! Magni repudiandae distinctio porro possimus exercitationem, natus suscipit velit, consequuntur fugit hic illum. Accusantium reprehenderit dolores officiis aliquid, hic sed aperiam deleniti laboriosam, ullam quod accusamus ipsa cupiditate molestiae quas ex temporibus modi aut eaque similique neque, dicta nesciunt mollitia ipsam! Ipsum ullam, incidunt animi consequuntur aspernatur cum voluptatem commodi ab mollitia, molestiae reprehenderit. Illum, amet quisquam. Quisquam, sequi tempore autem id illum eius in.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 rounded-4 m-3 border @if($mode == 1) border-dark @else border-light @endif" style="height:600px">
                            <div class="row" >
                                <div class="col-12 rounded-4">
                                    <img class="pt-3 pb-3 " src="{{ asset('assets/page/coding.jpg') }}" alt="" style="object-fit:cover;width:inherit;max-height:300px" >
                                </div>
                            </div>
                            <div class="row" >
                                <div class="col-12">
                                    <h2  style="width:inherit;overflow: hidden;text-overflow: ellipsis;white-space: nowrap; " >Lorem ipsum, dolor sit amet consectetur adipisicing elit. Incidunt ad obcaecati quis ducimus accusantium cumque quos tenetur sequi assumenda rerum!</h2>
                                </div>
                            </div>
                            <div class="row p-1" >
                                <div class="col-12">
                                    <div style="width:inherit;overflow: hidden;text-overflow: ellipsis;white-space: nowrap; " >
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
                                    </div>
                                </div>
                            </div>
                            <div class="row p-1" >
                                <div class="col-12">
                                    <p class="overflow-auto h6" style="width:inherit;max-height:200px" >
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi debitis magnam explicabo fugiat voluptatibus alias eum repudiandae? Velit dolor ad sapiente deleniti error voluptas ipsa magni et in vero nostrum saepe autem tempore iure ducimus eveniet pariatur recusandae, ut, impedit repellat eius? Dicta quod nostrum adipisci, sequi, vitae magnam dignissimos quo doloribus omnis possimus, officia harum animi aperiam itaque beatae ipsum facilis molestias similique! Voluptatibus aperiam explicabo ullam quaerat necessitatibus provident porro similique! Ea odio quas iure ut sed eligendi vero enim assumenda. Provident similique doloribus molestias suscipit assumenda, quaerat, maiores atque itaque ad in explicabo iste repellendus eveniet! Voluptas, numquam incidunt quasi porro modi dignissimos minima omnis quia! Neque, non repellendus necessitatibus reiciendis, nobis distinctio, omnis debitis officiis repudiandae libero est voluptate consectetur eos soluta inventore totam dolorum ullam quas et fuga ut exercitationem! Magni repudiandae distinctio porro possimus exercitationem, natus suscipit velit, consequuntur fugit hic illum. Accusantium reprehenderit dolores officiis aliquid, hic sed aperiam deleniti laboriosam, ullam quod accusamus ipsa cupiditate molestiae quas ex temporibus modi aut eaque similique neque, dicta nesciunt mollitia ipsam! Ipsum ullam, incidunt animi consequuntur aspernatur cum voluptatem commodi ab mollitia, molestiae reprehenderit. Illum, amet quisquam. Quisquam, sequi tempore autem id illum eius in.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 rounded-4 m-3 border @if($mode == 1) border-dark @else border-light @endif" style="height:600px">
                            <div class="row" >
                                <div class="col-12 rounded-4">
                                    <img class="pt-3 pb-3 " src="{{ asset('assets/page/coding.jpg') }}" alt="" style="object-fit:cover;width:inherit;max-height:300px" >
                                </div>
                            </div>
                            <div class="row" >
                                <div class="col-12">
                                    <h2  style="width:inherit;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;" >Lorem ipsum, dolor sit amet consectetur adipisicing elit. Incidunt ad obcaecati quis ducimus accusantium cumque quos tenetur sequi assumenda rerum!</h2>
                                </div>
                            </div>
                            <div class="row p-1" >
                                <div class="col-12">
                                    <div style="width:inherit;overflow: hidden;text-overflow: ellipsis;white-space: nowrap; " >
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
                                    </div>
                                </div>
                            </div>
                            <div class="row p-1" >
                                <div class="col-12">
                                    <p class="overflow-auto h6" style="width:inherit;max-height:200px" >
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi debitis magnam explicabo fugiat voluptatibus alias eum repudiandae? Velit dolor ad sapiente deleniti error voluptas ipsa magni et in vero nostrum saepe autem tempore iure ducimus eveniet pariatur recusandae, ut, impedit repellat eius? Dicta quod nostrum adipisci, sequi, vitae magnam dignissimos quo doloribus omnis possimus, officia harum animi aperiam itaque beatae ipsum facilis molestias similique! Voluptatibus aperiam explicabo ullam quaerat necessitatibus provident porro similique! Ea odio quas iure ut sed eligendi vero enim assumenda. Provident similique doloribus molestias suscipit assumenda, quaerat, maiores atque itaque ad in explicabo iste repellendus eveniet! Voluptas, numquam incidunt quasi porro modi dignissimos minima omnis quia! Neque, non repellendus necessitatibus reiciendis, nobis distinctio, omnis debitis officiis repudiandae libero est voluptate consectetur eos soluta inventore totam dolorum ullam quas et fuga ut exercitationem! Magni repudiandae distinctio porro possimus exercitationem, natus suscipit velit, consequuntur fugit hic illum. Accusantium reprehenderit dolores officiis aliquid, hic sed aperiam deleniti laboriosam, ullam quod accusamus ipsa cupiditate molestiae quas ex temporibus modi aut eaque similique neque, dicta nesciunt mollitia ipsam! Ipsum ullam, incidunt animi consequuntur aspernatur cum voluptatem commodi ab mollitia, molestiae reprehenderit. Illum, amet quisquam. Quisquam, sequi tempore autem id illum eius in.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 rounded-4 m-3 border @if($mode == 1) border-dark @else border-light @endif" style="height:600px">
                            <div class="row" >
                                <div class="col-12 rounded-4">
                                    <img class="pt-3 pb-3 " src="{{ asset('assets/page/coding.jpg') }}" alt="" style="object-fit:cover;width:inherit;max-height:300px" >
                                </div>
                            </div>
                            <div class="row" >
                                <div class="col-12">
                                    <h2  style="width:inherit;overflow: hidden;text-overflow: ellipsis;white-space: nowrap; " >Lorem ipsum, dolor sit amet consectetur adipisicing elit. Incidunt ad obcaecati quis ducimus accusantium cumque quos tenetur sequi assumenda rerum!</h2>
                                </div>
                            </div>
                            <div class="row p-1" >
                                <div class="col-12">
                                    <div style="width:inherit;overflow: hidden;text-overflow: ellipsis;white-space: nowrap; " >
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
                                    </div>
                                </div>
                            </div>
                            <div class="row p-1" >
                                <div class="col-12">
                                    <p class="overflow-auto h6" style="width:inherit;max-height:200px" >
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi debitis magnam explicabo fugiat voluptatibus alias eum repudiandae? Velit dolor ad sapiente deleniti error voluptas ipsa magni et in vero nostrum saepe autem tempore iure ducimus eveniet pariatur recusandae, ut, impedit repellat eius? Dicta quod nostrum adipisci, sequi, vitae magnam dignissimos quo doloribus omnis possimus, officia harum animi aperiam itaque beatae ipsum facilis molestias similique! Voluptatibus aperiam explicabo ullam quaerat necessitatibus provident porro similique! Ea odio quas iure ut sed eligendi vero enim assumenda. Provident similique doloribus molestias suscipit assumenda, quaerat, maiores atque itaque ad in explicabo iste repellendus eveniet! Voluptas, numquam incidunt quasi porro modi dignissimos minima omnis quia! Neque, non repellendus necessitatibus reiciendis, nobis distinctio, omnis debitis officiis repudiandae libero est voluptate consectetur eos soluta inventore totam dolorum ullam quas et fuga ut exercitationem! Magni repudiandae distinctio porro possimus exercitationem, natus suscipit velit, consequuntur fugit hic illum. Accusantium reprehenderit dolores officiis aliquid, hic sed aperiam deleniti laboriosam, ullam quod accusamus ipsa cupiditate molestiae quas ex temporibus modi aut eaque similique neque, dicta nesciunt mollitia ipsam! Ipsum ullam, incidunt animi consequuntur aspernatur cum voluptatem commodi ab mollitia, molestiae reprehenderit. Illum, amet quisquam. Quisquam, sequi tempore autem id illum eius in.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 rounded-4 m-3 border @if($mode == 1) border-dark @else border-light @endif" style="height:600px">
                            <div class="row" >
                                <div class="col-12 rounded-4">
                                    <img class="pt-3 pb-3 " src="{{ asset('assets/page/coding.jpg') }}" alt="" style="object-fit:cover;width:inherit;max-height:300px" >
                                </div>
                            </div>
                            <div class="row" >
                                <div class="col-12">
                                    <h2  style="width:inherit;overflow: hidden;text-overflow: ellipsis;white-space: nowrap; " >Lorem ipsum, dolor sit amet consectetur adipisicing elit. Incidunt ad obcaecati quis ducimus accusantium cumque quos tenetur sequi assumenda rerum!</h2>
                                </div>
                            </div>
                            <div class="row p-1" >
                                <div class="col-12">
                                    <div style="width:inherit;overflow: hidden;text-overflow: ellipsis;white-space: nowrap; " >
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
                                    </div>
                                </div>
                            </div>
                            <div class="row p-1" >
                                <div class="col-12">
                                    <p class="overflow-auto h6" style="width:inherit;max-height:200px" >
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi debitis magnam explicabo fugiat voluptatibus alias eum repudiandae? Velit dolor ad sapiente deleniti error voluptas ipsa magni et in vero nostrum saepe autem tempore iure ducimus eveniet pariatur recusandae, ut, impedit repellat eius? Dicta quod nostrum adipisci, sequi, vitae magnam dignissimos quo doloribus omnis possimus, officia harum animi aperiam itaque beatae ipsum facilis molestias similique! Voluptatibus aperiam explicabo ullam quaerat necessitatibus provident porro similique! Ea odio quas iure ut sed eligendi vero enim assumenda. Provident similique doloribus molestias suscipit assumenda, quaerat, maiores atque itaque ad in explicabo iste repellendus eveniet! Voluptas, numquam incidunt quasi porro modi dignissimos minima omnis quia! Neque, non repellendus necessitatibus reiciendis, nobis distinctio, omnis debitis officiis repudiandae libero est voluptate consectetur eos soluta inventore totam dolorum ullam quas et fuga ut exercitationem! Magni repudiandae distinctio porro possimus exercitationem, natus suscipit velit, consequuntur fugit hic illum. Accusantium reprehenderit dolores officiis aliquid, hic sed aperiam deleniti laboriosam, ullam quod accusamus ipsa cupiditate molestiae quas ex temporibus modi aut eaque similique neque, dicta nesciunt mollitia ipsam! Ipsum ullam, incidunt animi consequuntur aspernatur cum voluptatem commodi ab mollitia, molestiae reprehenderit. Illum, amet quisquam. Quisquam, sequi tempore autem id illum eius in.
                                    </p>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </section>    
        <section id="experience" class="pt-5 pb-5" style="@if($mode == 0) background:#242424;color:white @else background:#F9F9F9;color:dark @endif">
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
        <section id="education" class="pt-5 pb-5" style="@if($mode == 0) background:#282828;color:white @else background:#fff;color:dark @endif">
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
                                    <p>Tertiary</p>
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
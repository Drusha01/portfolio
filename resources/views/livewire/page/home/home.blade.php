<div class="p-0 m-0" wire:scroll>
    <div class="p-0 m-0">
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
                                        <img class="img-sm-fluid w-50  " src="{{asset('storage/content/about_pages/'.$this->about_page_data['0']->image)}}" alt="logo" class="logo">
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
                                                        <img src="{{asset('storage/content/links/'.$link_value->image)}}" alt="" width="60px" >
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
                                            <img class="img-fluid " src="{{asset('storage/content/about_content/'.$this->about_content_data['0']->image)}}" alt="" style="border-radius:50%;width:300px" >
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
                                <div class="container my-5 p-sm-1">
                                    <div class="align-items-center ">
                                        <h3 class="h1 pb-5 text-uppercase text-center">Skills</h3>
                                        <div class="row gx-5 text-center d-flex justify-content-center">
                                            @foreach($this->skill_data as $skill_key => $skill_value)
                                                @if( ($skill_key) == $value->table_max_display )
                                                    @break;
                                                @endif
                                                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4 pb-sm-5 pb-md-3 pb-lg-5 d-flex justify-content-center" style="" >
                                                        <a href="#" class="link-underline link-underline-opacity-0">
                                                            <div class=" border border-dark @if($mode == 1) bg-light @else  bg-secondary @endif rounded-4 " style="--bs-bg-opacity: .5;width:200px;height:230px">
                                                                <img class="pt-4 pb-2" src="{{asset('storage/content/skills/'.$skill_value->image)}}" alt="" width="80px" >
                                                                <h3 class="@if($mode == 1) text-dark @else  text-light @endif pt-5">{{$skill_value->header}}</h3>
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
                        <?php $color_toggle = !$color_toggle;?>
                            <section id="projects" class="pt-5 pb-5" style="@if($color_toggle) @if($mode == 0) background:#282828;color:white @else background:#fff;color:dark @endif @else @if($mode == 0) background:#242424;color:white @else background:#F9F9F9;color:dark @endif @endif">
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
                    @elseif( $value->table_name == 'Blogs' && $value->table_isactive == 1 )
                        <?php $color_toggle = !$color_toggle;?>
                        <section id="blog" class="pt-5 pb-5" style="@if($color_toggle) @if($mode == 0) background:#282828;color:white @else background:#fff;color:dark @endif @else @if($mode == 0) background:#242424;color:white @else background:#F9F9F9;color:dark @endif @endif">
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
                                                                <img class="pt-2 pb-2 " src="{{asset('storage/content/experience/'.$exp_value->logo)}}" alt="" width="80px" >
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
                                                    @if ($exp_key !== array_key_last($experience_data)) 
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
                                                            <img class="pt-2 pb-2 rounded-circle" src="{{asset('storage/content/education/'.$educ_value->logo)}}" alt="" width="80px" >
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
</div>
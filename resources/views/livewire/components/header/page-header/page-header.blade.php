<div style="font-family: 'Roboto';font-size: 13px;">
    <div style="width:100%;padding-top: 60px;" >
    </div>
    <header class="p-2 fixed-top shadow @if($mode == 1) bg-white @else bg-dark @endif" data-bs-theme="light" style="max-height:70px;" >
        <div class="container d-flex justify-content-between align-items-center " >
            <h1 class="logo mr-auto">
                <a href="{{ Route('homepage.drusha') }}" class="text-dark link-underline link-underline-opacity-0">
                    <span>
                        <img src="{{ asset('assets\page\home.jpg') }}" alt="Drusha Corp" class="object-fit-cover" width="40px" height="40px">
                        <span class="@if($mode == 0) text-white @else text-dark @endif d-none d-lg-inline-block">
                            DRUSHA
                        </span>
                    </span>
                </a>
            </h1>
            
            <div class="d-flex justify-content-end align-items-center">
                <nav class="navbar navbar-expand-lg " >
                    <div class="collapse d-none d-lg-block text-uppercase" id="collapseExample">
                        <ul class="navbar-nav px-2 ">
                            <li class="nav-item"><a href="@if($user_id && $user_id!=1)  /homepage/{{$user_id}} @else {{ Route('homepage.drusha') }} @endif" wire:navigate class="nav-link @if($mode == 0) text-white @else text-dark @endif active"><strong>HOME</strong></a></li>
                            <li class="nav-item"><a href="@if($user_id && $user_id!=1)  /about/{{$user_id}} @else {{ Route('about.drusha') }} @endif " wire:navigate class="nav-link @if($mode == 0) text-white @else text-dark @endif"><strong>About</strong></a></li>
                            <li class="nav-item"><a href="@if($user_id && $user_id!=1)  /faq/{{$user_id}} @else {{ Route('faq.drusha') }} @endif " wire:navigate class="nav-link @if($mode == 0) text-white @else text-dark @endif"><strong>FAQs</strong></a></li>
                            <!-- <li class="nav-item"><a href="@if($user_id && $user_id!=1)  /techstack/{{$user_id}} @else {{ Route('techstack.drusha') }} @endif " wire:navigate class="nav-link @if($mode == 0) text-white @else text-dark @endif"><strong>Tech Stack</strong></a></li> -->
                            <li class="nav-item"><a href="@if($user_id && $user_id!=1)  /projects/{{$user_id}} @else {{ Route('project.drusha') }} @endif " wire:navigate class="nav-link @if($mode == 0) text-white @else text-dark @endif"><strong>Projects</strong></a></li>
                            <li class="nav-item"><a href="@if($user_id && $user_id!=1)  /blogs/{{$user_id}} @else {{ Route('blog.drusha') }} @endif" wire:navigate class="nav-link @if($mode == 0) text-white @else text-dark @endif"><strong>Blog</strong></a></li>
                            <li class="nav-item"><a href="@if($user_id && $user_id!=1)  /contact/{{$user_id}} @else {{ Route('contact.drusha') }} @endif" wire:navigate.hover class="nav-link @if($mode == 0) text-white @else text-dark @endif"><strong>Contact</strong></a></li>
                            <li class="nav-item aligh-items-center"> 
                            <a class="form-check form-switch aligh-items-center m-2">
                                <input class="form-check-input" id="mode" type="checkbox" role="switch" @if($mode == 1) @else checked @endif id="mode" wire:click="mode_toggle()">
                                <label for="mode" class="form-check-label @if($mode == 0) text-white @else text-dark @endif"" for="flexSwitchCheckDefault"> @if($mode == 1) Light @else Dark @endif</label>
                            </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <div class="vr mx-2 @if($mode == 0) text-white @else text-dark @endif" ></div>
                    @if(1)
                        @foreach($links_data as $key => $value)
                            @if( ($key) == $links_max_display )
                                @break;
                            @endif
                            <a href="{{$value->link}}" class="text-secondary mx-2" target="_blank">  
                                <img class="pt-2 pb-2 " src="{{asset('storage/content/links/'.$value->image)}}" alt="" width="30px" >
                            </a>
                        @endforeach
                    @endif
                    @if($user_id !=1 && $request)
                        <div><a class="btn btn-outline-warning" href="/{{$request}}">ACTUAL SITE</a></div>
                    @endif
                <nav class="navbar  d-lg-none opacity-0  " >
                    <div class="container-fluid ">
                        <button class="navbar-toggler " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                            <i class="bi bi-list fs-5  @if($mode == 0) text-white @else text-dark @endif"></i>
                        </button>
                    </div>
                </nav>

                 
                <div class="offcanvas offcanvas-end @if($mode == 1) text-dark @else text-white  bg-secondary @endif" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Navigation</h5>
                        <button type="button" class="btn-close mx-2" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3"  >
                        <li class="nav-item"><a href="{{ Route('home.drusha') }}" wire:navigate class="nav-link @if($mode == 0) text-white @else text-dark @endif active"><strong><i class="bi bi-house-door"></i> HOME</strong></a></li>
                            <li class="nav-item"><a href="{{ Route('about.drusha') }}" wire:navigate class="nav-link @if($mode == 0) text-white @else text-dark @endif"><strong> <i class="bi bi-info-circle"></i> About</strong></a></li>
                            <li class="nav-item"><a href="{{ Route('faq.drusha') }}" wire:navigate class="nav-link @if($mode == 0) text-white @else text-dark @endif"><strong><i class="bi bi-patch-question"></i> FAQs</strong></a></li>
                            <li class="nav-item"><a href="{{ Route('techstack.drusha') }}" wire:navigate class="nav-link @if($mode == 0) text-white @else text-dark @endif"><strong><i class="bi bi-motherboard"></i> Tech Stack</strong></a></li>
                            <li class="nav-item"><a href="{{ Route('project.drusha') }}" wire:navigate class="nav-link @if($mode == 0) text-white @else text-dark @endif"><strong><i class="bi bi-menu-button-wide"></i> Projects</strong></a></li>
                            <li class="nav-item"><a href="{{ Route('blog.drusha') }}" wire:navigate class="nav-link @if($mode == 0) text-white @else text-dark @endif"><strong><i class="bi bi-file-earmark-richtext"></i> Blog</strong></a></li> 
                            <li class="nav-item"><a href="{{ Route('contact.drusha') }}" wire:navigate.hover class="nav-link @if($mode == 0) text-white @else text-dark @endif"><strong><i class="bi bi-telephone"></i> Contact</strong></a></li>
                            <li class="nav-item"><a href="{{ Route('contact.drusha') }}" wire:navigate.hover class="nav-link @if($mode == 0) text-white @else text-dark @endif"><i class="bi bi-folder"></i> <strong>CV </strong></a></li>
                            <li class="nav-item"><a href="{{ Route('login') }}" wire:navigate.hover class="nav-link @if($mode == 0) text-white @else text-dark @endif"><i class="bi bi-incognito"></i> <strong>Secret </strong></a></li>
                            <li class="nav-item aligh-items-center"> 
                            <a class="form-check form-switch aligh-items-center">
                                <input class="form-check-input" type="checkbox" role="switch" @if($mode == 1) @else checked @endif id="mode" wire:click="mode_toggle()">
                                <label class="form-check-label @if($mode == 0) text-white @else text-dark @endif"" for="flexSwitchCheckDefault"> @if($mode == 1) Light @else Dark @endif</label>
                            </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
           
        </div>
        <nav class="navbar  d-lg-none  " style="position: absolute;top: 10px;right: 3px;font-size: 18px;">
            <div class="container-fluid ">
                <button class="navbar-toggler  @if($mode == 0) border-secondary @else @endif" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <i class="bi bi-list fs-5  @if($mode == 0) text-secondary @else text-dark @endif"></i>
                </button>
            </div>
        </nav>
    </header>
</div>


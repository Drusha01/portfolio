<div>
    <div style="width:100%;padding-top: 70px;">

</div>
    <header class="p-2 bg-light fixed-top shadow " data-bs-theme="light" style="max-height:70px;">
        <div class="container d-flex justify-content-between align-items-center " >
            <h1 class="logo mr-auto">
                <a href="{{ Route('home') }}">
                    <span>
                        <img src="{{ asset('assets\page\home.jpg') }}" alt="Drusha Corp" class="object-fit-cover" width="40px" height="40px">
                    </span>
                </a>
            </h1>
            
            <div class="d-flex justify-content-end align-items-center">
                <nav class="navbar navbar-expand-lg " >
                    <div class="collapse d-none d-lg-block text-uppercase" id="collapseExample">
                        <ul class="navbar-nav px-2 ">
                            <li class="nav-item"><a href="{{ Route('home') }}" wire:navigate class="nav-link text-dark active"><strong>HOME</strong></a></li>
                            <li class="nav-item"><a href="{{ Route('about') }}" wire:navigate class="nav-link text-dark"><strong>About</strong></a></li>
                            <li class="nav-item"><a href="{{ Route('faq') }}" wire:navigate class="nav-link text-dark"><strong>FAQs</strong></a></li>
                            <li class="nav-item"><a href="{{ Route('techstack') }}" wire:navigate class="nav-link text-dark"><strong>Tech Stack</strong></a></li>
                            <li class="nav-item"><a href="{{ Route('project') }}" wire:navigate class="nav-link text-dark"><strong>Projects</strong></a></li>
                            <li class="nav-item"><a href="{{ Route('contact') }}" wire:navigate class="nav-link text-dark"><strong>Contact</strong></a></li>
                        </ul>
                    </div>
                </nav>

                <div class="vr mx-2" ></div>
                <a href="https://www.facebook.com/atgscorp" class="text-secondary mx-2" target="_blank"><i class="bi bi-facebook fs-5"></i></a>
                <a href="https://www.instagram.com/atgscorp" class="text-secondary mx-2" target="_blank"><i class="bi bi-instagram fs-5"></i></a>
                <a href="https://www.linkedin.com/company/ally-techno-grit-solutions" class="text-secondary mx-2" target="_blank"><i class="bi bi-linkedin fs-5"></i></a>
                <a href="https://www.linkedin.com/company/ally-techno-grit-solutions" class="text-secondary mx-2" target="_blank"><i class="bi bi-github fs-5"></i></a>
               
                <nav class="navbar  d-lg-none opacity-0  " >
                    <div class="container-fluid ">
                        <button class="navbar-toggler " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                            <i class="bi bi-list fs-5"></i>
                        </button>
                    </div>
                </nav>

                 
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                        <button type="button" class="btn-close mx-2" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item"><a href="#" class="nav-link "><strong>HOME</strong></a></li>
                            <li class="nav-item"><a href="#" class="nav-link "><strong>Features</strong></a></li>
                            <li class="nav-item"><a href="#" class="nav-link "><strong>Pricing</strong></a></li>
                            <li class="nav-item"><a href="#" class="nav-link "><strong>FAQs</strong></a></li>
                            <li class="nav-item"><a href="#" class="nav-link "><strong>About</strong></a></li>
                            
                        </ul>
                    </div>
                </div>
            </div>
           
        </div>
        <nav class="navbar  d-lg-none  " style="position: absolute;top: 10px;right: 3px;font-size: 18px;">
            <div class="container-fluid ">
                <button class="navbar-toggler " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <i class="bi bi-list fs-5"></i>
                </button>
            </div>
        </nav>
    </header>
</div>


<div style="font-family: 'Roboto';font-size: 13px;height:72px;" >
    <header class="p-2 fixed-top shadow align-items-center @if($mode == 1) bg-white @else bg-dark @endif" data-bs-theme="light">
        <div class="container-fluid mx-3 d-flex justify-content-between align-items-center" >
            <h1 class="logo mr-auto">
                <a href="{{ Route('admin.dashboard') }}" class="align-items-center link-underline link-underline-opacity-0 @if($mode == 1) text-dark @else text-white @endif">
                    <span>
                        <img src="{{ asset('assets\page\home.png') }}"  alt="Hanrickson E. Dumapit Web Developer" class="object-fit-cover" width="40px" height="40px">
                        <span class="@if($mode == 0) text-white @else text-dark @endif d-none d-lg-inline-block">
                            DRUSHA
                        </span>
                    </span>
                </a>
            </h1>
            <div class="dropdown mx-4">
                <div class="row ">
                    <div class="col p-0">
                        <div class="form-check form-switch aligh-items-center m-2 d-none d-lg-inline-block">
                            <input class="form-check-input" id="mode" type="checkbox" role="switch" @if($mode == 1) @else checked @endif id="mode" wire:click="mode_toggle()">
                            <label for="mode" class="form-check-label @if($mode == 0) text-white @else text-dark @endif"" for="flexSwitchCheckDefault"> Dark </label>
                        </div>
                    </div>
                    <div class="col">
                    <a class="dropdown-toggle link-underline link-underline-opacity-0 @if($mode == 1) link-dark @else link-light @endif" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <span>
                            <img src="{{ asset('assets\page\home.png') }}"  alt="Hanrickson E. Dumapit Web Developer" class="object-fit-cover rounded-circle mx-3" width="40px" height="40px">
                            <span class="@if($mode == 0) text-white @else text-dark @endif d-none d-lg-inline-block">
                            {{$fullname}}
                            </span>
                        </span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{ Route('admin.admin-profile') }}" wire:navigate.hover>Profile</a></li>
                        <li class="form-check form-switch aligh-items-center m-2 d-block d-sm-block d-md-none">
                            <input class="form-check-input" id="mode" type="checkbox" role="switch" @if($mode == 1) @else checked @endif id="mode" wire:click="mode_toggle()">
                            <label for="mode" class="form-check-label @if($mode == 0) text-secondary @else text-secondary @endif"" for="flexSwitchCheckDefault"> Dark </label>
                        </li>
                        <li><a class="dropdown-item" href="{{ Route('logout') }}" >Logout</a></li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
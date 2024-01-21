<div>
    <ul class="sidebar-nav p-0 m-0" style="list-style: none;">
        <li class="nav-item h6 m-0 p-0" id="sidebarlink"><a href="{{Route('admin.dashboard') }}" wire:navigate style="@if(request()->is('admin/dashboard*')) @if($mode == 0) background-color:#484848;color:#fff; @else background-color:#f1f1f1;color:#111111; @endif @endif width:inherit;height:inherit" class="nav-link px-4 py-3 link-underline link-underline-opacity-0 "><strong><i class="bi bi-file-earmark-bar-graph"></i> &nbsp;&nbsp;Dashboard</strong></a></li>
        <li class="nav-item h6 m-0 p-0" id="sidebarlink"><a href="{{Route('admin.homepage') }}" wire:navigate style="@if(request()->is('admin/homepage*')) @if($mode == 0) background-color:#484848;color:#fff; @else background-color:#f1f1f1;color:#111111; @endif @endif width:inherit;height:inherit" class="nav-link px-4 py-3 link-underline link-underline-opacity-0 "><strong><i class="bi bi-house-door"></i> &nbsp;&nbsp;Homepage</strong></a></li>
        <li class="nav-item h6 m-0 p-0" id="sidebarlink"><a href="{{Route('admin.about') }}" wire:navigate style="@if(request()->is('admin/about*')) @if($mode == 0) background-color:#484848;color:#fff; @else background-color:#f1f1f1;color:#111111; @endif @endif ;width:inherit;height:inherit" class="nav-link px-4 py-3 link-underline link-underline-opacity-0 "><strong><i class="bi bi-info-circle"></i>  &nbsp;&nbsp;About</strong></a></li>
        <li class="nav-item h6 m-0 p-0" id="sidebarlink"><a href="{{Route('admin.faq') }}" wire:navigate style="@if(request()->is('admin/faq*')) @if($mode == 0) background-color:#484848;color:#fff; @else background-color:#f1f1f1;color:#111111; @endif @endif width:inherit;height:inherit" class="nav-link px-4 py-3 link-underline link-underline-opacity-0 "><strong><i class="bi bi-patch-question"></i>  &nbsp;&nbsp;FAQ</strong></a></li>
        <li class="nav-item h6 m-0 p-0" id="sidebarlink"><a href="{{Route('admin.techstack') }}" wire:navigate style="@if(request()->is('admin/techstack*')) @if($mode == 0) background-color:#484848;color:#fff; @else background-color:#f1f1f1;color:#111111; @endif @endif width:inherit;height:inherit" class="nav-link px-4 py-3 link-underline link-underline-opacity-0 "><strong><i class="bi bi-motherboard"></i>  &nbsp;&nbsp;Tech Stack</strong></a></li>
        <li class="nav-item h6 m-0 p-0" id="sidebarlink"><a href="{{Route('admin.projects') }}" wire:navigate style="@if(request()->is('admin/projects*')) @if($mode == 0) background-color:#484848;color:#fff; @else background-color:#f1f1f1;color:#111111; @endif @endif width:inherit;height:inherit" class="nav-link px-4 py-3 link-underline link-underline-opacity-0 "><strong><i class="bi bi-menu-button-wide"></i>  &nbsp;&nbsp;Projects</strong></a></li>
        <li class="nav-item h6 m-0 p-0" id="sidebarlink"><a href="{{Route('admin.blogs') }}" wire:navigate style="@if(request()->is('admin/blogs*')) @if($mode == 0) background-color:#484848;color:#fff; @else background-color:#f1f1f1;color:#111111; @endif @endif width:inherit;height:inherit" class="nav-link px-4 py-3 link-underline link-underline-opacity-0 "><strong><i class="bi bi-file-earmark-richtext"></i>  &nbsp;&nbsp;Blogs</strong></a></li>
        <li class="nav-item h6 m-0 p-0" id="sidebarlink"><a href="{{Route('admin.contact') }}" wire:navigate style="@if(request()->is('admin/contact*')) @if($mode == 0) background-color:#484848;color:#fff; @else background-color:#f1f1f1;color:#111111; @endif @endif width:inherit;height:inherit" class="nav-link px-4 py-3 link-underline link-underline-opacity-0 "><strong><i class="bi bi-telephone"></i>  &nbsp;&nbsp;Contact</strong></a></li>
        <li class="nav-item h6 m-0 p-0" id="sidebarlink"><a href="{{Route('admin.settings') }}" wire:navigate style="@if(request()->is('admin/settings*')) @if($mode == 0) background-color:#484848;color:#fff; @else background-color:#f1f1f1;color:#111111; @endif @endif width:inherit;height:inherit" class="nav-link px-4 py-3 link-underline link-underline-opacity-0 "><strong><i class="bi bi-gear"></i>  &nbsp;&nbsp;Settings</strong></a></li>
    </ul>
    <style>
        #sidebarlink:hover {
            color:#{{$color}};
            background-color:#484848;
        }
    </style>
    <script>
        
    </script>    
</div>

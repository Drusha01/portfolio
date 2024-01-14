<div>
    <ul class="sidebar-nav p-0 m-0 "style="list-style: none;">
        <li class="nav-item h6 m-0 p-0" id="sidebarlink"><a href="{{Route('admin.dashboard') }}" wire:navigate style="{{request()->is('admin/dashboard*') ? 'background-color: #fff;  color: black;' : ';'}};width:inherit;height:inherit" class="nav-link px-5 py-3 link-underline link-underline-opacity-0 "><strong><i class="bi bi-file-earmark-bar-graph"></i> Dashboard</strong></a></li>
        <li class="nav-item h6 m-0 p-0" id="sidebarlink"><a href="{{Route('admin.homepage') }}" wire:navigate style="{{request()->is('admin/homepage*') ? 'background-color: #fff;  color: black;' : ';'}};width:inherit;height:inherit" class="nav-link px-5 py-3 link-underline link-underline-opacity-0 "><strong><i class="bi bi-file-earmark-bar-graph"></i> Homepage</strong></a></li>
        <li class="nav-item h6 m-0 p-0" id="sidebarlink"><a href="{{Route('admin.about') }}" wire:navigate style="{{request()->is('admin/about*') ? 'background-color: #fff;  color: black;' : ';'}};width:inherit;height:inherit" class="nav-link px-5 py-3 link-underline link-underline-opacity-0 "><strong><i class="bi bi-file-earmark-bar-graph"></i> About</strong></a></li>
        <li class="nav-item h6 m-0 p-0" id="sidebarlink"><a href="{{Route('admin.faq') }}" wire:navigate style="{{request()->is('admin/faq*') ? 'background-color: #fff;  color: black;' : ';'}};width:inherit;height:inherit" class="nav-link px-5 py-3 link-underline link-underline-opacity-0 "><strong><i class="bi bi-file-earmark-bar-graph"></i> FAQ</strong></a></li>
        <li class="nav-item h6 m-0 p-0" id="sidebarlink"><a href="{{Route('admin.techstack') }}" wire:navigate style="{{request()->is('admin/techstack*') ? 'background-color: #fff;  color: black;' : ';'}};width:inherit;height:inherit" class="nav-link px-5 py-3 link-underline link-underline-opacity-0 "><strong><i class="bi bi-file-earmark-bar-graph"></i> Tech Stack</strong></a></li>
        <li class="nav-item h6 m-0 p-0" id="sidebarlink"><a href="{{Route('admin.projects') }}" wire:navigate style="{{request()->is('admin/projects*') ? 'background-color: #fff;  color: black;' : ';'}};width:inherit;height:inherit" class="nav-link px-5 py-3 link-underline link-underline-opacity-0 "><strong><i class="bi bi-file-earmark-bar-graph"></i> Projects</strong></a></li>
        <li class="nav-item h6 m-0 p-0" id="sidebarlink"><a href="{{Route('admin.blogs') }}" wire:navigate style="{{request()->is('admin/blogs*') ? 'background-color: #fff;  color: black;' : ';'}};width:inherit;height:inherit" class="nav-link px-5 py-3 link-underline link-underline-opacity-0 "><strong><i class="bi bi-file-earmark-bar-graph"></i> Blogs</strong></a></li>
        <li class="nav-item h6 m-0 p-0" id="sidebarlink"><a href="{{Route('admin.contact') }}" wire:navigate style="{{request()->is('admin/contact*') ? 'background-color: #fff;  color: black;' : ''}};width:inherit;height:inherit" class="nav-link px-5 py-3 link-underline link-underline-opacity-0 "><strong><i class="bi bi-file-earmark-bar-graph"></i> Contact</strong></a></li>
    </ul>
    <style>
        #sidebarlink:hover {
            background:#{{$color}};
            color:#{{$background}};
        }
        #sidebar{
            background:#{{$background}};
            color:#{{$color}};
        }
    </style>
    <script>
        
    </script>    
</div>

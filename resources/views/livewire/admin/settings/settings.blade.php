<div>
    @if($mode == 0)
        <style>
        
            input::placeholder {
                color: gray !important;
            }
            .selectheader{

                padding:10px;
                border-radius:5px;
                color:white;
                background:#242424;
                border-color:white;
                font-size:16px;

            }
            select option{
            color: white;
            background-color: gray;
            }
        </style>
    @endif
    <div class="row" style="margin:70px 0px 0px 0px; padding:0px;">
        <div class="col p-0 border-end @if($mode) border-dark @else @endif" id="sidebar" style="@if($mode == 1)background-color:white;color:black; @else background-color:#232323;color:white; @endif height:calc(100vh - 70px);max-width:280px;">
            @livewire('components.sidebar.admin-sidebar.admin-sidebar')
        </div>
        <div class="col" style="@if($mode == 1) background-color:white;color:black; @else background-color:#242424;color:white; @endif">
            <div class="row">
                <div class="col lead pt-4 px-4">
                    Settings
                </div>
            </div>
            <div class="row px-3 pt-2">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button @if($mode== 0)style="background-color:#242424;;color:white;border-bottom-color: white" @endif wire:ignore.self wire:click="update_data()" class="nav-link active"id="project-tab" data-bs-toggle="tab" data-bs-target="#project-tab-pane" type="button" role="tab" aria-controls="project-tab-pane" aria-selected="true">User Management</button>
                    </li>
                    
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div wire:ignore.self wire:key="project" class="tab-pane fade show active" id="project-tab-pane" role="tabpanel" aria-labelledby="project-tab" tabindex="0">
                    
                    </div>

                    

                </div>
            </div>
        </div>
    </div>

    @persist('back-to-top')
        <button type="button" class="btn btn-floating btn-md" id="btn-back-to-top" style="background-color:#0174BE;color:white;position: fixed;bottom: 20px;right: 20px;display: none;"><strong><i class="bi bi-chevron-up fs-5"></i></strong></button>
        <script>
            let mybutton = document.getElementById("btn-back-to-top");
            window.onscroll = function () {
            scrollFunction();
            };

            function scrollFunction() {
            if (
                document.body.scrollTop > 20 ||
                document.documentElement.scrollTop > 20
            ) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
            }
            mybutton.addEventListener("click", backToTop);

            function backToTop() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
            }
        </script>
    @endpersist
</div>

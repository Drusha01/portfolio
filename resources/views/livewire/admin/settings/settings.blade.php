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
    <div class="row" style="margin:0px 0px 0px 0px; padding:0px;">
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
                        <button @if($mode== 0)style="background-color:#242424;;color:white;border-bottom-color: white" @endif wire:ignore.self wire:click="update_data()" class="nav-link active" id="user-management-tab" data-bs-toggle="tab" data-bs-target="#user-management-tab-pane" type="button" role="tab" aria-controls="user-management-tab-pane" aria-selected="true">User Management</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button @if($mode== 0)style="background-color:#242424;;color:white;border-bottom-color: white" @endif wire:ignore.self wire:click="update_data()" class="nav-link "id="page-assets-tab" data-bs-toggle="tab" data-bs-target="#page-assets-tab-pane" type="button" role="tab" aria-controls="page-assets-tab-pane" aria-selected="true">Page Assets</button>
                    </li>
                    
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div wire:ignore.self wire:key="user-management" class="tab-pane fade show active" id="user-management-tab-pane" role="tabpanel" aria-labelledby="user-management-tab" tabindex="0">
                        <div class="row d-flex">
                            <div class="col">
                                <div class="row py-2">
                                    <div class="col-12 p-0 mx-2 d-flex">
                                        <button class="btn @if($mode) btn-secondary @else btn-outline-secondary @endif d-flex mx-1" data-bs-toggle="modal" data-bs-target="#user-data-filter">
                                            <i class="bi bi-funnel-fill"></i><span>Columns</span>
                                        </button>
                                        <input class="form-control mx-1" style="max-width:300px;@if($mode ==0) background-color:#282828;color:white; @endif" type="text" id="search" placeholder="Search ... "/> 
                                    
                                        <button class="btn @if($mode) btn-primary @else btn-outline-primary @endif mx-1" wire:click="add_row('adduser')">
                                            <div><span>Add</span></div>
                                        </button>
                                        <div class="d-flex align-items-center mx-1">
                                            <div>
                                                <span >
                                                    Max Display
                                                </span>
                                            </div>
                                            <input type="number"style="max-width:70px;@if($mode ==0) background-color:#282828;color:white; @endif" id="max-number" class="form-control mx-1" wire:model.defer="user_max_display" wire:change="max_display('user')" id="" min="0" max="100">
                                        </div>
                                        <div class="d-flex align-items-center mx-1">
                                            <div class="form-check form-switch aligh-items-center m-2">
                                                <input class="form-check-input" type="checkbox" role="switch" @if($user_active == 1) checked @endif  id="user-active" wire:click="toggle_active('user')">
                                                <label for="mode" class="form-check-label" for="flexSwitchCheckDefault"> @if($user_active == 1) Active @else Inactive @endif</label>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="me-1 sort-btn ">Per&nbsp;Page</div>
                                            <div>
                                                <select id="size" class="form-select @if($mode == 0) bg-dark text-light @endif" wire:model="user_params.offset" wire:change="update_user_params({{$user_data['pagination_params']['page_between']}},{{$user_data['pagination_params']['offset']}},1,1)">
                                                    <option value="5" >5</option>
                                                    <option selected value="10">10</option>
                                                    <option value="50">50</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                  
                                </div>
                               
                                <div class="row">
                                    <table class="table @if($mode == 1) table-striped @else table-dark @endif border">
                                        <thead class="thead-dark">
                                            <tr>
                                                @foreach($user_filter as $key =>$value)
                                                    @if($value['active'])
                                                        <th scope="col" wire:key="user-th-{{$key}}" class="{{$value['class']}}">{{$value['name']}}</th>
                                                    @endif
                                                @endforeach
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($user_data['content'])
                                                @foreach ($user_data['content'] as $key =>$value)
                                                    <tr wire:key="users-{{$value->user_id}}" class="align-middle">
                                                        @foreach($user_filter as $filter_key =>$filter_value)
                                                            @if($filter_value['name'] == '#'  && $filter_value['active'])
                                                                <th scope="col" >
                                                                    <span class="d-flex text-center align-items-center">

                                                                        {{ ($user_data['pagination_params']['offset'] * ($user_data['pagination_params']['current_page']-1))+$key+1  }}
                                                                        <!-- <button class="btn btn-primary mx-2 d-none d-sm-block">
                                                                            <i class="bi bi-plus-circle"></i>
                                                                        </button> -->
                                                                    </span>
                                                                </th>
                                                                
                                                            @elseif($filter_value['name'] == 'Action'  && $filter_value['active'])
                                                                <td class="text-center">
                                                                    <button class="btn @if($mode) btn-success @else btn-outline-success @endif "  wire:click="edit_user('edituser',{{$value->user_id}})">Edit</button>
                                                                    <button class="btn @if($mode) btn-danger @else btn-outline-danger @endif" wire:click="delete_user('deleteuser',{{$value->user_id}})">Delete</button>
                                                                </td>
                                                            @elseif ($filter_value['name'] == 'Order'  && $filter_value['active'])
                                                                <td class="">
                                                                    @if($key === array_key_first($user_data) && array_key_first($user_data) !== array_key_last($user_data) )
                                                                    <div class="btn-group-vertical btn-group-sm">
                                                                        <button type="button" class="btn  @if($mode == 1) btn-outline-dark @else btn-outline-light @endif " wire:click="move_down_user({{$value->user_id}})">
                                                                            <i class="bi bi-chevron-down"></i>
                                                                        </button>
                                                                    </div>   
                                                                    @elseif($key === array_key_last($user_data) && array_key_first($user_data) !== array_key_last($user_data))
                                                                    <div class="btn-group-vertical btn-group-sm ">
                                                                        <button type="button" class="btn @if($mode == 1) btn-outline-dark @else btn-outline-light @endif" wire:click="move_up_user({{$value->user_id}})">
                                                                            <i class="bi bi-chevron-up"></i>
                                                                        </button>
                                                                    </div>  
                                                                    @else
                                                                    <div class="btn-group-vertical btn-group-sm ">
                                                                        <button type="button" class="btn @if($mode == 1) btn-outline-dark @else btn-outline-light @endif" wire:click="move_up_user({{$value->user_user_id}})">
                                                                            <i class="bi bi-chevron-up"></i>
                                                                        </button>
                                                                        <button type="button" class="btn @if($mode == 1) btn-outline-dark @else btn-outline-light @endif" wire:click="move_down_user({{$value->user_user_id}})">
                                                                            <i class="bi bi-chevron-down"></i>
                                                                        </button>
                                                                    </div>  
                                                                    @endif
                                                                </td>
                                                            @elseif ($filter_value['name'] == 'Image'  && $filter_value['active'])
                                                                <td class="">
                                                                    <a href="{{asset('storage/images/original/'.$value->{$filter_value['column_name']})}}" target="blank">
                                                                        <img src="{{asset('storage/images/resize/'.$value->{$filter_value['column_name']})}}" alt="" style="height: 100px; ">
                                                                    </a>
                                                                </td>
                                                            @else
                                                                @if(  $filter_value['active'])
                                                                <td>{{ $value->{$filter_value['column_name']} }}</td>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr class="align-middle ">
                                                    <th colspan="100" class="text-center">NO RECORD</th>
                                                </tr>
                                            @endif 
                                        </tbody>
                                    </table>
                                </div>
                                @if($user_data['page_links'])
                                    <div class="row d-flex text-center">
                                        <div class="col">
                                            @foreach ($user_data['page_links'] as $key =>$value)
                                                <button 
                                                    wire:click="update_user_params({{$user_data['pagination_params']['page_between']}},10,{{$value['cursor']}},{{$value['page']}})"
                                                    style="min-width:60px;"
                                                    class="btn @if($mode == 1) @if($value['active'])  btn-dark @else btn-outline-dark @endif @else  @if($value['active'])  btn-light @else btn-outline-light @endif @endif">
                                                        {{$value['page_content']}}
                                                </button>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div wire:ignore.self wire:key="page-assets" class="tab-pane fade show " id="page-assets-tab-pane" role="tabpanel" aria-labelledby="page-assets-tab" tabindex="0">
                        page assets
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

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
            <div class="d-flex justify-content-between">
                <div class=" lead pt-4 px-4">
                    Projects  
                </div>
                <a class="pt-4 px-4" href="/project/{{$user_id}}" target="_blank">
                    <button class="btn btn-outline-secondary" >
                        View Page
                    </button>
                </a>
            </div>
            <div class="row px-3 pt-2">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button @if($mode== 0)style="background-color:#242424;;color:white;border-bottom-color: white" @endif wire:ignore.self wire:click="update_data()" class="nav-link active"id="project-tab" data-bs-toggle="tab" data-bs-target="#project-tab-pane" type="button" role="tab" aria-controls="project-tab-pane" aria-selected="true">Projects</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button @if($mode== 0)style="background-color:#242424;;color:white;border-bottom-color: white"@endif wire:ignore.self wire:click="update_data()" class="nav-link" id="project-image-content-tab" data-bs-toggle="tab" data-bs-target="#project-image-content-tab-pane" type="button" role="tab" aria-controls="project-image-content-tab-pane" aria-selected="true">Project Image Content</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button @if($mode== 0)style="background-color:#242424;;color:white;border-bottom-color: white"@endif wire:ignore.self wire:click="update_data()" class="nav-link" id="project-developers-tab" data-bs-toggle="tab" data-bs-target="#project-developers-tab-pane" type="button" role="tab" aria-controls="project-developers-tab-pane" aria-selected="true">Project Developers</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button @if($mode== 0)style="background-color:#242424;;color:white;border-bottom-color: white;"@endif wire:ignore.self wire:click="update_data()" class="nav-link" id="project-developers-tab" data-bs-toggle="tab" data-bs-target="#developers-tab-pane" type="button" role="tab" aria-controls="developers-tab-pane" aria-selected="true">Developers</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div wire:ignore.self wire:key="project" class="tab-pane fade show active" id="project-tab-pane" role="tabpanel" aria-labelledby="project-tab" tabindex="0">
                        <div class="row d-flex">
                            <div class="col">
                                <div class="row py-2">
                                    <div class="col-12 p-0 mx-2 d-flex">
                                        <button class="btn @if($mode) btn-secondary @else btn-outline-secondary @endif d-flex mx-1" data-bs-toggle="modal" data-bs-target="#project-data-filter">
                                            <i class="bi bi-funnel-fill"></i><span>Columns</span>
                                        </button>
                                        <input class="form-control mx-1" style="max-width:300px;@if($mode ==0) background-color:#282828;color:white; @endif" type="text" id="search" placeholder="Search ... "/> 
                                    
                                        <button class="btn @if($mode) btn-primary @else btn-outline-primary @endif mx-1" wire:click="add_row('addProject')">
                                            <div><span>Add</span></div>
                                        </button>
                                        <div class="d-flex align-items-center mx-1">
                                            <div>
                                                <span >
                                                    Max Display
                                                </span>
                                            </div>
                                            <input type="number"style="max-width:70px;@if($mode ==0) background-color:#282828;color:white; @endif" id="max-number" class="form-control mx-1" wire:model.defer="project_max_display" wire:change="max_display('projects')" id="" min="0" max="100">
                                        </div>
                                        <div class="d-flex align-items-center mx-1">
                                            <div class="form-check form-switch aligh-items-center m-2">
                                                <input class="form-check-input" type="checkbox" role="switch" @if($project_active == 1) checked @endif  id="project-active" wire:click="toggle_active('projects')">
                                                <label for="mode" class="form-check-label" for="flexSwitchCheckDefault"> @if($project_active == 1) Active @else Inactive @endif</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table @if($mode == 1) table-striped @else table-dark @endif border">
                                        <thead class="thead-dark">
                                            <tr>
                                                @foreach($project_filter as $key =>$value)
                                                    @if($value['active'])
                                                        <th scope="col" wire:key="project-th-{{$key}}" class="{{$value['class']}}">{{$value['name']}}</th>
                                                    @endif
                                                @endforeach
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($project_data)
                                                @foreach ($project_data as $key =>$value)
                                                    <tr wire:key="experience-{{$key}}" class="align-middle">
                                                        @foreach($project_filter as $filter_key =>$filter_value)
                                                            @if($filter_value['name'] == '#'  && $filter_value['active'])
                                                                <th scope="col" >
                                                                    <span class="d-flex text-center align-items-center">
                                                                        {{ $key+1  }}
                                                                    </span>
                                                                </th>
                                                            @elseif($filter_value['name'] == 'Developers'  && $filter_value['active'])
                                                                <td class="text-center">
                                                                    <button class="btn @if($mode) btn-primary @else btn-outline-primary @endif" wire:click="delete_project('ViewProjectDevelopers',{{$value->id}})">View</button>
                                                                </td>
                                                            @elseif($filter_value['name'] == 'Image Content'  && $filter_value['active'])
                                                                <td class="text-center">
                                                                    <button class="btn @if($mode) btn-primary @else btn-outline-primary @endif" wire:click="delete_project('ViewProjectContent',{{$value->id}})">View</button>
                                                                </td>
                                                            @elseif($filter_value['name'] == 'Action'  && $filter_value['active'])
                                                                <td class="text-center">
                                                                    <button class="btn @if($mode) btn-success @else btn-outline-success @endif "  wire:click="edit_project('editProject',{{$value->id}})">Edit</button>
                                                                    <button class="btn @if($mode) btn-danger @else btn-outline-danger @endif" wire:click="delete_project('deleteProject',{{$value->id}})">Delete</button>
                                                                </td>
                                                            @elseif ($filter_value['name'] == 'Order'  && $filter_value['active'])
                                                                <td class="">
                                                                    @if($key === array_key_first($project_data) && array_key_first($project_data) !== array_key_last($project_data) )
                                                                    <div class="btn-group-vertical btn-group-sm">
                                                                        <button type="button" class="btn  @if($mode == 1) btn-outline-dark @else btn-outline-light @endif " wire:click="move_down_project({{$value->id}})">
                                                                            <i class="bi bi-chevron-down"></i>
                                                                        </button>
                                                                    </div>   
                                                                    @elseif($key === array_key_last($project_data) && array_key_first($project_data) !== array_key_last($project_data))
                                                                    <div class="btn-group-vertical btn-group-sm ">
                                                                        <button type="button" class="btn @if($mode == 1) btn-outline-dark @else btn-outline-light @endif" wire:click="move_up_project({{$value->id}})">
                                                                            <i class="bi bi-chevron-up"></i>
                                                                        </button>
                                                                    </div>  
                                                                    @else
                                                                    <div class="btn-group-vertical btn-group-sm ">
                                                                        <button type="button" class="btn @if($mode == 1) btn-outline-dark @else btn-outline-light @endif" wire:click="move_up_project({{$value->id}})">
                                                                            <i class="bi bi-chevron-up"></i>
                                                                        </button>
                                                                        <button type="button" class="btn @if($mode == 1) btn-outline-dark @else btn-outline-light @endif" wire:click="move_down_project({{$value->id}})">
                                                                            <i class="bi bi-chevron-down"></i>
                                                                        </button>
                                                                    </div>  
                                                                    @endif
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
                            </div>
                        </div>
                    </div>

                    <div wire:ignore.self wire:key="project-image-content" class="tab-pane fade show" id="project-image-content-tab-pane" role="tabpanel" aria-labelledby="project-image-content-tab" tabindex="0">
                        <div class="row d-flex">
                            <div class="col">
                                <div class="row py-2">
                                    <div class="col-12 p-0 mx-2 d-flex">
                                        <button class="btn @if($mode) btn-secondary @else btn-outline-secondary @endif d-flex mx-1" data-bs-toggle="modal" data-bs-target="#project-image-content-data-filter">
                                            <i class="bi bi-funnel-fill"></i><span>Columns</span>
                                        </button>
                                        <input class="form-control mx-1" style="max-width:300px;@if($mode ==0) background-color:#282828;color:white; @endif" type="text" id="search" placeholder="Search ... "/> 
                                        <div class="col-2">
                                            <select class="@if($mode == 1) form-select @else form-select selectheader @endif" aria-label="Default select example" selected wire:model="image_content_project_id" wire:change="update_image_content_data()">
                                                <option value="0">Select Project</option>
                                                @foreach ($project_data as $key =>$value)
                                                    <option value="{{$value->id}}">{{$value->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button class="btn @if($mode) btn-primary @else btn-outline-primary @endif mx-1" wire:click="add_image_content('addProjectImageContent')">
                                            <div><span>Add</span></div>
                                        </button>
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table @if($mode == 1) table-striped @else table-dark @endif border">
                                        <thead class="thead-dark">
                                            <tr>
                                                @foreach($project_image_content_filter as $key =>$value)
                                                    @if($value['active'])
                                                        <th scope="col" wire:key="project_image_content_filter-th-{{$key}}" class="{{$value['class']}}">{{$value['name']}}</th>
                                                    @endif
                                                @endforeach
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($project_image_content_data)
                                                @foreach ($project_image_content_data as $key =>$value)
                                                    <tr wire:key="experience-{{$key}}" class="align-middle">
                                                        @foreach($project_image_content_filter as $filter_key =>$filter_value)
                                                            @if($filter_value['name'] == '#'  && $filter_value['active'])
                                                                <th scope="col" >
                                                                    <span class="d-flex text-center align-items-center">
                                                                        {{ $key+1  }}
                                                                    </span>
                                                                </th>
                                                            @elseif($filter_value['name'] == 'Action'  && $filter_value['active'])
                                                                <td class="text-center">
                                                                    <button class="btn @if($mode) btn-danger @else btn-outline-danger @endif" wire:click="delete_project_image_content('deleteProjectImageContent',{{$value->id}})">Delete</button>
                                                                </td>
                                                            @elseif ($filter_value['name'] == 'Order'  && $filter_value['active'])
                                                                <td class="">
                                                                    @if($key === array_key_first($project_image_content_data) && array_key_first($project_image_content_data) !== array_key_last($project_image_content_data) )
                                                                    <div class="btn-group-vertical btn-group-sm">
                                                                        <button type="button" class="btn  @if($mode == 1) btn-outline-dark @else btn-outline-light @endif " wire:click="move_down_project_image_content({{$value->id}})">
                                                                            <i class="bi bi-chevron-down"></i>
                                                                        </button>
                                                                    </div>   
                                                                    @elseif($key === array_key_last($project_image_content_data) && array_key_first($project_image_content_data) !== array_key_last($project_image_content_data))
                                                                    <div class="btn-group-vertical btn-group-sm ">
                                                                        <button type="button" class="btn @if($mode == 1) btn-outline-dark @else btn-outline-light @endif" wire:click="move_up_project_image_content({{$value->id}})">
                                                                            <i class="bi bi-chevron-up"></i>
                                                                        </button>
                                                                    </div>  
                                                                    @else
                                                                    <div class="btn-group-vertical btn-group-sm ">
                                                                        <button type="button" class="btn @if($mode == 1) btn-outline-dark @else btn-outline-light @endif" wire:click="move_up_project_image_content({{$value->id}})">
                                                                            <i class="bi bi-chevron-up"></i>
                                                                        </button>
                                                                        <button type="button" class="btn @if($mode == 1) btn-outline-dark @else btn-outline-light @endif" wire:click="move_down_project_image_content({{$value->id}})">
                                                                            <i class="bi bi-chevron-down"></i>
                                                                        </button>
                                                                    </div>  
                                                                    @endif
                                                                </td>
                                                            @elseif ($filter_value['name'] == 'Image'  && $filter_value['active'])
                                                                <td class="">
                                                                    <a href="{{asset('storage/content/project_image_contents/'.$value->{$filter_value['column_name']})}}" target="blank">
                                                                        <img src="{{asset('storage/content/project_image_contents/'.$value->{$filter_value['column_name']})}}" alt="" style="height: 100px; ">
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
                                                @if($image_content_project_id ==  0)
                                                <tr class="align-middle ">
                                                    <th colspan="100" class="text-center">SELECT PROJECT</th>
                                                </tr>
                                                @else
                                                <tr class="align-middle ">
                                                    <th colspan="100" class="text-center">NO RECORD</th>
                                                </tr>
                                                @endif
                                               
                                            @endif 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div wire:ignore.self wire:key="project-developers" class="tab-pane fade show" id="project-developers-tab-pane" role="tabpanel" aria-labelledby="project-developers-tab" tabindex="0">
                        <div class="row d-flex">
                            <div class="col">
                                <div class="row py-2">
                                    <div class="col-12 p-0 mx-2 d-flex">
                                        <button class="btn @if($mode) btn-secondary @else btn-outline-secondary @endif d-flex mx-1" data-bs-toggle="modal" data-bs-target="#project-developer-data-filter">
                                            <i class="bi bi-funnel-fill"></i><span>Columns</span>
                                        </button>
                                        <input class="form-control mx-1" style="max-width:300px;@if($mode ==0) background-color:#282828;color:white; @endif" type="text" id="search" placeholder="Search ... "/> 
                                        <div class="col-2">
                                            <select class="@if($mode == 1) form-select @else form-select selectheader @endif" aria-label="Default select example" selected wire:model="project_developer_project_id" wire:change="update_project_developer_data()">
                                                <option value="0">Select Project</option>
                                                @foreach ($project_data as $key =>$value)
                                                    <option value="{{$value->id}}">{{$value->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button class="btn @if($mode) btn-primary @else btn-outline-primary @endif mx-1" wire:click="add_project_developer('addProjectDeveloper')">
                                            <div><span>Add</span></div>
                                        </button>
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table @if($mode == 1) table-striped @else table-dark @endif border">
                                        <thead class="thead-dark">
                                            <tr>
                                                @foreach($project_developer_filter as $key =>$value)
                                                    @if($value['active'])
                                                        <th scope="col" wire:key="project_developer_filter-th-{{$key}}" class="{{$value['class']}}">{{$value['name']}}</th>
                                                    @endif
                                                @endforeach
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($project_developer_data)
                                                @foreach ($project_developer_data as $key =>$value)
                                                    <tr wire:key="experience-{{$key}}" class="align-middle">
                                                        @foreach($project_developer_filter as $filter_key =>$filter_value)
                                                            @if($filter_value['name'] == '#'  && $filter_value['active'])
                                                                <th scope="col" >
                                                                    <span class="d-flex text-center align-items-center">
                                                                        {{ $key+1  }}
                                                                    </span>
                                                                </th>
                                                            @elseif($filter_value['name'] == 'Action'  && $filter_value['active'])
                                                                <td class="text-center">
                                                                    <button class="btn @if($mode) btn-success @else btn-outline-success @endif" wire:click="edit_project_developer('editProjectDeveloper',{{$value->id}})">Edit</button>
                                                                    <button class="btn @if($mode) btn-danger @else btn-outline-danger @endif" wire:click="delete_project_developer('deleteProjectDeveloper',{{$value->id}})">Delete</button>
                                                                </td>
                                                            @elseif ($filter_value['name'] == 'Order'  && $filter_value['active'])
                                                                <td class="text-center">
                                                                    @if($key === array_key_first($project_developer_data) && array_key_first($project_developer_data) !== array_key_last($project_developer_data) )
                                                                    <div class="btn-group-vertical btn-group-sm">
                                                                        <button type="button" class="btn  @if($mode == 1) btn-outline-dark @else btn-outline-light @endif " wire:click="move_down_project_developer({{$value->id}})">
                                                                            <i class="bi bi-chevron-down"></i>
                                                                        </button>
                                                                    </div>   
                                                                    @elseif($key === array_key_last($project_developer_data) && array_key_first($project_developer_data) !== array_key_last($project_developer_data))
                                                                    <div class="btn-group-vertical btn-group-sm ">
                                                                        <button type="button" class="btn @if($mode == 1) btn-outline-dark @else btn-outline-light @endif" wire:click="move_up_project_developer({{$value->id}})">
                                                                            <i class="bi bi-chevron-up"></i>
                                                                        </button>
                                                                    </div>  
                                                                    @else
                                                                    <div class="btn-group-vertical btn-group-sm ">
                                                                        <button type="button" class="btn @if($mode == 1) btn-outline-dark @else btn-outline-light @endif" wire:click="move_up_project_developer({{$value->id}})">
                                                                            <i class="bi bi-chevron-up"></i>
                                                                        </button>
                                                                        <button type="button" class="btn @if($mode == 1) btn-outline-dark @else btn-outline-light @endif" wire:click="move_down_project_developer({{$value->id}})">
                                                                            <i class="bi bi-chevron-down"></i>
                                                                        </button>
                                                                    </div>  
                                                                    @endif
                                                                </td>
                                                            @elseif ($filter_value['name'] == 'Image'  && $filter_value['active'])
                                                                <td class="text-center">
                                                                    <a href="{{asset('storage/content/developers/'.$value->{$filter_value['column_name']})}}" target="blank">
                                                                        <img src="{{asset('storage/content/developers/'.$value->{$filter_value['column_name']})}}" alt="" style="height: 100px; ">
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
                                                @if($project_developer_project_id ==  0)
                                                <tr class="align-middle ">
                                                    <th colspan="100" class="text-center">SELECT PROJECT</th>
                                                </tr>
                                                @else
                                                <tr class="align-middle ">
                                                    <th colspan="100" class="text-center">NO RECORD</th>
                                                </tr>
                                                @endif
                                               
                                            @endif 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div wire:ignore.self wire:key="developers" class="tab-pane fade show" id="developers-tab-pane" role="tabpanel" aria-labelledby="developers-tab" tabindex="0">
                        <div class="row d-flex">
                            <div class="col">
                                <div class="row py-2">
                                    <div class="col-12 p-0 mx-2 d-flex">
                                        <button class="btn @if($mode) btn-secondary @else btn-outline-secondary @endif d-flex mx-1" data-bs-toggle="modal" data-bs-target="#developers-data-filter">
                                            <i class="bi bi-funnel-fill"></i><span>Columns</span>
                                        </button>
                                        <input class="form-control mx-1" style="max-width:300px;@if($mode ==0) background-color:#282828;color:white; @endif" type="text" id="search" placeholder="Search ... "/> 
                                        <button class="btn @if($mode) btn-primary @else btn-outline-primary @endif mx-1" wire:click="add_developer('addDeveloper')">
                                            <div><span>Add</span></div>
                                        </button>
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table @if($mode == 1) table-striped @else table-dark @endif border">
                                        <thead class="thead-dark">
                                            <tr>
                                                @foreach($developer_filter as $key =>$value)
                                                    @if($value['active'])
                                                        <th scope="col" wire:key="developer_filter-th-{{$key}}" class="{{$value['class']}}">{{$value['name']}}</th>
                                                    @endif
                                                @endforeach
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($developer_data)
                                                @foreach ($developer_data as $key =>$value)
                                                    <tr wire:key="experience-{{$key}}" class="align-middle">
                                                        @foreach($developer_filter as $filter_key =>$filter_value)
                                                            @if($filter_value['name'] == '#'  && $filter_value['active'])
                                                                <th scope="col" >
                                                                    <span class="d-flex text-center align-items-center">
                                                                        {{ $key+1  }}
                                                                    </span>
                                                                </th>
                                                            @elseif($filter_value['name'] == 'Action'  && $filter_value['active'])
                                                                <td class="text-center">
                                                                    <button class="btn @if($mode) btn-success @else btn-outline-success @endif" wire:click="edit_developer('editDeveloper',{{$value->id}})">Edit</button>
                                                                    <button class="btn @if($mode) btn-danger @else btn-outline-danger @endif" wire:click="delete_developer('deleteDeveloper',{{$value->id}})">Delete</button>
                                                                </td>
                                                            @elseif ($filter_value['name'] == 'Order'  && $filter_value['active'])
                                                                <td class="text-center">
                                                                    @if($key === array_key_first($developer_data) && array_key_first($developer_data) !== array_key_last($developer_data) )
                                                                    <div class="btn-group-vertical btn-group-sm">
                                                                        <button type="button" class="btn  @if($mode == 1) btn-outline-dark @else btn-outline-light @endif " wire:click="move_down_developer({{$value->id}})">
                                                                            <i class="bi bi-chevron-down"></i>
                                                                        </button>
                                                                    </div>   
                                                                    @elseif($key === array_key_last($developer_data) && array_key_first($developer_data) !== array_key_last($developer_data))
                                                                    <div class="btn-group-vertical btn-group-sm ">
                                                                        <button type="button" class="btn @if($mode == 1) btn-outline-dark @else btn-outline-light @endif" wire:click="move_up_developer({{$value->id}})">
                                                                            <i class="bi bi-chevron-up"></i>
                                                                        </button>
                                                                    </div>  
                                                                    @else
                                                                    <div class="btn-group-vertical btn-group-sm ">
                                                                        <button type="button" class="btn @if($mode == 1) btn-outline-dark @else btn-outline-light @endif" wire:click="move_up_developer({{$value->id}})">
                                                                            <i class="bi bi-chevron-up"></i>
                                                                        </button>
                                                                        <button type="button" class="btn @if($mode == 1) btn-outline-dark @else btn-outline-light @endif" wire:click="move_down_developer({{$value->id}})">
                                                                            <i class="bi bi-chevron-down"></i>
                                                                        </button>
                                                                    </div>  
                                                                    @endif
                                                                </td>
                                                            @elseif ($filter_value['name'] == 'Image'  && $filter_value['active'])
                                                                <td class="">
                                                                    <a href="{{asset('storage/content/developers/'.$value->{$filter_value['column_name']})}}" target="blank">
                                                                        <img src="{{asset('storage/content/developers/'.$value->{$filter_value['column_name']})}}" alt="" style="height: 100px; ">
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
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="project-data-filter" tabindex="-1" role="dialog" aria-labelledby="project-data-filterLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content @if($mode == 0) bg-dark text-light @endif">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="sortingModalLabel">Sort&nbsp;Columns for Project</h5>
                                </div>
                                <div class="modal-body">
                                    @foreach($project_filter as $key =>$value)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="project-{{$loop->iteration}}"
                                            wire:model.defer="project_filter.{{$key}}.active">
                                        <label class="form-check-label" for="Project-{{$loop->iteration}}">
                                            {{$value['name']}}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="modal-footer">
                                    <button type="button"  class="btn @if($mode) btn-secondary @else btn-outline-secondary @endif btn-block" data-bs-dismiss="modal"  id='btn_close1'>Close</button>
                                    <button wire:click="update_project_filter()"  data-bs-dismiss="modal" 
                                        class="btn @if($mode) btn-success @else btn-outline-success @endif">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="addProject" tabindex="-1" role="dialog" aria-labelledby="addProjectLabel" aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content @if($mode == 0) bg-dark text-light @endif">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addProjectLabel">Add Project</h5>
                                </div>
                                <div class="modal-body">
                                    <form wire:submit.prevent="add_project('addProject')">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="project-title" class="form-label">Title</label>
                                                <input type="text" id="project-title" class="form-control" wire:model.defer="project.title" placeholder="Enter title ..." required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="project-title" class="form-label">Content</label>
                                                <input type="text" id="project-title" class="form-control" wire:model.defer="project.content" placeholder="Enter content ..." required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="project-link" class="form-label">Button</label>
                                                <input type="text" id="project-link" class="form-control" wire:model="project.button" placeholder="Enter button ..." >
                                            </div>
                                            <div class="mb-3">
                                                <label for="project-type" class="form-label">Link</label>
                                                <input type="text" id="project-type" class="form-control" wire:model="project.link" placeholder="Enter link ..." >
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"  class="btn @if($mode) btn-secondary @else btn-outline-secondary @endif btn-block" data-bs-dismiss="modal"  id='btn_close1'>Close</button>
                                            <button type="submit" 
                                                class="btn @if($mode) btn-primary @else btn-outline-primary @endif">
                                                Add
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="editProject" tabindex="-1" role="dialog" aria-labelledby="editProjectLabel" aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content @if($mode == 0) bg-dark text-light @endif">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editProjectLabel">Edit Project</h5>
                                </div>
                                <div class="modal-body">
                                    <form wire:submit.prevent="save_edit_project('editProject')">
                                        <div class="modal-body">
                                        <div class="mb-3">
                                                <label for="project-title" class="form-label">Title</label>
                                                <input type="text" id="project-title" class="form-control" wire:model.defer="project.title" placeholder="Enter title ..." required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="project-title" class="form-label">Content</label>
                                                <input type="text" id="project-title" class="form-control" wire:model.defer="project.content" placeholder="Enter content ..." required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="project-link" class="form-label">Button</label>
                                                <input type="text" id="project-link" class="form-control" wire:model="project.button" placeholder="Enter button ..." >
                                            </div>
                                            <div class="mb-3">
                                                <label for="project-type" class="form-label">Link</label>
                                                <input type="text" id="project-type" class="form-control" wire:model="project.link" placeholder="Enter link ..." >
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"  class="btn @if($mode) btn-secondary @else btn-outline-secondary @endif btn-block" data-bs-dismiss="modal"  id='btn_close1'>Close</button>
                                            <button type="submit" 
                                                class="btn @if($mode) btn-success @else btn-outline-success @endif">
                                                Save
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="deleteProject" tabindex="-1" role="dialog" aria-labelledby="deleteProjectLabel" aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content @if($mode == 0) bg-dark text-light @endif">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteProjectLabel">Delete Project</h5>
                                </div>
                                <div class="modal-body">
                                    <form wire:submit.prevent="save_delete_project('deleteProject')">
                                        <div class="modal-body">
                                           <p> Are you sure you want to delete this row?
                                           </p>
                                           <p><span class="text-danger">Note! that the image content and project developers tag to it will be deleted too</span></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"  class="btn @if($mode) btn-secondary @else btn-outline-secondary @endif btn-block" data-bs-dismiss="modal"  id='btn_close1'>Close</button>
                                            <button type="submit" class="btn @if($mode) btn-danger @else btn-outline-danger @endif">
                                                Delete
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="project-image-content-data-filter" tabindex="-1" role="dialog" aria-labelledby="project-image-content-data-filterLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content @if($mode == 0) bg-dark text-light @endif">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="sortingModalLabel">Sort&nbsp;Columns for Project Image Content</h5>
                                </div>
                                <div class="modal-body">
                                    @foreach($project_image_content_filter as $key =>$value)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="project_image_content_filter-{{$loop->iteration}}"
                                            wire:model.defer="project_image_content_filter.{{$key}}.active">
                                        <label class="form-check-label" for="project_image_content_filter-{{$loop->iteration}}">
                                            {{$value['name']}}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="modal-footer">
                                    <button type="button"  class="btn @if($mode) btn-secondary @else btn-outline-secondary @endif btn-block" data-bs-dismiss="modal"  id='btn_close1'>Close</button>
                                    <button wire:click="update_project_image_content_filter()"  data-bs-dismiss="modal" 
                                        class="btn @if($mode) btn-success @else btn-outline-success @endif">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="addProjectImageContent" tabindex="-1" role="dialog" aria-labelledby="addProjectImageContentLabel" aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content @if($mode == 0) bg-dark text-light @endif">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addProjectLabel">Add Project Image Content</h5>
                                </div>
                                <div class="modal-body">
                                    <form wire:submit.prevent="add_project_image_content('addProjectImageContent')">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="project-title" class="form-label">Image</label>
                                                <input type="file" id="project-title" class="form-control" wire:model.defer="project_image_content.image" placeholder="Enter title ..." required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"  class="btn @if($mode) btn-secondary @else btn-outline-secondary @endif btn-block" data-bs-dismiss="modal"  id='btn_close1'>Close</button>
                                            <button type="submit" 
                                                class="btn @if($mode) btn-primary @else btn-outline-primary @endif">
                                                Add
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="deleteProjectImageContent" tabindex="-1" role="dialog" aria-labelledby="deleteProjectImageContentLabel" aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content @if($mode == 0) bg-dark text-light @endif">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteProjectImageContentLabel">Delete Project Image Content</h5>
                                </div>
                                <div class="modal-body">
                                    <form wire:submit.prevent="save_delete_project_image_content('deleteProjectImageContent')">
                                        <div class="modal-body">
                                           <p> Are you sure you want to delete this row?
                                           </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"  class="btn @if($mode) btn-secondary @else btn-outline-secondary @endif btn-block" data-bs-dismiss="modal"  id='btn_close1'>Close</button>
                                            <button type="submit" class="btn @if($mode) btn-danger @else btn-outline-danger @endif">
                                                Delete
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="developers-data-filter" tabindex="-1" role="dialog" aria-labelledby="developers-data-filterLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content @if($mode == 0) bg-dark text-light @endif">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="sortingModalLabel">Sort&nbsp;Columns for Developer</h5>
                                </div>
                                <div class="modal-body">
                                    @foreach($developer_filter as $key =>$value)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="developer_filter-{{$loop->iteration}}"
                                            wire:model.defer="developer_filter.{{$key}}.active">
                                        <label class="form-check-label" for="developer_filter-{{$loop->iteration}}">
                                            {{$value['name']}}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="modal-footer">
                                    <button type="button"  class="btn @if($mode) btn-secondary @else btn-outline-secondary @endif btn-block" data-bs-dismiss="modal"  id='btn_close1'>Close</button>
                                    <button wire:click="update_developer_filter()"  data-bs-dismiss="modal" 
                                        class="btn @if($mode) btn-success @else btn-outline-success @endif">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="addDeveloper" tabindex="-1" role="dialog" aria-labelledby="addDeveloperLabel" aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content @if($mode == 0) bg-dark text-light @endif">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addDeveloperLabel">Add Developer</h5>
                                </div>
                                <div class="modal-body">
                                    <form wire:submit.prevent="save_add_developer('addDeveloper')">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="project-title" class="form-label">Fullname</label>
                                                <input type="text" id="project-title" class="form-control" wire:model.defer="developer.full_name" placeholder="Enter full name ..." required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="project-title" class="form-label">Image</label>
                                                <input type="file" id="project-title" class="form-control" wire:model.defer="developer.image" placeholder="Enter image ..." >
                                            </div>
                                            <div class="mb-3">
                                                <label for="project-title" class="form-label">Linkedin</label>
                                                <input type="text" id="project-title" class="form-control" wire:model.defer="developer.linkedinlink" placeholder="Enter linkedin link ..." >
                                            </div>
                                            <div class="mb-3">
                                                <label for="project-title" class="form-label">Role</label>
                                                <input type="text" id="project-title" class="form-control" wire:model.defer="developer.role" placeholder="Enter role ..." required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="project-title" class="form-label">Description</label>
                                                <input type="text" id="project-title" class="form-control" wire:model.defer="developer.description" placeholder="Enter description ..." >
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"  class="btn @if($mode) btn-secondary @else btn-outline-secondary @endif btn-block" data-bs-dismiss="modal"  id='btn_close1'>Close</button>
                                            <button type="submit" 
                                                class="btn @if($mode) btn-primary @else btn-outline-primary @endif">
                                                Add
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="editDeveloper" tabindex="-1" role="dialog" aria-labelledby="editDeveloperLabel" aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content @if($mode == 0) bg-dark text-light @endif">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editDeveloperLabel">Edit Developer</h5>
                                </div>
                                <div class="modal-body">
                                    <form wire:submit.prevent="save_edit_developer('editDeveloper')">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="project-title" class="form-label">Fullname</label>
                                                <input type="text" id="project-title" class="form-control" wire:model.defer="developer.full_name" placeholder="Enter Fullname ..." required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="project-title" class="form-label">Image</label>
                                                <input type="file" id="project-title" class="form-control" wire:model.defer="developer.image" placeholder="Enter image ..." >
                                            </div>
                                            <div class="mb-3">
                                                <label for="project-title" class="form-label">Linkedin</label>
                                                <input type="text" id="project-title" class="form-control" wire:model.defer="developer.linkedinlink" placeholder="Enter linkedin link ..." >
                                            </div>
                                            <div class="mb-3">
                                                <label for="project-title" class="form-label">Role</label>
                                                <input type="text" id="project-title" class="form-control" wire:model.defer="developer.role" placeholder="Enter role ..." required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="project-title" class="form-label">Description</label>
                                                <input type="text" id="project-title" class="form-control" wire:model.defer="developer.description" placeholder="Enter description ..." >
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"  class="btn @if($mode) btn-secondary @else btn-outline-secondary @endif btn-block" data-bs-dismiss="modal"  id='btn_close1'>Close</button>
                                            <button type="submit" 
                                                class="btn @if($mode) btn-success @else btn-outline-success @endif">
                                                Save
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal fade" id="deleteDeveloper" tabindex="-1" role="dialog" aria-labelledby="deleteDeveloperLabel" aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content @if($mode == 0) bg-dark text-light @endif">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteDeveloperLabel">Delete Developer</h5>
                                </div>
                                <div class="modal-body">
                                    <form wire:submit.prevent="save_delete_developer('deleteDeveloper')">
                                        <div class="modal-body">
                                           <p> Are you sure you want to delete this row?
                                           </p>
                                           <p class="text-danger">Note that you will also delete the developer in the project developer section!!!</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"  class="btn @if($mode) btn-secondary @else btn-outline-secondary @endif btn-block" data-bs-dismiss="modal"  id='btn_close1'>Close</button>
                                            <button type="submit" class="btn @if($mode) btn-danger @else btn-outline-danger @endif">
                                                Delete
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="project-developer-data-filter" tabindex="-1" role="dialog" aria-labelledby="project-developer-data-filterLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content @if($mode == 0) bg-dark text-light @endif">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="sortingModalLabel">Sort&nbsp;Columns for Project Developer</h5>
                                </div>
                                <div class="modal-body">
                                    @foreach($project_developer_filter as $key =>$value)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="project_developer_filter-{{$loop->iteration}}"
                                            wire:model.defer="project_developer_filter.{{$key}}.active">
                                        <label class="form-check-label" for="project_developer_filter-{{$loop->iteration}}">
                                            {{$value['name']}}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="modal-footer">
                                    <button type="button"  class="btn @if($mode) btn-secondary @else btn-outline-secondary @endif btn-block" data-bs-dismiss="modal"  id='btn_close1'>Close</button>
                                    <button wire:click="update_project_developer_filter()"  data-bs-dismiss="modal" 
                                        class="btn @if($mode) btn-success @else btn-outline-success @endif">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="addProjectDeveloper" tabindex="-1" role="dialog" aria-labelledby="addProjectDeveloperLabel" aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content @if($mode == 0) bg-dark text-light @endif">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addProjectDeveloperLabel">Add Project Developer</h5>
                                </div>
                                <div class="modal-body">
                                    <form wire:submit.prevent="save_add_project_developer('addProjectDeveloper')">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="project-title" class="form-label">Developer</label>
                                                <select class="form-select" aria-label="Default select example" selected wire:model.defer="project_developer.developer_id" >
                                                    <option value="0">Select Developer</option>
                                                    @if($project_developer_project_id !=0)
                                                        @foreach ($developer_data as $key => $value)
                                                            <?php $selected = true;?>
                                                            @foreach($project_developer_data as $key_pd => $value_pd)
                                                                @if($value->id == $value_pd->developer_id)
                                                                    <?php $selected = false;?>
                                                                @endif
                                                            @endforeach
                                                            @if($selected)
                                                                <option value="{{$value->id}}">{{$value->full_name}}</option>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"  class="btn @if($mode) btn-secondary @else btn-outline-secondary @endif btn-block" data-bs-dismiss="modal"  id='btn_close1'>Close</button>
                                            <button type="submit" 
                                                class="btn @if($mode) btn-primary @else btn-outline-primary @endif">
                                                Add
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="editProjectDeveloper" tabindex="-1" role="dialog" aria-labelledby="editProjectDeveloperLabel" aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content @if($mode == 0) bg-dark text-light @endif">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editProjectDeveloperLabel">Edit Project Developer</h5>
                                </div>
                                <div class="modal-body">
                                    <form wire:submit.prevent="save_edit_project_developer('editProjectDeveloper')">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="project-title" class="form-label">Developer</label>
                                                <select class="form-select" aria-label="Default select example" selected wire:model.defer="project_developer.developer_id" >
                                                    @if($project_developer_project_id !=0)
                                                        @foreach ($developer_data as $key => $value)
                                                            <?php $selected = true;?>
                                                            @foreach($project_developer_data as $key_pd => $value_pd)
                                                                @if($value->id == $value_pd->developer_id)
                                                                    <?php $selected = false;?>
                                                                @endif
                                                                @if ($value->id == $project_developer['developer_id'])
                                                                <?php $selected = 2;?>
                                                           
                                                                @endif
                                                            @endforeach
                                                            @if($selected == 1)
                                                                <option value="{{$value->id}}">{{$value->full_name}}</option>
                                                            @elseif($selected == 2)
                                                            <option selected value="{{$value->id}}">{{$value->full_name}}</option>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"  class="btn @if($mode) btn-secondary @else btn-outline-secondary @endif btn-block" data-bs-dismiss="modal"  id='btn_close1'>Close</button>
                                            <button type="submit" 
                                                class="btn @if($mode) btn-success @else btn-outline-success @endif">
                                                Save
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="deleteProjectDeveloper" tabindex="-1" role="dialog" aria-labelledby="deleteProjectDeveloperLabel" aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content @if($mode == 0) bg-dark text-light @endif">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteProjectDeveloperLabel">Edit Project Developer</h5>
                                </div>
                                <div class="modal-body">
                                    <form wire:submit.prevent="save_delete_project_developer('deleteProjectDeveloper')">
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this developer?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"  class="btn @if($mode) btn-secondary @else btn-outline-secondary @endif btn-block" data-bs-dismiss="modal"  id='btn_close1'>Close</button>
                                            <button type="submit" 
                                                class="btn @if($mode) btn-danger @else btn-outline-danger @endif">
                                                Delete
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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

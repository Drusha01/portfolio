<div>
    @if($mode == 0)
        <style>
        
            input::placeholder {
                color: white !important;
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
                    About
                </div>
            </div>
            <div class="row px-3 pt-2">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button wire:ignore.self wire:click="update_data()" class="nav-link active" id="about-page-tab" data-bs-toggle="tab" data-bs-target="#about-page-tab-pane" type="button" role="tab" aria-controls="about-page-tab-pane" aria-selected="true">About-page</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button wire:ignore.self wire:click="update_data()" class="nav-link" id="about-content-tab" data-bs-toggle="tab" data-bs-target="#about-content-tab-pane" type="button" role="tab" aria-controls="about-content-tab-pane" aria-selected="false">About-content</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button wire:ignore.self wire:click="update_data()" class="nav-link" id="achievements-tab" data-bs-toggle="tab" data-bs-target="#achievements-tab-pane" type="button" role="tab" aria-controls="achievements-tab-pane" aria-selected="false">Achievements</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button wire:ignore.self wire:click="update_data()" class="nav-link" id="experience-tab" data-bs-toggle="tab" data-bs-target="#experience-tab-pane" type="button" role="tab" aria-controls="experience-tab-pane" aria-selected="false">Experience</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button wire:ignore.self wire:click="update_data()" class="nav-link" id="education-tab" data-bs-toggle="tab" data-bs-target="#education-tab-pane" type="button" role="tab" aria-controls="education-tab-pane" aria-selected="false">Education</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div wire:ignore.self class="tab-pane fade show active" id="about-page-tab-pane" role="tabpanel" aria-labelledby="about-page-tab" tabindex="0">
                        <div class="row d-flex">
                            <div class="col">
                                <div class="row py-2">
                                    <div class="col-12 p-0 mx-2 d-flex">
                                        <button class="btn @if($mode) btn-secondary @else btn-outline-secondary @endif d-flex mx-1" data-bs-toggle="modal" data-bs-target="#about-page-data-filter">
                                            <i class="bi bi-funnel-fill"></i><span>Columns</span>
                                        </button>
                                        @if(!$about_page_data)
                                        <button class="btn btn-primary mx-1" wire:click="add_row('addAboutPage')">
                                            <div><span>Add</span></div>
                                        </button>
                                        @endif
                                        <div class="d-flex align-items-center mx-1">
                                            <div class="form-check form-switch aligh-items-center m-2">
                                                <input class="form-check-input" type="checkbox" role="switch" @if($about_page_active == 1) checked @endif  id="about_pages-active" wire:click="toggle_active('about_pages')">
                                                <label for="mode" class="form-check-label" for="flexSwitchCheckDefault"> @if($about_page_active == 1) Active @else Inactive @endif</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table @if($mode == 1) table-striped @else table-dark @endif border">
                                        <thead class="thead-dark">
                                            <tr>
                                                @foreach($about_page_filter as $key =>$value)
                                                    @if($value['active'])
                                                        <th scope="col" wire:key="about_page-th-{{$key}}" class="{{$value['class']}}">{{$value['name']}}</th>
                                                    @endif
                                                @endforeach
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($about_page_data)
                                                @foreach ($about_page_data as $key =>$value)
                                                    <tr wire:key="experience-{{$key}}" class="align-middle">
                                                        @foreach($about_page_filter as $filter_key =>$filter_value)
                                                            @if($filter_value['name'] == '#'  && $filter_value['active'])
                                                                <th scope="col" >
                                                                    <span class="d-flex text-center align-items-center">

                                                                        {{ $key+1  }}
                                                                        <!-- <button class="btn btn-primary mx-2 d-none d-sm-block">
                                                                            <i class="bi bi-plus-circle"></i>
                                                                        </button> -->
                                                                    </span>
                                                                </th>
                                                                
                                                            @elseif($filter_value['name'] == 'Action'  && $filter_value['active'])
                                                                <td class="text-center">
                                                                    <!-- <button class="btn @if($mode) btn-primary @else btn-outline-primary @endif">View</button> -->
                                                                    <button class="btn @if($mode) btn-success @else btn-outline-success @endif "  wire:click="edit_experience('editExperience',{{$value->id}})">Edit</button>
                                                                    <button class="btn @if($mode) btn-danger @else btn-outline-danger @endif" wire:click="delete_experience('deleteExperience',{{$value->id}})">Delete</button>
                                                                </td>
                                                           
                                                            @elseif ($filter_value['name'] == 'Image'  && $filter_value['active'])
                                                                <td class="">
                                                                    <a href="{{asset('storage/content/about_pages/'.$value->{$filter_value['column_name']})}}" target="blank">
                                                                        <img src="{{asset('storage/content/about_pages/'.$value->{$filter_value['column_name']})}}" alt="" style="height: 300px; ">
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
                    <div wire:ignore.self class="tab-pane fade" id="about-content-tab-pane" role="tabpanel" aria-labelledby="about-content-tab" tabindex="0">
                        <div class="row d-flex p-3 bg-secondary">
                            <div class="col">
                            about-content
                            </div>
                        </div>
                    </div>
                    <div wire:ignore.self class="tab-pane fade" id="achievements-tab-pane" role="tabpanel" aria-labelledby="achievements-tab" tabindex="0">
                        <div class="row d-flex">
                            <div class="col">
                                <div class="row py-2">
                                    <div class="col-12 p-0 mx-2 d-flex">
                                        <button class="btn btn-secondary d-flex mx-1">
                                            <i class="bi bi-funnel-fill"></i><span>Columns</span>
                                        </button>
                                        <input class="form-control mx-1" style="max-width:300px;" type="text" id="search" placeholder="Search ... "/> 
                                    
                                        <button class="btn btn-primary mx-1">
                                            <div><span>Add</span></div>
                                        </button>
                                        <div class="d-flex align-items-center mx-1">
                                            <div>
                                                <span >
                                                    Max Display
                                                </span>
                                            </div>
                                            <input type="number"style="max-width:70px" id="max-number" class="form-control mx-1" wire:model.defer="achievements_max_display" id="" min="1" max="100">
                                        </div>
                                        <div class="d-flex align-items-center mx-1">
                                            <div class="form-check form-switch aligh-items-center m-2">
                                                <input class="form-check-input" type="checkbox" role="switch" @if($achievements_active == 1) checked @endif  id="achievements-active" wire:click="toggle_active('achievements')">
                                                <label for="mode" class="form-check-label" for="flexSwitchCheckDefault"> @if($achievements_active == 1) Active @else Inactive @endif</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table table-striped">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">First</th>
                                                <th scope="col">Last</th>
                                                <th scope="col">Handle</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>@fat</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>@twitter</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div wire:ignore.self class="tab-pane fade" id="experience-tab-pane" role="tabpanel" aria-labelledby="experience-tab" tabindex="0">
                        <div class="row d-flex">
                            <div class="col">
                                <div class="row py-2">
                                    <div class="col-12 p-0 mx-2 d-flex">
                                        <button class="btn @if($mode) btn-secondary @else btn-outline-secondary @endif d-flex mx-1" data-bs-toggle="modal" data-bs-target="#experience-data-filter">
                                            <i class="bi bi-funnel-fill"></i><span>Columns</span>
                                        </button>
                                        <input class="form-control mx-1" style="max-width:300px;@if($mode ==0) background-color:#282828;color:white; @endif" type="text" id="search" placeholder="Search ... "/> 
                                    
                                        <button class="btn @if($mode) btn-primary @else btn-outline-primary @endif mx-1" wire:click="add_row('addExperience')">
                                            <div><span>Add</span></div>
                                        </button>
                                        <div class="d-flex align-items-center mx-1">
                                            <div>
                                                <span >
                                                    Max Display
                                                </span>
                                            </div>
                                            <input type="number"style="max-width:70px;@if($mode ==0) background-color:#282828;color:white; @endif" id="max-number" class="form-control mx-1" wire:model.defer="experience_max_display" wire:change="max_display('experience')" id="" min="0" max="100">
                                        </div>
                                        <div class="d-flex align-items-center mx-1">
                                            <div class="form-check form-switch aligh-items-center m-2">
                                                <input class="form-check-input" type="checkbox" role="switch" @if($experience_active == 1) checked @endif  id="experience-active" wire:click="toggle_active('experience')">
                                                <label for="mode" class="form-check-label" for="flexSwitchCheckDefault"> @if($experience_active == 1) Active @else Inactive @endif</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table @if($mode == 1) table-striped @else table-dark @endif border">
                                        <thead class="thead-dark">
                                            <tr>
                                                @foreach($experience_filter as $key =>$value)
                                                    @if($value['active'])
                                                        <th scope="col" wire:key="experience-th-{{$key}}" class="{{$value['class']}}">{{$value['name']}}</th>
                                                    @endif
                                                @endforeach
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($experience_data)
                                                @foreach ($experience_data as $key =>$value)
                                                    <tr wire:key="experience-{{$key}}" class="align-middle">
                                                        @foreach($experience_filter as $filter_key =>$filter_value)
                                                            @if($filter_value['name'] == '#'  && $filter_value['active'])
                                                                <th scope="col" >
                                                                    <span class="d-flex text-center align-items-center">

                                                                        {{ $key+1  }}
                                                                        <!-- <button class="btn btn-primary mx-2 d-none d-sm-block">
                                                                            <i class="bi bi-plus-circle"></i>
                                                                        </button> -->
                                                                    </span>
                                                                </th>
                                                                
                                                            @elseif($filter_value['name'] == 'Action'  && $filter_value['active'])
                                                                <td class="text-center">
                                                                    <button class="btn @if($mode) btn-primary @else btn-outline-primary @endif">View</button>
                                                                    <button class="btn @if($mode) btn-success @else btn-outline-success @endif "  wire:click="edit_experience('editExperience',{{$value->id}})">Edit</button>
                                                                    <button class="btn @if($mode) btn-danger @else btn-outline-danger @endif" wire:click="delete_experience('deleteExperience',{{$value->id}})">Delete</button>
                                                                </td>
                                                            @elseif ($filter_value['name'] == 'Order'  && $filter_value['active'])
                                                                <td class="">
                                                                    @if($key === array_key_first($experience_data) && array_key_first($experience_data) !== array_key_last($experience_data) )
                                                                    <div class="btn-group-vertical btn-group-sm">
                                                                        <button type="button" class="btn  @if($mode == 1) btn-outline-dark @else btn-outline-light @endif " wire:click="move_down_experience({{$value->id}})">
                                                                            <i class="bi bi-chevron-down"></i>
                                                                        </button>
                                                                    </div>   
                                                                    @elseif($key === array_key_last($experience_data) && array_key_first($experience_data) !== array_key_last($experience_data))
                                                                    <div class="btn-group-vertical btn-group-sm ">
                                                                        <button type="button" class="btn @if($mode == 1) btn-outline-dark @else btn-outline-light @endif" wire:click="move_up_experience({{$value->id}})">
                                                                            <i class="bi bi-chevron-up"></i>
                                                                        </button>
                                                                    </div>  
                                                                    @else
                                                                    <div class="btn-group-vertical btn-group-sm ">
                                                                        <button type="button" class="btn @if($mode == 1) btn-outline-dark @else btn-outline-light @endif" wire:click="move_up_experience({{$value->id}})">
                                                                            <i class="bi bi-chevron-up"></i>
                                                                        </button>
                                                                        <button type="button" class="btn @if($mode == 1) btn-outline-dark @else btn-outline-light @endif" wire:click="move_down_experience({{$value->id}})">
                                                                            <i class="bi bi-chevron-down"></i>
                                                                        </button>
                                                                    </div>  
                                                                    @endif
                                                                </td>
                                                            @elseif ($filter_value['name'] == 'Logo'  && $filter_value['active'])
                                                                <td class="">
                                                                    <a href="{{asset('storage/content/experience/'.$value->{$filter_value['column_name']})}}" target="blank">
                                                                        <img src="{{asset('storage/content/experience/'.$value->{$filter_value['column_name']})}}" alt="" style="height: 100px; ">
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
                    <div wire:ignore.self class="tab-pane fade" id="education-tab-pane" role="tabpanel" aria-labelledby="education-tab" tabindex="0">
                        <div class="row d-flex">
                            <div class="col">
                                <div class="row py-2">
                                    <div class="col-12 p-0 mx-2 d-flex">
                                        <button class="btn  @if($mode) btn-secondary @else btn-outline-secondary @endif d-flex mx-1" data-bs-toggle="modal" data-bs-target="#education-data-filter">
                                            <i class="bi bi-funnel-fill"></i><span>Columns</span>
                                        </button>
                                        <input class="form-control mx-1" style="max-width:300px;@if($mode ==0) background-color:#282828;color:white; @endif" type="text" id="search" placeholder="Search ... "/> 
                                    
                                        <button class="btn @if($mode) btn-primary @else btn-outline-primary @endif mx-1" wire:click="add_row('addEducation')">
                                            <div><span>Add</span></div>
                                        </button>
                                        <div class="d-flex align-items-center mx-1">
                                            <div>
                                                <span >
                                                    Max Display
                                                </span>
                                            </div>
                                            <input type="number"style="max-width:70px;@if($mode ==0) background-color:#282828;color:white; @endif" id="max-number" class="form-control mx-1" wire:model.defer="education_max_display" wire:change="max_display('education')" id="" min="0" max="100">
                                        </div>
                                        <div class="d-flex align-items-center mx-1">
                                            <div class="form-check form-switch aligh-items-center m-2">
                                                <input class="form-check-input" type="checkbox" role="switch" @if($education_active == 1) checked @endif  id="education-active" wire:click="toggle_active('education')">
                                                <label for="mode" class="form-check-label" for="flexSwitchCheckDefault"> @if($education_active == 1) Active @else Inactive @endif</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table @if($mode == 1) table-striped @else table-dark @endif border">
                                        <thead class="thead-dark">
                                            <tr>
                                                @foreach($education_filter as $key => $value)
                                                    @if($value['active'])
                                                        <th scope="col" wire:key="education-th-{{$key}}" class="{{$value['class']}}">{{$value['name']}}</th>
                                                    @endif
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($education_data)
                                                @foreach ($education_data as $key => $value)
                                                    <tr wire:key="education-{{$key}}" class="align-middle">
                                                        @foreach($education_filter as $filter_key =>$filter_value)
                                                            @if($filter_value['name'] == '#'  && $filter_value['active'])
                                                                <th scope="col">{{ $key+1  }}</th>
                                                            @elseif($filter_value['name'] == 'Action'  && $filter_value['active'])
                                                                <td class="text-center">
                                                                    <button class="btn @if($mode) btn-primary @else btn-outline-primary @endif">View</button>
                                                                    <button class="btn @if($mode) btn-success @else btn-outline-success @endif" wire:click="delete_education('editEducation',{{$value->id}})">Edit</button>
                                                                    <button class="btn @if($mode) btn-danger @else btn-outline-danger @endif" wire:click="delete_education('deleteEducation',{{$value->id}})">Delete</button>
                                                                </td>
                                                            @elseif ($filter_value['name'] == 'Order'  && $filter_value['active'])
                                                                <td class="">
                                                                    @if($key === array_key_first($education_data) && array_key_first($education_data) !== array_key_last($education_data) )
                                                                    <div class="btn-group-vertical btn-group-sm ">
                                                                        <button type="button" class="btn @if($mode == 1) btn-outline-dark @else btn-outline-light @endif" wire:click="move_down_education({{$value->id}})">
                                                                            <i class="bi bi-chevron-down"></i>
                                                                        </button>
                                                                    </div>   
                                                                    @elseif($key === array_key_last($education_data))
                                                                    <div class="btn-group-vertical btn-group-sm ">
                                                                        <button type="button" class="btn @if($mode == 1) btn-outline-dark @else btn-outline-light @endif" wire:click="move_up_education({{$value->id}})">
                                                                            <i class="bi bi-chevron-up"></i>
                                                                        </button>
                                                                    </div>  
                                                                    @else
                                                                    <div class="btn-group-vertical btn-group-sm ">
                                                                        <button type="button" class="btn @if($mode == 1) btn-outline-dark @else btn-outline-light @endif" wire:click="move_up_education({{$value->id}})">
                                                                            <i class="bi bi-chevron-up"></i>
                                                                        </button>
                                                                        <button type="button" class="btn @if($mode == 1) btn-outline-dark @else btn-outline-light @endif" wire:click="move_down_education({{$value->id}})">
                                                                            <i class="bi bi-chevron-down"></i>
                                                                        </button>
                                                                    </div>  
                                                                    @endif
                                                                </td>
                                                            @elseif ($filter_value['name'] == 'Logo'  && $filter_value['active'])
                                                                <td class="">
                                                                    <a href="{{asset('storage/content/education/'.$value->{$filter_value['column_name']})}}" target="blank">
                                                                        <img src="{{asset('storage/content/education/'.$value->{$filter_value['column_name']})}}" alt="" style="height: 100px; ">
                                                                    </a>
                                                                </td>
                                                            @else
                                                                @if( $filter_value['active'])
                                                                <td >{{ $value->{$filter_value['column_name']} }}</td>
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

                    <div class="modal fade" id="about-page-data-filter" tabindex="-1" role="dialog" aria-labelledby="about-page-data-filterLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="sortingModalLabel">Sort&nbsp;Columns for About Page</h5>
                                </div>
                                <div class="modal-body">
                                    @foreach($about_page_filter as $key =>$value)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="assigned-filtering-{{$loop->iteration}}"
                                            wire:model.defer="about_page_filter.{{$key}}.active">
                                        <label class="form-check-label" for="assigned-filtering-{{$loop->iteration}}">
                                            {{$value['name']}}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="modal-footer">
                                    <button type="button"  class="btn btn-secondary btn-block" data-bs-dismiss="modal"  id='btn_close1'>Close</button>
                                    <button wire:click="update_about_page_filter()"  data-bs-dismiss="modal" 
                                        class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="addAboutPage" tabindex="-1" role="dialog" aria-labelledby="addAboutPageLabel" aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="sortingModalLabel">Add About Page</h5>
                                </div>
                                <div class="modal-body">
                                    <form wire:submit.prevent="add_about_page('addAboutPage')">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="announcement_image" class="form-label">Image</label>
                                                <input class="form-control" type="file" id="" wire:model.defer="about_page.image" accept="image/*" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="about_page-title" class="form-label">Header</label>
                                                <input type="text" id="about_page-title" class="form-control" wire:model.defer="about_page.header" placeholder="Enter header ..." required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="about_page-link" class="form-label">Content</label>
                                                <input type="text" id="about_page-link" class="form-control" wire:model="about_page.content" placeholder="Enter content ..." required >
                                            </div>
                                            <div class="mb-3">
                                                <label for="about_page-location" class="form-label">Button</label>
                                                <input type="text" id="about_page-location" class="form-control" wire:model="about_page.button" placeholder="Enter button ..." >
                                            </div>
                                            <div class="mb-3">
                                                <label for="about_page-type" class="form-label">link</label>
                                                <input type="text" id="about_page-type" class="form-control" wire:model="about_page.link" placeholder="Enter link ..." >
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"  class="btn btn-secondary btn-block" data-bs-dismiss="modal"  id='btn_close1'>Close</button>
                                            <button type="submit" 
                                                class="btn btn-primary">
                                                Add
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="experience-data-filter" tabindex="-1" role="dialog" aria-labelledby="admin-data-filterLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="sortingModalLabel">Sort&nbsp;Columns for Experience</h5>
                                </div>
                                <div class="modal-body">
                                    @foreach($experience_filter as $key =>$value)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="assigned-filtering-{{$loop->iteration}}"
                                            wire:model.defer="experience_filter.{{$key}}.active">
                                        <label class="form-check-label" for="assigned-filtering-{{$loop->iteration}}">
                                            {{$value['name']}}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="modal-footer">
                                    <button type="button"  class="btn btn-secondary btn-block" data-bs-dismiss="modal"  id='btn_close1'>Close</button>
                                    <button wire:click="update_experience_filter()"  data-bs-dismiss="modal" 
                                        class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="addExperience" tabindex="-1" role="dialog" aria-labelledby="addExperienceLabel" aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="sortingModalLabel">Add Experience</h5>
                                </div>
                                <div class="modal-body">
                                    <form wire:submit.prevent="add_experience('addExperience')">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="experience-title" class="form-label">Title</label>
                                                <input type="text" id="experience-title" class="form-control" wire:model.defer="experience.title" placeholder="Enter title ..." required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="announcement_image" class="form-label">Logo</label>
                                                <input class="form-control" type="file" id="" wire:model.defer="experience.logo" accept="image/*" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="experience-link" class="form-label">Link</label>
                                                <input type="text" id="experience-link" class="form-control" wire:model="experience.link" placeholder="Enter link ..." >
                                            </div>
                                            <div class="mb-3">
                                                <label for="experience-location" class="form-label">Location</label>
                                                <input type="text" id="experience-location" class="form-control" wire:model="experience.location" placeholder="Enter location ..." required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="experience-type" class="form-label">Type</label>
                                                <input type="text" id="experience-type" class="form-control" wire:model="experience.type" placeholder="Enter type ..." required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Start Date</label>
                                                <div class="input-group">
                                                    <input type="date" class="form-control" wire:model="experience.start_date" required>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">End Date</label>
                                                <div class="input-group">
                                                    <input type="date" class="form-control"  wire:model="experience.end_date" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"  class="btn btn-secondary btn-block" data-bs-dismiss="modal"  id='btn_close1'>Close</button>
                                            <button type="submit" 
                                                class="btn btn-primary">
                                                Add
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="editExperience" tabindex="-1" role="dialog" aria-labelledby="editExperienceLabel" aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="sortingModalLabel">Edit Experience</h5>
                                </div>
                                <div class="modal-body">
                                    <form wire:submit.prevent="save_edit_experience('editExperience')">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="experience-title" class="form-label">Title</label>
                                                <input type="text" id="experience-title" class="form-control" wire:model.defer="experience.title" placeholder="Enter title ..." required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="announcement_image" class="form-label">Logo</label>
                                                <input class="form-control" type="file" id="" wire:model.defer="experience.logo" accept="image/*" >
                                            </div>
                                            <div class="mb-3">
                                                <label for="experience-link" class="form-label">Link</label>
                                                <input type="text" id="experience-link" class="form-control" wire:model="experience.link" placeholder="Enter link ..." >
                                            </div>
                                            <div class="mb-3">
                                                <label for="experience-location" class="form-label">Location</label>
                                                <input type="text" id="experience-location" class="form-control" wire:model="experience.location" placeholder="Enter location ..." required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="experience-type" class="form-label">Type</label>
                                                <input type="text" id="experience-type" class="form-control" wire:model="experience.type" placeholder="Enter type ..." required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Start Date</label>
                                                <div class="input-group">
                                                    <input type="date" class="form-control" wire:model="experience.start_date" required>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">End Date</label>
                                                <div class="input-group">
                                                    <input type="date" class="form-control"  wire:model="experience.end_date" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"  class="btn btn-secondary btn-block" data-bs-dismiss="modal"  id='btn_close1'>Close</button>
                                            <button type="submit" class="btn btn-success">
                                                Save
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="deleteExperience" tabindex="-1" role="dialog" aria-labelledby="deleteExperienceLabel" aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="sortingModalLabel">Delete Experience</h5>
                                </div>
                                <div class="modal-body">
                                    <form wire:submit.prevent="save_delete_experience('deleteExperience')">
                                        <div class="modal-body">
                                           <p> Are you sure you want to delete this row?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"  class="btn btn-secondary btn-block" data-bs-dismiss="modal"  id='btn_close1'>Close</button>
                                            <button type="submit" class="btn btn-danger">
                                                Delete
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="education-data-filter" tabindex="-1" role="dialog" aria-labelledby="admin-data-filterLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="sortingModalLabel">Sort&nbsp;Columns for Education</h5>
                                </div>
                                <div class="modal-body">
                                    @foreach($education_filter as $key =>$value)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="assigned-filtering-{{$loop->iteration}}"
                                            wire:model.defer="education_filter.{{$key}}.active">
                                        <label class="form-check-label" for="assigned-filtering-{{$loop->iteration}}">
                                            {{$value['name']}}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="modal-footer">
                                    <button type="button"  class="btn btn-secondary btn-block" data-bs-dismiss="modal"  id='btn_close1'>Close</button>
                                    <button wire:click="update_education_filter()"  data-bs-dismiss="modal" 
                                        class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="addEducation" tabindex="-1" role="dialog" aria-labelledby="addEducationLabel" aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="sortingModalLabel">Add Education</h5>
                                </div>
                                <form wire:submit.prevent="add_education('addEducation')">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="education-title" class="form-label">Title</label>
                                            <input type="text" id="education-title" class="form-control" wire:model.defer="education.title" placeholder="Enter title ..." required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="announcement_image" class="form-label">Logo</label>
                                            <input class="form-control" type="file" id="" wire:model.defer="education.logo" accept="image/*" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="education-link" class="form-label">Link</label>
                                            <input type="text" id="education-link" class="form-control" wire:model="education.link" placeholder="Enter link ..." >
                                        </div>
                                        <div class="mb-3">
                                            <label for="education-location" class="form-label">Location</label>
                                            <input type="text" id="education-location" class="form-control" wire:model="education.location" placeholder="Enter location ..." required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="education-type" class="form-label">Type</label>
                                            <input type="text" id="education-type" class="form-control" wire:model="education.type" placeholder="Enter type ..." required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Start Date</label>
                                            <div class="input-group">
                                                <input type="date" class="form-control" wire:model="education.start_date" required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">End Date</label>
                                            <div class="input-group">
                                                <input type="date" class="form-control"  wire:model="education.end_date" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button"  class="btn btn-secondary btn-block" data-bs-dismiss="modal"  id='btn_close1'>Close</button>
                                        <button type="submit" 
                                            class="btn btn-primary">
                                            Add
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

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
                    Contact
                </div>
            </div>
            <div class="row px-3 pt-2">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button @if($mode== 0)style="background-color:#242424;;color:white;border-bottom-color: white;"@endif  wire:ignore.self wire:click="update_data()" class="nav-link active" id="about-page-tab" data-bs-toggle="tab" data-bs-target="#location-tab-pane" type="button" role="tab" aria-controls="location-tab-pane" aria-selected="true">Location</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button @if($mode== 0)style="background-color:#242424;;color:white;border-bottom-color: white;"@endif  wire:ignore.self wire:click="update_data()" class="nav-link " id="about-page-tab" data-bs-toggle="tab" data-bs-target="#contact-info-tab-pane" type="button" role="tab" aria-controls="contact-info-tab-pane" aria-selected="true">Contact Info</button>
                    </li>
                   
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div wire:ignore.self class="tab-pane fade show active" id="location-tab-pane" role="tabpanel" aria-labelledby="location-tab" tabindex="0">
                        <div class="row d-flex">
                            <div class="col">
                                <div class="row py-2">
                                    <div class="col-12 p-0 mx-2 d-flex">
                                        <button class="btn @if($mode) btn-secondary @else btn-outline-secondary @endif d-flex mx-1" data-bs-toggle="modal" data-bs-target="#contact-data-filter">
                                            <i class="bi bi-funnel-fill"></i><span>Columns</span>
                                        </button>
                                        <input class="form-control mx-1" style="max-width:300px;@if($mode ==0) background-color:#282828;color:white; @endif" type="text" id="search" placeholder="Search ... "/> 
                                    
                                        @if(!$contact_data)
                                        <button class="btn @if($mode) btn-primary @else btn-outline-primary @endif mx-1" wire:click="add_row('addContact')">
                                            <div><span>Add</span></div>
                                        </button>
                                        @endif
                                        <div class="d-flex align-items-center mx-1">
                                            <div class="form-check form-switch aligh-items-center m-2">
                                                <input class="form-check-input" type="checkbox" role="switch" @if($contact_active == 1) checked @endif  id="contact-active" wire:click="toggle_active('contacts')">
                                                <label for="mode" class="form-check-label" for="flexSwitchCheckDefault"> @if($contact_active == 1) Active @else Inactive @endif</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table @if($mode == 1) table-striped @else table-dark @endif border">
                                        <thead class="thead-dark">
                                            <tr>
                                                @foreach($contact_filter as $key =>$value)
                                                    @if($value['active'])
                                                        <th scope="col" wire:key="contact-th-{{$key}}" class="{{$value['class']}}">{{$value['name']}}</th>
                                                    @endif
                                                @endforeach
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($contact_data)
                                                @foreach ($contact_data as $key =>$value)
                                                    <tr wire:key="experience-{{$key}}" class="align-middle">
                                                        @foreach($contact_filter as $filter_key =>$filter_value)
                                                            @if($filter_value['name'] == '#'  && $filter_value['active'])
                                                                <th scope="col" >
                                                                    <span class="d-flex text-center align-items-center">
                                                                        {{ $key+1  }}
                                                                    </span>
                                                                </th>
                                                            @elseif ($filter_value['name'] == 'Image'  && $filter_value['active'])
                                                                <td class="text-center">
                                                                    <a href="{{asset('storage/content/contacts/'.$value->{$filter_value['column_name']})}}" target="blank">
                                                                        <img src="{{asset('storage/content/contacts/'.$value->{$filter_value['column_name']})}}" alt="" style="height: 80px; ">
                                                                    </a>
                                                                </td>
                                                            @elseif($filter_value['name'] == 'Action'  && $filter_value['active'])
                                                                <td class="text-center">
                                                                    <button class="btn @if($mode) btn-success @else btn-outline-success @endif "  wire:click="edit_contact('editContact',{{$value->id}})">Edit</button>
                                                                    <button class="btn @if($mode) btn-danger @else btn-outline-danger @endif" wire:click="delete_contact('deleteContact',{{$value->id}})">Delete</button>
                                                                </td>
                                                            @elseif ($filter_value['name'] == 'Tags'  && $filter_value['active'])
                                                                <td class="text-center">
                                                                    <button class="btn @if($mode) btn-primary @else btn-outline-primary @endif" wire:click="view_tags('ViewTags',{{$value->id}})">
                                                                        View Tags
                                                                    </button>
                                                                </td>
                                                            @elseif ($filter_value['name'] == 'Order'  && $filter_value['active'])
                                                                <td class="">
                                                                    @if($key === array_key_first($contact_data) && array_key_first($contact_data) !== array_key_last($contact_data) )
                                                                    <div class="btn-group-vertical btn-group-sm">
                                                                        <button type="button" class="btn  @if($mode == 1) btn-outline-dark @else btn-outline-light @endif " wire:click="move_down_contact({{$value->id}})">
                                                                            <i class="bi bi-chevron-down"></i>
                                                                        </button>
                                                                    </div>   
                                                                    @elseif($key === array_key_last($contact_data) && array_key_first($contact_data) !== array_key_last($contact_data))
                                                                    <div class="btn-group-vertical btn-group-sm ">
                                                                        <button type="button" class="btn @if($mode == 1) btn-outline-dark @else btn-outline-light @endif" wire:click="move_up_contact({{$value->id}})">
                                                                            <i class="bi bi-chevron-up"></i>
                                                                        </button>
                                                                    </div>  
                                                                    @else
                                                                    <div class="btn-group-vertical btn-group-sm ">
                                                                        <button type="button" class="btn @if($mode == 1) btn-outline-dark @else btn-outline-light @endif" wire:click="move_up_contact({{$value->id}})">
                                                                            <i class="bi bi-chevron-up"></i>
                                                                        </button>
                                                                        <button type="button" class="btn @if($mode == 1) btn-outline-dark @else btn-outline-light @endif" wire:click="move_down_contact({{$value->id}})">
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
                    <div wire:ignore.self class="tab-pane fade show " id="contact-info-tab-pane" role="tabpanel" aria-labelledby="contact-info-tab" tabindex="0">
                        <div class="row d-flex">
                            <div class="col">
                                <div class="row py-2">
                                    <div class="col-12 p-0 mx-2 d-flex">
                                        <button class="btn @if($mode) btn-secondary @else btn-outline-secondary @endif d-flex mx-1" data-bs-toggle="modal" data-bs-target="#contact-info-data-filter">
                                            <i class="bi bi-funnel-fill"></i><span>Columns</span>
                                        </button>
                                        <input class="form-control mx-1" style="max-width:300px;@if($mode ==0) background-color:#282828;color:white; @endif" type="text" id="search" placeholder="Search ... "/> 
                                        <button class="btn @if($mode) btn-primary @else btn-outline-primary @endif mx-1" wire:click="add_row('addContactInfo')">
                                            <div><span>Add</span></div>
                                        </button>
                                        <div class="d-flex align-items-center mx-1">
                                            <div>
                                                <span >
                                                    Max Display
                                                </span>
                                            </div>
                                            <input type="number"style="max-width:70px;@if($mode ==0) background-color:#282828;color:white; @endif" id="max-number" class="form-control mx-1" wire:model.defer="contact_info_max_display" wire:change="max_display('contact_infos')" id="" min="0" max="100">
                                        </div>
                                        <div class="d-flex align-items-center mx-1">
                                            <div class="form-check form-switch aligh-items-center m-2">
                                                <input class="form-check-input" type="checkbox" role="switch" @if($contact_info_active == 1) checked @endif  id="contact_info-active" wire:click="toggle_active('contact_infos')">
                                                <label for="mode" class="form-check-label" for="flexSwitchCheckDefault"> @if($contact_info_active == 1) Active @else Inactive @endif</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table @if($mode == 1) table-striped @else table-dark @endif border">
                                        <thead class="thead-dark">
                                            <tr>
                                                @foreach($contact_info_filter as $key =>$value)
                                                    @if($value['active'])
                                                        <th scope="col" wire:key="contact_info-th-{{$key}}" class="{{$value['class']}}">{{$value['name']}}</th>
                                                    @endif
                                                @endforeach
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($contact_info_data)
                                                @foreach ($contact_info_data as $key =>$value)
                                                    <tr wire:key="experience-{{$key}}" class="align-middle">
                                                        @foreach($contact_info_filter as $filter_key =>$filter_value)
                                                            @if($filter_value['name'] == '#'  && $filter_value['active'])
                                                                <th scope="col" >
                                                                    <span class="d-flex text-center align-items-center">
                                                                        {{ $key+1  }}
                                                                    </span>
                                                                </th>
                                                            @elseif($filter_value['name'] == 'Action'  && $filter_value['active'])
                                                                <td class="text-center">
                                                                    <button class="btn @if($mode) btn-success @else btn-outline-success @endif "  wire:click="edit_contact_info('editContactInfo',{{$value->id}})">Edit</button>
                                                                    <button class="btn @if($mode) btn-danger @else btn-outline-danger @endif" wire:click="delete_contact_info('deleteContactInfo',{{$value->id}})">Delete</button>
                                                                </td>
                                                            @elseif ($filter_value['name'] == 'Order'  && $filter_value['active'])
                                                                <td class="">
                                                                    @if($key === array_key_first($contact_info_data) && array_key_first($contact_info_data) !== array_key_last($contact_info_data) )
                                                                    <div class="btn-group-vertical btn-group-sm">
                                                                        <button type="button" class="btn  @if($mode == 1) btn-outline-dark @else btn-outline-light @endif " wire:click="move_down_contact_infos({{$value->id}})">
                                                                            <i class="bi bi-chevron-down"></i>
                                                                        </button>
                                                                    </div>   
                                                                    @elseif($key === array_key_last($contact_info_data) && array_key_first($contact_info_data) !== array_key_last($contact_info_data))
                                                                    <div class="btn-group-vertical btn-group-sm ">
                                                                        <button type="button" class="btn @if($mode == 1) btn-outline-dark @else btn-outline-light @endif" wire:click="move_up_contact_infos({{$value->id}})">
                                                                            <i class="bi bi-chevron-up"></i>
                                                                        </button>
                                                                    </div>  
                                                                    @else
                                                                    <div class="btn-group-vertical btn-group-sm ">
                                                                        <button type="button" class="btn @if($mode == 1) btn-outline-dark @else btn-outline-light @endif" wire:click="move_up_contact_infos({{$value->id}})">
                                                                            <i class="bi bi-chevron-up"></i>
                                                                        </button>
                                                                        <button type="button" class="btn @if($mode == 1) btn-outline-dark @else btn-outline-light @endif" wire:click="move_down_contact_infos({{$value->id}})">
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
                    
                    <div class="modal fade" id="contact-data-filter" tabindex="-1" role="dialog" aria-labelledby="contact-data-filterLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content @if($mode == 0) bg-dark text-light @endif">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="contact-data-filter">Sort&nbsp;Columns for Location</h5>
                                </div>
                                <div class="modal-body">
                                    @foreach($contact_filter as $key =>$value)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="contact_filter-{{$loop->iteration}}"
                                            wire:model.defer="contact_filter.{{$key}}.active">
                                        <label class="form-check-label" for="contact_filter-{{$loop->iteration}}">
                                            {{$value['name']}}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="modal-footer">
                                    <button type="button"  class="btn @if($mode) btn-secondary @else btn-outline-secondary @endif btn-block" data-bs-dismiss="modal"  id='btn_close1'>Close</button>
                                    <button wire:click="update_contact_filter()"  data-bs-dismiss="modal" 
                                        class="btn @if($mode) btn-success @else btn-outline-success @endif">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="addContact" tabindex="-1" role="dialog" aria-labelledby="addContactLabel" aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content @if($mode == 0) bg-dark text-light @endif">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addContactLabel">Add Location</h5>
                                </div>
                                <div class="modal-body">
                                    <form wire:submit.prevent="save_add_contact('addContact')">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="contact-title" class="form-label">Longitude</label>
                                                <input type="number" step="0.0000001" step="" min="-180" max="180" id="contact-title" class="form-control" wire:model.defer="contact.longitude" placeholder="0.000000 ..." required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="contact-title" class="form-label">Latitude</label>
                                                <input type="number" step="0.0000001" min="-180" max="180" id="contact-title" class="form-control" wire:model.defer="contact.latitude" placeholder="0.000000 ..." required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="contact-link" class="form-label">Zoom</label>
                                                <input type="number" min="1" max="100" id="contact-link" class="form-control" wire:model="contact.zoom" placeholder="Enter Zoom ..." required >
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

                    <div class="modal fade" id="editContact" tabindex="-1" role="dialog" aria-labelledby="editContactLabel" aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content @if($mode == 0) bg-dark text-light @endif">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editContactLabel">Edit Location</h5>
                                </div>
                                <div class="modal-body">
                                    <form wire:submit.prevent="save_edit_contact('editContact')">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="contact-title" class="form-label">Longitude</label>
                                                <input type="number" step="0.0000001" min="-180" max="180" id="contact-title" class="form-control" wire:model.defer="contact.longitude" placeholder="0.000000 ..." required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="contact-title" class="form-label">Latitude</label>
                                                <input type="number" step="0.0000001" min="-180" max="180" id="contact-title" class="form-control" wire:model.defer="contact.latitude" placeholder="0.000000 ..." required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="contact-link" class="form-label">Zoom</label>
                                                <input type="number" min="1" max="100" id="contact-link" class="form-control" wire:model="contact.zoom" placeholder="Enter Zoom ..." required >
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

                    <div class="modal fade" id="deleteContact" tabindex="-1" role="dialog" aria-labelledby="deleteContactLabel" aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content @if($mode == 0) bg-dark text-light @endif">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteContactLabel">Delete Location</h5>
                                </div>
                                <div class="modal-body">
                                    <form wire:submit.prevent="save_delete_contact('deleteContact')">
                                        <div class="modal-body">
                                           <p> Are you sure you want to delete this Location?</p>
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

                    <div class="modal fade" id="contact-info-data-filter" tabindex="-1" role="dialog" aria-labelledby="contact-info-data-filterLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content @if($mode == 0) bg-dark text-light @endif">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="contact-info-data-filter">Sort&nbsp;Columns for Location</h5>
                                </div>
                                <div class="modal-body">
                                    @foreach($contact_info_filter as $key =>$value)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="contact_info_filter-{{$loop->iteration}}"
                                            wire:model.defer="contact_info_filter.{{$key}}.active">
                                        <label class="form-check-label" for="contact_info_filter-{{$loop->iteration}}">
                                            {{$value['name']}}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="modal-footer">
                                    <button type="button"  class="btn @if($mode) btn-secondary @else btn-outline-secondary @endif btn-block" data-bs-dismiss="modal"  id='btn_close1'>Close</button>
                                    <button wire:click="update_contact_info_filter()"  data-bs-dismiss="modal" 
                                        class="btn @if($mode) btn-success @else btn-outline-success @endif">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal fade" id="addContactInfo" tabindex="-1" role="dialog" aria-labelledby="addContactInfoLabel" aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content @if($mode == 0) bg-dark text-light @endif">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addContactInfoLabel">Add Contact Info</h5>
                                </div>
                                <div class="modal-body">
                                    <form wire:submit.prevent="save_add_contact_info('addContactInfo')">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="ContactInfo-title" class="form-label">Title</label>
                                                <input type="text"  id="ContactInfo-Title" class="form-control" wire:model.defer="contact_info.contact_title" placeholder="Enter contact title ..." required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="ContactInfo-title" class="form-label">Details</label>
                                                <input type="text"  id="ContactInfo-Details" class="form-control" wire:model.defer="contact_info.contact_details" placeholder="Enter contact details ..." required>
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

                    <div class="modal fade" id="editContactInfo" tabindex="-1" role="dialog" aria-labelledby="editContactInfoLabel" aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content @if($mode == 0) bg-dark text-light @endif">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editContactInfoLabel">Edit Contact Info</h5>
                                </div>
                                <div class="modal-body">
                                <form wire:submit.prevent="save_edit_contact_info('editContactInfo')">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="ContactInfo-title" class="form-label">Title</label>
                                                <input type="text"  id="ContactInfo-Title" class="form-control" wire:model.defer="contact_info.contact_title" placeholder="Enter contact title ..." required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="ContactInfo-title" class="form-label">Details</label>
                                                <input type="text"  id="ContactInfo-Details" class="form-control" wire:model.defer="contact_info.contact_details" placeholder="Enter contact details ..." required>
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

                    <div class="modal fade" id="deleteContactInfo" tabindex="-1" role="dialog" aria-labelledby="deleteContactInfoLabel" aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content @if($mode == 0) bg-dark text-light @endif">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteContactInfoLabel">Delete Contact Info</h5>
                                </div>
                                <div class="modal-body">
                                    <form wire:submit.prevent="save_delete_contact_info('deleteContactInfo')">
                                        <div class="modal-body">
                                           <p> Are you sure you want to delete this Contact Info?</p>
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

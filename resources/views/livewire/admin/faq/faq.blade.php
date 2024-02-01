<div>
    @if($mode == 0)
        <style>
        
            input::placeholder {
                color: gray !important;
            }
        </style>
    @endif
    <div class="row" style="margin:0px 0px 0px 0px; padding:0px;">
        <div class="col p-0 border-end @if($mode) border-dark @else @endif" id="sidebar" style="@if($mode == 1)background-color:white;color:black; @else background-color:#232323;color:white; @endif height:calc(100vh - 70px);max-width:280px;">
            @livewire('components.sidebar.admin-sidebar.admin-sidebar')
        </div>
        <div class="col" style="@if($mode == 1) background-color:white;color:black; @else background-color:#242424;color:white; @endif">
            <div class="row">
                <div class="d-flex justify-content-between">
                    <div class=" lead pt-4 px-4">
                        FAQ  
                    </div>
                    <a class="pt-4 px-4" href="/faq/{{$user_id}}" target="_blank">
                        <button class="btn btn-outline-secondary" >
                            View Page
                        </button>
                    </a>
                </div>
            </div>
            <div class="row px-3 pt-2">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button @if($mode== 0)style="background-color:#242424;;color:white;border-bottom-color: white;"@endif wire:ignore.self wire:click="update_data()" class="nav-link active" id="faq-tab" data-bs-toggle="tab" data-bs-target="#faq-tab-pane" type="button" role="tab" aria-controls="faq-tab-pane" aria-selected="true">FAQ</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div wire:ignore.self class="tab-pane fade show active" id="faq-tab-pane" role="tabpanel" aria-labelledby="faq-tab" tabindex="0">
                        <div class="row d-flex">
                            <div class="col">
                                <div class="row py-2">
                                    <div class="col-12 p-0 mx-2 d-flex">
                                        <button class="btn @if($mode) btn-secondary @else btn-outline-secondary @endif d-flex mx-1" data-bs-toggle="modal" data-bs-target="#faq-data-filter">
                                            <i class="bi bi-funnel-fill"></i><span>Columns</span>
                                        </button>
                                        <input class="form-control mx-1" style="max-width:300px;@if($mode ==0) background-color:#282828;color:white; @endif" type="text" id="search" placeholder="Search ... "/> 
                                    
                                        <button class="btn @if($mode) btn-primary @else btn-outline-primary @endif mx-1" wire:click="add_row('addFaq')">
                                            <div><span>Add</span></div>
                                        </button>
                                        <div class="d-flex align-items-center mx-1">
                                            <div>
                                                <span >
                                                    Max Display
                                                </span>
                                            </div>
                                            <input type="number"style="max-width:70px;@if($mode ==0) background-color:#282828;color:white; @endif" id="max-number" class="form-control mx-1" wire:model.defer="faq_max_display" wire:change="max_display('faq')" id="" min="0" max="100">
                                        </div>
                                        <div class="d-flex align-items-center mx-1">
                                            <div class="form-check form-switch aligh-items-center m-2">
                                                <input class="form-check-input" type="checkbox" role="switch" @if($faq_active == 1) checked @endif  id="faq-active" wire:click="toggle_active('faq')">
                                                <label for="mode" class="form-check-label" for="flexSwitchCheckDefault"> @if($faq_active == 1) Active @else Inactive @endif</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table @if($mode == 1) table-striped @else table-dark @endif border">
                                        <thead class="thead-dark">
                                            <tr>
                                                @foreach($faq_filter as $key =>$value)
                                                    @if($value['active'])
                                                        <th scope="col" wire:key="faq-th-{{$key}}" class="{{$value['class']}}">{{$value['name']}}</th>
                                                    @endif
                                                @endforeach
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($faq_data)
                                                @foreach ($faq_data as $key =>$value)
                                                    <tr wire:key="experience-{{$key}}" class="align-middle">
                                                        @foreach($faq_filter as $filter_key =>$filter_value)
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
                                                                    <button class="btn @if($mode) btn-success @else btn-outline-success @endif "  wire:click="edit_faq('editFaq',{{$value->id}})">Edit</button>
                                                                    <button class="btn @if($mode) btn-danger @else btn-outline-danger @endif" wire:click="delete_faq('deleteFaq',{{$value->id}})">Delete</button>
                                                                </td>
                                                            @elseif ($filter_value['name'] == 'Order'  && $filter_value['active'])
                                                                <td class="">
                                                                    @if($key === array_key_first($faq_data) && array_key_first($faq_data) !== array_key_last($faq_data) )
                                                                    <div class="btn-group-vertical btn-group-sm">
                                                                        <button type="button" class="btn  @if($mode == 1) btn-outline-dark @else btn-outline-light @endif " wire:click="move_down_faq({{$value->id}})">
                                                                            <i class="bi bi-chevron-down"></i>
                                                                        </button>
                                                                    </div>   
                                                                    @elseif($key === array_key_last($faq_data) && array_key_first($faq_data) !== array_key_last($faq_data))
                                                                    <div class="btn-group-vertical btn-group-sm ">
                                                                        <button type="button" class="btn @if($mode == 1) btn-outline-dark @else btn-outline-light @endif" wire:click="move_up_faq({{$value->id}})">
                                                                            <i class="bi bi-chevron-up"></i>
                                                                        </button>
                                                                    </div>  
                                                                    @else
                                                                    <div class="btn-group-vertical btn-group-sm ">
                                                                        <button type="button" class="btn @if($mode == 1) btn-outline-dark @else btn-outline-light @endif" wire:click="move_up_faq({{$value->id}})">
                                                                            <i class="bi bi-chevron-up"></i>
                                                                        </button>
                                                                        <button type="button" class="btn @if($mode == 1) btn-outline-dark @else btn-outline-light @endif" wire:click="move_down_faq({{$value->id}})">
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

                    <div class="modal fade" id="faq-data-filter" tabindex="-1" role="dialog" aria-labelledby="faq-data-filterLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content @if($mode == 0) bg-dark text-light @endif">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="sortingModalLabel">Sort&nbsp;Columns for FAQ</h5>
                                </div>
                                <div class="modal-body">
                                    @foreach($faq_filter as $key =>$value)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="faq-{{$loop->iteration}}"
                                            wire:model.defer="faq_filter.{{$key}}.active">
                                        <label class="form-check-label" for="faq-{{$loop->iteration}}">
                                            {{$value['name']}}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="modal-footer">
                                    <button type="button"  class="btn @if($mode) btn-secondary @else btn-outline-secondary @endif btn-block" data-bs-dismiss="modal"  id='btn_close1'>Close</button>
                                    <button wire:click="update_faq_filter()"  data-bs-dismiss="modal" 
                                        class="btn @if($mode) btn-success @else btn-outline-success @endif">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="addFaq" tabindex="-1" role="dialog" aria-labelledby="addFaqLabel" aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content @if($mode == 0) bg-dark text-light @endif">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addFaqLabel">Add FAQ</h5>
                                </div>
                                <div class="modal-body">
                                    <form wire:submit.prevent="add_faq('addFaq')">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="faq-title" class="form-label">Question</label>
                                                <input type="text" id="faq-title" class="form-control" wire:model.defer="faq.question" placeholder="Enter question ..." required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="faq-link" class="form-label">Answer</label>
                                                <input type="text" id="faq-link" class="form-control" wire:model="faq.answer" placeholder="Enter answer ..." required >
                                            </div>
                                            <div class="mb-3">
                                                <label for="faq-type" class="form-label">Link</label>
                                                <input type="text" id="faq-type" class="form-control" wire:model="faq.link" placeholder="Enter link ..." >
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

                    <div class="modal fade" id="editFaq" tabindex="-1" role="dialog" aria-labelledby="editFaqLabel" aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content @if($mode == 0) bg-dark text-light @endif">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editFaqLabel">Edit FAQ</h5>
                                </div>
                                <div class="modal-body">
                                    <form wire:submit.prevent="save_edit_faq('editFaq')">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="faq-title" class="form-label">Question</label>
                                                <input type="text" id="faq-title" class="form-control" wire:model.defer="faq.question" placeholder="Enter header ..." required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="faq-link" class="form-label">Answer</label>
                                                <input type="text" id="faq-link" class="form-control" wire:model="faq.answer" placeholder="Enter content ..." required >
                                            </div>
                                            <div class="mb-3">
                                                <label for="faq-type" class="form-label">Link</label>
                                                <input type="text" id="faq-type" class="form-control" wire:model="faq.link" placeholder="Enter link ..." >
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"  class="btn @if($mode) btn-secondary @else btn-outline-secondary @endif btn-block" data-bs-dismiss="modal"  id='btn_close1'>Close</button>
                                            <button type="submit" 
                                                class="btn @if($mode) btn-success @else btn-outline-success @endif">
                                                Edit
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="deleteFaq" tabindex="-1" role="dialog" aria-labelledby="deleteFaqLabel" aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content @if($mode == 0) bg-dark text-light @endif">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteFaqLabel">Delete FAQ</h5>
                                </div>
                                <div class="modal-body">
                                    <form wire:submit.prevent="save_delete_faq('deleteFaq')">
                                        <div class="modal-body">
                                           <p> Are you sure you want to delete this row?</p>
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

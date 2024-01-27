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
            <div class="d-flex justify-content-between">
                <div class=" lead pt-4 px-4">
                    Homepage  
                </div>
                <a class="pt-4 px-4" href="/homepage/{{$user_id}}" target="_blank">
                    <button class="btn btn-outline-secondary" >
                        View Page
                    </button>
                </a>
            </div>
            <div class="row px-3 pt-2">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button wire:ignore.self wire:click="update_data()" class="nav-link active" id="about-page-tab" data-bs-toggle="tab" data-bs-target="#about-page-tab-pane" type="button" role="tab" aria-controls="about-page-tab-pane" aria-selected="true">Tables</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div @if($mode== 0)style="background-color:#242424;;color:white;border-bottom-color: white;"@endif wire:ignore.self class="tab-pane fade show active" id="about-page-tab-pane" role="tabpanel" aria-labelledby="about-page-tab" tabindex="0">
                        <div class="row d-flex">
                            <div class="col">
                                <div class="row py-2">
                                    <div class="col-12 p-0 mx-2 d-flex">
                                        <button class="btn @if($mode) btn-secondary @else btn-outline-secondary @endif d-flex align-items-center mx-1" data-bs-toggle="modal" data-bs-target="#homepage-data-filter">
                                            <i class="bi bi-funnel-fill"></i><span>Columns</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table @if($mode == 1) table-striped @else table-dark @endif border">
                                        <thead class="thead-dark">
                                            <tr>
                                                @foreach($homepage_filter as $key =>$value)
                                                    @if($value['active'])
                                                        <th scope="col" wire:key="about_page-th-{{$key}}" class="{{$value['class']}}">{{$value['name']}}</th>
                                                    @endif
                                                @endforeach
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($homepage_data)
                                                @foreach ($homepage_data as $key =>$value)
                                                    <tr wire:key="experience-{{$key}}" class="align-middle">
                                                        @foreach($homepage_filter as $filter_key =>$filter_value)
                                                            @if($filter_value['name'] == '#'  && $filter_value['active'])
                                                                <th scope="col" >
                                                                    <span class="d-flex text-center align-items-center">
                                                                        {{ $key+1  }}
                                                                    </span>
                                                                </th>
                                                            @elseif ($filter_value['name'] == 'Max Display'  && $filter_value['active'])
                                                                <td  class="align-items-center">
                                                                    <input type="number" style="max-width:70px;@if($mode ==0) background-color:#282828;color:white; @endif" id="max-number" class="form-control mx-1" wire:model.defer="homepage_data.{{$key}}.table_max_display" wire:change="update_max_display({{$value->id}},{{$key}})" id="" min="0" max="100">
                                                                </td>
                                                            @elseif ($filter_value['name'] == 'IsActive?'  && $filter_value['active'])
                                                                <td scope="col" >
                                                                    
                                                                    @if($value->{$filter_value['column_name']} == 1)
                                                                        Active
                                                                    @else 
                                                                        Inactive 
                                                                    @endif
                                                                    
                                                                </td>
                                                            @elseif ($filter_value['name'] == 'Order'  && $filter_value['active'])
                                                                <td class="text-center">
                                                                    @if($key === array_key_first($homepage_data) && array_key_first($homepage_data) !== array_key_last($homepage_data) )
                                                                    <div class="btn-group-vertical btn-group-sm">
                                                                        <button type="button" class="btn  @if($mode == 1) btn-outline-dark @else btn-outline-light @endif " wire:click="move_down_homepage({{$value->id}})">
                                                                            <i class="bi bi-chevron-down"></i>
                                                                        </button>
                                                                    </div>   
                                                                    @elseif($key === array_key_last($homepage_data) && array_key_first($homepage_data) !== array_key_last($homepage_data))
                                                                    <div class="btn-group-vertical btn-group-sm ">
                                                                        <button type="button" class="btn @if($mode == 1) btn-outline-dark @else btn-outline-light @endif" wire:click="move_up_homepage({{$value->id}})">
                                                                            <i class="bi bi-chevron-up"></i>
                                                                        </button>
                                                                    </div>  
                                                                    @else
                                                                    <div class="btn-group-vertical btn-group-sm ">
                                                                        <button type="button" class="btn @if($mode == 1) btn-outline-dark @else btn-outline-light @endif" wire:click="move_up_homepage({{$value->id}})">
                                                                            <i class="bi bi-chevron-up"></i>
                                                                        </button>
                                                                        <button type="button" class="btn @if($mode == 1) btn-outline-dark @else btn-outline-light @endif" wire:click="move_down_homepage({{$value->id}})">
                                                                            <i class="bi bi-chevron-down"></i>
                                                                        </button>
                                                                    </div>  
                                                                    @endif
                                                                </td>
                                                            @elseif($filter_value['name'] == 'Action'  && $filter_value['active'])
                                                                <td class="text-center">
                                                                    @if($value->table_isactive == 1)
                                                                        <button class="btn @if($mode) btn-danger @else btn-outline-danger @endif btn-block" wire:click="toggle_activate({{$value->id}})">
                                                                            Deactivate
                                                                         </button>
                                                                    @else 
                                                                        <button class="btn @if($mode) btn-warning @else btn-outline-warning @endif btn-block" wire:click="toggle_activate({{$value->id}})">
                                                                        Activate 
                                                                        </button>
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

                        <div class="modal fade" id="homepage-data-filter" tabindex="-1" role="dialog" aria-labelledby="homepage-data-filterLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content @if($mode == 0) bg-dark text-light @endif">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="homepage-data-filter">Sort&nbsp;Columns for Location</h5>
                                    </div>
                                    <div class="modal-body">
                                        @foreach($homepage_filter as $key =>$value)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="homepage_filter-{{$loop->iteration}}"
                                                wire:model.defer="homepage_filter.{{$key}}.active">
                                            <label class="form-check-label" for="homepage_filter-{{$loop->iteration}}">
                                                {{$value['name']}}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button"  class="btn @if($mode) btn-secondary @else btn-outline-secondary @endif btn-block" data-bs-dismiss="modal"  id='btn_close1'>Close</button>
                                        <button wire:click="update_homepage_filter()"  data-bs-dismiss="modal" 
                                            class="btn @if($mode) btn-success @else btn-outline-success @endif">
                                            Save
                                        </button>
                                    </div>
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

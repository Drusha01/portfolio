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
                <div class="d-flex justify-content-between">
                    <div class=" lead pt-4 px-4">
                        Blogs  
                    </div>
                    <a class="pt-4 px-4" href="/blogs/{{$user_id}}" target="_blank">
                        <button class="btn btn-outline-secondary" >
                            View Page
                        </button>
                    </a>
                </div>
            </div>
            <div class="row px-3 pt-2">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button @if($mode== 0)style="background-color:#242424;;color:white;border-bottom-color: white;"@endif wire:ignore.self wire:click="update_data()" class="nav-link active" id="about-page-tab" data-bs-toggle="tab" data-bs-target="#about-page-tab-pane" type="button" role="tab" aria-controls="about-page-tab-pane" aria-selected="true">Blogs</button>
                    </li>
                   
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div wire:ignore.self class="tab-pane fade show active" id="about-page-tab-pane" role="tabpanel" aria-labelledby="about-page-tab" tabindex="0">
                        <div class="row d-flex">
                            <div class="col">
                                <div class="row py-2">
                                    <div class="col-12 p-0 mx-2 d-flex">
                                        <button class="btn @if($mode) btn-secondary @else btn-outline-secondary @endif d-flex mx-1" data-bs-toggle="modal" data-bs-target="#blog-data-filter">
                                            <i class="bi bi-funnel-fill"></i><span>Columns</span>
                                        </button>
                                        <input class="form-control mx-1" style="max-width:300px;@if($mode ==0) background-color:#282828;color:white; @endif" type="text" id="search" placeholder="Search ... "/> 
                                    
                                        <button class="btn @if($mode) btn-primary @else btn-outline-primary @endif mx-1" wire:click="add_row('addBlog')">
                                            <div><span>Add</span></div>
                                        </button>
                                        <div class="d-flex align-items-center mx-1">
                                            <div>
                                                <span >
                                                    Max Display
                                                </span>
                                            </div>
                                            <input type="number"style="max-width:70px;@if($mode ==0) background-color:#282828;color:white; @endif" id="max-number" class="form-control mx-1" wire:model.defer="blog_max_display" wire:change="max_display('blogs')" id="" min="0" max="100">
                                        </div>
                                        <div class="d-flex align-items-center mx-1">
                                            <div class="form-check form-switch aligh-items-center m-2">
                                                <input class="form-check-input" type="checkbox" role="switch" @if($blog_active == 1) checked @endif  id="blog-active" wire:click="toggle_active('blogs')">
                                                <label for="mode" class="form-check-label" for="flexSwitchCheckDefault"> @if($blog_active == 1) Active @else Inactive @endif</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table @if($mode == 1) table-striped @else table-dark @endif border">
                                        <thead class="thead-dark">
                                            <tr>
                                                @foreach($blog_filter as $key =>$value)
                                                    @if($value['active'])
                                                        <th scope="col" wire:key="blog-th-{{$key}}" class="{{$value['class']}}">{{$value['name']}}</th>
                                                    @endif
                                                @endforeach
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($blog_data)
                                                @foreach ($blog_data as $key =>$value)
                                                    <tr wire:key="experience-{{$key}}" class="align-middle">
                                                        @foreach($blog_filter as $filter_key =>$filter_value)
                                                            @if($filter_value['name'] == '#'  && $filter_value['active'])
                                                                <th scope="col" >
                                                                    <span class="d-flex text-center align-items-center">
                                                                        {{ $key+1  }}
                                                                    </span>
                                                                </th>
                                                            @elseif ($filter_value['name'] == 'Image'  && $filter_value['active'])
                                                                <td class="text-center">
                                                                    <a href="{{asset('storage/content/blogs/'.$value->{$filter_value['column_name']})}}" target="blank">
                                                                        <img src="{{asset('storage/content/blogs/'.$value->{$filter_value['column_name']})}}" alt="" style="height: 80px; ">
                                                                    </a>
                                                                </td>
                                                            @elseif($filter_value['name'] == 'Action'  && $filter_value['active'])
                                                                <td class="text-center">
                                                                    <button class="btn @if($mode) btn-success @else btn-outline-success @endif "  wire:click="edit_blog('editBlog',{{$value->id}})">Edit</button>
                                                                    <button class="btn @if($mode) btn-danger @else btn-outline-danger @endif" wire:click="delete_blog('deleteBlog',{{$value->id}})">Delete</button>
                                                                </td>
                                                            @elseif ($filter_value['name'] == 'Tags'  && $filter_value['active'])
                                                                <td class="text-center">
                                                                    <button class="btn @if($mode) btn-primary @else btn-outline-primary @endif" wire:click="view_tags('ViewTags',{{$value->id}})">
                                                                        View Tags
                                                                    </button>
                                                                </td>
                                                            @elseif ($filter_value['name'] == 'Order'  && $filter_value['active'])
                                                                <td class="">
                                                                    @if($key === array_key_first($blog_data) && array_key_first($blog_data) !== array_key_last($blog_data) )
                                                                    <div class="btn-group-vertical btn-group-sm">
                                                                        <button type="button" class="btn  @if($mode == 1) btn-outline-dark @else btn-outline-light @endif " wire:click="move_down_blog({{$value->id}})">
                                                                            <i class="bi bi-chevron-down"></i>
                                                                        </button>
                                                                    </div>   
                                                                    @elseif($key === array_key_last($blog_data) && array_key_first($blog_data) !== array_key_last($blog_data))
                                                                    <div class="btn-group-vertical btn-group-sm ">
                                                                        <button type="button" class="btn @if($mode == 1) btn-outline-dark @else btn-outline-light @endif" wire:click="move_up_blog({{$value->id}})">
                                                                            <i class="bi bi-chevron-up"></i>
                                                                        </button>
                                                                    </div>  
                                                                    @else
                                                                    <div class="btn-group-vertical btn-group-sm ">
                                                                        <button type="button" class="btn @if($mode == 1) btn-outline-dark @else btn-outline-light @endif" wire:click="move_up_blog({{$value->id}})">
                                                                            <i class="bi bi-chevron-up"></i>
                                                                        </button>
                                                                        <button type="button" class="btn @if($mode == 1) btn-outline-dark @else btn-outline-light @endif" wire:click="move_down_blog({{$value->id}})">
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

                    <div class="modal fade" id="blog-data-filter" tabindex="-1" role="dialog" aria-labelledby="blog-data-filterLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content @if($mode == 0) bg-dark text-light @endif">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="blog-data-filter">Sort&nbsp;Columns for Blogs</h5>
                                </div>
                                <div class="modal-body">
                                    @foreach($blog_filter as $key =>$value)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="blog_filter-{{$loop->iteration}}"
                                            wire:model.defer="blog_filter.{{$key}}.active">
                                        <label class="form-check-label" for="blog_filter-{{$loop->iteration}}">
                                            {{$value['name']}}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="modal-footer">
                                    <button type="button"  class="btn @if($mode) btn-secondary @else btn-outline-secondary @endif btn-block" data-bs-dismiss="modal"  id='btn_close1'>Close</button>
                                    <button wire:click="update_blog_filter()"  data-bs-dismiss="modal" 
                                        class="btn @if($mode) btn-success @else btn-outline-success @endif">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="addBlog" tabindex="-1" role="dialog" aria-labelledby="addBlogLabel" aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content @if($mode == 0) bg-dark text-light @endif">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addBlogLabel">Add Blog</h5>
                                </div>
                                <div class="modal-body">
                                    <form wire:submit.prevent="save_add_blog('addBlog')">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="project-title" class="form-label">Image</label>
                                                <input type="file" id="project-title" class="form-control" wire:model.defer="blog.image" placeholder="Enter title ..." required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="blog-title" class="form-label">Title</label>
                                                <input type="text" id="blog-title" class="form-control" wire:model.defer="blog.title" placeholder="Enter title ..." required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="blog-title" class="form-label">Content</label>
                                                <input type="text" id="blog-title" class="form-control" wire:model.defer="blog.content" placeholder="Enter content ..." required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="blog-link" class="form-label">Button</label>
                                                <input type="text" id="blog-link" class="form-control" wire:model="blog.button" placeholder="Enter button ..." >
                                            </div>
                                            <div class="mb-3">
                                                <label for="blog-type" class="form-label">Link</label>
                                                <input type="text" id="blog-type" class="form-control" wire:model="blog.link" placeholder="Enter link ..." >
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

                    <div class="modal fade" id="editBlog" tabindex="-1" role="dialog" aria-labelledby="editBlogLabel" aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content @if($mode == 0) bg-dark text-light @endif">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editBlogLabel">Edit Blog</h5>
                                </div>
                                <div class="modal-body">
                                    <form wire:submit.prevent="save_edit_blog('editBlog')">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="project-title" class="form-label">Image</label>
                                                <input type="file" id="project-title" class="form-control" wire:model.defer="blog.image" placeholder="Enter title ..." >
                                            </div>
                                            <div class="mb-3">
                                                <label for="blog-title" class="form-label">Title</label>
                                                <input type="text" id="blog-title" class="form-control" wire:model.defer="blog.title" placeholder="Enter title ..." required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="blog-title" class="form-label">Content</label>
                                                <input type="text" id="blog-title" class="form-control" wire:model.defer="blog.content" placeholder="Enter content ..." required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="blog-link" class="form-label">Button</label>
                                                <input type="text" id="blog-link" class="form-control" wire:model="blog.button" placeholder="Enter button ..." >
                                            </div>
                                            <div class="mb-3">
                                                <label for="blog-type" class="form-label">Link</label>
                                                <input type="text" id="blog-type" class="form-control" wire:model="blog.link" placeholder="Enter link ..." >
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

                    <div class="modal fade" id="deleteBlog" tabindex="-1" role="dialog" aria-labelledby="deleteBlogLabel" aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content @if($mode == 0) bg-dark text-light @endif">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteBlogLabel">Delete Blog</h5>
                                </div>
                                <div class="modal-body">
                                    <form wire:submit.prevent="save_delete_blog('deleteBlog')">
                                        <div class="modal-body">
                                           <p> Are you sure you want to delete this blog?</p>
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

                    <div class="modal fade" id="ViewTags" tabindex="-1" role="dialog" aria-labelledby="ViewTagsLabel" aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content @if($mode == 0) bg-dark text-light @endif">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ViewTagsLabel">Blog Tags</h5>
                                </div>
                                <div class="modal-body">
                                    <form wire:submit.prevent="add_tag({{$blog['id']}})">
                                    <div class="input-group mb-3">
                                            <input wire:model.defer="tag_details" type="text" class="form-control" placeholder="tag ... " aria-label="tag ... " aria-describedby="button-addon2" required>
                                            <button type="submit" class="btn @if($mode) btn-primary @else btn-outline-primary @endif" type="button" id="button-addon2" >Add tag</button>
                                        </form>
                                    </div>
                                    @if($tag_data)
                                        @foreach ($tag_data as $key =>$value)
                                        <div class="row my-3" >
                                            <div class="col">
                                                <div class=" @if($mode == 1)border border-dark  @else border border-light @endif rounded-2 py-2"style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                    <i wire:click="delete_tag({{$blog['id']}},{{$value->id}})"class="bi bi-x border bg-danger border-danger rounded-2 p-2"></i>
                                                    &nbsp; &nbsp; {{$value->tag_details}} &nbsp; &nbsp; 
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    @else
                                        <div class="row my-3" >
                                            <div class="col">
                                                <div class="text-center border @if($mode == 1)border border-dark  @else border border-light @endif rounded-2 py-2"style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                    &nbsp; &nbsp; NO TAGS DATA &nbsp; &nbsp; 
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                        
                                                    
                                    <div class="modal-footer">
                                        <button type="button"  class="btn @if($mode) btn-secondary @else btn-outline-secondary @endif btn-block" data-bs-dismiss="modal"  id='btn_close1'>Close</button>
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

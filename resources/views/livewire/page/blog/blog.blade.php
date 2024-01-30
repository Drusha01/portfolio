<div class="p-0 m-0" style="min-height:80vh;@if($mode == 0) background:#282828;color:white; @else background:#fff;color:dark; @endif  font-family: 'Open Sans', sans-serif;font-size: 16px;">
    <section id="blog" class="p-5" >
        <div class="container  text-center p-sm-1">
            <div class="align-items-center">
                <h3 class="h1 pb-5 text-uppercase">MyBlogs</h3>
            </div>
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12 mx-lg-5 ">
                    @if($blog_data)
                        @foreach($blog_data as $key => $value)
                            <div class="col-12 p-0 m-0 shadow">
                                <div class="row">
                                    <div class="col">
                                        <img class="" src="{{asset('storage/content/blogs/'.$value->image)}}" alt="" style="object-fit:cover;width:inherit;max-height:400px" >
                                    </div>
                                </div>
                                <div class="row">
                                    <p class="h4 text-start px-5 pt-5" style="width:inherit;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                    <strong>{{$value->title}}</strong>
                                </h2>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-start px-5 py-2"><span><i class="bi bi-person"></i> {{$value->user_firstname.' '.$value->user_middlename.' '.$value->user_lastname}}  &#160; &#160; &#160; &#160;<i class="bi bi-clock"></i> {{date_format(date_create($value->date_created), "F d, Y ")}}</span></div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-start px-5 py-2 overflow-hidden"  style="max-height:200px" >
                                        <p>{{$value->content}}</p>
                                    
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-12 text-start px-5 py-4 d-flex justify-content-end">
                                        <a class="btn btn-primary " href="blog/@if(isset($user_id)){{$user_id.'/'}}@endif{{$value->id}}">{{$value->button}}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 py-3 m-0 opacity-0">
                                &#160;
                            </div>
                        @endforeach
                    @endif
                </div>
                @if($tag_data)
                <div class="col-lg-3 col-md-12 col-sm-12 ">
                    <div class="col-12 px-4 shadow">
                        <div class="row">
                            <div class="col-12 pt-5">
                                <input type="text" class="form-control" placeholder="Search category ... ">
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-12 pt-1 text-start">
                                    <p> &#160;</p>
                                </div>
                            </div>
                            @foreach($tag_data as $key =>$value)
                            <a href="blog/@if(isset($user_id)){{$user_id.'/'}}@endif{{'tag/'.$value->tag_details}}" class="link-underline link-underline-opacity-0 @if($mode == 0) text-white @else text-dark @endif">
                                <div class="row">
                                    <div class="col-12 pt-1 text-start text-truncate" style="max-width:inherit;">
                                        <p >{{$value->tag_details}} <span class="opacity-50">({{$value->count}}) </p>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                            <div class="row">
                                <div class="col-12 pt-1 text-start">
                                    <p> &#160;</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if(!$tag_data && !$blog_data)
                    <h2>NO BLOGS DATA ADDED</h2>
                @endif
            </div>
        </div>        
    </section>
</div>

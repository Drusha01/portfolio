<div  style="min-height:80vh;@if($mode == 0) background:#282828;color:white @else background:#fff;color:dark @endif">
    <section id="faq" class="p-5" >
        <div class="container  text-center p-sm-1">
            <div class="align-items-center">
                <h3 class="h1 pb-5 text-uppercase">Frequently Ask Questions</h3>
                @if($faq_data)
                    <div class="accordion b" id="accordionExample">
                        @foreach($faq_data as $key => $value)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed @if($mode == 1 )bg-white text-dark @else bg-dark text-white @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$key}}" aria-expanded="false" aria-controls="collapseOne">
                                {{$value->question}}
                            </button>
                            </h2>
                            <div id="collapse{{$key}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body text-start">
                                    {{$value->answer}}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <h2>NO FAQ DATA</h2>
                @endif
            </div>
        </div>  
    </section>
</div>

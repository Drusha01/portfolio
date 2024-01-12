<div  style="min-height:80vh;@if($mode == 0) background:#282828;color:white @else background:#fff;color:dark @endif">
    <section id="faq" class="p-5" >
        <div class="container  text-center p-sm-1">
            <div class="align-items-center">
                <h3 class="h1 pb-5 text-uppercase">Frequently Ask Questions</h3>
                <div class="accordion b" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed @if($mode == 1 )bg-white text-dark @else bg-dark text-white @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Accordion Item #1
                        </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </section>
</div>

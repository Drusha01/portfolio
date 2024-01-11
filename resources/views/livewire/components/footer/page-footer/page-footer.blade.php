<div>
    <section id="footer" class="pt-5 pb-5 @if($mode == 1) border-top border-dark @else border-light border-top @endif @if($mode == 1) bg-white text-dark @else bg-dark text-light @endif">
        <div class="container text-center p-sm-1">
            <div class="align-items-center">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-sm-4 p-1">
                        <h3 class="h6 text-uppercase">Drusha</h3>
                    </div>
                    <div class="col-sm-4 p-1">
                        <h3 class="h6 text-uppercase">© {{date("Y")}}. All rights reserved.</h3>
                    </div>
                    <div class="col-sm-4 p-1">
                        <a href="#" class="link-underline link-underline-opacity-0 p-2">
                            <img src="{{ asset('assets/logo/facebook.png') }}" alt="" width="40px" >
                        </a>    
                        <a href="#" class="link-underline link-underline-opacity-0 p-2">
                            <img src="{{ asset('assets/logo/instagram.png') }}" alt="" width="40px" >
                        </a>
                    </div>
                </div> 
            </div>
        </div>
    </section>
</div>

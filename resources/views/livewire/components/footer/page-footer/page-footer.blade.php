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

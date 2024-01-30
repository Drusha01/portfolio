<div class="p-0 m-0" style="min-height:80vh;@if($mode == 0) background:#282828;color:white @else background:#fff;color:dark @endif">
    <section id="map-section">
        <div id="map" style=" width:100%;height:340px;opacity:.8"></div>
    </section>
    <section id="contact-info">
        <div class="row p-5">
            <div class="col-12 section-title text-center">
                <h2>CONTACT US</h2>
            </div>
        </div>
        <div class="row">
            <div class="row p-3 text-center">
                <div class="col">
                    <a href="https://www.facebook.com/drusha091" class="mx-2 @if($mode == 1) text-dark @else text-white @endif" target="_blank"><i class="bi bi-facebook fs-5"></i></a>
                    <a href="https://www.instagram.com/drusha091" class="mx-2 @if($mode == 1) text-dark @else text-white @endif" target="_blank"><i class="bi bi-instagram fs-5"></i></a>
                    <a href="https://www.linkedin.com/in/drusha01" class="mx-2 @if($mode == 1) text-dark @else text-white @endif" target="_blank"><i class="bi bi-linkedin fs-5"></i></a>
                    <a href="https://github.com/Drusha01" class="mx-2 @if($mode == 1) text-dark @else text-white @endif" target="_blank"><i class="bi bi-github fs-5"></i></a>
                </div>
            </div>
        </div>
    </section>

    @if($contact_info_data)
    <section id="contact-info">
        <div class="container-md mt-5">
            <div class="row d-flex justify-content-center">
                @foreach($contact_info_data as $key => $value)
                    @if( ($key) == $contact_info_max_display )
                        @break;
                    @endif
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col text-center">
                                <h4><?php echo $value->contact_icon?> {{ $value->contact_title}}</h4>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col">
                                {{ $value->contact_details}}
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </section>
    @endif
    <section id="contact-form">
        <div class="container-md mt-5 ">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-10 @if($mode == 1) bg-light @else bg-dark @endif shadow justify-content-center p-3 mb-5 rounded-4">
                    <form action="" class="">
                        <div class="row pt-5">
                            <div class="col-sm-6 mb-3">
                                <input type="text" class="form-control" placeholder="Your name">
                            </div>
                            <div class="col-sm-6 mb-3">
                                <input type="text" class="form-control" placeholder="Your email">
                            </div>
                            <div class="col-lg-12 mb-3">
                                <input type="text" class="form-control" placeholder="Subject">
                            </div>
                            <div class="col-lg-12 mb-3">
                                <textarea class="form-control" rows="4"  placeholder="Message"></textarea>
                            </div>
                            <div class="text-center mb-3">
                                <button class="btn btn-light btn-outline-dark">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        function map_contact(){
            mapboxgl.accessToken = 'pk.eyJ1IjoiZHJ1c2hhIiwiYSI6ImNscXkyenV3cDBrdjMyanBjc2Fib2h4eWIifQ.00MiJujxN4t1DZH5ksedbA';
            var map = new mapboxgl.Map({
            container: 'map', // container ID
            center: [{{$lng}},{{$lat}}], // starting position [lng, lat]
            zoom: {{$zoom}} // starting zoom
            });
            var marker1 = new mapboxgl.Marker({ color: 'red'})
            .setLngLat( [{{$lng}},{{$lat}}])
            .addTo(map);
        }
        mapboxgl.accessToken = 'pk.eyJ1IjoiZHJ1c2hhIiwiYSI6ImNscXkyenV3cDBrdjMyanBjc2Fib2h4eWIifQ.00MiJujxN4t1DZH5ksedbA';
        var map = new mapboxgl.Map({
        container: 'map', // container ID
        center: [{{$lng}},{{$lat}}], // starting position [lng, lat]
        zoom: {{$zoom}} // starting zoom
        });
        var marker1 = new mapboxgl.Marker({ color: 'red'})
        .setLngLat( [{{$lng}},{{$lat}}])
        .addTo(map);
      
    </script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v3.0.1/mapbox-gl.css" rel="stylesheet">
    <script onload="map_contact();" src="https://api.mapbox.com/mapbox-gl-js/v3.0.1/mapbox-gl.js"></script>
</div>

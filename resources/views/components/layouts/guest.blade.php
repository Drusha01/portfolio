<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script src="{{url('/bootstrap-5.3.2-dist')}}/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="{{url('/bootstrap-icons-1.11.2')}}/font/bootstrap-icons.min.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>

     

        <title>Hanrickson Dumapit - {{ $title ?? 'Page Title' }}</title>
        <link rel="icon" href="{{ asset('assets/favicon/favicon.ico') }}" type="image/x-icon"></head>
           
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="{{url('/bootstrap-5.3.2-dist')}}/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.4/umd/popper.min.js"></script>
        

    </head>
    <style>
        body {
            font-family: 'Roboto';font-size: 13px;
          
        }
        @keyframes gradientAnimation {
        0%, 100% {
            background-position: 0 0;
        }
        50% {
            background-position: 0 100%;
        }
        }
        
        .bg {
            animation:slide 3s ease-in-out infinite alternate;
            background-image: linear-gradient(-60deg, #d70000 50%, #fff0 50%);
            --dot-bg: transparent;
            --dot-color: linear-gradient(-60deg, #ae0000 50%, #efefef 50%, #ae0000 50%);
            --dot-size: 1px;
            --dot-space: 20px;
            background: linear-gradient(90deg, var(--dot-bg) calc(var(--dot-space) - var(--dot-size)), transparent 1%) center / var(--dot-space) var(--dot-space), linear-gradient(var(--dot-bg) calc(var(--dot-space) - var(--dot-size)), transparent 1%) center / var(--dot-space) var(--dot-space), var(--dot-color);
            background-blend-mode: multiply;
            bottom:0;
            left:-50%;
            opacity:.5;
            position:fixed;
            right:-50%;
            top:0;
            z-index:-1;
        }
        .bg1 {
            animation:slide 3s ease-in-out infinite reverse;
            background-image: linear-gradient(120deg, #500000 50%, #5c1212 50%, #b14e4e 50%);
            bottom:0;
            left:-50%;
            opacity:.5;
            position:fixed;
            right:-50%;
            top:0;
            z-index:-1;
        }

        .bg2 {
            animation-direction:alternate-reverse;
            animation-duration:4s;
        }

        .bg3 {
        animation-duration:5s;
        }

        @keyframes slide {
        0% {
            transform:translateX(-25%);
        }
        100% {
            transform:translateX(25%);
        }
        }
    </style>
    <body>
        
        <div class="bg"></div>
        <div class="bg bg2"></div>
        <div class="bg bg3"></div>
        <div class="bg1"></div>
        <div class="bg1 bg2"></div>
        <div class="bg1 bg3"></div>

        {{ $slot }}
        <script>
            window.addEventListener('refresh-page', event => {
                window.location.reload(false); 
            })
            window.addEventListener('swal:message', event => {
                Swal.fire({
                    position: event.detail.position,
                    icon: event.detail.icon,
                    title: event.detail.title,
                    text: event.detail.text,
                    showConfirmButton: false,
                    timer: event.detail.timer,
                    timerProgressBar: true,
                    allowOutsideClick: false,
                    allowEscapeKey: false
                })
            });

            window.addEventListener('swal:redirect', event => {
                Swal.fire({
                        position: event.detail.position,
                        icon: event.detail.icon,
                        title: event.detail.title,
                        text: event.detail.text,
                        showConfirmButton: false,
                        timer: event.detail.timer,
                        timerProgressBar: true,
                        allowOutsideClick: false,
                        allowEscapeKey: false
                        })
                    .then(function() {
                        window.location.href = `${event.detail.link}`
                    });
            });

            window.addEventListener('swal:confirm', event => {
                Swal.fire({
                        position: event.detail.position,
                        icon: event.detail.icon,
                        title: event.detail.title,
                        text: event.detail.text,
                        showConfirmButton: true,
                        })
                    .then(function() {
                        window.location.href = `${event.detail.link}`
                    });
            });

            window.addEventListener('swal:accessrole', event => {
                Swal.fire({
                    position: event.detail.position,
                    icon: event.detail.icon,
                    title: event.detail.title,
                    html: event.detail.html,
                    timer: event.detail.timer
                })
            });

            window.addEventListener('swal:redirect-link', event => {
                Swal.fire({
                        position: event.detail.position,
                        icon: event.detail.icon,
                        title: event.detail.title,
                        html: event.detail.html,
                        timer: event.detail.timer
                    })
                    .then(function() {
                        window.location.href = `${event.detail.link}`
                    });
            });

            window.addEventListener('swal:refresh', event => {
                Swal.fire({
                        position: event.detail.position,
                        icon: event.detail.icon,
                        title: event.detail.title,
                        text: event.detail.text,
                        showConfirmButton: false,
                        timer: event.detail.timer,
                        timerProgressBar: true,
                        allowOutsideClick: false,
                        allowEscapeKey: false
                    })
                    .then(function() {
                        location.reload();
                    });
            });


            window.addEventListener('swal:confirmation', event => {
                Swal.fire({
                    position: event.detail.position,
                    icon: event.detail.icon,
                    title: event.detail.title,
                    text: event.detail.text,
                    showDenyButton: event.detail.showDenyButton,
                    showCancelButton: event.detail.showCancelButton,
                    confirmButtonText: event.detail.confirmButtonText,
                    denyButtonText: event.detail.denyButtonText
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.livewire.emit('confirm');
                    } else if (result.isDenied) {
                        Swal.fire(event.detail.fail_message);
                    }
                })
            });

            window.addEventListener('swal:close-current-tab', event => {
                Swal.fire({
                    position: event.detail.position,
                    icon: event.detail.icon,
                    title: event.detail.title,
                    timer: event.detail.timer
                }).then(function() {
                    window.close();
                });
            });
        </script>
    </body>
</html>

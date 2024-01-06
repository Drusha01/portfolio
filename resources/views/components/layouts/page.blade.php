<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        
        <link rel="stylesheet" href="{{url('/bootstrap-5.3.2-dist')}}/css/bootstrap.min.css">
        <script src="{{url('/bootstrap-5.3.2-dist')}}/js/bootstrap.bundle.min.js"></script>
        <script src="{{url('/sweetalert2-11.10.1')}}/dist/sweetalert2.all.min.js"></script>
        <link href="{{url('/sweetalert2-11.10.1')}}/dist/sweetalert2.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{url('/bootstrap-icons-1.11.2')}}/font/bootstrap-icons.min.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
  
        <title>{{ $title ?? 'Page Title' }}</title>
        <link rel="icon" href="{{ asset('assets/favicon/favicon.ico') }}" type="image/x-icon"></head>
    </head>
    <style>
        body {
            font-family: 'Roboto';font-size: 13px;
            @if($mode == 1)
            background: linear-gradient(-68deg, #FFFFFF, #F0F0F0, #FDEDE8, #CCFFFF);
            @else
            background: linear-gradient(-68deg, #000000, #251C1A, #220909, #CCFFFF);
            @endif
            
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }
       


@keyframes gradient {
    0% {
        background-position: 20% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 30% 50%;
    }
}
    </style>
    <body>
    @livewire('components.header.page-header.page-header')
        

        {{ $slot }}
        <script>
            window.addEventListener('refresh-page', event => {
                window.location.reload(false); 
            })
        </script>
    </body>
</html>

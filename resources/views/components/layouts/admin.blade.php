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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <link rel="icon" href="{{ asset('assets/favicon/favicon.ico') }}" type="image/x-icon"></head>

    </head>
    <style>
        body {
            font-family: 'Roboto';font-size: 13px;
        }
       
    </style>
    <body>
        @livewire('components.header.admin-header.admin-header')
        {{ $slot }}

        <script>
            window.addEventListener('refresh-page', event => {
                window.location.reload(false); 
            })
            document.addEventListener('livewire:navigating', () => {
                window.scrollBy(0, -2000);
            })
        </script>
    </body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        
        <link rel="stylesheet" href="{{url('/bootstrap-5.3.2-dist')}}/css/bootstrap.min.css">
        <script src="{{url('/bootstrap-5.3.2-dist')}}/js/bootstrap.bundle.min.js"></script>
        <script src="{{url('/sweetalert2-11.10.1')}}/dist/sweetalert2.all.min.js"></script>
        <link href="{{url('/sweetalert2-11.10.1')}}/dist/sweetalert2.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{url('/bootstrap-icons-1.11.2')}}/font/bootstrap-icons.min.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
  
        <title>Hanrickson Dumapit - {{ $title ?? 'Page Title' }}</title>
        <link rel="icon" href="{{ asset('assets/favicon/favicon.ico') }}" type="image/x-icon"></head>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    </head>
    <style>
        body {
            font-family: 'Roboto';font-size: 13px;
       
        }
       
    </style>
    <body>
    @livewire('components.header.page-header.page-header')
        

        {{ $slot }}

    @livewire('components.footer.page-footer.page-footer')
    </body>
</html>

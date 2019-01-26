<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="{{ asset ('css/app.css') }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
        <title>PC Builder - @yield('title')</title>
    </head>
    <body>
    <div id="app">
        <navbar :user="{{ json_encode($authUser) }}" logout="{{ route('logout') }}"></navbar>
        <div class="container mt-5">
            <div class="pt-5">
        @yield('content')
            </div>
        </div>
        <footer-component></footer-component>
        <login-modal-component csrf="{{ csrf_token() }}" login="{{ route('login') }}"></login-modal-component>
    </div>
    <script src="{{ asset ('js/app.js') }}"></script>
    <script src="{{ asset ('js/Frontend/PcBuilder/pcBuilder.js') }}"></script>
    </body>
</html>

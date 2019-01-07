<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ asset ('css/app.css') }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <title>PC Builder</title>
    </head>
    <body>
    <div id="app">
        <navbar></navbar>
        <headerpage></headerpage>
        <contentpage></contentpage>
    </div>
    <script src="{{ asset ('js/app.js') }}"></script>
    </body>
</html>

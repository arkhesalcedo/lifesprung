<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <home logo="{{ asset('images/logo.png') }}"></home>
        </div>
        
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/svgcheckbx.js') }}"></script>
    </body>
</html>

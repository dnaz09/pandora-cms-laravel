<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Pandora CMS</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="css/app.css" rel="stylesheet">
    </head>
    <body>
        @include('layout.partials.nav')
        @include('layout.partials.header')

        <div class="container-fluid mt-5">
            @yield('content')
        </div>
         <!-- Boostrap JS -->
         <script src="js/app.js" charset="utf-8"></script>
    </body>
</html>

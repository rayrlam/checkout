<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ config('app.name', 'Supermarket') }}</title>
        <meta name="description" content="">
        <meta name="keywords" content="">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
  
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">
    </head>
    <body>
        <!--Nav-->
        <x-navbar />

        <!--Main-->
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            {{ $slot }}
        </div>
        <!--Footer-->
        <x-footer />

    </body>
</html>
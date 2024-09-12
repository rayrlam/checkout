<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ $title ?? config('app.name', 'Checkout') }}</title>
        <meta name="description" content="">
        <meta name="keywords" content="">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
  
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">

        {{ $styles ?? '' }}
    </head>
    <body class="flex flex-col min-h-screen">
        <x-navbar />
        
        @if(isset($links))
            <x-sub-navbar :links="$links" />
        @endif

        <main class="max-w-screen-xl flex flex-col  mx-auto p-4">
            {{ $slot }}
        </main>

        <x-footer />

        {{ $scripts ?? '' }}
    </body>
</html>
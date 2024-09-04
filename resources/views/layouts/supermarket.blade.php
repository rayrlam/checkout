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
    
        <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
    
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">

        <link href="/css/app.css" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/prism.css')}}" />

        <script src="{{ asset('js/prism.js')}}"></script>
        <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>

        <style>
            hr.hr {
                border-top: 2px solid green;
            }
            #items {
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #items td, #items th {
                border: 1px solid #ddd;
                padding: 15px;
            }

            #items tr:nth-child(even){background-color: #f2f2f2;}

            #items tr:hover {background-color: #ddd;}

            #items th {
                text-align: left;
                background-color: #04AA6D;
                color: white;
            }
            
        </style>
    </head>
    <body class="leading-normal tracking-normal text-gray-900" style="font-family: 'Source Sans Pro', sans-serif;">
        <!--Nav-->
        <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-800">
            <div class="container flex flex-wrap justify-between items-center mx-auto">
                <a href="{{ route('welcome') }}" class="flex items-center">
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">{{ __('Programming Exercise') }}</span>
                </a>
                <button data-collapse-toggle="mobile-menu" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                    <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <div class="hidden w-full md:block md:w-auto" id="mobile-menu">
                    <ul class="mr-8 flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                        @foreach([['r'=>'welcome','n'=>'Welcome'],
                                ['r'=>'calculator','n'=>'Calculator'],] as $v)
                            <li>
                                <a href="{{ route($v['r']) }}" 
                                    @if(request()->routeIs($v['r']))
                                        class="navactive"
                                    @else
                                        class="navlink"
                                    @endif 
                                >{{ $v['n'] }}</a> 
                            </li>
                        @endforeach 
                    </ul>
                </div>
            </div>
        </nav>

        <!--Main-->
        <div class="container pt-4 mx-auto flex flex-wrap flex-col md:flex-row items-center justify-start">
            <div class="flex flex-col  w-full justify-center">
                <p class="px-12 leading-normal text-base md:text-2xl mb-8 text-center md:text-left slide-in-bottom-subtitle">{{ $slot }}</p>
            </div>
            
            <!--Footer-->
            <div class="w-full pt-8 pb-8 text-sm text-center md:text-left">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </div>
        </div>
    </body>
</html>
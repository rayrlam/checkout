<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ config('app.name', 'Supermarket') }}</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        
        <!-- Font Awesome if you need it
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
        -->
        
        <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
        <!--Replace with your tailwind.css once created-->

        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">

        <style>

            body { font-family: 'Nunito', sans-serif; }
            #items {
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #items td, #items th {
                border: 1px solid #ddd;
                padding: 8px;
                padding-left: 20px;
            }

            #items tr:nth-child(even){background-color: #f2f2f2;}

            #items tr:hover {background-color: #ddd;}

            #items th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #04AA6D;
                color: white;
            }
            .button.cal {
                background-color: #4CAF50;
                border: none;
                color: white;
                padding: 10px 30px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                cursor: pointer;
            }

            hr.hr {
                border-top: 2px solid green;
            }
        </style>

    </head>

    <body class="leading-normal tracking-normal text-gray-900" style="font-family: 'Source Sans Pro', sans-serif;">

        <div>
   
            <!--Main-->
            <div class="container pt-4 mx-auto flex flex-wrap flex-col md:flex-row items-center">
                
                <!--Left Col-->
                <div class="flex flex-col  w-full justify-center">
                    <h1 class="text-3xl md:text-5xl text-purple-800 font-bold leading-tight text-center md:text-left">{{ $header }}</h1>
                    <p class="leading-normal text-base md:text-2xl mb-8 text-center md:text-left slide-in-bottom-subtitle">{{ $slot }}</p>
                </div>
                
                <!--Footer-->
                <div class="w-full pt-8 pb-8 text-sm text-center md:text-left">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </div>
        
            </div>
        </div>

        <!-- jQuery if you need it
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        -->

    </body>
</html>
<x-site>
    <h2 class="font-bold lg:text-3xl text-2xl mt-4 mb-4">
        {{ __('Tasks') }} 
    </h2>

    <div class="mt-4  text-gray-900 dark:text-white">
        <ol class="list-decimal">
            <li class="lg:ml-4">
                Create an Application that connects to MySQL
            </li>
            <li class="lg:ml-4">
                Create an API endpoint that receives: Range Date, Status and Location (The filters are not mandatory) and return invoice's header data + total value
            </li>                                   
            <li class="lg:ml-4">
                <a class="text-green-500 hover:text-blue-500" href="{{route('location')}}">Create an API endpoint that receives: Location ID and return the value sum of the Invoices grouped by status.</a>                                    
            </li>
            <li class="lg:ml-4">
                <a class="text-green-500 hover:text-blue-500" href="{{route('headers')}}">Create a simple list page to show the result of the endpoints</a>
            </li>
            <li class="lg:ml-4">
                <a class="text-green-500 hover:text-blue-500" href="{{route('total_sum')}}">Create a SQL Query to return the total value sum and the total quantity (number of invoice lines) per Invoice</a>
            </li>
        </ol>
    </div>

    <h2 class="text-xl mt-8 font-bold">
        Info
    </h2>

    <div class="mt-4  text-gray-900 dark:text-white">
        <ul class="list-disc">
            <li class="lg:ml-4">
                The structure or the DB with some examples can be find on /dump
            </li>
            <li class="lg:ml-4">
                Use the framework of your preference
            </li>                                   
            <li class="lg:ml-4">
                Pay attention on good practices and design patterns                    
            </li>
            <li class="lg:ml-4">
                Create a simple list page to show the result of the endpoints
            </li>
            <li class="lg:ml-4">
                Zip your code and send back to the recruiter
            </li>
        </ul>
    </div>

    <hr class="hr mt-8 mb-4" />

    <h2 class="text-xl mt-8 font-bold">
        Remarks
    </h2>
    <div class="mt-4   text-gray-900 dark:text-white">
        <ul class="break-all">
            <li class="ml-4">Laravel Installation - <a href="https://laravel.com/docs/9.x/installation" target="_blank" class="text-green-500 hover:text-blue-500">https://laravel.com/docs/9.x/installation</a></li>
            <li class="ml-4">Rename .env.example to .env</li>
            <li class="ml-4">
                Create Database laravel
            </li>

            <li class="mb-4">
<pre class="rounded-lg"><code class="language-php">
/*
** Create by MySQL Command
*/

CREATE DATABASE LARAVEL;
</code></pre> 
            </li>
            <li class="ml-4 mt-4">Run Laravel Command</li>
            <li class="mt-4">       
<pre class="rounded-lg"><code class="language-php">
/*
** Create all tables for this app
*/

php artisan migrate         
</code></pre>
            </li>
            <li class="mt-4">       
<pre class="rounded-lg"><code class="language-php">
/*
** Create the dumpy data for this app
*/

php artisan db:seed --class=DataSeeder       
</code></pre>
            </li>
            <li class="mt-4">       
<pre class="rounded-lg"><code class="language-php">
/*
** Run the CheckoutTest to check for errors
*/

php artisan test       
</code></pre>
            </li>
            <li class="mt-4">       
<pre class="rounded-lg"><code class="language-php">
/*
** Running local server
*/

php artisan serve           
</code></pre>
            </li>
        </ul>
    </div>

    <hr class="hr mt-8 mb-4" />
    
    <h2 class="text-xl font-bold">
        Main Files
    </h2>    
    <ul class="break-all">
        <li class="text-indigo-700">App\Http\Controllers\Api\V1</li>

        <li class="ml-4 mb-4" title="App\Http\Controllers\Api\V1\InvoiceV1Controller">InvoiceV1Controller</li>

        <li class="text-indigo-700">App\Http\Controllers\Api</li>

        <li class="ml-4" title="App\Http\Controllers\Api\InvoiceInterface">InvoiceInterface</li>

        <li class="ml-4" title="App\Http\Controllers\Api\InvoiceLoation">InvoiceLoation</li>

        <li class="ml-4 mb-4" title="App\Http\Controllers\Api\InvoiceHeader">InvoiceHeader</li>

        <li class="text-indigo-700">App\Http\Controllers</li>

        <li class="ml-4 mb-4" title="App\Http\Controllers\FrontendController">FrontendController</li>

        <li class="text-indigo-700">App\Providers</li>

        <li class="ml-4 mb-4" title="App\Providers\ContenServiceProvider">ContenServiceProvider</li>

        <li class="text-indigo-700">Resources\views\components</li>

        <li class="ml-4 mb-4" title="Resources\views\components\tabs">tabs</li>

        <li class="text-indigo-700">Tests\Unit</li>
        <li class="ml-4 mb-4" title="Tests\Unit\InvoiceTest">
            InvoiceTest
        </li>
        <li class="">
            Api Route:
            <li class="ml-4">
                <i class="text-indigo-700" title="api/v1/get_headers">api/v1/get_headers</i>
            </li>
            <li class="ml-4">
                <i class="text-indigo-700" title="api/v1/location_id">api/v1/location_id</i>
            </li> 
        </li>
    </ul>

    <!-- https://github.com/kitchencut/technical_test -->
</x-site>
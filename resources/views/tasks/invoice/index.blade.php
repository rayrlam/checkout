<x-home>
    <x-slot name="title">
        {{ $title ?? null }}
    </x-slot>
    <div class="block mt-3">
        <h3 class="text-xl font-bold dark:text-white">
            {{ __('Invoice') }} 
        </h3>
        <div class="mt-3">
            <ul class="space-y-2 text-gray-500  list-disc list-inside dark:text-gray-400">   
                <li class="md:text-sm text-xs">
                    Create an Application that connects to MySQL
                </li>
                <li class="md:text-sm text-xs">
                    Create an API endpoint that receives: Range Date, Status and Location (The filters are not mandatory) and return invoice's header data + total value
                </li>                                   
                <li class="md:text-sm text-xs">
                    <a class="text-green-500 hover:text-blue-500" href="{{route('tasks.invoice.location')}}">Create an API endpoint that receives: Location ID and return the value sum of the Invoices grouped by status.</a>                                    
                </li>
                <li class="md:text-sm text-xs">
                    <a class="text-green-500 hover:text-blue-500" href="{{route('tasks.invoice.headers')}}">Create a simple list page to show the result of the endpoints</a>
                </li>
                <li class="md:text-sm text-xs">
                    <a class="text-green-500 hover:text-blue-500" href="{{route('tasks.invoice.total')}}">Create a SQL Query to return the total value sum and the total quantity (number of invoice lines) per Invoice</a>
                </li>
            </ul>
        </div>
 
        <h3 class="text-xl font-bold dark:text-white">
            {{ __('Info') }} 
        </h3>

        <div class="mt-3">
            <ul class="space-y-2 text-gray-500  list-disc list-inside dark:text-gray-400">   
                <li class="md:text-sm text-xs">
                    The structure or the DB with some examples can be find on /dump
                </li>
                <li class="md:text-sm text-xs">
                    Use the framework of your preference
                </li>                                   
                <li class="md:text-sm text-xs">
                    Pay attention on good practices and design patterns                    
                </li>
                <li class="md:text-sm text-xs">
                    Create a simple list page to show the result of the endpoints
                </li>
                <li class="md:text-sm text-xs">
                    Zip your code and send back to the recruiter
                </li>
            </ul>
        </div>

        <hr class="hr mt-8 mb-4" />

        @include('components.setup')
    
        <h4 class="text-base font-bold dark:text-white mt-3">
            {{ __('Main Files') }} 
        </h4>

        <ul class="space-y-4 text-gray-500  list-inside dark:text-gray-400">  
            <li class="text-indigo-700 text-xs">
                App\Http\Controllers\Invoice\Api\V1
                <div class="ps-5">
                    - InvoiceV1Controller
                </div>
            </li>
            <li class="text-indigo-700 text-xs">
                App\Http\Controllers\Invoice\Api
                <div class="ps-5">
                    - InvoiceInterface<br>
                    - InvoiceLoation<br>
                    - InvoiceHeader<br>
                    - Invoice
                </div>
            </li>
            <li class="text-indigo-700 text-xs">
                App\Http\Controllers\Invoice
                <div class="ps-5">
                    - FrontendController
                </div>
            </li>
            <li class="text-indigo-700 text-xs">
                Tests\Unit
                <div class="ps-5">
                    - InvoiceTest
                </div>
            </li>
            <li class="text-indigo-700 text-xs">
                Api Route:
                <div class="ps-5">
                    - api/v1/get_headers<br>
                    - api/v1/location_id
                </div>
            </li>
        </ul>
    </div>

    <!-- https://github.com/kitchencut/technical_test -->
</x-home>
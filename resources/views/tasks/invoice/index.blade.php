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

        <h3 class="text-xl font-bold dark:text-white">
            {{ __('Remarks') }} 
        </h3>

        <h4 class="text-xl font-bold dark:text-white mt-6">
            {{ __('Setup') }} 
        </h4>

        <h5 class="text-base font-bold dark:text-white">
            {{ __('Prerequisites') }} 
        </h5>

        <p class="mb-3 text-xs text-gray-500 md:text-sm dark:text-gray-400">
            - Docker<br>
            - Docker Compose<br>
            - PHP >= 8.2<br>
            - Composer
        </p>

        <h5 class="text-base font-bold dark:text-white">
            {{ __('Installation') }} 
        </h5>
        
        <ol class="space-y-4 text-gray-500  list-disc list-inside dark:text-gray-400">
            <li class="md:text-sm text-xs">
                Clone the main repository: 
                <a href="https://github.com/rayrlam/checkout.git" target="_blank" class="text-blue-600 dark:text-blue-500 hover:underline flex items-center ps-5">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z" clip-rule="evenodd"/>
                    </svg>
                    <span class="ml-1">
                        https://github.com/rayrlam/checkout.git
                    <span>
                </a>
                <div class="code-block mt-3">
                    <pre class="code-block-content">
cd checkout
                    </pre>
                </div>
            </li>
            <li class="md:text-sm text-xs">
                Copy the example environment file:
                <div class="code-block">
                    <pre class="code-block-content">
cp .env.example .env
                    </pre>
                </div>
            </li>
            <li class="md:text-sm text-xs">
                Install Composer dependencies using Laravel Sail:
                    <div class="code-block">
                    <pre class="code-block-content">
composer require laravel/sail --dev
php artisan sail:install

                    </pre>
                </div>
            </li>
            <li class="md:text-sm text-xs">
                Start the Docker containers:
                <div class="code-block">
                    <pre class="code-block-content">
./vendor/bin/sail up -d
                    </pre>
                </div>
            </li>
            <li class="md:text-sm text-xs">
                Generate application key:
                <div class="code-block">
                    <pre class="code-block-content">
./vendor/bin/sail artisan key:generate
                    </pre>
                </div>
            </li>
            <li class="md:text-sm text-xs">
                Run database migrations:
                <div class="code-block">
                    <pre class="code-block-content">
./vendor/bin/sail artisan migrate
                    </pre>
                </div>
            </li>
            <li class="md:text-sm text-xs">
                Run the Seeder:
                <div class="code-block">
                    <pre class="code-block-content">
./vendor/bin/sail artisan db:seed
                    </pre>
                </div>
            </li>
            <li class="md:text-sm text-xs">
                Install NPM dependencies and build assets:
                <div class="code-block">
                    <pre class="code-block-content">
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
                    </pre>
                </div>
            </li>
            <li class="md:text-sm text-xs">
                Set up Laravel Dusk:
                <div class="code-block">
                    <pre class="code-block-content">
composer require laravel/dusk --dev
./vendor/bin/sail artisan dusk:install
./vendor/bin/sail dusk:chrome-driver

## To get started with Laravel Dusk, uncomment the Selenium service in your application's docker-compose.yml file:
selenium:
image: 'selenium/standalone-chrome'
extra_hosts:
    - 'host.docker.internal:host-gateway'
volumes:
    - '/dev/shm:/dev/shm'
networks:
    - sail

## Next, ensure that the laravel.test service in your application's docker-compose.yml file has a depends_on entry for selenium:
depends_on:
- mysql
- redis
- selenium

                    </pre>
                </div>
            </li>
            <li class="md:text-sm text-xs">
                Development - To start the development server:
                <div class="code-block">
                    <pre class="code-block-content">
./vendor/bin/sail up -d

### To compile assets:
./vendor/bin/sail npm run dev
                    </pre>
                </div>
            </li>
            <li class="md:text-sm text-xs">
                Running Tests
                <div class="code-block">
                    <pre class="code-block-content">
### PHPUnit - Run PHPUnit tests with:
./vendor/bin/sail test

### Laravel Dusk - To run Laravel Dusk tests:
./vendor/bin/sail dusk
                    </pre>
                </div>
            </li>
        </ol>

    
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
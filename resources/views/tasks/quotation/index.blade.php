<x-home>
    <x-slot name="title">
        Quotation
    </x-slot>
    <div class="block">
        <h3 class="text-xl font-bold dark:text-white">
            {{ __('Quotation') }} 
        </h3>
                
        <p class="mb-3 text-gray-500 text-base dark:text-gray-400">
            If you are reasonably familiar with Laravel, this task should take approximately 3 hours (but don't worry if it takes more or less time than that).
        </p>
        
        <p class="text-gray-500 dark:text-gray-400 md:text-sm text-xs">
            Create a Laravel project for an API endpoint using DRY and SOLID object-oriented PHP. The endpoint should accept a JSON payload containing the following fields: age, postcode, regNo. For example, the body of the request might look like this:
        </p>

        <div class="code-block mt-3 mb-3">
            <pre class="code-block-content">
{
    "age": 20,
    "postcode": "PE3 8AF",
    "regNo": "PJ63 LXR"
}
            </pre>
        </div>
         
        <p class="text-gray-500 dark:text-gray-400 md:text-sm text-xs mb-3">
            Your code should make a call to a third party API to look up the vehicle registration number and return an ABI code. Note this does not need to be a real API call - you can mock the response, but still show an example of how you could go about connecting to a third party API.
        </p>
        <p class="text-gray-500 dark:text-gray-400 md:text-sm text-xs mb-3">
            Use the attached quotation.sql to create a MySQL database which contains rating factors for various ages, postcode areas, and vehicle ABI codes. When a request hits your API, it should start with a base premium of £500 (this can be hard-coded), then find the rating factors to apply for age, postcode area, and ABI code (assume a rating factor of 1 if the value is not in the database). Multiply the premium by each rating factor in turn to obtain a total premium and return an appropriate JSON response. 
        </p>
        <p class="text-gray-500 dark:text-gray-400 md:text-sm text-xs mb-3">   
            Please write the code in such a way that the quoting engine could be used with a different set of rating factors - for example, to allow re-use of the quoting engine with a different insurance product that uses additional or different rating factors, without breaking the existing implementation (bear in mind the open/closed principle here).
        </p>    

        <h3 class="text-xl font-bold dark:text-white">
            {{ __('What we are looking for:') }} 
        </h3>
  
        <ul class="space-y-2 text-gray-500  list-disc list-inside dark:text-gray-400">   
            <li class="md:text-sm text-xs">
                SOLID principles observed
            </li>
            <li class="md:text-sm text-xs">
                Good separation of concerns (especially between controller and model layers)
            </li>
            <li class="md:text-sm text-xs">
                No security vulnerabilities
            </li>
            <li class="md:text-sm text-xs">
                Code should be executable (no mis-typed variable names, missing use statements, etc.)
            </li>
        </ul>

        <h4 class="text-xl font-bold dark:text-white mt-3">
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
./vendor/bin/sail artisan db:seed --class=QuotationSeeder
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
            <li class="md:text-sm text-xs">
                Development - To start the development server:
                <div class="code-block">
                    <pre class="code-block-content">
./vendor/bin/sail up

### To compile assets:
./vendor/bin/sail npm run dev
                    </pre>
                </div>
            </li>
        </ol>
    
        <h4 class="text-base font-bold dark:text-white mt-3">
            {{ __('Main Files') }} 
        </h4>

        <ul class="space-y-4 text-gray-500  list-inside dark:text-gray-400">  
       
            <li class="text-indigo-700 text-xs">
                App\Http\Controllers\Quotation\Api\V1
                <div class="ps-5">
                    - Controller: QuoteV1Controller<br>
                    - Other Classes: Calculator, QuoteRepository
                </div>
            </li>
            <li class="text-indigo-700 text-xs">
                App\Http\Controllers\Quotation\Api\V1\RatingFactor
                <div class="ps-5">
                    - Interface: RatingFactorInterface<br>
                    - Rating Factor Classes: Abicode, Age, Postcode, Premium
                </div>
            </li>
            <li class="text-indigo-700 text-xs">
                App\Helper
                <div class="ps-5">
                    - QuoteHelper
                </div>
            </li>
            <li class="text-indigo-700 text-xs">
                Tests\Unit
                <div class="ps-5">
                    - QuotationTest
                </div>
            </li>
        </ul>
    </div>    
</x-home>
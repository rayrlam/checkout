<x-home>
    <x-slot name="title">
        {{ $title ?? null }}
    </x-slot>
    <div class="block mt-3">
        <h3 class="text-xl font-bold dark:text-white">
            {{ __('Checkout') }} 
        </h3>
                
        <p class="mb-3 text-gray-500 text-base dark:text-gray-400">
            Written in the PHP programming language, implement the code for a supermarket checkout that calculates the total price of a number of items
        </p>

        <p class="text-gray-500 dark:text-gray-400 md:text-sm text-xs">
            In a normal supermarket, items for sale are identified using Stock Keeping Units, or ‘SKUs’. In our store, we’ll use individual letters of the alphabet (A, B, C, and so on) to represent these SKUs. Our goods are priced individually, however, some items are 
            multi-priced: buy <b>n</b> of them, and they’ll cost you <b>y</b> instead. 
        </p>

        <p class="text-gray-500 dark:text-gray-400 md:text-sm text-xs">
            For example, item ‘A’ might cost <b>£0.50</b> individually, but this week we have a special offer: buy three ‘A’s and they’ll cost you <b>£1.30</b>. 
        </p>

        <p class="text-gray-500 dark:text-gray-400 mt-3 md:text-sm text-xs">
            Below is a table of the prices of this week.
        </p>
    
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
            <table class="w-full text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Item
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Unit Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Special Price
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($rules as $index => $rule)
                        <tr 
                            class="
                                @if($index%2 ==0)
                                    bg-white dark:bg-gray-900  border-b dark:border-gray-700
                                @else
                                    bg-gray-50 dark:bg-gray-800 border-b dark:border-gray-700
                                @endif
                            ">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-xs">
                                {{ $rule[0] }}
                            </th>
                            <td class="px-6 py-4 text-xs">
                                {{ $rule[1] }}
                            </td>
                            <td class="px-6 py-4 text-xs">
                                @if(is_null($rule[2]))
                                    &nbsp;
                                @else
                                    {!! str_replace('::','<br>',$rule[2]) !!}
                                @endif
                            </td>
                        </tr>
                    @endforeach                        
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            <h3 class="text-xl font-bold dark:text-white">
                Notes
            </h3>
            <ul class="space-y-2 text-gray-500  list-disc list-inside dark:text-gray-400">   
                <li class="md:text-sm text-xs">
                    The price calculated for any quantity of an SKU with multiple special prices will be the cheapest combination of its special prices. For example: 
                    If you buy 5 ‘C’s you would get <b>2 for 38 + 3 for 50</b>. If you buy 4 ‘C’s you would get <b>3 for 50 + 1 for 20</b> rather than <b>2 for 38 + 2 for 38</b>.
                </li>
                <li class="md:text-sm text-xs">
                    For every ‘D’ purchased, if there is also an ‘A’ purchased, it will cost <b>5</b> instead of <b>15</b>. For example, if you buy <b>10</b> ‘D’s and <b>6</b> ‘A’s, <b>6</b> 
                    of the ‘D’s will cost <b>5 each</b> whilst the other <b>4</b> will cost <b>15 each</b>.
                </li>
            </ul>
        </div>

        <div class="mt-3">
            <p class="mt-3 mb-2 font-medium text-gray-700 dark:text-white md:text-sm text-xs">                        
                This exercise will be used to gauge how you approach a software engineering problem - the processes you use, the quality of your code and the robustness of your solution.
            </p>

            <ul class="space-y-2 text-gray-500  list-disc list-inside dark:text-gray-400">   
                <li class="md:text-sm text-xs">
                    <b>DO</b> use as many or as few technologies and processes as you normally would when working as a Software Engineer

                    <ul class="pl-5 mt-2 space-y-1 list-disc list-inside pl-[revert]">
                        <li class="md:text-sm text-xs">
                            Feel free to write tests, use version control and rely on the tools provided by the IDE.
                        </li>
                    </ul>
                </li>
               <li class="md:text-sm text-xs">
                    <b>DON’T</b> get hung up on the specifics of the implementation
                    <ul class="pl-5 mt-2 space-y-1 list-disc list-inside pl-[revert]">
                        <li class="md:text-sm text-xs">
                            The problem is intentionally abstract, giving you the freedom to come up with your own unique solution.
                        </li>
                        <li class="md:text-sm text-xs">
                            This is an opportunity to demonstrate your way of working and your approach to creative problem solving – there are no precise user requirements (aside from the specification above).
                        </li>
                    </ul>
                </li>
                <li class="md:text-sm text-xs">
                    This exercise will last approximately <b>1.5 hours</b>
                </li>
            </ul>
        </div>
    
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
            <li class="md:text-sm text-xs">
                User Account Setup:
                <div class="code-block">
                    <pre class="code-block-content">
### The DataSeeder has created a default user account. You can use these credentials to log in:
# Email: johndoe@example.com
# Password: 12345678

### Alternatively, you can register a new account by visiting the <a href="/register" class="text-blue-600 dark:text-blue-500 hover:underline">/register</a> route in your browser.

### After sign in, you can 
# Create new item at Create Item page
# Create new rule at Create Rule page
                    </pre>
                </div>
            </li>
        </ol>

        <h4 class="text-base font-bold dark:text-white mt-3">
            {{ __('Main Files') }} 
        </h4>

        <ul class="space-y-4 text-gray-500  list-inside dark:text-gray-400">  
            <li class="text-indigo-700 text-xs">
                App\Http\Controllers\Checkout
                <div class="ps-5">
                    - CheckoutController
                </div>
            </li>
            <li class="text-indigo-700 text-xs">
                App\Helpers
                <div class="ps-5">
                    - CheckoutHelper
                </div>
            </li>
            <li class="text-indigo-700 text-xs">
                App\database\seeders
                <div class="ps-5">
                    - DataSeeder
                </div>
            </li>
            <li class="text-indigo-700 text-xs">
                Tests\Unit
                <div class="ps-5">
                    - ChekcoutTest
                </div>
            </li>
            <li class="text-indigo-700 text-xs">
                Tests\Browser\Checkout
                <div class="ps-5">
                    - RegistrationTest
                </div>
            </li>
            <li class="text-indigo-700 text-xs">
                App\Models\Checkout
                <div class="ps-5">
                    - Item<br>
                    - Rule
                </div>
            </li>                       
        </ul>  
    </div>        
</x-home>    
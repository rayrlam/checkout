<x-home>
    <x-slot name="title">
        {{ $title ?? null }}
    </x-slot>
 
    <div class="block mt-3">        
        <h3 class="text-xl font-bold dark:text-white">
            {{ __('Category') }}
        </h3>
 
        <p class="mb-3 text-gray-500 md:text-sm text-xs dark:text-gray-400">
            Imagine we have a database table of category information as per the below. This shows categories in 
            a hierarchical structure indicated by a parent_id. I.e. a category with a parent_id of 1 is a sub-category of Clothing, whereas a category with a parent_id of 5 is a sub-category of Men. Any 
            category with a sub-category of 0 is a top level category.
        </p>
 
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
            <table class="w-full text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Id</th>
                    <th scope="col" class="px-6 py-3">Parent id</th>
                    <th scope="col" class="px-6 py-3">Name</th>
                </tr>
                <tbody>
                    @foreach($list as $index => $v)
                        <tr 
                            class="
                                @if($index%2 ==0)
                                    bg-white dark:bg-gray-900  border-b dark:border-gray-700
                                @else
                                    bg-gray-50 dark:bg-gray-800 border-b dark:border-gray-700
                                @endif
                        ">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-xs">
                                {{ $v->id}}
                            </th>
                            <td class="px-6 py-4 text-xs">{{ $v->parent_id }}</td>
                            <td class="px-6 py-4 text-xs">{{ $v->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <p class="mt-6 mb-3 text-gray-500 md:text-sm text-xs dark:text-gray-400">
            We would like you to create a function that produces a category breadcrumb. This function should 
            use parameters for the required category id and the separator.
        </p>

        <p class="mb-3 text-gray-500 md:text-sm text-xs dark:text-gray-400">
            For example. If I supplied 8 as the category id and ‘>’ as the separator I would expect the result to be:
        </p>

        <p class="mb-3 text-gray-500 md:text-sm text-xs dark:text-gray-400">
            <x-breadcrumb :breadcrumbs="$breadcrumbs['0']" /> 
        </p>

        <p class="mt-3 mb-3 text-gray-500 md:text-sm text-xs dark:text-gray-400">
            If I supplied 5 as the category id and ‘/’ as the separator I would expect the result to be:
        </p>

        <p class="mb-3 text-gray-500 md:text-sm text-xs dark:text-gray-400">
            <x-breadcrumb :breadcrumbs="$breadcrumbs['1']" />
        </p>

        <p class="mt-3 mb-3 text-gray-500 md:text-sm text-xs dark:text-gray-400">
            For the purposes of this exercise assume you have a function called getCategory($id) available to 
            supply you with an array of the category values when the category id is passed in.
        </p>

        <p>
            For example: getCategory(8) would return
        </p>

        <div class="code-block mt-3">
            <pre class="code-block-content">
Array(
    'id' => 8,
    'parent_id' => 5,
    'name' => 'T-Shirts'
)
            </pre>
        </div>

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
                App\Http\Controllers\Category
                <div class="ps-5">
                    - CategoryController
                </div>
            </li>
            <li class="text-indigo-700 text-xs">
                App\Repositories
                <div class="ps-5">
                    - CategoryRepository
                </div>
            </li>
            <li class="text-indigo-700 text-xs">
                App\Helpers
                <div class="ps-5">
                    - BreadcrumbHelper
                </div>
            </li>
            <li class="text-indigo-700 text-xs">
                Resources\views\components
                <div class="ps-5">
                    - breadcrumb
                </div>
            </li>
            <li class="text-indigo-700 text-xs">
                Tests\Unit
                <div class="ps-5">
                    - CategoryTest
                </div>
            </li>
            <li class="text-indigo-700 text-xs">
                Views:
                <div class="ps-5">
                    - 
                    <a href="{{ route('tasks.category.index') }}" class="text-green-500 hover:text-blue-500">
                        Index
                    </a><br>
                    - 
                    <a href="{{ route('tasks.category.breadcrumb') }}" class="text-green-500 hover:text-blue-500">
                        Breadcrumb
                    </a><br>
                    - 
                    <a href="{{ route('tasks.category.categories') }}" class="text-green-500 hover:text-blue-500">
                        Categories
                    </a>
                </div>
            </li>
        </ul>  
    </div>
</x-home>    
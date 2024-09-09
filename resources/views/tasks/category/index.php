<x-home>
    <div class="p-8 w-full bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <div class="flex" style="justify-content:space-between; align-items:baseline">
            <h2 class="font-bold lg:text-3xl text-2xl mt-4 mb-4">
                {{ __('Category') }}
            </h2>
        </div>  
        <div class="text-xl mt-4  text-gray-900 dark:text-white">
            <p>
                Imagine we have a database table of category information as per the below. This shows categories in 
                a hierarchical structure indicated by a parent_id. I.e. a category with a parent_id of 1 is a sub-category of Clothing, whereas a category with a parent_id of 5 is a sub-category of Men. Any 
                category with a sub-category of 0 is a top level category.
            </p>
        </div>
        <div class="mt-4">
            <table id="items">
                <tr>
                    <th>id</th>
                    <th>parent_id</th>
                    <th>name</th>
                </tr>
                @foreach($list as $v)
                <tr>
                    <td>{{ $v->id}}</td>
                    <td>{{ $v->parent_id }}</td>
                    <td>{{ $v->name }}</td>
                </tr>
                @endforeach
            </table>
        </div>
        
        <div class="mt-4">
            <div class="text-xl mt-4  text-gray-900 dark:text-white">
                <p> 
                    We would like you to create a function that produces a category breadcrumb. This function should 
                    use parameters for the required category id and the separator.
                </p>
                <p class="mt-4 mb-4">
                    For example. If I supplied 8 as the category id and ‘>’ as the separator I would expect the result to be:
                </p>
                <p class="mb-4">  
                    <x-breadcrumb :breadcrumbs="$breadcrumbs['0']" /> 
                </p>
                <p class="mb-4 mt-4">
                    If I supplied 5 as the category id and ‘/’ as the separator I would expect the result to be:
                </p>
                <p class="mb-4">  
                    <x-breadcrumb :breadcrumbs="$breadcrumbs['1']" />
                </p>
                <p class="mb-4 mt-4">
                    For the purposes of this exercise assume you have a function called getCategory($id) available to 
                    supply you with an array of the category values when the category id is passed in.
                </p>

                <p>
                    For example: getCategory(8) would return
                </p>
<pre class="rounded-lg"><code class="language-javascript">
Array(
    'id' => 8,
    'parent_id' => 5,
    'name' => 'T-Shirts'
)
</code></pre>        
                </p>
            </div>
        </div>
        <div class="mt-12 mb-8">
            <hr class="hr" />
        </div>
        <div class="text-xl text-gray-900 dark:text-white">
            <h2 class="text-xl font-bold">Setup Information</h2>
        </div>
        <div class="text-xl mt-4  text-gray-900 dark:text-white">
            <ul>
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
                <li class="mt-8">
                    Main Files
                </li>    
                <li class="text-indigo-700">App\Http\Controllers</li>
                <li class="ml-4 pb-4" title="App\Http\Controllers\CategoryController">CategoryController</li>
                <li class="text-indigo-700">App\Repositories</li>
                <li class="ml-4 pb-4" title="App\Repositories\CategoryRepository">CategoryRepository</li>
                <li class="text-indigo-700">App\Helpers</li>
                <li class="ml-4 pb-4" title="App\Helpers\BreadcrumbHelper">BreadcrumbHelper</li>
                <li class="text-indigo-700">Resources\views\components</li>
                <li class="ml-4 pb-4" title="Resources\views\components\breadcrumb">breadcrumb</li>
                <li class="text-indigo-700">App\database\seeders</li>
                <li class="ml-4 pb-4" title="App\database\seeders\DataSeeder">DataSeeder</li>
                <li class="text-indigo-700">Tests\Browser</li>
                <li class="ml-4 pb-4" title="Tests\Browser\CategoryTest">CategoryTest</li>
                <li class="text-indigo-700">App\Models</li>
                <li class="ml-4 pb-4" title=" App\Models\Category">Category</li>
                    <ul>
                        <li>
                            Views
                            <ul>
                                <li class="ml-4">
                                    <a href=" " class="text-green-500 hover:text-blue-500">
                                        Index
                                    </a>
                                </li>
                                <li class="ml-4">
                                    <a href=" " class="text-green-500 hover:text-blue-500">
                                        Breadcrumb
                                    </a>
                                </li>
                                <li class="ml-4">
                                    <a href=" " class="text-green-500 hover:text-blue-500">
                                        Categories
                                    </a>
                                </li>
                            </ul> 
                        </li>
                    </ul>
                </li>
            </ul>  
        </div>
    </div>
</x-home>    
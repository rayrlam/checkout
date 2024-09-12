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

        @include('components.setup')

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
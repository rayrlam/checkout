<x-home>
    <x-slot name="title">
        {{ $title ?? null }}
    </x-slot>
 
   <div class="block">  
       <h3 class="text-lg font-bold dark:text-white">
            {{ __('Breadcrumb') }}
        </h3>
        <form method="post" action="{{route('tasks.category.breadcrumbs')}}">
            @csrf
            <div class="bg-white">
                <div class="p-2 md:p-4">
                    <label for="id" class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Select Category</label>
                    <select id="id" name="id" class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                        @foreach($list as $category)
                            <option value={{ $category->id }}>{{ $category->name }}</option>
                        @endforeach    
                    </select>

                    <div class="mt-3">
                        <label for="separator" class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Small input</label>
                        <input type="text" id="separator" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value=">">
                    </div>

                    <p class="mt-3 block text-xs font-medium text-gray-900 dark:text-white">Breadcrumb</p>
                    <input type="radio" name="show" value="1" checked="true">
                    <label class="mr-8 text-xs">With Url</label>
                    <input type="radio" name="show" value="0">
                    <label class="text-xs">Without Url</label>
                </div>

                <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
                    <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-3 py-1.5 text-center text-xs" type="submit">
                        Create
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-home>
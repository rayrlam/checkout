<x-category-layout>
    
    <div class="p-8 w-full bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <div class="flex" style="justify-content:space-between; align-items:baseline">
            <h2 class="font-bold lg:text-3xl text-2xl mt-4 mb-4">
                {{ __('Breadcrumb') }} 
            </h2>
        </div>    
        <div class="mt-4">
            <form method="post" action="{{route('breadcrumbs')}}">
                @csrf
                <div class="bg-white">
                    <div class="p-6 md:p-10">
                        <div class="">
                            <p>Category Id</p>
                            <input style="border: 1px solid #c2c2c2; padding:8px 20px; margin-bottom:10px" class="form-input rounded-md shadow-sm mt-1 block w-full" name="id" placeholder="Category Id" type="text" value="8">
                        </div>
                        <div class="mt-8">
                            <p>Separator</p>
                            <input style="border: 1px solid #c2c2c2; padding:8px 20px; margin-bottom:10px" class="form-input rounded-md shadow-sm mt-1 block w-full" name="sep" placeholder="Separator" type="text" value=">">
                        </div>

                            <p class="mt-8">Breadcrumb</p>
                            <input type="radio" name="show" value="1" checked="true">
                            <label class="mr-8">With Url</label>
                            <input type="radio" name="show" value="0">
                            <label>Without Url</label>
                        </div>

                    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
                        <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center" type="submit">
                            Create
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-category-layout>
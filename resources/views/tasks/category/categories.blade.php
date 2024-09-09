<x-category-layout>
    <div class="p-8 w-full bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <div class="flex" style="justify-content:space-between; align-items:baseline">
            <h2 class="font-bold lg:text-3xl text-2xl mt-4 mb-4">
                {{ __('Categories') }}
            </h2>
        </div>  

        <div class="">
            <h4>List Data By Parent Id {{ $id }}</h4>    
            <div class="mt-4">
                <table id="items">
                    <tr>
                        <th>id</th>
                        <th>parent_id</th>
                        <th style="min-width:200px">name</th>
                    </tr>
                    @forelse($categories as $c)
                    <tr>
                        <td>
                            {{ $c->id }}
                        </td>
                        <td>
                            {{ $c->parent_id }}
                        </td>
                        <td>
                            {{ $c->name }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">Category Not Found</td>
                    </tr>
                    @endforelse    
                </table>
            </div>
        </div>

        <form class="ml-4 mt-8" method="post" action="{{route('categories')}}">
            @csrf
            <p class="mt-6 mb-2">
                Category Parent Id
            </p>
            <select name="id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach($pid as $p)
                    <option value="{{ $p->parent_id }}">{{ $p->parent_id }}</option>
                @endforeach
            </select>
            <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
                <button type="submit" class="mt-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </div>
        </form>
    </div>
</x-category-layout>
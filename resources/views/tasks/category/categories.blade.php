<x-home>
    <x-slot name="title">
        {{ $title ?? null }}
    </x-slot>
    <div class="block">  
       <h3 class="text-lg font-bold dark:text-white">
            {{ __('Categories') }}
        </h3>
 
        <p class="text-xs">List Data By Parent Id: {{ $id }}</p>    
        <div class="mt-4">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
                <table id="items" class="w-full text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center">
                                Id
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Parent Id
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Name
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $index => $c)
                            <tr 
                                class="
                                    @if($index%2 ==0)
                                        bg-white dark:bg-gray-900  border-b dark:border-gray-700
                                    @else
                                        bg-gray-50 dark:bg-gray-800 border-b dark:border-gray-700
                                    @endif
                                ">
                                <th scope="row" class="text-center px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white text-xs">
                                    {{ $c->id }}
                                </td>
                                <td class="text-center px-6 py-2 text-xs">
                                    {{ $c->parent_id }}
                                </td>
                                <td class="text-center px-6 py-2 text-xs">
                                    {{ $c->name }}
                                </td>
                            </tr>
                        @empty
                            <tr class="bg-white dark:bg-gray-900  border-b dark:border-gray-700">
                                <td colspan="3" class="p-2 text-xs">Category Not Found</td>
                            </tr>
                        @endforelse    
                    </tbody>
                </table>
            </div>
        </div>

        <form class="ml-4 mt-8" method="post" action="{{route('tasks.category.categories')}}">
            @csrf
            <p class="mt-6 mb-2 text-xs">
                Category Parent Id
            </p>
            <select name="id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach($pid as $p)
                    <option value="{{ $p->parent_id }}">{{ $p->parent_id }}</option>
                @endforeach
            </select>

            <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-3 py-1.5 text-center">
                    Submit
                </button>
            </div>
        </form>
    </div>
</x-home>
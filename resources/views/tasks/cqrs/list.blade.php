<x-home>
   <x-slot name="title">
        {{ $title ?? null }}
    </x-slot>

    <div class="block w-full overflow-x-auto shadow-md sm:rounded-lg mt-4">
        <h2 class="font-bold text-lg mt-4 mb-4 ml-4">
            {{ __('Products')  }}  
        </h2>
  
        <table id="items" class="w-full text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Price</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $index => $v)
                   <tr 
                        class="
                            @if($index%2 ==0)
                                bg-white dark:bg-gray-900  border-b dark:border-gray-700
                            @else
                                bg-gray-50 dark:bg-gray-800 border-b dark:border-gray-700
                            @endif
                    ">
                        <th scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white text-xs">
                            <a href="{{  route('tasks.cqrs.show', $v->id) }}">{{ $v->name }}</a>
                        </th>
                        <td class="px-6 py-2 text-xs">
                            {{ $v->price }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="px-6 py-2 text-xs text-center" colspan="2">No Record</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-home>
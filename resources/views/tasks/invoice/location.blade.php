<x-home>
   <x-slot name="title">
        {{ $title ?? null }}
    </x-slot>

    <div class="block w-full overflow-x-auto shadow-md sm:rounded-lg mt-4">
        <h2 class="font-bold text-lg mt-4 mb-4 ml-4">
            {{ __('Location')  }}  
        </h2>
  
        <table id="items" class="w-full text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3">Total</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $index => $v)
                   <tr 
                        class="
                            @if($index%2 ==0)
                                bg-white dark:bg-gray-900  border-b dark:border-gray-700
                            @else
                                bg-gray-50 dark:bg-gray-800 border-b dark:border-gray-700
                            @endif
                    ">
                        <th scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white text-xs">
                            {{ $v->status }}
                        </th>
                        <td class="px-6 py-2 text-xs">
                            {{ $v->total_value }}
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

    <div class="mt-3 block w-full">
        <form class="ml-4 mt-8" method="post" action="{{route('tasks.invoice.location')}}">
            @csrf
            <p class="mt-6 mb-2 text-sm">
                Location
            </p>
            <select id="location" name="location_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="0"> - </option>
                <option value="1">LOCATION 001</option>
                <option value="2">LOCATION 002</option>
            </select>
            <button type="submit" class="mt-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>  
    </div>
</x-home>
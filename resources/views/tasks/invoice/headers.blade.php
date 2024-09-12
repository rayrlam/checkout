<x-home>
    <x-slot name="title">
        {{ $title ?? null }}
    </x-slot>
    
    <div class="block overflow-x-auto shadow-md sm:rounded-lg mt-4">
        <h2 class="font-bold text-lg mt-4 mb-4 ml-4">
            {{ __('Headers')  }}  
        </h2>
        
        <table id="items" class="w-full text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Id</th>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Date</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3">Total Value</th>
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
                            {{ $v->id }}
                        </th>
                        <td class="px-6 py-2 text-xs">
                            {{ $v->name }}
                        </td>
                        <td class="px-6 py-2 text-xs">
                            {{ $v->date }}
                        </td>
                        <td class="px-6 py-2 text-xs">
                            {{ $v->status }}
                        </td>
                        <td class="px-6 py-2 text-xs">
                            {{ $v->total_value }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="px-6 py-2 text-xs text-center" colspan="5">No Record</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3 block w-full">
        <form class="ml-4 mt-8" method="post" action="{{route('tasks.invoice.headers')}}">
            @csrf
            <p class="mb-2 text-sm">
                Range Date
            </p>
            <div date-rangepicker class="flex items-center">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input name="start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start">
                </div>
                <span class="mx-4 text-gray-500">to</span>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input name="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date end">
                </div>
            </div>

            <p class="mt-6 mb-2 text-sm">
                Status
            </p>
            <select id="status" name="status" class="w-60 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="0"> - </option>    
                <option value="draft">draft</option>
                <option value="open">open</option>
                <option value="processed">processed</option>
            </select>

            <p class="mt-6 mb-2 text-sm">
                Location
            </p>
            <select id="location" name="location" class="w-60 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="0"> - </option>
                <option value="LOCATION 001">LOCATION 001</option>
                <option value="LOCATION 002">LOCATION 002</option>
            </select>
            <button type="submit" class="mt-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>    
    </div>
</x-home>
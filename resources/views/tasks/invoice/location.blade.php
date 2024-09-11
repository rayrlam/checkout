<x-home>
    <h2 class="font-bold lg:text-3xl text-2xl mt-4 mb-4">
        {{ __('Location')  }}  
    </h2>
    <div class="mt-4 w-full text-gray-900 dark:text-white">
        <table id="items">
            <tr>
                <th>Status</th>
                <th>Total Value</th>
            </tr>
            @forelse($data as $v)
            <tr>
                <td>{{ $v->status }}</td>
                <td>{{ $v->total_value }}</td>
            </tr>
            @empty
            <tr>
                <td class="text-center" colspan="2">No Record</td>
            </tr>
            @endforelse
        </table>
    </div>

    <form class="ml-4 mt-8" method="post" action="{{route('tasks.invoice.location')}}">
        @csrf
        <p class="mt-6 mb-2">
            Location
        </p>
        <select id="location" name="location_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="0"> - </option>
            <option value="1">LOCATION 001</option>
            <option value="2">LOCATION 002</option>
        </select>
        <button type="submit" class="mt-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>

    </form>  
</x-home>
<x-home>
    <h2 class="font-bold lg:text-3xl text-2xl mt-4 mb-4">
        {{ __('Total')  }} 
    </h2>
    <div class="mt-4 w-full text-gray-900 dark:text-white">
        <table id="items">
            <tr>
                <th>Total Value</th>
                <th>Quantity</th>
            </tr>
            @forelse($data as $v)
            <tr>
                <td>{{ $v->total_value }}</td>
                <td>{{ $v->quantity }}</td>
            </tr>
            @empty
            <tr>
                <td class="text-center" colspan="2">No Record</td>
            </tr>
            @endforelse
        </table>
    </div>
</x-home>
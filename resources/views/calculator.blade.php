<x-supermarket-layout>
    <div class="p-8 w-full bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <div class="flex" style="justify-content:space-between; align-items:baseline">
            <h2 class="font-bold lg:text-3xl text-2xl mt-4 mb-4">
                {{ __('Calculator') }} 
            </h2>
        </div>
       
        <div class="mt-4">
            <form method="post" action="{{route('cal')}}">
                        @csrf
                <table id="items" style="margin:auto;margin-bottom:20px">
                    <tr>
                        <th>Item</th>
                        <th>Unit Price</th>
                        <th>Qty</th>
                    </tr>
                    @foreach($items as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->unitprice }}</td>
                        <td>
                            <div>
                                <input name="items[{{ $item->id }}]" type="text"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Qty">
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="2">Total Amount</td>
                        <td>
                            @if($s = Session::get('total'))
                                {{ $s }}
                            @else
                                {{ $total }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="padding-top:20px;">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Go</button>
                        </td>
                    </tr>
                </table>
            </form>    
        </div>
        <div class="mt-8">    
            <div class="text-gray-900 dark:text-white">
                <table id="items" style="margin:auto;">
                    <tr>
                        <th>Rules</th>
                        <th>Special Price</th>
                    </tr>
                    <tr>
                        <td>A</td>
                        <td>3 for 130</td>
                    </tr>
                    <tr>
                        <td>B</td>
                        <td>2 for 45</td>
                    </tr>
                    <tr>
                        <td>C</td>
                        <td>2 for 38<br/>3 for 50</td>
                    </tr>
                    <tr>
                        <td>D</td>
                        <td>5 if purchased with an ‘A’</td>
                    </tr>
                </table>
            </div>
            <h2 class="text-xl font-bold mt-4">
                Examples
            <h2>
            <div class="text-gray-900 dark:text-white">
                <ul>
                    <li>
                        If you buy 5 ‘C’s you would get 2 for 38 + 3 for 50.
                        <ul class="list-disc">
                            <li class="ml-4">
                                Total amount should be 38 + 50 = 88. 
                            </li>
                        </ul>
                    </li>
                    <li class="mt-4">
                        If you buy 4 ‘C’s you would get 3 for 50 + 1 for 20 rather than 2 for 38 + 2 for 38.
                        <ul class="list-disc">
                            <li class="ml-4">
                                Total amount should be 50 + 20 = 70.  
                            </li>
                        </ul>
                    </li>
                    <li class="mt-4">
                        If you buy 10 ‘D’s and 6 ‘A’s, 6 of the ‘D’s will cost 5 each whilst the other 4 will cost 15 each.
                        <ul class="list-disc">
                            <li class="ml-4">
                                Total amount should be 6 x 5 + 4 x 15 + 130 x 2 = 350. 
                            </li>
                        </ul>
                    </li>

                    <li class="mt-4">
                        If you Buy ‘A’, 3 for 130. If you buy 11 ‘A’s.  
                        <ul class="list-disc">
                            <li class="ml-4">
                                Total amount should be 130 x 3 + 50 x 2 = 490.
                            </li>
                        </ul>  
                    </li>
                    <li class="mt-4">
                        If you Buy ‘B’, 2 for 45. If you buy 5 ‘B’s. 
                        <ul class="list-disc">
                            <li class="ml-4">
                                Total amount should be 45 x 2 + 30 = 120.
                            </li>
                        </ul>
                    </li>
                    <li class="mt-4">
                        If you buy 4 ‘A’s, 5 ‘B’s, 8 ‘C’s, 3 ‘D’s & 6 ‘E’s.  
                        <ul class="list-disc">
                            <li class="ml-4">
                                Total amount should be 130 + 50 + 90 + 30 + 138 + 15 + 30 = 483.
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-supermarket-layout>
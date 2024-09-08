<x-home>
    <div>
        <h2 class="font-bold lg:text-xl text-2xl mt-4 mb-4">
            {{ __('Calculator') }} 
        </h2>
       
        <div class="mt-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                    <span class="font-medium"> {{ $error }}</span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{route('tasks.checkout.cal')}}" id="calculator_form">
                @csrf
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
                    <table class="w-full text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Item
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Unit Price
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Qty
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($items as $index => $item)
                                <tr 
                                    class="
                                        @if($index%2 ==0)
                                            bg-white dark:bg-gray-900  border-b dark:border-gray-700
                                        @else
                                            bg-gray-50 dark:bg-gray-800 border-b dark:border-gray-700
                                        @endif
                                    ">
                                    <th scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white text-xs">
                                        {{ $item->name }}
                                    </th>
                                    <td class="px-6 py-2 text-xs">
                                        {{ $item->unitprice }}
                                    </td>
                                    <td class="px-6 py-2 text-xs">
                                        <input name="items[{{ $item->id }}]" type="text" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  />
                                    </td>
                                </tr>
                            @endforeach 

                            <tfoot>
                                <tr class="font-semibold text-gray-900 dark:text-white">
                                    <th scope="row" class="px-6 py-3 text-base">Total</th>
                                    <td class="px-6 py-3">
                                    </td>
                                    <td class="pr-8 py-5 text-right">
                                        @if($s = Session::get('total'))
                                            {{ $s }}
                                        @else
                                            {{ $total }}
                                        @endif
                                    </td>
                                </tr>
                            </tfoot>                   
                        </tbody>
                    </table>
                </div>
                <button type="submit" class="mt-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Go</button>
            </form>

            <div id="errorMessages" class="alert alert-danger" style="display: none;">    
        </div>

        <div class="mt-8">    
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
                <table class="w-full text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Rule
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Special Price
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($rules as $index => $rule)
                            <tr 
                                class="
                                    @if($index%2 ==0)
                                        bg-white dark:bg-gray-900  border-b dark:border-gray-700
                                    @else
                                        bg-gray-50 dark:bg-gray-800 border-b dark:border-gray-700
                                    @endif
                                ">
                                <th scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white text-xs">
                                    {{ $rule[0] }}
                                </th>
                                <td class="px-6 py-2 text-xs">
                                    {!! $rule[1] !!}
                                </td>
                            </tr>
                        @endforeach                        
                    </tbody>
                </table>
            </div>

            <h5 class="mt-8 text-base font-bold dark:text-white">
                {{ __('Examples') }} 
            </h5>

            <ul class="space-y-4 text-gray-500  list-inside dark:text-gray-400">  
                <li class="md:text-sm text-xs">
                     If you buy 5 ‘C’s you would get 2 for 38 + 3 for 50.
                    <div class="ps-5">
                        - Total amount should be 38 + 50 = 88. 
                    </div>
                </li>
                <li class="md:text-sm text-xs">
                      If you buy 4 ‘C’s you would get 3 for 50 + 1 for 20 rather than 2 for 38 + 2 for 38.
                    <div class="ps-5">
                        - Total amount should be 50 + 20 = 70.  
                    </div>
                </li>
                <li class="md:text-sm text-xs">
                    If you buy 10 ‘D’s and 6 ‘A’s, 6 of the ‘D’s will cost 5 each whilst the other 4 will cost 15 each.
                    <div class="ps-5">
                        - Total amount should be 6 x 5 + 4 x 15 + 130 x 2 = 350. 
                    </div>
                </li>
                <li class="md:text-sm text-xs">
                    If you Buy ‘A’, 3 for 130. If you buy 11 ‘A’s.  
                    <div class="ps-5">
                        - Total amount should be 130 x 3 + 50 x 2 = 490.
                    </div>
                </li>
                <li class="md:text-sm text-xs">
                    If you Buy ‘B’, 2 for 45. If you buy 5 ‘B’s. 
                    <div class="ps-5">
                        - Total amount should be 45 x 2 + 30 = 120.
                    </div>
                </li>
                <li class="md:text-sm text-xs">
                    If you buy 4 ‘A’s, 5 ‘B’s, 8 ‘C’s, 3 ‘D’s & 6 ‘E’s. 
                    <div class="ps-5">
                        - Total amount should be 130 + 50 + 90 + 30 + 138 + 15 + 30 = 483.
                    </div>
                </li>
            </ul>
        </div>
    </div>
</x-home>
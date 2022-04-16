<x-supermarket-layout>
    <x-slot name="header">
        <div class="flex justify-center sm:justify-start sm:pt-0">
            <h1 class="">
                {{ __('Checkout') }}    
            </h1>
        </div>
    </x-slot>

    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                            
        <h2>
            Items & Rules
        <h2>
    
        <div class="mt-4">
            <table id="items" style="margin:auto;width:97%">
                <tr>
                    <th>Item</th>
                    <th>Unit Price</th>
                    <th>Special Price</th>
                </tr>
                <tr>
                    <td>A</td>
                    <td>50</td>
                    <td>3 for 130</td>
                </tr>
                <tr>
                    <td>B</td>
                    <td>30</td>
                    <td>2 for 45</td>
                </tr>
                <tr>
                    <td>C</td>
                    <td>20</td>
                    <td>2 for 38<br/>3 for 50</td>
                </tr>
                <tr>
                    <td>D</td>
                    <td>15</td>
                    <td>5 if purchased with an ‘A’</td>
                </tr>
                <tr>
                    <td>E</td>
                    <td>5</td>
                    <td>&nbsp;</td>
                </tr>
            </table>


        </div>

        <h2>Test Cases</h2>

        <div class="ml-4 text-xl mt-4 font-semibold text-gray-900 dark:text-white">
            <ul>
                <li>
                    If you buy 5 ‘C’s you would get 2 for 38 + 3 for 50.
                    <ul>
                        <li>
                            Total amount should be 38 + 50 = 88. Now let's get the calculation from the "checkout" method of "CheckoutController": <b>{{ $sum[0] }}</b>. If this value equals to <b>88</b>, that means the calculation of this test case is correct.
                        </li>
                    </ul>
                
                </li>
                <li class="mt-4">
                    If you buy 4 ‘C’s you would get 3 for 50 + 1 for 20 rather than 2 for 38 + 2 for 38.
                    <ul>
                        <li>
                            Total amount should be 50 + 20 = 70. Now let's get the calculation from the "checkout" method of "CheckoutController": <b>{{ $sum[1] }}</b>. If this value equals to <b>70</b>, that means the calculation of this test case is correct. 
                        </li>
                    </ul>
                </li>
                <li class="mt-4">
                    If you buy 10 ‘D’s and 6 ‘A’s, 6 of the ‘D’s will cost 5 each whilst the other 4 will cost 15 each.
                    <ul>
                        <li>
                            Total amount should be 6 x 5 + 4 x 15 + 6 x 50 = 350. Now let's get the calculation from the "checkout" method of "CheckoutController": <b>{{ $sum[2] }}</b>. If this value equals to <b>70</b>, that means the calculation of this test case is correct. 
                        </li>
                    </ul>

                </li>
            </ul>
        </div>

  
   
    </div>
</x-supermarket-layout>    
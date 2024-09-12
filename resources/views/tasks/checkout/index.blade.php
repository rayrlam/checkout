<x-home>
    <x-slot name="title">
        {{ $title ?? null }}
    </x-slot>
    <div class="block mt-3">
        <h3 class="text-xl font-bold dark:text-white">
            {{ __('Checkout') }} 
        </h3>
                
        <p class="mb-3 text-gray-500 text-base dark:text-gray-400">
            Written in the PHP programming language, implement the code for a supermarket checkout that calculates the total price of a number of items
        </p>

        <p class="text-gray-500 dark:text-gray-400 md:text-sm text-xs">
            In a normal supermarket, items for sale are identified using Stock Keeping Units, or ‘SKUs’. In our store, we’ll use individual letters of the alphabet (A, B, C, and so on) to represent these SKUs. Our goods are priced individually, however, some items are 
            multi-priced: buy <b>n</b> of them, and they’ll cost you <b>y</b> instead. 
        </p>

        <p class="text-gray-500 dark:text-gray-400 md:text-sm text-xs">
            For example, item ‘A’ might cost <b>£0.50</b> individually, but this week we have a special offer: buy three ‘A’s and they’ll cost you <b>£1.30</b>. 
        </p>

        <p class="text-gray-500 dark:text-gray-400 mt-3 md:text-sm text-xs">
            Below is a table of the prices of this week.
        </p>
    
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
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-xs">
                                {{ $rule[0] }}
                            </th>
                            <td class="px-6 py-4 text-xs">
                                {{ $rule[1] }}
                            </td>
                            <td class="px-6 py-4 text-xs">
                                @if(is_null($rule[2]))
                                    &nbsp;
                                @else
                                    {!! str_replace('::','<br>',$rule[2]) !!}
                                @endif
                            </td>
                        </tr>
                    @endforeach                        
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            <h3 class="text-xl font-bold dark:text-white">
                Notes
            </h3>
            <ul class="space-y-2 text-gray-500  list-disc list-inside dark:text-gray-400">   
                <li class="md:text-sm text-xs">
                    The price calculated for any quantity of an SKU with multiple special prices will be the cheapest combination of its special prices. For example: 
                    If you buy 5 ‘C’s you would get <b>2 for 38 + 3 for 50</b>. If you buy 4 ‘C’s you would get <b>3 for 50 + 1 for 20</b> rather than <b>2 for 38 + 2 for 38</b>.
                </li>
                <li class="md:text-sm text-xs">
                    For every ‘D’ purchased, if there is also an ‘A’ purchased, it will cost <b>5</b> instead of <b>15</b>. For example, if you buy <b>10</b> ‘D’s and <b>6</b> ‘A’s, <b>6</b> 
                    of the ‘D’s will cost <b>5 each</b> whilst the other <b>4</b> will cost <b>15 each</b>.
                </li>
            </ul>
        </div>

        <div class="mt-3">
            <p class="mt-3 mb-2 font-medium text-gray-700 dark:text-white md:text-sm text-xs">                        
                This exercise will be used to gauge how you approach a software engineering problem - the processes you use, the quality of your code and the robustness of your solution.
            </p>

            <ul class="space-y-2 text-gray-500  list-disc list-inside dark:text-gray-400">   
                <li class="md:text-sm text-xs">
                    <b>DO</b> use as many or as few technologies and processes as you normally would when working as a Software Engineer

                    <ul class="pl-5 mt-2 space-y-1 list-disc list-inside pl-[revert]">
                        <li class="md:text-sm text-xs">
                            Feel free to write tests, use version control and rely on the tools provided by the IDE.
                        </li>
                    </ul>
                </li>
               <li class="md:text-sm text-xs">
                    <b>DON’T</b> get hung up on the specifics of the implementation
                    <ul class="pl-5 mt-2 space-y-1 list-disc list-inside pl-[revert]">
                        <li class="md:text-sm text-xs">
                            The problem is intentionally abstract, giving you the freedom to come up with your own unique solution.
                        </li>
                        <li class="md:text-sm text-xs">
                            This is an opportunity to demonstrate your way of working and your approach to creative problem solving – there are no precise user requirements (aside from the specification above).
                        </li>
                    </ul>
                </li>
                <li class="md:text-sm text-xs">
                    This exercise will last approximately <b>1.5 hours</b>
                </li>
            </ul>
        </div>
    
        @include('components.setup', ['includeUserAccount' => true])
        
        <h4 class="text-base font-bold dark:text-white mt-3">
            {{ __('Main Files') }} 
        </h4>

        <ul class="space-y-4 text-gray-500  list-inside dark:text-gray-400">  
            <li class="text-indigo-700 text-xs">
                App\Http\Controllers\Checkout
                <div class="ps-5">
                    - CheckoutController
                </div>
            </li>
            <li class="text-indigo-700 text-xs">
                App\Helpers
                <div class="ps-5">
                    - CheckoutHelper
                </div>
            </li>
            <li class="text-indigo-700 text-xs">
                App\database\seeders
                <div class="ps-5">
                    - DataSeeder
                </div>
            </li>
            <li class="text-indigo-700 text-xs">
                Tests\Unit
                <div class="ps-5">
                    - ChekcoutTest
                </div>
            </li>
            <li class="text-indigo-700 text-xs">
                Tests\Browser\Checkout
                <div class="ps-5">
                    - RegistrationTest
                </div>
            </li>
            <li class="text-indigo-700 text-xs">
                App\Models\Checkout
                <div class="ps-5">
                    - Item<br>
                    - Rule
                </div>
            </li>                       
        </ul>  
    </div>        
</x-home>    
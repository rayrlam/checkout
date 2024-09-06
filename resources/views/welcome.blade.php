<x-supermarket-layout>
    <style>
        .custom-table tr:nth-child(odd) {
            background-color: white;
        }
        .custom-table tr:nth-child(even) {
            background-color: #f9fafb;
        }
        @media (prefers-color-scheme: dark) {
            .custom-table tr:nth-child(odd) {
            background-color: #111827;
            }
            .custom-table tr:nth-child(even) {
            background-color: #1f2937;
            }
        }
    </style>

    @php
        $rules = [
            [
                'A',
                50,
                '3 for 130'
            ],
            [
                'B',
                30,
                '2 for 45'
            ],
            [
                'C',
                20,
                '2 for 38::3 for 50'
            ],
            [
                'D',
                15,
                '5 if purchased with an ‘A’'
            ],
            [
                'E',
                5,
                null
            ]
        ];
    @endphp

        <div class="block">
            <h2>
                {{ __('Welcome') }} 
            </h2>
        
        
                                
            <div>
                Written in the PHP programming language, implement the code for a supermarket checkout that calculates the total price of a number of items
            </div>


            <div>
                In a normal supermarket, items for sale are identified using Stock Keeping Units, or ‘SKUs’. In our store, we’ll use individual letters of the alphabet (A, B, C, and so on) to represent these SKUs. Our goods are priced individually, however, some items are 
                multi-priced: buy <b>n</b> of them, and they’ll cost you <b>y</b> instead. 
            
            </div>

            <div>
                For example, item ‘A’ might cost <b>£0.50</b> individually, but this week we have a special offer: buy three ‘A’s and they’ll cost you <b>£1.30</b>. In fact, this week’s prices are:
            </div>
        
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
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
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $rule[0] }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $rule[1] }}
                                </td>
                                <td class="px-6 py-4">
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

            <div class="mt-4">
                <ul class="pt-8">
                    <li class="mb-4">
                        This exercise will be used to gauge how you approach a software engineering problem – the processes you use, the quality of your code and the robustness of your solution.
                    </li>    
                    <li class="mb-4">
                        <b>DO</b> use as many or as few technologies and processes as you normally would when working as a Software Engineer

                        <ul class="mt-4">
                            <li>
                                Feel free to write tests, use version control and rely on the tools provided by the IDE.
                            </li>
                        </ul>
                    </li>
                    <li class="mb-4">
                        <b>DON’T</b> get hung up on the specifics of the implementation
                        <ul>
                            <li class="mt-4 mb-4">
                                The problem is intentionally abstract, giving you the freedom to come up with your own unique solution.
                            </li>
                            <li>
                                This is an opportunity to demonstrate your way of working and your approach to creative problem solving – there are no precise user requirements (aside from the specification above).
                            </li>
                        </ul>
                    </li>
                    <li>
                        This exercise will last approximately <b>1.5 hours</b>
                    </li>
                </ul>
            </div>

            <div class="mt-4">
                <hr class="hr mb-4" />
                <ol>
                    <li>
                        The price calculated for any quantity of an SKU with multiple special prices will be the cheapest combination of its special prices. For example: 
                        If you buy 5 ‘C’s you would get <b>2 for 38 + 3 for 50</b>. If you buy 4 ‘C’s you would get <b>3 for 50 + 1 for 20</b> rather than <b>2 for 38 + 2 for 38</b>.
                    </li>
                    <li class="pt-8">
                        For every ‘D’ purchased, if there is also an ‘A’ purchased, it will cost <b>5</b> instead of <b>15</b>. For example, if you buy <b>10</b> ‘D’s and <b>6</b> ‘A’s, <b>6</b> 
                        of the ‘D’s will cost <b>5 each</b> whilst the other <b>4</b> will cost <b>15 each</b>.
                    </li>
                </ol>
            </div>

            <div class="mt-4">
                <hr class="hr" />
            </div>
            
            <div class="text-xl mt-4  text-gray-900 dark:text-white">
                <h2 class="font-bold">Setup Information</h2>
            </div>

            <div class="mt-4  text-gray-900 dark:text-white">
                <ul>
                    <li class="ml-4">Laravel Installation - <a href="https://laravel.com/docs/11.x/installation" target="_blank">https://laravel.com/docs/11.x/installation</a></li>
                    <li class="ml-4">Rename .env.example to .env</li>
                    <li class="ml-4">
                        Create Database laravel
                    </li>
                    <li class="mb-4">

<pre class="rounded-lg"><code class="language-php">
/*
** Create by MySQL Command
*/

CREATE DATABASE LARAVEL;
</code></pre>
                </li>         
 
                <li class="ml-4 mt-4">Run Laravel Command</li>
                <li class="mt-4">       
<pre class="rounded-lg"><code class="language-php">
/*
** Create all tables for this app
*/

php artisan migrate        
</code></pre>
                </li>
                <li class="mt-4">       
<pre class="rounded-lg"><code class="language-php">
/*
** Create the dumpy data for this app
*/

php artisan db:seed --class=DataSeeder       
</code></pre>
                </li>
                <li class="mt-4">       
<pre class="rounded-lg"><code class="language-php">
/*
** Run the CheckoutTest to check for errors
*/

php artisan test       
</code></pre>
                </li>
                <li class="mt-4">       
<pre class="rounded-lg"><code class="language-php">
/*
** Running local server
*/

php artisan serve           
</code></pre>
                </li>
                <li class="mt-4">
                    Register an account to entry the backend 
                    <ul>
                        <li>
                            Create new item at Create Item page
                        </li>
                        <li>
                            Create new rule at Create Rule page
                        </li>
                    </ul> 
                </li>
            </ul>
            <ul class="break-all">
                <li>
                    <hr class="hr mt-4 mb-4" />
                </li>
                <li style="margin-top:20px">
                    Main Files
                </li>    
                <li class="text-indigo-700">App\Http\Controllers\Checkout</li>
                <li class="ml-4 pb-4">CheckoutController</li>

                <li class="text-indigo-700">App\Helpers</li>
                <li class="ml-4 pb-4">CheckoutHelper</li>

                <li class="text-indigo-700">App\database\seeders</li>
                <li class="ml-4 pb-4">DataSeeder</li>

                <li class="text-indigo-700">Tests\Unit</li>
                <li class="ml-4 pb-4">ChekcoutTest</li>

                <li class="text-indigo-700">App\Models\Checkout</li>
                <li class="ml-4">Item</li>
                <li class="ml-4 pb-4">Rule</li>
                         
                <li class="text-indigo-700">Views</li>    
                    <ul>
                        <li class="ml-4">
                            <a href="{{ route('calculator') }}" class="text-green-500 hover:text-blue-500">
                                >> calculator.blade.php
                            </a>
                        </li>
                        <li class="ml-4">
                            <a href="{{ route('welcome') }}" class="text-green-500 hover:text-blue-500">
                                >> welcome.blade.php
                            </a>
                        </li>
                        <li class="ml-4">
                            <a href="{{ route('crud.create') }}" class="text-green-500 hover:text-blue-500">
                                >> crud.create.blade.php
                            </a>
                        </li>
                        <li class="ml-4">
                            <a href="{{ route('crud.createRule') }}" class="text-green-500 hover:text-blue-500">
                                >> crud.createRule.blade.php
                            </a>
                        </li>
                    </ul> 
                </li>
            </ul>  
        </div>
    </div>
</x-supermarket-layout>    
<x-supermarket-layout>
    <div class="p-8 w-full bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <div class="flex" style="justify-content:space-between; align-items:baseline">
            <h2 class="font-bold lg:text-3xl text-2xl mt-4 mb-4">
                {{ __('Welcome') }} 
            </h2>
        </div>
                                
        <div class="text-gray-900 dark:text-white">
            Written in the PHP programming language, implement the code for a supermarket checkout that calculates the total price of a number of items
        </div>


        <div class="mt-4  text-gray-900 dark:text-white">
            In a normal supermarket, items for sale are identified using Stock Keeping Units, or ‘SKUs’. In our store, we’ll use individual letters of the alphabet (A, B, C, and so on) to represent these SKUs. Our goods are priced individually, however, some items are 
            multi-priced: buy <b>n</b> of them, and they’ll cost you <b>y</b> instead. 
        
        </div>

        <div class="mt-4  text-gray-900 dark:text-white">
            For example, item ‘A’ might cost <b>£0.50</b> individually, but this week we have a special offer: buy three ‘A’s and they’ll cost you <b>£1.30</b>. In fact, this week’s prices are:
        </div>
    
        <div class="mt-4">
            <table id="items" style="margin:auto;">
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
                <li class="ml-4">Laravel Installation - <a href="https://laravel.com/docs/9.x/installation" target="_blank">https://laravel.com/docs/9.x/installation</a></li>
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
                <li class="text-indigo-700">App\Http\Controllers</li>
                <li class="ml-4 pb-4">CheckoutController</li>

                <li class="text-indigo-700">App\Helpers</li>
                <li class="ml-4 pb-4">CheckoutHelper</li>

                <li class="text-indigo-700">App\database\seeders</li>
                <li class="ml-4 pb-4">DataSeeder</li>

                <li class="text-indigo-700">Tests\Unit</li>
                <li class="ml-4 pb-4">ChekcoutTest</li>

                <li class="text-indigo-700">App\Models</li>
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
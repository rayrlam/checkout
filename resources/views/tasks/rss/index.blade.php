<x-home>
    <div class="p-8 w-full bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <div class="flex" style="justify-content:space-between; align-items:baseline">
            <div class="font-bold lg:text-3xl text-2xl mt-4 mb-4">
                {{ __('Rss') }} 
            </div>
            <div class="lg:text-3xl text-2xl mt-4 mb-4">
                <a href="{{ route('tasks.rss.rss') }}" class="text-green-500">Go to RSS</a>
            </div>
        </div>
                                
        <div class="text-gray-900 dark:text-white">
            We would like you to use a suitable MVC framework to construct a simple application which will connect to an RSS feed of your choosing, pull in the feed data and store it within a MySQL database.  If you're feeling really brave you could create your own lite MVC framework and demonstrate your understanding of the concept.  The application should read the feeds from the database and output them in a suitable UI.  
            We would also like a small native JavaScript snippet to be created which will listen out for a click on a feed, only when the Alt key is depressed and dynamically show a button to follow the feed URL and view the article online.  Clicking anywhere else other than within the focused element should subsequently hide the button again.  We don't want to see use of any JS frameworks for this one, native JS should be used only.
        </div>

        <div class="mt-4  text-gray-900 dark:text-white">
            We will be looking for a good understanding of OOPHP and adherence to the MVC framework as well as how data insanitized and handled from the applications side.  Efficient processing and storage of the data will also be looked at.
        </div>

        <div class="mt-4  text-gray-900 dark:text-white">
            <b>The task should take no longer than about 3-4 hours to complete.</b>  If not complete within that time please submit what you've managed to complete.        
        </div>

        <div class="mt-4  text-gray-900 dark:text-white">
            We will be looking for 100% custom code for this challenge, we don't want to see any reused open source classes etc.  
            <b>It's an opportunity for you to fully demonstrate your skills in the best possible light.</b>    
        </div>

        <div class="mt-4  text-gray-900 dark:text-white">We look forward to reading your code.</div>
    
        <div class="mt-4  text-gray-900 dark:text-white">
            Please submit to alison@reciteme.com in a format you feel most appropriate.
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
** Run the RssTest to check for errors
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
            </ul>
            <ul class="break-all">
                <li>
                    <hr class="hr mt-4 mb-4" />
                </li>
                <li style="margin-top:20px">
                    Main Files
                </li>    
                <li class="text-indigo-700">App\Http\Controllers</li>
                <li class="ml-4 pb-4">RssController</li>

                <li class="text-indigo-700">App\Helpers</li>
                <li class="ml-4 pb-4">RssHelper</li>

                <li class="text-indigo-700">App\database\seeders</li>
                <li class="ml-4 pb-4">DataSeeder</li>

                <li class="text-indigo-700">Tests\Unit</li>
                <li class="ml-4 pb-4">RssTest</li>

                <li class="text-indigo-700">App\Models</li>
                <li class="ml-4">Rss</li>
                <li class="ml-4 pb-4">Feed</li>
                <li class="text-indigo-700">Resources\views</li>    
                    <ul>
                        <li class="ml-4">
                            <a href="{{ route('tasks.rss.index') }}" class="text-green-500 hover:text-blue-500">
                                >> welcome.blade.php
                            </a>
                        </li>
                        <li class="ml-4">
                            <a href="{{ route('tasks.rss.rss') }}" class="text-green-500 hover:text-blue-500">
                                >> rss.blade.php
                            </a>
                        </li>
                    </ul> 
                </li>
            </ul>  
        </div>
    </div>
</x-home>    
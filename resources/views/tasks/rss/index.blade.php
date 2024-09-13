<x-home>
    <x-slot name="title">
        {{ $title ?? null }}
    </x-slot>
    <div class="block mt-3">
        <h3 class="text-xl font-bold dark:text-white">
            {{ __('Rss') }} 
        </h3>
                                
        <p class="mb-3 text-gray-500 text-base dark:text-gray-400">
            We would like you to use a suitable MVC framework to construct a simple application which will connect to an RSS feed of your choosing, pull in the feed data and store it within a MySQL database.  If you're feeling really brave you could create your own lite MVC framework and demonstrate your understanding of the concept.  The application should read the feeds from the database and output them in a suitable UI.              
        </p>

        <p class="text-gray-500 dark:text-gray-400 md:text-sm text-xs">
            We will be looking for a good understanding of OOPHP and adherence to the MVC framework as well as how data insanitized and handled from the applications side.  Efficient processing and storage of the data will also be looked at.
        </p>

        <p class="mt-3 text-gray-500 dark:text-gray-400 md:text-sm text-xs">
            <b>The task should take no longer than about 3-4 hours to complete.</b>  If not complete within that time please submit what you've managed to complete.        
        </p>

        <p class="text-gray-500 dark:text-gray-400 md:text-sm text-xs">
            We will be looking for 100% custom code for this challenge, we don't want to see any reused open source classes etc.  
            <b>It's an opportunity for you to fully demonstrate your skills in the best possible light.</b>    
        </p>

        @include('components.setup')

        <h4 class="text-base font-bold dark:text-white mt-3">
            {{ __('Remarks') }} 
        </h4>

        <p class="mt-3 text-gray-500 dark:text-gray-400 md:text-sm text-xs">
            If the link of the feed page is not correct, or that is not a subscribed rss, then it will throw a 404 error. 
            <br>You can go to the <a href="{{ route('tasks.rss.rss') }}">rss page to follow some channels and use the links from the channels to go to the feed page.      
        </p>

        <h4 class="text-base font-bold dark:text-white mt-3">
            {{ __('Main Files') }} 
        </h4>

        <ul class="space-y-4 text-gray-500  list-inside dark:text-gray-400">  
            <li class="text-indigo-700 text-xs">
                App\Http\Controllers\Rss
                <div class="ps-5">
                    - RssController
                </div>
            </li>
            <li class="text-indigo-700 text-xs">
                App\Helpers
                <div class="ps-5">
                    - RssHelper
                </div>
            </li>
            <li class="text-indigo-700 text-xs">
                Tests\Unit
                <div class="ps-5">
                    - RssTest
                </div>
            </li>
        </ul>  
    </div>
</x-home>    
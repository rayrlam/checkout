<nav class="bg-gray-50 dark:bg-gray-700">
    <div class="max-w-screen-xl px-4 py-3 mx-auto">
        <div class="flex items-center">
            <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-sm">
                @foreach($links as $name=>$link)
                    <li>
                        <a href="{{ $link }}" class="text-gray-900 dark:text-white hover:underline">{{ ucfirst($name) }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
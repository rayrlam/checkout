<x-home>
    <div class="p-8 w-full bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <div class="flex" style="justify-content:space-between; align-items:baseline">
            <div class="font-bold lg:text-3xl text-2xl mt-4 mb-4">
                {{ __('Feed') }} - {{ $name }} 
            </div>
            <div class="">
                <a href="{{ route('tasks.rss.rss') }}" class="text-green-500">Back to RSS</a>
            </div>
        </div>
        <div class="mt-4 w-full lg:grid lg:grid-cols-3 lg:gap-4">
            @forelse($feeds as $feed)
                @php
                    $code = explode(':', $feed['id']);
                @endphp
            <div class="p-8 hover:bg-green-100">
                <a href="https://www.youtube.com/watch?v={{end($code)}}" target="_blank">
                    <img src="http://i3.ytimg.com/vi/{{end($code)}}/hqdefault.jpg" />
                </a>
                <p class="py-4">{{ $feed['title']}}</p>
            </div>
            @empty
            @endforelse
        </div>
    </div>
</x-home>
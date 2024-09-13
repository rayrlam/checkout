<x-home>
   <x-slot name="title">
        {{ $title ?? null }}
    </x-slot>
    <div class="block mt-3">
        <div class="flex justify-between">
            <h3 class="text-xl font-bold dark:text-white">
                {{ __('Feed') }} - {{ $name }} 
            </h3>
    
            <div>
                <a href="{{ route('tasks.rss.rss') }}" class="text-green-500 text-xs">Back to RSS</a>
            </div>
    
        </div>
        <div class="mt-4 w-full lg:grid lg:grid-cols-4 lg:gap-4">
            @forelse($feeds as $feed)
                @php
                    $code = explode(':', $feed['id']);
                @endphp
            <div class="p-4 bg-gray-50 hover:bg-green-100">
                <a href="https://www.youtube.com/watch?v={{end($code)}}" target="_blank">
                    <img src="http://i3.ytimg.com/vi/{{end($code)}}/hqdefault.jpg" />
                </a>
                <p class="py-4 text-sm">{{ $feed['title']}}</p>
            </div>
            @empty
            @endforelse
        </div>
    </div>
</x-home>
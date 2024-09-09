@if (isset($breadcrumbs) && count($breadcrumbs))
<div class="container mx-auto">
    <div class="p-4 rounded flex flex-wrap bg-green-50 text-sm text-gray-800">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                @foreach ($breadcrumbs as $breadcrumb)
                    @if (isset($breadcrumb['url']) && $breadcrumb['url'])
                        <li class="inline-flex items-center">
                            <a href="{{ $breadcrumb['url'] }}" class="hover:text-green-500 inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                                {{ $breadcrumb['name'] }}
                            </a>
                        </li>
                    @else
                        <li class="inline-flex items-center">
                            {{ $breadcrumb['name'] }}
                        </li>
                    @endif

                    @unless($loop->last)
                    <li class="text-gray-500 px-4">
                        {{ $breadcrumb['sep'] }}
                    </li>
                    @endif
                @endforeach    
            </ol>
        </nav>
    </div>
</div>
@endif
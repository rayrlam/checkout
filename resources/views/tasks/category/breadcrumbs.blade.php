<x-home>
    <x-slot name="title">
        {{ $title ?? null }}
    </x-slot>
    <div class="block">  
        <h3 class="text-lg font-bold dark:text-white">
            {{ __('Breadcrumbs') }}
        </h3>

        <div class="mt-3 p-4 w-full bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
            @if(isset($breadcrumbs))
                <x-breadcrumb :breadcrumbs="$breadcrumbs" />
            @endif
        </div>
    </div>
</x-home>
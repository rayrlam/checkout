<x-category-layout>
    <x-slot name="header">
        <div class="flex justify-center sm:justify-start sm:pt-0">
            <h1 class="">
                {{ __('Breadcrumbs') }}    
            </h1>
        </div>
    </x-slot>

    <div class="p-8 w-full bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <div class="mt-4">
            @if(isset($breadcrumbs))
                <x-breadcrumb :breadcrumbs="$breadcrumbs" />
            @endif
        </div>
    </div>
</x-category-layout>
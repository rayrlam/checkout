<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">    
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="post" action="{{route('crud.store')}}">
                        @csrf
                    
                        <div class="bg-white">
                            <div class="p-6 md:p-10">

                                @if($message = Session::get('success'))

                                <div class="">
                                    <p class="font-bold">{{ $message }}</p>
                                </div>
                                @endif
                                                            
                                <label class="block text-gray-700 mt-4" for="name">
                                    Name
                                </label>
                                
                                <input class="form-input rounded-md shadow-sm mt-1 block w-full" name="name" placeholder="Name of Item" type="text">

                                @error('name')
                                    <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                                @enderror

                                <label class="block text-gray-700 mt-8" for="unitprice">
                                    Unit Price
                                </label>
                                
                                <input class="form-input rounded-md shadow-sm mt-1 block w-full" name="unitprice" placeholder="Unit Price" type="text">

                                @error('unitprice')
                                    <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                                @enderror
                           
                            </div>

                            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

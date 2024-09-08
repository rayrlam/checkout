<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Rule') }}
        </h2>
    </x-slot>

    <div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">    
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

       
                    <form method="post" action="{{route('tasks.checkout.crud.storerule')}}">
                        @csrf

                        <input name="itemid" id="id1" type="hidden" value="" />



                        @if($message = Session::get('success'))

                        <div class="mt-4 mb-4">
                            <p class="font-bold">{{ $message }}</p>
                        </div>
                        @endif

                        <div class="bg-white">
                            <div class="p-6 md:p-10">

                                <p class="py-1 text-xl">
                                    <!-- <p id="showid1"></p> -->
                                    <p id="itemname"></p>
                                </p>

                                <p class="block text-gray-700 mt-2 mb-2">
                                    Search Item
                                </p>
                                
                                <input id="Auto1" type="text" class="form-control typeahead" placehoder="Search..." />

                                                            
                                <label class="block text-gray-700 mt-4" for="name">
                                    Method
                                </label>
                                
                                <div class="form-check form-check-inline" style="margin-left:1rem">
                                    <input class="form-check-input" type="radio" name="method" id="flexRadioDefault1" value="0" checked="true">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        By Qty
                                    </label>
                                </div>
                                <div class="form-check form-check-inline" style="margin-left:1rem">
                                    <input class="form-check-input" type="radio" name="method" id="flexRadioDefault2" value="1">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        By Item
                                    </label>
                                </div>
                           
                                <input class="form-input rounded-md shadow-sm mt-1 block w-full  mt-4" name="qtyorid" placeholder="Qty" type="text">
                        
                                <input class="form-input rounded-md shadow-sm mt-1 block w-full  mt-4" name="price" placeholder="Price" type="text">

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
 
    @section('scripts')
        @parent

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" integrity="sha512-HWlJyU4ut5HkEj0QsK/IxBCY55n5ZpskyjVlAoV9Z7XQwwkqXoYdCIC93/htL3Gu5H3R4an/S0h2NXfbZk3g7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
            var path = '{{ route('tasks.checkout.crud.itemsearch') }}';

            $('#Auto1').typeahead({
                source:function(terms,process){
                    return $.get(path, {terms:terms}, function(data){
                        return process(data);
                    });
                },

                //this triggers after a value has been selected on the control
                afterSelect: function (data) {
                    //print the id to developer tool's console
                    // console.log(data.id);

                    var desc = "Item Name: " + data.name + "<br/> Price: " + data.unitprice;   
                    $('#itemname').html(desc);
                    $('#id1').val(data.id);
                    // $('#showid1').html(data.id);
                },

            });

        </script>

    @endsection

</x-app-layout>
 
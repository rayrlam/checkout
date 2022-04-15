<form method="post" action="{{ route('crud.storerule') }}">
    @csrf
    
    <input class="form-input rounded-md shadow-sm mt-1 block w-full" name="itemid" placeholder="ID" type="text">


    <div class="p-4 text-gray-700 mt-2 mb-2">
        Method: 
    
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



    <div class="flex items-center justify-start px-4 py-3 bg-gray-100 text-right sm:px-6">

        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">              
            Create Rule
        </button>
    </div>
           
</form>
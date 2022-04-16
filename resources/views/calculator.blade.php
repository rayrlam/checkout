<x-supermarket-layout>
    <x-slot name="header">
        <div class="flex justify-center sm:justify-start sm:pt-0">
            <h1 class="">
                {{ __('Calculator') }}    
            </h1>
        </div>
    </x-slot>

    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                            
        <div class="mt-4">
            <form method="post" action="{{route('cal')}}">
                        @csrf
                    
                <table id="items" style="margin:auto;margin-bottom:20px">
                    <tr>
                        <th style="min-width:200px;">Item</th>
                        <th style="min-width:200px;">Unit Price</th>
                        <th style="min-width:400px;"></th>
                    </tr>
                    @foreach($items as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->unitprice }}</td>
                        <td>
                            <input name="items[{{ $item->id }}]" type="text" style="border: 1px solid #333; min-width:400px" placeholder="Input Qty" />
                        </td>
                    </tr>
                    @endforeach

                    <tr>
                        <td colspan="2">Total Amount</td>
                        <td>
                            @if($s = Session::get('total'))
                                {{ $s }}
                            @else
                                {{ $total }}
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3" style="padding:10px;">
                            <button  type="submit" class="button cal">Go</button>
                        </td>
                    </tr>

                </table>
           
            </form>    


        </div>
        
        <h2>Test Cases</h2>

        <div class="ml-4 text-xl mt-4 font-semibold text-gray-900 dark:text-white">
            <ul>
                <li>
                    If you buy 5 ‘C’s you would get 2 for 38 + 3 for 50. <b>Total amount should be 38 + 50 = 88.</b>   
                </li>
                <li class="mt-4">
                    If you buy 4 ‘C’s you would get 3 for 50 + 1 for 20 rather than 2 for 38 + 2 for 38. <b>Total amount should be 50 + 20 = 70. </b>
           
                </li>
                <li class="mt-4">
                    If you buy 10 ‘D’s and 6 ‘A’s, 6 of the ‘D’s will cost 5 each whilst the other 4 will cost 15 each. <b> Total amount should be 6 x 5 + 4 x 15 + 130 x 2 = 350.</b>
                </li>
                <li class="mt-4">
                    If you Buy ‘A’, 3 for 130. If you buy 11 ‘A’s.  <b>Total amount should be 130 x 3 + 50 x 2 = 490.</b>   
                </li>

                <li class="mt-4">
                    If you Buy ‘B’, 2 for 45. If you buy 5 ‘B’s.  <b>Total amount should be 45 x 2 + 30 = 120.</b>   
                </li>

                <li class="mt-4">
                    If you Buy 6 ‘E’s.  <b>Total amount should be 6 x 5 = 30.</b>   
                </li>
            </ul>
        </div>
 
       
    </div>
</x-supermarket-layout>
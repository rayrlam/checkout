<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Helpers\CheckoutHelper;

class CheckoutController extends Controller
{  
    public function calculator()
    {
        $items = Item::all();
        $total = 0;
        return view('calculator',compact(['items', 'total']));
    }

    public function cal(Request $request)
    {
        $arr = [];
        foreach($request->input('items') as $id=>$val)
        {
            $arr[] = ['item_id'=>$id, 'qty'=>$val];
        }

        return back()->with(['items'=>Item::all(), 'total'=>CheckoutHelper::checkout($arr)]);
    }

    public function simple_test()
    {
        $checkout_arr = [
            ['item_id'=>2, 'qty'=>2],
            ['item_id'=>1, 'qty'=>6],
        ];

        return  CheckoutHelper::checkout($checkout_arr); 
    }    
}
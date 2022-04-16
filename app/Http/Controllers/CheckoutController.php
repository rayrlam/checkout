<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Rule;
use App\Helpers\CheckoutHelper;

class CheckoutController extends Controller
{   
    public function checkout()
    {
        $sum = [];
        foreach(CheckoutHelper::$checkout_tests as $v){
            $sum[] = CheckoutHelper::cal($v);
        }

        return view('checkout', compact(['sum']));
    }

    public function calculator()
    {
        $arr = $ar = [];
        $items = Item::all();

        $total = 0;
        return view('calculator',compact(['items', 'total']));
    }

    public function cal(Request $request)
    {
        $arr = [];
        foreach($request->input('items') as $id=>$val){
            $arr[] = ['item_id'=>$id, 'qty'=>$val];
        }
        
        $total = CheckoutHelper::cal($arr);
        $items = Item::all();

        return back()->with(['items'=>$items, 'total'=>$total]);
    }
}

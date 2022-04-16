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
}

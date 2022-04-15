<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Discountrule;

class CheckoutController extends Controller
{   
    // If you buy 5 ‘C’s you would get 2 for 38 + 3 for 50. 
    // If you buy 4 ‘C’s you would get 3 for 50 + 1 for 20 rather than 2 for 38 + 2 for 38.

    // For every ‘D’ purchased, if there is also an ‘A’ purchased, it will cost 5 instead of 15.
    // For example, if you buy 10 ‘D’s and 6 ‘A’s, 6 of the ‘D’s will cost 5 each whilst the other 4 will cost 15 each.


    private $checkout_tests = [
        [
            ['item_id'=>3, 'qty'=>5],
        ],
        [
            ['item_id'=>3, 'qty'=>4],
        ],
        [
            ['item_id'=>4, 'qty'=>10],
            ['item_id'=>1, 'qty'=>6],
        ],
    ];
    
    public function checkout()
    {
       
        $sum = 0;
        $match = [];
        $tests = $this->checkout_tests['2'];  
        foreach($tests as $test){
            $item = Item::find($test['item_id']);
            $qty = $test['qty'];
            $unitprice = $item->unitprice;
            $rules = Discountrule::where('item_id',$test['item_id'])->orderBy('eprice')->get();
            $qp = [];
            
            $type = 0;
            if(count($rules) > 0){
                foreach($rules as $rule){
                    if($rule->method === 0){
                        $qp[$rule->qtyorid] = $rule->sprice;
                    }else{

                        $type = 1;
                        $match[$rule->qtyorid] = ['op'=>$unitprice, 'sp'=>$rule->sprice, 'qty'=>$qty];
                    }
                }
            }

            if($type === 0){
                foreach($qp as $k=>$v){
                    if($qty >= $k){
                        $temp = floor($qty/$k);
                        $sum += $temp * $v;
                        $qty -=  $temp * $k;  
                    }
                }
                if($qty > 0){
                    $sum += $qty * $unitprice;
                }
            }
        }

        if(count($match)>0){
            foreach($tests as $test){
                $m = $test['item_id'];
                if(isset($match[$m])){
                    if( $match[$m]['qty'] > $test['qty']){
                        $sum += ($match[$m]['qty'] - $test['qty'])*$match[$m]['op'] +
                            ($test['qty'] * $match[$m]['sp']);
                    }elseif($match[$m]['qty'] ==  $test['qty']){
                        $sum += $test['qty'] * $match[$m]['sp'];
                    }else{
                        $sum += $match[$m]['qty'] * $match[$m]['sp'];
                    }
                }
            }
        }

   
        

        return view('checkout', compact(['sum']));

    }
 
}

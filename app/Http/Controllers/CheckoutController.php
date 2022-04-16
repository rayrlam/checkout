<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Rule;

class CheckoutController extends Controller
{   

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
        $sum = [];
        $sum[] = $this->cal($this->checkout_tests['0']);
        $sum[] = $this->cal($this->checkout_tests['1']);
        $sum[] = $this->cal($this->checkout_tests['2']);
       
        return view('checkout', compact(['sum']));

    }

    private function cal($test){
        $sum = 0;
        $match = [];
        foreach($test as $t){
            $item = Item::find($t['item_id']);
            $qty = $t['qty'];
            $unitprice = $item->unitprice;
            $rules = Rule::where('item_id',$t['item_id'])->orderBy('eprice')->get();
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
            foreach($test as $t){
                $m = $t['item_id'];
                if(isset($match[$m])){
                    if( $match[$m]['qty'] > $t['qty']){
                        $sum += ($match[$m]['qty'] - $t['qty'])*$match[$m]['op'] +
                            ($t['qty'] * $match[$m]['sp']);
                    }elseif($match[$m]['qty'] ==  $t['qty']){
                        $sum += $t['qty'] * $match[$m]['sp'];
                    }else{
                        $sum += $match[$m]['qty'] * $match[$m]['sp'];
                    }
                }
            }
        }
        return $sum;
    }
}

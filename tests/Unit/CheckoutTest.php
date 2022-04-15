<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Item;
use App\Models\Discountrule;

class TestCheckout extends TestCase
{
 
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_checkout()
    {

        // If you buy 5 ‘C’s you would get 2 for 38 + 3 for 50. 
        // If you buy 4 ‘C’s you would get 3 for 50 + 1 for 20 rather than 2 for 38 + 2 for 38.

        $item_id = 3;
        $qty = 12;
        $item = Item::find($item_id);
        if($item == null){
            dd('Item Not Found!');
        }
        $unitprice = $item->unitprice;
        $arr = [];
        $rules = Discountrule::where('item_id',$item_id)->orderBy('eprice')->get();
        $qp = [];
        $type = 0;
        if(count($rules) > 0){
            foreach($rules as $rule){
                if($rule->method === 0){
                    $qp[$rule->qtyorid] = $rule->sprice;
                }else{
                    $type = 1;
                }
            }
        }

        // dd($qp);
 
        $sum = 0;  
        $min = $unitprice * $qty;
        $temp_qty = $qty;
        if($type === 0){
            foreach($qp as $k=>$v){
                if($temp_qty >= $k){
                    $temp = floor($temp_qty/$k);
                    $sum += $temp * $v;
                    $temp_qty -=  $temp * $k;  
                }
            }
            if($temp_qty > 0){
                $sum += $temp_qty * $unitprice;
            }
        }else{

        }

        dd($sum);
    
    

        $this->assertTrue(true);
    }
}

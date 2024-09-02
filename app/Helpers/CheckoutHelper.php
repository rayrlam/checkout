<?php
namespace App\Helpers;

use App\Models\Checkout\Item;
use App\Models\Checkout\Rule;

class CheckoutHelper {

    static public $checkout_tests = [
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
        [
            ['item_id'=>1, 'qty'=>11],
        ],
        [
            ['item_id'=>2, 'qty'=>5],
        ],
        [
            ['item_id'=>1, 'qty'=>4],
            ['item_id'=>2, 'qty'=>5],
            ['item_id'=>3, 'qty'=>8],
            ['item_id'=>4, 'qty'=>3],
            ['item_id'=>5, 'qty'=>6],
        ],

    ];
    
    static public function checkout(array $checkout_arr)
    {
        $sum = 0;    
        $items = $list = [];

        foreach($checkout_arr as $v){
            $items[] = $v['item_id'];
            $list[$v['item_id']] =  $v['qty'];
        }

        $matches = self::matchMethods($items);

        if(count($matches)){
            self::cal_matches($list, $sum, $matches);
        }

        self::cal_remains($list, $sum);

        return $sum;  
    }

    static public function matchRules(string $item_id)
    {
        return  Rule::where('item_id',$item_id)
                        ->orderBy('eprice')->get();
    }

    static public function matchMethods(array $items){
        return Rule::where('method',1)
                        ->whereIn('item_id',$items)
                        ->whereIn('qtyorid',$items)
                        ->orderBy('eprice')->get();
    }

    static public function unitPrice(string $item_id): float
    {
        return Item::find($item_id)->unitprice;
    }

    static private function loops(&$list, &$sum, int $item_id)
    {
        foreach(self::matchRules($item_id) as $rule)
        {
            if($rule->method == 0)
            {
                if($list[$item_id] >= $rule->qtyorid)
                {
                    self::cal_qty($list, $sum, $item_id, $rule->sprice, $rule->qtyorid);
                }
            }
            elseif($rule->method == 1)
            {
                self::cal_match($list, $sum, $item_id, $rule->sprice, $rule->qtyorid);
            }
        }
        
        if($list[$item_id] > 0)
        {
            $sum += $list[$item_id] * self::unitPrice($item_id);
        }
        unset($list[$item_id]);
    }

    static private function cal_matches(&$list, &$sum, $matches)
    {
        foreach($matches as $m)
        {
            self::loops($list, $sum, $m->item_id);
        }
    }

    static private function cal_remains(array &$list, float &$sum)
    {
        foreach($list as $k=>$v)
        {
            self::loops($list, $sum, $k);
        }
    }

    static private function cal_qty(array &$list, float &$sum, int $item_id, float $sprice, int $qty)
    {
        $temp = floor($list[$item_id]/$qty);
        $sum += $temp * $sprice;
        $list[$item_id] -= $temp * $qty;
    }

    static private function cal_match(array &$list, float &$sum, int $item_id, float $sprice, int $qtyorid)
    {
        $temp = min([$list[$item_id], $list[$qtyorid]]);
        $sum +=  $temp * $sprice;
        $list[$item_id] -= $temp;
    }   
}
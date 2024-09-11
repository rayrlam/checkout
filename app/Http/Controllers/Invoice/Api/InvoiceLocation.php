<?php
namespace App\Http\Controllers\Invoice\Api;
use Illuminate\Http\Request;
use App\Repositories\InvoiceRepository;
use App\Http\Controllers\Invoice\Api\InvoiceInterface;

class InvoiceLocation implements InvoiceInterface
{   
    private $fname = ['status','total_value'];

    public function data(Request $request): array
    {
        $data = ['data'=>[]];
        if($id = $request->input('location_id')){
            $res = InvoiceRepository::location_id($id);
            if(count($res))
            {
                foreach($res as $k=>$v)
                {
                    foreach($this->fname as $fn){
                        $data['data'][$k][$fn] = $v->$fn;
                    }
                }
            }
        }
        return $data;
    }
}
<?php
namespace App\Http\Controllers\Invoice\Api;
use Illuminate\Http\Request;
use App\Repositories\InvoiceRepository;
use App\Http\Controllers\Invoice\Api\InvoiceInterface;

class InvoiceHeader implements InvoiceInterface
{   
    private $fname = ['name','date','status','total_value'];

    public function data(Request $request): array
    {
        $data = ['data'=>[]];
        $arr  = [
            'date' => $request->input('date'),
            'status' => $request->input('status'),
            'location' => $request->input('location')
        ];

        $res = InvoiceRepository::get_headers_data($arr);
        if(count($res))
        {
            foreach($res as $k=>$v)
            {
                foreach($this->fname as $fn){
                    $data['data'][$k][$fn] = $v->$fn;
                }
            }
        }
        return $data;
    }
}
<?php
namespace App\Http\Controllers\Invoice;

use Illuminate\Http\Request;
use App\Repositories\InvoiceRepository;
use App\Http\Controllers\Controller as BaseController;

class FrontendController extends BaseController
{
    public function headers(Request $request)
    {
        $arr = []; 
        if($request->isMethod('post')) {
            $start = $request->input('start');
            $end = $request->input('end');
            if($start && $end){
                $arr['date'][] = $start;
                $arr['date'][] = $end;
            }
            $arr['status'] = $request->input('status');
            $arr['location'] = $request->input('location');
        }
        $data = InvoiceRepository::get_headers_data($arr);
        return view('tasks.invoice.headers', compact(['data']));
    }

    public function location_id(Request $request)
    {   
        $id = 0;
        if($request->isMethod('post')) {
            $id = $request->input('location_id');
        }
        $data = InvoiceRepository::location_id($id);
        return view('tasks.invoice.location', compact(['data']));
    }

    public function total()
    {
        $data = InvoiceRepository::get_total_sum();
        return view('tasks.invoice.total', compact(['data']));
    }
}
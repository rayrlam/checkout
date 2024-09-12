<?php
namespace App\Http\Controllers\Invoice;

use Illuminate\Http\Request;
use App\Repositories\InvoiceRepository;
use App\Http\Controllers\Controller as BaseController;
use Illuminate\Support\Facades\View;

class InvoiceController extends BaseController
{
    private $links;
    private $title = 'Invoice';

    public function __construct() {
        $this->links =  [
            'index' => '/tasks/invoice/index',
            'headers' => '/tasks/invoice/headers',
            'location' => '/tasks/invoice/location',
            'total' => '/tasks/invoice/total',
        ];
    }

    public function index()
    {
        $title = $this->title;
        View::share('links', $this->links);
        return view('tasks.invoice.index', compact(['title']));
    }

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
        View::share('links', $this->links);
        $title = $this->title;
        return view('tasks.invoice.headers', compact(['data','title']));
    }

    public function location_id(Request $request)
    {   
        $id = 0;
        if($request->isMethod('post')) {
            $id = $request->input('location_id');
        }
        $data = InvoiceRepository::location_id($id);
        View::share('links', $this->links);
        $title = $this->title;
        return view('tasks.invoice.location', compact(['data','title']));
    }

    public function total()
    {
        $data = InvoiceRepository::get_total_sum();
        View::share('links', $this->links);
        $title = $this->title;
        return view('tasks.invoice.total', compact(['data','title']));
    }
}
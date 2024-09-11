<?php
namespace App\Http\Controllers\Invoice\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as BaseController;
use App\Http\Controllers\Invoice\Api\InvoiceLocation;
use App\Http\Controllers\Invoice\Api\InvoiceHeader;
use App\Http\Controllers\Invoice\Api\Invoice;

class InvoiceV1Controller extends BaseController
{
    public function location_id(Request $request) 
    {   
        return response()->json((new Invoice(new InvoiceLocation, $request))->data());
    }

    public function get_headers(Request $request) 
    {   
        return response()->json((new Invoice(new InvoiceHeader, $request))->data());
    }
}
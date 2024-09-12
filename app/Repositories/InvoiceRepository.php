<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class InvoiceRepository
{
    static public function get_headers_data(array $arr): object
    {
        $date = $arr['date'] ?? [];
        $status = $arr['status'] ?? '';
        $location = $arr['location'] ?? '';

        $res = DB::table('invoice_headers')
                    ->join('invoice_lines', 'invoice_headers.id', '=', 'invoice_lines.invoice_header_id')
                    ->join('locations', 'invoice_headers.location_id', '=', 'locations.id')
                    ->select('invoice_headers.id','locations.name','invoice_headers.date','invoice_headers.status',DB::raw('SUM(invoice_lines.value) as total_value'));
    
        if($status){
            $res = $res->where('status', $status);
        }
      
        if($date){
            $res = $res->where('date', '>=', $date[0])->where('date', '<=', $date[1]);
        }

        if($location){
            $res = $res->where('name', $location);
        }
        return $res->groupBy('invoice_headers.id')->orderBy('invoice_headers.date')->get();
    }

    static public function location_id(int $location_id): object
    {
        $res = DB::table('invoice_headers')
                    ->join('invoice_lines', 'invoice_headers.id', '=', 'invoice_lines.invoice_header_id')
                    ->select('invoice_headers.status',DB::raw('SUM(invoice_lines.value) as total_value'));
        
        if($location_id){
            $res = $res->where('location_id', $location_id);
        }
        return $res->groupBy('invoice_headers.status')->get();
    }

    static public function get_total_sum(): object
    {
        return DB::table('invoice_lines')
                    ->select(DB::raw('SUM(invoice_lines.value) as total_value'),
                            DB::raw('COUNT(invoice_lines.value) as quantity'))
                    ->groupBy('invoice_header_id')->get(); 
    }
}
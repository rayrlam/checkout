<?php
namespace App\Http\Controllers\Entry\Api\V1;

use Illuminate\Support\Facades\DB;

class EntryRepository
{
    static public function rfid(string $cn): array 
    {   
        $data = ['full_name'=>'', 'department' => []];
        $res = DB::table('employees')
                ->whereNull('left_at')   
                ->join('employee_departments', 'employees.id', '=', 'employee_departments.employee_id')
                ->join('departments', 'employee_departments.department_id', '=', 'departments.id')
                ->select('employees.first_name', 'employees.last_name', 'departments.department_name')
                ->where('employees.rfid', '=', $cn)
                ->get();

        if(count($res))
        {
            foreach($res as $k=>$v)
            {
                if ($k === 0) 
                {
                    $data['full_name'] = $v->first_name . " " . $v->last_name;
                }
                $data['department'][] = $v->department_name;
            }
            return $data;
        } 
        return $data;
    }
}
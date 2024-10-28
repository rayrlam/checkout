<?php
namespace App\Http\Controllers\Entry\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Entry\Api\V1\EntryRepository;

class EntryV1Controller extends Controller
{
    public function checking(Request $request) 
    {   
        return response()->json(EntryRepository::rfid($request->cn));
    }
}
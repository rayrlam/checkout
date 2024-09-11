<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Quotation\Api\V1\QuoteV1Controller;
use App\Http\Controllers\Invoice\Api\V1\InvoiceV1Controller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'v1'], function(){
    // quotation
    Route::post('/quoting', [QuoteV1Controller::class, 'quoting']);

    // invoice
    Route::post('/location_id', [InvoiceV1Controller::class, 'location_id']);
    Route::post('/get_headers', [InvoiceV1Controller::class, 'get_headers']);
});
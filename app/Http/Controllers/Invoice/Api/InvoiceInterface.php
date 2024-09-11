<?php
namespace App\Http\Controllers\Invoice\Api;
use Illuminate\Http\Request;

interface InvoiceInterface
{
    public function data(Request $request): array;
}
<?php
namespace App\Http\Controllers\Invoice\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Invoice\Api\InvoiceInterface;

class Invoice {
 
    private $invoice;

    public function __construct(InvoiceInterface $invoice, Request $request) {
        $this->invoice = $invoice;
        $this->invoice->request = $request;
    }

    public function data() {
        return $this->invoice->data($this->invoice->request);
    }
}
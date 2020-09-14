<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Invoice;

class InvoiceController extends Controller
{
    public function create(Request $request) {
        $quantities = $request->quantity;
        $prices = $request->price;

        $invoices_infos = array_map(null, $prices, $quantities);


        foreach($invoices_infos as $info => $key) {
            $invoice = new Invoice();

            $invoice->user_id = $request->user_id;
            $invoice->price  = 23;
            $invoice->quantity  = 4;
            $invoice->total = 12;
            $invoice->discount = $request->discount;

            $invoice->save();
        }
    }
}

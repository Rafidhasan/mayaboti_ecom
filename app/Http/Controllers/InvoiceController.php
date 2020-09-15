<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Invoice;

use App\User;

use App\Live;

class InvoiceController extends Controller
{
    public function create(Request $request) {
        $live_id = Live::orderByDesc('id')->first()->id;

        $prices = $request->price;
        $quantities = $request->quantity;
        $serial = ($request->user_id * $live_id) + 100 + time();

        $invoice_infos = array_map(null, $prices, $quantities);

        foreach($invoice_infos as $info => $key) {
            $invoice = new Invoice();

            $invoice->user_id = $request->user_id;
            $invoice->price = $key[0];
            $invoice->quantity = $key[1];
            $invoice->discount = $request->discount;
            $invoice->total = $key[0] * $key[1];
            $invoice->serial = $serial;

            $invoice->save();
        }

        return redirect('/showInvoice/'.$request->user_id.'/'.$serial);
    }

    public function show(Request $request) {
        $user = User::where('id', $request->user_id)->get();
        $invoices = Invoice::where('serial', $request->serial)->get();
        $created_at = $invoices[0]->created_at->format('d/m/Y');
        $serial = $request->serial;
        $subtotal = 0;

        foreach ($invoices as $info) {
            $subtotal = $subtotal + $info->total;
        }

        return view('admin.live.invoice', [
            'user' => $user,
            'serial' => $serial,
            'invoice_products' => $invoices,
            'created_at' => $created_at,
            'subtotal' => $subtotal
        ]);
    }
}

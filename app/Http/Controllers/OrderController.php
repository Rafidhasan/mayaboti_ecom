<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use App\User;

class OrderController extends Controller
{
    public function show(Request $request) {
        return view('admin.live.orderConfirmation');
    }
}

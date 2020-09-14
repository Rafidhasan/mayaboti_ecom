<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use App\User;

use DB;

class OrderController extends Controller
{
    public function show(Request $request) {

        $products_user = DB::table('users')
            ->join('products', 'users.id', '=', 'products.user_id')
            ->select('users.name', 'users.phone_number', 'users.address', 'url', 'products.id', 'products.user_id',  'products.image', 'products.quantity')
            ->where('products.user_id', '=', $request->user_id)
            ->oldest('products.created_at')
            ->get();

        return view('admin.live.orderConfirmation', [
            'products_user' => $products_user
        ]);
    }
}

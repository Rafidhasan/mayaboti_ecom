<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class ProductController extends Controller
{
    public function insert(Request $request) {
        $images = $request->image;
        $quantities = $request->quantity;

        $product_infos = array_map(null, $images, $quantities);

        foreach($product_infos as $info => $key) {
            $product = new Product();

            $product->user_id = $request->id;

            $product->quantity = $key[1];

            $extension = $key[0]->getClientOriginalExtension();
            $fileName = time() . '.' .$extension;
            $key[0]->move('uploads/images/', $fileName);
            $product->image = $fileName;

            $product->save();
        }

        return redirect('/')->with('Your order is done');
    }
}

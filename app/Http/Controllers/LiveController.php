<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Live;
use App\Product;
use App\User;
use DB;

class LiveController extends Controller
{
    public function index() {
        $lives = Live::orderByDesc('id')->get();

        return view('admin.live.index', [
            'lives' => $lives
        ]);
    }

    public function create(Request $request) {
        $live = new Live();
        $live->name = $request->name;
        $live->save();

        return redirect('/admin')->with('status', 'New live is created');
    }

    public function show(Request $request) {
        $products_live = DB::table('lives')
            ->join('products', 'lives.id', '=', 'products.live_id')
            ->select('lives.id','lives.name', 'products.id')
            ->where('products.live_id', '=', $request->id)
            ->oldest('products.created_at')
            ->get();

        $products_user = DB::table('users')
            ->join('products', 'users.id', '=', 'products.user_id')
            ->select('users.name', 'users.phone_number', 'users.address', 'url', 'products.id', 'products.user_id',  'products.image', 'products.quantity')
            ->where('products.live_id', '=', $request->id)
            ->oldest('products.created_at')
            ->get();

        $live_name = Live::where('id', '=', $request->id)
                ->select('name')
                ->first();

        return view('admin.live.products', [
            'products_live' => $products_live,
            'products_user' => $products_user,
            'live_name' => $live_name,
            'live_id' => $request->id
        ]);
    }

    public function search(Request $request) {
        $products = DB::table('users')
            ->join('products', function ($join) use ($request) {
                $join->on('users.id', '=', 'products.user_id')
                    ->where('users.name', 'like', '%'.$request->input('query').'%');
            })
        ->get();

        $keyword = $request->input('query');

        return view('admin.live.products.search', [
            'products' => $products,
            'keyword' => $keyword
        ]);
    }

    public function delete(Request $request) {
        DB::table('products')->where('id', '=', $request->product_id)->delete();

        return redirect('/lives/'.$request->live_id)->with('status', 'Your order is deleted');
    }
}

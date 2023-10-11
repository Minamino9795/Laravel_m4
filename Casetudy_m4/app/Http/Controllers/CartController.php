<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function Cart(Request $request)
    {
        $products = Product::get();
        $categories = Category::all();
        $param = [
            'products' => $products,
            'categories' => $categories,
        ];
        
        return view('Home.cart', $param, compact('products'));
    }
    public function addtocart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        // return redirect()->route('cart.index');
        // return redirect()->back()->with('successMessage1', 'More success');
        if (request()->has('buynow')) {
            return redirect()->route('cart.index');
        } else {
            return redirect()->back()->with('successMessage1', 'More success');
        }


    }
    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
        
    }
    public function remove(Request $request)
    {

        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('successMessage', 'Cart Deleted successfully');
        }
    }
}

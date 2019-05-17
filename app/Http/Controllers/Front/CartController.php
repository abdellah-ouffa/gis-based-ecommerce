<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;
use App\Models\Customer;

class CartController extends Controller
{
    /**
     * Listing of items in cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Cart::content();

        // dd($items);
       
        $quantities = array();
        $images = array();
        foreach ($items as $key => $item) {
            $quantities[$item->rowId] = Product::findOrFail($item->id)->qte;
        }
        
        return view('frontend.pages.cart', [
            'cart' => $items,
            'quantities' => $quantities
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $request->validate([
            'qte' => 'required|min:1|numeric|max:' . $product->qte
        ]);
        
        $duplicates = Cart::search(function ($item, $rowId) use ($product) {
            return $item->id === $product->id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('front.product.details', ['slug' => $product->slug])->with('warning', 'Item is already in your cart!');
        }

        Cart::add([
            'id' => $product->id, 
            'name' => $product->name, 
            'qty' => $request->qte, 
            'price' => $product->price, 
            'options' => [
                'slug' => $product->slug,
                'image' => $product->imagePath
            ]
        ])
        ->associate(Product::class);

        
        return redirect()->route('front.product.details', ['slug' => $product->slug])->with('success', 'Item was added to your cart!');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        foreach ($request->qte as $rowId => $qty) {
            Cart::update($rowId, $qty);
        }
        
        return back()->with('success', 'Quantity was updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return back()->with('success', 'Item has been removed!');
    }

    public function checkout()
    {
        $customer = Customer::where('user_id', auth()->id())->firstOrFail();
        return view('frontend.pages.checkout', [
            'cart' => Cart::content(),
            'customer' => $customer
        ]);
    }
}

<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Carbon\Carbon;
use App\Models\Poduct;
use App\Models\Order;
use App\Models\Customer;

class OrderController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $customer = Customer::where('user_id', auth()->id())->firstOrFail();
        $products = Cart::content();
        
        if($request->add_new_address_is_active) {
            $address = $customer->addresses()->create([
                'address' => $request->address_name . ' ' .  $request->zipcode . ' ' .  $request->city . ' ' .  $request->country, 
                'lng' => $request->longitude, 
                'lat' => $request->latitude,
            ]);
        } else {
            $address = $request->address;
        }

        $order = Order::create([
            'customer_id' => $customer->id, 
            'address_id' => ($request->add_new_address_is_active) ? $address->id : $request->address, 
            'status' => DEFAULT_ORDER_STATUS, 
            'date' => Carbon::now(), 
            'additionnal_information' => $request->additionnal_information
        ]);

        foreach ($products as $key => $product) {
            if($product->id != null)
                $order->products()->attach($product->id, [
                    'qte' => $product->qty, 
                ]);
        }

        Cart::destroy();

        return redirect()->route('front.home');
    }
}

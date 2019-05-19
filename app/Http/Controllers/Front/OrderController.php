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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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
            'address_id' => $request->address, 
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
        
        // foreach ($products as $key => $product) {
        //     OrderDetail::create([
        //         'product_id' => $product->id, 
        //         'order_id' => $order->id, 
        //         'qte' => $product->qty
        //     ]);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

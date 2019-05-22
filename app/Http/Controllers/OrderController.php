<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\products;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
    	$orders = Order::all();
        return view('backend.orders.index', [
            'orders' => $orders
        ]);

       $products = Products::all();
    }
}

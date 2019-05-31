<?php

namespace App\Http\Controllers\Supplier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use Carbon\Carbon;

class SupplierController extends Controller
{
	public function index()
	{
		return view('supplier.index');
	}

	public function filterProductsByperiode(Request $request)
	{
		$productName = $request->get('product-name');
		$from = date("Y-m-d", strtotime($request->input('from')));
		$to = date("Y-m-d", strtotime($request->input('to'))); 
		$productCount = 0;
		$customerCount = 0;
		$minCustomerAge = 0;
		$maxCustomerAge = 0;
		$coordinates = [];
		$countProductPerMonth = [];

		$filtredOrders = Order::whereBetween('date', [$from, $to])
								->whereHas(
									'products', function ($query) use ($productName) {
										$query->where('name', 'like', '%' . $productName . '%');
									}
								)
								->get();

		foreach ($filtredOrders as $order) {
			$productCount += $order->countOrdredProducts;
			$customerCount ++;
			$minCustomerAge = ($minCustomerAge == 0) || ($minCustomerAge > $order->customerAgeAtOrderedTime)
								? $order->customerAgeAtOrderedTime 
								: $minCustomerAge;
			$maxCustomerAge = ($maxCustomerAge == 0) || ($maxCustomerAge < $order->customerAgeAtOrderedTime)
								? $order->customerAgeAtOrderedTime 
								: $maxCustomerAge;

			// Get coordinates for each adresses
			$coordinates[] = [
				'lng' => $order->address->lng,
				'lat' => $order->address->lat,
				'address' => $order->address->address,
			];

			foreach (getYearsMonthsBetweenTwoDates($from, $to) as $date) {
				if((getPartOfDate($order->date, 0) == $date['y']) && (getPartOfDate($order->date, 1) == $date['m'])) {
					$ref = getPartOfDate($order->date, 0) . getPartOfDate($order->date, 1);
					$oldQte = (isset($countProductPerMonth[$ref]['qte'])) ? $countProductPerMonth[$ref]['qte'] : 0;
					$countProductPerMonth[$date['y'] . $date['m']] = [
						'y' => $date['y'],
						'm' => $date['m'],
						'qte' => $oldQte + $order->countOrdredProducts,
					];
				}
			}
		}

		return view('supplier.index', compact('productCount', 'customerCount', 'minCustomerAge', 'maxCustomerAge', 'coordinates', 'countProductPerMonth'));
	}

	public function filterProductsByperiodeOld(Request $request)
	{
		$productName = $request->input('product-name');
		$productN=Product::where('name',$productName)->get();
		$from = $request->input('from');
		$to = $request->input('to');
		$newFrom = date("Y-m-d", strtotime($from));
		$newTo = date("Y-m-d", strtotime($to)); 
		$orderPeriodes = Order::whereBetween('date', [$newFrom , $newTo])->get();
		$idSumProduct=0;

		foreach ($orderPeriodes as $order) {
			foreach($order->products as $product) {
			  	if($product->name == $productName){
			    	$idSumProduct += $product->OrderDetail->qte;
			    }
		    }
		}
		return view('supplier.index');
	}
}

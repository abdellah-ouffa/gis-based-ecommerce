<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use DB;
use Input;

class PageController extends Controller
{
    public function home()
    {
    	$products = Product::orderBy(DB::raw('RAND()'))->take(HOME_PRODUCT_LENGTH)->get();
    	$categories = Category::all();

    	return view('frontend.pages.home', [
    		'products' => $products,
    		'categories' => $categories,
    	]);
    }

    public function productDetails($slug)
    {
    	$product = Product::where('slug', '=', $slug)->first();
    	return view('frontend.pages.product-details', [
    		'product' => $product,
    	]);
    }

    public function allProducts()
    {
        $products = Product::paginate(ALL_PRODUCTS_PRODUCTS_LENGTH);
        return view('frontend.pages.all-products', [
            'products' => $products
        ]);
    }

    public function searchProducts(Request $request)
    {
        $query = '%' . $request->get('query') . '%';
        $products = Product::where('name', 'like', $query)
                            ->orWhere('description', 'like', $query)
                            ->orWhereHas('category', function($q) use ($query) {
                                $q->where('name', 'like', $query);
                            })
                            ->paginate(ALL_PRODUCTS_PRODUCTS_LENGTH);
                            
        return view('frontend.pages.all-products', [
            'products' => $products,
            'query' => $request->get('query')
        ]);
    }

    public function searchProductsByPrice(Request $request)
    {
        $fromPrice = str_replace("$", "", explode(" - ", $request->price)[0]);
        $toPrice = str_replace("$", "", explode(" - ", $request->price)[1]);

        $products = Product::whereBetween('price', [$fromPrice, $toPrice])
                            ->paginate(ALL_PRODUCTS_PRODUCTS_LENGTH);
                            
        return view('frontend.pages.all-products', [
            'products' => $products,
        ]);
    }

    public function aboutUs()
    {
        return view('frontend.pages.about');
    }

    public function contact()
    {
    	return view('frontend.pages.contact');
    }
// try to make something
    public function categoryDetails($id)
    {
   
  	$categories = Category::findOrFail($id);
    // $products = Product::paginate(ALL_PRODUCTS_PRODUCTS_LENGTH);

        return view('frontend.pages.all-category-products', [
            'categories' => $categories
        ]);
    }
// the same thing goes here

    public function account()
    {
        $customer = Customer::where('user_id', auth()->id())->firstOrFail();
        
        return view('frontend.pages.account', [
            'customer' => $customer
        ]);
    }

    public function updateAccount(Request $request)
    {
        $user = auth()->user();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->save();
        $customer = Customer::where('user_id', $user->id)->firstOrFail();
        $customer->tel = $request->tel;
        $customer->gender = $request->gender;
        $customer->birth_date = $request->birth_date;
        $customer->save();

        return redirect()->route('front.account');
    }

    public function updatePassword(Request $request)
    {
        $user = auth()->user();
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('front.account');
    }
}

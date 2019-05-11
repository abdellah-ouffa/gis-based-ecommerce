<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
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
        dd($request->all());

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

    public function categoryDetails($id)
    {
    	$category = Category::find($id);
    	// $category = Category::with('images')->find($id);

    	return view('frontend.pages.category-details', [
    		'category' => $category,
    	]);
    }
}

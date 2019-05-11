<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $product = Product::find(15);
        // dd($product->images);
        $products = Product::all();
        return view('backend.products.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.products.create', [
            'categories' => $categories          
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::create($request->all());
        if($request->hasFile('images')) {
            $files = $request->file('images');
            foreach ($files as $key => $file) {
                Image::create([
                    'model_id' => $product->id, 
                    'path' => saveFile($file, 'product-images'), 
                    'type' => 'product'
                ]);
            }
        }
        Session::flash('success', 'Product created succesfully');
        
        return redirect('product');
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
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('backend.products.edit',[
            'product' => $product,
            'categories'=> $categories
        ]);
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
        $product=Product::find($id);
        $product->name=$request->input('name');
        $product->slug=$request->input('slug');
        $product->price=$request->input('price');
        $product->status=$request->input('status');
        $product->category_id=$request->input('category_id');
        $product->description=$request->input('description');
        $product-> save();
        Session::flash('success', 'Product updated succesfully');

        return redirect()->route('product.index');   
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        Session::flash('success', 'Product deleted succesfully');

        return redirect()->route('product.index');   
    }
}

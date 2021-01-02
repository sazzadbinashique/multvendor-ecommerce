<?php

namespace App\Http\Controllers\Merchant;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);

        return view('merchant.product.index', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('merchant.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $str = strtolower($request->name);

        $product->name = $request->name;
        $product->alias = preg_replace('/\s+/', '-', $str);
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->description = $request->description;

        $product_image = $request->image;
        $product_image_new_name = time() . $product_image->getClientOriginalName();
        $product_image->move('uploads/products', $product_image_new_name);
        $product->image = 'uploads/products/' . $product_image_new_name;
        $product->save();

        Session::flash('success', 'Product has been created successfully ');

        return redirect()->route('merchant.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('merchant.product.edit', compact( 'product', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $str = strtolower($request->name);

        $product->name = $request->name;
        $product->alias = preg_replace('/\s+/', '-', $str);
        $product->price = $request->price;
        $product->description = $request->description;

        $product_image = $request->image;
        if (!empty($product_image)){
            $product_image_new_name = time() . $product_image->getClientOriginalName();
            $product_image->move('uploads/products', $product_image_new_name);
            $product->image = 'uploads/products/' . $product_image_new_name;
        }
        $product->update();

        Session::flash('success', 'Product has been Updated successfully ');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        Session::flash('success', 'Product has been deleted successfully ');

        return redirect()->back();
    }
}

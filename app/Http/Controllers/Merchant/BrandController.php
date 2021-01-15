<?php

namespace App\Http\Controllers\Merchant;

use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::paginate(10);

        return  view('merchant.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('merchant.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string',
            'status'   => 'required',
        ]);

        $user= Auth::user();

        $brand = new Brand;
        $str = strtolower($request->name);
        $brand->name = $request->name;
        $brand->alias = preg_replace('/\s+/', '-', $str);
        $brand->user_id = $user->id;
        $brand->status = $request->status;

        $logo_image = $request->logo;
        $logo_image_new_name = time() . $logo_image->getClientOriginalName();
        $logo_image->move('uploads/brands', $logo_image_new_name);
        $brand->logo = 'uploads/brands/' . $logo_image_new_name;
        $brand->save();

        Session::flash('success', 'Brand has been created successfully ');

        return redirect()->route('merchant.brands.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return  view('merchant.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name'      => 'required|string',
            'status'   => 'required',
        ]);
        $user = Auth::user();

        $str = strtolower($request->name);
        $brand->name = $request->name;
        $brand->alias = preg_replace('/\s+/', '-', $str);
        $brand->user_id = $user->id;
        $brand->status = $request->status;

        $logo_image = $request->logo;
        $logo_image_new_name = time() . $logo_image->getClientOriginalName();
        $logo_image->move('uploads/brands', $logo_image_new_name);
        $brand->logo = 'uploads/brands/' . $logo_image_new_name;
        $brand->save();

        Session::flash('success', 'Brand has been updated successfully ');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        Session::flash('success', 'Brand has been Deleted successfully ');

        return redirect()->back();
    }
}

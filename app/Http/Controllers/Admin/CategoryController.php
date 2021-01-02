<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return  view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category;
        $str = strtolower($request->name);

        $category->name = $request->name;
        $category->alias = preg_replace('/\s+/', '-', $str);
        $category->description = $request->description;
        $category->status = $request->status;

        $logo_image = $request->image;
        $logo_image_new_name = time() . $logo_image->getClientOriginalName();
        $logo_image->move('uploads/categories', $logo_image_new_name);
        $category->image = 'uploads/categories/' . $logo_image_new_name;
        $category->save();

        Session::flash('success', 'Category has been created successfully ');

        return redirect()->route('categories.index');

    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact( 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $str = strtolower($request->name);

        $category->name = $request->name;
        $category->alias = preg_replace('/\s+/', '-', $str);
        $category->description = $request->description;
        $category->status = $request->status;

        $logo_image = $request->image;
        if (!empty($logo_image)){
            $logo_image_new_name = time() . $logo_image->getClientOriginalName();
            $logo_image->move('uploads/categories', $logo_image_new_name);
            $category->image = 'uploads/categories/' . $logo_image_new_name;

        }
        $category->update();

        Session::flash('success', 'Category has been Updated Successfully ');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        Session::flash('success', 'Category has been deleted successfully ');

        return redirect()->back();
    }
}

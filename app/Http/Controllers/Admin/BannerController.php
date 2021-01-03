<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::paginate(10);

        return  view('admin.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
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
            'title'      => 'required|string',
            'sub_title'  => 'required',
            'position' => 'required',
            'status'   => 'required',
            'image'      => 'required|image',
        ]);

        $banner = new Banner;
        $banner->title = $request->title;
        $banner->sub_title = $request->sub_title;
        $banner->position = $request->position;
        $banner->url = $request->url;
        $banner->status = $request->status;
        $banner_image = $request->image;
        $banner_image_new_name = time() . $banner_image->getClientOriginalName();
        $banner_image->move('uploads/banners', $banner_image_new_name);
        $banner->image = 'uploads/banners/' . $banner_image_new_name;
        $banner->save();

        Session::flash('success', 'Banner has been created successfully ');

        return redirect()->route('admin.banners.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'title'      => 'required|string',
            'sub_title'  => 'required',
            'position' => 'required',
            'status'   => 'required',
        ]);

        $banner->title = $request->title;
        $banner->sub_title = $request->sub_title;
        $banner->position = $request->position;
        $banner->url = $request->url;
        $banner->status = $request->status;
        $banner_image = $request->image;
        if (!empty($slider_image)){
            $banner_image_new_name = time() . $banner_image->getClientOriginalName();
            $banner_image->move('uploads/banners', $banner_image_new_name);
            $banner->image = 'uploads/banners/' . $banner_image_new_name;
        }
        $banner->update();

        Session::flash('success', 'Banner has been Updated successfully ');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();

        Session::flash('success', 'Banner has been deleted successfully ');

        return redirect()->back();
    }
}

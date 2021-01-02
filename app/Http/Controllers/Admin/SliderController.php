<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::paginate(10);

        return  view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slider = new Slider;
        $slider->title = $request->title;
        $slider->product_title = $request->product_title;
        $slider->subtitle = $request->subtitle;
        $slider->price = $request->price;
        $slider->position = $request->position;
        $slider->link = $request->link;
        $slider->status = $request->status;
        $slider_image = $request->image;
        $slider_image_new_name = time() . $slider_image->getClientOriginalName();
        $slider_image->move('uploads/sliders', $slider_image_new_name);
        $slider->image = 'uploads/sliders/' . $slider_image_new_name;
        $slider->save();

        Session::flash('success', 'Slider has been created successfully ');

        return redirect()->route('admin.sliders.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $slider->title = $request->title;
        $slider->product_title = $request->product_title;
        $slider->subtitle = $request->subtitle;
        $slider->price = $request->price;
        $slider->position = $request->position;
        $slider->link = $request->link;
        $slider->status = $request->status;
        $slider_image = $request->image;
        if (!empty($slider_image)){
            $slider_image_new_name = time() . $slider_image->getClientOriginalName();
            $slider_image->move('uploads/sliders', $slider_image_new_name);
            $slider->image = 'uploads/sliders/' . $slider_image_new_name;
        }

        $slider->update();

        Session::flash('success', 'Slider has been updated successfully ');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();

        Session::flash('success', 'Slider has been deleted successfully ');

        return redirect()->back();
    }
}

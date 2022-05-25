<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sliders;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Sliders::all();
        return view('backend.slider.index', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.slider.create');
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        Sliders::create([
            'title' => $request->title,
            'link' => $request->link,
            'button_name' => $request->button_name,
            'description' => $request->description,
            'image' => $request->image->store('assets/upload/slider'),
        ]);

        return redirect()->route('slider.index')->with('message', 'Slider Added Successfully');
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
        $slider = Sliders::find($id);
        return view('backend.slider.edit', compact('slider'));
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
        $slider = Sliders::find($id);
        $slider->title      = $request->title;
        $slider->link      = $request->link;
        $slider->button_name      = $request->button_name;

        if ($request->hasFile('image')) {
            $slider->image      = $request->image->store('assets/upload/slider');
        }
        $slider->description = $request->description;
        $slider->save();
        return redirect()->route('slider.index')->with('message', 'Slider Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sliders $slider)
    {
        $slider->delete();
        return redirect()->route('slider.index')->with('message', 'Slider Deleted Successfully');
    }
}

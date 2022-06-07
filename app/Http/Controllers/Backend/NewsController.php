<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        return view('backend.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.news.create');
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


        News::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image->store('assets/upload/news'),
            'is_featured' => $request->is_featured ? true : false,
        ]);

        return redirect()->route('news.index')->with('message', 'News Added Successfully');
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
        $news = News::find($id);
        return view('backend.news.edit', compact('news'));
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

        $news = News::find($id);
        $news->title      = $request['title'];
        if ($request->hasFile('image')) {
            $news->image      = $request->image->store('assets/upload/news');
        }



        $news->is_featured = $request->is_featured ? true : false;
        $news->description = $request['description'];
        $news->save();
        return redirect()->route('news.index')->with('message', 'News Updated Successfully');
    }

    public function removeImage(Request $request)
    {
        $news = News::find($request->id);
        $news->image      = null;
        $news->save();
        return response()->json(['success' => "true"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index')->with('message', 'News Deleted Successfully');
    }
}

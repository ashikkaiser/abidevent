<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pages;
use App\Models\Settings;
use Illuminate\Support\Collection;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Pages::all();
        return view('backend.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pages::create([
            'name' => $request->name,
            'date' => $request->date,
            'state' => $request->state,
            'location' => $request->location,
            'price_type' => json_encode(array_filter($request->price_type)),
            'price' => json_encode(array_filter($request->price)),
            'description' => $request->description,
        ]);

        return redirect()->route('event.index')->with('message', 'Page Added Successfully');
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
        $page = Pages::find($id);
        return view('backend.pages.edit', compact('page'));
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


        $page = Pages::find($id);
        $page->name      = $request->name;
        $page->title     = $request->title;
        $page->header    = $request->header;
        $page->video_link    = $request->video_link;
        $page->content    = $request->content;

        if ($request->hasFile('banner')) {
            $page->banner      = $request->banner->store('assets/upload/pages/banner');
        }
        $adsData = new Collection();
        if ($request->ads_images) {
            foreach ($request->ads_images as $adImage) {
                // dd($adImage);
                if (@is_array(getimagesize($adImage['image']))) {
                    $adsData->push([
                        'link' => $adImage['link'],
                        'image' => $adImage['image']->store('assets/upload/pages/ads')
                    ]);
                } else {
                    $adsData->push(['link' => $adImage['link'], 'image' => $adImage['preimage']]);
                }
            }
            $page->ads_data = json_encode($adsData);
        }


        $page->save();
        return redirect()->route('page.index')->with('message', 'Page Updated Successfully');
    }

    public function siteSettings(Request $request)
    {
        $st = Settings::first();
        if ($request->method() == "POST") {
            $settings = Settings::findOrNew($request->id);
            if ($request->hasFile('logo')) {
                $settings->logo = $request->logo->store('assets/upload/');
            }
            if ($request->hasFile('footer_logo')) {
                $settings->footer_logo = $request->footer_logo->store('assets/upload/');
            }
            $settings->footer_logo_link = $request->footer_logo_link;
            $settings->social_link = json_encode($request->social);
            $settings->contact = json_encode($request->contact);
            $settings->powerdby = $request->powerdby;
            $settings->save();
            return redirect()->back();
        }

        return view('backend.settings', compact('st'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}

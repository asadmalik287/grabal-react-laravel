<?php

namespace App\Http\Controllers;

use App\Models\UploadAds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\validator;

class UploadAdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.upload_ads.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $arrayCheck = [
            'title' => ['required'],
            "page" => "required",
            "image" => "required",

        ];
        $validator = Validator::make($request->all(), $arrayCheck);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            // $request->page == 'home' ? $count = UploadAds::where('page', $request->page)->count() : $request->page == 'home' ? $count = UploadAds::where('page', $request->page)->count() : '' : '' ;
            $path = 'assets/admin/banners';
            $upload = new UploadAds();
            $upload->title = $request->title;
            $upload->page = $request->page;
            if ($request->hasFile('file')) {
                $file1 = $request->file("image");
                $image_changed_name1 = time() . '.' . $file1->getClientOriginalExtension();
                $file1->move(public_path($path), $image_changed_name1);
                $img_url1 = url($path) . "/" . $image_changed_name1;
                $upload->attachment_link = $img_url1;
            }
            $upload->save();
            return redirect()->back()->with('message', 'Banner has been added sucessfully');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UploadAds  $uploadAds
     * @return \Illuminate\Http\Response
     */
    public function show(UploadAds $uploadAds)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UploadAds  $uploadAds
     * @return \Illuminate\Http\Response
     */
    public function edit(UploadAds $uploadAds)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UploadAds  $uploadAds
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UploadAds $uploadAds)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UploadAds  $uploadAds
     * @return \Illuminate\Http\Response
     */
    public function destroy(UploadAds $uploadAds)
    {
        //
    }
}

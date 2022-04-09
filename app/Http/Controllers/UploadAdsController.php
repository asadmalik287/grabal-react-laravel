<?php

namespace App\Http\Controllers;

use App\Models\UploadAds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\validator;
use Storage;

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
        return view('admin.upload_ads.add_image');
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
            "file_photo" => "required",

        ];
        $validator = Validator::make($request->all(), $arrayCheck);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            if (DB::table('upload_ads')->where('')) {
                # code...
            }
            // $request->page == 'home' ? $count = UploadAds::where('page', $request->page)->count() : $request->page == 'home' ? $count = UploadAds::where('page', $request->page)->count() : '' : '' ;
            $path = 'assets/admin/banners';
            $upload = new UploadAds();
            $upload->title = $request->title;
            $upload->page = $request->page;
            $rand = rand(11111111111, 99999999999);
            $image = $request->hiddenInput; // your base64 encoded
            $image_info = getimagesize($image);
            $extension = (isset($image_info["mime"]) ? explode('/', $image_info["mime"])[1] : "");
            // $image = str_replace('data:image/jpeg;base64,', '', $image);
            // $image = str_replace(' ', '+', $image);
            $imageName =  $rand . '.' . $extension;
            // \File::put(storage_path(). '/' . $imageName, base64_decode($image));
            // die();
            $base64_image = $request->hiddenInput;
            // if (preg_match('/^data:image\/(\w+);base64,/', $image)) {
            $data = substr($image, strpos($image, ',') + 1);
            $data = base64_decode($data);
            Storage::disk('local')->put($imageName, $data);
            // if ($request->hasFile('file_photo')) {
            //     // return 'hi';
            //     $file1 = $request->file("file_photo");
            //     $image_changed_name1 = time() . '.' . $file1->getClientOriginalExtension();
            //     $file1->move(public_path($path), $image_changed_name1);
            //     $img_url1 = url($path) . "/" . $image_changed_name1;
            $upload->attachment_link = $imageName;
            // }
            // return 'bcv';

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

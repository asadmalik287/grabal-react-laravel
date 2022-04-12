<?php

namespace App\Http\Controllers;

use App\Models\UploadAds;
use DB;
use Illuminate\Http\Request;
use Validator;
use Storage;
use DB;

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
        $detail = null;
        if (isset($_GET['id'])) {

            $detail = UploadAds::where('id', $_GET['id'])->first();
        }
        $data = ['detail' => $detail];
        return view('admin.upload_ads.add_image', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arrayCheck = [
            'title' => ['required'],
            "page" => "required",
            "attachment" => "required",

        ];
        $validator = Validator::make($request->all(), $arrayCheck);
        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator);
        } else {

            if ($request->page == 'home') {

                if (DB::table('upload_ads')->where('page', $request->page)->count() > 0) {

                    return redirect()->route('ads.index')->with('error', 'Please delete prevoius Banner');
                }
            } else if ($request->page == 'serviceDetail') {

                if (DB::table('upload_ads')->where('page', $request->page)->count() > 1) {
                    return redirect()->route('ads.index')->with('error', 'Please delete prevoius Banner');
                }
            } else if ($request->page == 'sidebar') {

                if (DB::table('upload_ads')->where('page', $request->page)->count() > 0) {
                    return redirect()->route('ads.index')->with('error', 'Please delete prevoius Banner');
                }
            }
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
            $imageName = $rand . '.' . $extension;
            // \File::put(storage_path(). '/' . $imageName, base64_decode($image));
            // die();
            $base64_image = $request->hiddenInput;
            // if (preg_match('/^data:image\/(\w+);base64,/', $image)) {
            $data = substr($image, strpos($image, ',') + 1);
            $data = base64_decode($data);
            Storage::disk('ads')->put($imageName, $data);
            // \File::put(storage_path(). '/' . $imageName, $data );
            $upload->save();
            return redirect()->route('ads.index')->with('success', 'Ad Image has been added sucessfully');

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
    public function update(Request $request, $id)
    {
        $arrayCheck = [
            'title' => ['required'],
            "page" => "required",
            // "attachment" => "required",

        ];
        $validator = Validator::make($request->all(), $arrayCheck);
        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator);
        } else {

            $path = 'assets/admin/banners';
            $upload = UploadAds::find($id);
            $upload->title = $request->title;
            $upload->page = $request->page;
            if (isset($request->hiddenInput)) {
                $rand = rand(11111111111, 99999999999);
                $image = $request->hiddenInput; // your base64 encoded
                $image_info = getimagesize($image);
                $extension = (isset($image_info["mime"]) ? explode('/', $image_info["mime"])[1] : "");
                $imageName = $rand . '.' . $extension;
                $base64_image = $request->hiddenInput;
                $data = substr($image, strpos($image, ',') + 1);
                $data = base64_decode($data);
                Storage::disk('ads')->put($imageName, $data);
                $upload->attachment_link = url('storage/ads/' . $imageName);
            }
            $upload->save();
            return redirect()->route('ads.index')->with('success', 'Ad Image has been Updated sucessfully');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UploadAds  $uploadAds
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = UploadAds::find($id);
        $data->delete();
        return response()->json(['success' => true, 'message' => 'Ad has been Delete!']);
    }
}

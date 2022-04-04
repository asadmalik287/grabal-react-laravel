<?php

namespace App\Http\Controllers;

use App\Models\UploadAds;
use Illuminate\Http\Request;

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
        //
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

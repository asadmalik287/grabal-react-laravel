<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function storeService(Request $request)
    {
        $service = new Service();
        $service->title = $request->title;
        $service->description = $request->description;
        $service->category = $request->category_id;
        $service->Sub_category = $request->sub_category_id;
        $service->postalCode = $request->postalCode;
        for ($i = 0; $i < count($request->file('images')); $i++) {
            $file = $request->file("images")[$i];
            $image_changed_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path($path), $image_changed_name);
            $path = '/public' . '/' . $path;
            $img_url = url($path) . "/" . $image_changed_name;
            $service->attachment = $img_url;
        }

        $service->save();
    }
}

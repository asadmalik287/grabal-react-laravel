<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    // store services
    public function storeService(Request $request)
    {
        // return $request->all();
        // if($request->hasFile('vacc_doc')){
        //     return 'fine';
        // }else{
        //     return 'not fine';
        // }
        $validator = Validator::make($request->all(), [
            'business_streetNo' => 'required|string',
            'business_unit' => 'required|string',
            'business_street' => 'required',
            'category_id' => 'required|string',
            'subCategory_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'business_name' => 'required',
            'contact_name' => 'required',
            'phone_number' => 'required',
        ]);

        // if validator fails
        if ($validator->fails()) {
            return (new ResponseController)->sendError(0, $validator->errors());
        }

        $service = new Service();
        $service->category_id = $request->category_id;
        $service->subCategory_id = $request->subCategory_id;
        $service->title = $request->title;
        $service->description = $request->description;
        $service->business_name = $request->business_name;
        $service->business_streetNo = $request->business_streetNo;
        $service->business_unit = $request->business_unit;
        $service->business_street = $request->business_street;
        $service->contact_name = $request->contact_name;
        $service->phone_number = $request->phone_number;

        // for ($i = 0; $i < count($request->file('images')); $i++) {
        //     $file = $request->file("images")[$i];
        //     $image_changed_name = time() . '.' . $file->getClientOriginalExtension();
        //     $file->move(public_path($path), $image_changed_name);
        //     $path = '/public' . '/' . $path;
        //     $img_url = url($path) . "/" . $image_changed_name;
        //     $attachment = new ServiceAttachment;
        //     $attachment->name = $img_url;
        //     $attachment->service_id = $service->id;
        //     $attachment->save();
        // }
        // for ($i = 0; $i < count($request->file('certificate')); $i++) {
        //     $file = $request->file("certificate")[$i];
        //     $image_changed_name = time() . '.' . $file->getClientOriginalExtension();
        //     $file->move(public_path($path), $image_changed_name);
        //     $path = '/public' . '/' . $path;
        //     $img_url = url($path) . "/" . $image_changed_name;
        //     $attachment = new ServiceAttachment;
        //     $attachment->name = $img_url;
        //     $attachment->service_id = $service->id;
        //     $attachment->save();
        // }
        if ($request->hasFile('vacc_doc')) {
            $file = $request->file("vac_doc")[$i];
            $image_changed_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path($path), $image_changed_name);
            $path = '/public' . '/' . $path;
            $img_url2 = url($path) . "/" . $image_changed_name;
            $service->vacc_doc = $img_url;
        }
        if ($request->hasFile('vet_doc')) {
            $file = $request->file("vet_doc")[$i];
            $image_changed_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path($path), $image_changed_name);
            $path = '/public' . '/' . $path;
            $img_url3 = url($path) . "/" . $image_changed_name;
            $service->vet_doc = $img_url;
        }
        $service->save();
        $message = 'Service has been added successfully';
        return (new ResponseController)->sendResponse(1, $message, $service);

    }
    // close .

    // update service
    public function updateService(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'business_streetNo' => 'required|string',
            'business_unit' => 'required|string',
            'business_street' => 'required',
            'category_id' => 'required|string',
            'subCategory_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'business_name' => 'required',
            'contact_name' => 'required',
            'phone_number' => 'required',
        ]);

        // if validator fails
        if ($validator->fails()) {
            return (new ResponseController)->sendError(0, $validator->errors());
        }

        $service = new Service();
        $service->category_id = $request->category_id;
        $service->subCategory_id = $request->subCategory_id;
        $service->title = $request->title;
        $service->description = $request->description;
        $service->business_name = $request->business_name;
        $service->business_streetNo = $request->business_streetNo;
        $service->business_unit = $request->business_unit;
        $service->business_street = $request->business_street;
        $service->contact_name = $request->contact_name;
        $service->phone_number = $request->phone_number;

        // for ($i = 0; $i < count($request->file('images')); $i++) {
        //     $file = $request->file("images")[$i];
        //     $image_changed_name = time() . '.' . $file->getClientOriginalExtension();
        //     $file->move(public_path($path), $image_changed_name);
        //     $path = '/public' . '/' . $path;
        //     $img_url = url($path) . "/" . $image_changed_name;
        //     $attachment = new ServiceAttachment;
        //     $attachment->name = $img_url;
        //     $attachment->service_id = $service->id;
        //     $attachment->save();
        // }
        // for ($i = 0; $i < count($request->file('certificate')); $i++) {
        //     $file = $request->file("certificate")[$i];
        //     $image_changed_name = time() . '.' . $file->getClientOriginalExtension();
        //     $file->move(public_path($path), $image_changed_name);
        //     $path = '/public' . '/' . $path;
        //     $img_url = url($path) . "/" . $image_changed_name;
        //     $attachment = new ServiceAttachment;
        //     $attachment->name = $img_url;
        //     $attachment->service_id = $service->id;
        //     $attachment->save();
        // }
        if ($request->hasFile('vacc_doc')) {
            $file = $request->file("vac_doc")[$i];
            $image_changed_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path($path), $image_changed_name);
            $path = '/public' . '/' . $path;
            $img_url2 = url($path) . "/" . $image_changed_name;
            $service->vacc_doc = $img_url;
        }
        if ($request->hasFile('vet_doc')) {
            $file = $request->file("vet_doc")[$i];
            $image_changed_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path($path), $image_changed_name);
            $path = '/public' . '/' . $path;
            $img_url3 = url($path) . "/" . $image_changed_name;
            $service->vet_doc = $img_url;
        }
        $service->save();
        $message = 'Service has been added successfully';
        return (new ResponseController)->sendResponse(1, $message, $service);

    }
    // close

    // list category and sub category
    public function categoriesList()
    {
        $category = DB::select('select * from categories');
        $subCategory = DB::select('select * from sub_categories');
        return response()->json(['categories' => $category, 'subCategory' => $subCategory]);
    }
    // close
}

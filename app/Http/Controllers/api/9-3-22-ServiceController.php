<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceAttachment;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return $services;
        return view('admin.services.index', compact('services'));
    }

    // store services
    public function storeService(Request $request)
    {
        return $request->all();
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
            'main_service_image' => 'required',
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
        $service->added_by = $request->added_by_id;
        $service->phone_number = $request->phone_number;


        $path = 'assets/admin/images';
        if ($request->hasFile('service_image[]')) {
            for ($i = 0; $i < count($request->file('service_image')); $i++) {
                $file = $request->file("service_image")[$i];
                $image_changed_name = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path($path), $image_changed_name);
                $img_url = url($path) . "/" . $image_changed_name;
                $attachment = new ServiceAttachment;
                $attachment->attachment_name = $img_url;
                $attachment->service_id = $service->id;
                $attachment->save();
            }
        }

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

        if ($request->hasFile('main_service_image')) {
            $file1 = $request->file("main_service_image");
            $image_changed_name1 = time() . '.' . $file1->getClientOriginalExtension();
            $file1->move(public_path($path), $image_changed_name1);
            $img_url1 = url($path) . "/" . $image_changed_name1;
            $service->main_service_image = $img_url1;
        }

        // if ($request->hasFile('certificate')) {
        //     $file1 = $request->file("certificate");
        //     $image_changed_name1 = time() . '.' . $file1->getClientOriginalExtension();
        //     $file1->move(public_path($path), $image_changed_name1);
        //     $img_url1 = url($path) . "/" . $image_changed_name1;
        //     $service->vacc_doc = $img_url1;
        // }
        // if ($request->hasFile('vacc_doc')) {
        //     $file2 = $request->file("vacc_doc");
        //     $image_changed_name2 = time() . '.' . $file2->getClientOriginalExtension();
        //     $file2->move(public_path($path), $image_changed_name2);
        //     $img_url2 = url($path) . "/" . $image_changed_name2;
        //     $service->vacc_doc = $img_url2;
        // }

        // if ($request->hasFile('vet_doc')) {
        //     $file3 = $request->file("vet_doc");
        //     $image_changed_name3 = time() . '.' . $file3->getClientOriginalExtension();
        //     $file3->move(public_path($path), $image_changed_name3);
        //     $img_url3 = url($path) . "/" . $image_changed_name3;
        //     $service->vet_doc = $img_url3;
        // }
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

    // get all services
    public function allServices()
    {
        $services = Service::join('categories', 'services.category_id', 'categories.id')
            ->join('sub_categories', 'services.subCategory_id', 'sub_categories.id')
            ->join('users', 'services.added_by', 'users.id')
            ->select('users.business_name', 'sub_categories.name as SubCategory', 'categories.name as Category', 'services.*',
                'services.id as Service_id')->get();
        return response()->json(['services' => $services]);
    }
    // close

        // get specific services
        public function serviceDetail()
        {
            if(isset($_GET['id'])) {
            $services = Service::join('categories', 'services.category_id', 'categories.id')
                ->join('sub_categories', 'services.subCategory_id', 'sub_categories.id')
                ->join('users', 'services.added_by', 'users.id')
                ->select('users.business_name', 'sub_categories.name as SubCategory', 'categories.name as Category', 'services.*',
                    'services.id as Service_id')->where('services.id',$_GET['id'])->get();
            return response()->json(['services' => $services]);
        }
    }
    public function sellerServices() {
        $sellerServices = Service::join('categories', 'services.category_id', 'categories.id')
        ->join('sub_categories', 'services.subCategory_id', 'sub_categories.id')
        ->join('users', 'services.added_by', 'users.id')
        ->select('users.business_name', 'sub_categories.name as SubCategory', 'categories.name as Category', 'services.*',
            'services.id as Service_id')->where('services.added_by',$_GET['id'])->get();
            return response()->json(['sellerServices' => $sellerServices]);

    }
        // close
            // get all services
    public function sellerDetail(Request $request)
    {
        if(isset($_GET['id'])) {
        $seller = User::where('id',$_GET['id'])->first();
        return response()->json(['seller' => $seller]);
    }
    }

    // close

}

<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceAttachment;
use App\Models\Subscription;
use App\Models\WatchList;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        // dd($request->all());

        $validator = Validator::make($request->all(), [
            // 'business_streetNo' => 'required|string',
            // 'business_unit' => 'required|string',
            // 'business_street' => 'required',
            'address' => 'required',
            'aboutService' => 'required',
            'aboutService1' => 'required',
            'category_id' => 'required|string',
            'subCategory_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'business_name' => 'required',
            'contact_name' => 'required',
            'phone_number' => 'required',
            'about' => 'required',
            'main_service_image' => 'required',
            'city' => 'required',
            'suburb' => 'required',
            'postal_code' => 'required',
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
        // $service->business_streetNo = $request->business_streetNo;
        // $service->business_unit = $request->business_unit;
        // $service->business_street = $request->business_street;
        $service->address = $request->address;
        $service->address1 = $request->address1;
        $service->aboutService = $request->aboutService;
        $service->aboutService1 = $request->aboutService1;
        $service->aboutService2 = $request->aboutService2;
        $service->contact_name = $request->contact_name;
        $service->added_by = $request->added_by_id;
        $service->about = $request->about;
        $service->phone_number = $request->phone_number;
        $service->city = $request->city;
        $service->suburb = $request->suburb;
        $service->postal_code = $request->postal_code;

        $path = 'assets/admin/images';

        // if ($request->hasFile('service_image[]')) {
        // for ($i = 0; $i < count($request->file('service_image')); $i++) {
        // $file = $request->file("service_image")[$i];

        // }
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

        foreach ($request->service_image ?? [] as $file) {

            // return (new ResponseController)->sendResponse(1, 'test', $file);
            $image_changed_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path($path), $image_changed_name);
            $img_url = url($path) . "/" . $image_changed_name;
            $attachment = new ServiceAttachment;
            $attachment->attachment_name = $img_url;
            // $attachment->service_id = Service::orderBy('id', 'desc')->first() != null ? Service::orderBy('id', 'desc')->first()->id + 1 : 0;
            $attachment->service_id = $service->id;
            $attachment->save();
        }

        $message = 'Service has been added successfully';
        return (new ResponseController)->sendResponse(1, $message, $service);

    }
    // close .

    // update service
    public function updateService(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            // 'business_streetNo' => 'required|string',
            // 'business_unit' => 'required|string',
            // 'business_street' => 'required',
            // 'category_id' => 'required|string',
            // 'subCategory_id' => 'required',
            // 'title' => 'required',
            // 'description' => 'required',
            // 'business_name' => 'required',
            // 'contact_name' => 'required',
            // 'phone_number' => 'required',
            // 'about' => 'required',
            // 'main_service_image' => 'required',

            'address' => 'required',
            'aboutService' => 'required',
            'aboutService1' => 'required',
            'category_id' => 'required|string',
            'subCategory_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'business_name' => 'required',
            'contact_name' => 'required',
            'phone_number' => 'required',
            'about' => 'required',
            'main_service_image' => 'required',
            'city' => 'required',
            'suburb' => 'required',
            'postal_code' => 'required',
        ]);

        // if validator fails
        if ($validator->fails()) {
            return (new ResponseController)->sendError(0, $validator->errors());
        }

        $service = Service::find($id);
        $service->category_id = $request->category_id;
        $service->subCategory_id = $request->subCategory_id;
        $service->title = $request->title;
        $service->description = $request->description;
        $service->business_name = $request->business_name;
        // $service->business_streetNo = $request->business_streetNo;
        // $service->business_unit = $request->business_unit;
        // $service->business_street = $request->business_street;
        $service->address = $request->address;
        $service->address1 = $request->address1;
        $service->aboutService = $request->aboutService;
        $service->aboutService1 = $request->aboutService1;
        $service->aboutService2 = $request->aboutService2;
        $service->contact_name = $request->contact_name;
        $service->added_by = $request->added_by_id;
        $service->about = $request->about;
        $service->phone_number = $request->phone_number;
        $service->city = $request->city;
        $service->suburb = $request->suburb;
        $service->postal_code = $request->postal_code;

        $path = 'assets/admin/images';

        // if ($request->hasFile('service_image[]')) {
        // for ($i = 0; $i < count($request->file('service_image')); $i++) {
        // $file = $request->file("service_image")[$i];

        // }
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

        foreach ($request->service_image ?? [] as $file) {

            // return (new ResponseController)->sendResponse(1, 'test', $file);
            $image_changed_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path($path), $image_changed_name);
            $img_url = url($path) . "/" . $image_changed_name;
            $attachment = new ServiceAttachment;
            $attachment->attachment_name = $img_url;
            // $attachment->service_id = Service::orderBy('id', 'desc')->first() != null ? Service::orderBy('id', 'desc')->first()->id + 1 : 0;
            $attachment->service_id = $service->id;
            $attachment->save();
        }

        $message = 'Service has been updated successfully';
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
            ->select('users.business_name', 'sub_categories.name as SubCategory', 'users.name as Seller', 'users.role_id', 'users.logo', 'categories.name as Category', 'services.*',
                'services.id as Service_id')->get();
        return response()->json(['services' => $services]);
    }
    // close

    // get specific services
    public function serviceDetail(Request $request)
    {
        if (isset($_GET['id'])) {
            $services = Service::join('categories', 'services.category_id', 'categories.id')
                ->join('sub_categories', 'services.subCategory_id', 'sub_categories.id')
                ->join('users', 'services.added_by', 'users.id')
                ->select('users.business_name', 'users.name as Seller', 'users.role_id', 'users.logo', 'sub_categories.name as SubCategory', 'categories.name as Category', 'services.*',
                    'services.id as Service_id')->where('services.id', $_GET['id'])->first();
            $images = Service::with('hasAttachment')->where('services.id', $_GET['id'])->get();
            $watchlist = 0;
            if (isset($_GET['user_id'])) {
                if (WatchList::where(['service_id' => $services->Service_id, 'user_id' => $request->user_id])->exists()) {
                    $watchlist = 1;
                }
            }
            return response()->json(['services' => $services, 'images' => $images, 'added_to_watchlist' => $watchlist]);
        }
    }
    public function sellerServices()
    {
        // $sellerServices = Service::join('categories', 'services.category_id', 'categories.id')
        //     ->join('sub_categories', 'services.subCategory_id', 'sub_categories.id')
        //     ->join('users', 'services.added_by', 'users.id')
        //     ->select('users.business_name', 'users.name as Seller', 'users.role_id', 'users.logo', 'sub_categories.name as SubCategory', 'categories.name as Category', 'services.*',
        //         'services.id as Service_id')->where('services.added_by', $_GET['id'])->get();

        $sellerServices = Service::select(['id','title','description','main_service_image','created_at','added_by','subCategory_id','category_id'])
        ->with(['haveProvider' => function ($user) {
            $user->select('id','role_id','logo');
        },'subcat'=>function ($subCategory) {
            $subCategory->select('id','name');
        }])
        ->with("averageReviews")
        ->where('services.added_by', $_GET['id'])
        ->get();

        return response()->json(['sellerServices' => $sellerServices]);

    }
    // close
    // get all sercies provider
    public function getAllServiceProviders()
    {
        $seller = User::where('role_id', '2')->get();
        return response()->json(['seller' => $seller]);
        // close
    }

    // get all services
    public function sellerDetail(Request $request)
    {
        if (isset($_GET['id'])) {
            $seller = User::where('id', $_GET['id'])->first();
            $subscription = Subscription::where('stripe_subscription_status', 'active')->where('user_id', $_GET['id'])->get();
            $subscriptionStatus = false;
            if(count($subscription) > 0){
                $subscriptionStatus = true;
            }
            return response()->json(['seller' => $seller, 'subscription'=>$subscriptionStatus]);
        }
    }

    // close

    // save image for url showing

    public function saveServiceImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $path = 'assets/admin/ServiceImages';
            $file = $request->file("image");
            $image_changed_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path($path), $image_changed_name);
            // $path = '/public' . '/' . $path;
            $img_url2 = url($path) . "/" . $image_changed_name;
            return $img_url2;
        }
    }
    // close

    // get service from sub cat
    public function getServiceFromSubCategory(Request $request)
    {
        if (isset($_GET['id'])) {
            $services = Service::join('categories', 'services.category_id', 'categories.id')
                ->join('sub_categories', 'services.subCategory_id', 'sub_categories.id')
                ->join('users', 'services.added_by', 'users.id')
                ->select('users.business_name', 'users.name as Seller', 'users.role_id', 'users.logo',
                    'sub_categories.name as SubCategory', 'categories.name as Category', 'services.*',
                    'services.id as Service_id')->where('services.subCategory_id', $_GET['id'])->get();
            // $images = Service::with('hasAttachment')->where('services.subCategory_id', $_GET['id'])->get();
            $totalServices = count($services);
            return response()->json(['services' => $services
                // , 'images' => $images
                , 'totalServices' => $totalServices,
            ]);
        }
        // close
    }

    // function for counting providers of single category
    public function countCatProviders(Request $request)
    {
        if (isset($_GET['id'])) {
            $providers = DB::table('users')
                ->join('services', 'services.added_by', 'users.id')
                ->where('services.category_id', $_GET['id'])
                ->select('users.*')
                ->distinct()
                ->get();
            $count = count($providers);
            return response()->json(['count' => $count,
                'providers' => $providers,
            ]);
        }
    }

    // close

    //get count name and id of servies
    public function getCatServices_cout()
    {
        $catCount = DB::select('SELECT sub_categories.id,sub_categories.name , count(services.subCategory_id) as total_services FROM sub_categories
        LEFT JOIN services
        ON sub_categories.id = services.subCategory_id
        GROUP BY services.subCategory_id , sub_categories.name, sub_categories.id limit 3');
        return response()->json(['catCount' => $catCount]);
    }
    // close
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class AdminServiceController extends Controller
{
    public function index()
    {
        $pendingServices = Service::where('status', 'pending')->get();
        $approvedServices = Service::where('status', 'approved')->get();
        $rejectedServices = Service::where('status', 'rejected')->get();
        //   return   $services[0]->haveProvider;
        $data = [
            'pendingServices' => $pendingServices,
            'approvedServices' => $approvedServices,
            'rejectedServices' => $rejectedServices,
        ];
        return view('admin.services.index', $data);
    }
    public function changeServiceStatus(Request $request)
    {
        if ($request->action == 'approve') {
            $service = Service::find($request->id);
            if ($service) {
                $service->status = 'approved';
                return response()->json(['success' => true, 'message' => 'Service status has been updated']);
            } else {
                return response()->json(['success' => false, 'message' => 'Cant update Service Status']);
            }
        }
        if ($request->action == 'reject') {

        }
    }
}

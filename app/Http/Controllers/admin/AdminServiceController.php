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
                $service->save();
                return response()->json(['success' => true, 'message' => 'Service status has been updated']);
            } else {
                return response()->json(['success' => false, 'message' => 'Unable to update Service Status']);
            }
        }
        if ($request->action == 'reject') {
            $service = Service::find($request->id);
            if ($service) {
                $service->status = 'rejected';
                $service->save();
                return response()->json(['success' => true, 'message' => 'Service status has been updated']);
            } else {
                return response()->json(['success' => false, 'message' => 'Unable to update Service Status']);
            }
        }
        if ($request->action == 'delete') {
            $service = Service::find($request->id);
            if ($service) {
                $service->delete();
                return response()->json(['success' => true, 'message' => 'Service has been deleted']);
            } else {
                return response()->json(['success' => false, 'message' => 'Unable to delete Service']);
            }
        }
        if ($request->action == 'view') {
            $service = Service::where('id', $request->id)->first();
            if ($service) {
                return response()->view('admin.services.viewServiceModal', compact('service'));
            } else {
                return response()->json(['success' => false, 'message' => 'Unable to View Service']);
            }
        }
    }
}

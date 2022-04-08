<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AssignedTask;
use Illuminate\Http\Request;

class AssignedTaskController extends Controller
{
    public function index()
    {
        // $detail = User::with([
        //     'hasService' => function ($q1) {
        //         return $q1->with('assignedTask');
        //     }])->get();
        $detail = User::join('services', 'users.id', 'services.added_by')
            ->join('assigned_tasks', 'services.id', 'assigned_tasks.service_id')
            ->select('assigned_tasks.message', 'services.title as Service_title', 'assigned_tasks.user_id as User_id', 'assigned_tasks.id as task_id', 'assigned_tasks.status', 'users.name as provider')
            ->get();
        $data = [
            'detail' => $detail,
        ];
        return view('admin.tasks.index', $data);
    }
    public function changeStatus(Request $request)
    {
        // return $request->all();
        if ($request->action == 'accept') {
            AssignedTask::where('id', $request->id)->update(['status' => 'completed']);
            return response()->json(['success' => true, 'message' => 'Status changed successfully']);
        } else if ($request->action == 'accept') {
            AssignedTask::where('id', $request->id)->update(['status' => 'reject']);
            return response()->json(['success' => true, 'message' => 'Status changed successfully']);

        } else {
            return response()->json(['success' => false, 'message' => 'Error Occured']);

        }
    }

}

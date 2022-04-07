<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssignedTaskController extends Controller
{
    public function index()
    {
        return view('admin.tasks.index');
    }

}

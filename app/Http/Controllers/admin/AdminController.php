<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Auth;
class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('adminLogout');
    }
}

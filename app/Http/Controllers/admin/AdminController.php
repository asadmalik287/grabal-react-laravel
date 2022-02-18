<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }

    public function logout()
    {
        FacadesAuth::logout();
        return redirect()->route('login');

    }
}

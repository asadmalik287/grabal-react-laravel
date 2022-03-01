<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }
    public function manageServiceProvider()
    {
        $serviceProviders = User::where('role_id','2')->get();
        return view('admin.user.serviceProvider.index', compact('serviceProviders'));
    }

    public function logout()
    {
        FacadesAuth::logout();
        return redirect()->route('login');

    }
}

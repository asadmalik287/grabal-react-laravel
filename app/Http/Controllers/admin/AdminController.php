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
        $seller = false;
        if (isset($_GET['id'])) {
            $serviceProviders = User::where('id', $_GET['id'])->get();
            $seller = true;
        } else {
            $serviceProviders = User::where('role_id', '2')->get();
        }
        $data = [
            'serviceProviders' => $serviceProviders,
            'seller' => $seller,
        ];
        return view('admin.user.serviceProvider.index', $data);
    }

    public function logout()
    {
        FacadesAuth::logout();
        return redirect()->route('login');

    }
}

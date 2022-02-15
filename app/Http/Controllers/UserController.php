<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    function register(Request $req){
        $user = new User;
        $user->username = $req->username;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->confirm_password = Hash::make($req->confirm_password);
        $user->username = $req->username;
        $user->country = $req->country;
        $user->f_name = $req->f_name;
        $user->l_name = $req->l_name;
        $user->dob = $req->date.'-'.$req->month.'-'.$req->year;
        $user->phoneNumber = $req->countryCode.'-'.$req->number;
        $user->gender = $req->gender;
        $user->address = $req->address;
        $user->town = $req->town;
        $user->save();

        return $user;

    }

    function login(Request $req){
        $user = User::where('email', $req->email)->first();
        if($user || !Hash::check($req->password, $user->password)){
            return ["error"=>"Email or password is not matched"];
        }
        return $user;
    }

}

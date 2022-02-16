<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function test()
    {
        return response()->json(['success' => true, 'message' => 'suasdadasdasdasdccess']);
    }

    public function register(Request $request)
    {
        // return($request->all());
        $validator = Validator::make($request->all(), [
            'f_name' => 'required|string',
            'l_name' => 'required|string',
            'phone_number' => 'required|number',
            'address' => 'required|string',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'dob' => 'required|date',
            'name' => 'required|unique:users',
            'country' => 'required',
            'gender' => 'required',
            'town' => 'required',
        ]);

        if ($validator->fails()) {
            return (new ResponseController)->sendError(0, $validator->errors());
        }

        $request['password'] = Hash::make($request['password']);
        // if ($request['role_id'] == 2) {

        //     $request['is_verified'] = 0;
        // } else {

        $request['is_verified'] = 1;
        // }

        // $request['is_active'] = 1;
        // $request['country_code'] = substr($request['phone'], 0, 3);
        // $request['phone'] = strip_tags($request['phone']);
        // $request['phone'] = substr($request['phone'], -10);

        // if ($request->has('profile_pic')) {

        //     $file = $request->file('profile_pic');

        //     $name = $file->getClientOriginalName();
        //     $name = date("dmyHis.") . gettimeofday()["usec"] . '_' . $name;

        //     $directory = "assets/backend/image/user_profile_pic";
        //     //$path = base_path() . "/public" . $directory;
        //     $path = $directory;

        //     $file->move($path, $name);

        //     $request['picture'] = $path . '/' . $name;
        // }
        $user = User::create($request->except(["confirm_password"]));
        if ($user) {

            // return   $user['token'] ;
            if ($user->is_verified == 1) {
                $message = "Registration successful";
            } else {
                $message = "Your account is under verification!";
            }
            $user = User::find($user->id);
            $user['token'] = $user->createToken('token')->accessToken;

            // if ($user->picture != null) {

            //     $user->picture = getImageUrl($user->picture);
            // }

            return (new ResponseController)->sendResponse(1, $message, $user);
        } else {
            $error = "Something went wrong! Please try again";
            return (new ResponseController)->sendError(0, $error);
        }

    }

    //login APi for user sign in
    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required',
        ]);

        // $platform = $request['signup_source'];

        /*if(strtolower($platform) == 'ios'){
        $validator = Validator::make($request->all(), [
        'app_version' => 'required',
        ]);
        }elseif(strtolower($platform) == 'android'){
        $validator = Validator::make($request->all(), [
        'app_version' => 'required',
        ]);
        }*/

        if ($validator->fails()) {

            return (new ResponseController)->sendError(0, $validator->errors());
        }

        //$status =  (new ResponseController)->check_version($request->all());

        // $request['phone'] = strip_tags($request['phone']);
        // $request['phone'] = substr($request['phone'], -10);
        // return $request->name;
        if (filter_var($request['name'], FILTER_VALIDATE_EMAIL)) {
            if (!Auth::attempt(['email' => $request->name, 'password' => $request->password])) {
                $error = "Phone or password does not match!";
                return (new ResponseController)->sendError(0, $error);
            }
        } else {
            if (!Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
                $error = "Phone or password does not match!";
                return (new ResponseController)->sendError(0, $error);
            }
        }
        // $credentials = request(['name', 'password']);
        // if (!Auth::attempt($credentials)) {
        //     $error = "Phone or password does not match!";
        //     return  (new ResponseController)->sendError(0, $error);
        // }
        $user = $request->user();
        $user['token'] = $user->createToken('token')->accessToken;

        //UserDevice::updateOrCreate(["serial" => $request['serial']],array_merge($request->except(['name', 'phone', 'password', 'login_with']),['status' => 'A','user_id' => $user->id]));

        if ($user) {
            // dd($user);
            if ($user->is_verified == 0) {

                Auth::logout();

                $status = -1;
                $message = "Sorry! Your account is not verified by admin.";
                return (new ResponseController)->sendError($status, $message);

            } else {

                // if($user->picture != null) {

                //     $user->picture = getImageUrl($user->picture);
                // }

                $status = 1;
                $message = "Login successful";
                return (new ResponseController)->sendResponse($status, $message, $user);
            }

        } else {
            $message = "Login unsuccessful";
            return (new ResponseController)->sendError(0, $message);
        }
    }
}

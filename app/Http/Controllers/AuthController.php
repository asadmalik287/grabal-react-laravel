<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\PhoneNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // test api/middleware function starts
    public function test()
    {
        $message = 'success';
        $user = 'Test User';
        return (new ResponseController)->sendResponse(1, $message, $user);

    }
    // test api/middleware  function ends

    // register api for user starts
    public function register(Request $request)
    {
        // validate inputs
        $validator = Validator::make($request->all(), [
            'f_name' => 'required|string',
            'l_name' => 'required|string',
            'phone_number' => 'required',
            // 'phone_number' => ['required', new PhoneNumber],
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

        // if validator fails
        if ($validator->fails()) {
            return (new ResponseController)->sendError(0, $validator->errors());
        }

        // password encryption
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

        // // save profile picture of user
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

        // create new user and save db
        $user = User::create($request->except(["confirm_password"]));
        if ($user) {

            // check verification of user
            if ($user->is_verified == 1) {
                $message = "Registration successful";
            } else {
                $message = "Your account is under verification!";
            }
            // get registered user to return token
            $user = User::find($user->id);
            $user['token'] = $user->createToken('token')->accessToken;

            // if ($user->picture != null) {
            //     $user->picture = getImageUrl($user->picture);
            // }

            // return response
            return (new ResponseController)->sendResponse(1, $message, $user);
        } else {
            $error = "Something went wrong! Please try again";
            return (new ResponseController)->sendError(0, $error);
        }

    }
    // register api for user function ends

    //login APi for user to sign in function starts
    public function login(Request $request)
    {
        // validate the email,user name and password
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

        // if validator fails
        if ($validator->fails()) {
            return (new ResponseController)->sendError(0, $validator->errors());
        }

        //$status =  (new ResponseController)->check_version($request->all());
        // $request['phone'] = strip_tags($request['phone']);
        // $request['phone'] = substr($request['phone'], -10);
        // return $request->name;

        // if user is logging in through email
        if (filter_var($request['name'], FILTER_VALIDATE_EMAIL)) {
            // if credentials are not correct
            if (!Auth::attempt(['email' => $request->name, 'password' => $request->password])) {
                $error = "Phone or password does not match!";
                return (new ResponseController)->sendError(0, $error);
            }
        }
        // if user is logging in through username
        else {
            // if credentials are not correct
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
        // check if user is logged in successfully
        if ($user) {
            // if user is not verified yet
            if ($user->is_verified == 0) {
                Auth::logout();
                $status = -1;
                $message = "Sorry! Your account is not verified by admin.";
                return (new ResponseController)->sendError($status, $message);

            } else {

                // // show user image
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
    //login APi for user to sign in function ends

}

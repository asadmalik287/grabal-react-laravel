<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        dd('gi');
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'phone' => ['required', new PhoneNumberNotExist],
            'address' => 'required|string',
            'email' => 'unique:users',
            'cnic' => 'required|unique:users',
            'role_id' => 'required',
            'signup_source' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {

            return $this->sendError(0, $validator->errors()->first());
        }

        $request['password'] = Hash::make($request['password']);

        if ($request['role_id'] == 2) {

            $request['is_verified'] = 0;
        } else {

            $request['is_verified'] = 1;
        }

        $request['is_active'] = 1;
        $request['country_code'] = substr($request['phone'], 0, 3);
        $request['phone'] = strip_tags($request['phone']);
        $request['phone'] = substr($request['phone'], -10);

        if ($request->has('profile_pic')) {

            $file = $request->file('profile_pic');

            $name = $file->getClientOriginalName();
            $name = date("dmyHis.") . gettimeofday()["usec"] . '_' . $name;

            $directory = "assets/backend/image/user_profile_pic";
            //$path = base_path() . "/public" . $directory;
            $path = $directory;

            $file->move($path, $name);

            $request['picture'] = $path . '/' . $name;
        }

        $user = User::create($request->except(["confirm_password"]));
        if ($user) {

            $user['token'] = $user->createToken('token')->accessToken;
            if ($user->is_verified == 1) {
                $message = "Registration successful";
            } else {
                $message = "Your account is under verification!";
            }
            $user = User::find($user->id);

            if ($user->picture != null) {

                $user->picture = getImageUrl($user->picture);
            }

            //inserting user device record

            UserDevice::updateOrCreate(["serial" => $request['serial']], [
                'user_id' => $user->id,
                'manufacturer' => $request['manufacturer'],
                'model' => $request['model'],
                'platform' => $request['signup_source'],
                'app_version' => $request['app_version'],
                'uuid' => $request['uuid'],
                'version' => $request['version'],
                'token' => $request['token'],
                'status' => 'A']);

            return $this->sendResponse(1, $message, $user);
        } else {
            $error = "Something went wrong! Please try again";
            return $this->sendError(0, $error);
        }

    }
}

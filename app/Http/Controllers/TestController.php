<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TestController extends Controller
{
    public function test()
    {
        return response()->json(['success' => true, 'message' => 'suasdadasdasdasdccess']);
    }
    public function signup(Request $request)
    {
        // return($request->all());
        $validator = Validator::make($request->all(), [
            'f_name' => 'required|string',
            'l_name' => 'required|string',
            'phone_number' => 'required',
            'address' => 'required|string',
            'email' => 'unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'dob' => 'required|date',
            'name' => 'required',
            'country' => 'required',
            'gender' => 'required',
            'town' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError(0, $validator->errors());
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

            return $this->sendResponse(1, $message, $user);
        } else {
            $error = "Something went wrong! Please try again";
            return $this->sendError(0, $error);
        }

    }
    public function sendResponse($status, $message, $result)
    {
        $response = [
            'status' => $status,
            'message' => $message,
            'result' => $result,
        ];
        return response()->json($response, 200);
    }

    public function sendError($status, $error, $debug = null)
    {
        $response = [
            'status' => $status,
            'message' => $error,
            // 'debug' => $debug
        ];

        return response()->json($response);
    }
}

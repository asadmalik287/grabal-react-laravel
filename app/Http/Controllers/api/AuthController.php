<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Mail\AuthenticationMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Session;
use Spatie\Permission\Models\Role;

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
            'email' => 'required|unique:users',
            // 'country' => 'required',
            'role_id' => 'required',
            // 'phone_number' => ['required', new PhoneNumber],

            // 'address' => 'required|string',
            // 'password' => 'required|min:8',
            // 'confirm_password' => 'required|same:password',
            // 'dob' => 'required|date',
            // 'name' => 'required|unique:users',
            // 'gender' => 'required',
            // 'town' => 'required',
        ]);

        // if validator fails
        if ($validator->fails()) {
            return (new ResponseController)->sendError(0, $validator->errors());
        }

        // password encryption
        // $password = $request['password'];
        // $request['password'] = Hash::make($request['password']);

        $password = substr(str_shuffle('012#$%^&345&^^%%#s35+DE+_)gsdgsgsd$&*#@_36363#$5&^^%%#s35+DE+_)gsd%^4667%$@$89$%$$sgsd$&*#@_36363#ABCDE+_)gsdgsgsdd@$%^&($&#+_(@gFGHIJK+))(*^&LMNOPsdgsgw45_)(*&^^$&$*%(%)_%_+#+#3trfesfgs___+)()gsdg_)(*&^%$sQRSTUVWXYZ'), 1, 8);
        $passwordHashed = Hash::make($password);
        $userName = strtok($request['email'], '@');
        $request['password'] = $passwordHashed;
        $request['name'] = $userName;
        $request['slug'] = $userName;
        // return $request['slug'];
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
            Mail::to($user->email)->send(new AuthenticationMail(['userName' => $userName, 'password' => $password]));
            // Mail::send('mails.credentials', ['userName' => $userName, 'password' => $password], function ($message) use ($user) {
            //     $message->to($user->email);
            //     $message->subject('Customer Login Details');
            // });

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
                Session::put('user', $user);

                return (new ResponseController)->sendResponse($status, $message, Session::get('user'));
            }

        } else {
            $message = "Login unsuccessful";
            return (new ResponseController)->sendError(0, $message);
        }
    }
    //login APi for user to sign in function ends
    public function serviceProviderRegister(Request $request)
    {
        // validate inputs
        $validator = Validator::make($request->all(), [
            'business_name' => 'required|string',
            'contact_person' => 'required',
            'phone_number' => 'required',
            'email' => 'required|unique:users',
            // 'vetting_doc' => 'required',
            // 'vaccinations_doc' => 'required',
            // 'certifications_doc' => 'required',
            'message' => 'required',
            'role_id' => 'required',
            'logo' => 'required',
        ]);

        // if validator fails
        if ($validator->fails()) {
            return (new ResponseController)->sendError(0, $validator->errors());
        }
        // password encryption
        $password = substr(str_shuffle('012#$%^&345&^^%%#s35+DE+_)gsdgsgsd$&*#@_36363#$5&^^%%#s35+DE+_)gsd%^4667%$@$89$%$$sgsd$&*#@_36363#ABCDE+_)gsdgsgsdd@$%^&($&#+_(@gFGHIJK+))(*^&LMNOPsdgsgw45_)(*&^^$&$*%(%)_%_+#+#3trfesfgs___+)()gsdg_)(*&^%$sQRSTUVWXYZ'), 1, 8);
        $passwordHashed = Hash::make($password);
        $userName = strtok($request['email'], '@');
        $request['is_verified'] = 1;
        $request['slug'] = $userName;

        // $request['is_active'] = 1;
        // $request['country_code'] = substr($request['phone'], 0, 3);
        // $request['phone'] = strip_tags($request['phone']);
        // $request['phone'] = substr($request['phone'], -10);

        // // save profile picture of user
        // if ($request->has('vaccinations_doc')) {
        //     $file = $request->file('vaccinations_doc');
        //     $name = $file->getClientOriginalName();
        //     $name = date("dmyHis.") . gettimeofday()["usec"] . '_' . $name;
        //     $path = "assets/backend/vac_docs";
        //     $save_path = public_path() . '/' . $path;
        //     $file->move($save_path, $name);
        //     //$path = base_path() . "/public" . $directory;
        //     // $file->move($path, $name);
        //     // $request['vaccinations_doc'] = $name;
        // }
        // if ($request->has('certifications_doc')) {
        //     $file = $request->file('certifications_doc');
        //     $name = $file->getClientOriginalName();
        //     $name = date("dmyHis.") . gettimeofday()["usec"] . '_' . $name;
        //     $path = "assets/backend/cert_docs";
        //     $save_path = public_path() . '/' . $path;
        //     $file->move($save_path, $name);
        // }
        // if ($request->has('vetting_doc')) {
        //     $file = $request->file('vetting_doc');
        //     $name = $file->getClientOriginalName();
        //     $name = date("dmyHis.") . gettimeofday()["usec"] . '_' . $name;
        //     $path = "assets/backend/vet_docs";
        //     $save_path = public_path() . '/' . $path;
        //     $file->move($save_path, $name);
        // }
        $path = 'assets/admin/images/logo';


        $logo = '';
        if ($request->hasFile('logo')) {
            $file1 = $request->file("logo");
            $image_changed_name1 = time() . '.' . $file1->getClientOriginalExtension();
            $file1->move(public_path($path), $image_changed_name1);
            $img_url1 = url($path) . "/" . $image_changed_name1;
            $logo = $img_url1;
        }

        return $logo;

        // create new user and save db
        $user = User::create([
            'business_name' => $request['business_name'],
            'email' => $request['email'],
            'name' => $userName,
            // 'vaccinations_doc' => $name,
            'contact_person' => $request['contact_person'],
            'phone_number' => $request['phone_number'],
            // 'vetting_doc' => $name,
            // 'certifications_doc' => $name,
            'message' => $request['message'],
            'role_id' => $request['role_id'],
            'password' => $passwordHashed,
            // 'logo' => $request['logo'],
            'logo' => $logo,
            'slug' => $request['slug'],
            'is_verified' => $request['is_verified'],
        ]);

        return $user;

        $role = Role::where('id', $request['role_id'])->first();
        $user->assignRole($role);

        if ($user) {
            Mail::send('mails.credentials', ['userName' => $userName, 'password' => $password], function ($message) use ($user) {
                $message->to($user->email);
                $message->subject('Login Credentials');
            });

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

    // update email api function starts
    public function updateEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_email' => 'required|email',
            'new_email' => 'required|unique:users,email|different:current_email|email',
            'password' => 'required',
        ]);

        // if validator fails
        if ($validator->fails()) {
            return (new ResponseController)->sendError(0, $validator->errors());
        } else {
            // check user authentication and change email
            try {
                if (!Auth::attempt(['email' => $request->current_email, 'password' => $request->password])) {
                    $error = "You have entered wrong password!";
                    return (new ResponseController)->sendError(0, $error);
                } else {
                    $userName = strtok($request->new_email, '@');
                    $userUpdate = User::where('id', $request->user_id)->update([
                        'email' => $request->new_email,
                        'slug' => $userName,
                        'name' => $userName,
                    ]);
                    if ($userUpdate) {
                        $user = User::where('id', $request->user_id)->first();
                        $status = 1;
                        $message = "Email updated successfully";
                        Session::put('user', $user);
                        return (new ResponseController)->sendResponse($status, $message, Session::get('user'));
                    } else {
                        $error = "Error Ocured!";
                        return (new ResponseController)->sendError(0, $error);
                    }

                }
            } catch (\Exception$e) {
                $error = $e->getMessage();
                return (new ResponseController)->sendError(0, $error);
            }

        }
    }
    // close

    // update user password api function starts
    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|min:8|different:current_password',
        ]);

        // if validator fails
        if ($validator->fails()) {
            return (new ResponseController)->sendError(0, $validator->errors());
        } else {
            // check user authentication and change email
            try {
                $user = User::where('id', $request->user_id)->first();
                if ($user) {
                    if (!Auth::attempt(['email' => $user->email, 'password' => $request->current_password])) {
                        $error = "You have entered wrong old password!";
                        return (new ResponseController)->sendError(0, $error);
                    } else {
                        $password = Hash::make($request->new_password);
                        $userUpdate = User::where('id', $request->user_id)->update([
                            'password' => $password,
                        ]);

                        $status = 1;
                        $message = "Password updated successfully";
                        Session::put('user', $user);
                        return (new ResponseController)->sendResponse($status, $message, Session::get('user'));
                    }
                } else {
                    $error = "Error Ocured!";
                    return (new ResponseController)->sendError(0, $error);
                }

            } catch (\Exception$e) {
                $error = $e->getMessage();
                return (new ResponseController)->sendError(0, $error);
            }

        }
    }
    // close
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\RoleUser;

use Mail;
use DB;
use Auth;


class ApiController extends Controller {

    //
    // Get reange of year
    public function login(Request $request) {
        $data = $request->all();
        //echo '<pre>';print_r($data);die;
        $response = [];
        if (isset($data['email']) && $data['email'] != "") {
            $studentlist = User::where('email', $data['email'])->with(['roles'])->first();
        } else if (isset($data['phone']) && $data['phone'] != "") {
            $studentlist = User::where('phone', $data['phone'])->first();
        } else if (isset($data['username']) && $data['username'] != "") {
            $studentlist = User::where('username', $data['username'])->first();
        }


        if ($studentlist) {
            if ($studentlist->verified == 1) {
                if (isset($data['email']) && $data['email'] != "") {
                    if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
                        $user = Auth::user();
                        $response['token'] = $user->createToken('frontend')->accessToken;
                        $response['user'] = $user;
                        $response['status'] = 1;
                        $response['capacity'] = 5;
                        $response['remaining'] = 0;
                        /* if(!empty($studentlist->roles) && $studentlist->roles->first()->slug == 'teacher'){
                          $response['capacity'] = 30;
                          }
                          $response['remaining'] =  User::where('parent_id',$user->id)->whereNull('deleted_at')->whereHas('roles', function ($query) {
                          $query->where('role_id', 2);
                          })->count(); */
                        return response()->json($response, $this->successStatus);
                    } else {
                        $response['error'] = 'Invalid username or password';
                        $response['status'] = 0;
                        return response()->json($response);
                    }
                } else if (isset($data['phone']) && $data['phone'] != '') {
                    if (Auth::attempt(['phone' => $data['phone'], 'password' => $data['password']])) {
                        $user = Auth::user();
                        $response['token'] = $user->createToken('frontend')->accessToken;
                        $response['user'] = $user->with('roles');
                        $response['status'] = 1;
                        $response['capacity'] = 5;
                        $response['remaining'] = 0;
                        if (!empty($studentlist->roles) && $studentlist->roles->first()->slug == 'teacher') {
                            $response['capacity'] = 30;
                        }
                        $response['remaining'] = User::where('parent_id', $user->id)->whereNull('deleted_at')->whereHas('roles', function ($query) {
                                    $query->where('role_id', 2);
                                })->count();
                        return response()->json($response, $this->successStatus);
                    } else {
                        $response['error'] = 'Invalid username or password';
                        $response['status'] = 0;
                        return response()->json($response);
                    }
                } else if (isset($data['username']) && $data['username'] != "") {
                    if (Auth::attempt(['username' => $data['username'], 'password' => $data['password']])) {
                        $user = Auth::user();
                        $response['token'] = $user->createToken('frontend')->accessToken;
                        $response['user'] = $user;
                        $response['status'] = 1;
                        $response['capacity'] = 5;
                        $response['remaining'] = 0;
                        /* if(!empty($studentlist->roles) && $studentlist->roles->first()->slug == 'teacher'){
                          $response['capacity'] = 30;
                          }
                          $response['remaining'] =  User::where('parent_id',$user->id)->whereNull('deleted_at')->whereHas('roles', function ($query) {
                          $query->where('role_id', 2);
                          })->count(); */
                        return response()->json($response, $this->successStatus);
                    } else {
                        $response['error'] = 'Invalid username or password';
                        $response['status'] = 0;
                        return response()->json($response);
                    }
                }
            } else {
                $response['error'] = 'Your account is not verified, please check your email to verify your account';
                $response['status'] = 0;
                return response()->json($response);
            }
        } else {
            $response['error'] = 'Unauthorised request';
            $response['status'] = 0;
            return response()->json($response);
        }
    }

   
    public function memberSignUp(Request $request) {
        
                $data = array(
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'name' => $request->first_name.' '.$request->last_name,
                    'email' => $request->email,                    
                    'mobile' => ' ',                    
                    'password' => Hash::make($request->password),
                    
                );
                $userSave = User::create($data);
				if($userSave){
					$createRole = \App\UserRole::create(['user_id' => $userSave->id, 'role_id' => 3]);
					$userdata= $userSave;
					return request()->json(200, $userdata);
				} else {    
					return request()->json(200, ["data not send"]);
				}
           
        
    }

    public function memberSignUpPhone(Request $request) {
        $input = $request->all();
        $data = Input::all();
        //dd($data);
        extract($data);
        if (empty($phonecode)) {
            $phonecode = 852;
        }
        $rules = [
            'email' => 'string|email|max:255|unique:users',
            'phone' => 'required|unique:users',
            'username' => 'required|unique:users',
        ];

        $this->validate($request, $rules);


        if (isset($phone) && $phone != "") {
            //$userrecord = DB::table('users')->select('users.*')->where('email', $email)->first();
            $userrecord = User::where('phone', $phone)->first();
        } else {
            $userrecord = array();
        }

        if ($userrecord && $userrecord->facebook_id) {
            $user = array(
                'username' => $username,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'phone' => $phone,
                'email' => $email,
                'country_code' => $phonecode,
            );

            $user_id = DB::table('users')->where('id', $userrecord->id)->update($user);

            if ($userrecord) {
                $userdata = array(
                    'user_id' => $userrecord->id,
                    'country_id' => $country,
                    'occupation_id' => $occupation,
                    'org_type' => $org_type,
                    'room_type' => $room_type,
                );
                $createRole = \App\UserRole::create(['user_id' => $userrecord->id, 'role_id' => 3]);
                //$subscriber = Subscriber::updateOrCreate(['email'=> $email,'status'=> 1,'is_free_test'=>1]);

                /* $role_user=array('role_id'=>'1');
                  DB::table('role_user')->where('user_id', $userrecord->id)->update($role_user); */
                $key = rand(pow(10, 5), 3000);
                $verifyUser = VerifyUser::updateOrCreate([
                            'user_id' => $userrecord->id,
                            'otp' => $key,
                            'token' => str_random(40)
                ]);
                $studentrecord = DB::table('students')->select('students.*')->where('type', 0)->where('status', 1)->get()->limit(1);
                if (count($studentrecord)) {
                    foreach ($studentrecord as $student) {
                        $studentUser = UserStudent::updateOrCreate([
                                    'user_id' => $userrecord->id,
                                    'student_id' => $student->id
                        ]);
                    }
                }
                DB::table('member_records')->where('user_id', $userrecord->id)->update($userdata);

                $freetrail = DB::table('free_trails')->select('free_trails.*')->where('status', 1)->first();
                //$membership_data=array('user_id'=>$userrecord->id,'membership_type'=>'free','status'=>1,'duration'=>$freetrail->free_day);
                $membership_data = array('name' => 'free', 'user_id' => $user_id, 'membership_type' => 'free', 'status' => 1, 'duration' => 14, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'));
                DB::table('memberships')->updateOrInsert($membership_data);
                if ($verifyUser) {
                    $key = $verifyUser->otp;

                    try {
                        $response = $this->sendSmsCode(["country_code" => $phonecode, "phone" => $phone], $key);
                    } catch (Exception $e) {

                        return response()->json(['message' => 'Mobile No is not Valid', 'status' => 0]);
                    }
                }
            } else {
                return response()->json(['message' => 'data not send', 'status' => 0]);
            }
            return response()->json(['message' => 'Send Otp on Your Registerd Mobile Successfully', 'status' => 1, 'userdata' => $userdata]);
        } else {


            /*             * ********User Register ********** */
            $user = new User;
            $user->username = $username;
            $user->firstname = $firstname;
            $user->lastname = $lastname;
            $user->email = $email;
            $user->phone = $phone;
            $user->country_code = $phonecode;
            $user->save();
            $user_id = $user->id;


            if ($user_id) {

                /*                 * ********User Role ********** */
                /* $roleuser = new RoleUser;
                  $roleuser->role_id = 1;
                  $roleuser->user_id = $user_id;
                  $roleuser->save(); */
                $createRole = \App\UserRole::create(['user_id' => $user_id, 'role_id' => 3]);
                //$subscriber = Subscriber::updateOrCreate(['email'=> $email,'status'=> 1,'is_free_test'=>1]);

                $studentrecord = DB::table('students')->select('students.*')->where('type', 0)->where('status', 1)->limit(1)->get();
                //$studentrecord = DB::table('students')->select('students.id')->where('type', 0)->where('status', 1)->get();
                if (count($studentrecord)) {
                    foreach ($studentrecord as $student) {
                        $studentUser = UserStudent::updateOrCreate([
                                    'user_id' => $user_id,
                                    'student_id' => $student->id
                        ]);
                    }
                }
                /*                 * ********Member Records insert ********** */
                $memberrecords = new MemberRecords;
                $memberrecords->user_id = $user_id;
                $memberrecords->country_id = $country;
                $memberrecords->state_id = 0;
                $memberrecords->city_id = 0;
                $memberrecords->address = '';
                $memberrecords->occupation = $occupation;
                $memberrecords->org_type = $org_type;
                $memberrecords->room_type = $room_type;
                $memberrecords->grade = '';
                $memberrecords->save();

                $freetrail = FreeTrail::where('status', 1)->first();
                //$freetrail = DB::table('free_trails')->select('free_trails.*')->where('status', 1)->first();


                $membership_data = array('name' => 'free', 'user_id' => $user_id, 'membership_type' => 'free', 'status' => 1, 'duration' => 14, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'));
                DB::table('memberships')->updateOrInsert($membership_data);
                $key = rand(pow(10, 5), 3000);
                $verifyUser = VerifyUser::create([
                            'user_id' => $user_id,
                            'otp' => $key,
                            'token' => str_random(40)
                ]);
                if ($verifyUser) {
                    //$key = $verifyUser->otp;
                    try {
                        $response = $this->sendSmsCode(["country_code" => $phonecode, "phone" => $phone], $key);
                    } catch (Exception $e) {

                        return response()->json(['message' => 'Mobile No is not Valid', 'status' => 0]);
                    }
                }
            } else {
                return response()->json(['message' => 'data not send', 'status' => 0]);
                //return request()->json(200,["data not send"]);
            }
            $userdata = array(
                'user_id' => $user_id,
                'country_id' => $country,
                'occupation_id' => $occupation,
                'org_type' => $org_type,
                'room_type' => $room_type,
            );
            return response()->json(['message' => 'Send Otp on Your Registerd Mobile Successfully', 'status' => 1, 'userdata' => $userdata]);
        }
    }

    

    public function setPassword(Request $request) {
        $validatedData = $request->validate([
            'username' => 'required|max:255|min:5|exists:users',
            'password' => 'required|min:6|max:20|regex:/^[a-zA-Z0-9]+$/u|',
            'cpassword' => 'required_with:password|same:password|min:6',
                ], [
            'password.min' => 'Password should be minimum 6 characters ',
            'cpassword.min' => 'Confirm Password should be minimum 6 characters ',
            'password.max' => 'Password should be maximum 20 characters ',
            'password.regex' => "Password can't allow space and special characters  ",
            'cpassword.same' => "Password is not same ",
            'cpassword.required_with' => "Please Fill Confirm Password",
        ]);
        extract(Input::all());
        $userdata = array(
            'password' => Hash::make($password),
            'actual_password' => $password
        );
        $userrecord = User::select('password', 'verified', 'email')->where('username', $username)->get()->first();
        if ($userrecord['verified'] == "" && $userrecord['password'] == "") {
            $userstatus = User::where('username', $username)->update($userdata);
            return response()
                            ->json(['message' => 'Your Password setup successfully ', 'email' => $userrecord['email'], 'status' => 1]);
        } else {
            return response()
                            ->json(['message' => 'Your password is already up to date', 'status' => 2]);
        }
    }

   

    public function changePasswordStudent(Request $request, $uid) {

        $validatedData = $request->validate([
            'password' => 'required|min:4|confirmed|max:4',
            'password_confirmation' => 'required',
                ], [
            'password.required' => 'Please Enter Password',
            'password_confirmation.required' => 'Please Enter Confirm Password.',
        ]);
        $userrecord = User::where('id', $uid)->first();

        if ($userrecord->password) {
            $update = $userrecord->update(array('password' => Hash::make($request->password), 'actual_password' => $request->password));
            //return response()->json(['errors' => 'Your password updated','status'=>1]);
            return response()->json(['message' => 'Password updated.', 'status' => 1]);
        }
        return response()->json(['message' => 'Some error occur.', 'status' => 0]);
    }

   

    public function isUserLogedin() {
        $user = Auth::user();

        if (Auth::check()) {
            $user = Auth::user();
            return response()->json(['user' => $user, 'message' => 'User Logedin', 'status' => 1]);
        } else {
            return response()->json(['message' => 'No logedin user found', 'status' => 2]);
        }
    }

   
    public function fbLogin(Request $request) {
        $email = $request->email;

        $userCount = \App\User::where('email', $email)->get()->count();
        if ($userCount == 0) {
            //Create User
            $username = explode('@', $request->email);
            $data['username'] = $username[0];
            $data['email'] = $request->email;
            $data['first_name'] = $request->name;
            $data['facebook_id'] = $request->token;
            $data['password'] = bcrypt('123456');
            $data['actual_password'] = '123456';
            $user = \App\User::create($data);
            if ($user) {
                \App\UserRole::create(['role_id' => 3, 'user_id' => $user->id]);
            }


            return response()->json(['user' => $user, 'status' => 1, 'message' => 'Success']);
        } else {
            //Old User
            $user = \App\User::where('email', $email)->first();
            return response()->json(['user' => $user, 'status' => 1, 'message' => 'Success']);
        }
    }

    
}

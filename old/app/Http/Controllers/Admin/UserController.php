<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin\role;
use App\Models\admin\UserForm;
use App\Models\admin\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = admin::all();
        return view ('admin.user.index',compact('users'));
    }
	
	 public function display()
    {
        $users = admin::all();
		$title 			  = 	array('pageTitle' => 'User List');
        return view('admin.user.index',$title)->with('users',$users);
       
    }
	
	public function usersDetail($id)
    {
		$userform=new UserForm();
        $result = $userform->getUserFormData($id);
		$title 			  = 	array('pageTitle' =>'User Data');
        return view('admin.user.customer_data',$title)->with(['result'=>$result,'user_files'=>$userform]);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = role::all();
		 $title 			  = 	array('pageTitle' => 'New User');
        return view('admin.user.create',$title)->with('roles',$roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            
            'password' => 'required|string|min:6|confirmed',
        ]);
        $request['password'] = bcrypt($request->password);
        $user = admin::create($request->all());
        $user->roles()->sync($request->role);
        return redirect(route('user.display'))->with('message','Added Admin User Successfully');
    }
	
	public function test(Request $request)
    {
       echo 'dd';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = admin::find($id);
        $roles = role::all();
		 $title 			  = 	array('pageTitle' => 'Edit User');
        
		return view('admin.user.edit',$title)->with('user',$user)->with('roles',$roles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|numeric',
        ]);
        $user = admin::where('id',$id)->update($request->except('_token','_method','role'));
        admin::find($id)->roles()->sync($request->role);
        return redirect(route('user.index'))->with('message','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = admin::find($id);
        $users->roles()->detach();
        $users->delete();
        return redirect (route('user.index'))->with('message','Admin User Deleted Successfully');
    }
}

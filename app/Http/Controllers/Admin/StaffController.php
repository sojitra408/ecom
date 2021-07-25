<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin\role;
use App\Models\admin\staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Staff::all();
        return view ('admin.staff.index',compact('staff'));
    }
	
	 public function display()
    {
        $staff = Staff::all();
		$title 			  = 	array('pageTitle' => 'User List');
        return view('admin.staff.index',$title)->with('staff',$staff);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
		 $title 			  = 	array('pageTitle' => 'New User');
        return view('admin.staff.create',$title);
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
            'email' => 'required|string|email|max:255|unique:users',
             'phone' => 'required|max:10',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $request['password'] = bcrypt($request->password);
        $user = Staff::create($request->all());
       
        return redirect(route('staff.display'))->with('message','Added   Successfully');
    }
	
	 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Staff::find($id);
       
		 $title 			  = 	array('pageTitle' => 'Edit User');
        
		return view('admin.staff.edit',$title)->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
			 'phone' => 'required|max:10',
            
        ]);
		
        $user = Staff::where('id',$request->id)->update($request->except('_token','_method','email'));
        
        return redirect(route('staff.display'))->with('message','User updated successfully');
    }
	
	 public function changepass($id)
    {
		 $title   = array('pageTitle' => 'Change Password'); 
        $user = Staff::find($id);
		 
		return view('admin.staff.changepassword',$title)->with('user',$user);
		
        
		 
    }
	
	
 public function changepass_post(Request $request)
    {
		 
		
		
		 $this->validate($request, [
		'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
		'password_confirmation' => 'min:6'
		]);
        $user = Staff::find($request->id);
        
		$user->password = bcrypt($request->password);
        $user->save();
		
        return redirect(route('staff.display'))->with('message','Password Changed Successfully');
		 
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
        return redirect (route('staff.index'))->with('message','Admin User Deleted Successfully');
    }
}

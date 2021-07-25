<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\admin\permission;
use App\Models\admin\admin;
use App\Http\Controllers\Controller;
use App\UserPermission;
use App\User;
use DB;
use Session;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 public $permission=null;
public function __construct()
		{
$this->permission= new UserPermission;
$this->middleware('auth:admin');
 

}
	 
    public function index()
    {   
		 
        $permissions = Admin::all();
		 $title 			  = 	array('pageTitle' => '  User List');
        
		return view('admin.permission.index',$title)->with('permissions',$permissions);
        
		 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		if( $this->permission->hasPermission(Session::get('logUserId'),'user')==true)
		{
        return view('admin.permission.create');
		}else{
		return redirect('admin/home')->with('error_msg', 'You Dont have permission to access'); 
		}
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
            'name' => 'required|max:50',
			'email' => 'required|email|unique:admins',
			'phone' => 'required',
            'password'  => 'required',
			 'userType'  => 'required'
            ]);
			 
        $permission = new Admin;
		
		
        $permission->name = $request->name;
        $permission->email = $request->email;
		$permission->password = bcrypt($request->password);
		$permission->status = 1;
		$permission->phone = $request->phone;
		$permission->userType = $request->userType;
        $permission->save();
		DB::table('user_permission')->insert(array('user_id'=>$permission->id)) ;
		DB::table('admin_roles')->insert(array('admin_id'=>$permission->id,'role_id'=>2)) ;
        return redirect(route('permission.index'))->with('message','User Added Successfully');
		 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		 $title   = array('pageTitle' => 'Edit User Permission');
        
		
        $permission = Admin::find($id);
		$userPermission=UserPermission::where('user_id',$id)->first();
		
		 
		
		$userPermission= @explode(',',$userPermission->permission); 
		
       
		return view('admin.permission.edit',$title)->with('permission',$permission)->with('userPermission',$userPermission);
		 
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
         
         
		
		UserPermission::where('user_id',$request->id)->update(array(
                         'permission'=>@implode(',',$request->permission)));
		 
		
        return redirect(route('permission.index'))->with('message','Edited User Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		if( $this->permission->hasPermission(Session::get('logUserId'),'user')==true)
		{
        $permissions = Admin::find($id);
        $permissions->delete();
        return redirect(route('permission.index'))->with('message','Deleted user Succussfully');
		}else{
		return redirect('admin/home')->with('error_msg', 'You Dont have permission to access'); 
		}
    }
	
	 public function changepass($id)
    {
		 $title   = array('pageTitle' => 'Change Password'); 
        $permission = Admin::find($id);
		$userPermission=UserPermission::where('user_id',$id)->first();
		
		$userPermission= @explode(',',$userPermission->permission); 
		return view('admin.permission.changepassword',$title)->with('permission',$permission)->with('userPermission',$userPermission);
		
        
		 
    }
	
	
 public function changepass_post(Request $request)
    {
		if( $this->permission->hasPermission(Session::get('logUserId'),'user')==true)
		{
		
		
		 $this->validate($request, [
		'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
		'password_confirmation' => 'min:6'
		]);
        $user = Admin::find($request->id);
        
		$user->password = bcrypt($request->password);
        $user->save();
		
        return redirect(route('permission.index'))->with('message','Password Changed Successfully');
		}else{
		return redirect('admin/home')->with('error_msg', 'You Dont have permission to access'); 
		}
    }	
	
	
}
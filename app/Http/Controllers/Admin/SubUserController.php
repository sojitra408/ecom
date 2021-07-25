<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin\role;
use App\Models\admin\UserForm;
use App\Models\AdminPermission;
use App\Helper\CommonFunction;
use App\User;
use App\UserRole;
use App\UserAddress;
use App\Models\Admin;
use App\Models\admin\admin_role;
// use App\Models\admin\role;
use App\Models\admin\permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth; 
use Validator;
use DB;
use Hash;

class SubUserController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
// 
	 public function index()
    { 
        //$users = User::select('users.*','user_role.role_id')->join('user_role','user_role.user_id','=','users.id')->orderBy('users.id','desc')->where('user_role.role_id','!=',2)->where('users.trash',0)->get();

        $users = admin::select('admins.*','roles.name as role_name')->join('roles','roles.id','=','admins.role_id')->where('admins.id','!=',1)->orderBy('id', 'DESC')->get();
        
        // $users = admin::where('id','!=',1)->orderBy('id', 'DESC')->get();
        // dd($users);
		$title 			  = 	array('pageTitle' => 'Sub User List');
        if(Auth::user()->can('sub-users')|| Auth::user()->can('sub-users-add')|| Auth::user()->can('sub-users-edit')|| Auth::user()->can('sub-users-view')|| Auth::user()->can('sub-users-delete'))
        {

        return view('admin.sub-user.index',$title,compact('users'));
        }
        return redirect()->back();
       
    } 

        /**
     * Show the user detail of the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userDetail(Request $request,$id)
    {
        $users = User::find($id);
        $address = UserAddress::where('user_id',$id)->get();
		$title 	= 	array('pageTitle' => 'Sub User Detail');
        return view('admin.sub-user.userDetail',$title,compact('users','address')); 
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 
	
    public function destroy($id)
    { 
        User::where('id',$id)->update(['trash'=>1]); 
        return redirect ('admin/sub-users')->with('message','User Deleted Successfully');
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    { 
        $title 			  = 	array('pageTitle' => 'Add Sub Users');
        $roles = role::all();
        $permissions = permission::all();

        if(isset($_POST['submit'])){
            $this->validate($request,[
               
               
                'email'=>'unique:admins|email', 
                'password' => 'required|confirmed',
                'role' => 'required',
				'permissions' => 'required',
               
            ]); 
            if($request->active==NULL) { $active='no'; } else { $active='yes'; }
            $password=bcrypt($request->password);
            $data=array(
                'name'=>$request->first_name,
                'role_id'=>$request->role,
                // 'last_name'=>$request->last_name,
                // 'name'=>$request->first_name . ' '.$request->last_name,
                'email'=>$request->email,                
                // 'mobile'=>$request->phone,
                'password'=>$password,
                'active'=>$active,
                // 'city'=>$request->city ,
                // 'state'=>$request->state ,
                // 'gender'=>$request->gender ,
                // 'dob'=>date('Y-m-d',strtotime($request->dob)) ,
                // 'password_val'=>$request->password ,
               
                // 'created_at' =>date('Y-m-d H:i:s'),
            );
            $insert=admin::create($data);
           
            
            if($insert){
                admin_role::create(['role_id'=>$request->role,'admin_id'=>$insert->id]);
                foreach($request->permissions as $permissions)
                {
                    AdminPermission::create(['permission_id'=>$permissions,'admin_id'=>$insert->id]);    
                }
				
              return redirect('admin/sub-users')->with('message','User Inserted Successfully');
            }else{
                return redirect()->back()->with('message','Something went wrong');
            } 
        }else{ 
            if(Auth::user()->can('sub-users-add'))
            {

                return view('admin.sub-user.create',$title,compact('roles','permissions'));
            }
            return redirect()->back();
        }
    }
 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $title=array('pageTitle' => 'Edit User');
        if($request->active==NULL) { $active='no'; } else { $active='yes'; }
        if(isset($_POST['submit'])){
            $this->validate($request,[
                
                'email'=>'required',
                'role' => 'required',
                'permissions' => 'required', 
                 
            ]); 
             if(isset($request->password) && $request->password!=''){
                $this->validate($request,[
                
                'password' => 'required|confirmed',
                 
            ]);
                
				$password=bcrypt($request->password);
				$data['password']=$password;
				// $data['password_val']=$request->password;
			 }
            
            $data['name']=$request->first_name;
            $data['role_id']=$request->role;
            // $data['last_name']=$request->last_name;
            // $data['name']=$request->first_name . ' '.$request->last_name;
            $data['email']=$request->email;
            $data['active']=$active;               
            // $data['mobile']=$request->phone;            
            // $data['city']=$request->city;
            // $data['state']=$request->state ;
            // $data['gender']=$request->gender;
            // $data['dob']=date('Y-m-d',strtotime($request->dob));
            
            
            $update=admin::where('id',$id)->update($data);

           
            if($update){

                $roledata['role_id']=$request->role;

                $role=admin_role::where('admin_id',$id)->update($roledata);
                $Project = AdminPermission::where('admin_id',$id)->delete();
                foreach($request->permissions as $permissions)
                {   
                    AdminPermission::create(['permission_id'=>$permissions,'admin_id'=>$id]);    
                }
              return redirect('admin/sub-users')->with('message','User Updated Successfully');
            }else{
                return redirect()->back()->with('message','Something went wrong');
            } 
        }else{ 
            
            

			$users=admin::find($id);
            $roles = role::all();
            $permissions = permission::all();
            $admin_role = admin_role::where('admin_id',$id)->get();
            // dd($admin_role);
            $admin_permission = AdminPermission::where('admin_id',$id)->get();
            if(Auth::user()->can('sub-users-edit') || Auth::user()->can('sub-users-view'))
            {

            return view('admin.sub-user.edit',$title,compact('users','roles','permissions','admin_role','admin_permission'));
            }
            return redirect()->back();
        } 
    }
	public function addressCreate(Request $request, $user_id){
		
		$title=array('pageTitle' => 'Add Address');
		return view('admin.user.address_create',$title,compact('user_id'));
	} 
	public function addressSave(Request $request){
		
		
		$data['user_id']=$request->user_id;
		$data['contact_name']=$request->first_name;
		$data['contact_no']=$request->phone;
		$data['address']=$request->address;
		$data['address1']=$request->address1;
		$data['city']=$request->city;
		$data['state']=$request->state;
		$data['pincode']=$request->pincode;
		if(isset($request->is_dafault)){
		$data['is_default']=$request->is_dafault;
		}else{
			$data['is_default']=0;
		}
		$data['type']=$request->type;
		
		$insert=UserAddress::create($data);		
		if($insert){			
		  return redirect('admin/sub-users')->with('message','Address Inserted Successfully');
		}else{
			return redirect()->back()->with('message','Something went wrong');
		} 
	} 
	public function addressEdit(Request $request, $id){
		
		$title=array('pageTitle' => 'Edit Address');
		$address=UserAddress::find($id);	
		return view('admin.sub-user.address_edit',$title,compact('address'));
	} 
	public function addressUpdate(Request $request,$id){
		
		
		$address=UserAddress::find($id);
		$data['contact_name']=$request->first_name;
		$data['contact_no']=$request->phone;
		$data['address']=$request->address;
		$data['address1']=$request->address1;
		$data['city']=$request->city;
		$data['state']=$request->state;
		$data['pincode']=$request->pincode;
		if(isset($request->is_dafault)){
		$data['is_default']=$request->is_dafault;
		UserAddress::where('user_id',$address->user_id)->where('id','!=',$id)->update(['is_default'=>0]);
		}else{
			$data['is_default']=0;
		}
		$data['type']=$request->type;
		
		$insert=UserAddress::where('id',$id)->update($data);		
		if($insert){			
		  return redirect('admin/sub-users')->with('message','Address Inserted Successfully');
		}else{
			return redirect()->back()->with('message','Something went wrong');
		} 
	} 
}

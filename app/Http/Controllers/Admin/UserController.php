<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin\role;
use App\Models\admin\UserForm;
use App\Helper\CommonFunction;
use App\User;
use App\UserRole;
use App\UserAddress;
use App\Models\admin\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth; 
use Validator;
use DB;
use Hash;

class UserController extends Controller
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
        $users = User::where('id','!=',1)->where('users.trash',0)->orderBy('id', 'DESC')->get();
		$title 			  = 	array('pageTitle' => 'User List');
        if(Auth::user()->can('users')||Auth::user()->can('users-add')||Auth::user()->can('users-edit')||Auth::user()->can('users-view')||Auth::user()->can('users-delete'))
        {

        return view('admin.user.index',$title,compact('users'));
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
		$title 	= 	array('pageTitle' => 'User Detail');
        return view('admin.user.userDetail',$title,compact('users','address')); 
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
        return redirect ('admin/users')->with('message','User Deleted Successfully');
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    { 
        $title 			  = 	array('pageTitle' => 'Add Order');
        if(isset($_POST['submit'])){
            $this->validate($request,[
               
               
                'email'=>'unique:users|email', 
				'password' => 'required|confirmed',
               
            ]); 
                
            $password=bcrypt($request->password);
            $data=array(
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'name'=>$request->first_name . ' '.$request->last_name,
                'email'=>$request->email,                
                'mobile'=>$request->phone,
                'password'=>$password,
                'city'=>$request->city ,
                'state'=>$request->state ,
                'gender'=>$request->gender ,
                'dob'=>date('Y-m-d',strtotime($request->dob)) ,
                'password_val'=>$request->password ,
               
                'created_at' =>date('Y-m-d H:i:s'),
            );
            $insert=User::create($data);
           
            
            if($insert){
				UserRole::create(['role_id'=>3,'user_id'=>$insert->id]);
              return redirect('admin/users')->with('message','User Inserted Successfully');
            }else{
                return redirect()->back()->with('message','Something went wrong');
            } 
        }else{ 
            if(Auth::user()->can('users-add'))
            {
                return view('admin.user.create',$title);
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
        if(isset($_POST['submit'])){
            $this->validate($request,[
                
                'email'=>'required', 
                 
            ]); 
             if(isset($request->password) && $request->password!=''){
				$password=bcrypt($request->password);
				$data['password']=$password;
				$data['password_val']=$request->password;
			 }
            
            $data['first_name']=$request->first_name;
            $data['last_name']=$request->last_name;
            $data['name']=$request->first_name . ' '.$request->last_name;
            $data['email']=$request->email;               
            $data['mobile']=$request->phone;            
            $data['city']=$request->city;
            $data['state']=$request->state ;
            $data['gender']=$request->gender;
            $data['dob']=date('Y-m-d',strtotime($request->dob));
            
            
            $update=User::where('id',$id)->update($data);

           
            if($update){
              return redirect('admin/users')->with('message','User Updated Successfully');
            }else{
                return redirect()->back()->with('message','Something went wrong');
            } 
        }else{ 
			$users=User::find($id);
            if(Auth::user()->can('users-edit')||Auth::user()->can('users-view'))
            {

            return view('admin.user.edit',$title,compact('users'));
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
		  return redirect('admin/users')->with('message','Address Inserted Successfully');
		}else{
			return redirect()->back()->with('message','Something went wrong');
		} 
	} 
	public function addressEdit(Request $request, $id){
		
		$title=array('pageTitle' => 'Edit Address');
		$address=UserAddress::find($id);	
		return view('admin.user.address_edit',$title,compact('address'));
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
		  return redirect('admin/users')->with('message','Address Inserted Successfully');
		}else{
			return redirect()->back()->with('message','Something went wrong');
		} 
	} 
}

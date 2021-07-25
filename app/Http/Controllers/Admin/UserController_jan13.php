<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin\role;
use App\Models\admin\UserForm;
use App\Helper\CommonFunction;
use App\User;
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
        $users = User::select('users.*','user_role.role_id')->join('user_role','user_role.user_id','=','users.id')->orderBy('users.id','desc')->where('user_role.role_id','!=',2)->where('users.trash',0)->get();
		$title 			  = 	array('pageTitle' => 'User List');
        return view('admin.user.index',$title,compact('users'));
       
    } 

        /**
     * Show the user detail of the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userDetail(Request $request,$id)
    {
        $users = User::select('users.*','user_role.role_id')->join('user_role','user_role.user_id','=','users.id')->orderBy('users.id','desc')->where('user_role.role_id','!=',2)->where('users.trash',0)->where('users.id',$id)->first();
		$title 	= 	array('pageTitle' => 'User Detail');
        return view('admin.user.userDetail',$title,compact('users')); 
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
                'entity'=>'required',
                'company'=>'required',
                'turnover'=>'required',
                'name'=>'required',
                'email'=>'required', 
                'mobile'=>'required', 
            ]); 
                
            $password=CommonFunction::createPassword(6);
            $data=array(
                'entity'=>$request->entity,
                'company'=>$request->company,
                'turnover'=>$request->turnover,
                'name'=>$request->name,
                'email'=>$request->email,
                'mobile'=>$request->mobile,
                'password'=>Hash::make($password),
                'password_val'=>$password ,
                'otp'=>rand(1001,9999),
                'brand'=>$request->brand,
                'website'=>$request->website,
                'insta'=>$request->insta,
                'user_ip'=>$request->user_ip,
                'created_at' =>date('Y-m-d H:i:s'),
            );
            $insert=User::create($data);
            DB::table('user_role')->insert(['user_id'=>$insert['id'],'role_id'=>$request->role_id]);
            
            if($insert){
              return redirect('admin/users')->with('message','User Inserted Successfully');
            }else{
                return redirect()->back()->with('message','Something went wrong');
            } 
        }else{ 
            return view('admin.user.create',$title);
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
        $title 			  = 	array('pageTitle' => 'Edit User');
        if(isset($_POST['submit'])){
            $this->validate($request,[
                'entity'=>'required',
                'company'=>'required',
                'turnover'=>'required',
                'name'=>'required',
                'email'=>'required', 
                'mobile'=>'required', 
            ]); 
                
            $password=CommonFunction::createPassword(6);
            $data=array(
                'entity'=>$request->entity,
                'company'=>$request->company,
                'turnover'=>$request->turnover,
                'name'=>$request->name,
                'email'=>$request->email,
                'mobile'=>$request->mobile,
                // 'password'=>Hash::make($password),
                // 'password_val'=>$password ,
                // 'otp'=>rand(1001,9999),
                'brand'=>$request->brand,
                'website'=>$request->website,
                'insta'=>$request->insta,
                'user_ip'=>$request->user_ip,
                // 'created_at' =>date('Y-m-d H:i:s'),
            );
            $update=User::where('id',$id)->update($data);

            $roleExist=DB::table('user_role')->select('*')->where('user_id',$id)->first();
            if(empty($roleExist)){
                DB::table('user_role')->insert(['user_id'=>$id,'role_id'=>$request->role_id]);
            }else{
                DB::table('user_role')->where('user_roleId',$roleExist->user_roleId)->update(['role_id'=>$request->role_id]);
            }
            if($update){
              return redirect('admin/users')->with('message','User Updated Successfully');
            }else{
                return redirect()->back()->with('message','Something went wrong');
            } 
        }else{
            $users = User::select('users.*','user_role.role_id')->join('user_role','user_role.user_id','=','users.id')->where('users.id',$id)->first();
            return view('admin.user.edit',$title,compact('users','id'));
        }  
    }
}

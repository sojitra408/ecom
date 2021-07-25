<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin\role;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\transaction;
use Auth;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
     public function __construct()
     {
 
     
     }
    public function index()
    {$seller=array();
        
        $title            =     array('pageTitle' => 'All Transaction');
        $transactions=transaction::select('*')->orderBy('id', 'DESC')->get(); 
        if(Auth::user()->can('transactions'))
        {

        return view('admin.transaction.index',$title,compact('transactions'));
        }
        return redirect()->back();
    }
    
  //   public function create(Request $request){
 
  //   $title = array('pageTitle' => 'Add Transaction');
 
   
  //   return view("admin.transaction.create",$title);
  // }
      
  // public function store(Request $request){

  //   $request->validate([
  //           'name' => 'required',
           
            

  //       ], [
  //           'name.required' => 'Name Is Required.',
           
            
            
  //       ]);
 
  //     $id=  DB::table('transaction')->insertGetId([
  //           'name'   =>   $request->name,
            
         
  //     ]);
 
   
  //   return redirect()->back()->with(["success"=>"Transaction Saved Successfully!"]);
  // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    
     

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
}

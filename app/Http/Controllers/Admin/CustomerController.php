<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin\role;
use App\Models\admin\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 public function __construct(Customer $customer)
	 {
	 $this->customer=$customer;
	 
	 }
    public function index()
    {
         $customer = Customer::all();
		$title 			  = 	array('pageTitle' => 'Customer List');
        return view('admin.customer.index',$title)->with('customer',$customer);
    }
	
	 public function display()
    {
        $customer = Customer::all();
		$title 			  = 	array('pageTitle' => 'Customer List');
        return view('admin.customer.index',$title)->with('customer',$customer);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $customer = Customer::all();
		$title 			  = 	array('pageTitle' => 'Customer Create');
        return view('admin.customer.create',$title)->with('customer',$customer);
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
            'customer_name' => 'required|string|max:255',
            'mobile' => 'required|string|max:11',
             'address' => 'required|string|max:255',
			   'company_name' => 'required|string|max:255',
			    'city' => 'required|string|max:255'
        ]);
        
        $company =$this->customer->create($request->all());
        
        return redirect(route('customer.display'))->with('message','Customer Created Successfully');
    }
	
	 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
       
		 $title 			  = 	array('pageTitle' => 'Edit Customer');
        
		return view('admin.customer.edit',$title)->with('customer',$customer);
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
            'customer_name' => 'required|string|max:255',
            'mobile' => 'required|string|max:11',
             'address' => 'required|string|max:255',
			   'company_name' => 'required|string|max:255',
			    'city' => 'required|string|max:255'
        ]);
        $customer =$this->customer->update_data($request->all());
        return redirect(route('customer.display'))->with('message','Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
         
        $customer->delete();
        return redirect (route('customer.index'))->with('message','Customer Deleted Successfully');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SalesExport;
use App\Exports\InventoryExport;
use App\Exports\UserExport;
use App\Exports\OrderExport;
use App\Exports\TransactionExport;

use App\Models\admin\orders;
use App\User;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title            =     array('pageTitle' => 'List Report');
       
        return view('admin.report.index',$title);
    }

    public function sales()
    {
        $title            =     array('pageTitle' => 'Sales Report');

       $result = DB::table('orders')->select('orders.id','orders.user_id','orders.order_id','orders.order_date','orders.order_status','orders.total_price','orders.grand_total','orders.payment_status',DB::raw('CONCAT(users.first_name, " ", users.last_name) as name'),'users.email','users.mobile','users.city')->leftjoin('users','users.id','=','orders.user_id')->get();
       
   
  
      $ldate = date("Y-m-d");
 
      
      
      $count_received_order_final = DB::table('orders')->selectRaw('order_status as order_status,                  COUNT(*) as total_order')->groupBy('order_status')->where('order_date', '=', $ldate)->get();
      
    //   dd($count_received_order);
       
        return view('admin.report.sales.index',$title,compact('result','count_received_order_final'));
    }

    public function export(Request $request) 
    {
        $this->validate($request,[
            'from' => 'required',
            'to' => 'required',
           
        ],
        [
            'from.required' => 'Select From date.',
            'to.required' => 'Select To date.',
        ]);

        $from = $request->from;
        $to = $request->to;
        // dd('ok');
        
        $orders = orders::select(DB::raw('CONCAT(users.first_name, " ", users.last_name) as name'),'users.email','users.mobile','orders.order_id','orders.order_date','orders.order_status','orders.total_price','orders.grand_total','orders.payment_status')->leftjoin('users','users.id','=','orders.user_id')->where('orders.order_date','>=',$from)->Orwhere('orders.order_date','=<', $to)->get();
        
        // dd($orders);        
        return Excel::download(new SalesExport($from, $to), 'Sales-reports.xlsx');

    }


    public function inventory()
    {
        $title            =     array('pageTitle' => 'Inventory Report');

        // $result = DB::table('orders')->select('orders.id','orders.user_id','orders.order_id','orders.order_date','orders.order_status','orders.total_price','orders.grand_total','orders.payment_status',DB::raw('CONCAT(users.first_name, " ", users.last_name) as name'),'users.email','users.mobile','users.city')->leftjoin('users','users.id','=','orders.user_id')->get();
        
        
        $result = DB::table('products')->select('products.id','products.product_name as name','product_variants.stock','product_variants.mrp','product_variants.offer_price','product_variants.tsin','product_variants.manu_date','product_variants.expiry_date')->leftjoin('product_variants','products.id','=','product_variants.product_id')->orderBy('products.id','DESC')->get();
        
        
        // dd($result);
        return view('admin.report.inventory.index',$title,compact('result'));
      
    }

    public function inventory_export(Request $request) 
    {
        $this->validate($request,[
            'from' => 'required',
            'to' => 'required',
           
        ],
        [
            'from.required' => 'Select From date.',
            'to.required' => 'Select To date.',
        ]);

        $from = $request->from;
        $to = $request->to;
        // dd('ok');
        return Excel::download(new InventoryExport($from, $to), 'Inventory-reports.xlsx');

    }

    public function user()
    {
        $title            =     array('pageTitle' => 'User Report');

    //   $result = DB::table('users')->select(DB::raw('CONCAT(first_name, " ", last_name) as name'),'email','gender','dob','city','state','mobile')->get();
       
       
       $result = User::orderBy('id','DESC')->get();
       $ldate = date("Y-m-d");
       
    //   $ldate ="2021-02-15";
       $count_received_order_final = User::selectRaw('gender as gender,COUNT(*) as total_order')->whereDate('created_at', '=', $ldate)->groupBy('gender')->get();
       
       
       // dd($result);
        return view('admin.report.user.index',$title,compact('result','count_received_order_final'));
    }
    
     public function userStatus(Request $request)
    {
        $title            =     array('pageTitle' => 'Order Report');
        
        if($request->gender_status != 'no')
        {
           $result = User::orderBy('id','DESC')->where('gender',$request->gender_status)->get();     
        }
        else
        {
            $result = User::orderBy('id','DESC')->get();
        }
       
       // dd($result);
       
       $ldate = date("Y-m-d");
        
      
       $count_received_order_final = User::selectRaw('gender as gender,COUNT(*) as total_order')->whereDate('created_at', '=', $ldate)->groupBy('gender')->get();
      
        return view('admin.report.user.index',$title,compact('result','count_received_order_final'));
    }

    public function user_export(Request $request) 
    {
        $this->validate($request,[
            'from' => 'required',
            'to' => 'required',
           
        ],
        [
            'from.required' => 'Select From date.',
            'to.required' => 'Select To date.',
        ]);

        $from = $request->from;
        $to = $request->to;
        // dd('ok');
        return Excel::download(new UserExport($from, $to), 'User-reports.xlsx');

    }

    public function order()
    {
        $title            =     array('pageTitle' => 'Order Report');


        // $result = orders::with('Users')->first();


      $result = DB::table('orders')->select('orders.id','orders.order_id','orders.order_date','orders.order_status','orders.grand_total','orders.payment_status',DB::raw('CONCAT(users.first_name, " ", users.last_name) as name'),'users.email','users.mobile','users.city')->leftjoin('users','users.id','=','orders.user_id')->orderBy('orders.id','DESC')->get();
        // dd($result);
        
        $ldate = date("Y-m-d");
        
      
      $count_received_order_final = DB::table('orders')->selectRaw('order_status as order_status,COUNT(*) as total_order')->groupBy('order_status')->where('order_date', '=', $ldate)->get();
      
        return view('admin.report.order.index',$title,compact('result','count_received_order_final'));
    }
    
    public function orderStatus(Request $request)
    {
        $title            =     array('pageTitle' => 'Order Report');
        
        if($request->order_status != 'no')
        {
            $result = DB::table('orders')->select('orders.id','orders.order_id','orders.order_date','orders.order_status','orders.grand_total','orders.payment_status',DB::raw('CONCAT(users.first_name, " ", users.last_name) as name'),'users.email','users.mobile','users.city')->leftjoin('users','users.id','=','orders.user_id')->where('orders.order_status',$request->order_status)->get();     
        }
        else
        {
            $result = DB::table('orders')->select('orders.id','orders.order_id','orders.order_date','orders.order_status','orders.grand_total','orders.payment_status',DB::raw('CONCAT(users.first_name, " ", users.last_name) as name'),'users.email','users.mobile','users.city')->leftjoin('users','users.id','=','orders.user_id')->orderBy('orders.id','DESC')->get();
        }
       
       // dd($result);
       
       $ldate = date("Y-m-d");
        
      
      $count_received_order_final = DB::table('orders')->selectRaw('order_status as order_status,COUNT(*) as total_order')->groupBy('order_status')->where('order_date', '=', $ldate)->get();
      
        return view('admin.report.order.index',$title,compact('result','count_received_order_final'));
    }

    public function order_export(Request $request) 
    {
        $this->validate($request,[
            'from' => 'required',
            'to' => 'required',
           
        ],
        [
            'from.required' => 'Select From date.',
            'to.required' => 'Select To date.',
        ]);

        $from = $request->from;
        $to = $request->to;
        // dd('ok');
        return Excel::download(new OrderExport($from, $to), 'Order-reports.xlsx');

    }
    
    
    
    
    
    public function transaction()
    {
        $title            =     array('pageTitle' => 'Inventory Report');

       $result = DB::table('orders')->select('orders.id','orders.user_id','orders.order_id','orders.order_date','orders.order_status','orders.total_price','orders.grand_total','orders.payment_type',DB::raw('CONCAT(users.first_name, " ", users.last_name) as name'),'users.email','users.mobile','users.city')->leftjoin('users','users.id','=','orders.user_id')->orderBy('orders.id','DESC')->get();
       // dd($result);
       
       $ldate = date("Y-m-d");
       
    //   $ldate = "2021-07-01";
       
       $count_received_order_final = DB::table('orders')->selectRaw('payment_type as payment_type,COUNT(*) as total_order')->groupBy('payment_type')->where('order_date', '=', $ldate)->get();
       
        return view('admin.report.transaction.index',$title,compact('result','count_received_order_final'));
    }
    
    
    
    public function transactionStatus(Request $request)
    {
        $title            =     array('pageTitle' => 'Transaction Report');
       
        if($request->payment_type != 'no')
        {
            $result = DB::table('orders')->select('orders.id','orders.order_id','orders.order_date','orders.order_status','orders.grand_total','orders.payment_type',DB::raw('CONCAT(users.first_name, " ", users.last_name) as name'),'users.email','users.mobile','users.city')->leftjoin('users','users.id','=','orders.user_id')->where('orders.payment_type',$request->payment_type)->get();     
        }
        else
        {
            $result = DB::table('orders')->select('orders.id','orders.order_id','orders.order_date','orders.order_status','orders.grand_total','orders.payment_type',DB::raw('CONCAT(users.first_name, " ", users.last_name) as name'),'users.email','users.mobile','users.city')->leftjoin('users','users.id','=','orders.user_id')->orderBy('orders.id','DESC')->get();
        }
       
       // dd($result);
       
       $ldate = date("Y-m-d");
        
      
      $count_received_order_final = DB::table('orders')->selectRaw('payment_type as payment_type,COUNT(*) as total_order')->groupBy('payment_type')->where('order_date', '=', $ldate)->get();
      
        return view('admin.report.transaction.index',$title,compact('result','count_received_order_final'));
    }

    public function transaction_export(Request $request) 
    {
        $this->validate($request,[
            'from' => 'required',
            'to' => 'required',
           
        ],
        [
            'from.required' => 'Select From date.',
            'to.required' => 'Select To date.',
        ]);

        $from = $request->from;
        $to = $request->to;
        // dd('ok');
        return Excel::download(new TransactionExport($from, $to), 'Transaction-reports.xlsx');

    }
    
    
    
    
    
    
    
    
    
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

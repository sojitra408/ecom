<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin\role;
use App\Models\admin\admin;
use App\Models\admin\orders;
use App\Models\admin\orderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\User;
use App\OrderAddress;
use App\UserAddress;
use App\Mail\RefundOtp;
use App\Mail\ReturnSchedule;
use App\Mail\OrderConfirm;
use App\Mail\OrderDelivered;
use App\Mail\OrderShiped;
use App\Mail\ReturnConfirm;
use Auth;
use Razorpay\Api\Api;
use Session;
use Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
     
     
    public function testMail(Request $request){
        /* controller to test mails */
        
        $email = $request->input('email', 'barajaswargiary4444@gmail.com');
        
		$order = orders::first();   
		$products = orderDetail::where('order_id', $order->order_id)->orderBy('id', 'desc')->get();
		$address = OrderAddress::with(['State', 'City'])->where('order_id', $order->id)->first();
		$user = User::where('id', $order->user_id)->first();
		
		$data['name'] = $user->first_name . ' ' . $user->last_name;
		$data['order'] = $order;
		$data['products'] = $products;
		$data['address'] = $address;
		$userdata = $data;
		
		$type = $request->input('type', 'CONFIRMED');
		
		switch($type){
		    case 'CONFIRMED': {
		        $orderMail = new OrderConfirm($userdata);
		        break;
		    }
		    case 'DELIVERED': {
		        $orderMail = new OrderDelivered($userdata);
		        break;
		    }
		    case 'SHIPPED': {
		        $orderMail = new OrderShiped($userdata);
		        break;
		    }
		    case 'RETURN_CONFIRM': {
		        $orderMail = new ReturnConfirm($userdata);
		        break;
		    }
		    case 'RETURN_SCHEDULE': {
		        $orderMail = new ReturnSchedule($userdata);
		        break;
		    }
		    case 'REFUND_OTP': {
		        $orderMail = new RefundOtp($userdata);
		        break;
		    }
		}
		
		
		Mail::to($email)->send($orderMail);
		return $userdata;
    }


	 public function index()
    {
        $orders = orders::orderBy('id','desc')->where('trash',0)->get();
		$title 			  = 	array('pageTitle' => 'Order List');
		if(Auth::user()->can('view-orders')|| Auth::user()->can('view-orders-edit') ||Auth::user()->can('view-orders-view') || Auth::user()->can('view-orders-delete'))
{
        
        return view('admin.order.index',$title,compact('orders'));
}
return redirect()->back();
       
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
                'order_id' => 'required',
                'order_date' => 'required', 
                'order_status' => 'required',
                'payment_status' => 'required',
            ]); 
                
            $data=array(
                'user_id'=>$request->user_id,
                'order_id'=>$request->order_id,
                'order_date'=>$request->order_date,
                'order_status'=>$request->order_status,
                'payment_status'=>$request->payment_status,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            );
             orders::create($data);
            if(count($request->product_id) > 0){
                foreach($request->product_id as $pid){
                    $product=DB::table('products')->select('product_name','mrp','igst','sgst','cgst')->where('id',$pid)->first();
                   $orderData=array('order_id'=>$request->order_id,
                        'product_id'=>$pid,
                        'product_name'=>$product->product_name,
                        'price'=>$product->mrp,
                        'igst'=>$product->igst,
                        'sgst'=>$product->sgst,
                        'cgst'=>$product->cgst,
                        'created_at'=>date('Y-m-d H:i:s'),
                        'updated_at'=>date('Y-m-d H:i:s'),
                    );
                    orderDetail::create($orderData);
                }
            }
            $mrp = DB::table('order_details')->select('price')->where('order_id',$request->order_id)->sum('price');
            $igst = DB::table('order_details')->select('igst')->where('order_id',$request->order_id)->sum('igst');
            $sgst = DB::table('order_details')->select('sgst')->where('order_id',$request->order_id)->sum('sgst');
            $cgst = DB::table('order_details')->select('cgst')->where('order_id',$request->order_id)->sum('cgst');
            $grandTotal = $mrp + $igst + $sgst + $cgst;
            
            $update=array('total_price'=>$mrp,'grand_total'=>$grandTotal);
            $updated=DB::table('orders')->where('order_id',$request->order_id)->update($update);
            if($updated){
                return redirect('admin/orders')->with('message','Order Added Successfully');
            }else{
                return redirect()->back()->with('message','Something Went Wrong');
            }
        }else{
            $users=DB::table('users')->select('users.id','users.name')->join('user_role','user_role.user_id','=','users.id')->where('user_role.role_id','3')->get();
            $products=DB::table('products')->select('id','product_name')->where('trash',0)->where('status',1)->get();
            return view('admin.order.create',$title,compact('users','products'));
        }
    }

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
    public function update(Request $request,$id)
    {
        $title 			  = 	array('pageTitle' => 'Edit Order');
        if(isset($_POST['submit'])){
            $this->validate($request,[
                'order_id' => 'required',
                'order_date' => 'required', 
                'order_status' => 'required',
                'payment_status' => 'required',
            ]); 
                
            $data=array(
                'user_id'=>$request->user_id,
                'order_id'=>$request->order_id,
                'order_date'=>$request->order_date,
                'order_status'=>$request->order_status, 
                'payment_status'=>$request->payment_status,
                'updated_at'=>date('Y-m-d H:i:s'),
            );
              orders::where('id',$id)->update($data);
             $update=DB::table('order_details')->where('order_id',$request->order_id)->delete();
        
            if(count($request->product_id) > 0){
                foreach($request->product_id as $pid){
                    $product=DB::table('products')->select('product_name','mrp','igst','sgst','cgst')->where('id',$pid)->first();
                   $orderData=array(
                       'order_id'=>$request->order_id,
                        'product_id'=>$pid,
                        'product_name'=>$product->product_name,
                        'price'=>$product->mrp,
                        'igst'=>$product->igst,
                        'sgst'=>$product->sgst,
                        'cgst'=>$product->cgst,
                        'created_at'=>date('Y-m-d H:i:s'),
                        'updated_at'=>date('Y-m-d H:i:s'),
                    );
                    orderDetail::create($orderData);
                }
            }
            $mrp = DB::table('order_details')->select('price')->where('order_id',$request->order_id)->sum('price');
            $igst = DB::table('order_details')->select('igst')->where('order_id',$request->order_id)->sum('igst');
            $sgst = DB::table('order_details')->select('sgst')->where('order_id',$request->order_id)->sum('sgst');
            $cgst = DB::table('order_details')->select('cgst')->where('order_id',$request->order_id)->sum('cgst');
            $grandTotal = $mrp + $igst + $sgst + $cgst;
            
            $update=array('total_price'=>$mrp,'grand_total'=>$grandTotal);
            $updated=DB::table('orders')->where('order_id',$request->order_id)->update($update); 
            return redirect('admin/orders')->with('message','Order Updated Successfully');
             
        }else{
            $users=DB::table('users')->select('users.id','users.name')->join('user_role','user_role.user_id','=','users.id')->where('user_role.role_id','3')->get();
            $products=DB::table('products')->select('id','product_name')->where('trash',0)->where('status',1)->get();
            $order=orders::select('*')->where('id',$id)->first();
            $ordersDet=orderDetail::select('*')->where('order_id',$order->order_id)->get();
            return view('admin.order.edit',$title,compact('order','ordersDet','users','products','id'));
        }  
    }

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
    public function destroy($id)
    {
        $orders=orders::where('id',$id)->first();
        orders::where('id',$id)->update(['trash'=>1]);
        orderDetail::where('order_id',$orders->order_id)->update(['trash'=>1]); 
        return redirect ('admin/orders')->with('message','Order Deleted Successfully');
    }
	
	 public function view(Request $request,$order_id)
    {
		$orders=orders::where('id',$order_id)->first();
        $products = orderDetail::with('Orders')->where('order_id',$orders->order_id)->orderBy('id','desc')->where('trash',0)->get();
        $address1 = UserAddress::with(['State','City'])->where('id',$orders->billing_address)->first();
        $address = OrderAddress::with(['State','City'])->where('order_id',$orders->id)->first();
		//echo '<pre>';print_r($products);die;
		$title = array('pageTitle' => 'Order Details');

		if(Auth::user()->can('view-orders')|| Auth::user()->can('view-orders-edit'))
		{

        return view('admin.order.view',$title,compact('orders','products','address','address1'));
		}
		return redirect()->back();
       
    }
	
	public function changeOrderStatus(Request $request)
    {
       
        orders::where('id',$request->order_id)->update(['order_status'=>$request->order_status]);
		
		if($request->order_status==1){
			$order=orders::where('id',$request->order_id)->first();			
			
			/* Email Template Start */
			$user=\App\User::where('id',$order->user_id)->first();
			$products = orderDetail::where('order_id',$order->order_id)->where('status','!=',3)->orderBy('id','desc')->get();
			$address = OrderAddress::with(['State','City'])->where('order_id',$order->id)->first();
			$data['name']=$user->first_name.' '.$user->last_name;
			$data['order']=$order;
			$data['products']=$products;
			$data['address']=$address;
			$userdata=$data;
			$mobile=$user->mobile;
			$link=url('/').'/my-orders';			
			
			$msg="Dear ".$user->first_name.",Your order has been processed and your order number is ".$order->order_id.". Thank you for choosing This or That. To continue shopping please visit https://thisorthat.in/";
			$msg=urlencode($msg);

			$messageUrl="http://103.16.101.52:8080/sendsms/bulksms?username=oz07-soch&password=pAxqy5eh&type=0&dlr=1&destination=".$mobile."&source=TOTORD&message=".$msg."&entityid=1601980161097394647&tempid=1607100000000086302";		
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $messageUrl);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);    
			$response = curl_exec($ch);
			curl_close($ch);
			if(isset($user->email) && $user->email!='' ){
			
				Mail::to($user->email)->send(new OrderConfirm($userdata));
			}
			/* Email Template End */
			orderDetail::where('order_id',$order->order_id)->where('status','!=',3)->update(['status'=>$request->order_status]);
		}
		
		if($request->order_status==8){
			$order=orders::where('id',$request->order_id)->first();			
			
			/* Email Template Start */
			$user=\App\User::where('id',$order->user_id)->first();
			$products = orderDetail::where('order_id',$order->order_id)->where('status','!=',3)->orderBy('id','desc')->get();
			$address = OrderAddress::with(['State','City'])->where('order_id',$order->id)->first();
			$data['name']=$user->first_name.' '.$user->last_name;
			$data['order']=$order;
			$data['products']=$products;
			$data['address']=$address;
			$userdata=$data;
			
			$mobile=$user->mobile;
			$link=url('/').'/my-orders';			
						
			$msg="Dear ".$user->first_name.", Your order ".$order->order_id." has been delivered to the requested address. Thank you for choosing This or That. To continue shopping please visit https://thisorthat.in/";			
			$msg=urlencode($msg);
			$messageUrl="http://103.16.101.52:8080/sendsms/bulksms?username=oz07-soch&password=pAxqy5eh&type=0&dlr=1&destination=".$mobile."&source=TOTORD&message=".$msg."&entityid=1601980161097394647&tempid=1607100000000086316";			
			
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $messageUrl);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);    
			$response = curl_exec($ch);
			curl_close($ch);
			
			if(isset($user->email) && $user->email!=''){
			
				Mail::to($user->email)->send(new OrderDelivered($userdata));
			}
			/* Email Template End */
			orders::where('id',$request->order_id)->update(['delivered_on'=>date('Y-m-d')]);
			orderDetail::where('order_id',$order->order_id)->where('status','!=',3)->update(['status'=>$request->order_status]);
		}
        
        return redirect()->back()->with('message','Order updated Successfully');
    }
	public function changeOrderItemStatus(Request $request,$item_id)
    {
		
		$order_details=orderDetail::where('id',$item_id)->first();
		//echo '<pre>';print_r($order_details);die;
       if($request->order_status==6){
		   $data['delivered_on']=date('Y-m-d');
	   }
	    $data['status']=$request->order_status;
        orderDetail::where('id',$item_id)->update($data);
        
		$variant= \App\ProductVariant::where('id',$order_details->product_id)->first();
		$product=getProductDetailsById($variant->product_id);
		if($product->return_allowed==1){
			$Date = date('Y-m-d');
			$till= date('Y-m-d', strtotime($Date. ' + 15 days'));
			 orderDetail::where('id',$item_id)->update(['return_allowed'=>1,'return_till'=>$till]);
		}
		
		if($request->order_status==4){
			$order=orders::where('order_id',$order_details->order_id)->first();			
			
			/* Email Template Start */
			$user=\App\User::where('id',$order->user_id)->first();
			$products = orderDetail::where('order_id',$order->order_id)->where('status','!=',3)->orderBy('id','desc')->get();
			$address = OrderAddress::with(['State','City'])->where('order_id',$order->id)->first();
			$data['name']=$user->first_name.' '.$user->last_name;
			$data['order']=$order;
			$data['products']=$products;
			$data['address']=$address;
			$userdata=$data;
			$mobile=$user->mobile;
			$link=url('/').'/my-orders';			
				
			$msg="Dear ".$user->first_name.",Your order ".$order->order_id." has being shipped. Thank you for choosing This or That. To continue shopping please visit https://thisorthat.in/";			
			$msg=urlencode($msg);
			$messageUrl="http://103.16.101.52:8080/sendsms/bulksms?username=oz07-soch&password=pAxqy5eh&type=0&dlr=1&destination=".$mobile."&source=TOTORD&message=".$msg."&entityid=1601980161097394647&tempid=1607100000000086304";			
			
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $messageUrl);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);    
			$response = curl_exec($ch);
			curl_close($ch);
			
			if(isset($user->email) && $user->email!=''){
			
				Mail::to($user->email)->send(new OrderShiped($userdata));
			}
			/* Email Template End */
		}
		
		if($request->order_status==21){
			$order=orders::where('order_id',$order_details->order_id)->first();			
			
			/* Email Template Start */
			$user=\App\User::where('id',$order->user_id)->first();
			$products = orderDetail::where('order_id',$order->order_id)->where('status','!=',3)->orderBy('id','desc')->get();
			$address = OrderAddress::with(['State','City'])->where('order_id',$order->id)->first();
			$data['name']=$user->first_name.' '.$user->last_name;
			$data['order']=$order;
			$data['products']=$products;
			$data['address']=$address;
			$userdata=$data;
			$mobile=$user->mobile;
			$link=url('/').'/my-orders';			
				
					
			$msg="Dear ".$user->first_name.", We have scheduled a pickup for your order ".$order->order_id.". Please hand him over the product with its original tag and bill. Thank you for choosing This or That. To continue shopping please visit https://thisorthat.in/";			
			$msg=urlencode($msg);
			$messageUrl="http://103.16.101.52:8080/sendsms/bulksms?username=oz07-soch&password=pAxqy5eh&type=0&dlr=1&destination=".$mobile."&source=TOTORD&message=".$msg."&entityid=1601980161097394647&tempid=1607100000000086319";			
			
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $messageUrl);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);    
			$response = curl_exec($ch);
			curl_close($ch);
			
			if(isset($user->email)){
			
				Mail::to($user->email)->send(new ReturnSchedule($userdata));
			}
			/* Email Template End */
		}
		
		if($request->order_status==23){
			$order=orders::where('order_id',$order_details->order_id)->first();			
			
			/* Email Template Start */
			$user=\App\User::where('id',$order->user_id)->first();
			$products = orderDetail::where('order_id',$order->order_id)->where('status','!=',3)->orderBy('id','desc')->get();
			$address = OrderAddress::with(['State','City'])->where('order_id',$order->id)->first();
			$data['name']=$user->first_name.' '.$user->last_name;
			$data['order']=$order;
			$data['products']=$products;
			$data['address']=$address;
			$userdata=$data;
			$mobile=$user->mobile;
			$link=url('/').'/my-orders';			
				
			$msg="Dear ".$user->first_name.",Your order ".$order->order_id." has being shipped. Thank you for choosing This or That. To continue shopping please visit https://thisorthat.in/";			
			$msg=urlencode($msg);
			$messageUrl="http://103.16.101.52:8080/sendsms/bulksms?username=oz07-soch&password=pAxqy5eh&type=0&dlr=1&destination=".$mobile."&source=TOTORD&message=".$msg."&entityid=1601980161097394647&tempid=1607100000000086304";			
			
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $messageUrl);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);    
			$response = curl_exec($ch);
			curl_close($ch);
			
			if(isset($user->email) && $user->email!=''){
			
				Mail::to($user->email)->send(new ReturnConfirm($userdata));
			}
			/* Email Template End */
		}
		
		
        return redirect()->back()->with('message','Item updated Successfully');
    }
	
	public function trackShipment(Request $request)
    {
		$arr=array();
		//$token = AUTH_TOKEN;
		/*$token = "PFz4EkUgm0KAvMxrNcJd6nufALr08AXfprwnChfz150";
		$url='https://ecom3stagingapi.vamaship.com/ecom/api/v1';
		$http = new \GuzzleHttp\Client(['headers'=>['Authorization' => 'Bearer '.$token]]);

		$request_url = $url.'/trackawb/78924133336';

		$res = $http->request('GET', $request_url);

		echo '<pre>';print_r($res);
		
		*/
		//$trackingId='5077710000361';
		if($request->track_id!=''){
			 
		$trackingId=$request->track_id;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://ecom3stagingapi.vamaship.com/ecom/api/v1/track/'.$trackingId,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_POSTFIELDS => array(),
		  CURLOPT_HTTPHEADER => array(
			'Accept: application/json',
			'Authorization: Bearer 35IzINcYknGKrImgj4xU5VIwxL2tD2F2XtUT1ydE139'
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		
		$response=json_decode($response);
		$result=$response->tracking_details->$trackingId;
		
		//echo '<pre>';print_r($response->tracking_details->$trackingId);die;
		if($result->success==1){
			orderDetail::where('id',$request->id)->update(['track_id'=>$request->track_id]);
			return json_encode($result->trackingEvents);
		}else{
			return json_encode(array('success'=>false,'message'=>'Please enter correct detail'));
		}
		//return json_encode($response->tracking_details->$trackingId->trackingEvents);
		
		}else{
			return json_encode(array('success'=>false,'message'=>'Please enter correct detail'));
			
		}
		
    }
    
    public function returnOrder(Request $request)
    {
        // $orders = orders::orderBy('id','desc')->where('payment_type','razorpay')->where('order_status',2)->where('trash',0)->get();
        
        $orders = orders::orderBy('id','desc')->where('order_status',2)->where('trash',0)->get();
        
        
        
		$title 			  = 	array('pageTitle' => 'Order Return List');
		if(Auth::user()->can('orders-return'))
		{

        return view('admin.order_return.index',$title,compact('orders'));
		}
		return redirect()->back();
    }
    
    public function refund($id)
    {
        
        $order=orders::find($id);
        
        
        return response()->json([
	      'data' => $order
	    ]);
        
    }
    
    public function refund_success(Request $request, $id)
    {
        // dd($request);
        
        $order=orders::find($request->id);
        $payment_id=$order->transaction_id;
        
        $amount=$request->get("amount");
        
        
        if($order->payment_type == 'COD')
        {
            $orderr=orders::find($id);
            
            // $order->refund_id=$request->get("description");
            // $order->refund_response=$request->get("description");
            $orderr->refund_amount=$amount;
            
            $orderr->save();
            
            
            Mail::to('orders@sochfoods.com')->bcc('ecom@sochfoods.com')->send(new RefundPayment($amount));
            
            return json_encode(array('success'=>true,'message'=>'Payment Refund is done.'),200);
        }
        else
        {
            
            // key id: "rzp_live_bWLgbahfLszytt";
            // key SECRET: "9k8YaIgfDIwnA7QIaojMKnUw";
    
          
            // $api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));
             
            $api = new Api('rzp_live_bWLgbahfLszytt','9k8YaIgfDIwnA7QIaojMKnUw');
    
            $payment = $api->payment->fetch($order->transaction_id);
            
            // $speed = $payment->speed('instant');
            
            // dd($payment);
            
            $refund = $payment->refund(array('amount' => $request->amount*100));
            
            
            $orderr=orders::find($id);
            
            $orderr->refund_id=$refund->get("id");
            $orderr->refund_response=$refund;
            $orderr->refund_amount=$request->get("amount");
            
            $orderr->save();
            
            
            // Mail::to('sojitra408@gmail.com')->send(new RefundPayment($amount));
            
            // Mail::to('orders@sochfoods.com')->bcc('ecom@sochfoods.com')->send(new RefundPayment($payment_id));
            
            return json_encode(array('success'=>true,'message'=>'Payment Refund is done.'),200);
        }
        
       
       // return redirect()->back()->with(['message' => 'Payment Refund Successfully.']);
        
        return json_encode(array('success'=>false,'message'=>'Payment Refund is Not done.'),400);
        
    }
    
    public function verifyOtp(Request $request)
    {
    
        $user  = \App\RefundOtp::where('otp','=',$request->otp)->first();
        
        if($user)
        {
            $order=orders::find($request->id);
            return response()->json([
	            'data' => $order,
	            'success'=>true,
	            
	            
	        ]);
	        
	        
        }
        
        return json_encode(array('success'=>false,'message'=>'Otp does not match'),401);
        
        
    }
    
    public function sendOtp(Request $request)
    {
        // dd('ok');
        $user = Auth::user();
        $otp = rand(1000,9999);
        
        
        // Mail::to('orders@sochfoods.com')->send(new RefundOtp($otp));
// 		Mail::to('ecom@sochfoods.com')->send(new RefundOtp($otp));
			
        
         \App\RefundOtp::updateOrCreate(
       [
        'user_id' => $user->id
       ],
       ['otp' => $otp]
       
      );
      
      return json_encode(array('success'=>true,'otp'=>$otp),200);
      
    }
    
}

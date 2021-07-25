<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\About;
use App\Bank_offer;
use Auth;

class Payment_gateway_offerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title            =     array('pageTitle' => 'Bank Offer List');
        $pages = DB::table('bank_offer')->orderBy('id', 'DESC')->get();
        if(Auth::user()->can('payment-gateway-offer')|| Auth::user()->can('payment-gateway-offer-add')|| Auth::user()->can('payment-gateway-offer-edit')|| Auth::user()->can('payment-gateway-offer-view')|| Auth::user()->can('payment-gateway-offer-delete'))
        {

        return view('admin.setting.offer.index',$title,compact('pages'));
        }
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title            =     array('pageTitle' => 'Bank Offer Create');
        
        if(Auth::user()->can('payment-gateway-offer-add'))
        {

        return view('admin.setting.offer.create',$title);
        }
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
      'title' => 'required',
      
      'description' => 'required',
      
      
      
    ]);
        
        if($request->status==NULL) { $status=0; } else { $status=1; }

    $data['title']=$request->title;
   
    $data['description']=$request->description;
   
    $data['status']=$status;
   
   
   
    Bank_offer::create($data);
   
    return redirect()->back()->with(["success"=>"Bank Offer Saved Successfully!"]);
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
        $title = array('pageTitle' => 'Edit About');
       
         $page = DB::table('bank_offer')->find($id);
       
       if(Auth::user()->can('payment-gateway-offer-edit')|| Auth::user()->can('payment-gateway-offer-view'))
        {

        return view('admin.setting.offer.edit',$title, compact('page'));
        }
        return redirect()->back();
        
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
        
        $tax=Bank_offer::find($id);
        
        
        $tax->title=$request->get("title");
       
        $tax->description=$request->get("description");
       
        $tax->status=$request->get("status");
        
        
        $tax->save();

        return redirect()->back()->with(['message' => 'Bank Offer Updated Successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Project = DB::table('bank_offer')->where('id',$id)->delete();
        //$Project->delete();
        return redirect()->back()->with(['message' => 'Bank Offer Deleted Successfully.']);
    }
}

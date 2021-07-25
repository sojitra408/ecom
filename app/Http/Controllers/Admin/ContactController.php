<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Contact;
use Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title            =     array('pageTitle' => 'Contact List');
        $pages = DB::table('contact')->get();

        if(Auth::user()->can('contact-page'))
        {
        
        return view('admin.setting.contact.index',$title,compact('pages'));
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
        $title            =     array('pageTitle' => 'Contact Create');
        
        if(Auth::user()->can('contact-page'))
        {
        return view('admin.setting.contact.create',$title);
        
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
        $request->validate([
      'title' => 'required',
      'title2' => 'required',
      'address' => 'required',
      'phone' => 'required',
      'phone2' => 'required',
      'open_time' => 'required',
      'close_time' => 'required',
      'link' => 'required',
      
    ]);

    $data['title']=$request->title;
    $data['title2']=$request->title2;
    $data['address']=$request->address;
    $data['phone']=$request->phone;
    $data['phone2']=$request->phone2;
    $data['open_time']=$request->open_time;
    $data['close_time']=$request->close_time;
    $data['link']=$request->link;
   
   
    Contact::create($data);
   
    return redirect()->back()->with(["success"=>"Contact Saved Successfully!"]);
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
        $title = array('pageTitle' => 'Edit Contact');
       
         $page = DB::table('contact')->find($id);
       
       if(Auth::user()->can('contact-page'))
        {
        return view('admin.setting.contact.edit',$title, compact('page'));
        
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
        $tax=Contact::find($id);
        
        
        $tax->title=$request->get("title");
        $tax->title2=$request->get("title2");
        $tax->address=$request->get("address");
        $tax->phone=$request->get("phone");
        $tax->phone2=$request->get("phone2");
        $tax->open_time=$request->get("open_time");
        $tax->close_time=$request->get("close_time");
        $tax->link=$request->get("link");
        
        $tax->save();

        return redirect()->back()->with(['message' => 'Contact Updated Successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Project = DB::table('contact')->where('id',$id)->delete();
        //$Project->delete();
        return redirect()->back()->with(['message' => 'Contact Deleted Successfully.']);
    }
}

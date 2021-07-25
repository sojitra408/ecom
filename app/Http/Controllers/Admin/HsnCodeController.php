<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\About;
use App\HsnCode;
use App\Imports\HsnCodeImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\HsnExport;
use Auth;

class HsnCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title            =     array('pageTitle' => 'HSN Code List');
        $pages = DB::table('hsn_code')->orderBy('id', 'DESC')->get();
        if(Auth::user()->can('hsn-code-list')|| Auth::user()->can('hsn-code-list-add')|| Auth::user()->can('hsn-code-list-edit')|| Auth::user()->can('hsn-code-list-view')|| Auth::user()->can('hsn-code-list-delete'))
        {

        return view('admin.setting.hsn.index',$title,compact('pages'));
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
        $title            =     array('pageTitle' => 'HSN Code Create');
        
        if(Auth::user()->can('hsn-code-list-add'))
        {
        return view('admin.setting.hsn.create',$title);

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
      'hsn_code' => 'required',
     'percentage' => 'required',
      
      
    ]);
        

    $data['code']=$request->hsn_code;
    
    $data['description']=$request->description;
    $data['percentage']=$request->percentage;
   
   
   
   
    HsnCode::create($data);
   
    return redirect()->back()->with(["success"=>"HSN Code Saved Successfully!"]);
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
        $title = array('pageTitle' => 'Edit HSN Code');
       
         $page = DB::table('hsn_code')->find($id);
       
        if(Auth::user()->can('hsn-code-list-edit')|| Auth::user()->can('hsn-code-list-view'))
        {

        return view('admin.setting.hsn.edit',$title, compact('page'));
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
        
        $tax=HsnCode::find($id);
        
        
        $tax->code=$request->get("hsn_code");
        $tax->description=$request->get("description");
        $tax->percentage=$request->get("percentage");
       
        
        $tax->save();

        return redirect()->back()->with(['message' => 'HSN Code Updated Successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Project = DB::table('hsn_code')->where('id',$id)->delete();
        //$Project->delete();
        return redirect()->back()->with(['message' => 'HSN Code Deleted Successfully.']);
    }
    
    public function importfile(){
        $title = array('pageTitle' => 'Import HSN Code');
       
         // $page = DB::table('hsn_code')->find($id);
       
       if(Auth::user()->can('hsn-code-list-add'))
        {

        return view('admin.setting.hsn.import',$title);
             
        }
        return redirect()->back();
        
    }

    public function importLeads(Request $request) {
        $request->validate([
            'csv_file' => 'required'
        ]);
        Excel::import(new HsnCodeImport, request()->file('csv_file'));
        return back()->with('success', 'Hsn Code imported successfully.');
    }
    
    public function export(Request $request) 
    {
        
        return Excel::download(new HsnExport, 'Hsn-code.csv');

    }
}

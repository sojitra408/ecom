<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\About;
use App\Productusp;
use App\Imports\UspImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UspExport;
use Auth;

class ProductuspController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title            =     array('pageTitle' => 'Product USP List');
        $pages = DB::table('product_usp')->orderBy('id', 'DESC')->get();
        if(Auth::user()->can('product-usp-list')|| Auth::user()->can('product-usp-list-add')|| Auth::user()->can('product-usp-list-edit')|| Auth::user()->can('product-usp-list-view')|| Auth::user()->can('product-usp-list-delete'))
        {

        return view('admin.setting.usp.index',$title,compact('pages'));
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
        $title            =     array('pageTitle' => 'Product USP Create');
        
        if(Auth::user()->can('product-usp-list-add'))
        {

        return view('admin.setting.usp.create',$title);
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
      'product_usp' => 'required',
      
      
      
    ]);
        

    $data['code']=$request->product_usp;
   
   
   
   
    Productusp::create($data);
   
    return redirect()->back()->with(["success"=>"Product USP Saved Successfully!"]);
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
        $title = array('pageTitle' => 'Edit Product USP');
       
         $page = DB::table('product_usp')->find($id);
       
        if(Auth::user()->can('product-usp-list-edit')|| Auth::user()->can('product-usp-list-view'))
        {

        return view('admin.setting.usp.edit',$title, compact('page'));
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
    

        $tax=Productusp::find($id);
        
        
        $tax->code=$request->get("product_usp");
       
        
        
        $tax->save();

        return redirect()->back()->with(['message' => 'Product USP Updated Successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Project = DB::table('product_usp')->where('id',$id)->delete();
        //$Project->delete();
        return redirect()->back()->with(['message' => 'Product USP Deleted Successfully.']);
    }
    
    public function importfile(){
        $title = array('pageTitle' => 'Import Usp Code');
       
         // $page = DB::table('hsn_code')->find($id);
       
        if(Auth::user()->can('product-usp-list-add'))
        {

        
        return view('admin.setting.usp.import',$title);
        }
        return redirect()->back();
    }

    public function importLeads(Request $request) {
        $request->validate([
            'csv_file' => 'required',
            // 'csv_file' => 'required|mimes:csv,txt',
        ]);
        Excel::import(new UspImport, request()->file('csv_file'));
        return back()->with('success', 'Usp Code imported successfully.');
    }

    public function export(Request $request) 
    {
        
        return Excel::download(new UspExport, 'Usp-code.xlsx');

    }
}

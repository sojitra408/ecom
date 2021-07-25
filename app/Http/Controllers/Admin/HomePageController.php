<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Role;
use App\User;
use Auth;
use Validator;
use App\BrandOfDay;
use DB;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$title= array('pageTitle' => 'Slider');
        $sliders=\App\Slider::where('status',1)->where('trash',0)->orderBy('id','DESC')->paginate(10);
        if(Auth::user()->can('home-page'))
        {

		return view('admin.homepage.sliders.index',$title,compact('sliders'));
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
		$title= array('pageTitle' => 'Add Slider');
		if(Auth::user()->can('home-page'))
        {

        return view('admin.homepage.sliders.create',$title);
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
       // echo '<pre>';print_r($request->all());die;
		$data['title']=$request->title;
		$data['image']=$request->image_id;
		
		$data['created_by']=Auth::id();
		
		$createSlider=\App\Slider::create($data);
		
		if($createSlider){
			return redirect()->route('sliders.index')->with('success','Slider created successfully.');
		}else{
			return redirect()->route('sliders.index')->with('error','Something went wrong!!!, Please try again.');
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$slider=\App\Slider::find($id);
		if(Auth::user()->can('home-page'))
        {

        return view('admin.homepage.sliders.show',compact('slider')); 
        }
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $slider=\App\Slider::find(1);
		$title= array('pageTitle' => 'Edit Slider');
		if(Auth::user()->can('home-page'))
        {

        return view('admin.homepage.sliders.edit',$title,compact('slider')); 
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
		
		$slider=\App\Slider::find($id);
		$data['title']=$request->title;
		$data['left_image']=$request->left_image;
		$data['right_image']=$request->right_image;
		$data['heading']=$request->heading;
		$data['description']=$request->description;
		
		
		$data['updated_by']=Auth::id();
		
		$updateSlider=\App\Slider::where('id',$id)->update($data);
		
		if($updateSlider){
			return redirect()->route('sliders.index')->with('success','Slider updated successfully.');
		}else{
			return redirect()->route('sliders.index')->with('error','Something went wrong!!!, Please try again.');
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteSlider=\App\Slider::where('id',$id)->update(['trash'=>1]);
		
		if($deleteSlider){
			return redirect()->route('sliders.index')->with('success','Slider deleted successfully.');
		}else{
			return redirect()->route('sliders.index')->with('error','Something went wrong!!!, Please try again.');
		}
    }
	
	public function deleteImage(Request $request, $id)
    {
        $deleteImage=\App\Slider::where('id',$id)->update(['image'=>NULL]);
		
		if($deleteImage){
			echo 1;
		}else{
			echo 0;
		}
    }
	
	
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function singleedit(){
		
        $single=\App\Single::first();
        $products=\App\Products::where('category_id',$single->category_id)->where('status',1)->get();
        $categories=\App\Category::where('parent_id',0)->get();
		$title= array('pageTitle' => 'Edit Single Product ');
		
		$all_brands=\App\Single::with('Products')->get();
		
		if(Auth::user()->can('home-page'))
        {

        return view('admin.homepage.single.edit',$title,compact('single','products','categories','all_brands')); 
        }
        return redirect()->back();
    }

    public function singleupdate(Request $request, $id){
		
		$data['product_id']=$request->product_id;
		$data['category_id']=$request->category_id;
		$updateSlider=\App\Single::where('id',$id)->update($data);
		
		if($updateSlider){
			return redirect()->back()->with('success','Single Product updated successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
    }
	
	public function brandedit(){
		
		$count=\App\BrandOfDay::count();
		
        $single=\App\BrandOfDay::first();
        $brands=\App\Brand::where('status',1)->get();
        
        $all_brands=\App\BrandOfDay::with('Brand')->get();
       
		$title= array('pageTitle' => 'Brand of the day ');
		if(Auth::user()->can('home-page'))
        {

        return view('admin.homepage.brand.edit',$title,compact('single','brands','count','all_brands')); 
        }
        return redirect()->back();
    }
    
    
    	public function brandsquareedit(){
		
		$count=\App\BrandSquare::count();
		
        $single=\App\BrandSquare::first();
        $brands=\App\Brand::where('status',1)->get();
        
        $all_brands=\App\BrandSquare::with('Brand')->get();
       
		$title= array('pageTitle' => 'Brand of the day ');
		if(Auth::user()->can('home-page'))
        {

        return view('admin.homepage.brand_square.edit',$title,compact('single','brands','count','all_brands')); 
        }
        return redirect()->back();
    }

    public function brandupdate(Request $request, $id){
		
		$data['brand_id']=$request->brand_id;
		
		$updateSlider=\App\BrandOfDay::where('id',$id)->update($data);
		
		if($updateSlider){
// 			return redirect()->back()->with('success','Brand of the day updated successfully.');
			return redirect()->back();
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
    }
	
	public function saveBrandOfDay(Request $request)
	{
		$arr=array();
	    
	   
	    
		 $check=\App\BrandOfDay::where('brand_id',$request->id)->first();
	     if(empty($check))
	    {
	 
			\App\BrandOfDay::create(['brand_id'=>$request->id]);
			$arr=['status'=>true,'message'=>'Product Added Successfully!!'];
	    }else{
	      
	        \App\BrandOfDay::where('brand_id',$request->id)->delete();
			$arr=['status'=>false,'message'=>'Product Removed Successfully!!'];
	    }
	    return json_encode($arr);
	}
	
	public function savebrandSquare(Request $request)
	{
		$arr=array();
	    
	   
	    
		 $check=\App\BrandSquare::where('brand_id',$request->id)->first();
	     if(empty($check))
	    {
	 
			\App\BrandSquare::create(['brand_id'=>$request->id]);
			$arr=['status'=>true,'message'=>'Product Added Successfully!!'];
	    }else{
	      
	        \App\BrandSquare::where('brand_id',$request->id)->delete();
			$arr=['status'=>false,'message'=>'Product Removed Successfully!!'];
	    }
	    return json_encode($arr);
	}
	
	public function deleteBrandOfDay()
	{
	    $updateSlider=BrandOfDay::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Brand of the day delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
	
	public function deletebrandSquare()
	{
	    $updateSlider=\App\BrandSquare::truncate();
	    if($updateSlider){
			return redirect()->back()->with('success','Brand Square delete successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
	}
	
	public function turneredit(){
		
        $turner=\App\HeadTurner::find(1);
        $products=\App\Products::where('status',1)->get();        
		$title= array('pageTitle' => 'Edit Head Turners');
        
        $all_brands=\App\HeadTurner::with('Products')->get();
        
        if(Auth::user()->can('home-page'))
        {

        return view('admin.homepage.turner.edit',$title,compact('turner','products','all_brands')); 
        }
        return redirect()->back();
    }

    public function turnerupdate(Request $request){
		\App\HeadTurner::truncate();
		foreach($request->product_id as $pro ){
			
		$updateSlider=\App\HeadTurner::create(['product_id'=>$pro]);
		}
		
		if($updateSlider){
			return redirect()->back()->with('success','Head Turners updated successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
    }
	
	public function sponserdedit(){
		
        $single=\App\HomeSponsor::find(1);
        $products=\App\Products::where('status',1)->get();       
		$title= array('pageTitle' => 'Edit Sponsor Product ');
		
		$all_brands=\App\HomeSponsor::with('Products')->get();
		if(Auth::user()->can('home-page'))
        {

        return view('admin.homepage.sponsor.edit',$title,compact('single','products','all_brands')); 
        }
        return redirect()->back();
		
    }

    public function sponserdupdate(Request $request){
		
		
		\App\HomeSponsor::truncate();
		foreach($request->product_id as $pro ){
			
		$updateSlider=\App\HomeSponsor::create(['product_id'=>$pro]);
		}
		
		if($updateSlider){
			return redirect()->back()->with('success','Sponsor Product updated successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
    }
	
	public function topSelledit(){
		
        $single=\App\HomeTopCategory::find(1);       
        $categories=\App\Category::where('parent_id','!=',0)->get();
		$title= array('pageTitle' => 'Edit Top Selling Category ');
		
		$all_brands=\App\HomeTopCategory::with('Category')->get();

		if(Auth::user()->can('home-page'))
        {

        return view('admin.homepage.topsell.edit',$title,compact('single','categories','all_brands')); 
        }
        return redirect()->back();
		
    }

    public function topSellupdate(Request $request){
		
		\App\HomeTopCategory::truncate();
		foreach($request->category_id as $cat ){
			
		$updateSlider=\App\HomeTopCategory::create(['category_id'=>$cat]);
		}
		
		if($updateSlider){
			return redirect()->back()->with('success','Top Selling Category updated successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
    }
	
	public function bestdealedit(){
		
        $single=\App\HomeBestDeal::find(1);
        $categories=\App\Category::where('parent_id','!=',0)->get();
		$title= array('pageTitle' => 'Edit Best Deal');
		if(Auth::user()->can('home-page'))
        {

        return view('admin.homepage.bestdeal.edit',$title,compact('single','categories')); 
        }
        return redirect()->back();
    }

    public function bestdealupdate(Request $request){
		
		\App\HomeBestDeal::truncate();
		foreach($request->category_id as $cat ){
			
		$updateSlider=\App\HomeBestDeal::create(['category_id'=>$cat]);
		}
		
		if($updateSlider){
			return redirect()->back()->with('success','Home Best Deal updated successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
    }
	
	public function recommendedit(){
		
        $single=\App\HomeRecommend::first();
        $products=\App\Products::where('status',1)->get();       
		$title= array('pageTitle' => 'Edit Tot Recommend Product ');
		
		$all_brands=\App\HomeRecommend::with('Products')->get();

		if(Auth::user()->can('home-page'))
        {

        return view('admin.homepage.recommend.edit',$title,compact('single','products','all_brands')); 
        }
        return redirect()->back();
		
    }

    public function recommendupdate(Request $request){
		
		\App\HomeRecommend::truncate();
		foreach($request->product_id as $pro ){
			
		$updateSlider=\App\HomeRecommend::create(['product_id'=>$pro]);
		}
		if($updateSlider){
			return redirect()->back()->with('success','Recommend Product updated successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
    }
	public function bestproductdealedit(){
		
        $single=\App\HomeBestdealProduct::first();
        $products=\App\Products::where('status',1)->get();       
		$title= array('pageTitle' => 'Edit Best Deals Products');
		
		$all_brands=\App\HomeBestdealProduct::with('Products')->get();

		if(Auth::user()->can('home-page'))
        {

        return view('admin.homepage.destdealproduct.edit',$title,compact('single','products','all_brands')); 
        }
        return redirect()->back();
		
    }
    
    public function otherindex(){

		

        $single=\App\HomeOther::all();

        // $products=\App\Products::where('status',1)->get();       

		$title= array('pageTitle' => 'Edit Other ');

		if(Auth::user()->can('home-page'))
        {

        return view('admin.homepage.other.index',$title,compact('single')); 
        }
        return redirect()->back();


    }

    public function otheredit($id){

		

        $single=\App\HomeOther::find($id);

        // $products=\App\Products::where('status',1)->get();       

		$title= array('pageTitle' => 'Edit Other ');

		if(Auth::user()->can('home-page'))
        {

        return view('admin.homepage.other.edit',$title,compact('single')); 
        }
        return redirect()->back();


    }



    public function otherupdate(Request $request, $id){

		

		$slider=\App\HomeOther::find($id);

		$data['title']=$request->title;

		$data['image']=$request->image;

		$data['description']=$request->description;

		if(!empty($image)){
            ini_set('memory_limit','1024M');
            $filename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $imageName = str_replace(' ','_',$filename).'_'.time().'.'.$ext;
            
            $fileOriginalName=$image->getClientOriginalName();
            $destinationPath =public_path().'front/assets/images';
            $image->move($destinationPath,$imageName);
            $data['image']='/front/assets/images/'.$imageName;
        }

		

		$data['updated_by']=Auth::id();

		

		$updateSlider=\App\HomeOther::where('id',$id)->update($data);

		

		if($updateSlider){

			return redirect()->route('home.other.index')->with('success','Other updated successfully.');

		}else{

			return redirect()->route('home.other.index')->with('error','Something went wrong!!!, Please try again.');

		}

    }
    
    public function othertextindex(){

		

        $single=\App\HomeOtherText::all();

        // $products=\App\Products::where('status',1)->get();       

		$title= array('pageTitle' => 'Edit Other ');

		if(Auth::user()->can('home-page'))
        {

        return view('admin.homepage.other-text.index',$title,compact('single')); 
        }
        return redirect()->back();


    }

    public function othertextedit($id){

		

        $single=\App\HomeOtherText::find($id);

        // $products=\App\Products::where('status',1)->get();       

		$title= array('pageTitle' => 'Edit Other ');

		if(Auth::user()->can('home-page'))
        {

        return view('admin.homepage.other-text.edit',$title,compact('single')); 
        }
        return redirect()->back();


    }



    public function othertextupdate(Request $request, $id){

		

		$slider=\App\HomeOtherText::find($id);

		$data['title']=$request->title;
		$data['title2']=$request->title2;

		// $data['image']=$request->image;

		$data['description']=$request->description;

		// if(!empty($image)){
  //           ini_set('memory_limit','1024M');
  //           $filename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
  //           $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
  //           $imageName = str_replace(' ','_',$filename).'_'.time().'.'.$ext;
            
  //           $fileOriginalName=$image->getClientOriginalName();
  //           $destinationPath =public_path().'front/assets/images';
  //           $image->move($destinationPath,$imageName);
  //           $data['image']='/front/assets/images/'.$imageName;
  //       }

		

		$data['updated_by']=Auth::id();

		

		$updateSlider=\App\HomeOtherText::where('id',$id)->update($data);

		

		if($updateSlider){

			return redirect()->route('home.other-text.index')->with('success','Other updated successfully.');

		}else{

			return redirect()->route('home.other-text.index')->with('error','Something went wrong!!!, Please try again.');

		}

    }

    public function othertextsettingindex(){

		

        $single=\App\HomeOtherTextSetting::all();

        // $products=\App\Products::where('status',1)->get();       

		$title= array('pageTitle' => 'Edit Other ');

		if(Auth::user()->can('home-page'))
        {

        return view('admin.homepage.other-text-setting.index',$title,compact('single')); 
        }
        return redirect()->back();


    }

    public function othertextsettingedit($id){

		

        $single=\App\HomeOtherTextSetting::find($id);

        // $products=\App\Products::where('status',1)->get();       

		$title= array('pageTitle' => 'Edit Other ');

		if(Auth::user()->can('home-page'))
        {

        return view('admin.homepage.other-text-setting.edit',$title,compact('single')); 
        }
        return redirect()->back();


    }



    public function othertextsettingupdate(Request $request, $id){

		

		$slider=\App\HomeOtherTextSetting::find($id);

		$data['title']=$request->title;

		

		$data['description']=$request->description;

		

		

		$data['updated_by']=Auth::id();

		

		$updateSlider=\App\HomeOtherTextSetting::where('id',$id)->update($data);

		

		if($updateSlider){

			return redirect()->route('home.other-text-setting.index')->with('success','Other updated successfully.');

		}else{

			return redirect()->route('home.other-text-setting.index')->with('error','Something went wrong!!!, Please try again.');

		}

    }
    
    
    
    
    
    public function best_deals_in_town_index(){

		

        $single=\App\Best_Deals_In_Town::all();

		$title= array('pageTitle' => 'Edit Other ');

		if(Auth::user()->can('home-page'))
        {

        return view('admin.homepage.best_deals_in_town.index',$title,compact('single')); 
        }
        return redirect()->back();


    }

    public function best_deals_in_town_edit($id){

		

        $single=\App\Best_Deals_In_Town::find($id);
        
        // $all_category=\App\Category::where('parent_id',0)->get();
        
        $all_category=\App\Category::all();

		$title= array('pageTitle' => 'Edit Other ');

		if(Auth::user()->can('home-page'))
        {

        return view('admin.homepage.best_deals_in_town.edit',$title,compact('single','all_category')); 
        }
        return redirect()->back();


    }



    public function best_deals_in_town_update(Request $request, $id){
    
            $p_img=$request->image;


        if(!empty($p_img)){

          $pimageName=$p_img->getClientOriginalName();
          $p_img->move('public/images',$pimageName);
          $formInput['image']=$pimageName;

          $user=\App\Best_Deals_In_Town::find($id);

          $user->image= '/images/'.$pimageName;

          $user->save();

        }
		


		$data['title']=$request->title;
		$data['price']=$request->price;
		$data['category_id']=implode(",",$request->category);
	
	


		$updateSlider=\App\Best_Deals_In_Town::where('id',$id)->update($data);

		

		if($updateSlider){

			return redirect()->route('home.best_deals_in_town.index')->with('success','Other updated successfully.');

		}else{

			return redirect()->route('home.best_deals_in_town.index')->with('error','Something went wrong!!!, Please try again.');

		}

    }
    
    
    
    
    public function best_deals_in_town_two_index(){

		

        $single=\App\Best_Deals_In_Town_Two::all();

		$title= array('pageTitle' => 'Edit Other ');

		if(Auth::user()->can('home-page'))
        {

        return view('admin.homepage.best_deals_in_town_two.index',$title,compact('single')); 
        }
        return redirect()->back();


    }

    public function best_deals_in_town_two_edit($id){

		

        $single=\App\Best_Deals_In_Town_Two::find($id);
        
        // $all_category=\App\Category::where('parent_id',0)->get();
        
        $all_category=\App\Category::all();

		$title= array('pageTitle' => 'Edit Other ');

		if(Auth::user()->can('home-page'))
        {

        return view('admin.homepage.best_deals_in_town_two.edit',$title,compact('single','all_category')); 
        }
        return redirect()->back();


    }



    public function best_deals_in_town_two_update(Request $request, $id){
    
            $p_img=$request->image;


        if(!empty($p_img)){

          $pimageName=$p_img->getClientOriginalName();
          $p_img->move('public/images',$pimageName);
          $formInput['image']=$pimageName;

          $user=\App\Best_Deals_In_Town_Two::find($id);

          $user->image= '/images/'.$pimageName;

          $user->save();

        }
		


		$data['title']=$request->title;
		$data['price']=$request->price;
		$data['category_id']=implode(",",$request->category);
	
	


		$updateSlider=\App\Best_Deals_In_Town_Two::where('id',$id)->update($data);

		

		if($updateSlider){

			return redirect()->route('home.best_deals_in_town_two.index')->with('success','Other updated successfully.');

		}else{

			return redirect()->route('home.best_deals_in_town_two.index')->with('error','Something went wrong!!!, Please try again.');

		}

    }
    
    
    public function collections_edit()
    {
        $slider=\App\Home_Collections::find(1);
        $all_collection=DB::table('collections')->where('status',1)->get();
		$title= array('pageTitle' => 'Edit Collections');

		if(Auth::user()->can('home-page'))
        {
        return view('admin.homepage.collections.edit',$title,compact('slider','all_collection')); 

        }
        return redirect()->back();
    }

   
    public function collections_update(Request $request, $id)
    {
		
		$slider=\App\Home_Collections::find($id);
	
		$data['collections_id']=implode(",",$request->collections);
		
		$updateSlider=\App\Home_Collections::where('id',$id)->update($data);
		
		if($updateSlider){
			return redirect()->route('home.collections.edit')->with('success','Collections updated successfully.');
		}else{
			return redirect()->route('home.collections.edit')->with('error','Something went wrong!!!, Please try again.');
		}
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Role;
use App\User;
use Auth;
use Validator;
use DB;
class FashionPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$title= array('pageTitle' => 'Slider');
        $sliders=\App\FashionBanner::where('status',1)->where('trash',0)->orderBy('id','DESC')->paginate(10);
        if(Auth::user()->can('fashion-category'))
        {
		return view('admin.fashion.sliders.index',$title,compact('sliders'));

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
		if(Auth::user()->can('fashion-category'))
        {

        return view('admin.fashion.sliders.create',$title);
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
		
		$createSlider=\App\FashionBanner::create($data);
		
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
		$slider=\App\FashionBanner::find($id);

		if(Auth::user()->can('fashion-category'))
        {

        return view('admin.fashion.sliders.show',compact('slider')); 
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
        $slider=\App\FashionBanner::find(1);
		$title= array('pageTitle' => 'Edit Banner');

		if(Auth::user()->can('fashion-category'))
        {
        return view('admin.fashion.sliders.edit',$title,compact('slider')); 

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
		
		$updateSlider=\App\FashionBanner::where('id',$id)->update($data);
		
		if($updateSlider){
			return redirect()->route('fashion.banner')->with('success','Banner updated successfully.');
		}else{
			return redirect()->route('fashion.banner')->with('error','Something went wrong!!!, Please try again.');
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
		
       $single=\App\FashionSingle::where('category_id',2)->with(['Products'])->first();
       // $products=\App\Products::where('category_id',$single->Products->category_id)->where('status',1)->get();
        $categories=\App\Category::where('parent_id',0)->get();
		$title= array('pageTitle' => 'Edit Single Product ');
		$all_brands=\App\FashionSingle::with('Products')->get();
		
		if(Auth::user()->can('fashion-category'))
        {

        return view('admin.fashion.single.edit',$title,compact('single','all_brands')); 
        }
        return redirect()->back();
    }

    public function singleupdate(Request $request, $id){
		
		$data['product_id']=$request->product_id;
		$data['category_id']=$request->category_id;
		$updateSlider=\App\FashionSingle::where('id',$id)->update($data);
		
		if($updateSlider){
			return redirect()->back()->with('success','Single Product updated successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
    }
	
	public function brandedit(){
		
        $single=\App\FashionBrandOfDay::first();
        $brands=\App\Brand::where('status',1)->get();
       
		$title= array('pageTitle' => 'Brand of the day ');
		if(Auth::user()->can('fashion-category'))
        {

        return view('admin.fashion.brand.edit',$title,compact('single','brands')); 
        }
        return redirect()->back();
    }

    public function brandupdate(Request $request, $id){
		
		$data['brand_id']=$request->brand_id;
		$data['price']=$request->price;
		
		$updateSlider=\App\FashionBrandOfDay::where('id',$id)->update($data);
		
		if($updateSlider){
			return redirect()->back()->with('success','Brand of the day updated successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
    }
	
	public function turneredit(){
		
        $single=\App\FashionSingle::with(['Products'])->first();
        $products=\App\Products::where('status',1)->get();        
		$title= array('pageTitle' => 'Edit Head Turners');
		
		$all_brands=\App\FashionBesties::with('Products')->get();

		if(Auth::user()->can('fashion-category'))
        {

        return view('admin.fashion.besties.edit',$title,compact('single','products','all_brands')); 
        }
        return redirect()->back();
    }
	
	public function trendingedit(){
		
        $single=\App\FashionSingle::with(['Products'])->first();
        $products=\App\Products::where('status',1)->get();        
		$title= array('pageTitle' => 'Edit Head Turners');
		
		$all_brands=\App\FashionTrending::with('Products')->get();

		if(Auth::user()->can('fashion-category'))
        {
        return view('admin.fashion.trending.edit',$title,compact('single','products','all_brands')); 

        }
        return redirect()->back();
    }
	
	public function duesedit(){
		
        $single=\App\FashionSingle::with(['Products'])->first();
        $products=\App\Products::where('status',1)->get();        
		$title= array('pageTitle' => 'Edit Head Turners');
		
		$all_brands=\App\FashionDues::with('Products')->get();

		if(Auth::user()->can('fashion-category'))
        {

        return view('admin.fashion.dues.edit',$title,compact('single','products','all_brands')); 
        }
        return redirect()->back();
		
    }
	
	public function missesedit(){
		
        $single=\App\FashionSingle::with(['Products'])->first();
        $products=\App\Products::where('status',1)->get();        
		$title= array('pageTitle' => 'Edit Head Turners');
		
		$all_brands=\App\FashionMisses::with('Products')->get();

		if(Auth::user()->can('fashion-category'))
        {

        return view('admin.fashion.misses.edit',$title,compact('single','products','all_brands')); 
        }
        return redirect()->back();
		
    }
	public function kidsedit(){
		
        $single=\App\FashionSingle::with(['Products'])->first();
        $products=\App\Products::where('status',1)->get();        
		$title= array('pageTitle' => 'Edit Head Turners');
		
		$all_brands=\App\FashionKids::with('Products')->get();

		if(Auth::user()->can('fashion-category'))
        {

        return view('admin.fashion.kids.edit',$title,compact('single','products','all_brands')); 
        }
        return redirect()->back();
		
    }

    public function turnerupdate(Request $request, $id){
		\App\FashionTurner::delete();
		foreach($request->product_id as $pro ){
			
		$updateSlider=\App\FashionTurner::create(['product_id'=>$pro]);
		}
		
		if($updateSlider){
			return redirect()->back()->with('success','Head Turners updated successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
    }
	
	public function sponserdedit(){
		
         $single=\App\FashionSponsor::find(1);
        $products=\App\Products::where('status',1)->get();       
		$title= array('pageTitle' => 'Edit Sponsor Product ');
		
		$all_brands=\App\FashionSponsor::with('Products')->get();

		if(Auth::user()->can('fashion-category'))
        {

        return view('admin.fashion.sponsor.edit',$title,compact('single','products','all_brands')); 
        }
        return redirect()->back();
		
    }

    public function sponserdupdate(Request $request, $id){
		
		\App\FashionSponsor::truncate();
		foreach($request->product_id as $pro ){
			
		$updateSlider=\App\FashionSponsor::create(['product_id'=>$pro]);
		}
		
		if($updateSlider){
			return redirect()->back()->with('success','Single Product updated successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
    }
    
    
    
    public function fashion_sponserd_update(Request $request)
	{
		$arr=array();	    
		 $check=\App\FashionSponsor::where('product_id',$request->id)->get()->count();
	     if($check==0)
	    {	  
			\App\FashionSponsor::create(['product_id'=>$request->id]);
			$arr=['status'=>true,'message'=>'Product Added Successfully!!'];
	    }else{	     
	        \App\FashionSponsor::where('product_id',$request->id)->delete();
			$arr=['status'=>false,'message'=>'Product Removed Successfully!!'];
	    }
	    return json_encode($arr);
	}
    
	
	public function topSelledit(){
		
         $single=\App\HomeTopCategory::find(1);       
        $categories=\App\Category::where('parent_id','!=',0)->get();
		$title= array('pageTitle' => 'Edit Top Selling Category ');

		if(Auth::user()->can('fashion-category'))
        {

        return view('admin.fashion.topsell.edit',$title,compact('single','categories')); 
        }
        return redirect()->back();
    }

    public function topSellupdate(Request $request, $id){
		
		\App\HomeTopCategory::delete();
		foreach($request->category_id as $cat ){
			
		$updateSlider=\App\HomeTopCategory::create(['category_id'=>$cat]);
		}
		if($updateSlider){
			return redirect()->back()->with('success','Single Product updated successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
    }
	
	public function bestdealedit(){
		
       $single=\App\FashionBestDeal::first();
        $categories=\App\Category::where('parent_id','!=',0)->get();
		$title= array('pageTitle' => 'Edit Best Deal');
		
		$all_brands=\App\FashionTopCategory::with('Category')->get();

		if(Auth::user()->can('fashion-category'))
        {

        return view('admin.fashion.bestdeal.edit',$title,compact('single','categories','all_brands')); 
        }
        return redirect()->back();
		
    }

    public function bestdealupdate(Request $request, $id){
		
		
		\App\FshionBestDeal::delete();
		foreach($request->category_id as $cat ){
			
		$updateSlider=\App\FshionBestDeal::create(['category_id'=>$cat]);
		}
		
		if($updateSlider){
			return redirect()->back()->with('success','Single Product updated successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
    }
	
	public function recommendedit(){
		
         $single=\App\FashionRecommend::find(1);
        $products=\App\Products::where('status',1)->get();       
		$title= array('pageTitle' => 'Edit Tot Recommend Product ');
		$all_brands=\App\FashionRecommend::with('Products')->get();

		if(Auth::user()->can('fashion-category'))
        {

        return view('admin.fashion.recommend.edit',$title,compact('single','products','all_brands')); 
        }
        return redirect()->back();

    }

    public function recommendupdate(Request $request){
		
		
		\App\FashionRecommend::delete();
		foreach($request->product_id as $pro ){
			
		$updateSlider=\App\FashionRecommend::create(['product_id'=>$pro]);
		
		if($updateSlider){
			return redirect()->back()->with('success','Single Product updated successfully.');
		}else{
			return redirect()->back()->with('error','Something went wrong!!!, Please try again.');
		}
    }
	
	
    }
    
    
    public function fashion_tot_recommend_update(Request $request){
		
// 		dd('ok');
		$arr=array();	    
		 $check=\App\FashionRecommend::where('product_id',$request->id)->get()->count();
	     if($check==0)
	    {	  
			\App\FashionRecommend::create(['product_id'=>$request->id]);
			$arr=['status'=>true,'message'=>'Product Added Successfully!!'];
	    }else{	     
	        \App\FashionRecommend::where('product_id',$request->id)->delete();
			$arr=['status'=>false,'message'=>'Product Removed Successfully!!'];
	    }
	    return json_encode($arr);

	
	
    }
    
    
    
    
    public function best_deals_in_town_index(){

		

        $single=\App\Fashion_Best_Deals_In_Town::all();

		$title= array('pageTitle' => 'Edit Other ');

		if(Auth::user()->can('fashion-category'))
        {

        return view('admin.fashion.best_deals_in_town.index',$title,compact('single')); 
        }
        return redirect()->back();


    }

    public function best_deals_in_town_edit($id){

		

        $single=\App\Fashion_Best_Deals_In_Town::find($id);
        
        // $all_category=\App\Category::where('parent_id',0)->get();
        
        $all_category=\App\Category::all();

		$title= array('pageTitle' => 'Edit Other ');

		if(Auth::user()->can('fashion-category'))
        {

        return view('admin.fashion.best_deals_in_town.edit',$title,compact('single','all_category')); 
        }
        return redirect()->back();


    }



    public function best_deals_in_town_update(Request $request, $id){
    
            $p_img=$request->image;


        if(!empty($p_img)){

          $pimageName=$p_img->getClientOriginalName();
          $p_img->move('public/images',$pimageName);
          $formInput['image']=$pimageName;

          $user=\App\Fashion_Best_Deals_In_Town::find($id);

          $user->image= '/images/'.$pimageName;

          $user->save();

        }
		


		$data['title']=$request->title;
		$data['price']=$request->price;
		$data['category_id']=implode(",",$request->category);
	
	


		$updateSlider=\App\Fashion_Best_Deals_In_Town::where('id',$id)->update($data);

		

		if($updateSlider){

			return redirect()->route('fashion.best_deals_in_town.index')->with('success','Other updated successfully.');

		}else{

			return redirect()->route('fashion.best_deals_in_town.index')->with('error','Something went wrong!!!, Please try again.');

		}

    }
    
    
    
    
    public function best_deals_in_town_two_index(){

		

        $single=\App\Fashion_Best_Deals_In_Town_Two::all();

		$title= array('pageTitle' => 'Edit Other ');

		if(Auth::user()->can('fashion-category'))
        {

        return view('admin.fashion.best_deals_in_town_two.index',$title,compact('single')); 
        }
        return redirect()->back();


    }

    public function best_deals_in_town_two_edit($id){

		

        $single=\App\Fashion_Best_Deals_In_Town_Two::find($id);
        
        // $all_category=\App\Category::where('parent_id',0)->get();
        
        $all_category=\App\Category::all();

		$title= array('pageTitle' => 'Edit Other ');

		if(Auth::user()->can('fashion-category'))
        {

        return view('admin.fashion.best_deals_in_town_two.edit',$title,compact('single','all_category')); 
        }
        return redirect()->back();


    }



    public function best_deals_in_town_two_update(Request $request, $id){
    
            $p_img=$request->image;


        if(!empty($p_img)){

          $pimageName=$p_img->getClientOriginalName();
          $p_img->move('public/images',$pimageName);
          $formInput['image']=$pimageName;

          $user=\App\Fashion_Best_Deals_In_Town_Two::find($id);

          $user->image= '/images/'.$pimageName;

          $user->save();

        }
		


		$data['title']=$request->title;
		$data['price']=$request->price;
		$data['category_id']=implode(",",$request->category);
	
	


		$updateSlider=\App\Fashion_Best_Deals_In_Town_Two::where('id',$id)->update($data);

		

		if($updateSlider){

			return redirect()->route('fashion.best_deals_in_town_two.index')->with('success','Other updated successfully.');

		}else{

			return redirect()->route('fashion.best_deals_in_town_two.index')->with('error','Something went wrong!!!, Please try again.');

		}

    }
    
    
    public function collections_edit()
    {
        $slider=\App\Fashion_Collections::find(1);
        $all_collection=DB::table('collections')->where('status',1)->get();
		$title= array('pageTitle' => 'Edit Collections');

		if(Auth::user()->can('fashion-category'))
        {

        return view('admin.fashion.collections.edit',$title,compact('slider','all_collection')); 
        }
        return redirect()->back();
    }

   
    public function collections_update(Request $request, $id)
    {
		
		$slider=\App\Fashion_Collections::find($id);
	
		$data['collections_id']=implode(",",$request->collections);
		
		$updateSlider=\App\Fashion_Collections::where('id',$id)->update($data);
		
		if($updateSlider){
			return redirect()->route('fashion.collections.edit')->with('success','Collections updated successfully.');
		}else{
			return redirect()->route('fashion.collections.edit')->with('error','Something went wrong!!!, Please try again.');
		}
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function fashion_head_turners_for_dudes_edit()
    {
        $slider=\App\Fashion_Head_Turners_For_Dudes::find(1);
        $all_collection=\App\Category::where('parent_id',2)->get();
		$title= array('pageTitle' => 'Edit Collections');

		if(Auth::user()->can('fashion-category'))
        {

        return view('admin.fashion.head_turners_for_dudes.edit',$title,compact('slider','all_collection')); 
        }
        return redirect()->back();
    }

   
    public function fashion_head_turners_for_dudes_update(Request $request, $id)
    {
		
		$slider=\App\Fashion_Head_Turners_For_Dudes::find($id);
	    
		$data['category_id']=implode(",",$request->collections);
		
		$updateSlider=\App\Fashion_Head_Turners_For_Dudes::where('id',$id)->update($data);
		
		if($updateSlider){
			return redirect()->route('fashion.fashion_head_turners_for_dudes.edit')->with('success','Collections updated successfully.');
		}else{
			return redirect()->route('fashion.fashion_head_turners_for_dudes.edit')->with('error','Something went wrong!!!, Please try again.');
		}
    }
    
    public function fashion_head_turners_for_stoppers_in_city_edit()
    {
        $slider=\App\Fashion_Head_Turners_For_Stoppers_In_City::find(1);
        $all_collection=DB::table('brand')->where('status',1)->get();
		$title= array('pageTitle' => 'Edit Collections');

		if(Auth::user()->can('fashion-category'))
        {

        return view('admin.fashion.show_stoppers_in_city.edit',$title,compact('slider','all_collection')); 
        }
        return redirect()->back();
    }

   
    public function fashion_head_turners_for_stoppers_in_city_update(Request $request, $id)
    {
		
		$slider=\App\Fashion_Head_Turners_For_Stoppers_In_City::find($id);
	
		$data['category_id']=implode(",",$request->collections);
		
		$updateSlider=\App\Fashion_Head_Turners_For_Stoppers_In_City::where('id',$id)->update($data);
		
		if($updateSlider){
			return redirect()->route('fashion.fashion_head_turners_for_stoppers_in_city.edit')->with('success','Collections updated successfully.');
		}else{
			return redirect()->route('fashion.fashion_head_turners_for_stoppers_in_city.edit')->with('error','Something went wrong!!!, Please try again.');
		}
    }
    
    
    public function fashion_head_turners_for_little_grown_ups_edit()
    {
        $slider=\App\Fashion_Head_Turners_For_Little_Grown_Ups::find(1);
        $all_collection=\App\Category::where('parent_id',2)->get();
		$title= array('pageTitle' => 'Edit Collections');

		if(Auth::user()->can('fashion-category'))
        {

        return view('admin.fashion.head_turners_for_little_grown_ups.edit',$title,compact('slider','all_collection')); 
        }
        return redirect()->back();
    }

   
    public function fashion_head_turners_for_little_grown_ups_update(Request $request, $id)
    {
		
		$slider=\App\Fashion_Head_Turners_For_Little_Grown_Ups::find($id);
	
		$data['category_id']=implode(",",$request->collections);
		
		$updateSlider=\App\Fashion_Head_Turners_For_Little_Grown_Ups::where('id',$id)->update($data);
		
		if($updateSlider){
			return redirect()->route('fashion.fashion_head_turners_for_little_grown_ups.edit')->with('success','Collections updated successfully.');
		}else{
			return redirect()->route('fashion.fashion_head_turners_for_little_grown_ups.edit')->with('error','Something went wrong!!!, Please try again.');
		}
    }
    
    public function fashion_head_turners_for_babes_edit()
    {
        $slider=\App\Fashion_Head_Turners_For_Babes::find(1);
        $all_collection=\App\Category::where('parent_id',2)->get();
		$title= array('pageTitle' => 'Edit Collections');

		if(Auth::user()->can('fashion-category'))
        {

        return view('admin.fashion.head_turners_for_babes.edit',$title,compact('slider','all_collection')); 
        }
        return redirect()->back();
    }

   
    public function fashion_head_turners_for_babes_update(Request $request, $id)
    {
		
		$slider=\App\Fashion_Head_Turners_For_Babes::find($id);
	
		$data['category_id']=implode(",",$request->collections);
		
		$updateSlider=\App\Fashion_Head_Turners_For_Babes::where('id',$id)->update($data);
		
		if($updateSlider){
			return redirect()->route('fashion.fashion_head_turners_for_babes.edit')->with('success','Collections updated successfully.');
		}else{
			return redirect()->route('fashion.fashion_head_turners_for_babes.edit')->with('error','Something went wrong!!!, Please try again.');
		}
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}

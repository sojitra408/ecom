<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\RoleUser;

use Mail;
use DB;
use Auth;


class BeautyPageController extends Controller {

    
    public function homeSlider(Request $request) {
		
        $slider = \App\BeautyBanner::where('id', 1)->first();
		$slider['img1']="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/slider/large/".getSliderMediaById($slider->left_image);
		$slider['img2']="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/slider/large/".getSliderMediaById($slider->right_image);
        return response()->json(['result' => $slider, 'status' => 1]);
    }
	
	public function homeSingle(Request $request){
		
		$single = \App\BeautySingle::with(['Products','Category'])->where('id', 1)->first();
		$variant= \App\ProductVariant::where('product_id',$single->id)->first();
		$brand=getProductDetailsById($single->id)->Brand->brand_name;
		if(!empty($variant)){
		$single['img']="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/".$brand."/large/".getSliderMediaById($variant->featured_image);
		}else{
			$single['img']='';
		}
        return response()->json(['result' => $single, 'status' => 1]);
	}
	
	public function homeBrands(Request $request){
		
		$arr=array();
		$brands = \App\Brand::where('status', 1)->get();
		if(!empty($brands)){
			foreach($brands as $k=>$br){
				$arr[$k]['id']=$br->id;
				$arr[$k]['brand_name']=$br->brand_name;
				$arr[$k]['thumbnail']="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/".$br->brand_name."/small/".getSliderMediaById($br->thumbnail);
				
			}
		}
			
        return response()->json(['result' => $arr, 'status' => 1]);
		
	}
	
	public function homeBrandofDays(Request $request){
		
		$brands = \App\BeautyBrandOfDay::where('id', 1)->first();		
		$arr=array();
		if(!empty($brands)){
			$br=\App\Brand::where('id', $brands->brand_id)->first();
				$arr['id']=$br->id;
				$arr['brand_name']=$br->brand_name;
				$arr['thumbnail']="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/".$br->brand_name."/small/".getSliderMediaById($br->thumbnail);
				
			
		}
			
        return response()->json(['result' => $arr, 'status' => 1]);
		
	}

   public function homeNewArrival(Request $request){
		
		$products = \App\Products::where('status', 1)->orderBy('id','DESC')->limit(12)->get();		
        return response()->json(['result' => $products, 'status' => 1]);
		
	}
	public function homeTurner(Request $request){
		
		$products = \App\BeautyTurner::with('Products')->get();		
        return response()->json(['result' => $products, 'status' => 1]);
		
	}
	public function homeSponsor(Request $request){
		
		$products = \App\BeautySponsor::with('Products')->get();		
        return response()->json(['result' => $products, 'status' => 1]);
		
	}
	public function homeTopSelling(Request $request){
		
		$categories = \App\BeautyTopCategory::with('Category')->get();		
        return response()->json(['result' => $categories, 'status' => 1]);
		
	}
	
	public function homeBestDeal(Request $request){
		
		$categories = \App\BeautyBestDeal::with('Category')->get();		
        return response()->json(['result' => $categories, 'status' => 1]);
		
	}
   public function homeTotRecommened(Request $request){
		
		$products = \App\BeautyRecommend::with('Products')->get();		
        return response()->json(['result' => $products, 'status' => 1]);
		
	}
    
}
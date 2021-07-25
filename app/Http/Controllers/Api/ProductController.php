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


class ProductController extends Controller {

    
	 public function products(Request $request){
		$arr=array();
		$products = \App\Products::where('status',1)->orderBy('id','DESC')->get();	
		
		$i=0;
		foreach($products as $pro){
			$arr[$i]['id']=$pro->id;
			$arr[$i]['product_name']=$pro->product_name;
			$variant= \App\ProductVariant::where('product_id',$pro->id)->first();
			if(!empty($variant)){
				$arr[$i]['price']=$variant->mrp;
				$arr[$i]['offer_price']=$variant->offer_price;
				$brand=getProductDetailsById($pro->id)->Brand->brand_name;
				$arr[$i]['featured_image']="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/".$brand."/large/".getSliderMediaById($variant->featured_image);
			}else{
				$arr[$i]['price']='';
				$arr[$i]['offer_price']='';
				$arr[$i]['featured_image']='';
			}
			$i++;
		}
        return response()->json(['result' => $arr, 'status' => 1]);
		
	}
	
    public function homeSlider(Request $request) {
		
        $slider = \App\Slider::where('id', 1)->first();
		$slider['img1']="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/slider/large/".getSliderMediaById($slider->left_image);
		$slider['img2']="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/slider/large/".getSliderMediaById($slider->right_image);
        return response()->json(['result' => $slider, 'status' => 1]);
    }
	
	public function productDetails(Request $request,$id){
		
		$single = \App\Products::where('id', $id)->first();
		$variant= \App\ProductVariant::with('VariantValues')->where('product_id',$single->id)->first();
		$variants= \App\ProductVariant::where('product_id',$single->id)->get();
		$brand=getProductDetailsById($single->id)->Brand->brand_name;
		$colors= \App\AttributeValue::where('attribute_id',5)->get();
		$sizes= \App\AttributeValue::where('attribute_id',4)->get();
		$single['variant']=$variant;
		$single['variants']=$variants;
		$single['colors']=$colors;
		$single['sizes']=$sizes;
		if(!empty($variant)){
		$single['img']="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/".$brand."/large/".getSliderMediaById($variant->featured_image);
		}else{
			$single['img']='';
		}
        return response()->json(['result' => $single, 'status' => 1]);
	}
	public function getVariantProduct(Request $request,$product_id,$id){
		$single = \App\Products::where('id', $product_id)->first();
		$variantval= \App\VariantValues::where('product_id',$product_id)->where('value_id',$id)->first();
		
		$variant=\App\ProductVariant::with('VariantValues')->where('id',$variantval->variant_id)->first();
		$variants= \App\ProductVariant::where('product_id',$single->id)->get();
		$brand=getProductDetailsById($single->id)->Brand->brand_name;
		$colors= \App\AttributeValue::where('attribute_id',5)->get();
		$sizes= \App\AttributeValue::where('attribute_id',4)->get();
		$single['variant']=$variant;
		$single['variants']=$variants;
		$single['colors']=$colors;
		$single['sizes']=$sizes;
		if(!empty($variant)){
			$single['img']="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/".$brand."/large/".getSliderMediaById($variant->featured_image);
			}else{
				$single['img']='';
			}
        return response()->json(['result' => $single, 'status' => 1]);
	}
	public function getSmallImage(Request $request,$product_id,$id){
		$single = \App\Products::where('id', $product_id)->first();
		$brand=getProductDetailsById($single->id)->Brand->brand_name;
		
		return $img="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/".$brand."/small/".getSliderMediaById($id);
		
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
		
		$brands = \App\BrandOfDay::with('Brand')->where('id', 1)->first();		
        return response()->json(['result' => $brands, 'status' => 1]);
		
	}

   public function homeNewArrival(Request $request){
		$arr=array();
		$products = \App\Products::where('status',1)->orderBy('id','DESC')->take(12)->get();	
		
		$i=0;
		foreach($products as $pro){
			$arr[$i]['id']=$pro->id;
			$arr[$i]['product_name']=$pro->product_name;
			$variant= \App\ProductVariant::where('product_id',$pro->id)->first();
			if(!empty($variant)){
				$arr[$i]['price']=$variant->mrp;
				$arr[$i]['offer_price']=$variant->offer_price;
				$brand=getProductDetailsById($pro->id)->Brand->brand_name;
				$arr[$i]['featured_image']="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/".$brand."/large/".getSliderMediaById($variant->featured_image);
			}else{
				$arr[$i]['price']='';
				$arr[$i]['offer_price']='';
				$arr[$i]['featured_image']='';
			}
			$i++;
		}
        return response()->json(['result' => $arr, 'status' => 1]);
		
	}
	public function homeTurner(Request $request){
		$arr=array();
		$products = \App\HeadTurner::with('Products')->get();
		$i=0;
		foreach($products as $pro){
			$arr[$i]['id']=$pro->product_id;
			$arr[$i]['product_name']=$pro->Products->product_name;
			$variant= \App\ProductVariant::where('product_id',$pro->product_id)->first();
			if(!empty($variant)){
				$arr[$i]['price']=$variant->mrp;
				$arr[$i]['offer_price']=$variant->offer_price;
				$brand=getProductDetailsById($pro->product_id)->Brand->brand_name;
				$arr[$i]['featured_image']="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/".$brand."/large/".getSliderMediaById($variant->featured_image);
			}else{
				$arr[$i]['price']='';
				$arr[$i]['offer_price']='';
				$arr[$i]['featured_image']='';
			}
			$i++;
		}
        return response()->json(['result' => $arr, 'status' => 1]);
		
	}
	public function homeSponsor(Request $request){
		
		

		$arr=array();
		$products = \App\HomeSponsor::with('Products')->get();
		$i=0;
		foreach($products as $pro){
			$arr[$i]['id']=$pro->product_id;
			$arr[$i]['product_name']=$pro->Products->product_name;
			$variant= \App\ProductVariant::where('product_id',$pro->product_id)->first();
			if(!empty($variant)){
				$arr[$i]['price']=$variant->mrp;
				$arr[$i]['offer_price']=$variant->offer_price;
				$brand=getProductDetailsById($pro->product_id)->Brand->brand_name;
				$arr[$i]['featured_image']="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/".$brand."/large/".getSliderMediaById($variant->featured_image);
			}else{
				$arr[$i]['price']='';
				$arr[$i]['offer_price']='';
				$arr[$i]['featured_image']='';
			}
			$i++;
		}
        return response()->json(['result' => $arr, 'status' => 1]);
        
		
	}
	public function homeTopSelling(Request $request){
		
		$categories = \App\HomeTopCategory::with('Category')->get();

		$i=0;
		foreach($categories as $cate){
			
			$arr[$i]['id']=$cate->category_id;
			$arr[$i]['name']=$cate->Category->name;
			$arr[$i]['banner']="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/category/small/".getSliderMediaById($cate->Category->banner);
			
			
			$i++;
		}
        return response()->json(['result' => $arr, 'status' => 1]);
		
	}
	
	public function homeBestDeal(Request $request){
		
		$categories = \App\HomeBestDeal::with('Category')->get();		
        $i=0;
		foreach($categories as $cate){
			
			$arr[$i]['id']=$cate->category_id;
			$arr[$i]['name']=$cate->Category->name;
			$arr[$i]['banner']="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/category/medium/".getSliderMediaById($cate->Category->banner);
			
			
			$i++;
		}
        return response()->json(['result' => $arr, 'status' => 1]);
		
	}
   public function homeTotRecommened(Request $request){
		
		
		$arr=array();
		$products = \App\HomeRecommend::with('Products')->get();
		$i=0;
		foreach($products as $pro){
			$arr[$i]['id']=$pro->product_id;
			$arr[$i]['product_name']=$pro->Products->product_name;
			$variant= \App\ProductVariant::where('product_id',$pro->product_id)->first();
			if(!empty($variant)){
				$arr[$i]['price']=$variant->mrp;
				$arr[$i]['offer_price']=$variant->offer_price;
				$brand=getProductDetailsById($pro->product_id)->Brand->brand_name;
				$arr[$i]['featured_image']="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/".$brand."/large/".getSliderMediaById($variant->featured_image);
			}else{
				$arr[$i]['price']='';
				$arr[$i]['offer_price']='';
				$arr[$i]['featured_image']='';
			}
			$i++;
		}
        return response()->json(['result' => $arr, 'status' => 1]);
		
      
		
	}
	
	public function getSizes(Request $request){
		
		$sizes= \App\AttributeValue::where('attribute_id1',4)->get();
		
        return response()->json(['result' => 'abc', 'status' => 1]);
		
	}
	public function getColors(Request $request){
		
		$colors= \App\AttributeValue::where('attribute_id',5)->get();
        return response()->json(['result' => $colors, 'status' => 1]);
		
	}
    
}

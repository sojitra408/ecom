<?php 
use App\Models\admin\UploadImage; 
function getUserDetails($user_id){
	$user=\App\User::with('UserRole.Role')->where('id',$user_id)->first();
	return $user;
}
function discountOnProduct($id){
	$product = \App\ProductVariant::with(['Products'])->where('id',$id)->first();	
	
	$brand_id=$product->Products->brand_id;
	$category_id=$product->Products->category_id;
	$sub_cate_id=explode(',',$product->Products->subcategory_id);
	$product_id=$product->Products->id;
	$discounts=\App\discount::where('status',1)->get();
	$final_discount=0;
	$bag_discount=0;
	$brand_discount=array();
	$cate_discount=array();
	$product_discount=array();
	
	$bag_discount=(int)$product->mrp - (int)$product->offer_price;
	$i=0;
	foreach($discounts as $dis){
		$brands=explode(',',$dis->brand_id);
		$categories=explode(',',$dis->category_id);
		$products=explode(',',$dis->product_id);
		$bd=0;
		$cd=0;
		$pd=0;
		
		if(in_array($brand_id,$brands)){
			if($dis->type=='fix'){
			//$bd=(int)$product->mrp -(int)$dis->discount_fix;
			$bd=(int)$dis->discount_fix;
			}else{
				$bd=(((int)$product->mrp)*((int)$dis->discount_percentage))/100;
			}
			$brand_discount[$i]=$bd;
		}
		
		if(in_array($category_id,$categories) || (!empty($sub_cate_id) && !empty($categories) && !empty(array_intersect($sub_cate_id, $categories)))){
			
			if($dis->type=='fix'){
			$cd=(int)$dis->discount_fix;
			}else{
				$cd=(((int)$product->mrp)*((int)$dis->discount_percentage))/100;
			}
			$cate_discount[$i]=$cd;
		}
		
		if(in_array($product_id,$products)){
			
			if($dis->type=='fix'){
			$pd=(int)$dis->discount_fix;
			}else{
				$pd=(((int)$product->mrp)*((int)$dis->discount_percentage))/100;
			}
			
			$product_discount[$i]=$pd;
			
		}
		
		
		
	$i++;	
	}
	/*echo $bag_discount;
	echo '<pre>';print_r($brand_discount);
	echo '<pre>';print_r($cate_discount);
	echo '<pre>';print_r($product_discount);
	die;*/
	if(!empty($brand_discount)){
	$brandDis=max($brand_discount);
	}else{
		$brandDis=0;
	}
	if(!empty($cate_discount)){
		$catDis=max($cate_discount);
	}else{
		$catDis=0;
	}
	
	if(!empty($product_discount)){
		$proDis=max($product_discount);
	}else{
		$proDis=0;
	}
	
	//$proDis=max($product_discount);
	
	$final_discount=max($bag_discount,$brandDis,$catDis,$proDis);
	 
	return $final_discount;
	
}
function trackingData($tracking_id){
	$html='';
	if($tracking_id!=''){
			 
		$trackingId=$tracking_id;
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
			//return json_encode($result->trackingEvents);
			foreach($result->trackingEvents as $k=>$tv){
				$html.='<p><a class="btn btn-primary" data-toggle="collapse" href="#collapseExample-'.$k.'" role="button" aria-expanded="false" aria-controls="collapseExample">'.$tv->status.'</a></p><div class="collapse" id="collapseExample-'.$k.'"><div class="card card-body">Comments: '.$tv->comments.'<br>Location: '.$tv->location.'<br>datetime: '.$tv->datetime.'</div></div><br>';
			}
			echo $html;
		}else{
			echo $html;
		}
		//return json_encode($response->tracking_details->$trackingId->trackingEvents);
		
		}else{
			echo $html;
			
		}
	
}
function getProductSingleVariantById($id){
		$variant= \App\ProductVariant::where('stock','!=','0')->where('product_id',$id)->first();
		if($variant){
		$discount=discountOnProduct($variant->id);
		$dis=$variant->mrp - $discount;
		$per= round(($discount*100)/(int)($variant->mrp),2);				
		$variant->offer_price=$dis;
		$variant->discount=$discount;
		$variant->offer_per=$per;
		
		$brand=getProductDetailsById($id)->Brand->brand_name;
		$brand = preg_replace('/\s+/', '', $brand);
		$variants_array=\App\VariantValues::select('attribute_id')->where('product_id',$id)->distinct('attribute_id')->get();
		//echo '<pre>';print_r($variants_array);
		$galleries=array();
		if(count($variants_array)==1){
			
			if(!empty($variant)){ 
			$variant->img="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/".$brand."/large/".getSliderMediaById($variant->featured_image);
			}else{
				$variant->img='';
			}
			
			
		}else{
			
			
			
			
			if(!empty($variant)){ 
			$variant->img="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/".$brand."/large/".getSliderMediaById($variant->featured_image);
			}else{
				$variant->img='';
			}
			
		}
		}
		return $variant;
	
}
function getVariantById($id){
	
		$variant= \App\ProductVariant::where('id',$id)->first();
		if($variant){
		/* $discount=discountOnProduct($variant->id);
		$dis=$variant->mrp - $discount;
		$per= round(($discount*100)/(int)($variant->mrp),2);				
		$variant->offer_price=$dis;
		$variant->discount=$discount;
		$variant->offer_per=$per; */
		
		$brand=getProductDetailsById($variant->product_id)->Brand->brand_name;
		$brand = preg_replace('/\s+/', '', $brand);
		//$variants_array=\App\VariantValues::select('attribute_id')->where('product_id',$id)->distinct('attribute_id')->get();
		//echo '<pre>';print_r($variants_array);
		$galleries=array();
		
			
			
			
			if(!empty($variant)){ 
			$variant->img="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/".$brand."/small/".getSliderMediaById($variant->featured_image);
			}else{
				$variant->img='';
			}
			
		
		}
		return $variant;
	
}
function createSlug($text){
    // replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, '-');

    // remove duplicated - symbols
    $text = preg_replace('~-+~', '-', $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
      return 'n-a';
    }

    return $text;
}

function FeatureValue($id)
{
	$values=\App\FeatureValue::where('feature_id',$id)->get();
	
	return $values;
}
function getUserRole($user_id)
{
	$roles=\App\UserRole::where('user_id',$user_id)->first();
	if(!empty($roles))
		$role_id=$roles->role_id;
	else
		$role_id=0;
	
	return $role_id;
}

function removeInlineStyleFromContent($content){
		
	$content=preg_replace('/style=\\"[^\\"]*\\"/', '', $content);
	return $content;
}

function allimages()
{
	$allimages = UploadImage::get();	
	return $allimages;
	
}
function getSliderMediaById($id){
	$allimages = UploadImage::where('id',$id)->first();	
	if(!empty($allimages))
	{
	   $img= $allimages->filename;

	}else{
		$img='';
	}
	return $img;
	
}
function getProductGalleryById($id){
	return $values=\App\ProductGallery::where('product_id',$id)->get();
	
}
function getValuesByAttributeId($id){
	return $values=\App\AttributeValue::where('attribute_id',$id)->get();
	
}
function getProductDetailsById($id){
	return \App\Products::with('Brand')->where('id',$id)->first();
	
}
function getVariantValuesByVariantId($id,$attr_id){
	return \App\VariantValues::select('value_id')->where('variant_id',$id)->where('attribute_id',$attr_id)->get()->toArray();
	
}

function getCateNameById($id){
	$cat=\App\Category::where('id',$id)->first();
	if(!empty($cat)){
	return $cat->name;
	}else{
		return '';
	}
	
}

function getCateByParentId($id){
	return $cat=\App\Category::where('parent_id',$id)->get();
	
	
}


function getCateByParentMenuId($id){
	 $menu=\App\menu::where('id',$id)->first();
	return $cat=\App\Category::where('parent_id',$menu->select_category)->get();
	
	
}
function searchForId($id, $array) { 
   foreach ($array as $key => $val) {
       if ($val['value_id'] === $id) {
           return true;
       }
   }
   return false;
}

function getBrandByParentId($id){
	return $cat=\App\Brand::where('category_id',$id)->get();
	
	
}

function getBrandByParentMenuId($id){
	 $menu=\App\menu::where('id',$id)->first();
	return $cat=\App\Brand::where('category_id',$menu->select_category)->get();
	
	
}
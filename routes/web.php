<?php



use Illuminate\Support\Facades\Route;



/*

|--------------------------------------------------------------------------

| Web Routes

|--------------------------------------------------------------------------

|

| Here is where you can register web routes for your application. These

| routes are loaded by the RouteServiceProvider within a group which

| contains the "web" middleware group. Now create something great!

|

*/



// test


Route::get('/', function () {

  return view('welcome');

});



//Route::get('/home', 'HomeController@index')->name('home');



Route::get('/clear-cache', function () {

  $exitCode = Artisan::call('config:cache');

  return 'DONE'; //Return anything

});



Route::get('/cleareverything', function () {

  $clearcache = Artisan::call('cache:clear');

  echo "Cache cleared<br>";



  $clearview = Artisan::call('view:clear');

  echo "View cleared<br>";



  $clearconfig = Artisan::call('config:cache');

  echo "Config cleared<br>";



  // $cleardebugbar = Artisan::call('debugbar:clear');

  // echo "Debug Bar cleared<br>";

});









Route::post('admin/getimagebyid', 'Admin\ImageController@getImageById');  

Route::post('admin/getcateimagebyid', 'Admin\ImageController@getCategoryImageById');   

Route::post('admin/getblogimagebyid', 'Admin\ImageController@getBlogImageById');   
Route::post('admin/getbrandimagebyid', 'Admin\ImageController@getBrandImageById');   

Route::post('admin/getbrandbannerimagebyid', 'Admin\ImageController@getBrandImageById');   
Route::post('admin/getmenubannerimagebyid', 'Admin\ImageController@getMenubannerImageByid');   

Route::post('admin/getbrandthumbnailimagebyid', 'Admin\ImageController@getBrandThumbnailImageById');   
Route::post('admin/getmenuthumbnailimagebyid', 'Admin\ImageController@getMenuThumbnailImageById');   

Route::post('admin/getbrandhomeimagebyid', 'Admin\ImageController@getBrandHomeImageById');   





Route::get('/admin/login', 'Admin\Auth\LoginController@showAdminLoginForm')->name('admin.login');	

Route::get('/admin', 'Admin\Auth\LoginController@showAdminLoginForm')->name('admin.login');	  

Route::get('/register/admin', 'Admin\Auth\RegisterController@showAdminRegisterForm');

Route::get('/register/writer', 'Admin\Auth\RegisterController@showWriterRegisterForm');      

Route::post('/admin/login', 'Admin\Auth\LoginController@adminLogin')->name('adminlogin');

Route::post('/login/customer', 'Admin\Auth\LoginController@writerLogin')->name('login');;

Route::post('/register/admin', 'Admin\Auth\RegisterController@createAdmin')->name('registerAdmin');

Route::post('/register/customer', 'Admin\Auth\RegisterController@createWriter');


Route::get('/forgot', 'Admin\Auth\ForgotController@index')->name('forgot') ;
Route::post('password-email', 'Admin\Auth\ForgotController@sendResetLinkEmail')->name('admin.password.email');

// Route::get('password-create', 'Admin\Auth\ForgotController@create')->name('admin.password.create');
// Route::post('password-save', 'Admin\Auth\ForgotController@store')->name('admin.password.save'); 


 

 

 

Route::group(['prefix'=>'admin','middleware'=>'auth:admin'],function(){ 

Route::get('/', 'Admin\AdminController@home') ;

Route::get('/home', 'Admin\AdminController@home')->name('admin.home') ;

 

 Route::any('/logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');
 
 Route::get('password-create', 'Admin\Auth\ForgotController@create')->name('admin.profile');
Route::post('password-save/{id}', 'Admin\Auth\ForgotController@store')->name('admin.password.save');

Route::get('/change_password-otp', 'Admin\Auth\ForgotController@sendOtp')->name('change_password.otp') ;

Route::post('/change_password-otp/verify', 'Admin\Auth\ForgotController@verifyOtp')->name('change_password.otp.verify') ;

Route::get('/users_data/{id}', 'Admin\UserController@usersDetail')->name('admin.usersDetail') ;

Route::get('/brand', 'Admin\BrandController@index')->name('admin.brand') ;

Route::get('/brandfashioncategories', 'Admin\BrandController@fashiontopbrand')->name('admin.brandfashioncategories') ;
Route::get('/brandfashionnoteworth', 'Admin\BrandController@fashionNoteWorth')->name('admin.brandfashionnoteworth') ;
Route::get('/brandfashionstopers', 'Admin\BrandController@fashionStopers')->name('admin.brandfashionstopers') ;
Route::get('/brandfashionrecommend', 'Admin\BrandController@fashionRecommend')->name('admin.brandfashionrecommend') ;
Route::get('/brandfashioncate-brands-of-day', 'Admin\BrandController@brandedit')->name('brandfashioncate.brand_ofday') ;




Route::get('/brandfashioncate-stoperingle', 'Admin\BrandController@brandedit')->name('brandfashioncate.stoperingle') ;


Route::get('/brandfashioncate-stoperinglee', 'Admin\BrandController@brandfashioncate_stoperinglee')->name('brandfashioncate.stoperinglee') ;

Route::post('/brandfashioncate-stoperingle/update/{id}', 'Admin\BrandController@stoperingleesaveFashionBrandOfDay')->name('brandfashioncate_stoperingle.update');
Route::get('/brandfashioncate-sponsor', 'Admin\BrandController@sponsorbrandedit')->name('brandfashioncate.sponsor') ;

Route::post('/brandfashioncate-sponsor/update/{id}','Admin\BrandController@saveFashionSponsor')->name('brandfashioncate_sponsor.update');
Route::get('/brandbeautycate-sponsor', 'Admin\BrandController@beautysponsorbrandedit')->name('brandbeautycate.sponsor') ;
Route::post('/brandbeautycate-sponsor/update/{id}', 'Admin\BrandController@saveBeautySponsor')->name('brandbeautycate_sponsor.update');
Route::get('/brandfoodcate-sponsor', 'Admin\BrandController@foodsponsorbrandedit')->name('brandfoodcate.sponsor') ;
Route::post('/brandfoodcate-sponsor/update/{id}', 'Admin\BrandController@saveFoodSponsor')->name('brandfoodcate_sponsor.update');

Route::get('/brandbeautycategories', 'Admin\BrandController@beautytopbrand')->name('admin.brandbeautycategories') ;
Route::get('/brandbeautynoteworth', 'Admin\BrandController@beautyNoteWorth')->name('admin.brandbeautynoteworth') ;
Route::get('/brandbeautystopers', 'Admin\BrandController@beautyStopers')->name('admin.brandbeautystopers') ;
Route::get('/brandbeautyrecommend', 'Admin\BrandController@beautyRecommend')->name('admin.brandbeautyrecommend') ;
//Route::get('/brandfashioncate-brands-of-day', 'Admin\BrandController@brandedit')->name('brandfashioncate.brand_ofday') ;
Route::get('/brandbeautycate-stoperingle', 'Admin\BrandController@beautybrandedit')->name('brandbeautycate.stoperingle') ;

Route::get('/brandbeautycate-stoperinglee', 'Admin\BrandController@beautybrandeditt')->name('brandbeautycate.stoperinglee') ;
Route::post('/brandbeautycate-stoperingle/update/{id}', 'Admin\BrandController@saveBeautyyBrandOfDay')->name('brandbeautycate_stoperingle.update');

Route::get('/brandfoodcategories', 'Admin\BrandController@foodtopbrand')->name('admin.brandfoodcategories') ;
Route::get('/brandfoodnoteworth', 'Admin\BrandController@foodNoteWorth')->name('admin.brandfoodnoteworth') ;
Route::get('/brandfoodstopers', 'Admin\BrandController@foodStopers')->name('admin.brandfoodstopers') ;
Route::get('/brandfoodrecommend', 'Admin\BrandController@foodRecommend')->name('admin.brandfoodrecommend') ;
//Route::get('/brandfoodcate-brands-of-day', 'Admin\BrandController@brandedit')->name('brandfashioncate.brand_ofday') ;
Route::get('/brandfoodcate-stoperingle', 'Admin\BrandController@brandfoodedit')->name('brandfoodcate.stoperingle') ;

Route::get('/brandfoodcate-stoperinglee', 'Admin\BrandController@brandfoodeditt')->name('brandfoodcate.stoperinglee') ;
Route::post('/brandfoodcate-stoperingle/update/{id}', 'Admin\BrandController@saveFoodBrandOfDay')->name('brandfoodcate_stoperingle.update');

Route::post('/brandfoodcatet-stoperingle/update/{id}', 'Admin\BrandController@singlesaveFoodBrandOfDay')->name('brandfoodcate_stoperinglee.update');

Route::get('/brand-create', 'Admin\BrandController@create')->name('brand.create') ;

Route::post('/brand-save', 'Admin\BrandController@store')->name('brand.store') ;
Route::post('/saveFashioncatTopBrand', 'Admin\BrandController@saveFashioncatTopBrand')->name('saveFashioncatTopBrand') ;
Route::post('/saveFashioncatTopBranddelete', 'Admin\BrandController@saveFashioncatTopBranddelete')->name('saveFashioncatTopBranddelete');

Route::post('/saveFashioncatNoteWorth', 'Admin\BrandController@saveFashioncatNoteWorth')->name('saveFashioncatNoteWorth') ;
Route::post('/saveFashioncatRecommend', 'Admin\BrandController@saveFashioncatRecommend')->name('saveFashioncatRecommend') ;
Route::post('/saveFashioncatRecommenddelete', 'Admin\BrandController@saveFashioncatRecommenddelete')->name('saveFashioncatRecommenddelete');
Route::post('/saveFashioncatStopers', 'Admin\BrandController@saveFashioncatStopers')->name('saveFashioncatStopers') ;
Route::post('/saveFashioncatStopersdelete', 'Admin\BrandController@saveFashioncatStopersdelete')->name('saveFashioncatStopersdelete');


Route::post('/saveBeautycatTopBrand', 'Admin\BrandController@saveBeautycatTopBrand')->name('saveBeautycatTopBrand') ;
Route::post('/saveBeautycatTopBranddelete', 'Admin\BrandController@saveBeautycatTopBranddelete')->name('saveBeautycatTopBranddelete');

Route::post('/saveBeautycatRecommendBrand', 'Admin\BrandController@saveBeautycatRecommendBrand')->name('saveBeautycatRecommendBrand') ;
Route::post('/saveBeautycatRecommendBranddelete', 'Admin\BrandController@saveBeautycatRecommendBranddelete')->name('saveBeautycatRecommendBranddelete');

Route::post('/saveBeautycatNoteBrand', 'Admin\BrandController@saveBeautycatNoteBrand')->name('saveBeautycatNoteBrand') ;
Route::post('/saveBeautycatNoteBranddelete', 'Admin\BrandController@saveBeautycatNoteBranddelete')->name('saveBeautycatNoteBranddelete');

Route::post('/saveBeautycatstoperBrand', 'Admin\BrandController@saveBeautycatstoperBrand')->name('saveBeautycatstoperBrand') ;
Route::post('/saveBeautycatstoperBranddelete', 'Admin\BrandController@saveBeautycatstoperBranddelete')->name('saveBeautycatstoperBranddelete');

Route::post('/saveBeautycatNoteWorth', 'Admin\BrandController@saveBeautycatNoteWorth')->name('saveBeautycatNoteWorth') ;
Route::post('/saveBeautycatRecommend', 'Admin\BrandController@saveBeautycatRecommend')->name('saveBeautycatRecommend') ;
Route::post('/saveBeautycatStopers', 'Admin\BrandController@saveBeautycatStopers')->name('saveBeautycatStopers') ;

Route::post('/saveFoodcatTopBrand', 'Admin\BrandController@saveFoodcatTopBrand')->name('saveFoodcatTopBrand') ;
Route::post('/saveFoodcatTopBranddelete', 'Admin\BrandController@saveFoodcatTopBranddelete')->name('saveFoodcatTopBranddelete');

Route::post('/saveFoodcatstoperBrand', 'Admin\BrandController@saveFoodcatstoperBrand')->name('saveFoodcatstoperBrand') ;
Route::post('/saveFoodcatstoperBranddelete', 'Admin\BrandController@saveFoodcatstoperBranddelete')->name('saveFoodcatstoperBranddelete');

Route::post('/saveFoodcatRecommeBrand', 'Admin\BrandController@saveFoodcatRecommeBrand')->name('saveFoodcatRecommeBrand') ;
Route::post('/saveFoodcatRecommeBranddelete', 'Admin\BrandController@saveFoodcatRecommeBranddelete')->name('saveFoodcatRecommeBranddelete');

Route::post('/saveFoodcatNoteWorth', 'Admin\BrandController@saveFoodcatNoteWorth')->name('saveFoodcatNoteWorth') ;
Route::post('/saveFoodcatNoteWorthdelete', 'Admin\BrandController@saveFoodcatNoteWorthdelete')->name('saveFoodcatNoteWorthdelete') ;

Route::post('/saveFoodcatRecommend', 'Admin\BrandController@saveFoodcatRecommend')->name('saveFoodcatRecommend') ;
Route::post('/saveFoodcatStopers', 'Admin\BrandController@saveFoodcatStopers')->name('saveFoodcatStopers') ;

Route::any('/brandList', 'Admin\BrandController@brandList')->name('brandList') ;
Route::any('/brandListCategory', 'Admin\BrandController@brandListCategory')->name('brandListCategory') ;
Route::any('/brandListnoteworthFashion', 'Admin\BrandController@brandListnoteworthFashion')->name('brandListnoteworthFashion') ;
Route::any('/brandListnoteworthFashionDelete', 'Admin\BrandController@brandListnoteworthFashionDelete')->name('brandListnoteworthFashionDelete') ;
Route::any('/brandListrecomendFashion', 'Admin\BrandController@brandListrecomendFashion')->name('brandListrecomendFashion') ;
Route::any('/brandListstopersFashion', 'Admin\BrandController@brandListstopersFashion')->name('brandListstopersFashion') ;

Route::any('/brandListCategoryBeauty', 'Admin\BrandController@brandListCategoryBeauty')->name('brandListCategoryBeauty') ;
Route::any('/brandListnoteworthBeauty', 'Admin\BrandController@brandListnoteworthBeauty')->name('brandListnoteworthBeauty') ;
Route::any('/brandListrecomendBeauty', 'Admin\BrandController@brandListrecomendBeauty')->name('brandListrecomendBeauty') ;
Route::any('/brandListstopersBeauty', 'Admin\BrandController@brandListstopersBeauty')->name('brandListstopersBeauty') ;


Route::any('/brandListCategoryFood', 'Admin\BrandController@brandListCategoryFood')->name('brandListCategoryFood') ;
Route::any('/brandListnoteworthFood', 'Admin\BrandController@brandListnoteworthFood')->name('brandListnoteworthFood') ;
Route::any('/brandListrecomendFood', 'Admin\BrandController@brandListrecomendFood')->name('brandListrecomendFood') ;
Route::any('/brandListstopersFood', 'Admin\BrandController@brandListstopersFood')->name('brandListstopersFood') ;

Route::any('/brand-delete/{id}', 'Admin\BrandController@destroy')->name('brand.delete') ;

Route::any('/brand-edit/{id}', 'Admin\BrandController@edit')->name('brand.edit') ;

Route::post('/brand-update/{id}', 'Admin\BrandController@update')->name('brand.update') ;

Route::any('/brand-additional/{id}', 'Admin\BrandController@additional')->name('brand.additional') ;

Route::post('/brand_additional-update/{id}', 'Admin\BrandController@additionalUpdate')->name('brand_additional.update') ; 

Route::post('/brand_additional-sponsored', 'Admin\BrandController@saveSponsoredBrand')->name('saveSponsoredBrand') ;

Route::post('/brand_additional-brand_head_turners', 'Admin\BrandController@brand_head_turners')->name('brand_head_turners') ;

Route::any('/brand-tag-list', 'Admin\BrandController@tagList')->name('brand.tag.list') ;
Route::any('/save-brand-tag', 'Admin\BrandController@saveCollectionTag')->name('save.brand.tag') ;


Route::get('/attributes', 'Admin\AttributesController@index')->name('admin.attributes') ;

Route::get('/attributes-create', 'Admin\AttributesController@create')->name('attributes.create') ;

Route::post('/attributes-save', 'Admin\AttributesController@store')->name('attributes.store') ;

Route::any('/attributeList', 'Admin\AttributesController@attributeList')->name('attributeList') ;

Route::any('/attributes-delete/{id}', 'Admin\AttributesController@destroy')->name('attributes.delete') ;

Route::any('/attributes-edit/{id}', 'Admin\AttributesController@edit')->name('attributes.edit') ;

Route::post('/attributes-update/{id}', 'Admin\AttributesController@update')->name('attributes.update') ;


Route::any('/product-tag-list', 'Admin\ProductController@tagList')->name('product.tag.list') ;

Route::any('/save-product-tag', 'Admin\ProductController@saveCollectionTag')->name('save.product.tag') ;


Route::get('/registerReport', 'Admin\ReportController@registerReport')->name('admin.registerReport') ;

Route::get('/notregisterReport', 'Admin\ReportController@notregisterReport')->name('admin.notregisterReport') ;



Route::get('/leads', 'Admin\AdminController@leads')->name('admin.leads') ;





Route::get('/seller', 'Admin\SellerController@index')->name('admin.seller') ;

Route::get('/seller-create', 'Admin\SellerController@create')->name('seller.create') ;

Route::post('/seller-save', 'Admin\SellerController@store')->name('seller.store') ;

Route::get('/seller-edit/{id}', 'Admin\SellerController@edit')->name('seller.edit') ;

Route::post('/seller-update/{id}', 'Admin\SellerController@update')->name('seller.update') ;

Route::any('/seller-delete/{id}', 'Admin\SellerController@delete')->name('seller.delete') ;







Route::get('/category', 'Admin\CategoryController@index')->name('admin.category') ;



Route::post('/addcategory', 'Admin\CategoryController@categorycreate')->name('admin.categorycreate') ;

Route::post('/addsubcategory', 'Admin\CategoryController@subcategorycreate')->name('admin.subcategorycreate') ;

Route::get('/edit-category/{id}', 'Admin\CategoryController@edit')->name('category.edit') ;



Route::post('/update-category/{id}', 'Admin\CategoryController@catupdate')->name('category.update') ;



Route::any('/delete-category/{id}', 'Admin\CategoryController@catdelete')->name('category.delete') ;

Route::any('/topSellCategory', 'Admin\CategoryController@topSellCategory')->name('topSellCategory') ;

Route::any('/hometop_sell_table', 'Admin\CategoryController@hometop_sell_table')->name('hometop_sell_table') ;

Route::any('/fashiontop_sell_table', 'Admin\CategoryController@fashiontop_sell_table')->name('fashiontop_sell_table') ;

Route::any('/foodtopSellCategory', 'Admin\CategoryController@foodtopSellCategory')->name('foodtopSellCategory') ;

Route::any('/food_sell_top_sell_table', 'Admin\CategoryController@food_sell_top_sell_table')->name('food_sell_top_sell_table') ;

Route::any('/homeBestDealCategory', 'Admin\CategoryController@homeBestDealCategory')->name('homeBestDealCategory') ;

Route::any('/beautytop_sell_table', 'Admin\CategoryController@beautytop_sell_table')->name('beautytop_sell_table') ;

Route::any('/beautybesttop_sell_table', 'Admin\CategoryController@beautybesttop_sell_table')->name('beautybesttop_sell_table') ;

Route::get('/product/export/guide', 'Admin\ProductController@exportguide')->name('product.export.guide') ;

Route::get('/product/export', 'Admin\ProductController@export')->name('product.export') ;

Route::get('/product/import', 'Admin\ProductController@import')->name('product.import') ;
Route::post('/product-import-save', 'Admin\ProductController@importProducts')->name('product.import.save') ;

Route::get('/product', 'Admin\ProductController@index')->name('admin.product') ;

Route::any('/productList', 'Admin\ProductController@productList')->name('dataList') ;

Route::any('/turnerProducts', 'Admin\ProductController@turnerProducts')->name('turnerProducts') ;

Route::any('/food_turner_table', 'Admin\ProductController@food_turner_table')->name('food_turner_table') ;

Route::any('/food_Recommendsturner_table', 'Admin\ProductController@food_Recommendsturner_table')->name('food_Recommendsturner_table') ;

Route::any('/beautyturner_table', 'Admin\ProductController@beautyturner_table')->name('beautyturner_table') ;

Route::any('/fashionRecommends_table', 'Admin\ProductController@fashionRecommends_table')->name('fashionRecommends_table') ;

Route::any('/foodRecommends_table', 'Admin\ProductController@foodRecommends_table')->name('foodRecommends_table') ;

Route::any('/beautyRecommends_table', 'Admin\ProductController@beautyRecommends_table')->name('beautyRecommends_table') ;

Route::any('/sponsorProducts', 'Admin\ProductController@sponsorProducts')->name('sponsorProducts') ;

Route::any('/fashionsponsorProducts', 'Admin\ProductController@fashionsponsorProducts')->name('fashionsponsorProducts') ;

Route::any('/beautysponsorProducts', 'Admin\ProductController@beautysponsorProducts')->name('beautysponsorProducts') ;

Route::any('/homeproductProducts', 'Admin\ProductController@homeproductProducts')->name('homeproductProducts');

Route::any('/totrecommendProducts', 'Admin\ProductController@totrecommendProducts')->name('totrecommendProducts');

Route::any('/bestdealproducts', 'Admin\ProductController@bestdealProducts')->name('bestdealproducts');

Route::any('/fashionproductProducts', 'Admin\ProductController@fashionproductProducts')->name('fashionproductProducts');

Route::any('/foodsliderproduct', 'Admin\ProductController@foodsliderproduct')->name('foodsliderproduct');

Route::any('/beautyproductProducts', 'Admin\ProductController@beautyproductProducts')->name('beautyproductProducts');

Route::any('/fashionbestiesProducts', 'Admin\ProductController@fashionbestiesProducts')->name('fashionbestiesProducts');

Route::any('/fashionduesProducts', 'Admin\ProductController@fashionduesProducts')->name('fashionduesProducts');

Route::any('/fashionKidsProducts', 'Admin\ProductController@fashionKidsProducts')->name('fashionKidsProducts');

Route::any('/fashionMissesProducts', 'Admin\ProductController@fashionMissesProducts')->name('fashionMissesProducts');

Route::any('/fashionTrendingProducts', 'Admin\ProductController@fashionTrendingProducts')->name('fashionTrendingProducts');

Route::any('/brandOfTheDay', 'Admin\BrandController@brandOfTheDay')->name('brandOfTheDay') ;

Route::any('/brandSquare', 'Admin\BrandController@brandSquare')->name('brandSquare') ;

Route::get('/product-create/{step}', 'Admin\ProductController@create')->name('product.create') ;

Route::post('/product-create/{step}', 'Admin\ProductController@store') ; 

Route::get('/product-edit/{id}', 'Admin\ProductController@edit')->name('product.edit') ;
Route::get('/product-status/{id}', 'Admin\ProductController@status')->name('product.status') ;

Route::post('/product-update/{id}', 'Admin\ProductController@update')->name('product.update') ;

Route::get('/product-inventory-edit/{id}', 'Admin\ProductController@pricing');

Route::post('/product-pricing/{id}', 'Admin\ProductController@pricingUpdate')->name('update.pricing') ;
Route::post('/additional-save/{id}', 'Admin\ProductController@additionalSave')->name('additional.save') ;
Route::get('/product-additional/{id}', 'Admin\ProductController@productAdditional');
Route::get('/product-related/{id}', 'Admin\ProductController@productRelated');
Route::get('/product-packaging/{id}', 'Admin\ProductController@productpackaging');
Route::post('/packaging-save/{id}', 'Admin\ProductController@packagingSave')->name('packaging.save');

Route::get('/product-view/{id}', 'Admin\ProductController@view')->name('product.view') ;

Route::get('/product-delete/{id}', 'Admin\ProductController@destroy')->name('product.delete') ;

Route::get('/product-changeStatus/{id}/{status}', 'Admin\ProductController@changeStatus')->name('product.changeStatus') ;

Route::post('/product/getbrandbyseller', 'Admin\ProductController@getBrandBySeller') ;

Route::post('/product/getsubcatebycategory', 'Admin\ProductController@getSubCateByCategory') ;

Route::post('/product/getproductbyparentcategory', 'Admin\ProductController@getProductByParentCategory') ;

Route::get('/variation/{product_id}', 'Admin\ProductController@allVariations') ;

Route::get('/variant-create/{product_id}', 'Admin\ProductController@variantCreate')->name('variant.create') ;

Route::post('/variant-store', 'Admin\ProductController@variantStore')->name('variant.store') ;
Route::post('/removevariant', 'Admin\ProductController@removeVariant');

Route::post('/getFeaturesValueById', 'Admin\ProductController@getFeaturesValueById') ;
Route::get('/variation-values/{var_id}', 'Admin\ProductController@allVariationValues') ;

Route::get('/variant-value-create/{var_id}', 'Admin\ProductController@variantValueCreate')->name('variantvalue.create');

Route::post('/variantvalue-store', 'Admin\ProductController@variantValueStore')->name('variantvalue.store') ;



Route::any('/savecheckbox', 'Admin\ProductController@savecheckbox')->name('savecheckbox') ;

Route::any('/saveHomeProducts', 'Admin\ProductController@saveHomeProducts')->name('saveHomeProducts');

Route::any('/saveHomeTorner', 'Admin\ProductController@saveHomeTorner')->name('saveHomeTorner');

Route::any('/savebrandGallery', 'Admin\BrandController@savebrandGallery')->name('savebrandGallery');
Route::any('/savecollectionGallery', 'Admin\CollectionsController@savecollectionGallery')->name('savecollectionGallery');

Route::any('/saveproductGallery', 'Admin\ProductController@saveproductGallery')->name('saveproductGallery');
Route::post('/placeproductGallery', 'Admin\ProductController@placeOrderProductGallery')->name('gallery.placeorder');

Route::any('/saveHomeTotRecommend', 'Admin\ProductController@saveHomeTotRecommend')->name('saveHomeTotRecommend');

Route::any('/savebestdealproducts', 'Admin\ProductController@savebestdealProducts')->name('savebestdealproducts');

Route::any('/saveFashionProducts', 'Admin\ProductController@saveFashionProducts')->name('saveFashionProducts');

Route::any('/saveFoodslider', 'Admin\ProductController@saveFoodslider')->name('saveFoodslider');

Route::any('/saveBeautyProducts', 'Admin\ProductController@saveBeautyProducts')->name('saveBeautyProducts');

Route::any('/saveFashionBestiesProducts', 'Admin\ProductController@saveFashionBestiesProducts')->name('saveFashionBestiesProducts');

Route::any('/saveFashionTrendingProducts', 'Admin\ProductController@saveFashionTrendingProducts')->name('saveFashionTrendingProducts');

Route::any('/saveFashionDuesProducts', 'Admin\ProductController@saveFashionDuesProducts')->name('saveFashionDuesProducts');

Route::any('/saveFashionMissesProducts', 'Admin\ProductController@saveFashionMissesProducts')->name('saveFashionMissesProducts');

Route::any('/saveFashionKidsProducts', 'Admin\ProductController@saveFashionKidsProducts')->name('saveFashionKidsProducts');

Route::any('/savebrandofday', 'Admin\HomePageController@saveBrandOfDay')->name('savebrandofday');

Route::any('/savebrandSquare', 'Admin\HomePageController@savebrandSquare')->name('savebrandSquare');



Route::any('/saveFashion_category', 'Admin\ProductController@saveFashioncategory')->name('saveFashion_category');


Route::post('/deletebrandofday', 'Admin\HomePageController@deleteBrandOfDay')->name('deletebrandofday');

Route::post('/deletebrandSquare', 'Admin\HomePageController@deletebrandSquare')->name('deletebrandSquare');

Route::post('/deletefashion-product', 'Admin\ProductController@deletefashionProduct')->name('deletefashion.product');

Route::post('/deletefood-slider', 'Admin\ProductController@deletefoodslider')->name('deletefood.slider');

Route::post('/deletebeauty-turners', 'Admin\ProductController@deletebeautyturners')->name('deletebeautyturners');

Route::post('/deletebeautyRecommends', 'Admin\ProductController@deletebeautyRecommends')->name('deletebeautyRecommends');

Route::post('/deletebeautyTOTRecommends', 'Admin\ProductController@deletebeautyTOTRecommends')->name('deletebeautyTOTRecommends');

Route::post('/deletebeautyBesties', 'Admin\ProductController@deletebeautyBesties')->name('deletebeautyBesties');

Route::post('/deletebeautyTrending', 'Admin\ProductController@deletebeautyTrending')->name('deletebeautyTrending');

Route::post('/deletebeautyDues', 'Admin\ProductController@deletebeautyDues')->name('deletebeautyDues');

Route::post('/deletebeautyMisses', 'Admin\ProductController@deletebeautyMisses')->name('deletebeautyMisses');

Route::post('/deletebeautyKids', 'Admin\ProductController@deletebeautyKids')->name('deletebeautyKids');

Route::post('/deletefoodTurners', 'Admin\ProductController@deletefoodTurners')->name('deletefoodTurners');

Route::post('/deletefoodRecommends', 'Admin\ProductController@deletefoodRecommends')->name('deletefoodRecommends');

Route::post('/deletefoodsellcate', 'Admin\ProductController@deletefoodsellcate')->name('deletefoodsellcate');

Route::post('/deletefoodbestdeal', 'Admin\ProductController@deletefoodbestdeal')->name('deletefoodbestdeal');

Route::post('/deletefoodTotRecommends', 'Admin\ProductController@deletefoodTotRecommends')->name('deletefoodTotRecommends');

Route::post('/deletefoodBesties', 'Admin\ProductController@deletefoodBesties')->name('deletefoodBesties');

Route::post('/deletefoodTrending', 'Admin\ProductController@deletefoodTrending')->name('deletefoodTrending');

Route::post('/deletefoodDues', 'Admin\ProductController@deletefoodDues')->name('deletefoodDues');

Route::post('/deletefoodMisses', 'Admin\ProductController@deletefoodMisses')->name('deletefoodMisses');

Route::post('/deletefoodKids', 'Admin\ProductController@deletefoodKids')->name('deletefoodKids');

Route::post('/deletehomesingle', 'Admin\ProductController@deletehomesingle')->name('deletehomesingle');

Route::post('/deletehomeTurners', 'Admin\ProductController@deletehomeTurners')->name('deletehomeTurners');

Route::post('/deletehomeSponsor', 'Admin\ProductController@deletehomeSponsor')->name('deletehomeSponsor');

Route::post('/deletehometopsell', 'Admin\ProductController@deletehometopsell')->name('deletehometopsell');

Route::post('/deletehomeDeal', 'Admin\ProductController@deletehomeDeal')->name('deletehomeDeal');

Route::post('/deletehomeRecommends', 'Admin\ProductController@deletehomeRecommends')->name('deletehomeRecommends');

Route::post('/deletebeautytopsell', 'Admin\ProductController@deletebeautytopsell')->name('deletebeautytopsell');

Route::post('/deletebeautytopsellcategory', 'Admin\ProductController@deletebeautytopsellcategory')->name('deletebeautytopsellcategory');

Route::post('/deletebeauty-single', 'Admin\ProductController@deletebeautysingle')->name('deletebeauty.single');
Route::post('/deletebeauty-brandofady', 'Admin\ProductController@deletebeautybrandofady')->name('deletebeauty.brandofady');

Route::post('/deletefashion-trending', 'Admin\ProductController@deletefashionTrending')->name('deletefashion.trending');

Route::post('/deletefashion-category', 'Admin\ProductController@deletefashionCategory')->name('deletefashion.category');


Route::post('/deletefashion-recommends', 'Admin\ProductController@deletefashionRecommends')->name('deletefashion.recommends');


Route::post('/deletefashion-besties', 'Admin\ProductController@deletefashionBesties')->name('deletefashion.besties');


Route::post('/deletefashion-dues', 'Admin\ProductController@deletefashionDues')->name('deletefashion.dues');

Route::post('/deletefashion-misses', 'Admin\ProductController@deletefashionMisses')->name('deletefashion.misses');

Route::post('/deletefashion-kids', 'Admin\ProductController@deletefashionKids')->name('deletefashion.kids');

Route::post('/deletefashion-sponsor', 'Admin\ProductController@deletefashionSponsor')->name('deletefashion.sponsor');



Route::any('/savehomebestdealcategory', 'Admin\CategoryController@saveHomeBestDealCategory')->name('savehomebestdealcategory');

Route::any('/savehometopCategory', 'Admin\CategoryController@saveHomeTopCategory')->name('savehometopCategory');




Route::get('/orders', 'Admin\OrderController@index')->name('admin.order') ;

Route::get('/order-create', 'Admin\OrderController@create')->name('order.create') ;

Route::post('/order-create', 'Admin\OrderController@create')->name('order.save') ;

Route::get('/order-edit/{order_id}', 'Admin\OrderController@update')->name('order.edit') ;

Route::post('/order-edit/{order_id}', 'Admin\OrderController@update')->name('order.update') ;

Route::get('/order-delete/{order_id}', 'Admin\OrderController@destroy')->name('order.delete') ;

Route::get('/order-view/{order_id}', 'Admin\OrderController@view')->name('order.view') ;
Route::post('/order-changestatus', 'Admin\OrderController@changeOrderStatus')->name('orderstatus.change') ;
Route::post('/orderitem-changestatus/{item_id}', 'Admin\OrderController@changeOrderItemStatus')->name('orderitemstatus.change') ;
Route::post('/orderitem-trackshipment', 'Admin\OrderController@trackShipment');


Route::get('/orders-return', 'Admin\OrderController@returnOrder')->name('admin.return.order') ;

Route::get('/order-refund/{order_id}', 'Admin\OrderController@refund')->name('order.refund') ;

Route::post('/refund/{order_id}', 'Admin\OrderController@refund_success')->name('order.refund.success') ;


Route::get('/refund-otp', 'Admin\OrderController@sendOtp')->name('refund.otp') ;

Route::post('/refund-otp/verify', 'Admin\OrderController@verifyOtp')->name('refund.otp.verify') ;

Route::get('/sub-users', 'Admin\SubUserController@index')->name('admin.sub.users') ;

Route::get('/sub-user-create', 'Admin\SubUserController@create')->name('sub.user.create') ;

Route::post('/sub-user-create', 'Admin\SubUserController@create')->name('sub.user.save') ;

Route::get('/sub-user-edit/{user_id}', 'Admin\SubUserController@update')->name('sub.user.edit') ;

Route::post('/sub-user-edit/{user_id}', 'Admin\SubUserController@update')->name('sub.user.update') ;

Route::get('/sub-user-delete/{user_id}', 'Admin\SubUserController@destroy')->name('sub.user.delete') ;

Route::get('/sub-user-detail/{user_id}', 'Admin\SubUserController@userDetail')->name('sub.user.detail') ;

Route::get('/sub-address-create/{user_id}', 'Admin\SubUserController@addressCreate')->name('sub.address.create') ;

Route::post('/sub-address-save', 'Admin\SubUserController@addressSave')->name('sub.address.save') ;

Route::get('/sub-address-edit/{id}', 'Admin\SubUserController@addressEdit')->name('sub.address.edit') ;

Route::post('/sub-address-update/{id}', 'Admin\SubUserController@addressUpdate')->name('sub.address.update') ;

Route::get('/users', 'Admin\UserController@index')->name('admin.users') ;

Route::get('/user-create', 'Admin\UserController@create')->name('user.create') ;

Route::post('/user-create', 'Admin\UserController@create')->name('user.save') ;

Route::get('/user-edit/{user_id}', 'Admin\UserController@update')->name('user.edit') ;

Route::post('/user-edit/{user_id}', 'Admin\UserController@update')->name('user.update') ;

Route::get('/user-delete/{user_id}', 'Admin\UserController@destroy')->name('user.delete') ;

Route::get('/user-detail/{user_id}', 'Admin\UserController@userDetail')->name('user.detail') ;

Route::get('/address-create/{user_id}', 'Admin\UserController@addressCreate')->name('address.create') ;

Route::post('/address-save', 'Admin\UserController@addressSave')->name('address.save') ;

Route::get('/address-edit/{id}', 'Admin\UserController@addressEdit')->name('address.edit') ;

Route::post('/address-update/{id}', 'Admin\UserController@addressUpdate')->name('address.update') ;

Route::post('/get-featurevalues', 'Admin\CategoryController@getfeaturevalues')->name('get-featurevalues');





Route::get('/taxes', 'Admin\TaxController@index')->name('admin.tax') ;

Route::get('/taxes-create', 'Admin\TaxController@create')->name('tax.create') ;

Route::post('/taxes-save', 'Admin\TaxController@store')->name('tax.store') ;

Route::any('/taxes-delete/{id}', 'Admin\TaxController@destroy')->name('tax.delete') ;

Route::any('/taxes-edit/{id}', 'Admin\TaxController@edit')->name('tax.edit') ;

Route::post('/taxes-update/{id}', 'Admin\TaxController@update')->name('tax.update') ;



Route::get('/shipping', 'Admin\ShippingController@index')->name('admin.shipping') ;

Route::get('/shipping-create', 'Admin\ShippingController@create')->name('shipping.create') ;

Route::post('/shipping-save', 'Admin\ShippingController@store')->name('shipping.store') ;

Route::get('/shipping-edit/{id}', 'Admin\ShippingController@edit')->name('shipping.edit') ;

Route::post('/shipping-update/{id}', 'Admin\ShippingController@update')->name('shipping.update') ;

Route::any('/shipping-delete/{id}', 'Admin\ShippingController@delete')->name('shipping.delete') ;



Route::get('/features', 'Admin\FeaturesController@index')->name('admin.features') ;

Route::get('/features-create', 'Admin\FeaturesController@create')->name('features.create') ;

Route::post('/features-save', 'Admin\FeaturesController@store')->name('features.store') ;

Route::get('/features-edit/{id}', 'Admin\FeaturesController@edit')->name('features.edit') ;

Route::post('/features-update/{id}', 'Admin\FeaturesController@update')->name('features.update') ;

Route::any('/features-delete/{id}', 'Admin\FeaturesController@destroy')->name('features.delete') ;

Route::any('/list-product-size', 'Admin\ProductController@getsizeList')->name('list.product.size') ;

Route::get('/size-master', 'Admin\SizeMasterController@index')->name('admin.size_master') ;

Route::get('/size-master-create', 'Admin\SizeMasterController@create')->name('size_master.create') ;

Route::post('/size-master-save', 'Admin\SizeMasterController@store')->name('size_master.store') ;

Route::get('/size-master-edit/{id}', 'Admin\SizeMasterController@edit')->name('size_master.edit') ;

Route::post('/size-master-update/{id}', 'Admin\SizeMasterController@update')->name('size_master.update') ;

Route::any('/size-master-delete/{id}', 'Admin\SizeMasterController@destroy')->name('size_master.delete') ;

Route::get('/tags', 'Admin\TagsController@index')->name('admin.tags') ;

Route::get('/tags-create', 'Admin\TagsController@create')->name('tags.create') ;

Route::post('/tags-save', 'Admin\TagsController@store')->name('tags.store') ;



Route::get('/transaction', 'Admin\TransactionController@index')->name('admin.transaction') ;



Route::get('/faq', 'Admin\FaqController@index')->name('admin.faq') ;

Route::get('/faq-create', 'Admin\FaqController@create')->name('faq.create') ;

Route::post('/faq-save', 'Admin\FaqController@store')->name('faq.store') ;

Route::any('/faq-delete/{id}', 'Admin\FaqController@delete')->name('faq.delete') ;

Route::get('/faq-edit/{id}', 'Admin\FaqController@edit')->name('faq.edit') ;

Route::post('/faq-update/{id}', 'Admin\FaqController@update')->name('faq.update') ;

Route::get('/help-center', 'Admin\HelpCenterController@index')->name('admin.help_center') ;

Route::get('/help-center-create', 'Admin\HelpCenterController@create')->name('help_center.create') ;

Route::post('/help-center-save', 'Admin\HelpCenterController@store')->name('help_center.store') ;

Route::any('/help-center-delete/{id}', 'Admin\HelpCenterController@delete')->name('help_center.delete') ;

Route::get('/help-center-edit/{id}', 'Admin\HelpCenterController@edit')->name('help_center.edit') ;

Route::post('/help-center-update/{id}', 'Admin\HelpCenterController@update')->name('help_center.update') ;



Route::get('/discount', 'Admin\DiscountController@index')->name('admin.discount') ;

Route::get('/discount-create', 'Admin\DiscountController@create')->name('discount.create') ;

Route::post('/discount-save', 'Admin\DiscountController@store')->name('discount.store') ;

Route::any('/discount-delete/{id}', 'Admin\DiscountController@delete')->name('discount.delete') ;

Route::get('/discount-edit/{id}', 'Admin\DiscountController@edit')->name('discount.edit') ;

Route::post('/discount-update/{id}', 'Admin\DiscountController@update')->name('discount.update') ;

Route::get('/material-care', 'Admin\MaterialCareController@index')->name('admin.material_care') ;
Route::get('/material-care-create', 'Admin\MaterialCareController@create')->name('material_care.create') ;
Route::post('/material-care-save', 'Admin\MaterialCareController@store')->name('material_care.save') ;
Route::get('/material-care-edit/{id}', 'Admin\MaterialCareController@edit')->name('material_care.edit') ;
Route::post('/material-care-update/{id}', 'Admin\MaterialCareController@update')->name('material_care.update') ;
Route::any('/material-care-delete/{id}', 'Admin\MaterialCareController@destroy')->name('material_care.delete') ;


Route::get('/size-fit', 'Admin\SizeFitController@index')->name('admin.size_fit') ;
Route::get('/size-fit-create', 'Admin\SizeFitController@create')->name('size_fit.create') ;
Route::post('/size-fit-save', 'Admin\SizeFitController@store')->name('size_fit.save') ;
Route::get('/size-fit-edit/{id}', 'Admin\SizeFitController@edit')->name('size_fit.edit') ;
Route::post('/size-fit-update/{id}', 'Admin\SizeFitController@update')->name('size_fit.update') ;
Route::any('/size-fit-delete/{id}', 'Admin\SizeFitController@destroy')->name('size_fit.delete') ;

Route::get('/cuisine', 'Admin\CuisineController@index')->name('admin.cuisine') ;
Route::get('/cuisine-create', 'Admin\CuisineController@create')->name('cuisine.create') ;
Route::post('/cuisine-save', 'Admin\CuisineController@store')->name('cuisine.save') ;
Route::get('/cuisine-edit/{id}', 'Admin\CuisineController@edit')->name('cuisine.edit') ;
Route::post('/cuisine-update/{id}', 'Admin\CuisineController@update')->name('cuisine.update') ;
Route::any('/cuisine-delete/{id}', 'Admin\CuisineController@destroy')->name('cuisine.delete') ;

Route::get('/material', 'Admin\MaterialController@index')->name('admin.material') ;
Route::get('/material-create', 'Admin\MaterialController@create')->name('material.create') ;
Route::post('/material-save', 'Admin\MaterialController@store')->name('material.save') ;
Route::get('/material-edit/{id}', 'Admin\MaterialController@edit')->name('material.edit') ;
Route::post('/material-update/{id}', 'Admin\MaterialController@update')->name('material.update') ;
Route::any('/material-delete/{id}', 'Admin\MaterialController@destroy')->name('material.delete') ;

Route::get('/item_form', 'Admin\ItemFormController@index')->name('admin.item_form') ;
Route::get('/item_form-create', 'Admin\ItemFormController@create')->name('item_form.create') ;
Route::post('/item_form-save', 'Admin\ItemFormController@store')->name('item_form.save') ;
Route::get('/item_form-edit/{id}', 'Admin\ItemFormController@edit')->name('item_form.edit') ;
Route::post('/item_form-update/{id}', 'Admin\ItemFormController@update')->name('item_form.update') ;
Route::any('/item_form-delete/{id}', 'Admin\ItemFormController@destroy')->name('item_form.delete') ;

Route::get('/flavour', 'Admin\FlavourController@index')->name('admin.flavour') ;
Route::get('/flavour-create', 'Admin\FlavourController@create')->name('flavour.create') ;
Route::post('/flavour-save', 'Admin\FlavourController@store')->name('flavour.save') ;
Route::get('/flavour-edit/{id}', 'Admin\FlavourController@edit')->name('flavour.edit') ;
Route::post('/flavour-update/{id}', 'Admin\FlavourController@update')->name('flavour.update') ;
Route::any('/flavour-delete/{id}', 'Admin\FlavourController@destroy')->name('flavour.delete') ;

Route::get('/skin_type', 'Admin\SkinTypeController@index')->name('admin.skin_type') ;
Route::get('/skin_type-create', 'Admin\SkinTypeController@create')->name('skin_type.create') ;
Route::post('/skin_type-save', 'Admin\SkinTypeController@store')->name('skin_type.save') ;
Route::get('/skin_type-edit/{id}', 'Admin\SkinTypeController@edit')->name('skin_type.edit') ;
Route::post('/skin_type-update/{id}', 'Admin\SkinTypeController@update')->name('skin_type.update') ;
Route::any('/skin_type-delete/{id}', 'Admin\SkinTypeController@destroy')->name('skin_type.delete') ;

Route::get('/sleeve', 'Admin\SleeveController@index')->name('admin.sleeve') ;
Route::get('/sleeve-create', 'Admin\SleeveController@create')->name('sleeve.create') ;
Route::post('/sleeve-save', 'Admin\SleeveController@store')->name('sleeve.save') ;
Route::get('/sleeve-edit/{id}', 'Admin\SleeveController@edit')->name('sleeve.edit') ;
Route::post('/sleeve-update/{id}', 'Admin\SleeveController@update')->name('sleeve.update') ;
Route::any('/sleeve-delete/{id}', 'Admin\SleeveController@destroy')->name('sleeve.delete') ;

Route::get('/sole_material', 'Admin\SoleMaterialController@index')->name('admin.sole_material') ;
Route::get('/sole_material-create', 'Admin\SoleMaterialController@create')->name('sole_material.create') ;
Route::post('/sole_material-save', 'Admin\SoleMaterialController@store')->name('sole_material.save') ;
Route::get('/sole_material-edit/{id}', 'Admin\SoleMaterialController@edit')->name('sole_material.edit') ;
Route::post('/sole_material-update/{id}', 'Admin\SoleMaterialController@update')->name('sole_material.update') ;
Route::any('/sole_material-delete/{id}', 'Admin\SoleMaterialController@destroy')->name('sole_material.delete') ;

Route::get('/product_type', 'Admin\ProductTypeController@index')->name('admin.product_type') ;
Route::get('/product_type-create', 'Admin\ProductTypeController@create')->name('product_type.create') ;
Route::post('/product_type-save', 'Admin\ProductTypeController@store')->name('product_type.save') ;
Route::get('/product_type-edit/{id}', 'Admin\ProductTypeController@edit')->name('product_type.edit') ;
Route::post('/product_type-update/{id}', 'Admin\ProductTypeController@update')->name('product_type.update') ;
Route::any('/product_type-delete/{id}', 'Admin\ProductTypeController@destroy')->name('product_type.delete') ;

Route::get('/rise', 'Admin\RiseController@index')->name('admin.rise') ;
Route::get('/rise-create', 'Admin\RiseController@create')->name('rise.create') ;
Route::post('/rise-save', 'Admin\RiseController@store')->name('rise.save') ;
Route::get('/rise-edit/{id}', 'Admin\RiseController@edit')->name('rise.edit') ;
Route::post('/rise-update/{id}', 'Admin\RiseController@update')->name('rise.update') ;
Route::any('/rise-delete/{id}', 'Admin\RiseController@destroy')->name('rise.delete') ;

Route::get('/pattern', 'Admin\PatternController@index')->name('admin.pattern') ;
Route::get('/pattern-create', 'Admin\PatternController@create')->name('pattern.create') ;
Route::post('/pattern-save', 'Admin\PatternController@store')->name('pattern.save') ;
Route::get('/pattern-edit/{id}', 'Admin\PatternController@edit')->name('pattern.edit') ;
Route::post('/pattern-update/{id}', 'Admin\PatternController@update')->name('pattern.update') ;
Route::any('/pattern-delete/{id}', 'Admin\PatternController@destroy')->name('pattern.delete') ;

Route::get('/neck', 'Admin\NeckController@index')->name('admin.neck') ;
Route::get('/neck-create', 'Admin\NeckController@create')->name('neck.create') ;
Route::post('/neck-save', 'Admin\NeckController@store')->name('neck.save') ;
Route::get('/neck-edit/{id}', 'Admin\NeckController@edit')->name('neck.edit') ;
Route::post('/neck-update/{id}', 'Admin\NeckController@update')->name('neck.update') ;
Route::any('/neck-delete/{id}', 'Admin\NeckController@destroy')->name('neck.delete') ;

Route::get('/length', 'Admin\LengthController@index')->name('admin.length') ;
Route::get('/length-create', 'Admin\LengthController@create')->name('length.create') ;
Route::post('/length-save', 'Admin\LengthController@store')->name('length.save') ;
Route::get('/length-edit/{id}', 'Admin\LengthController@edit')->name('length.edit') ;
Route::post('/length-update/{id}', 'Admin\LengthController@update')->name('length.update') ;
Route::any('/length-delete/{id}', 'Admin\LengthController@destroy')->name('length.delete') ;

Route::get('/hair_type', 'Admin\HairTypeController@index')->name('admin.hair_type') ;
Route::get('/hair_type-create', 'Admin\HairTypeController@create')->name('hair_type.create') ;
Route::post('/hair_type-save', 'Admin\HairTypeController@store')->name('hair_type.save') ;
Route::get('/hair_type-edit/{id}', 'Admin\HairTypeController@edit')->name('hair_type.edit') ;
Route::post('/hair_type-update/{id}', 'Admin\HairTypeController@update')->name('hair_type.update') ;
Route::any('/hair_type-delete/{id}', 'Admin\HairTypeController@destroy')->name('hair_type.delete') ;

Route::get('/fit', 'Admin\FitController@index')->name('admin.fit') ;
Route::get('/fit-create', 'Admin\FitController@create')->name('fit.create') ;
Route::post('/fit-save', 'Admin\FitController@store')->name('fit.save') ;
Route::get('/fit-edit/{id}', 'Admin\FitController@edit')->name('fit.edit') ;
Route::post('/fit-update/{id}', 'Admin\FitController@update')->name('fit.update') ;
Route::any('/fit-delete/{id}', 'Admin\FitController@destroy')->name('fit.delete') ;

Route::get('/scent', 'Admin\ScentController@index')->name('admin.scent') ;
Route::get('/scent-create', 'Admin\ScentController@create')->name('scent.create') ;
Route::post('/scent-save', 'Admin\ScentController@store')->name('scent.save') ;
Route::get('/scent-edit/{id}', 'Admin\ScentController@edit')->name('scent.edit') ;
Route::post('/scent-update/{id}', 'Admin\ScentController@update')->name('scent.update') ;
Route::any('/scent-delete/{id}', 'Admin\ScentController@destroy')->name('scent.delete') ;

Route::get('/fabric', 'Admin\FabricController@index')->name('admin.fabric') ;
Route::get('/fabric-create', 'Admin\FabricController@create')->name('fabric.create') ;
Route::post('/fabric-save', 'Admin\FabricController@store')->name('fabric.save') ;
Route::get('/fabric-edit/{id}', 'Admin\FabricController@edit')->name('fabric.edit') ;
Route::post('/fabric-update/{id}', 'Admin\FabricController@update')->name('fabric.update') ;
Route::any('/fabric-delete/{id}', 'Admin\FabricController@destroy')->name('fabric.delete') ;

Route::get('/age', 'Admin\AgeController@index')->name('admin.age') ;
Route::get('/age-create', 'Admin\AgeController@create')->name('age.create') ;
Route::post('/age-save', 'Admin\AgeController@store')->name('age.save') ;
Route::get('/age-edit/{id}', 'Admin\AgeController@edit')->name('age.edit') ;
Route::post('/age-update/{id}', 'Admin\AgeController@update')->name('age.update') ;
Route::any('/age-delete/{id}', 'Admin\AgeController@destroy')->name('age.delete') ;

Route::get('/hsn-code-import', 'Admin\HsnCodeController@importfile')->name('admin.hsn_code.import') ;
Route::post('/hsn-code-import', 'Admin\HsnCodeController@importLeads')->name('hsn_code.import') ;
Route::get('/hsn-code-export', 'Admin\HsnCodeController@export')->name('admin.hsn_code.export') ;

Route::get('/hsn-code', 'Admin\HsnCodeController@index')->name('admin.hsn_code') ;
Route::get('/hsn-code-create', 'Admin\HsnCodeController@create')->name('hsn_code.create') ;
Route::post('/hsn-code-save', 'Admin\HsnCodeController@store')->name('hsn_code.save') ;
Route::get('/hsn-code-edit/{id}', 'Admin\HsnCodeController@edit')->name('hsn_code.edit') ;
Route::post('/hsn-code-update/{id}', 'Admin\HsnCodeController@update')->name('hsn_code.update') ;
Route::any('/hsn-code-delete/{id}', 'Admin\HsnCodeController@destroy')->name('hsn_code.delete') ;

Route::get('/product-usp-import', 'Admin\ProductuspController@importfile')->name('admin.product_usp.import') ;
Route::get('/product-usp-export', 'Admin\ProductuspController@export')->name('admin.product_usp.export') ;
Route::post('/product-usp-import', 'Admin\ProductuspController@importLeads')->name('product_usp.import') ;

Route::get('/product-usp', 'Admin\ProductuspController@index')->name('admin.product_usp') ;
Route::get('/product-usp-create', 'Admin\ProductuspController@create')->name('product_usp.create') ;
Route::post('/product-usp-save', 'Admin\ProductuspController@store')->name('product_usp.save') ;
Route::get('/product-usp-edit/{id}', 'Admin\ProductuspController@edit')->name('product_usp.edit') ;
Route::post('/product-usp-update/{id}', 'Admin\ProductuspController@update')->name('product_usp.update') ;
Route::any('/product-usp-delete/{id}', 'Admin\ProductuspController@destroy')->name('product_usp.delete') ;


Route::get('/setting', 'Admin\SettingController@index')->name('admin.setting') ;
Route::get('/setting-create', 'Admin\SettingController@create')->name('setting.create') ;
Route::post('/setting-save', 'Admin\SettingController@store')->name('setting.save') ;
Route::get('/setting-edit/{id}', 'Admin\SettingController@edit')->name('setting.edit') ;
Route::post('/setting-update/{id}', 'Admin\SettingController@update')->name('setting.update') ;
Route::any('/setting-delete/{id}', 'Admin\SettingController@destroy')->name('setting.delete') ;

Route::get('/contact', 'Admin\ContactController@index')->name('admin.contact') ;
Route::get('/contact-create', 'Admin\ContactController@create')->name('contact.create') ;
Route::post('/contact-save', 'Admin\ContactController@store')->name('contact.save') ;
Route::get('/contact-edit/{id}', 'Admin\ContactController@edit')->name('contact.edit') ;
Route::post('/contact-update/{id}', 'Admin\ContactController@update')->name('contact.update') ;
Route::any('/contact-delete/{id}', 'Admin\ContactController@destroy')->name('contact.delete') ;

Route::get('/about', 'Admin\AboutController@index')->name('admin.about') ;
Route::get('/about-create', 'Admin\AboutController@create')->name('about.create') ;
Route::post('/about-save', 'Admin\AboutController@store')->name('about.save') ;
Route::get('/about-edit/{id}', 'Admin\AboutController@edit')->name('about.edit') ;
Route::post('/about-update/{id}', 'Admin\AboutController@update')->name('about.update') ;
Route::any('/about-delete/{id}', 'Admin\AboutController@destroy')->name('about.delete') ;

Route::get('/reviews', 'Admin\ReviewsController@index')->name('admin.reviews') ;
Route::get('/reviews-edit/{id}', 'Admin\ReviewsController@edit')->name('reviews.edit') ;
Route::post('/reviews-update/{id}', 'Admin\ReviewsController@update')->name('reviews.update') ;
Route::any('/reviews-delete/{id}', 'Admin\ReviewsController@destroy')->name('reviews.delete') ;

Route::get('/payment_offer', 'Admin\Payment_gateway_offerController@index')->name('admin.payment_offer') ;
Route::get('/bank_offer-create', 'Admin\Payment_gateway_offerController@create')->name('bank_offer.create') ;
Route::post('/bank_offer-save', 'Admin\Payment_gateway_offerController@store')->name('bank_offer.save') ;
Route::get('/bank_offer-edit/{id}', 'Admin\Payment_gateway_offerController@edit')->name('bank_offer.edit') ;
Route::post('/about-update-bank_offer/{id}', 'Admin\Payment_gateway_offerController@update')->name('bank_offer.update') ;
Route::any('/bank_offer-delete/{id}', 'Admin\Payment_gateway_offerController@destroy')->name('bank_offer.delete') ;


Route::get('/guide', 'Admin\GuideController@index')->name('admin.guide') ;
Route::get('/guide-create', 'Admin\GuideController@create')->name('guide.create') ;
Route::post('/guide-save', 'Admin\GuideController@store')->name('guide.save') ;
Route::get('/guide-edit/{id}', 'Admin\GuideController@edit')->name('guide.edit') ;
Route::post('/guide-update/{id}', 'Admin\GuideController@update')->name('guide.update') ;
Route::any('/guide-delete/{id}', 'Admin\GuideController@destroy')->name('guide.delete') ;

Route::get('/report', 'Admin\ReportsController@index')->name('admin.report') ;

Route::get('/sales/report', 'Admin\ReportsController@sales')->name('admin.sales') ;
Route::post('/sales/export', 'Admin\ReportsController@export')->name('sales.export') ;

Route::get('/inventory/report', 'Admin\ReportsController@inventory')->name('admin.inventory') ;
Route::post('/inventory/export', 'Admin\ReportsController@inventory_export')->name('inventory.export') ;

Route::get('/user/report', 'Admin\ReportsController@user')->name('admin.userreport') ;
Route::get('/user/report/status', 'Admin\ReportsController@userStatus')->name('admin.userreport.status') ;
Route::post('/user/export', 'Admin\ReportsController@user_export')->name('userreport.export') ;

Route::get('/order/report', 'Admin\ReportsController@order')->name('admin.orderreport') ;
Route::get('/order/report/status', 'Admin\ReportsController@orderStatus')->name('admin.orderreport.status') ;
Route::post('/order/export', 'Admin\ReportsController@order_export')->name('orderreport.export') ;


Route::get('/transaction/report', 'Admin\ReportsController@transaction')->name('admin.transaction.report') ;
Route::get('/transaction/report/status', 'Admin\ReportsController@transactionStatus')->name('admin.transactionreport.status') ;
Route::post('/transaction/export', 'Admin\ReportsController@transaction_export')->name('transaction.export') ;



Route::get('/datatable', 'Admin\AdminController@datatable')->name('admin.datatable') ;





Route::get('/media-list', 'Admin\ImageController@index')->name('media.list');

Route::get('/upload-image/slider', 'Admin\ImageController@slider')->name('image.slider') ;

Route::get('/upload-image/category', 'Admin\ImageController@category')->name('image.category') ;

Route::get('/upload-image/general', 'Admin\ImageController@general')->name('image.general') ;

Route::get('/upload-image/brand/{id}', 'Admin\ImageController@brand')->name('image.brand') ;

Route::post('/upload-store', 'Admin\ImageController@store')->name('image.store') ;

Route::post('/upload-brandimage', 'Admin\ImageController@BrandImage')->name('brandimage.store') ;
Route::post('/upload-menuimage', 'Admin\ImageController@MenuImage')->name('menuimage.store') ;
Route::post('/upload-blogimage', 'Admin\ImageController@BlogImage')->name('blogimage.store') ;
Route::post('/upload-collectionimage', 'Admin\ImageController@collectionImage')->name('collectionimage.store') ;

Route::post('/upload-categoryimage', 'Admin\ImageController@categoryImage')->name('categoryimage.store') ;

Route::get('/image/{image}', 'Admin\ImageController@show')->name('image.view') ;

Route::any('/meadiaList/{folder}', 'Admin\ImageController@meadiaList')->name('meadiaList') ;

Route::any('/menubanner', 'Admin\ImageController@menubanner')->name('menubanner');
Route::any('/menuicon', 'Admin\ImageController@menuicon')->name('menuicon');
Route::any('/meadiaList2', 'Admin\ImageController@meadiaList2')->name('meadiaList2');

Route::any('/meadiaList23', 'Admin\ImageController@meadiaList23')->name('meadiaList23');

Route::any('/brandGallery', 'Admin\ImageController@brandGallery')->name('brandGallery');
Route::any('/collectionGallery', 'Admin\ImageController@collectionGallery')->name('collectionGallery');

Route::any('/galleryModal', 'Admin\ImageController@galleryModal')->name('galleryModal');

Route::any('/meadiaListBrandRight', 'Admin\ImageController@meadiaListBrandRight')->name('meadiaListBrandRight');
Route::any('/meadiaListblogimage1', 'Admin\ImageController@meadiaListblogimage1')->name('meadiaListblogimage1');
Route::any('/meadiaListblogimage2', 'Admin\ImageController@meadiaListblogimage2')->name('meadiaListblogimage2');
Route::any('/meadiaListblogimage3', 'Admin\ImageController@meadiaListblogimage3')->name('meadiaListblogimage3');

Route::any('/meadiaListBrandHome', 'Admin\ImageController@meadiaListBrandHome')->name('meadiaListBrandHome');

Route::any('/mediaSlider', 'Admin\ImageController@mediaSlider')->name('mediaSlider');

Route::any('/mediaRightSlider', 'Admin\ImageController@mediaRightSlider')->name('mediaRightSlider');

Route::post('/upload-mediaslider', 'Admin\ImageController@SliderImage')->name('mediaslider.store') ;

Route::any('/category-media', 'Admin\ImageController@categoryMedia')->name('category-media') ;

Route::any('/category-media-right', 'Admin\ImageController@categoryMediaRight')->name('category-media-right') ;

Route::any('/deleteImage/{filename}', 'Admin\ImageController@deleteImage')->name('deleteImage') ;



	/**

		Routes for Home Page

		

	**/

	

	

	/**

		Routes for sliders

	**/

	Route::get('/sliders', 'Admin\HomePageController@edit')->name('sliders.index');	

	Route::post('/sliders/update/{id}', 'Admin\HomePageController@update')->name('sliders.update');	

	

	/**

		Routes for Home Single

	**/

	Route::get('/single/edit', 'Admin\HomePageController@singleedit')->name('home.single');	

	Route::post('/single/update/{id}', 'Admin\HomePageController@singleupdate')->name('single.update');

	

	/**

		Routes for Home Brand of Day

	**/

	Route::get('/home-brands-of-day', 'Admin\HomePageController@brandedit')->name('home.brand_ofday');
	
	Route::get('/home-brands-square', 'Admin\HomePageController@brandsquareedit')->name('home.brand_square');

	Route::post('/home-brands-of-day/update/{id}', 'Admin\HomePageController@brandupdate')->name('brand_ofday.update');

	

	

	/**

		Routes for Home Head Turners

	**/

	Route::get('/home-head-turner', 'Admin\HomePageController@turneredit')->name('home.head_turner');	

	Route::post('/home-head-turner/update/{id}', 'Admin\HomePageController@turnerupdate')->name('head_turner.update');

	

	

	/**

		Routes for Home Sponserd

	**/

	Route::get('/home-sponserd', 'Admin\HomePageController@sponserdedit')->name('home.sponserd');	

	Route::post('/home-sponserd/update/{id}', 'Admin\HomePageController@sponserdupdate')->name('sponserd.update');

	

	

	/**

		Routes for Home Top selling Category

	**/

	Route::get('/home-top-sell', 'Admin\HomePageController@topSelledit')->name('home.top_sell');

	Route::post('/home-top-sell/update/{id}', 'Admin\HomePageController@topSellupdate')->name('top_sell.update');

	

	

	/**

		Routes for Home Best Deals

	**/

	Route::get('/home-best-deal', 'Admin\HomePageController@bestdealedit')->name('home.best_deal');		

	Route::post('/home-best-deal/update/{id}', 'Admin\HomePageController@bestdealupdate')->name('best_deal.update');

	Route::get('/home-best-product-deal', 'Admin\HomePageController@bestproductdealedit')->name('home.best_product_deal');		

	

	

	/**

		Routes for Home TOT Recommends

	**/

	Route::get('/home-tot-recommend', 'Admin\HomePageController@recommendedit')->name('home.tot_recommend');	

	Route::post('/home-tot-recommend/update/{id}', 'Admin\HomePageController@recommendupdate')->name('tot_recommend.update');


    /**

    Routes for Home Other

  **/

  Route::get('/home-index', 'Admin\HomePageController@otherindex')->name('home.other.index');  
  Route::get('/home-other/{id}', 'Admin\HomePageController@otheredit')->name('home.other.edit');  

  Route::post('/home-other/update/{id}', 'Admin\HomePageController@otherupdate')->name('home.other.update');
	
	Route::get('/home-other-text', 'Admin\HomePageController@othertextindex')->name('home.other-text.index');  
  Route::get('/home-other-text/{id}', 'Admin\HomePageController@othertextedit')->name('home.other-text.edit');  
  Route::post('/home-other-text/update/{id}', 'Admin\HomePageController@othertextupdate')->name('home.other-text.update');

  Route::get('/home-other-text-setting', 'Admin\HomePageController@othertextsettingindex')->name('home.other-text-setting.index');  
  Route::get('/home-other-text-setting/{id}', 'Admin\HomePageController@othertextsettingedit')->name('home.other-text-setting.edit');  
  Route::post('/home-other-text-setting/update/{id}', 'Admin\HomePageController@othertextsettingupdate')->name('home.other-text-setting.update');
  
  
  
  
  
  Route::get('/home-best_deals_in_town', 'Admin\HomePageController@best_deals_in_town_index')->name('home.best_deals_in_town.index');  
  Route::get('/home-best_deals_in_town/{id}', 'Admin\HomePageController@best_deals_in_town_edit')->name('home.best_deals_in_town.edit');  
  Route::post('/home-best_deals_in_town/update/{id}', 'Admin\HomePageController@best_deals_in_town_update')->name('home.best_deals_in_town.update');
  
  
  Route::get('/home-best_deals_in_town_two', 'Admin\HomePageController@best_deals_in_town_two_index')->name('home.best_deals_in_town_two.index');  
  Route::get('/home-best_deals_in_town_two/{id}', 'Admin\HomePageController@best_deals_in_town_two_edit')->name('home.best_deals_in_town_two.edit');  
  Route::post('/home-best_deals_in_town_two/update/{id}', 'Admin\HomePageController@best_deals_in_town_two_update')->name('home.best_deals_in_town_two.update');
  
  



Route::get('/home-collections', 'Admin\HomePageController@collections_edit')->name('home.collections.edit');	

Route::post('/home-collections/{id}', 'Admin\HomePageController@collections_update')->name('home.collections.update');



Route::get('/fashion-collections', 'Admin\FashionPageController@collections_edit')->name('fashion.collections.edit');	

Route::post('/fashion-collections/{id}', 'Admin\FashionPageController@collections_update')->name('fashion.collections.update');











Route::get('/fashion-fashion_head_turners_for_dudes', 'Admin\FashionPageController@fashion_head_turners_for_dudes_edit')->name('fashion.fashion_head_turners_for_dudes.edit');	

Route::post('/fashion-fashion_head_turners_for_dudes/{id}', 'Admin\FashionPageController@fashion_head_turners_for_dudes_update')->name('fashion.fashion_head_turners_for_dudes.update');

Route::get('/fashion-fashion_head_turners_for_stoppers_in_city', 'Admin\FashionPageController@fashion_head_turners_for_stoppers_in_city_edit')->name('fashion.fashion_head_turners_for_stoppers_in_city.edit');	

Route::post('/fashion-fashion_head_turners_for_stoppers_in_city/{id}', 'Admin\FashionPageController@fashion_head_turners_for_stoppers_in_city_update')->name('fashion.fashion_head_turners_for_stoppers_in_city.update');

Route::get('/fashion-fashion_head_turners_for_little_grown_ups', 'Admin\FashionPageController@fashion_head_turners_for_little_grown_ups_edit')->name('fashion.fashion_head_turners_for_little_grown_ups.edit');	

Route::post('/fashion-fashion_head_turners_for_little_grown_ups/{id}', 'Admin\FashionPageController@fashion_head_turners_for_little_grown_ups_update')->name('fashion.fashion_head_turners_for_little_grown_ups.update');

Route::get('/fashion-fashion_head_turners_for_babes', 'Admin\FashionPageController@fashion_head_turners_for_babes_edit')->name('fashion.fashion_head_turners_for_babes.edit');	

Route::post('/fashion-fashion_head_turners_for_babes/{id}', 'Admin\FashionPageController@fashion_head_turners_for_babes_update')->name('fashion.fashion_head_turners_for_babes.update');








Route::get('/beauty-beauty_head_turners_for_dudes', 'Admin\BeautyPageController@beauty_head_turners_for_dudes_edit')->name('beauty.beauty_head_turners_for_dudes.edit');  

Route::post('/beauty-beauty_head_turners_for_dudes/{id}', 'Admin\BeautyPageController@beauty_head_turners_for_dudes_update')->name('beauty.beauty_head_turners_for_dudes.update');

Route::get('/beauty-beauty_head_turners_for_stoppers_in_city', 'Admin\BeautyPageController@beauty_head_turners_for_stoppers_in_city_edit')->name('beauty.beauty_head_turners_for_stoppers_in_city.edit'); 

Route::post('/beauty-beauty_head_turners_for_stoppers_in_city/{id}', 'Admin\BeautyPageController@beauty_head_turners_for_stoppers_in_city_update')->name('beauty.beauty_head_turners_for_stoppers_in_city.update');

Route::get('/beauty-beauty_head_turners_for_little_grown_ups', 'Admin\BeautyPageController@beauty_head_turners_for_little_grown_ups_edit')->name('beauty.beauty_head_turners_for_little_grown_ups.edit'); 

Route::post('/beauty-beauty_head_turners_for_little_grown_ups/{id}', 'Admin\BeautyPageController@beauty_head_turners_for_little_grown_ups_update')->name('beauty.beauty_head_turners_for_little_grown_ups.update');

Route::get('/beauty-beauty_head_turners_for_babes', 'Admin\BeautyPageController@beauty_head_turners_for_babes_edit')->name('beauty.beauty_head_turners_for_babes.edit');  

Route::post('/beauty-beauty_head_turners_for_babes/{id}', 'Admin\BeautyPageController@beauty_head_turners_for_babes_update')->name('beauty.beauty_head_turners_for_babes.update');



Route::get('/food-food_head_turners_for_dudes', 'Admin\FoodPageController@food_head_turners_for_dudes_edit')->name('food.food_head_turners_for_dudes.edit');  

Route::post('/food-food_head_turners_for_dudes/{id}', 'Admin\FoodPageController@food_head_turners_for_dudes_update')->name('food.food_head_turners_for_dudes.update');

Route::get('/food-food_head_turners_for_stoppers_in_city', 'Admin\FoodPageController@food_head_turners_for_stoppers_in_city_edit')->name('food.food_head_turners_for_stoppers_in_city.edit'); 

Route::post('/food-food_head_turners_for_stoppers_in_city/{id}', 'Admin\FoodPageController@food_head_turners_for_stoppers_in_city_update')->name('food.food_head_turners_for_stoppers_in_city.update');

Route::get('/food-food_head_turners_for_little_grown_ups', 'Admin\FoodPageController@food_head_turners_for_little_grown_ups_edit')->name('food.food_head_turners_for_little_grown_ups.edit'); 

Route::post('/food-food_head_turners_for_little_grown_ups/{id}', 'Admin\FoodPageController@food_head_turners_for_little_grown_ups_update')->name('food.food_head_turners_for_little_grown_ups.update');

Route::get('/food-food_head_turners_for_babes', 'Admin\FoodPageController@food_head_turners_for_babes_edit')->name('food.food_head_turners_for_babes.edit');  

Route::post('/food-food_head_turners_for_babes/{id}', 'Admin\FoodPageController@food_head_turners_for_babes_update')->name('food.food_head_turners_for_babes.update');
























Route::get('/beauty-collections', 'Admin\BeautyPageController@collections_edit')->name('beauty.collections.edit');	

Route::post('/beauty-collections/{id}', 'Admin\BeautyPageController@collections_update')->name('beauty.collections.update');

Route::get('/food-collections', 'Admin\FoodPageController@collections_edit')->name('food.collections.edit');	

Route::post('/food-collections/{id}', 'Admin\FoodPageController@collections_update')->name('food.collections.update');








Route::get('/beauty-best_deals_in_town', 'Admin\BeautyPageController@best_deals_in_town_index')->name('beauty.best_deals_in_town.index');  
  Route::get('/beauty-best_deals_in_town/{id}', 'Admin\BeautyPageController@best_deals_in_town_edit')->name('beauty.best_deals_in_town.edit');  
  Route::post('/beauty-best_deals_in_town/update/{id}', 'Admin\BeautyPageController@best_deals_in_town_update')->name('beauty.best_deals_in_town.update');
  
  
  Route::get('/beauty-best_deals_in_town_two', 'Admin\BeautyPageController@best_deals_in_town_two_index')->name('beauty.best_deals_in_town_two.index');  
  Route::get('/beauty-best_deals_in_town_two/{id}', 'Admin\BeautyPageController@best_deals_in_town_two_edit')->name('beauty.best_deals_in_town_two.edit');  
  Route::post('/beauty-best_deals_in_town_two/update/{id}', 'Admin\BeautyPageController@best_deals_in_town_two_update')->name('beauty.best_deals_in_town_two.update');


	

Route::get('/fashion-best_deals_in_town', 'Admin\FashionPageController@best_deals_in_town_index')->name('fashion.best_deals_in_town.index');  
  Route::get('/fashion-best_deals_in_town/{id}', 'Admin\FashionPageController@best_deals_in_town_edit')->name('fashion.best_deals_in_town.edit');  
  Route::post('/fashion-best_deals_in_town/update/{id}', 'Admin\FashionPageController@best_deals_in_town_update')->name('fashion.best_deals_in_town.update');
  
  
  Route::get('/fashion-best_deals_in_town_two', 'Admin\FashionPageController@best_deals_in_town_two_index')->name('fashion.best_deals_in_town_two.index');  
  Route::get('/fashion-best_deals_in_town_two/{id}', 'Admin\FashionPageController@best_deals_in_town_two_edit')->name('fashion.best_deals_in_town_two.edit');  
  Route::post('/fashion-best_deals_in_town_two/update/{id}', 'Admin\FashionPageController@best_deals_in_town_two_update')->name('fashion.best_deals_in_town_two.update');




	



Route::get('/food-best_deals_in_town', 'Admin\FoodPageController@best_deals_in_town_index')->name('food.best_deals_in_town.index');  
  Route::get('/food-best_deals_in_town/{id}', 'Admin\FoodPageController@best_deals_in_town_edit')->name('food.best_deals_in_town.edit');  
  Route::post('/food-best_deals_in_town/update/{id}', 'Admin\FoodPageController@best_deals_in_town_update')->name('food.best_deals_in_town.update');
  
  
  Route::get('/food-best_deals_in_town_two', 'Admin\FoodPageController@best_deals_in_town_two_index')->name('food.best_deals_in_town_two.index');  
  Route::get('/food-best_deals_in_town_two/{id}', 'Admin\FoodPageController@best_deals_in_town_two_edit')->name('food.best_deals_in_town_two.edit');  
  Route::post('/food-best_deals_in_town_two/update/{id}', 'Admin\FoodPageController@best_deals_in_town_two_update')->name('food.best_deals_in_town_two.update');













	/**

		Routes for Beauty Category  Page

		

	**/

	

	

	/**

		Routes for sliders

	**/

	Route::get('/beauty-banner', 'Admin\BeautyPageController@edit')->name('beauty.banner');	

	Route::post('/beauty-banner/update/{id}', 'Admin\BeautyPageController@update')->name('beauty_banner.update');	

	

	/**

		Routes for Beauty Single

	**/

	Route::get('/beauty-single', 'Admin\BeautyPageController@singleedit')->name('beauty.single');	

	Route::post('/beauty-single/update/{id}', 'Admin\BeautyPageController@singleupdate')->name('beauty_single.update');

	

	/**

		Routes for Beauty Brand of Day

	**/

	Route::get('/beauty-brands-of-day', 'Admin\BeautyPageController@brandedit')->name('beauty.brand_ofday');	

	Route::post('/beauty-brands-of-day/update/{id}', 'Admin\BeautyPageController@brandupdate')->name('beauty_brand_ofday.update');

	

	

	/**

		Routes for Beauty Head Turners

	**/

	Route::get('/beauty-head-turner', 'Admin\BeautyPageController@turneredit')->name('beauty.head_turner');	

	Route::post('/beauty-head-turner/update/{id}', 'Admin\BeautyPageController@turnerupdate')->name('beauty_head_turner.update');
	
	Route::any('/beauty_head_turner_update', 'Admin\BeautyPageController@beauty_head_turner_update')->name('beauty_head_turner_update');

	

	

	/**

		Routes for Beauty Sponserd

	**/

	Route::get('/beauty-sponserd', 'Admin\BeautyPageController@sponserdedit')->name('beauty.sponserd');	

	Route::post('/beauty-sponserd/update/{id}', 'Admin\BeautyPageController@sponserdupdate')->name('beauty_sponserd.update');

	

	

	/**

		Routes for Beauty Top selling Category

	**/

	Route::get('/beauty-top-sell', 'Admin\BeautyPageController@topSelledit')->name('beauty.top_sell');

	Route::post('/beauty-top-sell/update/{id}', 'Admin\BeautyPageController@topSellupdate')->name('beauty_top_sell.update');
	
	Route::any('/beauty_top_sell_update', 'Admin\BeautyPageController@beauty_top_sell_update')->name('beauty_top_sell_update');
	
	Route::any('/beautybest_top_sell_update', 'Admin\BeautyPageController@beautybest_top_sell_update')->name('beautybest_top_sell_update');

	

	

	/**

		Routes for Beauty Best Deals

	**/

	Route::get('/beauty-best-deal', 'Admin\BeautyPageController@bestdealedit')->name('beauty.best_deal');		

	Route::post('/beauty-best-deal/update/{id}', 'Admin\BeautyPageController@bestdealupdate')->name('beauty_best_deal.update');

	

	

	/**

		Routes for Beauty TOT Recommends

	**/

	Route::get('/beauty-tot-recommend', 'Admin\BeautyPageController@recommendedit')->name('beauty.tot_recommend');	

	Route::post('/beauty-tot-recommend/update/{id}', 'Admin\BeautyPageController@recommendupdate')->name('beauty_tot_recommend.update');
	
	Route::any('/beauty_tot_recommend_update', 'Admin\BeautyPageController@beauty_tot_recommend_update')->name('beauty_tot_recommend_update');
	
	

	

	/**

		Routes for Food Category Page

		

	**/

	

	

	/**

		Routes for sliders

	**/

	Route::get('/food-banner', 'Admin\FoodPageController@edit')->name('food.banner');	

	Route::post('/food-banner/update/{id}', 'Admin\FoodPageController@update')->name('food_banner.update');	

	

	/**

		Routes for Food Single

	**/

	Route::get('/food-single', 'Admin\FoodPageController@singleedit')->name('food.single');	
	
	Route::get('/food-single-slider', 'Admin\FoodPageController@foodslider')->name('food.single.slider');	

	Route::post('/food-single/update/{id}', 'Admin\FoodPageController@singleupdate')->name('food_single.update');

	

	/**

		Routes for Food Brand of Day

	**/

	Route::get('/food-brands-of-day', 'Admin\FoodPageController@brandedit')->name('food.brand_ofday');	

	Route::post('/food-brands-of-day/update/{id}', 'Admin\FoodPageController@brandupdate')->name('food_brand_ofday.update');

	

	

	/**

		Routes for Food Head Turners

	**/

	Route::get('/food-head-turner', 'Admin\FoodPageController@turneredit')->name('food.head_turner');	

	Route::post('/food-head-turner/update/{id}', 'Admin\FoodPageController@turnerupdate')->name('food_head_turner.update');
	
	Route::any('/food_head_turner_update', 'Admin\FoodPageController@food_head_turner_update')->name('food_head_turner_update');
	
	Route::any('/food_sell_top_sell_table_update', 'Admin\FoodPageController@food_sell_top_sell_table_update')->name('food_sell_top_sell_table_update');

	

	

	/**

		Routes for Food Sponserd

	**/

	Route::get('/food-sponserd', 'Admin\FoodPageController@sponserdedit')->name('food.sponserd');	

	Route::post('/food-sponserd/update/{id}', 'Admin\FoodPageController@sponserdupdate')->name('food_sponserd.update');

	

	

	/**

		Routes for Food Top selling Category

	**/

	Route::get('/food-top-sell', 'Admin\FoodPageController@topSelledit')->name('food.top_sell');

	Route::post('/food-top-sell/update/{id}', 'Admin\FoodPageController@topSellupdate')->name('food_top_sell.update');
	
	Route::any('/food_top_sell_update', 'Admin\FoodPageController@food_top_sell_update')->name('food_top_sell_update');
	
	Route::any('/food_tot_sponser_update', 'Admin\FoodPageController@food_tot_sponser_update')->name('food_tot_sponser_update');

	

	

	/**

		Routes for Food Best Deals

	**/

	Route::get('/food-best-deal', 'Admin\FoodPageController@bestdealedit')->name('food.best_deal');		

	Route::post('/food-best-deal/update/{id}', 'Admin\FoodPageController@bestdealupdate')->name('food_best_deal.update');

	

	

	/**

		Routes for Food TOT Recommends

	**/

	Route::get('/food-tot-recommend', 'Admin\FoodPageController@recommendedit')->name('food.tot_recommend');	

	Route::post('/food-tot-recommend/update/{id}', 'Admin\FoodPageController@recommendupdate')->name('food_tot_recommend.update');
	
	Route::any('/food_tot_recommend_update', 'Admin\FoodPageController@food_tot_recommend_update')->name('food_tot_recommend_update');
	
	Route::any('/food_tot_recommend_update', 'Admin\FoodPageController@food_tot_recommend_update')->name('food_tot_recommend_update');

	

	/**

		Routes for Fashion Category Page

		

	**/

	

	

	/**

		Routes for sliders

	**/

	Route::get('/fashion-banner', 'Admin\FashionPageController@edit')->name('fashion.banner');	

	Route::post('/fashion-banner/update/{id}', 'Admin\FashionPageController@update')->name('fashion_banner.update');	

	

	/**

		Routes for Fashion Single

	**/

	Route::get('/fashion-single', 'Admin\FashionPageController@singleedit')->name('fashion.single');	

	Route::post('/fashion-single/update/{id}', 'Admin\FashionPageController@singleupdate')->name('fashion_single.update');

	

	/**

		Routes for Fashion Brand of Day

	**/

	Route::get('/fashion-brands-of-day', 'Admin\FashionPageController@brandedit')->name('fashion.brand_ofday');	

	Route::post('/fashion-brands-of-day/update/{id}', 'Admin\FashionPageController@brandupdate')->name('fashion_brand_ofday.update');

	

	

	/**

		Routes for Fashion Besties

	**/

	Route::get('/fashion-besties', 'Admin\FashionPageController@turneredit')->name('fashion.besties');	

	Route::post('/fashion-head-turner/update/{id}', 'Admin\FashionPageController@turnerupdate')->name('fashion_head_turner.update');

	

	Route::get('/fashion-trending', 'Admin\FashionPageController@trendingedit')->name('fashion.trending');

	Route::get('/fashion-dues', 'Admin\FashionPageController@duesedit')->name('fashion.dues');

	Route::get('/fashion-misses', 'Admin\FashionPageController@missesedit')->name('fashion.misses');

	Route::get('/fashion-kids', 'Admin\FashionPageController@kidsedit')->name('fashion.kids');

	
	
	
	
	
	Route::any('/beautybestiesProducts', 'Admin\ProductController@beautybestiesProducts')->name('beautybestiesProducts');
Route::get('/beauty-besties', 'Admin\BeautyPageController@bestiesturneredit')->name('beauty.besties');
Route::any('/saveBeautyBestiesProducts', 'Admin\ProductController@saveBeautyBestiesProducts')->name('saveBeautyBestiesProducts');




Route::get('/beauty-trending', 'Admin\BeautyPageController@beautytrendingedit')->name('beauty.trending');
Route::any('/beautyTrendingProducts', 'Admin\ProductController@beautyTrendingProducts')->name('beautyTrendingProducts');
Route::any('/saveBeautyTrendingProducts', 'Admin\ProductController@saveBeautyTrendingProducts')->name('saveBeautyTrendingProducts');



Route::any('/beautyduesProducts', 'Admin\ProductController@beautyduesProducts')->name('beautyduesProducts');
Route::any('/saveBeautyDuesProducts', 'Admin\ProductController@saveBeautyDuesProducts')->name('saveBeautyDuesProducts');
Route::get('/beauty-dues', 'Admin\BeautyPageController@beautyduesedit')->name('beauty.dues');





Route::get('/beauty-misses', 'Admin\BeautyPageController@beautymissesedit')->name('beauty.misses');
Route::any('/beautyMissesProducts', 'Admin\ProductController@beautyMissesProducts')->name('beautyMissesProducts');
Route::any('/saveBeautyMissesProducts', 'Admin\ProductController@saveBeautyMissesProducts')->name('saveBeautyMissesProducts');



Route::get('/beauty-kids', 'Admin\BeautyPageController@beautykidsedit')->name('beauty.kids');
Route::any('/beautyKidsProducts', 'Admin\ProductController@beautyKidsProducts')->name('beautyKidsProducts');
Route::any('/saveBeautyKidsProducts', 'Admin\ProductController@saveBeautyKidsProducts')->name('saveBeautyKidsProducts');











Route::any('/foodbestiesProducts', 'Admin\ProductController@foodbestiesProducts')->name('foodbestiesProducts');
Route::get('/food-besties', 'Admin\FoodPageController@bestiesturneredit')->name('food.besties');
Route::any('/saveFoodBestiesProducts', 'Admin\ProductController@saveFoodBestiesProducts')->name('saveFoodBestiesProducts');




Route::get('/food-trending', 'Admin\FoodPageController@foodtrendingedit')->name('food.trending');
Route::any('/foodTrendingProducts', 'Admin\ProductController@foodTrendingProducts')->name('foodTrendingProducts');
Route::any('/saveFoodTrendingProducts', 'Admin\ProductController@saveFoodTrendingProducts')->name('saveFoodTrendingProducts');



Route::any('/foodduesProducts', 'Admin\ProductController@foodduesProducts')->name('foodduesProducts');
Route::any('/saveFoodDuesProducts', 'Admin\ProductController@saveFoodDuesProducts')->name('saveFoodDuesProducts');
Route::get('/food-dues', 'Admin\FoodPageController@foodduesedit')->name('food.dues');





Route::get('/food-misses', 'Admin\FoodPageController@foodmissesedit')->name('food.misses');
Route::any('/foodMissesProducts', 'Admin\ProductController@foodMissesProducts')->name('foodMissesProducts');
Route::any('/saveFoodMissesProducts', 'Admin\ProductController@saveFoodMissesProducts')->name('saveFoodMissesProducts');



Route::get('/food-kids', 'Admin\FoodPageController@foodkidsedit')->name('food.kids');
Route::any('/foodKidsProducts', 'Admin\ProductController@foodKidsProducts')->name('foodKidsProducts');
Route::any('/saveFoodKidsProducts', 'Admin\ProductController@saveFoodKidsProducts')->name('saveFoodKidsProducts');
	
	
	
	
	
	
	
	
	

	/**

		Routes for Fashion Sponserd

	**/

	Route::get('/fashion-sponserd/', 'Admin\FashionPageController@sponserdedit')->name('fashion.sponserd');	

	Route::post('/fashion-sponserd/update/{id}', 'Admin\FashionPageController@sponserdupdate')->name('fashion_sponserd.update');
	
	Route::any('/fashion_sponserd_update', 'Admin\FashionPageController@fashion_sponserd_update')->name('fashion_sponserd_update');

	Route::any('/beauty_sponserd_update', 'Admin\BeautyPageController@beauty_sponserd_update')->name('beauty_sponserd_update');

	

	/**

		Routes for Fashion Top selling Category

	**/

	Route::get('/fashion-top-sell', 'Admin\FashionPageController@topSelledit')->name('fashion.top_sell');

	Route::post('/fashion-top-sell/update/{id}', 'Admin\FashionPageController@topSellupdate')->name('fashion_top_sell.update');

	

	

	/**

		Routes for Fashion Best Deals

	**/

	Route::get('/fashion-best-deal', 'Admin\FashionPageController@bestdealedit')->name('fashion.best_deal');		

	Route::post('/fashion-best-deal/update/{id}', 'Admin\FashionPageController@bestdealupdate')->name('fashion_best_deal.update');

	

	

	/**

		Routes for Fashion TOT Recommends

	**/

	Route::get('/fashion-tot-recommend', 'Admin\FashionPageController@recommendedit')->name('fashion.tot_recommend');	

	Route::post('/fashion-tot-recommend/update/{id}', 'Admin\FashionPageController@recommendupdate')->name('fashion_tot_recommend.update');
	
	Route::any('/fashion_tot_recommend_update', 'Admin\FashionPageController@fashion_tot_recommend_update')->name('fashion_tot_recommend_update');

	





Route::any('/createPassword/{id}', 'Admin\AdminController@createPassword')->name('create.password');





Route::get('/postalcode', 'Admin\PostalController@index')->name('admin.postal');

Route::any('/savepostalcode', 'Admin\PostalController@create')->name('postal.create');

Route::any('/storepostalcode', 'Admin\PostalController@store')->name('postal.store');



Route::any('editpostalcode/{id}', 'Admin\PostalController@edit')->name('postal.edit');



Route::any('/deletepostalcode/{id}', 'Admin\PostalController@delete')->name('postal.delete');

Route::any('/updatepostalcode', 'Admin\PostalController@update')->name('postal.update');



Route::any('/postalList', 'Admin\PostalController@postalList')->name('postalList') ;







//Blog





Route::get('/blog', 'Admin\BlogController@index')->name('admin.blog');

Route::any('/saveblog', 'Admin\BlogController@create')->name('blog.create');

Route::any('/storeblog', 'Admin\BlogController@store')->name('blog.store');

Route::any('/getSubCateByCategory', 'Admin\BlogController@getSubCateByCategory')->name('blog.getSubCateByCategory');

Route::any('editblog/{id}', 'Admin\BlogController@edit')->name('blog.edit');



Route::any('/deleteblog/{id}', 'Admin\BlogController@delete')->name('blog.delete');

Route::any('/updateblog', 'Admin\BlogController@update')->name('blog.update');



Route::any('/blogList', 'Admin\BlogController@blogList')->name('blogList') ;

Route::any('/bloglisthome', 'Admin\BlogController@bloglisthome')->name('admin.bloglisthome') ;
Route::any('/save-bloglisthome', 'Admin\BlogController@saveBlogListHome')->name('save.bloglisthome') ;

Route::any('/blog-tag-list', 'Admin\BlogController@tagList')->name('blog.tag.list') ;
Route::any('/blog-brand-tag', 'Admin\BlogController@saveCollectionTag')->name('save.blog.tag') ;



//Blogcategory





Route::get('/blog-category', 'Admin\BlogController@indexCategory')->name('admin.blog1category');

Route::any('/saveblog-category', 'Admin\BlogController@createCategory')->name('blog1category.create');

Route::any('/storeblog-category', 'Admin\BlogController@storeCategory')->name('blog1category.store');



Route::any('editblog-category/{id}', 'Admin\BlogController@editCategory')->name('blog1category.edit');



Route::any('/deleteblog-category/{id}', 'Admin\BlogController@deleteCategory')->name('blogcategory1.delete');

Route::any('/updateblog-category', 'Admin\BlogController@updateCategory')->name('blogcategory1.update');



Route::any('/blogListCategory', 'Admin\BlogController@blogListCategory')->name('blogListCategory') ;





Route::get('/blogcategory', 'Admin\BlogCategoryController@index')->name('admin.blogcategory') ;



Route::post('/addblogcategory', 'Admin\BlogCategoryController@categorycreate')->name('admin.blogcategorycreate') ;

Route::post('/addblogsubcategory', 'Admin\BlogCategoryController@subcategorycreate')->name('admin.subblogcategorycreate') ;

Route::get('/edit-blogcategory/{id}', 'Admin\BlogCategoryController@edit')->name('category.edit') ;



Route::post('/update-blogcategory/{id}', 'Admin\BlogCategoryController@catupdate')->name('blogcategory.update') ;



Route::any('/delete-blogcategory/{id}', 'Admin\BlogCategoryController@catdelete')->name('blogcategory.delete') ;

Route::any('/topSellBlogCategory', 'Admin\BlogCategoryController@topSellCategory')->name('topSellBlogCategory') ;

Route::any('/homeBestDealBlogCategory', 'Admin\BlogCategoryController@homeBestDealCategory')->name('homeBestDealBlogCategory') ;





});

////

 

//collections Controller



Route::get('/manage-collection', 'Admin\CollectionsController@manageCollections')->name('admin.manage.collection');

Route::get('/add-collection', 'Admin\CollectionsController@addCollection')->name('admin.add.collection');

Route::post('/add-collection', 'Admin\CollectionsController@saveCollection')->name('admin.save.collection');

Route::get('/edit-collection/{id}', 'Admin\CollectionsController@editCollection')->name('admin.edit.collection');

Route::post('/update-collection/{id}', 'Admin\CollectionsController@updateCollection')->name('admin.update.collection');

Route::get('/destory-collections/{id}', 'Admin\CollectionsController@deleteCollection')->name('admin.delete.collection');

Route::any('/collectionList', 'Admin\CollectionsController@collectionList')->name('collectionList') ;

Route::any('/collectionProductList', 'Admin\CollectionsController@productList')->name('collectionProductList') ;

Route::any('/save-collection-product', 'Admin\CollectionsController@saveCollectionProduct')->name('save.collection.products') ;

Route::any('/collection-tag-list', 'Admin\CollectionsController@tagList')->name('collection.tag.list') ;

Route::any('/save-collection-tag', 'Admin\CollectionsController@saveCollectionTag')->name('save.collection.tag') ;



Route::any('/savebrandofday', 'Admin\ProductController@saveBrandOfDay')->name('relatedproduct');

//Menu management

Route::get('/manage-menu', 'Admin\MenuManagementController@manageMenu')->name('admin.manage.menu');
Route::get('/manage-menu-create', 'Admin\MenuManagementController@create')->name('menu.create');
Route::get('/manage-menu-sub-create', 'Admin\MenuManagementController@createsub')->name('menu.sub.create');
Route::post('/manage-menu-save', 'Admin\MenuManagementController@save')->name('menu.save');
Route::post('/manage-menu-edit/{id}', 'Admin\MenuManagementController@edit')->name('menu.edit');
Route::post('/manage-menu-sub-save', 'Admin\MenuManagementController@savesub')->name('menu.sub.save');
Route::any('/manage-menu-delete/{id}', 'Admin\MenuManagementController@delete')->name('manage-menu.delete');
Route::any('/category-order', 'Admin\MenuManagementController@categoryOrder')->name('category.order');
Route::post('/category-order-submit', 'Admin\MenuManagementController@categoryOrderSubmit')->name('categorymenu.order');


/* Brand menu  */

Route::get('/manage-brand-menu', 'Admin\BrandMenuController@manageMenu')->name('admin.manage.brand.menu');

Route::get('/manage-brand-menu-create', 'Admin\BrandMenuController@create')->name('brand.menu.create');

Route::get('/manage-brand-menu-sub-create', 'Admin\BrandMenuController@createsub')->name('brand.menu.sub.create');

Route::post('/manage-brand-menu-save', 'Admin\BrandMenuController@save')->name('brand.menu.save');

Route::post('/manage-brand-menu-edit/{id}', 'Admin\BrandMenuController@edit')->name('brand.menu.edit');

Route::post('/manage-brand-menu-sub-save', 'Admin\BrandMenuController@savesub')->name('brand.menu.sub.save');

Route::any('/manage-brand-menu-delete/{id}', 'Admin\BrandMenuController@delete')->name('manage-brand.menu.delete');

Route::any('/brand-category-order', 'Admin\BrandMenuController@categoryOrder')->name('brand.category.order');

Route::post('/brand-category-order-submit', 'Admin\BrandMenuController@categoryOrderSubmit')->name('brand.categorymenu.order');





















Route::get('/{vue_capture?}', function () {

  return view('welcome');

})->where('vue_capture', '[\/\w\.-]*');



Auth::routes(['register' => false]);
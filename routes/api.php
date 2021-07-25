<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get('/testmail', 'Admin\OrderController@testMail');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Endpoints for the authentication controller
Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function() {
  Route::post('signup', 'SignUpController');
  Route::post('signin', 'SignInController');
  Route::post('signout', 'SignOutController');
  Route::get('me', 'MeController');
});

// Endpoints for the category controller
Route::group(['prefix' => 'cat'], function() {
  Route::post('store', 'CategoryController@store');
  Route::get('fetchall', 'CategoryController@index');
  Route::get('fetchone/{id}', 'CategoryController@show');
});

// Endpoints for the product controller
Route::group(['prefix' => 'prod'], function() {
  Route::get('fetchall', 'ProductController@index');
  Route::post('store', 'ProductController@store');
  Route::post('fetchcatprod', 'ProductController@getProductsFromCategory');
  Route::get('fetchone/{id}', 'ProductController@show');
  Route::post('updateone/{id}', 'ProductController@update');
  Route::post('deleteone/{id}', 'ProductController@destroy');
});

// Endpoints for the cart controller
Route::group(['prefix' => 'cart'], function() {
  Route::post('fetchcart', 'CartController@fetchCart');
  Route::post('createcart', 'CartController@createCart');
  Route::post('addtocart', 'CartController@addToCart');
  Route::post('removefromcart', 'CartController@removeFromCart');
  Route::post('increaseitemquantity', 'CartController@increaseItemQuantity');
  Route::post('decreaseitemquantity', 'CartController@decreaseItemQuantity');
});

// Endpoints for the viewedproducts controller
Route::group(['prefix' => 'viewed'], function() {
  Route::get('fetchallviewed/{uuid}', 'ViewedProductsController@index');
  Route::post('addtoviewed', 'ViewedProductsController@store');
});


/* Home Page APIS */ 

Route::get('/homeslider', 'Api\HomePageController@homeSlider');
Route::get('/homesingle', 'Api\HomePageController@homeSingle');
Route::get('/homebrands', 'Api\HomePageController@homeBrands');
Route::get('/homebrandofdays', 'Api\HomePageController@homeBrandofDays');
Route::get('/homenewarrival', 'Api\HomePageController@homeNewArrival');
Route::get('/hometurner', 'Api\HomePageController@homeTurner');
Route::get('/homesponsor', 'Api\HomePageController@homeSponsor');
Route::get('/hometopselling', 'Api\HomePageController@homeTopSelling');
Route::get('/homebestdeal', 'Api\HomePageController@homeBestDeal');
Route::get('/hometotrecommened', 'Api\HomePageController@homeTotRecommened');
Route::get('/homebestdealproducts', 'Api\HomePageController@homeBestDealProducts');


/* Home Beauty Page APIS */ 

Route::get('/beautyslider', 'Api\BeautyPageController@homeSlider');
Route::get('/beautysingle', 'Api\BeautyPageController@homeSingle');
Route::get('/beautybrands', 'Api\BeautyPageController@homeBrands');
Route::get('/beautybrandofdays', 'Api\BeautyPageController@homeBrandofDays');
Route::get('/beautynewarrival', 'Api\BeautyPageController@homeNewArrival');
Route::get('/beautyturner', 'Api\BeautyPageController@homeTurner');
Route::get('/beautysponsor', 'Api\BeautyPageController@homeSponsor');
Route::get('/beautytopselling', 'Api\BeautyPageController@homeTopSelling');
Route::get('/beautybestdeal', 'Api\BeautyPageController@homeBestDeal');
Route::get('/beautytotrecommened', 'Api\BeautyPageController@homeTotRecommened');

/* Home Fashion Page APIS */ 

Route::get('/fashionslider', 'Api\FashionPageController@homeSlider');
Route::get('/fashionsingle', 'Api\FashionPageController@homeSingle');
Route::get('/fashionbrands', 'Api\FashionPageController@homeBrands');
Route::get('/fashionbrandofdays', 'Api\FashionPageController@homeBrandofDays');
Route::get('/fashionnewarrival', 'Api\FashionPageController@homeNewArrival');
Route::get('/fashionturner', 'Api\FashionPageController@homeTurner');
Route::get('/fashionsponsor', 'Api\FashionPageController@homeSponsor');
Route::get('/fashiontopselling', 'Api\FashionPageController@homeTopSelling');
Route::get('/fashionbestdeal', 'Api\FashionPageController@homeBestDeal');
Route::get('/fashiontotrecommened', 'Api\FashionPageController@homeTotRecommened');
Route::get('/fashionmensubcategories', 'Api\FashionPageController@menSubCategories');

/* Home Food Page APIS */ 

Route::get('/foodslider', 'Api\FoodPageController@homeSlider');
Route::get('/foodsingle', 'Api\FoodPageController@homeSingle');
Route::get('/foodbrands', 'Api\FoodPageController@homeBrands');
Route::get('/foodbrandofdays', 'Api\FoodPageController@homeBrandofDays');
Route::get('/foodnewarrival', 'Api\FoodPageController@homeNewArrival');
Route::get('/foodturner', 'Api\FoodPageController@homeTurner');
Route::get('/foodsponsor', 'Api\FoodPageController@homeSponsor');
Route::get('/foodtopselling', 'Api\FoodPageController@homeTopSelling');
Route::get('/foodbestdeal', 'Api\FoodPageController@homeBestDeal');
Route::get('/foodtotrecommened', 'Api\FoodPageController@homeTotRecommened');

/* Products */

Route::get('/products', 'Api\ProductController@products');
Route::get('/productdetails/{id}', 'Api\ProductController@productDetails');
Route::get('/getsmallimage/{product_id}/{id}', 'Api\ProductController@getSmallImage');
Route::get('/getvariantproduct/{product_id}/{id}', 'Api\ProductController@getVariantProduct');
Route::get('/getsizes', 'Api\ProductController@getSizes');
Route::get('/getcolors', 'Api\ProductController@getColors');
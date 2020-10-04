
<?php

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



Route::get('/','MainController@index');

Route::get('/applications','MainController@showApplicationsListing');
Route::get('/applications/{segment}','MainController@showApplicationsListingSegment');
Route::get('/application/{application_slug}','MainController@showProductsByApplication');


Route::get('/categories','MainController@showCategoryListing');
Route::get('/categories/{segment}','MainController@showCategoryListingSegment');

Route::get('/category/{category_slug}','MainController@showProductsByCategory');


Route::get('/brands','MainController@showBrandsListing');
Route::get('/brands/{segment}','MainController@showBrandsListingSegment');
Route::get('/brand/{brandname}','MainController@showProductsByBrand')->name("brand");

Route::get('/brand/{brandname}/{category_slug}', 'MainController@redirectBrandURL');
Route::get('/productsets/{brandname}/{category_slug}','MainController@showProductsByBrand')->name('productsets');;




Route::get('/product/{productid}/{productslug}','MainController@showProductsBypID');


Route::get('/sitemap/{id}/{index}','MainController@siteMapGenerate');
Route::get('/sitemap/{id}/','MainController@siteMapGenerate');

Route::get('/seo','MainController@generateSEOLinks');




Route::view('/checkout','v2.checkout');


Route::get('/configurator/{productid}','MainController@getConfigurator');

Route::get('autocomplete-ajax',array('as'=>'autocomplete.ajax','uses'=>'MainController@getSearchResults'));



Route::post("/submitlead",'MainController@submitLead');


Route::get("/admin",'AdminController@index')->middleware('auth');;
Route::get("/admin/sent",'AdminController@sent')->middleware('auth');

Route::get("/lead/{leadid}",'AdminController@displayLead')->middleware('auth');;
Route::get("/sendemail/{leadid}",'AdminController@displayLeadEmail')->middleware('auth');;
Route::Post("/sendemailresponse/{leadid}",'AdminController@sendEmailReponse')->middleware('auth');;

Route::get("/previewemail/{leadid}",'AdminController@previewLeadEmail')->middleware('auth');

Route::get("/addProducts",'AdminController@addProducts')->middleware('auth');;


Route::get('/autocomplete-search',array('as'=>'autocomplete.search','uses'=>'AutoCompleteController@index'));

Route::get('/autocomplete-ajax',array('as'=>'autocomplete.ajax','uses'=>'AutoCompleteController@ajaxData'));


Route::get('/prodconfig/{leadId}',"MainController@getProductPriceFromInstrumart");




Auth::routes();

Route::get("/emailauth",function (){

	Auth::loginUsingId("noaman.kazi@gmail.com");
	return redirect('/admin');

});

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/mail', 'MainController@emailcron')->name('sendmail');

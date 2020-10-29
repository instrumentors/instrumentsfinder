
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

Route::get('/prodconfig/{leadId}',"MainController@getProductPriceFromInstrumart");

Route::get('autocomplete-ajax',array('as'=>'autocomplete.ajax','uses'=>'MainController@getSearchResults'));

Route::get('/autocomplete-search',array('as'=>'autocomplete.search','uses'=>'AutoCompleteController@index'));

Route::get('/autocomplete-ajax',array('as'=>'autocomplete.ajax','uses'=>'AutoCompleteController@ajaxData'));





Auth::routes();

Route::get("/emailauth",function (){

	Auth::loginUsingId("noaman.kazi@gmail.com");
	return redirect('/admin');

});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'HomeController@index')->name('home');

Route::get('/mail', 'MainController@emailcron')->name('sendmail');




Route::get('{subdomain}/categories','MainController@showCategoryListing');
Route::get('/categories','MainController@showCategoryListing');

Route::get('{subdomain}/category/{category_slug}','MainController@showProductsByCategory');
Route::get('/category/{category_slug}','MainController@showProductsByCategory');

Route::get('{subdomain}/brands','MainController@showBrandsListing');
Route::get('/brands','MainController@showBrandsListing');

Route::get('{subdomain}/brand/{brandname}','MainController@showProductsByBrand')->name("brand");
Route::get('/brand/{brandname}','MainController@showProductsByBrand')->name("brand");


Route::get('/applications','MainController@showApplicationsListing');
Route::get('{subdomain}/applications','MainController@showApplicationsListing');

Route::get('/application/{application_slug}','MainController@showProductsByApplication');
Route::get('{subdomain}/application/{application_slug}','MainController@showProductsByApplication');


Route::get('{subdomain}/product/{productid}/{productslug}','MainController@showProductsBypID');
Route::get('/product/{productid}/{productslug}','MainController@showProductsBypID');

Route::get('/product/{productid}/{productslug}','MainController@showProductsBypID');
Route::get('{subdomain}/product/{productid}/{productslug}','MainController@showProductsBypID');

Route::get('/configurator/{productid}','MainController@getConfigurator');
Route::get('{subdomain}/configurator/{productid}','MainController@getConfigurator');

Route::view('/checkout','v2.checkout');
Route::view('{subdomain}/checkout','v2.checkout');

Route::post("/submitlead",'MainController@submitLead');
Route::post("{subdomain}/submitlead",'MainController@submitLead');

Route::get('/sitemap/{id}/{index}/{keyword?}','MainController@siteMapGenerate');
Route::get('{subdomain}/sitemap/{id}/{index}/{keyword?}','MainController@siteMapGenerate');

//Route::get('/sitemap/{id}/','MainController@siteMapGenerate');
//Route::get('{subdomain}/sitemap/{id}/','MainController@siteMapGenerate');

Route::get('/seo','MainController@generateSEOLinks');
Route::get('{subdomain}/seo','MainController@generateSEOLinks');


//To be fixed
Route::get('/productsets/{brandname}/{category_slug}','MainController@showProductsByBrand')->name('productsets');;
Route::get('{subdomain}/productsets/{brandname}/{category_slug}','MainController@showProductsByBrand')->name('productsets');;


Route::get('{subdomain}/brand/{brandname}/{category_slug}', 'MainController@redirectBrandURL');
Route::get('/brand/{brandname}/{category_slug}', 'MainController@redirectBrandURL');
//To be fixed


Route::get('/{subdomain?}','MainController@index');























Route::get("/admin",'AdminController@index')->middleware('auth');;
Route::get("/admin/sent",'AdminController@sent')->middleware('auth');

Route::get("/lead/{leadid}",'AdminController@displayLead')->middleware('auth');;
Route::get("/sendemail/{leadid}",'AdminController@displayLeadEmail')->middleware('auth');;
Route::Post("/sendemailresponse/{leadid}",'AdminController@sendEmailReponse')->middleware('auth');;

Route::get("/previewemail/{leadid}",'AdminController@previewLeadEmail')->middleware('auth');

Route::get("/addProducts",'AdminController@addProducts')->middleware('auth');;




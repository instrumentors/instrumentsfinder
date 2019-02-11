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

Route::get('/', function () {
    return view('index');
});



Route::get('/applications','MainController@showApplicationsListing');
Route::get('/application/{application_slug}','MainController@showProductsByApplication');


Route::get('/categories','MainController@showCategoryListing');
Route::get('/category/{category_slug}','MainController@showProductsByCategory');


Route::get('/brands','MainController@showBrandsListing');
Route::get('/brand/{brandname}','MainController@showProductsByBrand');

Route::get('/product/{productid}/{productslug}','MainController@showProductsBypID');

Route::get('autocomplete-ajax',array('as'=>'autocomplete.ajax','uses'=>'MainController@getSearchResults'));


Route::post("/submitlead",'MainController@submitLead');


Route::get("/admin",'AdminController@index')->middleware('auth');;
Route::get("/lead/{leadid}",'AdminController@displayLead')->middleware('auth');;




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

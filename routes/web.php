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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/card', 'CardController@index')->name('card');
Route::get('/test', 'Controller@index')->name('testindex');
Route::get('/checkout','CheckoutController@index')->name('checkout');
Route::post('/checkout','CheckoutController@postCheckout')->name('checkout');

/** GET REQUESTS FOR ANGULAR */
Route::get('/add-to-card/{id}',[
    'uses' => 'CardController@getAddToCart',
    'as' => 'item.addToCart'
]);

Route::get('/getItems','HomeController@getItems');
Route::get('/getCategories','HomeController@getCategories');
Route::get('/getBrands','HomeController@getBrands');
Route::get('/get-category-items/{id}','HomeController@getCategoryItems');
Route::get('/get-brand-items/{category_id}/{brand_id}','HomeController@getBrandItems');

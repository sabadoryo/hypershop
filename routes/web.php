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


Auth::routes();


Route::get('/', 'HomeController@index')->name('home');
Route::get('/card', 'CardController@index')->name('card');
Route::get('/checkout', 'CheckoutController@index')->name('checkout');
Route::post('/checkout', 'CheckoutController@postCheckout')->name('checkout');


/** GET REQUESTS FOR ANGULAR */

Route::group(['prefix' => 'api/v1'], function () {
    Route::get('/add-to-card/{id}', [
        'uses' => 'CardController@getAddToCart',
        'as' => 'item.addToCart'
    ]);
    Route::get('/reduce/{id}', 'CardController@getReduceByOne')->name('item.reduceByOne');
    Route::get('/getItems', 'HomeController@getItems');
    Route::get('/getCategories', 'HomeController@getCategories');
    Route::get('/getBrands', 'HomeController@getBrands');
    Route::get('/get-category-items/{id}', 'HomeController@getCategoryItems');
    Route::get('/get-brand-items/{category_id}/{brand_id}', 'HomeController@getBrandItems');
});


/** ADMIN PAGE */
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::get('/edit/item/{id}', 'AdminController@editItem')->name('admin.item.edit');
    Route::post('/update/item/{id}', 'AdminController@updateItem')->name('admin.item.update');
    Route::get('/create/item', 'AdminController@createItem')->name('admin.item.create');
    Route::get('/create/brand', 'AdminController@createBrand')->name('admin.brand.create');
    Route::get('/create/category','AdminController@createCategory')->name('admin.category.create');
    Route::post('/store/item', 'AdminController@storeItem')->name('admin.item.store');
    Route::post('/store/category','AdminController@storeCategory')->name('admin.category.store');
});

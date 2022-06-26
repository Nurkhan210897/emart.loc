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
Route::get('/artisan', 'ArtisanController@runCommands');

Route::get('/product/{id}','ProductController@index');
Route::get('/products/search','ProductController@search');
Route::get('/page/{id}','PageController@index');
Route::get('/basket','BasketController@index');
Route::post('/basket/add','BasketController@add');
Route::delete('/basket/delete','BasketController@delete');

Route::post('/order/handle','OrderController@handle');
Route::post('calls', 'CallController@handle');

Route::get('/', 'IndexController@index');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

//
Route::get('/{slug}', 'CategoryController@index');
Route::get('/{categorySlug}/{productSlug}','ProductController@index');
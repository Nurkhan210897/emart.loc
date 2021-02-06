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

Route::get('/category/{id}', 'CategoryController@index');
Route::get('/sub-category/{id}', 'SubCategoryController@index');
Route::get('/product/{id}','ProductController@index');

Route::get('/', 'IndexController@index');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

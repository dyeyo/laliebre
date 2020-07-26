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

Route::group([
  'prefix' => 'auth',

], function () {
  Route::post('login', 'Api\AuthController@login');
  Route::post('logout', 'Api\AuthController@logout');
  Route::post('refresh', 'Api\AuthController@refresh');
  Route::post('me', 'Api\AuthController@me');
});
  Route::get('tiendas', 'Api\StoreController@index');
  Route::post('tiendas/store', 'Api\StoreController@store');
  Route::put('tienda/update/{id}', 'Api\StoreController@update');
  Route::delete('tienda/delete/{id}', 'Api\StoreController@destroy');
  Route::get('categorias', 'Api\CategoriesController@index');



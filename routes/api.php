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
//autentificacion
Route::group([
  'prefix' => 'auth',

], function () {
  Route::post('login', 'Api\AuthController@login');
  Route::post('logout', 'Api\AuthController@logout');
  Route::post('refresh', 'Api\AuthController@refresh');
  Route::post('register', 'Api\AuthController@register');
  Route::post('me', 'Api\AuthController@me');
});



//CATEGORIAS
Route::get('/categorias', 'Api\CategoriesController@index');
Route::post('/categoria/create', 'Api\CategoriesController@store');
Route::put('/categoria/{id}', 'Api\CategoriesController@update');
Route::delete('/categoria/{id}', 'Api\CategoriesController@destroy');
//listo

//TIENEDAS
Route::get('/tiendas', 'Api\StoreController@index');
Route::post('/tienda/create', 'Api\StoreController@store');
Route::get('/tienda/editar/{id}', 'Api\StoreController@edit');
Route::put('/tienda/{id}', 'Api\StoreController@update');
Route::delete('/tienda/{id}', 'Api\StoreController@destroy');
//listo

//PRODUCTOS
Route::get('/productos', 'Api\ProductsController@index');
Route::post('/producto/create', 'Api\ProductsController@store');
Route::put('/producto/{id}', 'Api\ProductsController@update');
Route::delete('/producto/{id}', 'Api\ProductsController@destroy');
//listo

//CATEGORIAS TIENDAS
Route::get('/tipoTienda', 'Api\CategorieStoreController@index')->name('typeStore');
Route::post('/tipoTienda/create', 'Api\CategorieStoreController@store')->name('typeStore.store');
Route::put('/tipoTienda/{id}', 'Api\CategorieStoreController@update')->name('typeStore.update');
Route::delete('/tipoTienda/{id}', 'Api\CategorieStoreController@destroy')->name('typeStore.delete');
//listo

//DISTRITOS
Route::get('/distritos', 'Api\DistrictsController@index')->name('distritos');
Route::post('/distritos/create', 'Api\DistrictsController@store')->name('distritos.store');
Route::put('/distritos/{id}', 'Api\DistrictsController@update')->name('distritos.update');
Route::delete('/distritos/{id}', 'Api\DistrictsController@destroy')->name('distritos.delete');
//listo
//PASILLOS
Route::get('/pasillos', 'Api\HallwaysController@index')->name('pasillos');
Route::post('/pasillo/create', 'Api\HallwaysController@store')->name('pasillo.store');
Route::put('/pasillo/{id}', 'Api\HallwaysController@update')->name('pasillo.update');
Route::delete('/pasillo/{id}', 'Api\HallwaysController@destroy')->name('pasillo.delete');

//listo

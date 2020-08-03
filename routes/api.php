<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('/categorias/productos/{id}', 'Api\CategoriesController@categoriaProductos');
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
Route::get('/tienda/productos/{id}', 'Api\StoreController@tiendaProductos');

//listo

//PRODUCTOS
Route::get('/productos', 'Api\ProductsController@index');
Route::get('/producto/tienda/{id}', 'Api\ProductsController@productStore');
Route::post('/producto/create', 'Api\ProductsController@store');
Route::get('/producto/show/{id}', 'Api\ProductsController@show');
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
Route::post('/distrito/create', 'Api\DistrictsController@store')->name('distritos.store');
Route::put('/distrito/{id}', 'Api\DistrictsController@update')->name('distritos.update');
Route::delete('/distrito/{id}', 'Api\DistrictsController@destroy')->name('distritos.delete');
//listo

//PASILLOS
Route::get('/pasillos', 'Api\HallwaysController@index')->name('pasillos');
Route::get('/pasillo/{id}', 'Api\HallwaysController@getPasillo')->name('pasillo');
Route::post('/pasillo/create', 'Api\HallwaysController@store')->name('pasillo.store');
Route::put('/pasillo/{id}', 'Api\HallwaysController@update')->name('pasillo.update');
Route::delete('/pasillo/{id}', 'Api\HallwaysController@destroy')->name('pasillo.delete');
Route::get('/pasillos/categorias/{id}', 'Api\HallwaysController@pasillosCategoria')->name('pasillos.productos');


//RECETAS
Route::get('/recetas', 'Api\RecipesController@index')->name('recetas');
Route::get('/receta/{id}', 'Api\RecipesController@show')->name('receta');
Route::get('/receta/filtro/{type}', 'Api\RecipesController@getType');

//PROVEEDORES
Route::get('/proveedores', 'Api\ProvidersController@index');
Route::post('/proveedor/create', 'Api\ProvidersController@store');
Route::put('/proveedor/{id}', 'Api\ProvidersController@update');
Route::delete('/proveedor/{id}', 'Api\ProvidersController@destroy');

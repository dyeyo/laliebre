<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', function () {
  if (Auth::check()) {
    return view('/home');
  } else {
    return view('auth.login');
  }
});
Route::group(['middleware' => ['auth']], function () {
  Route::get('/home', 'HomeController@index')->name('home');
  Route::get('/logout',  'Auth\LoginController@logout')->name('logout');
  //PRODUCTOS
  Route::get('/productos', 'ProductsController@index')->name('products');
  Route::post('/producto/create', 'ProductsController@store')->name('product.store');
  Route::get('/producto/editar/{id}', 'ProductsController@edit')->name('product.edit');
  Route::put('/producto/{id}', 'ProductsController@update')->name('product.update');
  Route::delete('/producto/{id}', 'ProductsController@destroy')->name('product.delete');

  /*AJAX*/ Route::get('productos/recetas', 'ProductsController@indexByRecipe');
  /*AJAX*/ Route::get('producto/receta/{id}', 'ProductsController@showByRecipe');

  //CATEGORIAS
  Route::get('/categorias', 'CategoriesController@index')->name('categories');
  Route::post('/categoria/create', 'CategoriesController@store')->name('category.store');
  Route::get('/categoria/editar/{id}', 'CategoriesController@edit')->name('category.edit');
  Route::put('/categoria/{id}', 'CategoriesController@update')->name('category.update');
  Route::delete('/categoria/{id}', 'CategoriesController@destroy')->name('category.delete');

  //TIENEDAS
  Route::get('/tiendas', 'StoreController@index')->name('stores');
  Route::post('/tienda/create', 'StoreController@store')->name('store.store');
  Route::get('/tienda/editar/{id}', 'StoreController@edit')->name('store.edit');
  Route::put('/tienda/{id}', 'StoreController@update')->name('store.update');
  Route::delete('/tienda/{id}', 'StoreController@destroy')->name('store.delete');

  //CATEGORIAS TIENDAS
  Route::get('/tipoTienda', 'CategorieStoreController@index')->name('typeStore');
  Route::post('/tipoTienda/create', 'CategorieStoreController@store')->name('typeStore.store');
  Route::get('/tipoTienda/editar/{id}', 'CategorieStoreController@edit')->name('typeStore.edit');
  Route::put('/tipoTienda/{id}', 'CategorieStoreController@update')->name('typeStore.update');
  Route::delete('/tipoTienda/{id}', 'CategorieStoreController@destroy')->name('typeStore.delete');

  //DISTRITOS
  Route::get('/distritos', 'DistrictsController@index')->name('distritos');
  Route::post('/distritos/create', 'DistrictsController@store')->name('distritos.store');
  Route::get('/distritos/editar/{id}', 'DistrictsController@edit')->name('distritos.edit');
  Route::put('/distritos/{id}', 'DistrictsController@update')->name('distritos.update');
  Route::delete('/distritos/{id}', 'DistrictsController@destroy')->name('distritos.delete');

  //PASILLOS
  Route::get('/pasillos', 'HallwaysController@index')->name('pasillos');
  Route::post('/pasillo/create', 'HallwaysController@store')->name('pasillo.store');
  Route::get('/pasillo/editar/{id}', 'HallwaysController@edit')->name('pasillo.edit');
  Route::put('/pasillo/{id}', 'HallwaysController@update')->name('pasillo.update');
  Route::delete('/pasillo/{id}', 'HallwaysController@destroy')->name('pasillo.delete');

  //RECETAS
  Route::get('/recetas', 'RecitesController@index')->name('recetas');
  Route::get('/recetas/show/{id}', 'RecitesController@show')->name('receta.show');
  Route::post('/recetas/create', 'RecitesController@store')->name('receta.store');
  Route::get('/recetas/editar/{id}', 'RecitesController@edit')->name('receta.edit');
  Route::put('/recetas/{id}', 'RecitesController@update')->name('receta.update');
  Route::delete('/recetas/{id}', 'RecitesController@destroy')->name('receta.delete');

  /*AJAX*/ Route::get('recetas/productos/{id}', 'RecitesController@indexWithProducts');
});


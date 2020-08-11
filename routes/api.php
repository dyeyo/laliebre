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

//TIENEDAS
Route::get('/tiendas', 'Api\StoreController@index');
Route::post('/tienda/create', 'Api\StoreController@store');
Route::get('/tienda/detalle/{id}', 'Api\StoreController@show');
Route::put('/tienda/{id}', 'Api\StoreController@update');
Route::delete('/tienda/{id}', 'Api\StoreController@destroy');
Route::get('/tienda/productos/{id}', 'Api\StoreController@tiendaProductos');

//PRODUCTOS
Route::get('/productos', 'Api\ProductsController@index');
Route::get('/producto/tienda/{id}', 'Api\ProductsController@productStore');
Route::post('/producto/create', 'Api\ProductsController@store');
Route::get('/producto/show/{id}', 'Api\ProductsController@show');
Route::put('/producto/{id}', 'Api\ProductsController@update');
Route::delete('/producto/{id}', 'Api\ProductsController@destroy');

//CATEGORIAS TIENDAS
Route::get('/tipoTienda', 'Api\CategorieStoreController@index')->name('typeStore');
Route::get('/tipoTienda/tienda/{id}', 'Api\CategorieStoreController@asociatisStores');
Route::post('/tipoTienda/create', 'Api\CategorieStoreController@store')->name('typeStore.store');
Route::put('/tipoTienda/{id}', 'Api\CategorieStoreController@update')->name('typeStore.update');
Route::delete('/tipoTienda/{id}', 'Api\CategorieStoreController@destroy')->name('typeStore.delete');

//DISTRITOS
Route::get('/distritos', 'Api\DistrictsController@index')->name('distritos');
Route::post('/distrito/create', 'Api\DistrictsController@store')->name('distritos.store');
Route::put('/distrito/{id}', 'Api\DistrictsController@update')->name('distritos.update');
Route::delete('/distrito/{id}', 'Api\DistrictsController@destroy')->name('distritos.delete');

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

//CARITO DE COMPRAS
Route::get('/mi_carrito/{id}', 'Api\ShopingCartController@getShopingCart');
Route::get('/mi_carrito/historial/{id}', 'Api\ShopingCartController@shoppingCartConfirmed');
Route::put('/mi_carrito/confirmar/{id}', 'Api\ShopingCartController@confirmCartRecipe');
Route::post('/carrito_compras/add', 'Api\ShopingCartController@addRecipe');
Route::delete('/quitar_receta_carrito/{id}', 'Api\ShopingCartController@removeShopingCart');

//CARRITO DE COMPRAS PATA PRODUCTOS
Route::get('/mi_carrito_productos/{id}', 'Api\ShopingCartController@shoppingCartProd');
Route::get('/mi_carrito_productos/historial/{id}', 'Api\ShopingCartController@shoppingCartProdConfirmed');
Route::put('/mi_carrito_productos/confirmar/{id}', 'Api\ShopingCartController@confirmCartProd');
Route::post('/pedido_productos/add', 'Api\ShopingCartController@addShoppingCartProd');
Route::delete('/quitar_producto_carrito/{id}', 'Api\ShopingCartController@removeShopingCartProd');

Route::get('mi_perfil/{id}', 'Api\UsersController@show');
Route::put('usuario/actualiza/{id}', 'Api\UsersController@update');

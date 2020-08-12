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
  /*AJAX*/
  Route::get('productos/recetas', 'ProductsController@indexByRecipe');

  Route::get('/tienda/editar/{id}', 'StoreController@edit')->name('store.edit');
  Route::put('/tienda/{id}', 'StoreController@update')->name('store.update');

  //ESTA RUTA ES DEL CARRITO DE COMPRAS PARA RECETAS
  Route::get('/pedidos_recetas', 'ShopingCartController@index')->name('shopping_cart');
  Route::get('/pedido/{id}', 'ShopingCartController@show')->name('shopping_cart.show');
  Route::put('/carrito_compras/{id}', 'ShopingCartController@changeState')->name('shopping_carts.update');

  //ESTA RUTA ES DEL CARRITO DE COMPRAS PARA PRODUCTOS
  Route::get('/pedidos_productos', 'ShopingCartProductosController@index')->name('shopping_cart_prod');
  Route::get('/pedido/{id}', 'ShopingCartProductosController@show')->name('shopping_cart_prod.show');
  Route::put('/carrito_compras_producto/{id}', 'ShopingCartProductosController@changeState')->name('shopping_cart_prod.update');
  Route::put('/carrito_compras_producto/admin/{id}', 'ShopingCartProductosController@changeStateAdmin')->name('shopping_cart_prod_admin.update');
  Route::put('/carrito_compras_producto_general/admin/{id}', 'ShopingCartProductosController@changeStateGeneral')->name('shopping_cart_prod_general.update');

  Route::get('/mis_pedidos_productos', 'ShopingCartProductosController@pedidosStore')->name('mi_shopping_cart_prod');


  Route::group(['middleware' => 'admin'], function () {

    //CATEGORIAS
    Route::get('/categorias', 'CategoriesController@index')->name('categories');
    Route::post('/categoria/create', 'CategoriesController@store')->name('category.store');
    Route::get('/categoria/editar/{id}', 'CategoriesController@edit')->name('category.edit');
    Route::put('/categoria/{id}', 'CategoriesController@update')->name('category.update');
    Route::delete('/categoria/{id}', 'CategoriesController@destroy')->name('category.delete');

    //TIENEDAS
    Route::get('/tiendas', 'StoreController@index')->name('stores');
    Route::post('/tienda/create', 'StoreController@store')->name('store.store');
    Route::delete('/tienda/{id}', 'StoreController@destroy')->name('store.delete');
    Route::delete('/tienda/distrito/{id}', 'StoreController@destroyDistrito')->name('distrito_store.delete');

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

    Route::get('/producto/{id}', 'RecitesController@getDataProduct')->name('infoProductos');
    Route::get('/productos/tienda/{id}', 'RecitesController@getDataProductTienda')->name('productosTienda');

    //INGREDIENTES
    Route::delete('/recetas/ingrediente/{id}', 'RecitesController@destroyIngredients')->name('ingrediente.delete');

    //PROVEEDORES
    Route::get('/proveedores', 'ProvidersController@index')->name('proveedores');
    Route::post('/proveedores/create', 'ProvidersController@store')->name('proveedor.store');
    Route::get('/proveedores/editar/{id}', 'ProvidersController@edit')->name('proveedor.edit');
    Route::put('/proveedores/{id}', 'ProvidersController@update')->name('proveedor.update');
    Route::delete('/proveedores/{id}', 'ProvidersController@destroy')->name('proveedor.delete');

    //USUARIOS
    Route::get('/usuarios', 'UsersController@index')->name('usuarios');
    Route::post('/usuario/create', 'UsersController@store')->name('usuario.store');
    Route::get('/usuario/editar/{id}', 'UsersController@edit')->name('usuario.edit');
    Route::put('/usuario/{id}', 'UsersController@update')->name('usuario.update');
    Route::delete('/usuario/{id}', 'UsersController@destroy')->name('usuario.delete');

    /*AJAX*/
    Route::get('recetas/productos/{id}', 'RecitesController@indexWithProducts');
  });

  Route::group(['middleware' => 'store'], function () {
    //TIENEDAS
  });
});

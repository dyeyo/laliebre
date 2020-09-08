<?php

namespace App\Http\Controllers;

use App\ShoppingCardProducts;
use App\ShoppingCart;
use Illuminate\Http\Request;

class VentasController extends Controller
{
  public function index()
  {
    $ventasProd = ShoppingCardProducts::with('productos.stores', 'user')->where('state', 1)->get();
    $ventasRecipes = ShoppingCart::with('recetas.productos.sotre', 'user')->where('state', 1)->get();
    /*$topProd = ShoppingCardProducts::whereHas('productos', function ($query) {
      return $query->where('stores.user_id', auth()->user()->id);
    })->get();*/
    $topProd = ShoppingCardProducts::with('productos')->orderBy('product_id', 'DESC')->take(10)->get();
    return view('ventas.index', compact('ventasProd', 'ventasRecipes', 'topProd'));
  }
}

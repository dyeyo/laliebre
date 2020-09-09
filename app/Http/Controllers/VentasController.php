<?php

namespace App\Http\Controllers;

use App\ShoppingCardProducts;
use App\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentasController extends Controller
{
  public function index()
  {
    $ventasProd = ShoppingCardProducts::with('productos.stores', 'user')->where('state', 1)->get();
    $ventasRecipes = ShoppingCart::with('recetas.productos.sotre', 'user')->where('state', 1)->get();

    //$topProd = ShoppingCardProducts::with('productos')->orderBy('product_id', 'DESC')->take(10)->get();
    $topProd = DB::table('shopping_card_products')
      ->select(
        'shopping_card_products.id',
        'shopping_card_products.quantity',
        'shopping_card_products.product_id',
        'products_recipes.id as idProducto',
        'products_recipes.name',
        'products_recipes.image',
        'products_recipes.code',
      )
      ->join('products_recipes', 'shopping_card_products.product_id', '=', 'products_recipes.id')
      ->where('shopping_card_products.quantity', '>', 10)
      ->get();
    return view('ventas.index', compact('ventasProd', 'ventasRecipes', 'topProd'));
  }

  public function graficaVentas()
  {

    $enero = DB::table('shopping_card_products')
      ->whereMonth('created_at', '=', 1)
      ->sum('total');
    $feb = DB::table('shopping_card_products')
      ->whereMonth('created_at', '=', 2)
      ->sum('total');
    $mar = DB::table('shopping_card_products')
      ->whereMonth('created_at', '=', 3)
      ->sum('total');
    $abril = DB::table('shopping_card_products')
      ->whereMonth('created_at', '=', 4)
      ->sum('total');
    $may = DB::table('shopping_card_products')
      ->whereMonth('created_at', '=', 5)
      ->sum('total');
    $jun = DB::table('shopping_card_products')
      ->whereMonth('created_at', '=', 6)
      ->sum('total');
    $jul = DB::table('shopping_card_products')
      ->whereMonth('created_at', '=', 7)
      ->sum('total');
    $ago = DB::table('shopping_card_products')
      ->whereMonth('created_at', '=', 8)
      ->sum('total');
    $sep = DB::table('shopping_card_products')
      ->whereMonth('created_at', '=', 9)
      ->sum('total');
    $oct = DB::table('shopping_card_products')
      ->whereMonth('created_at', '=', 10)
      ->sum('total');
    $nov = DB::table('shopping_card_products')
      ->whereMonth('created_at', '=', 11)
      ->sum('total');
    $dic = DB::table('shopping_card_products')
      ->whereMonth('created_at', '=', 12)
      ->sum('total');

    $topProd = DB::table('shopping_card_products')
      ->select(
        'shopping_card_products.id',
        'shopping_card_products.quantity',
        'shopping_card_products.product_id',
        'products_recipes.id as idProducto',
        'products_recipes.name',
      )
      ->join('products_recipes', 'shopping_card_products.product_id', '=', 'products_recipes.id')
      ->where('shopping_card_products.quantity', '>', 10)
      ->get();

    return view('ventas.graficas', compact(
      'enero',
      'feb',
      'mar',
      'abril',
      'may',
      'jun',
      'jul',
      'ago',
      'sep',
      'oct',
      'nov',
      'dic',
      'topProd'
    ));
  }
}

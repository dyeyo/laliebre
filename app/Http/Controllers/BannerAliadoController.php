<?php

namespace App\Http\Controllers;

use App\BannerAliado;

class BannerAliadoController extends Controller
{
  public function index($id)
  {
    $banners = BannerAliado::where('store_id', $id)->take(5);
    return response()->json($banners);
  }
}

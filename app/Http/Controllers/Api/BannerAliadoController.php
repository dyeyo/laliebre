<?php

namespace App\Http\Controllers\Api;

use App\BannerAliado;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannerAliadoController extends Controller
{
  public function index($id)
  {
    $banners = BannerAliado::where('store_id', $id)->take(5)->get();
    return response()->json($banners);
  }
}

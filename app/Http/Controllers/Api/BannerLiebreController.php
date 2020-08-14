<?php

namespace App\Http\Controllers\Api;

use App\BannerLiebre;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannerLiebreController extends Controller
{
  public function index()
  {
    $banners = BannerLiebre::where('store_id', 2)->take(5)->get();
    return response()->json($banners);
  }
}

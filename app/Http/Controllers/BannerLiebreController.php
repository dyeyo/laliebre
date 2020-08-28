<?php

namespace App\Http\Controllers;

use App\BannerLiebre;
use App\Stores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BannerLiebreController extends Controller
{
  public function index()
  {
    $banners = BannerLiebre::all();
    return view('banners.laliebre.index', compact('banners'));
  }

  public function store(Request $request)
  {
    $banner = new BannerLiebre();
    $store = Stores::where('user_id', auth()->user()->id)->get();
    $banner->store_id = $store[0]->id;
    if ($request->hasFile('image')) {
      $file = $request->file('image');
      $name1 = $file->getClientOriginalName();
      $file->move(public_path() . '/img/bannerLiebre/', $name1);
      $banner->image = $name1;
    }
    $banner->save();
    Session::flash('message', 'Banner creado con exito');
    return redirect()->route('bannerLiebre');
  }

  public function edit($id)
  {
    $banner = BannerLiebre::find($id);
    return view('banners.laliebre.edit', compact('banner'));
  }

  public function update($id, Request $request)
  {
    $banner = BannerLiebre::find($id);
    if ($request->hasFile('image')) {
      $file = $request->file('image');
      $name1 = $file->getClientOriginalName();
      $file->move(public_path() . '/img/bannerLiebre/', $name1);
      $banner->image = $name1;
    }
    $banner->update();
    Session::flash('message', 'Banner editar con exito');
    return redirect()->route('bannerLiebre');
  }

  public function destroy($id)
  {
    BannerLiebre::find($id)->delete();
    Session::flash('message', 'Banner eliminado con exito');
    return redirect()->route('bannerLiebre');
  }
}

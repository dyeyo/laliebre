<?php

namespace App\Http\Controllers;

use App\BannerAliado;
use App\Stores;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class BannerAliadoController extends Controller
{
  public function index()
  {
    $idTienda = Stores::select('id')->where('user_id', Auth::user()->id)->get();
    // dd($idTienda[0]->id);
    $d =  (int)($idTienda[0]->id);
    $banners = BannerAliado::where('store_id',$d)->get();
    // dd($banners);
    return view('banners.aliado.index', compact('banners'));
  }

  public function store(Request $request)
  {
    $banner = new BannerAliado();
    $store = Stores::where('user_id', auth()->user()->id)->get();
    $banner->store_id = $store[0]->id;
    if ($request->hasFile('image')) {
      $file = $request->file('image');
      $name1 = $file->getClientOriginalName();
      $file->move(public_path() . '/img/bannerAliado/', $name1);
      $banner->image = $name1;
    }
    $banner->save();
    Session::flash('message', 'Banner creado con exito');
    return redirect()->route('bannerAliado');
  }

  public function edit($id)
  {
    $banner = BannerAliado::find($id);
    return view('banners.aliado.edit', compact('banner'));
  }

  public function update($id, Request $request)
  {
    $banner = BannerAliado::find($id);
    if ($request->hasFile('image')) {
      $file = $request->file('image');
      $name1 = $file->getClientOriginalName();
      $file->move(public_path() . '/img/bannerAliado/', $name1);
      $banner->image = $name1;
    }
    $banner->update();
    Session::flash('message', 'Banner editar con exito');
    return redirect()->route('bannerAliado');
  }

  public function destroy($id)
  {
    BannerAliado::find($id)->delete();
    Session::flash('message', 'Banner eliminado con exito');
    return redirect()->route('bannerAliado');
  }
}

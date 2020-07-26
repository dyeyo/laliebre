<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecitesController extends Controller
{
  public function index()
  {

    return view('recites.index');
  }

   public function show($id)
  {

    return view('recites.show');
  }

  public function store(Request $request)
  {

  }

  public function edit(Request $request, $id)
  {

  }

  public function update(Request $request, $id)
  {

  }

  public function destroy($id)
  {

  }
}

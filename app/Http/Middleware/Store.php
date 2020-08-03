<?php

namespace App\Http\Middleware;

use Closure;

class Store
{
  public function handle($request, Closure $next)
  {
    if (auth()->check() && auth()->user()->role_id == 2)
      return $next($request);
    return redirect('/');
  }
}

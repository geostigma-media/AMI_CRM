<?php

namespace App\Http\Middleware;

use Closure;

class AsesorMiddleware
{

  public function handle($request, Closure $next)
  {
    if (auth()->check() && auth()->user()->role == 2){
      return $next($request);
    }
    return redirect('/home');
  }
}

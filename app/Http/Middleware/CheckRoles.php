<?php

namespace App\Http\Middleware;

use Closure;

class CheckRoles
{
  /**
   * Handle an incoming request
   * 
   * @param \Illuminate\Http\Request $request
   * @param \Closure
   * @return mixed
   */
  public function handle($request, Closure $next, $roles)
  {
    $listRoles = explode ("|", $roles);
    if (!in_array($request->session()->get('roles'), $listRoles)) {
      abort(401, 'This action is unauthorized.');
    }
    return $next($request);
  }
}

<?php

namespace App\Http\Middleware;

use App\Models\MySql\Logger;
use Spatie\HttpLogger\LogProfile;
use Closure;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class authBasic
{
  protected $logProfile;

  public function __construct(LogProfile $logProfile)
  {
    $this->logProfile = $logProfile;
  }
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {
      if (!Auth::check()) {
          if ($request->ajax()) {
            return response()->json([
              'status'   => false,
              'response' => '401 Unautorized'
            ], 401);
          } else {
            return redirect('login');
          }
        }
    
        if ($this->logProfile->shouldLogRequest($request)) {
          $method = strtoupper($request->getMethod());
          $uri = $request->getPathInfo();
          $bodyAsJson = json_encode($request->except(config('http-logger.except')));
          $users = Auth::user();
          Logger::insert([
            'users'      => [
              'users_id' => $users->id,
              'nama'     => $users->nama
            ],
            'method' => $method,
            'uri'    => $uri,
            'body'   => $bodyAsJson,
            'time'   => Carbon::now()
          ]);
        }
      return $next($request);
  }
}

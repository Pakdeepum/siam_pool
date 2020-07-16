<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class Signin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->session()->has('_signin')) {

                return $next($request);
        }else {
          $request->session()->put('paymentOldPath', $request->path());

        }
        return redirect('/');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

class CustomerAuthenticate
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
        //jika bukan auth dengan guard Customer di perikasa
        if(!auth()->guard('customer')->check()){
            //kembalikan ke halaman dengan Route Customer.loginForm
            return redirect(route('customer.loginForm'));
        }
        return $next($request);
    }
}

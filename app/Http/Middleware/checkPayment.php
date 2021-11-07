<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkPayment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ( !auth()->user()->iscompany){
            return redirect()->route('checkout.show');
        }

        return $next($request);
    }
}

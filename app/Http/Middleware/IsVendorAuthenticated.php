<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
class IsVendorAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $reverse = null): Response
    {
        if ($reverse === 'reverse') {
            if(\Auth::guard('vendor')->check()){
                return redirect('/');
            }
        }else{
            if(!\Auth::guard('vendor')->check()){
                return redirect()->route('homepage')->with('error', 'Kindly login to access this page!');
            }
        }
        return $next($request);
    }
}

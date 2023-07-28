<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class adminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response

    {
        if(auth()->check()){
        if(auth()->user()->permession=="Admin"){
            return $next($request);
        }else{
        return redirect("/")->with('error','You are not authorized to access the page.');
        }
    }else{
        return redirect("/admin/login");
 
    }


}
    
}

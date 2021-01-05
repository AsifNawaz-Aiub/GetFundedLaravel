<?php

namespace App\Http\Middleware;

use Closure;

class VerifyUser
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

        if($request->session()->get('type') == 'user'){
            return $next($request);
        }else{
            $request->session()->flash('error', 'Please login as a User  first...');
            return redirect()->route('login.index');
        }
    }
}

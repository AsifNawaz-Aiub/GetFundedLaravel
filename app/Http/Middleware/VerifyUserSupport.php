<?php

namespace App\Http\Middleware;

use Closure;

class VerifyUserSupport
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

        if($request->session()->get('type') == 'userSupport'){
            return $next($request);
        }else{
            $request->session()->flash('error', 'Please login as a User Support first...');
            return redirect()->route('login.index');
        }
    }
}

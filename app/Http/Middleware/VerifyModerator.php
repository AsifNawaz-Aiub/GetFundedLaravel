<?php

namespace App\Http\Middleware;

use Closure;

class VerifyModerator
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

        if($request->session()->get('type') == 'moderator'){
            return $next($request);
        }else{
            $request->session()->flash('error', 'Please login as a Moderator first...');
            return redirect()->route('home.index');
        }
    }
}

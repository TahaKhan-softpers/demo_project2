<?php

namespace App\Http\Middleware;

use Closure;

class PostStatus
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
        //check if post has been published or not.
        if($request->status==1)
        return $next($request);
        else{
        return  redirect('home');
        }
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cache;



class PageCacheMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // return $next($request);
        
        $key = 'page_' . md5($request->fullUrl());

        if (Cache::has($key)) {
            return response(Cache::get($key));
        }

        $response = $next($request);

        // Cache the page for a specified duration (e.g., 60 minutes)
        Cache::put($key, $response->getContent(), 60);

        return $response;
    }
    
}

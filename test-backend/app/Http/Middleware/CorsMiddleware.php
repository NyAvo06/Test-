<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $headers = [
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Headers' => 'Origin, X-Requested-With, Content-Type, Accept',
        ];

        if ($request->getMethod() === 'OPTIONS') {
            // The client is requesting CORS headers
            return response(null, 200, $headers);
        }

        // Continue processing the request
        $response = $next($request);
        foreach ($headers as $name => $value) {
            $response->header($name, $value);
        }
        return $next($request);
    }
}

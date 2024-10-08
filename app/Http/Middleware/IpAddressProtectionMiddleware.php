<?php

namespace App\Http\Middleware;

use Closure;

class IpAddressProtectionMiddleware
{


    protected $allowedIPs = [
        '',
        'http://test.localhost:8000',
        'http://localhost:5173',
        'https://channel20-suyel.netlify.app',
        'https://channeltwenty.com',
        'https://www.channeltwenty.com',
        'https://panchagarh24.com',
        'https://www.panchagarh24.com',        
        'https://test.panchagarh24.com',
        'https://www.test.panchagarh24.com',
        'https://news-sys.netlify.app',






    ];


    public function handle($request, Closure $next)
    {
       $requestIP = $request->header('Origin');
        if (!in_array($requestIP, $this->allowedIPs)) {
            return response()->json([
                'message' => 'Access denied. Your IP is not allowed.',
            ], 403);
        }

        return $next($request);
    }
}

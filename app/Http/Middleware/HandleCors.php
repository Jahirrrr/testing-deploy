<?php

namespace App\Http\Middleware;

use Closure;

class HandleCors
{
    public function handle($request, Closure $next)
    {
        // Tangani preflight request OPTIONS
        if ($request->getMethod() === 'OPTIONS') {
            return response()->json('', 204)
                ->header('Access-Control-Allow-Origin', 'http://localhost:5173') // Sesuaikan origin
                ->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE')
                ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With')
                ->header('Access-Control-Allow-Credentials', 'true');
        }

        // Lanjutkan request normal
        $response = $next($request);

        // Tambahkan header CORS ke response
        return $response
            ->header('Access-Control-Allow-Origin', 'http://localhost:5173') // Sesuaikan origin
            ->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE')
            ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With')
            ->header('Access-Control-Allow-Credentials', 'true'); // Ini penting
    }
}
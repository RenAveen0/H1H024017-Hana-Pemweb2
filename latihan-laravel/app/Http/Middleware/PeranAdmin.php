<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PeranAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Periksa apakah user sudah login dan apakah perannya adalah admin
        if (! $request->user() || $request->user()->peran !== 'admin') {
            return response()->json([
                'sukses' => false,
                'pesan' => 'Akses ditolak. Khusus Administrator.',
            ], 403);
        }

        return $next($request);
    }
}
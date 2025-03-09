<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user() || $request->user()->role_id != 1) { // 1 là quyền admin
            return response()->json(['error' => 'Unauthorized'], 403);
        }
        return $next($request);
    }
}

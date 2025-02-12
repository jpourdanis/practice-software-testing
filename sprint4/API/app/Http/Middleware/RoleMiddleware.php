<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Run the request filter.
     *
     * @param Request $request
     * @param Closure $next
     * @param string $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
//        dd(strcmp($request->user()->role, $role));
//        dd($request);
        if ($request->user() === null) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
        if (strcmp($request->user()->role, $role) !== 0) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
        return $next($request);
    }
}

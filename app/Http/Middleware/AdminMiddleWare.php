<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleWare
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user(); // same as auth()->user()

        // If not logged in => block
        if (!$user) {
            abort(403);
        }

        // Only allow the admin email
        if ($user->email !== config('admin.email')) {
            abort(403);
        }

        return $next($request);
    }
}

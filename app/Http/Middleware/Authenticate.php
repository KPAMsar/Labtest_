<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (empty($guards)) {
            $guards = ['web'];
        }

        if ($this->auth->guard($guards[0])->guest()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
    }
}

<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo($request): ?string
    {
        // API request असल्यास redirect नको
        if ($request->expectsJson()) {
            return null;
        }

        return null;
    }
}

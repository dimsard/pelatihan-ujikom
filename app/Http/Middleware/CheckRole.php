<?php

// App/Http/Middleware/CheckRole.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        $user = auth()->user();
        $userRole = null;

        if ($user->isCustomer()) {
            $userRole = 'customer';
        } elseif ($user->isSales()) {
            $userRole = 'sales';
        } elseif ($user->isOfficer()) {
            $userRole = 'officer';
        }

        if (!in_array($userRole, $roles)) {
            abort(403, 'Unauthorized access.');
        }

        return $next($request);
    }
}

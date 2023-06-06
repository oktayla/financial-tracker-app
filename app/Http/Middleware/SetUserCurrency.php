<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetUserCurrency
{
    /**
     * Set user currency.
     *
     * @param Request $request
     * @param Closure(Request): (Response) $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            currency()->setUserCurrency(auth()->user()->currency);
        }

        return $next($request);
    }
}

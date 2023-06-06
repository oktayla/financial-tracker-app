<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseBuilder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CurrencyController extends Controller
{
    /**
     * Get active currencies
     *
     * @return JsonResponse
     */
    public function activeCurrencies(): JsonResponse
    {
        return ResponseBuilder::ok([
            'success' => true,
            'result' => Arr::map(array_values(currency()->getActiveCurrencies()),
                fn($currency) => Arr::only($currency, ['name', 'code'])),
        ]);
    }
}

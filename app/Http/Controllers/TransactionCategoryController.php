<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseBuilder;
use App\Http\Resources\TransactionCategoryResource;
use App\Models\TransactionCategory;
use App\Services\TransactionCategoryService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class TransactionCategoryController extends Controller
{
    public function __construct(
        public TransactionCategoryService $transactionCategoryService
    ) {
    }

    /**
     * Get all transaction categories.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $transactionCategories = $this->transactionCategoryService->getAll();

        return ResponseBuilder::ok(
            TransactionCategoryResource::collection($transactionCategories)
        );
    }
}

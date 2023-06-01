<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseBuilder;
use App\Http\Requests\TransactionRequest;
use App\Http\Resources\TransactionResource;
use App\Services\TransactionService;
use Illuminate\Http\JsonResponse;

class TransactionController extends Controller
{
    public function __construct(
        public TransactionService $transactionService
    ) {
    }

    public function store(
        TransactionRequest $request
    ): JsonResponse {
        $transaction = $this->transactionService
            ->create($request->validated());

        return ResponseBuilder::created(
            TransactionResource::make($transaction)
        );
    }

    public function update(
        TransactionRequest $request,
        int $id
    ): JsonResponse {
        $transaction = $this->transactionService
            ->update($id, $request->validated());

        return ResponseBuilder::ok(
            TransactionResource::make($transaction)
        );
    }

    public function destroy(int $id): JsonResponse
    {
        $this->transactionService->delete($id);

        return ResponseBuilder::noContent();
    }
}

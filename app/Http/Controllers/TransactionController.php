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

    /**
     * Get all transactions by user.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $transactions = $this->transactionService->getAllByUser();

        return ResponseBuilder::ok(
            TransactionResource::collection($transactions)
        );
    }

    /**
     * Store a newly created transaction in storage.
     *
     * @param TransactionRequest $request
     * @return JsonResponse
     */
    public function store(
        TransactionRequest $request
    ): JsonResponse {
        $transaction = $this->transactionService
            ->create($request->validated());

        return ResponseBuilder::created(
            TransactionResource::make($transaction)
        );
    }

    /**
     * Update the specified transaction in storage.
     *
     * @param TransactionRequest $request
     * @param int $id
     * @return JsonResponse
     */
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

    /**
     * Remove the specified transaction from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $this->transactionService->delete($id);

        return ResponseBuilder::noContent();
    }
}

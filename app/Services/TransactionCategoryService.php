<?php

namespace App\Services;

use App\Contracts\TransactionCategoryRepositoryContract;

class TransactionCategoryService
{
    public function __construct(
        public TransactionCategoryRepositoryContract $transactionCategoryRepository
    ) {
    }

    public function getAll()
    {
        return $this->transactionCategoryRepository->getAll();
    }
}

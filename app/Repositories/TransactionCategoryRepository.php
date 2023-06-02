<?php

namespace App\Repositories;

use App\Contracts\TransactionCategoryRepositoryContract;
use App\Models\TransactionCategory;

class TransactionCategoryRepository implements TransactionCategoryRepositoryContract
{
    public function __construct(
        public TransactionCategory $transactionCategory
    ) {
    }

    public function getAll()
    {
        return $this->transactionCategory->get();
    }
}

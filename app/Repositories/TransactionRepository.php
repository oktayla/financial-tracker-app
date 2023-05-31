<?php

namespace App\Repositories;

use App\Contracts\TransactionRepositoryContract;
use App\Models\Transaction;

class TransactionRepository implements TransactionRepositoryContract
{
    public function __construct(
        public Transaction $transaction
    ) {
    }

    public function getAll()
    {
        return $this->transaction->get();
    }

    public function getById(int $id)
    {
        return $this->transaction->find($id);
    }

    public function create(array $data)
    {
        return $this->transaction->create($data);
    }

    public function update(int $id, array $data)
    {
        $transaction = $this->getById($id);
        $transaction->update($data);
        return $transaction;
    }

    public function delete(int $id)
    {
        return $this->getById($id)->delete();
    }
}

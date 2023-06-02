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

    public function getAllByUser(int $userId)
    {
        return $this->transaction
            ->where('user_id', $userId)
            ->orderByDesc('created_at')
            ->get();
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

        return tap($transaction)->update($data);
    }

    public function delete(int $id)
    {
        return $this->getById($id)->delete();
    }
}

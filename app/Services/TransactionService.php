<?php

namespace App\Services;

use App\Contracts\TransactionRepositoryContract;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Collection;

class TransactionService
{
    public function __construct(
        public TransactionRepositoryContract $transactionRepository
    ) {
    }

    /**
     * Get all transactions.
     *
     * @return Collection<Transaction>
     */
    public function getAll(): Collection
    {
        return $this->transactionRepository->getAll();
    }

    /**
     * Get all transactions by user.
     *
     * @param int|null $userId
     * @return Collection<Transaction>
     */
    public function  getAllByUser(?int $userId = null): Collection
    {
        $userId ??= auth()->id();
        return $this->transactionRepository->getAllByUser($userId);
    }

    /**
     * Get transaction by id.
     *
     * @param int $id
     * @return Transaction|null
     */
    public function getById(int $id): ?Transaction
    {
        return $this->transactionRepository->getById($id);
    }

    /**
     * Create transaction.
     *
     * @param array $data
     * @return Transaction
     */
    public function create(array $data): Transaction
    {
        $data['user_id'] = auth()->id();

        return $this->transactionRepository->create($data);
    }

    /**
     * Update transaction.
     *
     * @param int $id
     * @param array $data
     * @return Transaction
     */
    public function update(int $id, array $data): Transaction
    {
        return $this->transactionRepository->update($id, $data);
    }

    /**
     * Delete transaction.
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        if ($this->getById($id)) {
            return $this->transactionRepository->delete($id);
        }

        return false;
    }

    /**
     * Filter transactions by date range.
     *
     * @param array $data
     * @return Collection<Transaction>
     */
    public function filterByDate(array $data): Collection
    {
        return $this->transactionRepository->filterByDate($data);
    }
}

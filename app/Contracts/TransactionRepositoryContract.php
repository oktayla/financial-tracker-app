<?php

namespace App\Contracts;

interface TransactionRepositoryContract
{
    public function getAll();
    public function getAllByUser(int $userId);
    public function getById(int $id);
    public function create(array $data);
    public function update(int $id, array $data);
    public function delete(int $id);
}

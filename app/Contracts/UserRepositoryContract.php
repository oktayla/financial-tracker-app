<?php

namespace App\Contracts;

interface UserRepositoryContract
{
    public function getById(int $id);
    public function getByEmail(string $email);
    public function create(array $data);
    public function update(int $id, array $data);
}

<?php

namespace App\Repositories;

use App\Contracts\UserRepositoryContract;
use App\Models\User;

class UserRepository implements UserRepositoryContract
{
    public function __construct(
        public User $user
    ) {
    }

    public function getById(int $id)
    {
        return $this->user->find($id);
    }

    public function getByEmail(string $email)
    {
        return $this->user->where('email', $email)->first();
    }

    public function create(array $data)
    {
        return $this->user->create($data);
    }

    public function update(int $id, array $data)
    {
        $user = $this->getById($id);

        return tap($user)->update($data);
    }
}

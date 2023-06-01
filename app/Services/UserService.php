<?php

namespace App\Services;

use App\Contracts\UserRepositoryContract;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function __construct(
        public UserRepositoryContract $userRepository
    ) {
    }

    /**
     * Get user by id.
     *
     * @param int $id
     * @return User|null
     */
    public function getById(int $id): ?User
    {
        return $this->userRepository->getById($id);
    }

    /**
     * Get user by email.
     *
     * @param string $email
     * @return User|null
     */
    public function getByEmail(string $email): ?User
    {
        return $this->userRepository->getByEmail($email);
    }

    /**
     * Check user credentials.
     *
     * @param array $data
     * @return bool
     */
    public function checkCredentials(array $data): bool
    {
        $user = $this->getByEmail($data['email']);

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return false;
        }

        return true;
    }

    /**
     * Create a new user.
     *
     * @param array $data
     * @return User
     */
    public function create(array $data): User
    {
        $data['password'] = bcrypt($data['password']);

        return $this->userRepository->create($data);
    }

    /**
     * Update user by id.
     *
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function update(int $id, array $data): User
    {
        $user = $this->getById($id);

        return tap($user)->update($id, $data);
    }
}

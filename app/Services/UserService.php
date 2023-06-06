<?php

namespace App\Services;

use App\Contracts\UserRepositoryContract;
use App\Enums\TransactionStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use InvalidArgumentException;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

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

    /**
     * Overview of the user.
     *
     * @param int|null $id
     * @return array
     */
    public function getOverview(int|null $id = null): array
    {
        $user = $id ? $this->getById($id) : auth()->user();
        $transactions = $user->transactions()->get();

        $totalIncome = $transactions->where('type', TransactionStatus::Income)->sum('amount');
        $totalExpense = $transactions->where('type', TransactionStatus::Expense)->sum('amount');
        $totalBalance = $totalIncome - $totalExpense;

        $fromCurrency = currency()->getUserCurrency();
        $toCurrency = request('currency', $fromCurrency);

        if (!currency()->hasCurrency($toCurrency)) {
            $toCurrency = $fromCurrency;
        }

        $totalIncome = currency($totalIncome, $fromCurrency, $toCurrency, false);
        $totalExpense = currency($totalExpense, $fromCurrency, $toCurrency, false);
        $totalBalance = currency($totalBalance, $fromCurrency, $toCurrency, false);

        return [
            'total_income' => $totalIncome,
            'total_expense' => $totalExpense,
            'total_balance' => $totalBalance,
            'currency' => $toCurrency,
        ];
    }
}

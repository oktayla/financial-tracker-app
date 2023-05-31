<?php

namespace Database\Seeders;

use App\Models\TransactionCategory;
use Illuminate\Database\Seeder;

class TransactionCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->predefinedCategories() as $category) {
            TransactionCategory::query()->create($category);
        }
    }

    protected function predefinedCategories(): array
    {
        return [
            [
                'name' => 'Food',
                'description' => 'Food and drinks',
                'type' => 'expense',
            ],
            [
                'name' => 'Salary',
                'description' => 'Salary',
                'type' => 'income',
            ],
            [
                'name' => 'Other',
                'description' => 'Other',
                'type' => 'income',
            ],
            [
                'name' => 'Transport',
                'description' => 'Transportation',
                'type' => 'expense',
            ],
            [
                'name' => 'Entertainment',
                'description' => 'Entertainment',
                'type' => 'expense',
            ],
            [
                'name' => 'Shopping',
                'description' => 'Shopping',
                'type' => 'expense',
            ],
            [
                'name' => 'Health',
                'description' => 'Health',
                'type' => 'expense',
            ],
            [
                'name' => 'Investment',
                'description' => 'Investment',
                'type' => 'expense',
            ],
            [
                'name' => 'Gift',
                'description' => 'Gift',
                'type' => 'expense',
            ],
            [
                'name' => 'Other',
                'description' => 'Other',
                'type' => 'expense',
            ],
        ];
    }
}

<?php

namespace App\Providers;

use App\Contracts\TransactionCategoryRepositoryContract;
use App\Contracts\TransactionRepositoryContract;
use App\Contracts\UserRepositoryContract;
use App\Repositories\TransactionCategoryRepository;
use App\Repositories\TransactionRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            TransactionRepositoryContract::class,
            TransactionRepository::class
        );
        $this->app->bind(
            UserRepositoryContract::class,
            UserRepository::class
        );
        $this->app->bind(
            TransactionCategoryRepositoryContract::class,
            TransactionCategoryRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

<?php

namespace App\Providers;

use Domain\Bank\Accounts\Domain\AccountRepository;
use Domain\Bank\Accounts\Infrastructure\AccountRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AccountRepository::class, AccountRepositoryEloquent::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

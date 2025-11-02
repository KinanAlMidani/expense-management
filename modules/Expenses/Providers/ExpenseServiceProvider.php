<?php

namespace Modules\Expenses\Providers;

use Illuminate\Support\ServiceProvider;

class ExpenseServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}

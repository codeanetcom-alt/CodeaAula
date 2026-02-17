<?php

namespace App\Providers;

use App\Services\Reniec\MockReniecProvider;
use App\Services\Reniec\ReniecProviderInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ReniecProviderInterface::class, MockReniecProvider::class);
    }

    public function boot(): void
    {
    }
}

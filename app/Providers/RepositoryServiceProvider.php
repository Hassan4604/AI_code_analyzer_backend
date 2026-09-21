<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\User\UserRepository;
use App\Infrastructure\Persistence\EloquentUserRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            UserRepository::class,
            EloquentUserRepository::class
        );
    }

    public function boot(): void
    {
        //
    }
}
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\User\UserRepository;
use App\Domain\CodeAnalysesRepository;
use App\Infrastructure\Persistence\EloquentUserRepository;
use App\Infrastructure\Persistence\EloquentCodeAnalysesRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            UserRepository::class,
            EloquentUserRepository::class
        );

        $this->app->bind(
            CodeAnalysesRepository::class,
            EloquentCodeAnalysesRepository::class
        );
    }

    public function boot(): void
    {
        //
    }
}
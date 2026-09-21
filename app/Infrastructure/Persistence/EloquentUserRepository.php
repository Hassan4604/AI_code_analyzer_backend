<?php

namespace App\Infrastructure\Persistence;

use App\Domain\User\UserRepository;
use App\Models\User;

class EloquentUserRepository implements UserRepository
{
    public function create(array $data): User
    {
        return User::create($data);
    }
    
    public function findByEmail(string $email): User
    {
        return User::where('email', $email)->first();
    }
}


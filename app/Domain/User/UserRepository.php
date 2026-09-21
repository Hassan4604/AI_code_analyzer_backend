<?php

namespace App\Domain\User;

use App\Models\User;

interface UserRepository
{
    public function create(array $data): User;
}
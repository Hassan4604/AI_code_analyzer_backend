<?php

namespace App\Applications\Auth;

use App\Domain\User\UserRepository;
use Illuminate\Support\Facades\Hash;

class RegisterCase
{
    public function __construct(
        private UserRepository $userRepository
    ) {
    }

    public function execute(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        return $this->userRepository->create($data);
    }
}

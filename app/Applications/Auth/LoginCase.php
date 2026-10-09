<?php

namespace App\Applications\Auth;

use App\Domain\User\UserRepository;
use Illuminate\Support\Facades\Hash;

class LoginCase
{
    public function __construct(
        private UserRepository $userRepository
    ) {
    }

    public function verify(array $data)
    {
        $user = $this->userRepository->findByEmail($data['email']);

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return [
                'message' => 'Invalid credentials',
                'status' => 401
            ];
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token,
            'status' => 200
        ];
    }
}
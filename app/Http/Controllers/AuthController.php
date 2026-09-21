<?php

namespace App\Http\Controllers;

use App\Applications\Auth\RegisterCase;
use App\Applications\Auth\LoginCase;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function register(
        RegisterRequest $request,
        RegisterCase $register
    ) {
        $user = $register->execute(
            $request->validated()
        );

        return response()->json($user);
    }

    public function login(
        LoginRequest $request,
        LoginCase $login
    ) {
        $result = $login->verify(
            $request->validated()
        );

        if (isset($result['status']) && $result['status'] !== 200) {
            return response()->json([
                'message' => $result['message']
            ], $result['status']);
        }

        return response()->json([
            'message' => 'Login successful',
            'user' => $result['user'],
            'token' => $result['token']
        ], 200);
    }
}

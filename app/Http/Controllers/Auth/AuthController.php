<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthLoginRequest;
use App\Http\Requests\Auth\AuthRegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(AuthRegisterRequest $request): Response
    {
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ]);

        return response([
            'user' => $user,
            'token' => $user->createToken('tokens')->plainTextToken,
        ], Response::HTTP_CREATED);
    }

    public function logout(): Response
    {
        auth()->user()->tokens()->delete();

        return response([
            'message' => 'Logged out',
        ], Response::HTTP_OK);
    }

    public function login(AuthLoginRequest $request): Response
    {
        $user = User::where('email', $request->get('email'))->first();

        if (!$user || !Hash::check($request->get('password'), $user->password)) {
            return response(['message' => 'Authentication failed'], Response::HTTP_UNAUTHORIZED);
        }

        return response([
            'user' => $user,
            'token' => $user->createToken('tokens')->plainTextToken,
        ], Response::HTTP_OK);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        if (Auth::attempt($request->only('email', 'password'))) {

            $user = User::where('email', $request['email'])->firstOrFail();

            $token = $user->createToken('token')->plainTextToken;

            return response()->json([
                'token' => $token,
                'token_type' => 'Bearer'
            ]);
        } else {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }
    }

    public function logout(Request $request): JsonResponse
    {
        Auth::logout();

        return response()->json([
            'message' => 'logout'
        ], 205);
    }
}

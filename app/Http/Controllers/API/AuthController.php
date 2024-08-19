<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function register(Request $request): JsonResponse
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }

        try {
            $input = $request->only(['name', 'email', 'password']);
            $input['password'] = Hash::make($input['password']);
            $user = User::create($input);
            $token = $user->createToken('LaravelPassport')->accessToken;
            return $this->sendResponse([
                'token' => $token,
                'name' => $user->name,
            ], 'User registered successfully.', 201);

        } catch (\Exception $e) {
            return $this->sendError('Registration failed.', ['error' => 'An unexpected error occurred. Please try again later.'], 500);
        }
    }

    public function login(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken('LaravelPassport')->accessToken;
            return $this->sendResponse([
                'token' => $token,
                'name' => $user->name,
            ], 'User logged in successfully.');
        } else {
            return $this->sendError('Unauthorized.', ['error' => 'Unauthorized'], 401);
        }
    }
}

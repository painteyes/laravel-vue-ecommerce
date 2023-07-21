<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource;


class AuthController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
            'remember' => 'boolean'
        ]);

        $remember = $credentials['remember'] ?? false;
        unset($credentials['remember']);

        $loginAttempt = Auth::attempt($credentials, $remember);
        if (!$loginAttempt) {
            return response([
                'message' => 'Email or passowrd is incorrect'
            ], 422);
        }

        /** @var \App\Models\User $user */
        $user = Auth::user();
        if (!$user->is_admin) {
            Auth::logout();
            return response([
                'message' => 'You don\'t have permission to authenticate as admin'
            ], 403);
        }

        $token = $user->createToken('main')->plainTextToken;

        return response([
            'user' => new UserResource($user),
            'token' => $token
        ]);
    }

    public function logout() {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->currentAccessToken()->delete();

        return response('', 204);
    }

    public function getUser(Request $request) {
        return new UserResource($request->user());
    }
}

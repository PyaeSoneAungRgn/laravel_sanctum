<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = auth()->user();
            if ($user->email == 'admin@gmail.com') {
                $token = $user->createToken('user-token', ['fruit-price:view']);
            } else {
                $token = $user->createToken('user-token', []);
            }
            return response()->json(['token' => $token->plainTextToken]);
        }
        return response()->json(
            ['message' => 'Incorrect email or password'],
            401
        );
    }
}

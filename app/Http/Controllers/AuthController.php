<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->username)
            ->orWhere('name', $request->username)
            ->first();

        // Default admin validation fallback
        if (($request->username === 'admin' && $request->password === 'admin123') ||
            ($user && Hash::check($request->password, $user->password))) {
            return response()->json([
                'status' => 'success',
                'token' => 'mock-jwt-token-timeless-admin-12345',
                'user' => [
                    'name' => 'Admin Timeless',
                    'username' => 'admin',
                    'role' => 'admin',
                ]
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Kredensial username atau password salah.'
        ], 401);
    }
}

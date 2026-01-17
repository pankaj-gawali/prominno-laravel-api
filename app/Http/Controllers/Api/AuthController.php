<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Admin Login API
     */
    public function adminLogin(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $admin = User::where('email', $request->email)
                    ->where('role', 'admin')
                    ->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        return response()->json([
            'token' => $admin->createToken('admin-token')->plainTextToken,
            'role'  => 'admin',
            'user'  => $admin
        ], 200);
    }

    /**
     * Seller Login API
     */
    public function sellerLogin(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $seller = User::where('email', $request->email)
                    ->where('role', 'seller')
                    ->first();

        if (!$seller || !Hash::check($request->password, $seller->password)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        return response()->json([
            'token' => $seller->createToken('seller-token')->plainTextToken,
            'role'  => 'seller',
            'user'  => $seller
        ], 200);
    }
}

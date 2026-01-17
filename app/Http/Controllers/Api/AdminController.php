<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Create Seller API (Admin Only)
     */
    public function createSeller(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'mobile'   => 'required|string|max:20',
            'country'  => 'required|string|max:100',
            'state'    => 'required|string|max:100',
            'skills'   => 'required|array',
            'password' => 'required|string|min:6',
        ]);

        $data['password'] = bcrypt($data['password']);
        $data['role']     = 'seller';

        User::create($data);

        return response()->json([
            'message' => 'Seller created successfully'
        ], 201);
    }

    /**
     * Seller Listing with Pagination
     */
    public function sellers()
    {
        return response()->json(
            User::where('role', 'seller')->paginate(10)
        );
    }
}

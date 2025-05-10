<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileUserController extends Controller
{


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'surname'  => 'required|string|max:255',
            'gender'     => 'required|in:male,female',
            'phone'      => 'required|string|max:20',
            'city'       => 'required|string|max:255',
        ]);

        User::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Профиль сақталды!',
        ], 201);
    }

}

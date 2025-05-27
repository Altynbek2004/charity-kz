<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileUserController extends Controller
{

    public function authUser()
    {
        $user = auth()->user();
        return response()->json($user);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'surname'  => 'string|max:255',
            'gender'     => 'in:male,female',
            'phone_number'      => 'string|max:20',
            'city'=> 'string|max:255',
        ]);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            $path = $photo->storeAs('public/profile_photos', $filename);
            $validatedData['photo_url'] = Storage::url($path);
        }

        User::find(Auth::id())->update($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Профиль сақталды!',
        ], 201);
    }

}

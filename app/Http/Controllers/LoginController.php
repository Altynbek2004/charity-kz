<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginStore(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:verification_codes,email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Электрондық почта қажет.',
            'password.required' => 'Құпия сөз қажет',
        ]);

        if (Auth::guard()->attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Сәтті кірдіңіз!'], 200);
        } else {
            return response()->json(['error' => 'Құпия сөз дұрыс емес.'], 401);
        }
    }
}

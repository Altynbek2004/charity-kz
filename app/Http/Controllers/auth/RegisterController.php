<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Mail\VerificationCodeMail;
use App\Models\VerificationCode;
use App\Services\Auth\AuthService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }


    public function sendVerificationCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:verification_codes,email',
        ]);
        $code = random_int(100000, 999999);

        VerificationCode::updateOrCreate(
            ['email' => $request->email],
            [
                'code'       => (string) $code,
                'expires_at' => Carbon::now()->addMinutes(10),
            ]
        );

        Mail::raw((string) $code, function ($message) use ($request) {
            $message
                ->to($request->email)
                ->subject('Ваш код подтверждения');
        });

        return response()->json(['message' => 'Тіркеу коды жіберілді'], 200);
    }



    public function verifyCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:verification_codes,email',
            'code'  => 'required|digits:6',
        ]);

        $verification = VerificationCode::where('email', $request->email)->first();

        if (! $verification) {
            return response()->json([
                'success' => false,
                'message' => 'Код не найден'
            ], 404);
        }

        if ($verification->expires_at->isPast()) {
            return response()->json([
                'success' => false,
                'message' => 'Срок действия кода истек'
            ], 400);
        }

        if ($verification->code !== $request->code) {
            return response()->json([
                'success' => false,
                'message' => 'Неверный код'
            ], 400);
        }

        $verification->delete();

        return response()->json([
            'success' => true,
            'message' => 'Код расталды, тіркеуді жалғастыра аласыз'
        ], 200);
    }




    public function registerStore(Request $request)
    {
        $request->validate([
            'email'    => 'required|email|unique:verification_codes,email',
            'password' => 'required|min:6',
        ]);

        $user = $this->authService->register($request->only('email','password'));

        return response()->json([
            'success' => true,
            'message' => 'Пользователь успешно зарегистрирован',
            'user'    => $user,
        ], 201);

    }

}

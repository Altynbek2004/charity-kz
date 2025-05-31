<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\getHelpController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileUserController;
use App\Livewire\Chat;
use App\Mail\VerificationCodeMail;
use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::post('/register',[RegisterController::class,'registerStore'])->name('registerStore');
//Route::post('/login',[LoginController::class,'loginStore'])->name('loginStore');

Route::middleware('auth:sanctum')->post('/logout',[AuthController::class,'logout'])->name('logout');


Route::get('/test-login', function () {
    $credentials = [
        'email' => 'aaleuetdinov@gmail.com',
        'password' => 'Zamira1975!' // Замени на реальный пароль
    ];

    if (Auth::attempt($credentials)) {
        return 'Логин успешен!';
    }

    return 'Ошибка логина!';
});


Route::get('/group',[GroupController::class,'index'])->name('groups.index');
Route::post('/create/group',[GroupController::class,'store'])->name('store.group');
Route::get('/groups/{id}',[GroupController::class,'show'])->name('group.show');

Route::post('/gethelp',[getHelpController::class,'getHelp'])->name('getHelp');
Route::get('/get-helps',[getHelpController::class,'getOneHelp'])->name('getOneHelp');
//Route::get('/user',[ProfileUserController::class,'authUser'])->name('user.index');

Route::post('/profile', [ProfileUserController::class, 'store'])->name('profileStore');

Route::post('/contact', [ContactController::class, 'sendMail'])->name('sendMail');
Route::get('/chat', [Chat::class, 'chat'])->name('chat');
Route::get('/users-all', [Chat::class, 'usersAll'])->name('usersAll');
Route::get('/user-selected', [Chat::class, 'userSelected'])->name('userSelected');
Route::middleware('auth:sanctum')->get('/message/{friend}', function (User $friend)
{
    return ChatMessage::query()
        ->where(function ($query) use ($friend) {
            $query->where('sender_id', auth()->id())
                ->where('receiver_id', $friend->id);
        })
        ->orWhere(function ($query) use ($friend) {
            $query->where('sender_id',$friend->id)
                ->where('receiver_id',  auth()->id());
        })
        ->with(['sender','receiver'])
        ->orderBy('id','ASC')
        ->get();
});

Route::post('/send-code', [RegisterController::class, 'sendVerificationCode']);
Route::post('/verify-code', [RegisterController::class, 'verifyCode']);

// Маршруты для интерфейса новостей
Route::get('/news', function () {
    return view('news.index');
})->name('news.index');


Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');

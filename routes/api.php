<?php

use App\Http\Controllers\Api\DonationController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::apiResource('products', ProductController::class);

Route::prefix('v1')->group(function () {

    // Projects routes
    Route::apiResource('projects', ProjectController::class);

    // Donations routes
    Route::apiResource('donations', DonationController::class)->except(['update', 'destroy']);
    Route::get('donation-stats', [DonationController::class, 'getStats']);

    // Public routes for donation form
    Route::get('active-projects', function() {
        return Project::active()->select('id', 'title')->get();
    });
});

// Contact form submission route
Route::post('/contact', [ContactController::class, 'store']);
// API маршруты для новостей
Route::apiResource('news', NewsController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

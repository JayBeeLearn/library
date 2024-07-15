<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiAuthController;
use App\Http\Controllers\API\ApiBookController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth',
    // 'auth'=>'api'

], function ($router) {

    Route::post('register', [ApiAuthController::class, 'register']);
    Route::post('login', [ApiAuthController::class, 'login']);
    Route::post('logout', [ApiAuthController::class, 'logout']);
    Route::post('refresh', [ApiAuthController::class, 'refresh']);
    Route::post('me', [ApiAuthController::class, 'me']);


    Route::post('books', [ApiBookController::class, 'store'])->name('api.store');
    Route::put('books/{id}', [ApiBookController::class, 'update'])->name('api.update');
    Route::delete('books/{id}', [ApiBookController::class, 'destroy'])->name('api.delete');
 
});

Route::get('books', [ApiBookController::class, 'index'])->name('api.books');
Route::get('books/{id}', [ApiBookController::class, 'show'])->name('api.show');



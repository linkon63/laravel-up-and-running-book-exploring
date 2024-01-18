<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
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

Route::post('/login-app', [AuthenticatedSessionController::class, 'storeMobile']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('test', function (Request $request){
    // dd('123456');
    return User::get()->last();
});

Route::get('tasks/create', [TaskController::class, 'create']);
Route::post('tasks', [TaskController::class, 'store']);

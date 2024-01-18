<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group([], function () {
    Route::get('/test/1', [TestController::class, 'index']);
    Route::get('/test/1', [TestController::class, 'index']);

    Route::get('/test/2', function () {
        // Uses first & second middleware...
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/test', [TestController::class, 'index'])->name('test.index');
    Route::post('/test', [TestController::class, 'store'])->name('test.store');
    Route::patch('/test', [TestController::class, 'update'])->name('test.update');
    Route::delete('/test/{id}', [TestController::class, 'destroy'])->name('test.delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/post', [PostController::class, 'index'])->name('post.index');
    Route::post('/post', [PostController::class, 'store'])->name('post.store');
    Route::patch('/post', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('post.delete');
});



require __DIR__ . '/auth.php';

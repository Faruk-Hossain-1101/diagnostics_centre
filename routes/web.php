<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

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

Route::get('/', function () {
    return redirect('/dashboard');;
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Admin Routes
    Route::get('/test-list', [TestController::class, 'index'])->name('test');
    Route::get('/test/create', [TestController::class, 'create'])->name('test.create');
    Route::post('/test/store', [TestController::class, 'store'])->name('test.store');
    Route::get('/test/{id}/edit', [TestController::class, 'edit'])->name('test.edit');
    Route::put('/test/{id}', [TestController::class, 'update'])->name('test.update');
    Route::delete('/test/{id}', [TestController::class, 'destroy'])->name('test.destroy');
});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReceipeController;
use Illuminate\Http\Request;
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

// Route::get('/', function () {
//     return view('welcome');

// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [ReceipeController::class, 'index'])->name('receipe.index');
Route::get('/receipe/{id}', [ReceipeController::class, 'show'])->name('receipe.show');
Route::get('/receipe', [ReceipeController::class, 'create'])->name('receipe.create');
Route::post('/receipe', [ReceipeController::class, 'store'])->name('receipe.store');
Route::get('/update-receipe/{id}', [ReceipeController::class, 'update'])->name('receipe.update');
Route::post('/update/traitement', [ReceipeController::class, 'update_treatment'])->name('receipe.update_treatment');
// Route::patch('/receipe', [ReceipeController::class, 'update'])->name('receipe.update');
Route::delete('/receipe/{id}', [ReceipeController::class, 'destroy'])->name('receipe.destroy');

require __DIR__ . '/auth.php';

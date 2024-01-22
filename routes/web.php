<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/member', function () {
    return view('pages.member');
})->middleware(['auth', 'verified'])->name('member');
Route::get('/gym-equipments', function () {
    return view('pages.equipments');
})->middleware(['auth', 'verified'])->name('equipments');
Route::get('/attendance', function () {
    return view('pages.attendance');
})->middleware(['auth', 'verified'])->name('attendance');
Route::get('/attendance-list', function () {
    return view('pages.attendance-list');
})->middleware(['auth', 'verified'])->name('attendance-list');
Route::get('/payments', function () {
    return view('pages.payments');
})->middleware(['auth', 'verified'])->name('payments');
Route::get('/reports', function () {
    return view('pages.reports');
})->middleware(['auth', 'verified'])->name('reports');





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

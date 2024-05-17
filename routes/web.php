<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
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

// menjadi mode tamu dan hanya bisa melihat saja
Route::middleware(['guest'])->group(function () {

    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);

});

Route::get('/home', function () {
    return redirect('/admin');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->middleware('userAkses:admin');
    Route::get('/resepsionis', [AdminController::class, 'resepsionis'])->middleware('userAkses:resepsionis');
    Route::get('/tamu', [AdminController::class, 'tamu'])->middleware('userAkses:tamu');
    Route::get('/logout', [AuthController::class, 'logout']);

});
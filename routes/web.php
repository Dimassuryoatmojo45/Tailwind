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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/modal', [ProfileController::class, 'modal'])->name('modal');
    Route::get('/datatable', [ProfileController::class, 'datatable'])->name('datatable');
    Route::get('/report_produksi', [ProfileController::class, 'report_produksi'])->name('report_produksi');
    Route::get('/produksi', [ProfileController::class, 'produksi'])->name('produksi');
    Route::get('/input_po', [ProfileController::class, 'input_po'])->name('input_po');
});

require __DIR__.'/auth.php';
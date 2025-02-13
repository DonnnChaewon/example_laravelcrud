<?php

use App\Http\Controllers\KdramaController;
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

Route::get('/kdrama', [KdramaController::class, 'index'])->name('kdrama.index');
Route::get('/kdrama/create', [KdramaController::class, 'create'])->name('kdrama.create');
Route::post('/kdrama/create', [KdramaController::class, 'store'])->name('kdrama.store');
Route::get('/kdrama/{kdrama}/edit', [KdramaController::class, 'edit'])->name('kdrama.edit');
Route::put('/kdrama/{kdrama}/edit', [KdramaController::class, 'update'])->name('kdrama.update');
Route::delete('/kdrama/{kdrama}/destroy', [KdramaController::class, 'destroy'])->name('kdrama.destroy');
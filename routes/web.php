<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CustomerController;
use App\Models\Customer;
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

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('check.auth')->group(function() {
    Route::get('/', [BrandController::class, 'index'])->name('index');
    Route::post('/', [BrandController::class, 'search'])->name('search');

    
    Route::get('/add', [BrandController::class, 'create'])->name('add');
    Route::post('/add', [BrandController::class, 'store']);
    Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('edit')->where('id', '[0-9]+');
    Route::get('/delete/{id}', [BrandController::class, 'destroy'])->name('delete')->where('id', '[0-9]+');
    Route::post('/update', [BrandController::class, 'update']);
});


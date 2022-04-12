<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\unitController;




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




Route::middleware(['unitControl'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    
    Route::get('/writeUnit', [unitController::class, 'index'])->name('writeUnit');
});

Route::get('/changeUnit', [unitController::class, 'convertUnit'])->name('unit-convert');





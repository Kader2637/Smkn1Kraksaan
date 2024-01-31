<?php

use App\Http\Controllers\LegderController;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('legder' , [LegderController::class , 'index'])->name('legder.index');
Route::get('importlegders' , [LegderController::class , 'import'])->name('legder.index');
Route::post('legder_store' , [LegderController::class , 'store'])->name('legder.store');
Route::delete('legder_delete/{legder}' , [LegderController::class , 'destroy']);
Route::put('legder_update/{legder}' , [LegderController::class , 'update']);

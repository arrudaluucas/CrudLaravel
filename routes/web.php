<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\Localization\LocalizationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    if (!Auth::check()) {
        return view('auth.login');
    } else {
        return view('home');
    }
    
});

Route::get('/get-citys', [LocalizationController::class, 'getAllCitys']);
Route::get('/get-states', [LocalizationController::class, 'getAllStates']);
Route::resource('users', UserController::class)->except(['update', 'destroy']);
Route::resource('clients', ClientController::class)->except(['update', 'destroy']);
Route::get('get-clients', [ClientController::class, 'getClients'])->name('clients.get-clients');
Route::get('get-users', [UserController::class, 'getUsers'])->name('users.get-users');
Route::post('clients/{id}/update', [ClientController::class, 'update'])->name('clients.update');
Route::get('clients/{id}/destroy', [ClientController::class, 'destroy'])->name('clients.destroy');
Route::post('users/{id}/update', [UserController::class, 'update'])->name('users.update');
Route::get('users/{id}/destroy', [UserController::class, 'destroy'])->name('users.destroy');

Auth::routes();

Route::get('/home', [ClientController::class, 'index'])->name('home');

<?php

use App\Http\Controllers\Api\{
  AuthController,
  UserController
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/users', [UserController::class, 'index'])->name('users.list');
Route::get('/users/{id}', [UserController::class, 'show'])->name('user.show');

Route::post('/login', [AuthController::class, 'login'])->name("user.login");
Route::post('/logout', 'AuthController@logout');

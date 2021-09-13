<?php

use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('login', [AuthController::class, 'authenticate']);
Route::post('register', [AuthController::class, 'register']);

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('user', [AuthController::class, 'get_user']);
    Route::put('user', [AuthController::class, 'update_user']);
    Route::delete('user', [AuthController::class, 'delete_user']);
    Route::post('logout', [AuthController::class, 'logout']);

    // Tasks routes
    Route::get('tasks/', [UsersController::class, 'tasks']);
    Route::get('tasks/{id}', [TasksController::class, 'show']);
    Route::post('tasks/', [TasksController::class, 'store']);
    Route::put('tasks/{id}', [TasksController::class, 'update']);
    Route::delete('tasks/{id}', [TasksController::class, 'destroy']);
});

<?php

use App\Http\Controllers\Api\AuthConroller;
use App\Http\Controllers\Api\PostConroller;
use App\Http\Controllers\Api\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});

// Route::apiResource('posts', PostController::class)->middleware('auth:sanctum');

Route::post('/auth/register', [App\Http\Controllers\Api\AuthController::class, 'createUser'])->name('auth/register');
Route::post('/auth/login', [App\Http\Controllers\Api\AuthController::class, 'loginUser'])->name('auth/login');



//////////////////////Employee/////////////////////////////////
Route::apiResource('employee', EmployeeController::class);
Route::get('edit-employee/{id}', [EmployeeController::class, 'edit']);
Route::put('employee-update', [EmployeeController::class, 'update']);
Route::delete('delete-employee', [EmployeeController::class, 'destroy']);


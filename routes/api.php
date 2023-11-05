<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
// use Illuminate\Http\Request;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(AuthController::class)->middleware('log.route')->group(function () {
    Route::post('login', 'login')->name('login');
    Route::post('register', 'register');
    Route::post('refresh-token', 'refresh');
    Route::post('logout', 'logout');
});

Route::get('unauthorized', function () {
    return response()->json([
        'status' => 'failed',
        'message' => 'unauthorized'
    ], 401);
})->name('unauthorized');

Route::controller(EmployeeController::class)->middleware('log.route')->group(function () {
    Route::post('employee', 'store')->name('employee.store');
    Route::get('employee', 'index')->name('employee.index');
    Route::put('employee/{id}', 'update')->name('employee.update');
    Route::delete('employee/{id}', 'destroy')->name('employee.destroy');
});

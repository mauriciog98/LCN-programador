<?php

use App\Http\Controllers\StudentController;
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
Route::get('students', [StudentController::class, 'index']);
Route::group(['prefix' => 'student'], function () {
    Route::post('store', [StudentController::class, 'store']);
    Route::get('show/{student}', [StudentController::class, 'show']);
    Route::post('update/{student}', [StudentController::class, 'update']);
    Route::delete('delete/{student}', [StudentController::class, 'destroy']);
});

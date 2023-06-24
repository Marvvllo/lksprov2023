<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\ValidationController;
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

// Auth group
Route::prefix('/v1/auth')->controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('logout', 'logout');
});

// Validation group
Route::prefix('/v1/validations')->controller(ValidationController::class)->group(function () {
    Route::get('/', 'getValidation');
    Route::post('/', 'requestValidation');
});

// Validation group
Route::prefix('/v1/job_vacancies')->controller(VacancyController::class)->group(function () {
    Route::get('/', 'getValidation');
    Route::post('/', 'requestValidation');
});

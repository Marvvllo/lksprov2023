<?php

use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\ValidationController;
use App\Models\JobVacancies;
use App\Models\Societies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\isEmpty;

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

// Check Token Function
function checkToken($token)
{
    $society = Societies::where('login_tokens', $token)->first();
    return (isEmpty($society));
}

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

// Vacancies group
Route::prefix('/v1/job_vacancies')->controller(VacancyController::class)->group(function () {
    Route::get('/', 'getValidation');
    Route::post('/', 'requestValidation');
});

// Vacancy Detail Endpoint
Route::get('/v1/job_vacancies/{id}', function ($id, Request $request) {
    // Validasi token
    $token = $request->query('token');
    $isTokenValid = checkToken($token);
    $society = Societies::where('login_tokens', $token)->first();
    if ($society == null || $token == null || !$isTokenValid) {
        return response([
            'message' => 'Unauthorized user'
        ], 401);
    }

    $jobVacancy = JobVacancies::where('id', $id)->first();
    return response([
        'vacancy' => $jobVacancy
    ], 200);
})->where('id', '[0-9]+');

// Vacancies group
Route::prefix('/v1/applications')->controller(ApplicationsController::class)->group(function () {
    Route::post('/', 'postApplication');
});

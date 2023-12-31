<?php

namespace App\Http\Controllers;

use App\Models\JobVacancies;
use App\Models\Societies;
use App\Models\Validations;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

function checkToken($token)
{
    $society = Societies::where('login_tokens', $token)->first();
    return (isEmpty($society));
}


class VacancyController extends Controller
{
    // GET Validation
    public function getValidation(Request $request)
    {
        // Validasi token
        $token = $request->query('token');
        $isTokenValid = checkToken($token);
        $society = Societies::where('login_tokens', $token)->first();
        if ($society == null || $token == null || !$isTokenValid) {
            return response([
                'message' => 'Unauthorized user'
            ], 401);
        }

        $validation = Validations::where('society_id', $society->id)->first();
        if ($validation == null) {
            return response([
                'message' => 'Please register a job data validation'
            ], 404);
        }

        return response([
            'vacancies' => JobVacancies::all()
        ], 200);
    }
}

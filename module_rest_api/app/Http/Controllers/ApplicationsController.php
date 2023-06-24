<?php

namespace App\Http\Controllers;

use App\Models\JobApplyPositions;
use App\Models\JobApplySocieties;
use App\Models\Societies;
use App\Models\Validations;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

function checkToken($token)
{
    $society = Societies::where('login_tokens', $token)->first();
    return (isEmpty($society));
}


class ApplicationsController extends Controller
{
    public function postApplication(Request $request)
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

        // Periksa status data validasi
        $validation = Validations::where('society_id', $society->id)->first();
        if ($validation == null || $validation->status !== "accepted") {
            return response([
                'message' => 'Your data validator must be accepted by validator before'
            ], 401);
        }

        // Validasi field input
        $vacancyID = $request->input('vacancy_id');
        $positions = $request->input('positions');
        $notes = $request->input('notes');

        if ($vacancyID === null || $positions === null) {
            return response([
                'message' => 'Invalid field',
                'errors' => [
                    "vacancy_id" => [
                        "The vacancy id field is required."
                    ],
                    "positions " => [
                        "The position field is required."
                    ]
                ]
            ], 401);
        }

        // Periksa jika sudah apply
        $existingApplication = JobApplySocieties::where([
            ['society_id', '=', $society->id],
            ['job_vacancy_id', '=', $vacancyID],
        ])->first();
        if ($existingApplication !== null) {
            return response([
                'message' => 'Invalid field',
                'errors' => "Application for a job can only be once"
            ], 401);
        }

        // Tambahkan JobApplySocieties ke database
        $applySocieties = new JobApplySocieties();
        $applySocieties->notes = $notes;
        $applySocieties->date = now();
        $applySocieties->society_id = $society->id;
        $applySocieties->job_vacancy_id  = $vacancyID;
        $applySocieties->save();

        // Tambahkan JobApplyPositions ke database
        $applyPositions = new JobApplyPositions();
        $applyPositions->date = now();
        $applyPositions->society_id = $society->id;
        $applyPositions->job_vacancy_id  = $vacancyID;
        $applyPositions->position_id = $positions;
        $applyPositions->job_apply_societies_id  = $applySocieties->id;
        $applyPositions->save();

        // Return response berhasil
        return response([
            'message' => "Applying for job successful",
        ], 200);
    }
}

<?php

namespace App\Http\Controllers;

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


class ValidationController extends Controller
{
    public function requestValidation(Request $request)
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

        $workExp = $request->input('work_experience');
        $jobCategoryID = $request->input('job_category_id');
        $jobPosition = $request->input('job_position');
        $reason = $request->input('reason_accepted');

        // Buat validation baru
        $validation = new Validations();
        $validation->society_id = $society->id;
        $validation->validator_id  = NULL;
        $validation->status = 'pending';

        $validation->work_experience = isNull($workExp) ? $workExp : NULL;
        $validation->job_category_id = isNull($jobCategoryID) ? $jobCategoryID : NULL;
        $validation->job_position = isNull($jobPosition) ? $jobPosition : NULL;
        $validation->reason_accepted = isNull($reason) ? $reason : NULL;

        $validation->validator_notes = NULL;
        $validation->save();

        // Kembalikan hasil dari validation yang dibuat
        return response([
            'society_id' => $validation->society_id,
            'validator_id' => $validation->validator_id,
            'status' => $validation->status,

            'work_experience' => $validation->work_experience,
            'job_category_id' => $validation->job_category_id,
            'job_position' => $validation->job_position,
            'reason_accepted' => $validation->reason_accepted
        ], 200);
    }

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
            ], 401);
        }

        return response([
            'society_id' => $validation->society_id,
            'validator_id' => $validation->validator_id,
            'status' => $validation->status,

            'work_experience' => $validation->work_experience,
            'job_category_id' => $validation->job_category_id,
            'job_position' => $validation->job_position,
            'reason_accepted' => $validation->reason_accepted
        ], 200);
    }
}

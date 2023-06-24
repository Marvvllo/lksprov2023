<?php

namespace App\Http\Controllers;

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
            ], 404);
        }

        //         vacancy_id: 1, positions: [position 1, ...], 
        //   notes : “SomeText” 

        // Periksa field input
        $vacancyID = $request->input('vacancy_id');
        $positions = $request->input('positions');
        $notes = $request->input('notes');
    }
}

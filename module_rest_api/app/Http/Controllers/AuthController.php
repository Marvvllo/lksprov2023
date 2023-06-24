<?php

namespace App\Http\Controllers;

use App\Models\Regionals;
use App\Models\Societies;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class AuthController extends Controller
{
  public function login(Request $request)
  {

    $request->validate([
      'id_card_number' => 'required',
      'password' => 'required',
    ]);

    $cardNumber = $request->input('id_card_number');
    $password = $request->input('password');

    if (is_null($cardNumber) || is_null($password) || Societies::find($cardNumber)->password != $password) {
      return response([
        'message' => 'ID Card Number or Password incorrect',
      ], 401);
    }

    $society = Societies::find($cardNumber);
    $society->login_tokens = md5($society->id_card_number);
    $society->save();
    $region = Regionals::find($society->regional_id);

    return response([
      'name' => $society->name,
      'born_date' => $society->born_date,
      'gender' => $society->gender,
      'address' => $society->address,
      'token' => $society->login_tokens,
      'regional' => $region,
    ], 200);
  }

  public function logout(Request $request)
  {
    $token = $request->query('token');
    $society = Societies::where('login_tokens', $token)->first();
    if ($society == null || $society->login_tokens != $token) {
      return response([
        'message' => 'Invalid token'
      ], 401);
    }

    $society->login_tokens = null;
    $society->save();
    return response([
      'message' => 'Logout success'
    ]);
  }
}

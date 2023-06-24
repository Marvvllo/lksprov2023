<?php

use App\Models\Societies;

function checkToken($token)
{
  $society = Societies::where('login_tokens', $token)->first();
  if ($society == null || $token == null) {
    return response([
      'message' => 'Unauthorized user'
    ], 401);
  }
}

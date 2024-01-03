<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use App\Models\User;

class UniqueIdGenerator
{
  public static function generateUniqueId()
  {
    $randomId = '';
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $charactersLength = strlen($characters);

    for ($i = 0; $i < 6; $i++) {
      $randomId .= $characters[mt_rand(0, $charactersLength - 1)];
    }

    // Check if the generated ID already exists in the database
    // If it does, regenerate the ID until it's unique
    while (User::where('user_unique_id', $randomId)->exists()) {
      for ($i = 0; $i < 6; $i++) {
        $randomId .= $characters[mt_rand(0, $charactersLength - 1)];
      }
    }

    return $randomId;
  }
}

<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\User;

class ReferenceIdExists implements Rule
{
  public function passes($attribute, $value)
  {
    // Check if the provided reference ID exists in the users table
    return User::where('user_unique_id', $value)->exists();
  }

  public function message()
  {
    return 'The provided reference ID does not exist.';
  }
}

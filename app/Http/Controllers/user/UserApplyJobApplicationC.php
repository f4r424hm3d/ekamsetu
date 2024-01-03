<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserApplyJobApplicationC extends Controller
{
  public function pd()
  {
    $user = User::find(session('user_id'));
    $page_route = '';
    $data = compact('page_route', 'user');
    return view('user.personal-details')->with($data);
  }
}

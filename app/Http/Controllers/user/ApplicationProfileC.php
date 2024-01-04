<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ApplicationProfileC extends Controller
{
  public function index()
  {
    $user = User::find(session('userLoggedIn')['user_id']);
    $page_route = '';
    $data = compact('page_route', 'user');
    return view('user.application-profile')->with($data);
  }
}

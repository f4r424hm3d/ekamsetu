<?php

namespace App\Http\Controllers\common;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UserProfileCc extends Controller
{
  public function getJobAppDetail(Request $request)
  {
    $user = User::find($request->job_id);
    $data = compact('user');
    $htmlContent = View::make('ajax.job-app-detail')->with($data)->render();
    return response()->json(['htmlContent' => $htmlContent]);
  }
}

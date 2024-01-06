<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class JobApplicationAc extends Controller
{
  public function index()
  {
    $user = User::find(session()->get('adminLoggedIn')['user_id']);
    $jobapps = User::where('job_application', 1)->where('role', 'user')->paginate(10);
    $data = compact('user', 'jobapps');
    return view('admin.job-applications')->with($data);
  }
}

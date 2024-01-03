<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DashboardPermission;
use App\Models\User;
use Illuminate\Http\Request;

class AdminLogin extends Controller
{
  public function index()
  {
    return view('admin.login');
  }
  public function login(Request $request)
  {
    //printArray($request->all());
    //die;
    $field = User::where('status', 1)->where('email', $request['username'])->orWhere('username', $request['username'])->first();
    // printArray($field->toArray());
    // die;
    if (is_null($field)) {
      session()->flash('emsg', 'Email address not exist.');
      return redirect('admin/login');
    } else {
      if ($field->password == $request['password']) {
        $has_permission = DashboardPermission::where('status', '1')->where('user_id', $field->id)->Where('dashboard', 'FEES')->exists();
        if ($has_permission || $field['role'] == 'admin') {
          $lc = $field->login_count == '' ? 0 : $field->login_count + 1;
          $field->login_count = $lc;
          $field->last_login = date("Y-m-d H:i:s");
          $field->save();
          session()->flash('smsg', 'Succesfully logged in');
          $request->session()->put('adminLoggedIn', ['user_id' => $field->id, 'user_name' => $field->name, 'role' => $field->role, 'username' => $request['username']]);
          return redirect('admin/dashboard');
        } else {
          session()->flash('emsg', 'You have not permission to access dashboard.');
          return redirect('admin/login');
        }
      } else {
        session()->flash('emsg', 'Incorrect password entered');
        return redirect('admin/login');
      }
    }
  }
}

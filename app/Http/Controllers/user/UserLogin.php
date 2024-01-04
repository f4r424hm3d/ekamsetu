<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserLogin extends Controller
{
  public function login()
  {
    return view('user.login');
  }
  public function signin(Request $request)
  {
    //printArray($request->all());
    //die;
    $field = User::where('email', $request['email'])->first();
    // printArray($field->toArray());
    // die;
    if (is_null($field)) {
      session()->flash('emsg', 'Email address not exist.');
      return redirect('user/login');
    } else {
      if ($field->password == $request['password']) {
        $lc = $field->login_count == '' ? 0 : $field->login_count + 1;
        $field->login_count = $lc;
        $field->last_login = date("Y-m-d H:i:s");
        $field->save();
        session()->flash('smsg', 'Succesfully logged in');
        $request->session()->put('userLoggedIn', ['user_id' => $field->id, 'user_name' => $field->name, 'role' => $field->role, 'username' => $request['username']]);
        return redirect('user/dashboard');
      } else {
        session()->flash('emsg', 'Incorrect password entered');
        return redirect('user/login');
      }
    }
  }
}

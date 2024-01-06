<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboard extends Controller
{
  public function index()
  {
    $user = User::find(session()->get('adminLoggedIn')['user_id']);
    $page_route = '';
    $data = compact('page_route', 'user');
    return view('admin.index')->with($data);
  }
  public function profile()
  {
    $page_route = '';
    $user = User::find(session()->get('adminLoggedIn')['user_id']);
    $data = compact('user', 'page_route');
    return view('admin.profile')->with($data);
  }
  public function updateProfile(Request $request)
  {
    $request->validate(
      [
        'name' => 'required|regex:/^[a-zA-Z ]*$/',
        'email' => 'required|email|unique:users,email,' . $request['id'],
        'username' => 'required|unique:users,username,' . $request['id'],
        'password' => 'required',
      ]
    );
    $field = User::find($request['id']);
    $field->name = $request['name'];
    $field->email = $request['email'];
    $field->username = $request['username'];
    $field->password = $request['password'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/profile');
  }
}

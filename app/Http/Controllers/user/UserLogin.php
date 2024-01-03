<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserLogin extends Controller
{
  public function login()
  {
    return view('front.student.sign-in');
  }
  public function signin(Request $request)
  {
    //printArray($request->all());
    //die;
    $seg1 = $request['return_to'] != null ? 'return_to=' . $request['return_to'] : null;
    $seg2 = $request['program_id'] != null ? 'program_id=' . $request['program_id'] : null;
    $return_url = 'sign-in?' . $seg1 . ($seg2 != null ? '&' . $seg2 : '');
    //die;
    $field = User::whereEmail($request['email'])->first();
    if (is_null($field)) {
      session()->flash('emsg', 'Email address not exist.');
      return redirect($return_url);
    } else {
      if ($field->status == 1) {
        if ($field->password == $request['password']) {
          $lc = $field->login_count == '' ? 0 : $field->login_count + 1;
          $field->login_count = $lc;
          $field->last_login = date("Y-m-d H:i:s");
          $field->save();
          session()->flash('smsg', 'Succesfully logged in');
          $request->session()->put('studentLoggedIn', true);
          $request->session()->put('student_id', $field->id);
          return redirect($request['return_to'] ?? 'student/profile');
        } else {
          session()->flash('emsg', 'Incorrect password entered');
          return redirect($return_url);
        }
      } else {
        $otp = rand(1000, 9999);
        $otp_expire_at = date("YmdHis", strtotime("+5 minutes"));

        $emaildata = ['name' => $field->name, 'otp' => $otp];
        $dd = ['to' => $field->email, 'to_name' => $field->name, 'subject' => 'Email OTP'];

        $result = Mail::send(
          'mails.send-otp',
          $emaildata,
          function ($message) use ($dd) {
            $message->to($dd['to'], $dd['to_name']);
            $message->subject($dd['subject']);
            $message->priority(1);
          }
        );
        if ($result == false) {
          $emsg = response()->Fail('Sorry! Please try again latter');
          session()->flash('emsg', $emsg);
          return redirect($return_url);
        } else {
          $field->otp = $otp;
          $field->otp_expire_at = $otp_expire_at;
          $field->save();
          session()->flash('smsg', 'An OTP has been send to your registered email address.');
          session()->put('last_id', $field->id);
          return redirect('confirmed-email');
        }
      }
    }
  }
}

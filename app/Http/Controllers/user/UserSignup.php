<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use App\Rules\ReferenceIdExists;
use App\Helpers\UniqueIdGenerator;

class UserSignup extends Controller
{
  public function signUp(Request $request)
  {
    $url = url('sign-up');
    $data = compact('url', 'phonecodes', 'levels', 'course_categories');
    return view('front.student.sign-up')->with($data);
  }
  public function jobApplication(Request $request)
  {
    $url = url('job-application');
    $data = compact('url');
    return view('user.job-application')->with($data);
  }
  public function register(Request $request)
  {
    // printArray($request->all());
    // die;
    $otp = rand(1000, 9999);
    $otp_expire_at = date("YmdHis", strtotime("+5 minutes"));
    $request->validate(
      [
        'name' => 'required|regex:/^[a-zA-Z ]*$/',
        'email' => 'required|email|unique:users,email',
        'mobile' => 'required|numeric',
        'password' => ['required', 'string', Password::min(8)->mixedCase()->numbers()->symbols()],
        'confirm_password' => 'required|same:password',
        'reference_id' => ['nullable', new ReferenceIdExists],
      ]
    );
    $randomId = UniqueIdGenerator::generateUniqueId();
    $field = new User();
    $field->reference_id = $request['reference_id'];
    $field->user_unique_id = $randomId;
    $field->name = $request['name'];
    $field->email = $request['email'];
    $field->username = $request['email'];
    $field->mobile = $request['mobile'];
    $field->password = $request['password'];
    $field->role = 'user';
    $field->otp = $otp;
    $field->otp_expire_at = $otp_expire_at;
    $field->status = 0;
    $field->remember_token = Str::random(20);

    $emaildata = ['name' => $request['name'], 'otp' => $otp];
    $dd = ['to' => $request['email'], 'to_name' => $request['name'], 'subject' => 'OTP'];

    $chk = true;
    $chk = Mail::send(
      'mails.send-otp',
      $emaildata,
      function ($message) use ($dd) {
        $message->to($dd['to'], $dd['to_name']);
        $message->subject('OTP');
        $message->priority(1);
      }
    );
    if ($chk == false) {
      $emsg = response()->Fail('Sorry! Please try again latter');
      session()->flash('emsg', $emsg);
      return redirect('user/job-application');
    } else {
      $field->save();
      session()->flash('smsg', 'An OTP has been send to your registered email address. Please check your email and spam folder too.');
      $request->session()->put('last_id', $field->id);
      return redirect('user/confirmed-email');
    }
  }
  public function confirmedEmail()
  {
    return view('user.confirmed-email-form');
  }
  public function submitOtp(Request $request)
  {
    //printArray($request->all());
    $result = User::find(session('last_id'));
    $current_time = date("YmdHis");
    if ($result->otp == $request['otp']) {
      if ($current_time > $result->otp_expire_at) {
        $otp_expire_at = date("YmdHis", strtotime("+5 minute"));
        $new_otp = rand(1000, 9999);
        $result->otp = $new_otp;
        $result->otp_expire_at = $otp_expire_at;
        $result->save();

        $emaildata = ['name' => $result['name'], 'otp' => $new_otp];
        $dd = ['to' => $result['email'], 'to_name' => $result['name'], 'subject' => 'OTP'];

        Mail::send(
          'mails.send-otp',
          $emaildata,
          function ($message) use ($dd) {
            $message->to($dd['to'], $dd['to_name']);
            $message->subject('OTP');
            $message->priority(1);
          }
        );
        session()->flash('smsg', 'OTP expired. New OTP has been send to your email id.');
        return redirect('user/confirmed-email');
      } else {
        $result->otp = null;
        $result->otp_expire_at = null;
        $result->email_verified_at = date("Y-m-d H:i:s");
        $result->email_verified = 1;
        $result->status = 1;
        $result->job_application = 1;
        $result->source = 'Job Application';
        $result->save();
        session()->flash('smsg', 'Email verified. Succesfully logged in.');
        // $request->session()->put('userLoggedIn', true);
        // $request->session()->put('user_id', $request->session()->get('last_id'));
        $request->session()->put('userLoggedIn', ['user_id' => $result->id, 'user_name' => $result->name, 'role' => $result->role, 'username' => $request['username']]);
        return redirect('user/job-application/personal-details');
      }
    } else {
      session()->flash('emsg', 'Enter incorrect OTP');
      return redirect('user/confirmed-email');
    }
  }

  public function viewForgetPassword()
  {
    return view('front.student.forget-password');
  }
  public function forgetPassword(Request $request)
  {
    // printArray($request->all());
    // die;
    $remember_token = Str::random(45);
    $otp_expire_at = date("YmdHis", strtotime("+10 minutes"));
    $field = User::whereEmail($request['email'])->first();
    if (is_null($field)) {
      session()->flash('emsg', 'Entered wrong email address. Please check.');
      return redirect('account/password/reset');
    } else {
      $login_link = url('email-login/?uid=' . $field->id . '&token=' . $remember_token);

      $reset_password_link = url('password/reset/?uid=' . $field->id . '&token=' . $remember_token);

      $emaildata = ['name' => $field->name, 'id' => $field->id, 'remember_token' => $remember_token, 'login_link' => $login_link, 'reset_password_link' => $reset_password_link];

      $dd = ['to' => $request['email'], 'to_name' => $field->name, 'subject' => 'Password Reset'];

      $chk = Mail::send(
        'mails.forget-password-link',
        $emaildata,
        function ($message) use ($dd) {
          $message->to($dd['to'], $dd['to_name']);
          $message->subject($dd['subject']);
          $message->priority(1);
        }
      );
      if ($chk == false) {
        $emsg = response()->Fail('Sorry! Please try again latter');
        session()->flash('emsg', $emsg);
        return redirect('account/password/reset');
      } else {
        $field->remember_token = $remember_token;
        $field->otp_expire_at = $otp_expire_at;
        $field->save();
        $request->session()->put('forget_password_email', $request['email']);
        return redirect('forget-password/email-sent');
      }
    }
  }

  public function emailSent()
  {
    return view('front.student.email-sent');
  }

  public function emailLogin(Request $request)
  {
    //printArray($request->all());
    //die;
    $id = $request['uid'];
    $remember_token = $request['token'];
    $where = ['id' => $id, 'remember_token' => $remember_token];
    $field = User::where($where)->first();
    $current_time = date("YmdHis");
    //printArray($field->all());
    if (is_null($field)) {
      return redirect('account/invalid_link');
    } else {
      if ($current_time > $field->otp_expire_at) {
        return redirect('account/invalid_link');
      } else {
        $lc = $field->login_count == '' ? 0 : $field->login_count + 1;
        $field->login_count = $lc;
        $field->last_login = date("Y-m-d H:i:s");
        $field->remember_token = null;
        $field->otp_expire_at = null;
        $field->save();
        session()->flash('smsg', 'Succesfully logged in');
        $request->session()->put('studentLoggedIn', true);
        $request->session()->put('student_id', $field->id);
        return redirect('student/profile');
      }
    }
  }

  public function invalidLink()
  {
    return view('front.student.invalid-link');
  }
  public function viewResetPassword(Request $request)
  {
    //printArray($request->all());
    //die;
    $id = $request['uid'];
    $remember_token = $request['token'];
    $where = ['id' => $id, 'remember_token' => $remember_token];
    $field = User::where($where)->first();
    $current_time = date("YmdHis");
    //printArray($field->all());
    if (is_null($field)) {
      return redirect('account/invalid_link');
    } else {
      return view('front.student.reset-password');
    }
  }
  public function resetPassword(Request $request)
  {
    //printArray($request->all());
    //die;
    $request->validate(
      [
        'new_password' => 'required|min:8',
        'confirm_new_password' => 'required|min:8|same:new_password'
      ]
    );
    $id = $request['id'];
    $remember_token = $request['remember_token'];
    $where = ['id' => $id, 'remember_token' => $remember_token];
    $field = User::where($where)->first();
    $current_time = date("YmdHis");
    //printArray($field->all());
    if (is_null($field)) {
      return redirect('account/invalid_link');
    } else {
      if ($current_time > $field->otp_expire_at) {
        return redirect('account/invalid_link');
      } else {
        $lc = $field->login_count == '' ? 0 : $field->login_count + 1;
        $field->login_count = $lc;
        $field->last_login = date("Y-m-d H:i:s");
        $field->remember_token = null;
        $field->otp_expire_at = null;
        $field->password = $request['new_password'];
        $field->save();
        session()->flash('smsg', 'Succesfully logged in');
        $request->session()->put('studentLoggedIn', true);
        $request->session()->put('student_id', $field->id);
        return redirect('student/profile');
      }
    }
  }
}

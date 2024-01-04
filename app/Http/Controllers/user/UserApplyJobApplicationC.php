<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserEmergencyContact;
use App\Models\UserJobApplicationStep;
use App\Models\UserProfessionalExperience;
use Illuminate\Http\Request;

class UserApplyJobApplicationC extends Controller
{
  public function pd()
  {
    $user = User::find(session('userLoggedIn')['user_id']);
    $page_route = '';
    $data = compact('page_route', 'user');
    return view('user.personal-details')->with($data);
  }
  public function pds(Request $request)
  {
    // printArray($request->all());
    // die;
    $request->validate(
      [
        'name' => 'required',
        'dob' => 'required',
        'gender' => 'required',
        'mobile' => 'required',
        'secondary_contact_number' => 'required',
        'current_address' => 'required',
        'permanent_address' => 'required',
      ]
    );

    $field = User::find(session('userLoggedIn')['user_id']);
    $field->name = $request->name;
    $field->dob = $request->dob;
    $field->gender = $request->gender;
    $field->mobile = $request->mobile;
    $field->secondary_contact_number = $request->secondary_contact_number;
    $field->current_address = $request->current_address;
    $field->permanent_address = $request->permanent_address;
    $field->save();

    $userId = session('userLoggedIn')['user_id'];
    saveUserJobApplicationStep('personal-details', '1', $userId);

    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('user/job-application/identification-details');
  }
  public function id()
  {
    $user = User::find(session('userLoggedIn')['user_id']);
    $page_route = '';
    $data = compact('page_route', 'user');
    return view('user.identification-details')->with($data);
  }
  public function ids(Request $request)
  {
    // printArray($request->all());
    // die;
    $request->validate(
      [
        'id_number' => 'required',
        'id_file' => 'required|max:5000|mimes:jpg,jpeg,png,gif',
        'photo' => 'required|max:5000|mimes:jpg,jpeg,png,gif',
        'signature' => 'required|max:5000|mimes:jpg,jpeg,png,gif',
        'thumb' => 'required|max:5000|mimes:jpg,jpeg,png,gif',
      ]
    );

    $field = User::find(session('userLoggedIn')['user_id']);
    $field->national_id = $request->id_number;
    if ($request->hasFile('id_file')) {
      $fileOriginalName = $request->file('id_file')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('id_file')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('id_file')->move('uploads/userdoc/', $file_name);
      if ($move) {
        $field->id_file_name = $file_name;
        $field->id_file_path = 'uploads/userdoc/' . $file_name;
      } else {
        session()->flash('emsg', 'Some problem occured. File not uploaded.');
      }
    }
    if ($request->hasFile('photo')) {
      $fileOriginalName = $request->file('photo')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('photo')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('photo')->move('uploads/userdoc/', $file_name);
      if ($move) {
        $field->photo_name = $file_name;
        $field->photo_path = 'uploads/userdoc/' . $file_name;
      } else {
        session()->flash('emsg', 'Some problem occured. File not uploaded.');
      }
    }
    if ($request->hasFile('signature')) {
      $fileOriginalName = $request->file('signature')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('signature')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('signature')->move('uploads/userdoc/', $file_name);
      if ($move) {
        $field->signature_name = $file_name;
        $field->signature_path = 'uploads/userdoc/' . $file_name;
      } else {
        session()->flash('emsg', 'Some problem occured. File not uploaded.');
      }
    }
    if ($request->hasFile('thumb')) {
      $fileOriginalName = $request->file('thumb')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('thumb')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('thumb')->move('uploads/userdoc/', $file_name);
      if ($move) {
        $field->thumb_name = $file_name;
        $field->thumb_path = 'uploads/userdoc/' . $file_name;
      } else {
        session()->flash('emsg', 'Some problem occured. File not uploaded.');
      }
    }
    $field->save();

    $userId = session('userLoggedIn')['user_id'];
    saveUserJobApplicationStep('identification-details', '1', $userId);

    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('user/job-application/educational-background');
  }
  public function eb()
  {
    $user = User::find(session('userLoggedIn')['user_id']);
    $page_route = '';
    $data = compact('page_route', 'user');
    return view('user.educational-background')->with($data);
  }
  public function ebs(Request $request)
  {
    // printArray($request->all());
    // die;
    $request->validate(
      [
        'highest_qualification' => 'required',
        'institute_name' => 'required',
        'year_of_graduation' => 'required',
        'field_of_study' => 'required',
        'certificate' => 'required|max:5000|mimes:jpg,jpeg,png,gif',
      ]
    );

    $field = User::find(session('userLoggedIn')['user_id']);
    $field->highest_qualification = $request->highest_qualification;
    $field->institute_name = $request->institute_name;
    $field->year_of_graduation = $request->year_of_graduation;
    $field->field_of_study = $request->field_of_study;
    if ($request->hasFile('certificate')) {
      $fileOriginalName = $request->file('certificate')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('certificate')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('certificate')->move('uploads/userdoc/', $file_name);
      if ($move) {
        $field->certificate = 'uploads/userdoc/' . $file_name;
      } else {
        session()->flash('emsg', 'Some problem occured. File not uploaded.');
      }
    }
    $field->save();

    $userId = session('userLoggedIn')['user_id'];
    saveUserJobApplicationStep('educational-background', '1', $userId);

    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('user/job-application/professional-experience');
  }
  public function pe()
  {
    $user = User::find(session('userLoggedIn')['user_id']);
    $page_route = '';
    $data = compact('page_route', 'user');
    return view('user.professional-experience')->with($data);
  }
  public function pes(Request $request)
  {
    // printArray($request->all());
    // die;
    $request->validate(
      [
        'employer' => 'required',
        'position' => 'required',
        'duration' => 'required',
        'responsibilities' => 'required',
      ]
    );

    $field = new UserProfessionalExperience;
    $field->type = 'current';
    $field->user_id = session('userLoggedIn')['user_id'];
    $field->employer = $request->employer;
    $field->position = $request->position;
    $field->duration = $request->duration;
    $field->responsibilities = $request->responsibilities;
    $field->save();

    $userId = session('userLoggedIn')['user_id'];
    saveUserJobApplicationStep('professional-experience', '1', $userId);

    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('user/job-application/previous-employer');
  }
  public function preemp()
  {
    $user = User::find(session('userLoggedIn')['user_id']);
    $page_route = '';
    $data = compact('page_route', 'user');
    return view('user.previous-employer')->with($data);
  }
  public function preemps(Request $request)
  {
    // printArray($request->all());
    // die;
    $request->validate(
      [
        'employer' => 'required',
        'position' => 'required',
        'duration' => 'required',
        'responsibilities' => 'required',
      ]
    );

    $field = new UserProfessionalExperience;
    $field->type = 'previous';
    $field->user_id = session('userLoggedIn')['user_id'];
    $field->employer = $request->employer;
    $field->position = $request->position;
    $field->duration = $request->duration;
    $field->responsibilities = $request->responsibilities;
    $field->save();

    $userId = session('userLoggedIn')['user_id'];
    saveUserJobApplicationStep('previous-employer', '1', $userId);

    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('user/job-application/emergency-contact');
  }
  public function ec()
  {
    $user = User::find(session('userLoggedIn')['user_id']);
    $page_route = '';
    $data = compact('page_route', 'user');
    return view('user.emergency-contact')->with($data);
  }
  public function ecs(Request $request)
  {
    // printArray($request->all());
    // die;
    $request->validate(
      [
        'contact_name' => 'required',
        'relationship' => 'required',
        'contact_number' => 'required',
        'dob' => 'required',
        'gender' => 'required',
      ]
    );

    $field = new UserEmergencyContact();
    $field->user_id = session('userLoggedIn')['user_id'];
    $field->contact_name = $request->contact_name;
    $field->relationship = $request->relationship;
    $field->contact_number = $request->contact_number;
    $field->dob = $request->dob;
    $field->gender = $request->gender;
    $field->save();

    $userId = session('userLoggedIn')['user_id'];
    saveUserJobApplicationStep('emergency-contact', '1', $userId);

    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('user/job-application/motivation');
  }
  public function mot()
  {
    $user = User::find(session('userLoggedIn')['user_id']);
    $page_route = '';
    $data = compact('page_route', 'user');
    return view('user.motivation')->with($data);
  }
  public function mots(Request $request)
  {
    // printArray($request->all());
    // die;
    $request->validate(
      [
        'how_you_hear' => 'required',
        'why_join_us' => 'required',
        'why_consider_you' => 'required',
        'specific_skills' => 'required',
      ]
    );

    $field = User::find(session('userLoggedIn')['user_id']);
    $field->how_you_hear = $request->how_you_hear;
    $field->why_join_us = $request->why_join_us;
    $field->why_consider_you = $request->why_consider_you;
    $field->specific_skills = $request->specific_skills;
    $field->save();

    $userId = session('userLoggedIn')['user_id'];
    saveUserJobApplicationStep('motivation', '1', $userId);

    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('user/job-application/declaration');
  }
  public function dec()
  {
    $user = User::find(session('userLoggedIn')['user_id']);
    $page_route = '';
    $data = compact('page_route', 'user');
    return view('user.declaration')->with($data);
  }
  public function decs(Request $request)
  {
    // printArray($request->all());
    // die;
    // $request->validate(
    //   [
    //     'how_you_hear' => 'required',
    //     'why_join_us' => 'required',
    //     'why_consider_you' => 'required',
    //     'specific_skills' => 'required',
    //   ]
    // );

    $field = User::find(session('userLoggedIn')['user_id']);
    $field->job_application_score = 8;
    $field->save();

    $userId = session('userLoggedIn')['user_id'];

    // Call the helper function
    saveUserJobApplicationStep('declaration', '1', $userId);

    session()->flash('smsg', 'Job Application complete');
    return redirect('user/job-application/thank-you');
  }

  public function thankYou()
  {
    $user = User::find(session('userLoggedIn')['user_id']);
    $page_route = '';
    $data = compact('page_route', 'user');
    return view('user.thank-you')->with($data);
  }
}

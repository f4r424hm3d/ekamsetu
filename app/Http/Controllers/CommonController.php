<?php

namespace App\Http\Controllers;

use App\Models\University;
use App\Models\UniversityProgram;
use App\Models\UniversityTutionFee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CommonController extends Controller
{
  public function getSubStatusByStatus(Request $request)
  {
    //echo $id;
    $field = DB::table('lead_sub_statuses')->where('status_id', $request['status_id'])->get();
    $output = '<option value="">Select</option>';
    foreach ($field as $row) {
      $output .= '<option value="' . $row->id . '">' . $row->sub_status . '</option>';
    }
    echo $output;
  }
  public function changeStatus(Request $request)
  {
    echo $result = DB::table($request->tbl)->where('id', $request->id)->update(['status' => $request->val]);
  }
  public function updateField(Request $request)
  {
    echo $result = DB::table($request->tbl)->whereIn('id', $request->ids)->update([$request->col => $request->val]);
  }
  public function updateFieldById(Request $request)
  {
    echo $result = DB::table($request->tbl)->where('id', $request->id)->update([$request->col => $request->val]);
  }
  public function updateBulkField(Request $request)
  {
    echo $result = DB::table($request->tbl)->whereIn('id', $request->ids)->update([$request->col => $request->val]);
  }


  public function getCountryByDestination(Request $request)
  {
    //echo $id;
    $field = DB::table('destinations')->where('id', $request['destination_id'])->first();
    $output = $field->country;
    echo $output;
  }

  public function slugify(Request $request)
  {
    //echo $id;
    $output = slugify($request->text);
    echo $output;
  }
  public function getUniversityByCountry(Request $request)
  {
    //echo $id;
    $field = University::where('website', $request->website)->get();
    $output = '<option value="">Select</option>';
    foreach ($field as $row) {
      $output .= '<option value="' . $row->id . '">' . $row->name . '</option>';
    }
    echo $output;
  }
  public function getLevelByUniversity(Request $request)
  {
    //echo $id;
    $field = UniversityProgram::select('level')->groupBy('level')->where('university_id', $request->university_id)->get();
    $output = '<option value="">Select</option>';
    foreach ($field as $row) {
      $output .= '<option value="' . $row->level . '">' . $row->level . '</option>';
    }
    echo $output;
  }
  public function getCategory(Request $request)
  {
    //echo $id;
    $field = UniversityProgram::select('course_category_id')->groupBy('course_category_id')->where('university_id', $request->university_id)->where('level', $request->level)->get();
    $output = '<option value="">Select</option>';
    foreach ($field as $row) {
      $output .= '<option value="' . $row->course_category_id . '">' . $row->getCategory->name . '</option>';
    }
    echo $output;
  }
  public function getProgram(Request $request)
  {
    //echo $id;
    $field = UniversityProgram::where('university_id', $request->university_id)->where('level', $request->level)->where('course_category_id', $request->category)->get();
    $output = '<option value="">Select</option>';
    foreach ($field as $row) {
      $output .= '<option value="' . $row->id . '">' . $row->course_name . '</option>';
    }
    echo $output;
  }
  public function updateToken(Request $request)
  {
    //echo $id;
    $users = User::all();
    foreach ($users as $row) {
      $field = User::find($row->id);
      $field->token = Str::random(20);
      $field->save();
    }
  }
  //   public function updateCatSpcLvl(Request $request)
  //   {
  //     //echo $id;
  //     $users = UniversityTutionFee::all();
  //     foreach ($users as $row) {
  //       $field = UniversityTutionFee::find($row->id);
  //       $field->level = $row->getProgram->level;
  //       $field->course_category_id = $row->getProgram->course_category_id;
  //       $field->specialization_id = $row->getProgram->specialization_id;
  //       $field->save();
  //     }
  //   }
}

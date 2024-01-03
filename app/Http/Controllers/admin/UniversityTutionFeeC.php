<?php

namespace App\Http\Controllers\admin;

use App\Exports\UniversityPrograms;
use App\Http\Controllers\Controller;
use App\Imports\UniversityProgramTutionFeesImport;
use App\Models\CourseCategory;
use App\Models\CourseSpecialization;
use App\Models\Level;
use App\Models\University;
use App\Models\UniversityProgram;
use App\Models\UniversityTutionFee;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UniversityTutionFeeC extends Controller
{
  public function index(Request $request, $id = null)
  {
    $feesType = ['Year' => 'year', 'Semester' => 'semester', 'Total' => 'total'];
    $websites = ['Malaysia' => 'MYS', 'India' => 'IND'];
    $studentTypes = ['Local' => 'local', 'International' => 'international'];
    $scholarshipTypes = ['Percent' => 'percent', 'Amount' => 'amount'];

    $rows = UniversityTutionFee::where('id', '!=', 0);
    if ($request->has('university') && $request->university != '') {
      $rows = $rows->where('university_id', $request->university);
    }
    if ($request->has('level') && $request->level != '') {
      $rows = $rows->where('level', $request->level);
    }
    if ($request->has('category') && $request->category != '') {
      $rows = $rows->where('course_category_id', $request->category);
    }
    if ($request->has('specialization') && $request->specialization != '') {
      $rows = $rows->where('specialization_id', $request->specialization);
    }
    if ($request->has('program') && $request->program != '') {
      $rows = $rows->where('program_id', $request->program);
    }
    if ($request->has('fees_type') && $request->fees_type != '') {
      $rows = $rows->where('fees_type', $request->fees_type);
    }
    if ($request->has('scholarship_type') && $request->scholarship_type != '') {
      $rows = $rows->where('scholarship_type', $request->scholarship_type);
    }
    if ($request->has('student_type') && $request->student_type != '') {
      $rows = $rows->where('student_type', $request->student_type);
    }
    $rows = $rows->paginate(20);

    $cp = $rows->currentPage();
    $pp = $rows->perPage();
    $i = ($cp - 1) * $pp + 1;
    if ($id != null) {
      $sd = UniversityTutionFee::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/tution-fees/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/tution-fees');
      }
    } else {
      $ft = 'add';
      $url = url('admin/tution-fees/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "University Tution Fees";
    $page_route = "tution-fees";

    $filter_universities = UniversityTutionFee::with('getUniversity')->select('university_id')->groupBy('university_id')->get();

    $filter_levels = UniversityTutionFee::select('level')->groupBy('level');
    if ($request->has('university') && $request->university != '') {
      $filter_levels = $filter_levels->where('university_id', $request->university);
    }
    $filter_levels = $filter_levels->get();

    $filter_cats = UniversityTutionFee::select('course_category_id')->groupBy('course_category_id');
    if ($request->has('university') && $request->university != '') {
      $filter_cats = $filter_cats->where('university_id', $request->university);
    }
    if ($request->has('level') && $request->level != '') {
      $filter_cats = $filter_cats->where('level', $request->level);
    }
    $filter_cats = $filter_cats->get();

    $filter_spcs = UniversityTutionFee::select('specialization_id')->groupBy('specialization_id');
    if ($request->has('university') && $request->university != '') {
      $filter_spcs = $filter_spcs->where('university_id', $request->university);
    }
    if ($request->has('level') && $request->level != '') {
      $filter_spcs = $filter_spcs->where('level', $request->level);
    }
    if ($request->has('category') && $request->category != '') {
      $filter_spcs = $filter_spcs->where('course_category_id', $request->category);
    }
    $filter_spcs = $filter_spcs->get();

    $filter_programs = UniversityTutionFee::select('program_id')->groupBy('program_id');
    if ($request->has('university') && $request->university != '') {
      $filter_programs = $filter_programs->where('university_id', $request->university);
    }
    if ($request->has('level') && $request->level != '') {
      $filter_programs = $filter_programs->where('level', $request->level);
    }
    if ($request->has('category') && $request->category != '') {
      $filter_programs = $filter_programs->where('course_category_id', $request->category);
    }
    if ($request->has('specialization') && $request->specialization != '') {
      $filter_programs = $filter_programs->where('specialization_id', $request->specialization);
    }
    $filter_programs = $filter_programs->get();

    // $filter_cats = CourseCategory::where('website', 'MYS')->get();
    // $filter_spcs = CourseSpecialization::where('website', 'MYS')->get();
    //$filter_programs = UniversityTutionFee::select('program_id')->groupBy('program_id')->get();

    // printArray($filter_levels->toArray());
    // die;

    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'i', 'websites', 'studentTypes', 'feesType', 'scholarshipTypes', 'filter_universities', 'filter_programs', 'filter_levels', 'filter_cats', 'filter_spcs');
    return view('admin.tution-fees')->with($data);
  }
  public function store(Request $request)
  {
    // printArray($request->all());
    // die;
    $request->validate(
      [
        'university_id' => 'required',
        'program_id' => 'required',
        'tution_fees' => 'required',
        'fees_type' => 'required',
        'duration' => 'required',
        'student_type' => 'required',
      ]
    );

    $program_id = $request['program_id'];
    $tr = 0;
    $ir = 0;
    for ($i = 0; $i < count($program_id); $i++) {
      $tr++;
      $chk = UniversityTutionFee::where(['university_id' => $request['university_id'], 'program_id' => $program_id[$i], 'student_type' => $request['student_type']])->count();
      if ($chk == 0) {
        $progdet = UniversityProgram::find($program_id[$i]);
        $field = new UniversityTutionFee();
        $field->university_id = $request['university_id'];
        $field->program_id = $program_id[$i];
        $field->level = $progdet->level;
        $field->course_category_id = $progdet->course_category_id;
        $field->specialization_id = $progdet->specialization_id;
        $field->tution_fees = $request['tution_fees'];
        $field->fees_type = $request['fees_type'];
        $field->duration = strtolower($request['fees_type']) == 'total' ? '1' : $request['duration'];
        $field->scholarship_type = $request['scholarship_type'];
        $field->scholarship = $request['scholarship'];
        $field->student_type = $request['student_type'];
        $field->created_by = session()->get('adminLoggedIn')['user_id'];
        $field->save();
        $ir++;
      }
    }
    if ($ir == 0) {
      $msg = 'Duplicate rows found.';
    } else {
      $msg = $ir . ' record has been added succesfully.';
    }

    session()->flash('smsg', $msg);
    return redirect('admin/tution-fees/');
  }
  public function delete($id)
  {
    //echo $id;
    echo $result = UniversityTutionFee::find($id)->delete();
  }
  public function update($id, Request $request)
  {
    $request->validate(
      [
        'tution_fees' => 'required',
        'fees_type' => 'required',
        'duration' => 'required',
        'student_type' => 'required',
      ]
    );
    $field = UniversityTutionFee::find($id);
    $field->tution_fees = $request['tution_fees'];
    $field->fees_type = $request['fees_type'];
    $field->duration = strtolower($request['fees_type']) == 'total' ? '1' : $request['duration'];
    $field->scholarship_type = $request['scholarship_type'];
    $field->scholarship = $request['scholarship'];
    $field->student_type = $request['student_type'];
    $field->updated_by = session()->get('adminLoggedIn')['user_id'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/tution-fees/');
  }
  public function Import(Request $request)
  {
    // printArray($request->all());
    // die;
    $request->validate([
      'file' => 'required|mimes:xlsx,csv,xls'
    ]);
    $file = $request->file;
    if ($file) {
      try {
        $result = Excel::import(new UniversityProgramTutionFeesImport(), $file);
        // session()->flash('smsg', 'Data has been imported succesfully.');
        return redirect('admin/tution-fees/');
      } catch (\Exception $ex) {
        dd($ex);
      }
    }
  }
  public function export($university_id)
  {
    $data['university_id'] = $university_id;
    $university = University::find($university_id);
    return Excel::download(new UniversityPrograms($data), $university->uname . '-programs-list-' . date('Ymd-his') . '.xlsx');
  }
  public function getProgramList($id = null)
  {
    $websites = ['Malaysia' => 'MYS', 'India' => 'IND'];
    $page_title = "Export University Programs";
    $page_route = "";
    $data = compact('page_title', 'websites', 'page_route');
    return view('admin.export-university-program-page')->with($data);
  }
  public function getLevelByUniversity(Request $request)
  {
    //echo $id;
    $field = UniversityTutionFee::select('level')->groupBy('level')->where('university_id', $request->university_id)->get();
    //return json_encode($field);
    $output = '<option value="">Select...</option>';
    foreach ($field as $row) {
      $output .= '<option value="' . $row->level . '">' . $row->level . '</option>';
    }
    echo $output;
  }
  public function getCategory(Request $request)
  {
    //echo $id;
    $field = UniversityTutionFee::select('course_category_id')->groupBy('course_category_id');
    if ($request->has('university_id') && $request->university_id != null) {
      $field = $field->where('university_id', $request->university_id);
    }
    if ($request->has('level') && $request->level != null) {
      $field = $field->where('level', $request->level);
    }
    $field = $field->get();

    $output = '<option value="">Select...</option>';
    foreach ($field as $row) {
      $output .= '<option value="' . $row->course_category_id . '">' . $row->getCategory->name . '</option>';
    }
    echo $output;
  }
  public function getSpecialization(Request $request)
  {
    //echo $id;
    $field = UniversityTutionFee::select('specialization_id')->groupBy('specialization_id');
    if ($request->has('university_id') && $request->university_id != null) {
      $field = $field->where('university_id', $request->university_id);
    }
    if ($request->has('level') && $request->level != null) {
      $field = $field->where('level', $request->level);
    }
    if ($request->has('course_category_id') && $request->course_category_id != null) {
      $field = $field->where('course_category_id', $request->course_category_id);
    }
    $field = $field->get();

    $output = '<option value="">Select...</option>';
    foreach ($field as $row) {
      $output .= '<option value="' . $row->specialization_id . '">' . $row->getSpecialization->name . '</option>';
    }
    echo $output;
  }
  public function getProgram(Request $request)
  {
    //return json_encode($request->toArray());
    //echo $id;
    $field = UniversityTutionFee::where('id', '!=', '0');
    if ($request->has('university_id') && $request->university_id != null) {
      $field = $field->where('university_id', $request->university_id);
    }
    if ($request->has('level') && $request->level != null) {
      $field = $field->where('level', $request->level);
    }
    if ($request->has('course_category_id') && $request->course_category_id != null) {
      $field = $field->where('course_category_id', $request->course_category_id);
    }
    if ($request->has('specialization_id') && $request->specialization_id != null) {
      $field = $field->where('specialization_id', $request->specialization_id);
    }
    $field = $field->get();

    $output = '<option value="">Select...</option>';
    foreach ($field as $row) {
      $output .= '<option value="' . $row->program_id . '">' . $row->getProgram->course_name . '</option>';
    }
    echo $output;
  }
}

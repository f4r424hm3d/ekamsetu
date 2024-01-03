<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\University;
use App\Models\UniversityOtherFee;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UniversityOtherFeeC extends Controller
{
  public function index($id = null)
  {
    $websites = ['Malaysia' => 'MYS', 'India' => 'IND'];
    $studentTypes = ['Local' => 'LOCAL', 'International' => 'INTERNATIONAL'];

    $filter_universities = UniversityOtherFee::with('getUniversity')->select('university_id')->groupBy('university_id')->get();
    $filter_levels = UniversityOtherFee::select('level')->groupBy('level')->get();
    // printArray($filter_universities->toArray());
    // die;

    $levels = DB::table('tbl_level')->select('level')->get();
    $page_no = $_GET['page'] ?? 1;
    if ($id != null) {
      $sd = UniversityOtherFee::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/other-fees/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/other-fees/');
      }
    } else {
      $ft = 'add';
      $url = url('admin/other-fees/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "University Other Fees";
    $page_route = "other-fees";
    $data = compact('sd', 'ft', 'title', 'page_title', 'page_route', 'page_no', 'url', 'websites', 'levels', 'studentTypes', 'filter_universities', 'filter_levels');
    return view('admin.other-fees')->with($data);
  }
  public function getData(Request $request)
  {
    // return $request;
    // die;
    $rows = UniversityOtherFee::where('id', '!=', 0);
    if ($request->has('university_id') && $request->university_id != '') {
      $rows = $rows->where('university_id', $request->university_id);
    }
    if ($request->has('level') && $request->level != '') {
      $rows = $rows->where('level', $request->level);
    }
    if ($request->has('student_type') && $request->student_type != '') {
      $rows = $rows->where('student_type', $request->student_type);
    }
    $rows = $rows->paginate(10)->withPath('/admin/other-fees/');
    $i = 1;
    $output = '<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
      <tr>
      <th>S.No.</th>
      <th>University</th>
      <th>Level</th>
      <th>For</th>
      <th>Fees Description</th>
      <th>Action</th>
      </tr>
    </thead>
    <tbody>';
    foreach ($rows as $row) {
      $badge = $row->student_type == 'LOCAL' ? 'success' : 'danger';
      $output .= '<tr id="row' . $row->id . '">
      <td>' . $i . '</td>
      <td>' . $row->getUniversity->name . '</td>
      <td>' . $row->level . '</td>
      <td><span class="badge bg-' . $badge . '">' . $row->student_type . '</span></td>
      <td>';
      if ($row->fees_description != null) {
        $output .= '<button type="button" class="btn btn-xs btn-outline-info waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#SModalScrollable' . $row->id . '">View</button>
        <div class="modal fade" id="SModalScrollable' . $row->id . '" tabindex="-1" role="dialog"
          aria-labelledby="SModalScrollableTitle' . $row->id . '" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                ' . $row->fees_description . '
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>';
      } else {
        $output .= 'N/A';
      }
      $output .= '</td>
      <td>';
      if (session()->get('adminLoggedIn')['role'] == 'admin') {
        $output .= '<a href="javascript:void()" onclick="DeleteAjax(`' . $row->id . '`)"
          class="waves-effect waves-light btn btn-xs btn-outline btn-danger">
          <i class="fa fa-trash" aria-hidden="true"></i>
        </a>&nbsp;';
      }
      $output .= '<a href="' . url('admin/other-fees/update/' . $row->id) . '"
          class="waves-effect waves-light btn btn-xs btn-outline btn-info">
          <i class="fa fa-edit" aria-hidden="true"></i>
        </a>
      </td>
    </tr>';
      $i++;
    }
    $output .= '</tbody></table>';
    $output .= '<div>' . $rows->links('pagination::bootstrap-5') . '</div>';
    return $output;
  }
  public function storeAjax(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'university_id' => 'required',
      'level' => 'required',
      'fees_description' => 'required',
      'student_type' => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $levels = $request['level'];
    $tr = 0;
    $ir = 0;
    for ($i = 0; $i < count($levels); $i++) {
      $tr++;
      $chk = UniversityOtherFee::where(['university_id' => $request['university_id'], 'level' => $levels[$i], 'student_type' => $request['student_type']])->count();
      if ($chk == 0) {
        $field = new UniversityOtherFee();
        $field->university_id = $request['university_id'];
        $field->level = $levels[$i];
        $field->fees_description = $request['fees_description'];
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
    return response()->json(['success' => $msg]);
  }
  public function update($id, Request $request)
  {
    $request->validate(
      [
        'level' => 'required',
        'fees_description' => 'required',
        'student_type' => 'required',
      ]
    );

    $field = UniversityOtherFee::find($id);
    $field->level = $request['level'];
    $field->fees_description = $request['fees_description'];
    $field->student_type = $request['student_type'];
    $field->updated_by = session()->get('adminLoggedIn')['user_id'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/other-fees');
  }
  public function delete($id)
  {
    //echo $id;
    echo $result = UniversityOtherFee::find($id)->delete();
  }
}

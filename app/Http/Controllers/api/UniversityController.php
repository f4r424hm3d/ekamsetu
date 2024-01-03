<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\University;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
  public function index(Request $request)
  {
    $perPage = $request->input('per_page', 10);
    $universities = University::paginate($perPage);
    return response()->json($universities);
  }
  public function singleUniversity($id, Request $request)
  {
    $university = University::find($id);
    if ($university != false) {
      return response()->json($university);
    } else {
      return response()->json(['error' => 'Page Not Found']);
    }
  }
}

@php
  use App\Models\StudyMode;
@endphp
@extends('admin.layouts.main')
@push('title')
  <title>{{ $page_title }}</title>
@endpush
@section('main-section')
  <div class="page-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">{{ $page_title }}</h4>
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="{{ url('/admin/') }}"><i class="mdi mdi-home-outline"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $page_title }}</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-12">
          <!-- NOTIFICATION FIELD START -->
          <x-ResultNotificationField></x-ResultNotificationField>
          <!-- NOTIFICATION FIELD END -->
        </div>
      </div>
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">
                {{ $title }} Record
                <span style="float:right;">
                  <button class="btn btn-xs btn-info tglBtn">+</button>
                  <button class="btn btn-xs btn-info tglBtn hide-this">-</button>
                </span>
              </h4>
            </div>
            <div class="card-body {{ $ft == 'edit' ? '' : 'hide-thi' }}" id="tblCDiv">
              <!-- IMPORT FORM START -->
              <x-ImportForm :pageRoute="$page_route" fileName="university-program-tution-fees">
              </x-ImportForm>
              <hr>
              <!-- IMPORT FORM END -->
              <form action="{{ $url }}" class="needs-validation" method="post" enctype="multipart/form-data"
                novalidat>
                @csrf
                <div class="row">
                  @if ($ft == 'add')
                    <div class="col-md-3 col-sm-12 mb-3">
                      <x-SDASelectField label="Country" name="country" id="country" :ft="$ft" :sd="$sd"
                        :list="$websites" required="required">
                      </x-SDASelectField>
                    </div>
                    <div class="col-md-3 col-sm-12 mb-3">
                      <x-EmptySelectField label="University" name="university_id" id="university_id" :ft="$ft"
                        :sd="$sd" savev="id" showv="name" required="required"></x-EmptySelectField>
                    </div>
                    <div class="col-md-3 col-sm-12 mb-3">
                      <x-EmptySelectField label="Level" name="level" id="level" :ft="$ft" :sd="$sd"
                        savev="id" showv="name" required="required"></x-EmptySelectField>
                    </div>
                    <div class="col-md-3 col-sm-12 mb-3">
                      <x-EmptySelectField label="Category" name="category" id="category" :ft="$ft"
                        :sd="$sd" savev="id" showv="name" required="required"></x-EmptySelectField>
                    </div>
                    <div class="col-md-3 col-sm-12 mb-3">
                      <div class="form-group">
                        <label>Program <span class="text-danger">*</span></label>
                        <select name="program_id[]" id="program" class="form-control select-with-search" required
                          multiple>
                          <option value="">Select</option>
                        </select>
                        <span class="text-danger">
                          @error('program_id')
                            {{ $message }}
                          @enderror
                        </span>
                      </div>
                    </div>
                  @endif
                  <?php if ($ft == "edit"){ ?>
                  <div class="col-md-6 col-sm-12 mb-3">
                    <div class="form-group">
                      <label>University</label>
                      <input type="text" class="form-control" value="{{ $sd->getUniversity->name }}" disabled>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12 mb-3">
                    <div class="form-group">
                      <label>Program</label>
                      <input type="text" class="form-control" value="{{ $sd->getProgram->course_name }}" disabled>
                    </div>
                  </div>
                  <?php } ?>
                  <div class="col-md-3 col-sm-12 mb-3">
                    <x-InputField type="number" label="Tution Fee" name="tution_fees" id="tution_fees" :ft="$ft"
                      :sd="$sd" required="required"></x-InputField>
                  </div>
                  <div class="col-md-3 col-sm-12 mb-3">
                    <x-SDASelectField label="Fees Type" name="fees_type" id="fees_type" :ft="$ft"
                      :sd="$sd" :list="$feesType" required="required"></x-SDASelectField>
                  </div>
                  <div class="col-md-3 col-sm-12 mb-3">
                    <x-InputField type="number" label="Duration /Number of Year or Semester" name="duration"
                      id="duration" :ft="$ft" :sd="$sd" required="required"></x-InputField>
                  </div>
                  <div class="col-md-3 col-sm-12 mb-3">
                    <x-SDASelectField label="Scholarship Type" name="scholarship_type" id="scholarship_type"
                      :ft="$ft" :sd="$sd" :list="$scholarshipTypes" required="required"></x-SDASelectField>
                  </div>
                  <div class="col-md-3 col-sm-12 mb-3">
                    <div class="form-group">
                      <label>Scholarship (%) <span class="text-danger">*</span></label>
                      <input name="scholarship" id="scholarship" type="number" class="form-control"
                        placeholder="Scholarship (%)"
                        value="{{ $ft == 'edit' ? $sd->scholarship : old('scholarship') }}" min="0"
                        max="100">
                      <span class="text-danger" id="scholarship-err">
                        @error('scholarship')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12 mb-3">
                    <x-SDASelectField label="For Student" name="student_type" id="student_type" :ft="$ft"
                      :sd="$sd" :list="$studentTypes" required="required"></x-SDASelectField>
                  </div>
                </div>
                @if ($ft == 'add')
                  <button type="reset" class="btn btn-sm btn-warning  mr-1"><i class="ti-trash"></i> Reset</button>
                @endif
                @if ($ft == 'edit')
                  <a href="{{ aurl($page_route) }}" class="btn btn-sm btn-info "><i class="ti-trash"></i> Cancel</a>
                @endif
                <button class="btn btn-sm btn-primary" type="submit">Submit</button>
              </form>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h4 class="card-title"> Filter </h4>
            </div>
            <div class="card-body" id="tblCDiv">
              <form id="FilterForm" class="needs-validation" method="get" enctype="multipart/form-data" novalidate>
                <div class="row">
                  <div class="form-group col-md-3 col-sm-12 mb-3">
                    <label>University</label>
                    <select name="university" id="f_university" class="form-control select-with-search">
                      <option value="">Select</option>
                      @foreach ($filter_universities as $row)
                        <option value="{{ $row->university_id }}"
                          {{ isset($_GET['university']) && $_GET['university'] == $row->university_id ? 'selected' : '' }}>
                          {{ $row->getUniversity->name }}</option>
                      @endforeach
                    </select>
                    <span class="text-danger">
                      @error('university')
                        {{ $message }}
                      @enderror
                    </span>
                  </div>
                  <div class="form-group col-md-3 col-sm-12 mb-3">
                    <label>Level</label>
                    <select name="level" id="f_level" class="form-control select-with-search">
                      <option value="">Select</option>
                      @foreach ($filter_levels as $row)
                        <option value="{{ $row->level }}"
                          {{ isset($_GET['level']) && $_GET['level'] == $row->level ? 'selected' : '' }}>
                          {{ $row->level }}</option>
                      @endforeach
                    </select>
                    <span class="text-danger">
                      @error('level')
                        {{ $message }}
                      @enderror
                    </span>
                  </div>
                  <div class="form-group col-md-3 col-sm-12 mb-3">
                    <label>Category</label>
                    <select name="category" id="f_category" class="form-control select-with-search">
                      <option value="">Select</option>
                      @foreach ($filter_cats as $row)
                        <option value="{{ $row->course_category_id }}"
                          {{ isset($_GET['category']) && $_GET['category'] == $row->course_category_id ? 'selected' : '' }}>
                          {{ $row->getCategory->name }}</option>
                      @endforeach
                    </select>
                    <span class="text-danger">
                      @error('category')
                        {{ $message }}
                      @enderror
                    </span>
                  </div>
                  <div class="form-group col-md-3 col-sm-12 mb-3">
                    <label>Specializations</label>
                    <select name="specialization" id="f_specialization" class="form-control select-with-search">
                      <option value="">Select</option>
                      @foreach ($filter_spcs as $row)
                        <option value="{{ $row->specialization_id }}"
                          {{ isset($_GET['specialization']) && $_GET['specialization'] == $row->specialization_id ? 'selected' : '' }}>
                          {{ $row->getSpecialization->name }}</option>
                      @endforeach
                    </select>
                    <span class="text-danger">
                      @error('specialization')
                        {{ $message }}
                      @enderror
                    </span>
                  </div>
                  <div class="form-group col-md-3 col-sm-12 mb-3">
                    <label>Program</label>
                    <select name="program" id="f_program" class="form-control select-with-search" required>
                      <option value="">Select</option>
                      @foreach ($filter_programs as $row)
                        <option value="{{ $row->program_id }}"
                          {{ isset($_GET['program']) && $_GET['program'] == $row->program_id ? 'selected' : '' }}>
                          {{ $row->getProgram->course_name }}</option>
                      @endforeach
                    </select>
                    <span class="text-danger">
                      @error('level')
                        {{ $message }}
                      @enderror
                    </span>
                  </div>
                  <div class="form-group col-md-3 col-sm-12 mb-3 hide-this">
                    <label>Fees Type</label>
                    <select name="fees_type" class="form-control select-with-search">
                      <option value="">Select</option>
                      @foreach ($feesType as $key => $value)
                        <option value="{{ $key }}"
                          {{ isset($_GET['fees_type']) && $_GET['fees_type'] == $key ? 'selected' : '' }}>
                          {{ $value }}</option>
                      @endforeach
                    </select>
                    <span class="text-danger">
                      @error('fees_type')
                        {{ $message }}
                      @enderror
                    </span>
                  </div>
                  <div class="form-group col-md-3 col-sm-12 mb-3 hide-this">
                    <label>Scholarship Type</label>
                    <select name="scholarship_type" class="form-control select-with-search">
                      <option value="">Select</option>
                      @foreach ($scholarshipTypes as $key => $value)
                        <option value="{{ $key }}"
                          {{ isset($_GET['scholarship_type']) && $_GET['scholarship_type'] == $key ? 'selected' : '' }}>
                          {{ $value }}</option>
                      @endforeach
                    </select>
                    <span class="text-danger">
                      @error('scholarship_type')
                        {{ $message }}
                      @enderror
                    </span>
                  </div>
                  <div class="form-group col-md-3 col-sm-12 mb-3">
                    <label>Student Type <span class="text-danger">(Required)</span></label>
                    <select name="student_type" id="f_student_type" class="form-control select-with-search">
                      <option value="">Select</option>
                      @foreach ($studentTypes as $key => $value)
                        <option value="{{ $key }}"
                          {{ isset($_GET['student_type']) && $_GET['student_type'] == $key ? 'selected' : '' }}>
                          {{ $value }}</option>
                      @endforeach
                    </select>
                    <span class="text-danger">
                      @error('student_type')
                        {{ $message }}
                      @enderror
                    </span>
                  </div>
                </div>
                <a href="{{ aurl($page_route) }}" class="btn btn-sm btn-info ">Clear</a>
                <button id="filterSubmitBtn" class="btn btn-sm btn-primary" type="submit" disabled>Apply</button>
              </form>
            </div>
          </div>
          <!-- end card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">
                {{ $page_title }} List
                <span style="float:right;" class="hide-thi">
                  <a href="{{ aurl($page_route . '/export/') }}" class="btn btn-xs btn-success">Export</a>
                </span>
              </h4>
            </div>
            <div class="card-body">
              <table id="datatabl" class="table table-bordered dt-responsive nowrap w-100">
                <thead>
                  <tr>
                    <th>
                      <input style="opacity: 9;left:30px" type="checkbox" name="check_all" id="check_all"
                        value="" />
                    </th>
                    <th>Sr. No.</th>
                    <th>Program</th>
                    <th>Fees</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($rows as $row)
                    @php
                      $badge = $row->student_type == 'LOCAL' ? 'success' : 'danger';
                    @endphp
                    <tr id="row{{ $row->id }}">
                      <td>
                        <input style="opacity: 9;left:30px" type="checkbox" name="selected_id[]" class="checkbox"
                          value="{{ $row->id }}" />
                      </td>
                      <td>{{ $i }}</td>
                      <td>
                        Program : {{ $row->getProgram->course_name }} <br>
                        University : {{ $row->getUniversity->name }} <br>
                        Level : {{ $row->getProgram->level }} <br>
                        Category : {{ $row->getCategory->name }} <br>
                        Spc : {{ $row->getSpecialization->name }} <br>
                        For : <span class="badge bg-{{ $badge }}">{{ $row->student_type }}</span> <br>
                      </td>
                      <td>
                        <table class="table table-sm">
                          <tr>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>Amount</th>
                          </tr>
                          <tr>
                            <td>Tution Fees (Per {{ $row->fees_type }})</td>
                            @if ($row->fees_type == 'total')
                              <td></td>
                            @else
                              <td>{{ $row->duration }} x {{ number_format($row->tution_fees, 0) }}</td>
                            @endif
                            <td>{{ number_format($row->duration * $row->tution_fees, 0) }}</td>
                          </tr>
                          @if ($row->scholarship != null || $row->scholarship != 0)
                            <tr>
                              <td>Scholarship {{ $row->scholarship_type == 'AMOUNT' ? '' : '%' }}</td>
                              @if ($row->scholarship_type == 'AMOUNT')
                                <td>{{ $row->scholarship != null || $row->scholarship != 0 ? $row->scholarship : 'N/A' }}
                                </td>
                                <td>
                                  {{ $row->scholarship != null || $row->scholarship != 0 ? '-' . $row->scholarship : 'N/A' }}
                                </td>
                              @else
                                <td>
                                  {{ $row->scholarship != null || $row->scholarship != 0 ? $row->scholarship . ' %' : 'N/A' }}
                                </td>
                                <td>-{{ get_percentage_val($row->scholarship, $row->duration * $row->tution_fees) }}</td>
                              @endif
                            </tr>
                          @endif
                          <tr>
                            <td colspan="2"><b>Tution Fees After Discount</b></td>
                            <td>
                              <b>{{ calc_final_fees($row->duration, $row->tution_fees, $row->scholarship, $row->scholarship_type) }}</b>
                            </td>
                          </tr>
                        </table>
                      </td>
                      <td>
                        @if (session()->get('adminLoggedIn')['role'] == 'admin')
                          <a href="javascript:void()" onclick="deleteData('{{ $row->id }}')"
                            class="waves-effect waves-light btn btn-xs btn-outline btn-danger">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                          </a>
                        @endif
                        <a href="{{ url('admin/' . $page_route . '/update/' . $row->id) }}"
                          class="waves-effect waves-light btn btn-xs btn-outline btn-info">
                          <i class="fa fa-edit" aria-hidden="true"></i>
                        </a>
                      </td>
                    </tr>
                    @php
                      $i++;
                    @endphp
                  @endforeach
                </tbody>
              </table>
              {!! $rows->links('pagination::bootstrap-5') !!}
              <hr>
              <div class="hide-this" id="submitBtn">
                <a onclick="downloadTutionFees()" href="javascript:void()" data-toggle="tooltip"
                  class="btn btn-sm btn-info" title="Download Only Tution Fees" value="tutionfees">Download Only Tution
                  Fees</a>
                <a onclick="downloadFullFees()" href="javascript:void()" data-toggle="tooltip"
                  class="btn btn-sm btn-info" title="Download Full Fees" value="fullfees">Download Full Fees</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    function downloadTutionFees(id) {
      var fees_id = [];
      $(".checkbox:checked").each(function() {
        var feesid = $(this).val();
        fees_id.push(feesid);
      });
      window.open("{{ aurl('download-only-tution-fees') }}" + "?fees_id=" + fees_id, "_blank");
    }

    function downloadFullFees(id) {
      //window.open("{{ aurl('download-full-fees') }}", "_blank");
      var fees_id = [];
      $(".checkbox:checked").each(function() {
        var feesid = $(this).val();
        fees_id.push(feesid);
      });
      //alert(fees_id);
      window.open("{{ aurl('download-full-fees') }}" + "?fees_id=" + fees_id, "_blank");
      //   $.ajax({
      //     url: "{{ aurl('download-full-fees') }}",
      //     type: 'GET',
      //     data: {
      //       fees_id: fees_id,
      //     },
      //     success: function(response) {
      //       alert('Success');
      //     }
      //   });
    }

    $(document).ready(function() {
      $('#check_all').on('click', function() {
        if (this.checked) {
          $('.checkbox').each(function() {
            this.checked = true;
            $(this).closest('tr').addClass('selectedRow');
          });
        } else {
          $('.checkbox').each(function() {
            this.checked = false;
            $(this).closest('tr').removeClass('selectedRow');
          });
        }
      });
      $('.checkbox').on('click', function() {
        if ($('.checkbox:checked').length == $('.checkbox').length) {
          $('#check_all').prop('checked', true);
        } else {
          $('#check_all').prop('checked', false);
        }
      });
      $('.checkbox').on('click', function() {
        if ($('.checkbox:checked').length > 0) {
          $('#submitBtn').show();
        } else {
          $('#submitBtn').hide();
        }
      });
      $('#check_all').on('click', function() {
        if ($('.checkbox:checked').length > 0) {
          $('#submitBtn').show();
        } else {
          $('#submitBtn').hide();
        }
      });
      $('.checkbox').click(function() {
        if ($(this).is(':checked')) {
          $(this).closest('tr').addClass('selectedRow');
        } else {
          $(this).closest('tr').removeClass('selectedRow');
        }
      });
    });

    $(function() {
      $("#FilterForm").submit(function() {
        $(this).find(":input").filter(function() {
          return !this.value;
        }).attr("disabled", "disabled");
        return true; // ensure form still submits
      });
    });

    $(document).ready(function() {
      $('#country').on('change', function(event) {
        var country = $('#country').val();
        $.ajax({
          url: "{{ aurl('get-university-by-country') }}",
          method: "GET",
          data: {
            website: country,
          },
          success: function(data) {
            //alert(data);
            $('#university_id').html(data);
          }
        })
      });
      $('#university_id').on('change', function(event) {
        var university_id = $('#university_id').val();
        $.ajax({
          url: "{{ aurl('get-level-by-university') }}",
          method: "GET",
          data: {
            university_id: university_id,
          },
          success: function(data) {
            //alert(data);
            $('#level').html(data);
          }
        })
      });
      $('#level').on('change', function(event) {
        var level = $('#level').val();
        var university_id = $('#university_id').val();
        $.ajax({
          url: "{{ aurl('get-category') }}",
          method: "GET",
          data: {
            level: level,
            university_id: university_id,
          },
          success: function(data) {
            //alert(data);
            $('#category').html(data);
          }
        })
      });
      $('#category').on('change', function(event) {
        var category = $('#category').val();
        var level = $('#level').val();
        var university_id = $('#university_id').val();
        $.ajax({
          url: "{{ aurl('get-program') }}",
          method: "GET",
          data: {
            category: category,
            level: level,
            university_id: university_id,
          },
          success: function(data) {
            //alert(data);
            $('#program').html(data);
          }
        })
      });
      $('#scholarship_type').on('change', function(event) {
        var scholarship_type = $('#scholarship_type').val();
        if (scholarship_type == 'amount') {
          $('#scholarship').removeAttr('max');
        }
        if (scholarship_type == 'percent') {
          $('#scholarship').attr('max', '100');
        }
      });
    });

    $(document).ready(function() {
      enableDisableFilterForm();

      $('#f_university').on('change', function(event) {
        var f_university = $('#f_university').val();
        $.ajax({
          url: "{{ aurl('tution-fees-filter/get-level-by-university') }}",
          method: "GET",
          data: {
            university_id: f_university,
          },
          success: function(data) {
            //alert(data);
            $('#f_level').html(data);
          }
        });
      });
      $('#f_level').on('change', function(event) {
        var level = $('#f_level').val();
        var university_id = $('#f_university').val();
        $.ajax({
          url: "{{ aurl('tution-fees-filter/get-category') }}",
          method: "GET",
          data: {
            level: level,
            university_id: university_id,
          },
          success: function(data) {
            //alert(data);
            $('#f_category').html(data);
          }
        })
      });
      $('#f_category').on('change', function(event) {
        var category = $('#f_category').val();
        var level = $('#f_level').val();
        var university_id = $('#f_university').val();
        $.ajax({
          url: "{{ aurl('tution-fees-filter/get-specialization') }}",
          method: "GET",
          data: {
            course_category_id: category,
            level: level,
            university_id: university_id,
          },
          success: function(data) {
            //alert(data);
            $('#f_specialization').html(data);
          }
        })
      });
      $('#f_specialization').on('change', function(event) {
        var specialization_id = $('#f_specialization').val();
        var category = $('#f_category').val();
        var level = $('#f_level').val();
        var university_id = $('#f_university').val();
        $.ajax({
          url: "{{ aurl('tution-fees-filter/get-program') }}",
          method: "GET",
          data: {
            specialization_id: specialization_id,
            course_category_id: category,
            level: level,
            university_id: university_id,
          },
          success: function(data) {
            //alert(data);
            $('#f_program').html(data);
          }
        })
      });
      $('#f_student_type').on('change', function(event) {
        enableDisableFilterForm();
      });
    });

    function enableDisableFilterForm() {
      var f_student_type = $('#f_student_type').val();
      //alert(f_student_type);
      if (f_student_type != '') {
        $('#filterSubmitBtn').removeAttr('disabled');
      }
      if (f_student_type == '') {
        $('#filterSubmitBtn').attr('disabled', 'disabled');
      }
    }

    function deleteData(id) {
      //alert(id);
      var cd = confirm("Are you sure ?");
      if (cd == true) {
        $.ajax({
          url: "{{ url('admin/' . $page_route . '/delete') }}" + "/" + id,
          success: function(data) {
            if (data == '1') {
              var h = 'Success';
              var msg = 'Record deleted successfully';
              var type = 'success';
              $('#row' + id).remove();
              $('#toastMsg').text(msg);
              $('#liveToast').show();
              showToastr(h, msg, type);
            }
          }
        });
      }
    }
  </script>
@endsection

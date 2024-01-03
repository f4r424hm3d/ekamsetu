@extends('admin.layouts.main')
@push('title')
<title>{{ $page_title }}</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
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
          <div class="card-body" id="tblCDiv">
            <form id="{{ $ft=='add' ? 'dataForm' : 'editForm' }}" {{ $ft=='edit' ?'action='.$url:'' }} class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
              @csrf
              <div class="row">
                <?php if ($ft == "add"){ ?>
                <div class="col-md-3 col-sm-12 mb-3">
                  <x-SDASelectField label="Country" name="country" id="country" :ft="$ft" :sd="$sd" :list="$websites">
                  </x-SDASelectField>
                </div>
                <div class="col-md-3 col-sm-12 mb-3">
                  <x-EmptySelectField label="University" name="university_id" id="university_id" :ft="$ft" :sd="$sd"
                    savev="id" showv="name"></x-EmptySelectField>
                </div>
                <div class="col-md-3 col-sm-12 mb-3">
                  <x-MultipleSelectField label="Level" name="level" id="level" :ft="$ft" :sd="$sd" :list="$levels"
                    savev="level" showv="level"></x-MultipleSelectField>
                </div>
                <?php } ?>
                <?php if ($ft == "edit"){ ?>
                <div class="col-md-3 col-sm-12 mb-3">
                  <div class="form-group">
                    <label>University</label>
                    <input type="text" class="form-control" value="{{ $sd->getUniversity->name }}" disabled>
                  </div>
                </div>
                <div class="col-md-3 col-sm-12 mb-3">
                  <x-SelectField label="Level" name="level" id="level" :ft="$ft" :sd="$sd" :list="$levels" savev="level"
                    showv="level"></x-SelectField>
                </div>
                <?php } ?>
                <div class="col-md-3 col-sm-12 mb-3">
                  <x-SDASelectField label="For Student" name="student_type" id="student_type" :ft="$ft" :sd="$sd"
                    :list="$studentTypes"></x-SDASelectField>
                </div>
                <div class="col-md-12 col-sm-12 mb-3">
                  <x-TextareaField label="Fees Description" name="fees_description" id="fees_description" :ft="$ft"
                    :sd="$sd">
                  </x-TextareaField>
                </div>
              </div>
              <?php if ($ft == "add"){ ?>
                <button type="reset" class="btn btn-sm btn-warning  mr-1">Reset</button>
              <?php } ?>
              <?php if ($ft == "edit"){ ?>
                <a href="{{ aurl($page_route) }}" class="btn btn-sm btn-info ">Cancel</a>
              <?php } ?>
              <button class="btn btn-sm btn-primary" type="submit">Submit</button>
            </form>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> Filter </h4>
          </div>
          <div class="card-body" id="tblCDiv">
            <form class="needs-validation" method="get" enctype="multipart/form-data" novalidate>
              <div class="row">
                <div class="form-group col-md-3 col-sm-12 mb-3">
                  <label>University</label>
                  <select name="university" class="form-control select-with-search" data-placeholder="Select" required>
                    <option value="">Select</option>
                    @foreach ($filter_universities as $row)
                    <option value="{{ $row->university_id }}" {{ isset($_GET['university']) && $_GET['university'] == $row->university_id ?'selected':'' }}>{{ $row->getUniversity->name }}</option>
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
                  <select name="level" class="form-control select-with-search" data-placeholder="Select" required>
                    <option value="">Select</option>
                    @foreach ($filter_levels as $row)
                    <option value="{{ $row->level }}" {{ isset($_GET['level']) && $_GET['level'] == $row->level ?'selected':'' }}>{{ $row->level }}</option>
                    @endforeach
                  </select>
                  <span class="text-danger">
                    @error('level')
                    {{ $message }}
                    @enderror
                  </span>
                </div>
                <div class="form-group col-md-3 col-sm-12 mb-3">
                  <label>Student Type</label>
                  <select name="student_type" class="form-control select-with-search" data-placeholder="Select" required>
                    <option value="">Select</option>
                    @foreach ($studentTypes as $key => $value)
                    <option value="{{ $key }}" {{ isset($_GET['student_type']) && $_GET['student_type'] == $key ?'selected':'' }}>{{ $value }}</option>
                    @endforeach
                  </select>
                  <span class="text-danger">
                    @error('student_type')
                    {{ $message }}
                    @enderror
                  </span>
                </div>
              </div>
              <a href="{{ aurl($page_route) }}" class="btn btn-sm btn-info ">Cancel</a>
              <button class="btn btn-sm btn-primary" type="submit">Apply</button>
            </form>
          </div>
        </div>
        <!-- end card -->
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body" id="trdata">



          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $(document).on('click', '.pagination a', function(event){
      event.preventDefault();
      var page = $(this).attr('href').split('page=')[1];
      getData(page);
    });
  });

  getData();

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
  });

  function getData(page){
    if(page){
      page = page;
    }else{
      var page = '{{ $page_no }}';
    }
    var university_id = "{{ isset($_GET['university'])?$_GET['university']:'' }}";
    var level = "{{ isset($_GET['level'])?$_GET['level']:'' }}";
    var student_type = "{{ isset($_GET['student_type'])?$_GET['student_type']:'' }}";
    return new Promise(function(resolve,reject) {
      //$("#migrateBtn").text('Migrating...');
      setTimeout(() => {
        $.ajax({
          url: "{{ aurl($page_route.'/get-data') }}",
          method: "GET",
          data: {
            page: page,
            university_id: university_id,
            level: level,
            student_type: student_type,
          },
          success: function(data) {
            $("#trdata").html(data);
          }
        });
      });
    });
  }

  $(function(){
    var $fees_description = CKEDITOR.replace("fees_description");

    $fees_description.on('change', function() {
      $fees_description.updateElement();
    });
  });
</script>
@endsection

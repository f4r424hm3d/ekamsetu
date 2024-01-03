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
                Export University Program
                <span style="float:right;">
                  <button class="btn btn-xs btn-info tglBtn">+</button>
                  <button class="btn btn-xs btn-info tglBtn hide-this">-</button>
                </span>
              </h4>
            </div>
            <div class="card-body" id="tblCDiv">
              <form action="#" class="needs-validation" method="post" enctype="multipart/form-data" novalidat>
                @csrf
                <div class="row">
                  <div class="col-md-3 col-sm-12 mb-3">
                    <div class="form-group">
                      <label>Country</label>
                      <select name="country" id="country" class="form-control select-with-search" required>
                        <option value="">Select</option>
                        @foreach ($websites as $key => $value)
                          <option value="{{ $value }}">{{ $key }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12 mb-3">
                    <div class="form-group">
                      <label>University</label>
                      <select name="university_id" id="university_id" class="form-control select-with-search"
                        data-placeholder="Select">
                        <option value="">Select</option>

                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12 mb-3">
                    <a href="#" onclick="exportUniversityPrograms()" class="btn btn-sm btn-primary"
                      type="submit">Export</a>
                  </div>
                </div>

              </form>
            </div>
          </div>
          <!-- end card -->
        </div>
      </div>
    </div>
  </div>
  <script>
    function exportUniversityPrograms(id) {
      var university_id = $('#university_id').val();
      if (university_id != '') {
        window.open("{{ aurl('tution-fees/export/') }}/" + university_id, "_self");
      }
    }

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
  </script>
@endsection

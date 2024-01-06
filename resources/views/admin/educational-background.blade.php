@extends('user.layouts.main')
@push('title')
  <title>Educational Background</title>
@endpush
@section('main-section')
  <!-- Page Wrapper -->
  <div class="page-wrapper">
    <div class="content container-fluid">

      <!-- Page Header -->
      <div class="crms-title row bg-white mb-4">
        <div class="col">
          <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
              <i class="la la-table"></i>
            </span> <span>Job Application</span>
          </h3>
        </div>
        <div class="col text-end">
          <ul class="breadcrumb bg-white float-end m-0 ps-0 pe-0">
            <li class="breadcrumb-item"><a href="{{ url('user') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Educational Background</li>
          </ul>
        </div>
      </div>

      <!-- /Page Header -->

      <div class="row">
        <!-- Wizard -->
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title mb-0">Educational Background</h4>
              </div>
              <div class="card-body">
                <form action="{{ url('user/job-application/educational-background') }}" method="post"
                  enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-lg-4 col-md-4">
                      <div class="mb-3">
                        <label for="highest_qualification">Highest Qualification</label>
                        <input type="text" class="form-control" id="highest_qualification" name="highest_qualification"
                          value="{{ old('highest_qualification') ?? $user->highest_qualification }}">
                        @error('highest_qualification')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                      <div class="mb-3">
                        <label for="institute_name">Institution Name</label>
                        <input type="text" class="form-control" id="institute_name" name="institute_name"
                          value="{{ old('institute_name') ?? $user->institute_name }}">
                        @error('institute_name')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                      <div class="mb-3">
                        <label for="year_of_graduation">Year Of Graduation</label>
                        <input type="text" class="form-control" id="year_of_graduation" name="year_of_graduation"
                          value="{{ old('year_of_graduation') ?? $user->year_of_graduation }}">
                        @error('year_of_graduation')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                      <div class="mb-3">
                        <label for="field_of_study">Major/Field of Study</label>
                        <input type="text" class="form-control" id="field_of_study" name="field_of_study"
                          value="{{ old('field_of_study') ?? $user->field_of_study }}">
                        @error('field_of_study')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                      <div class="mb-3">
                        <label for="certificate">Certifications (if any)</label>
                        <input type="file" class="form-control" id="certificate" name="certificate"
                          value="{{ $user->certificate }}">
                        @error('certificate')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <button class="btn btn-primary f-rgt" type="submit">Submit</button>
                </form>
              </div>
              <!-- end card body -->
            </div>
            <!-- end card -->
          </div>
          <!-- end col -->
        </div>
        <!-- /Wizard -->
      </div>

    </div>
  </div>
  <!-- /Page Wrapper -->
@endsection

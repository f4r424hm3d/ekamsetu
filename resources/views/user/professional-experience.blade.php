@extends('user.layouts.main')
@push('title')
  <title>Professional Experience</title>
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
            <li class="breadcrumb-item active">Professional Experience</li>
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
                <h4 class="card-title mb-0">Professional Experience</h4>
              </div>
              <div class="card-body">
                <form action="{{ url('user/job-application/professional-experience') }}" method="post"
                  enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-lg-4 col-md-4">
                      <div class="mb-3">
                        <label for="employer">Current Employer</label>
                        <input type="text" class="form-control" id="employer" name="employer"
                          value="{{ old('employer') ?? $user->employer }}">
                        @error('employer')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                      <div class="mb-3">
                        <label for="position">Position/Job Title</label>
                        <input type="text" class="form-control" id="position" name="position"
                          value="{{ old('position') ?? $user->position }}">
                        @error('position')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                      <div class="mb-3">
                        <label for="duration">Duration of Employment</label>
                        <input type="text" class="form-control" id="duration" name="duration"
                          value="{{ old('duration') ?? $user->duration }}">
                        @error('duration')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                      <div class="mb-3">
                        <label for="responsibilities">Responsibilities</label>
                        <textarea type="text" class="form-control" id="responsibilities" name="responsibilities" rows="2">{{ old('responsibilities') ?? $user->responsibilities }}</textarea>
                        @error('responsibilities')
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

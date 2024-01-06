@extends('user.layouts.main')
@push('title')
  <title>Emergency Contact</title>
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
            <li class="breadcrumb-item active">Emergency Contact</li>
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
                <h4 class="card-title mb-0">Emergency Contact</h4>
              </div>
              <div class="card-body">
                <form action="{{ url('user/job-application/emergency-contact') }}" method="post"
                  enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-lg-4 col-md-4">
                      <div class="mb-3">
                        <label for="contact_name">Contact Name</label>
                        <input type="text" class="form-control" id="contact_name" name="contact_name"
                          value="{{ old('contact_name') }}">
                        @error('contact_name')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                      <div class="mb-3">
                        <label for="relationship">Relationship</label>
                        <input type="text" class="form-control" id="relationship" name="relationship"
                          value="{{ old('relationship') }}">
                        @error('relationship')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                      <div class="mb-3">
                        <label for="contact_number">Emergency Contact Number</label>
                        <input type="text" class="form-control" id="contact_number" name="contact_number"
                          value="{{ old('contact_number') }}">
                        @error('contact_number')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                      <div class="mb-3">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" class="form-control">
                          <option value="">Select</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                          <option value="Other">Other</option>
                        </select>
                        @error('gender')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                      <div class="mb-3">
                        <label for="dob">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob"
                          value="{{ old('dob') }}">
                        @error('dob')
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

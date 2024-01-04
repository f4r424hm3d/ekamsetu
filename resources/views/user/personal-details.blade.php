@extends('user.layouts.main')
@push('title')
  <title>Personal Details</title>
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
            <li class="breadcrumb-item active">Personal Details</li>
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
                <h4 class="card-title mb-0">Personal Details</h4>
              </div>
              <div class="card-body">
                <form action="{{ url('user/job-application/personal-details') }}" method="post">
                  @csrf
                  <div class="row">
                    <div class="col-lg-4 col-md-4">
                      <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                          value="{{ $user->name }}">
                        @error('name')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                      <div class="mb-3">
                        <label for="dob">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob"
                          value="{{ $user->dob }}">
                        @error('dob')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                      <div class="mb-3">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" class="form-control">
                          <option value="">Select</option>
                          <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                          <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                          <option value="Other" {{ $user->gender == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('gender')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                      <div class="mb-3">
                        <label for="mobile">Contact Number (Primary)</label>
                        <input type="text" class="form-control" id="mobile" name="mobile"
                          value="{{ $user->mobile }}">
                        @error('mobile')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                      <div class="mb-3">
                        <label for="secondary_contact_number">Contact Number (Secondary)</label>
                        <input type="text" class="form-control" id="secondary_contact_number"
                          name="secondary_contact_number" value="{{ $user->secondary_contact_number }}">
                        @error('secondary_contact_number')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                      <div class="mb-3">
                        <label for="current_address">Current Address</label>
                        <input type="text" class="form-control" id="current_address" name="current_address"
                          value="{{ $user->current_address }}">
                        @error('current_address')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                      <div class="mb-3">
                        <label for="permanent_address">Permanent Address</label>
                        <input type="text" class="form-control" id="permanent_address" name="permanent_address"
                          value="{{ $user->permanent_address }}">
                        @error('permanent_address')
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

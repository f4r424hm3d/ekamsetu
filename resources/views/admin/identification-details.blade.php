@extends('user.layouts.main')
@push('title')
  <title>Identification Details</title>
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
            <li class="breadcrumb-item active">Identification Details</li>
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
                <h4 class="card-title mb-0">Identification Details</h4>
              </div>
              <div class="card-body">
                <form action="{{ url('user/job-application/identification-details') }}" method="post"
                  enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-lg-4 col-md-4">
                      <div class="mb-3">
                        <label for="id_number">Id Number</label>
                        <input type="text" class="form-control" id="id_number" name="id_number"
                          value="{{ old('id_number') ?? $user->national_id }}">
                        @error('id_number')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                      <div class="mb-3">
                        <label for="id_file">Upload ID Document</label>
                        <input type="file" class="form-control" id="id_file" name="id_file">
                        @error('id_file')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                      <div class="mb-3">
                        <label for="photo">Upload Passport Size Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                        @error('photo')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                      <div class="mb-3">
                        <label for="signature">Upload Signature</label>
                        <input type="file" class="form-control" id="signature" name="signature">
                        @error('signature')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                      <div class="mb-3">
                        <label for="thumb">Upload Left Thumb Fingerprint</label>
                        <input type="file" class="form-control" id="thumb" name="thumb">
                        @error('thumb')
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

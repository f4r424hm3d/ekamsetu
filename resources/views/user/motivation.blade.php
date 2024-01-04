@extends('user.layouts.main')
@push('title')
  <title>Motivation to Join Ekamsetu Network Program</title>
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
            <li class="breadcrumb-item active">Motivation to Join Ekamsetu Network Program</li>
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
                <h4 class="card-title mb-0">Motivation to Join Ekamsetu Network Program</h4>
              </div>
              <div class="card-body">
                <form action="{{ url('user/job-application/motivation') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-lg-4 col-md-4">
                      <div class="mb-3">
                        <label for="how_you_hear">How you know / heard about us?</label>
                        <select name="how_you_hear" id="how_you_hear" class="form-control">
                          <option value="">Select</option>
                          <option value="Google">Google</option>
                          <option value="Social Media">Social Media</option>
                          <option value="You Known">You Known</option>
                          <option value="Other">Other</option>
                        </select>
                        @error('how_you_hear')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                      <div class="mb-3">
                        <label for="why_join_us">Why do you want to join Us?</label>
                        <input type="text" class="form-control" id="why_join_us" name="why_join_us"
                          value="{{ old('why_join_us') }}">
                        @error('why_join_us')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                      <div class="mb-3">
                        <label for="why_consider_you">Write why we should consider you to join us?</label>
                        <input type="text" class="form-control" id="why_consider_you" name="why_consider_you"
                          value="{{ old('why_consider_you') }}">
                        @error('why_consider_you')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                      <div class="mb-3">
                        <label for="specific_skills">What specific skills or experiences make you a good fit for this
                          role?</label>
                        <input type="text" class="form-control" id="specific_skills" name="specific_skills"
                          value="{{ old('specific_skills') }}">
                        @error('specific_skills')
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

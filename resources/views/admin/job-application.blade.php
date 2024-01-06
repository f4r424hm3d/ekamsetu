@extends('user.authlayouts.main')
@push('title')
  <title>Job Application</title>
@endpush
@section('main-section')
  <!-- Main Wrapper -->
  <div class="main-wrapper">
    <div class="account-content">

      <div class="container">

        <!-- Account Logo -->
        <div class="account-logo">
          <a href="index.html"><img src="{{ url('/') }}/assets/img/logo.png" alt="Dreamguy's Technologies"></a>
        </div>
        <!-- /Account Logo -->

        <div class="account-box">
          <div class="account-wrapper">
            <h3 class="account-title">Register</h3>
            <p class="account-subtitle">Job Application</p>

            <!-- Account Form -->
            <form action="{{ url('user/sign-up') }}" method="post">
              @csrf
              <div class="form-group">
                <label>Name</label>
                <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                @error('name')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <label>Mobile</label>
                <input class="form-control" type="text" name="mobile" value="{{ old('mobile') }}">
                @error('mobile')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="email" name="email" value="{{ old('email') }}">
                @error('email')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <label>Password</label>
                <input class="form-control" type="password" name="password" value="{{ old('password') }}">
                @error('password')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <label>Repeat Password</label>
                <input class="form-control" type="password" name="confirm_password"
                  value="{{ old('confirm_password') }}">
                @error('confirm_password')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <label>Reference Id</label>
                <input class="form-control" type="text" name="reference_id"
                  value="{{ $_GET['reference_id'] ?? old('reference_id') }}">
                @error('reference_id')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group text-center">
                <button class="btn btn-primary account-btn" type="submit">Register</button>
              </div>
              <div class="account-footer">
                <p>Already have an account? <a href="{{ url('user/login') }}">Login</a></p>
              </div>
            </form>
            <!-- /Account Form -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Main Wrapper -->
@endsection

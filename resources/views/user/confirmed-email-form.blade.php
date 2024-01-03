@extends('user.authlayouts.main')
@push('title')
  <title>Confirmed Email</title>
@endpush
@section('main-section')
  <!-- Main Wrapper -->
  <div class="main-wrapper">
    <div class="account-content">

      <div class="container">

        <!-- Account Logo -->
        <div class="account-logo">
          <a href="{{ url('/') }}">
            <img src="{{ asset('/') }}assets/img/logo.png" alt="Dreamguy's Technologies">
          </a>
        </div>
        <!-- /Account Logo -->

        <div class="account-box">
          <div class="account-wrapper">
            <h3 class="account-title">An OTP has been send to<br><span class="theme-cl">your registerd email address</span>
            </h3>
            <p class="account-subtitle">OTP will expire in 5 minutes</p>
            @if (session()->has('smsg'))
              <div class="alert alert-success alert-dismissable">
                {{ session()->get('smsg') }}
              </div>
            @endif
            @if (session()->has('emsg'))
              <div class="alert alert-danger alert-dismissable">
                {{ session()->get('emsg') }}
              </div>
            @endif
            <!-- Account Form -->
            <form action="{{ url('user/submit-email-otp') }}" method="post">
              @csrf
              <div class="form-group">
                <input class="form-control" type="text" name="otp" value="{{ old('otp') }}">
                @error('otp')
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

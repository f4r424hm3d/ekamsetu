@extends('admin.authlayouts.main')
@push('title')
  <title>Login</title>
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
            <h3 class="account-title">Login</h3>
            <!-- NOTIFICATION FIELD START -->
            <x-ResultNotificationField></x-ResultNotificationField>
            <!-- NOTIFICATION FIELD END -->
            <!-- Account Form -->
            <form action="{{ url('admin/login') }}" method="post">
              @csrf
              <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="text" name="username" value="{{ old('username') }}">
                @error('username')
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
              <div class="form-group text-center">
                <button class="btn btn-primary account-btn" type="submit">Register</button>
              </div>
              <div class="account-footer">
                <a href="{{ url('admin/account/password/reset') }}">Forget Password</a>
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

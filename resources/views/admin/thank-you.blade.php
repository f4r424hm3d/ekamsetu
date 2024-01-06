@extends('user.layouts.main')
@push('title')
  <title>{{ config('app.name') }} : Admin Dashboard</title>
@endpush
@section('main-section')
  <!-- Page Wrapper -->
  <div class="page-wrapper">
    <div class="content container-fluid">

      <p>Profile completed successfully</p>
      <a href="{{ url('user/application-details') }}" class="btn btn-sm btn-info">View Profile</a>

    </div>
  </div>
  <!-- /Page Wrapper -->
@endsection

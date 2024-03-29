@extends('admin.layouts.main')
@push('title')
  <title>{{ config('app.name') }} : Admin Dashboard</title>
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
            </span> <span>Dashboard</span>
          </h3>
        </div>
        <div class="col text-end">
          <ul class="breadcrumb bg-white float-end m-0 ps-0 pe-0">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ul>
        </div>
      </div>
      <!-- /Page Header -->

    </div>
  </div>
  <!-- /Page Wrapper -->
@endsection

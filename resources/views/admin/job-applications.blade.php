@extends('admin.layouts.main')
@push('title')
  <title>Job Applications</title>
@endpush
@section('main-section')
  <!-- Page Wrapper -->
  <div class="page-wrapper">

    <!-- Page Content -->
    <div class="content container-fluid">

      <div class="crms-title row bg-white">
        <div class="col">
          <h3 class="page-title m-0">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
              <i class="feather-database"></i>
            </span> Job Application
          </h3>
        </div>
        <div class="col text-end">
          <ul class="breadcrumb bg-white float-end m-0 ps-0 pe-0">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Job Application</li>
          </ul>
        </div>
      </div>

      <!-- Page Header -->
      <div class="page-header pt-3 mb-0 hide-this">
        <div class="row">
          <div class="col">
            <div class="dropdown">
              <a class="dropdown-toggle recently-viewed" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false"> Recently Viewed</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Recently Viewed</a>
                <a class="dropdown-item" href="#">Items I'm following</a>
                <a class="dropdown-item" href="#">All Companies</a>
                <a class="dropdown-item" href="#">Companies added in the last 24 hours</a>
                <a class="dropdown-item" href="#">Companies added in the last 7 days</a>
                <a class="dropdown-item" href="#">Companies with no notes in the last month</a>
                <a class="dropdown-item" href="#">Companies with no notes in the last 7 days</a>
              </div>
            </div>
          </div>
          <div class="col text-end">
            <ul class="list-inline-item ps-0">
              <li class="list-inline-item">
                <button class="add btn btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded"
                  id="add-task" data-bs-toggle="modal" data-bs-target="#add_company">New Company</button>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- /Page Header -->

      <!-- Content Starts -->
      <div class="row">
        <div class="col-md-12">
          <div class="card mb-0">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-nowrap custom-table mb-0 datatable">
                  <thead>
                    <tr>
                      <th class="checkBox">
                        <label class="container-checkbox">
                          <input type="checkbox">
                          <span class="checkmark"></span>
                        </label>
                      </th>
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>DOB</th>
                      <th>Gender</th>
                      <th>Refer By</th>
                      <th class="text-end">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($jobapps as $row)
                      <tr>
                        <td class="checkBox">
                          <label class="container-checkbox">
                            <input type="checkbox">
                            <span class="checkmark"></span>
                          </label>
                        </td>
                        <td>
                          <a href="javascript:void()" class="avatar">
                            <img alt="" src="{{ userIcon($row->photo_path) }}">
                          </a>
                          <a onclick="viewJobAppDetail('{{ $row->id }}')" href="#" data-bs-toggle="modal"
                            data-bs-target="#job-application-detail">{{ $row->name }}</a>
                        </td>
                        <td>{{ $row->mobile }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ getFormattedDate($row->dob, 'd-m-Y') }}</td>
                        <td>{{ $row->gender }}</td>
                        <td>{{ $row->getReferal->name ?? '' }}</td>
                        <td class="text-center">
                          <div class="dropdown dropdown-action">
                            <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                              aria-expanded="false"><i class="material-icons">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="#">Delete</a>
                              <a class="dropdown-item" href="#">Edit</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                {!! $jobapps->links('pagination::bootstrap-5') !!}
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /Content End -->
    </div>
  </div>
  <div class="modal right fade" id="job-application-detail" tabindex="-1" role="dialog" aria-modal="true">
    <div class="modal-dialog" role="document">
      <button type="button" class="close md-close" data-bs-dismiss="modal" aria-label="Close"> </button>
      <div class="modal-content">
        <div id="dataDiv">
        </div>
      </div>
    </div>
  </div>
  <script>
    function viewJobAppDetail(job_id) {
      $.ajax({
        url: "{{ url('common/get-job-app-detail') }}", // Controller method URL
        type: 'GET',
        data: {
          job_id: job_id,
        },
        success: function(response) {
          $('#dataDiv').html(response.htmlContent);
        },
        error: function(xhr, status, error) {
          // Handle error if needed
        }
      });
    }
  </script>

  <!-- modal -->
@endsection

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
            </span> <span>Form Wizard</span>
          </h3>
        </div>
        <div class="col text-end">
          <ul class="breadcrumb bg-white float-end m-0 ps-0 pe-0">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Form Wizard</li>
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
                <h4 class="card-title mb-0">Wizard with Progressbar</h4>
              </div>
              <div class="card-body">

                <div id="progrss-wizard" class="twitter-bs-wizard">
                  <ul class="twitter-bs-wizard-nav nav nav-pills nav-justified">
                    <li class="nav-item">
                      <a href="#progress-seller-details" class="nav-link" data-toggle="tab">
                        <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="User Details">
                          1
                        </div>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#progress-company-document" class="nav-link" data-toggle="tab">
                        <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Address Detail">
                          2
                        </div>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a href="#progress-bank-detail" class="nav-link" data-toggle="tab">
                        <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Payment Details">
                          3
                        </div>
                      </a>
                    </li>
                  </ul>
                  <!-- wizard-nav -->

                  <div id="bar" class="progress mt-4">
                    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated"></div>
                  </div>
                  <div class="tab-content twitter-bs-wizard-tab-content">
                    <div class="tab-pane" id="progress-seller-details">
                      <div class="mb-4">
                        <h5>User Details</h5>
                      </div>
                      <form>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="mb-3">
                              <label for="progresspill-firstname-input">First name</label>
                              <input type="text" class="form-control" id="progresspill-firstname-input">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="mb-3">
                              <label for="progresspill-lastname-input">Last name</label>
                              <input type="text" class="form-control" id="progresspill-lastname-input">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="mb-3">
                              <label for="progresspill-phoneno-input">Phone</label>
                              <input type="text" class="form-control" id="progresspill-phoneno-input">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="mb-3">
                              <label for="progresspill-email-input">Email</label>
                              <input type="email" class="form-control" id="progresspill-email-input">
                            </div>
                          </div>
                        </div>
                      </form>
                      <ul class="pager wizard twitter-bs-wizard-pager-link">
                        <li class="next"><a href="javascript: void(0);" class="btn btn-primary" onclick="nextTab()">Next
                            <i class="bx bx-chevron-right ms-1"></i></a></li>
                      </ul>
                    </div>
                    <div class="tab-pane" id="progress-company-document">
                      <div>
                        <div class="mb-4">
                          <h5>Location Details</h5>
                        </div>
                        <form>
                          <div class="row">
                            <div class="col-lg-6">
                              <div class="mb-3">
                                <label for="progresspill-pancard-input" class="form-label">Address Line 1</label>
                                <input type="text" class="form-control" id="progresspill-pancard-input">
                              </div>
                            </div>

                            <div class="col-lg-6">
                              <div class="mb-3">
                                <label for="progresspill-vatno-input" class="form-label">Address Line 2</label>
                                <input type="text" class="form-control" id="progresspill-vatno-input">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-6">
                              <div class="mb-3">
                                <label for="progresspill-cstno-input" class="form-label">Landmark</label>
                                <input type="text" class="form-control" id="progresspill-cstno-input">
                              </div>
                            </div>

                            <div class="col-lg-6">
                              <div class="mb-3">
                                <label for="progresspill-servicetax-input" class="form-label">City</label>
                                <input type="text" class="form-control" id="progresspill-servicetax-input">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-6">
                              <div class="mb-3">
                                <label for="progresspill-companyuin-input" class="form-label">State</label>
                                <input type="text" class="form-control" id="progresspill-companyuin-input">
                              </div>
                            </div>

                            <div class="col-lg-6">
                              <div class="mb-3">
                                <label for="progresspill-declaration-input" class="form-label">Country</label>
                                <input type="text" class="form-control" id="progresspill-declaration-input">
                              </div>
                            </div>
                          </div>
                        </form>
                        <ul class="pager wizard twitter-bs-wizard-pager-link">
                          <li class="previous"><a href="javascript: void(0);" class="btn btn-primary"
                              onclick="nextTab()"><i class="bx bx-chevron-left me-1"></i> Previous</a></li>
                          <li class="next"><a href="javascript: void(0);" class="btn btn-primary"
                              onclick="nextTab()">Next <i class="bx bx-chevron-right ms-1"></i></a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="tab-pane" id="progress-bank-detail">
                      <div>
                        <div class="mb-4">
                          <h5>Payment Details</h5>
                        </div>
                        <form>
                          <div class="row">
                            <div class="col-lg-6">
                              <div class="mb-3">
                                <label for="progresspill-namecard-input" class="form-label">Name on Card</label>
                                <input type="text" class="form-control" id="progresspill-namecard-input">
                              </div>
                            </div>

                            <div class="col-lg-6">
                              <div class="mb-3">
                                <label class="form-label">Credit Card Type</label>
                                <select class="form-select">
                                  <option selected="">Select Card Type</option>
                                  <option value="AE">American Express</option>
                                  <option value="VI">Visa</option>
                                  <option value="MC">MasterCard</option>
                                  <option value="DI">Discover</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-6">
                              <div class="mb-3">
                                <label for="progresspill-cardno-input" class="form-label">Credit Card Number</label>
                                <input type="text" class="form-control" id="progresspill-cardno-input">
                              </div>
                            </div>

                            <div class="col-lg-6">
                              <div class="mb-3">
                                <label for="progresspill-card-verification-input" class="form-label">Card Verification
                                  Number</label>
                                <input type="text" class="form-control" id="progresspill-card-verification-input">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-6">
                              <div class="mb-3">
                                <label for="progresspill-expiration-input" class="form-label">Expiration Date</label>
                                <input type="text" class="form-control" id="progresspill-expiration-input">
                              </div>
                            </div>
                          </div>
                        </form>
                        <ul class="pager wizard twitter-bs-wizard-pager-link">
                          <li class="previous"><a href="javascript: void(0);" class="btn btn-primary"
                              onclick="nextTab()"><i class="bx bx-chevron-left me-1"></i> Previous</a></li>
                          <li class="float-end"><a href="javascript: void(0);" class="btn btn-primary"
                              data-bs-toggle="modal" data-bs-target=".confirmModal">Save Changes</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
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

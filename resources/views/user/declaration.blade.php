@extends('user.layouts.main')
@push('title')
  <title>Declaration</title>
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
            <li class="breadcrumb-item active">Declaration</li>
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
                <h4 class="card-title mb-0">Declaration</h4>
              </div>
              <div class="card-body">
                <form action="{{ url('user/job-application/declaration') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-lg-12 col-md-12">
                      <div class="mb-3">
                        I declare that the information provided in this application is true and complete to the best of my
                        knowledge. I understand that any false statements or omissions may result in disqualification from
                        joining Samanvay.
                      </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                      <div class="mb-3">
                        <b>
                          I agree to all the terms and conditions outlined for participation in the Samanvay Network. By
                          submitting my application, I acknowledge that:
                        </b>
                      </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required="">
                          <label class="form-check-label" for="invalidCheck">
                            I meet the eligibility criteria of being at least 18 years old and legally eligible to engage
                            in professional networks.
                          </label>
                          <div class="invalid-feedback">
                            You must agree before submitting.
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="invalidCheck2"
                            required="">
                          <label class="form-check-label" for="invalidCheck2">
                            The information provided in my application is accurate and truthful, and any misrepresentation
                            may result in disqualification.
                          </label>
                          <div class="invalid-feedback">
                            You must agree before submitting.
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="invalidCheck3"
                            required="">
                          <label class="form-check-label" for="invalidCheck3">
                            I commit to upholding a high standard of ethical conduct within the Samanvay Network,
                            refraining from practices inconsistent with ethical standards, including misrepresentation,
                            dishonesty, or violation of network policies.
                          </label>
                          <div class="invalid-feedback">
                            You must agree before submitting.
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="invalidCheck4"
                            required="">
                          <label class="form-check-label" for="invalidCheck4">
                            I understand that participation in the Samanvay Network may involve financial benefits, such
                            as incentives, and I have carefully reviewed and understood the financial implications before
                            submitting my application.
                          </label>
                          <div class="invalid-feedback">
                            You must agree before submitting.
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="invalidCheck5"
                            required="">
                          <label class="form-check-label" for="invalidCheck5">
                            I will comply with all applicable local and national laws and regulations related to Samanvay
                            Network activities, and any engagement in illegal or unethical behavior may result in
                            immediate termination.
                          </label>
                          <div class="invalid-feedback">
                            You must agree before submitting.
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="invalidCheck6"
                            required="">
                          <label class="form-check-label" for="invalidCheck6">
                            I agree to maintain the confidentiality of proprietary information shared within the Samanvay
                            Network, understanding that unauthorized disclosure may result in legal action.
                          </label>
                          <div class="invalid-feedback">
                            You must agree before submitting.
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="invalidCheck7"
                            required="">
                          <label class="form-check-label" for="invalidCheck7">
                            I acknowledge that successful participation may require my involvement in training sessions or
                            workshops to enhance my skills and contribute effectively to the Samanvay Network.
                          </label>
                          <div class="invalid-feedback">
                            You must agree before submitting.
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="invalidCheck8"
                            required="">
                          <label class="form-check-label" for="invalidCheck8">
                            I am aware that the Samanvay Network reserves the right to terminate my membership for
                            violations of the terms and conditions, unethical conduct, or actions deemed detrimental to
                            the network.
                          </label>
                          <div class="invalid-feedback">
                            You must agree before submitting.
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="invalidCheck9"
                            required="">
                          <label class="form-check-label" for="invalidCheck9">
                            In the event of disputes, I agree to seek resolution through arbitration or mediation in
                            accordance with the rules and regulations of the Samanvay Network.
                          </label>
                          <div class="invalid-feedback">
                            You must agree before submitting.
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="invalidCheck10"
                            required="">
                          <label class="form-check-label" for="invalidCheck10">
                            I understand that the Samanvay Network retains the right to amend these terms and conditions
                            at any time. I will be notified of changes, and my continued participation implies acceptance
                            of the revised terms.
                          </label>
                          <div class="invalid-feedback">
                            You must agree before submitting.
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="invalidCheck11"
                            required="">
                          <label class="form-check-label" for="invalidCheck11">
                            By submitting this application, I affirm that I have read, understood, and agreed to abide by
                            these terms and conditions for joining the Samanvay Network.
                          </label>
                          <div class="invalid-feedback">
                            You must agree before submitting.
                          </div>
                        </div>
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

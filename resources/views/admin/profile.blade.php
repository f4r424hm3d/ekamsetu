@extends('admin.layouts.main')
@push('title')
  <title>User Profile</title>
@endpush
@section('main-section')
  <div class="page-wrapper">
    <div class="content container-fluid">
      <div class="crms-title row bg-white">
        <div class="col  p-0">
          <h3 class="page-title m-0">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
              <i class="feather-user"></i>
            </span> User Profile
          </h3>
        </div>
        <div class="col p-0 text-end">
          <ul class="breadcrumb bg-white float-end m-0 ps-0 pe-0">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">User Profile</li>
          </ul>
        </div>
      </div>
      <div class="page-header pt-3 mb-0">
        <div class="card ">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="profile-view">
                  <div class="profile-img-wrap">
                    <div class="profile-img">
                      <a href="#"><img alt="" src="{{ userIcon() }}"></a>
                    </div>
                  </div>
                  <div class="profile-basic">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="profile-info-left">
                          <h3 class="user-name m-t-0 mb-0">{{ $user->name }}</h3>
                          {{-- <h6 class="text-muted">UI/UX Design Team</h6>
                          <small class="text-muted">Web Designer</small> --}}
                          <div class="staff-id">Unique ID : {{ $user->user_unique_id }}</div>
                          <div class="small doj text-muted">Date of Join :
                            {{ getFormattedDate($user->created_at, 'd M, Y') }}</div>
                          <p>Rafer a friend. Share this link with your friends:</p>
                          <input type="text"
                            value="{{ url('user/job-application?reference_id=' . $user->user_unique_id) }}"
                            id="referralLink" style="display: none;">
                          <div class="staff-msg">
                            <button class="btn btn-custom" onclick="copyLink()">Copy Link</button>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-7">
                        <ul class="personal-info">
                          <li>
                            <div class="title">Phone:</div>
                            <div class="text"><a href="javascript:void()">{{ $user->mobile }}</a></div>
                          </li>
                          <li>
                            <div class="title">Email:</div>
                            <div class="text"><a href="javascript:void()">{{ $user->email }}</a></div>
                          </li>
                          <li>
                            <div class="title">Birthday:</div>
                            <div class="text">{{ getFormattedDate($user->dob, 'd M') }}</div>
                          </li>
                          <li>
                            <div class="title">Address:</div>
                            <div class="text">{{ $user->current_address }}</div>
                          </li>
                          <li>
                            <div class="title">Gender:</div>
                            <div class="text">{{ $user->gender }}</div>
                          </li>
                          @if ($user->reference_id != null)
                            <li>
                              <div class="title">Refer By:</div>
                              <div class="text">
                                <div class="avatar-box">
                                  <div class="avatar avatar-xs">
                                    <img src="{{ userIcon() }}" alt="">
                                  </div>
                                </div>
                                <a href="javascript:void()">
                                  {{ $user->getReferal->name }}
                                </a>
                              </div>
                            </li>
                          @endif
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="pro-edit">
                    <a data-bs-target="#profile_info" data-bs-toggle="modal" class="edit-icon" href="#">
                      <i class="fa fa-pencil"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="tab-content p-0 hide-this">
          <div id="emp_profile" class="pro-overview tab-pane fade show active">
            <div class="row">
              <div class="col-md-6 d-flex">
                <div class="card profile-box flex-fill">
                  <div class="card-body">
                    <h3 class="card-title">Personal Informations <a href="#" class="edit-icon"
                        data-bs-toggle="modal" data-bs-target="#personal_info_modal"><i class="fa fa-pencil"></i></a></h3>
                    <ul class="personal-info">
                      <li>
                        <div class="title">Passport No.</div>
                        <div class="text">9876543210</div>
                      </li>
                      <li>
                        <div class="title">Passport Exp Date.</div>
                        <div class="text">9876543210</div>
                      </li>
                      <li>
                        <div class="title">Tel</div>
                        <div class="text"><a href="">9876543210</a></div>
                      </li>
                      <li>
                        <div class="title">Nationality</div>
                        <div class="text">Indian</div>
                      </li>
                      <li>
                        <div class="title">Religion</div>
                        <div class="text">Christian</div>
                      </li>
                      <li>
                        <div class="title">Marital status</div>
                        <div class="text">Married</div>
                      </li>
                      <li>
                        <div class="title">Employment of spouse</div>
                        <div class="text">No</div>
                      </li>
                      <li>
                        <div class="title">No. of children</div>
                        <div class="text">2</div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-6 d-flex">
                <div class="card profile-box flex-fill">
                  <div class="card-body">
                    <h3 class="card-title">Emergency Contact <a href="#" class="edit-icon" data-bs-toggle="modal"
                        data-bs-target="#emergency_contact_modal"><i class="fa fa-pencil"></i></a></h3>
                    <h5 class="section-title">Primary</h5>
                    <ul class="personal-info">
                      <li>
                        <div class="title">Name</div>
                        <div class="text">John Doe</div>
                      </li>
                      <li>
                        <div class="title">Relationship</div>
                        <div class="text">Father</div>
                      </li>
                      <li>
                        <div class="title">Phone </div>
                        <div class="text">9876543210, 9876543210</div>
                      </li>
                    </ul>
                    <hr>
                    <h5 class="section-title">Secondary</h5>
                    <ul class="personal-info">
                      <li>
                        <div class="title">Name</div>
                        <div class="text">Karen Wills</div>
                      </li>
                      <li>
                        <div class="title">Relationship</div>
                        <div class="text">Brother</div>
                      </li>
                      <li>
                        <div class="title">Phone </div>
                        <div class="text">9876543210, 9876543210</div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 d-flex">
                <div class="card profile-box flex-fill">
                  <div class="card-body">
                    <h3 class="card-title">Bank information</h3>
                    <ul class="personal-info">
                      <li>
                        <div class="title">Bank name</div>
                        <div class="text">ICICI Bank</div>
                      </li>
                      <li>
                        <div class="title">Bank account No.</div>
                        <div class="text">159843014641</div>
                      </li>
                      <li>
                        <div class="title">IFSC Code</div>
                        <div class="text">ICI24504</div>
                      </li>
                      <li>
                        <div class="title">PAN No</div>
                        <div class="text">TC000Y56</div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-6 d-flex">
                <div class="card profile-box flex-fill">
                  <div class="card-body">
                    <h3 class="card-title">Family Informations <a href="#" class="edit-icon"
                        data-bs-toggle="modal" data-bs-target="#family_info_modal"><i class="fa fa-pencil"></i></a>
                    </h3>
                    <div class="table-responsive">
                      <table class="table table-nowrap">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Relationship</th>
                            <th>Date of Birth</th>
                            <th>Phone</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Leo</td>
                            <td>Brother</td>
                            <td>Feb 16th, 2019</td>
                            <td>9876543210</td>
                            <td class="text-end">
                              <div class="dropdown dropdown-action">
                                <a aria-expanded="false" data-bs-toggle="dropdown" class="action-icon dropdown-toggle"
                                  href="#"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                  <a href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                  <a href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i>
                                    Delete</a>
                                </div>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 d-flex">
                <div class="card profile-box flex-fill mb-0">
                  <div class="card-body">
                    <h3 class="card-title">Education Informations <a href="#" class="edit-icon"
                        data-bs-toggle="modal" data-bs-target="#education_info"><i class="fa fa-pencil"></i></a></h3>
                    <div class="experience-box">
                      <ul class="experience-list">
                        <li>
                          <div class="experience-user">
                            <div class="before-circle"></div>
                          </div>
                          <div class="experience-content">
                            <div class="timeline-content">
                              <a href="#/" class="name">International College of Arts and Science (UG)</a>
                              <div>Bsc Computer Science</div>
                              <span class="time">2000 - 2003</span>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="experience-user">
                            <div class="before-circle"></div>
                          </div>
                          <div class="experience-content">
                            <div class="timeline-content">
                              <a href="#/" class="name">International College of Arts and Science (PG)</a>
                              <div>Msc Computer Science</div>
                              <span class="time">2000 - 2003</span>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 d-flex">
                <div class="card profile-box flex-fill mb-0">
                  <div class="card-body">
                    <h3 class="card-title">Experience <a href="#" class="edit-icon" data-bs-toggle="modal"
                        data-bs-target="#experience_info"><i class="fa fa-pencil"></i></a></h3>
                    <div class="experience-box">
                      <ul class="experience-list">
                        <li>
                          <div class="experience-user">
                            <div class="before-circle"></div>
                          </div>
                          <div class="experience-content">
                            <div class="timeline-content">
                              <a href="#/" class="name">Web Designer at Zen Corporation</a>
                              <span class="time">Jan 2013 - Present (5 years 2 months)</span>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="experience-user">
                            <div class="before-circle"></div>
                          </div>
                          <div class="experience-content">
                            <div class="timeline-content">
                              <a href="#/" class="name">Web Designer at Ron-tech</a>
                              <span class="time">Jan 2013 - Present (5 years 2 months)</span>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="experience-user">
                            <div class="before-circle"></div>
                          </div>
                          <div class="experience-content">
                            <div class="timeline-content">
                              <a href="#/" class="name">Web Designer at Dalt Technology</a>
                              <span class="time">Jan 2013 - Present (5 years 2 months)</span>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    function copyLink() {
      var referralLink = "{{ url('user/job-application?reference_id=' . $user->user_unique_id) }}";
      var tempInput = document.createElement("input");
      tempInput.value = referralLink;
      document.body.appendChild(tempInput);
      tempInput.select();
      document.execCommand("copy");
      document.body.removeChild(tempInput);

      alert("Link copied to clipboard: " + referralLink);
    }
  </script>
@endsection

<style>
  .accordion-body {}
</style>
<div class="modal-header">

  <div class="row w-100">
    <div class="col-md-7 account d-flex">
      <div class="company_img">
        <img src="{{ userIcon($user->profile_picture) }}" alt="User" class="user-image" class="img-fluid">
      </div>
      <div>
        <p class="mb-0">{{ $user->name }}</p>
        <span class="modal-title">{{ $user->email }}</span>
      </div>

    </div>
    <div class="col-md-5 text-end">
      <ul class="list-unstyled list-style-none">
        <li class="dropdown list-inline-item"><br>
          <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Actions </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Edit This Company</a>
            <a class="dropdown-item" href="#">Change Organization Image</a>
            <a class="dropdown-item" href="#">Delete This Organization</a>
            <a class="dropdown-item" href="#">Change Record Owner</a>
            <a class="dropdown-item" href="#">Generate Merge Document</a>
            <a class="dropdown-item" href="#">Print This Organization</a>
            <a class="dropdown-item" href="#">Add New Task For Organization</a>
            <a class="dropdown-item" href="#">Add New Event For Organization</a>
            <a class="dropdown-item" href="#">Add Activity Set To Organization</a>
            <a class="dropdown-item" href="#">Add New Contact For Organization</a>
            <a class="dropdown-item" href="#">Add New Opportunity For Organization</a>
            <a class="dropdown-item" href="#">Add New Opportunity For Organization</a>
            <a class="dropdown-item" href="#">Add New Project For Organization</a>
          </div>
        </li>

      </ul>

    </div>
  </div>
  <button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
</div>

<div class="card due-dates">
  <div class="card-body">
    <div class="row">
      <div class="col">
        <span>Id</span>
        <p>{{ $user->user_unique_id }}</p>
      </div>
      <div class="col">
        <span>DOB</span>
        <p>{{ $user->dob }}</p>
      </div>
      <div class="col">
        <span>Phone</span>
        <p>{{ $user->mobile }}</p>
      </div>
      <div class="col">
        <span>Gender</span>
        <p>{{ $user->gender }}</p>
      </div>
      <div class="col">
        <span>Refer By</span>
        <p>{{ $user->getReferal->name ?? '' }}</p>
      </div>
    </div>
  </div>
</div>

<div class="modal-body">
  <div class="task-infos">
    <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified">
      <li class="nav-item"><a class="nav-link active" href="#task-details" data-bs-toggle="tab">Details</a>
      </li>
      <li class="nav-item"><a class="nav-link" href="#task-related" data-bs-toggle="tab">Related</a></li>
      <li class="nav-item"><a class="nav-link" href="#task-activity" data-bs-toggle="tab">Activity</a></li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane show active" id="task-details">
        <div class="crms-tasks">
          <div class="tasks__item crms-task-item active">
            <div class="accordion-header js-accordion-header">Personal Detail</div>
            <div class="accordion-body js-accordion-body">
              <div class="accordion-body__contents">
                <table class="table">
                  <tbody>
                    <tr>
                      <td class="border-0">Name</td>
                      <td class="border-0">{{ $user->name }}</td>
                    </tr>
                    <tr>
                      <td>DOB</td>
                      <td>{{ $user->dob }}</td>
                    </tr>
                    <tr>
                      <td>Gender</td>
                      <td>{{ $user->dgenderob }}</td>
                    </tr>
                    <tr>
                      <td>Contact Number</td>
                      <td>{{ $user->mobile }}</td>
                    </tr>
                    <tr>
                      <td>Contact Number (Secondary)</td>
                      <td>{{ $user->secondary_contact_number }}</td>
                    </tr>
                    <tr>
                      <td>Address (Permanenmt)</td>
                      <td>{{ $user->permanent_address }}</td>
                    </tr>
                    <tr>
                      <td>Address (Current)</td>
                      <td>{{ $user->current_address }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="tasks__item crms-task-item">
            <div class="accordion-header js-accordion-header">Organization Contact Details</div>
            <div class="accordion-body js-accordion-body">
              <div class="accordion-body__contents">
                <table class="table">
                  <tbody>
                    <tr>
                      <td class="border-0">Phone</td>
                      <td class="border-0">(626) 847-1294</td>
                    </tr>
                    <tr>
                      <td>Fax</td>
                      <td>1234</td>
                    </tr>
                    <tr>
                      <td>Website</td>
                      <td>google.com</td>
                    </tr>
                    <tr>
                      <td>LinkedIn</td>
                      <td>Lorem ipsum</td>
                    </tr>
                    <tr>
                      <td>Facebook</td>
                      <td>lorem Ipsum</td>
                    </tr>
                    <tr>
                      <td>Twitter</td>
                      <td>Not Started</td>
                    </tr>
                    <tr>
                      <td>Email Domains</td>
                      <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                          data-cfemail="48292a2b082f25292124662b2725">[email&#160;protected]</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="tasks__item crms-task-item">
            <div class="accordion-header js-accordion-header">Address Information</div>
            <div class="accordion-body js-accordion-body">
              <div class="accordion-body__contents">
                <table class="table">
                  <tbody>
                    <tr>
                      <td class="border-0">Billing Address</td>
                      <td class="border-0">1000 Escalon Street, Palo Alto, CA, 94020, United States map</td>
                    </tr>
                    <tr>
                      <td>Shipping Addres</td>
                      <td>United States</td>
                    </tr>
                  </tbody>
                </table>
              </div>

            </div>
          </div>
          <div class="tasks__item crms-task-item">
            <div class="accordion-header js-accordion-header">Additional Information</div>
            <div class="accordion-body js-accordion-body">
              <div class="accordion-body__contents">
                <table class="table">
                  <tbody>
                    <tr>
                      <td>Dates to remember</td>
                      <td>09/12/2005</td>
                    </tr>
                    <tr>
                      <td>Organization Created</td>
                      <td>03-Jun-20 1:14 AM</td>
                    </tr>
                    <tr>
                      <td>Date of Next Activity </td>
                      <td>09/12/2005</td>
                    </tr>
                    <tr>
                      <td>Date of Last Activity </td>
                      <td>27/01/2006</td>
                    </tr>
                  </tbody>
                </table>
              </div>

            </div>
          </div>
          <div class="tasks__item crms-task-item">
            <div class="accordion-header js-accordion-header">Description Information</div>
            <div class="accordion-body js-accordion-body">
              <div class="accordion-body__contents">
                <table class="table">
                  <tbody>
                    <tr>
                      <td>Description</td>
                      <td>Lorem ipsum </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="tasks__item crms-task-item">
            <div class="accordion-header js-accordion-header">Tag Information</div>
            <div class="accordion-body js-accordion-body">
              <div class="accordion-body__contents">
                <table class="table">
                  <tbody>
                    <tr>
                      <td class="border-0">Tag List</td>
                      <td class="border-0">Lorem Ipsum</td>
                    </tr>
                  </tbody>
                </table>
              </div>

            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane task-related" id="task-related">
        <div class="row">
          <div class="col-md-4">
            <div class="card bg-gradient-danger card-img-holder text-white h-100">
              <div class="card-body">
                <img src="assets/img/circle.png" class="card-img-absolute" alt="circle-image">
                <h4 class="font-weight-normal mb-3">Companies</h4>
                <span>2</span>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card bg-gradient-info card-img-holder text-white h-100">
              <div class="card-body">
                <img src="assets/img/circle.png" class="card-img-absolute" alt="circle-image">
                <h4 class="font-weight-normal mb-3">Deals</h4>
                <span>2</span>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card bg-gradient-success card-img-holder text-white h-100">
              <div class="card-body">
                <img src="assets/img/circle.png" class="card-img-absolute" alt="circle-image">
                <h4 class="font-weight-normal mb-3">Projects</h4>
                <span>1</span>
              </div>
            </div>
          </div>
        </div>
        <div class="row pt-3">
          <div class="col-md-4">
            <div class="card bg-gradient-success card-img-holder text-white h-100">
              <div class="card-body">
                <img src="assets/img/circle.png" class="card-img-absolute" alt="circle-image">
                <h4 class="font-weight-normal mb-3">Contacts</h4>
                <span>2</span>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card bg-gradient-danger card-img-holder text-white h-100">
              <div class="card-body">
                <img src="assets/img/circle.png" class="card-img-absolute" alt="circle-image">
                <h4 class="font-weight-normal mb-3">Notes</h4>
                <span>2</span>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card bg-gradient-info card-img-holder text-white h-100">
              <div class="card-body">
                <img src="assets/img/circle.png" class="card-img-absolute" alt="circle-image">
                <h4 class="font-weight-normal mb-3">Files</h4>
                <span>2</span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="crms-tasks p-2">
            <div class="tasks__item crms-task-item active">
              <div class="accordion-header js-accordion-header">Companies</div>
              <div class="accordion-body js-accordion-body">
                <div class="accordion-body__contents">
                  <div class="table-responsive">
                    <table class="table table-striped table-nowrap custom-table mb-0 datatable">
                      <thead>
                        <tr>
                          <th>Company Name</th>
                          <th>Phone</th>
                          <th>Billing Country</th>
                          <th class="text-end">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <a href="#" class="avatar"><img alt="" src="assets/img/c-logo2.png"></a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#company-details">Clampett
                              Oil
                              and Gas Corp.</a>
                          </td>
                          <td>8754554531</td>
                          <td>United States</td>
                          <td class="text-center">
                            <div class="dropdown dropdown-action">
                              <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class="material-icons">more_vert</i></a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Edit Link</a>
                                <a class="dropdown-item" href="#">Delete Link</a>

                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <a href="#" class="avatar"><img alt="" src="assets/img/c-logo.png"></a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#company-details">Acme
                              Corporation</a>
                          </td>
                          <td>8754554531</td>
                          <td>United States</td>
                          <td class="text-center">
                            <div class="dropdown dropdown-action">
                              <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class="material-icons">more_vert</i></a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Edit Link</a>
                                <a class="dropdown-item" href="#">Delete Link</a>

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
            <div class="tasks__item crms-task-item">
              <div class="accordion-header js-accordion-header">Deals</div>
              <div class="accordion-body js-accordion-body">
                <div class="accordion-body__contents">
                  <div class="table-responsive">
                    <table class="table table-striped table-nowrap custom-table mb-0 datatable">
                      <thead>
                        <tr>
                          <th>Deal Name</th>
                          <th>Company</th>
                          <th>User Responsible</th>
                          <th>Deal Value</th>
                          <th></th>
                          <th class="text-end">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>

                          <td>
                            Bensolet
                          </td>
                          <td>Globex</td>
                          <td>John Doe</td>
                          <td>USD $‎180</td>
                          <td><i class="fa fa-star" aria-hidden="true"></i></td>

                          <td class="text-center">
                            <div class="dropdown dropdown-action">
                              <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class="material-icons">more_vert</i></a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Edit Link</a>
                                <a class="dropdown-item" href="#">Delete Link</a>

                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>

                          <td>
                            Ansanio tech
                          </td>
                          <td>Lecto</td>
                          <td>John Smith</td>
                          <td>USD $‎180</td>
                          <td><i class="fa fa-star" aria-hidden="true"></i></td>

                          <td class="text-center">
                            <div class="dropdown dropdown-action">
                              <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class="material-icons">more_vert</i></a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Edit Link</a>
                                <a class="dropdown-item" href="#">Delete Link</a>

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
            <div class="tasks__item crms-task-item">
              <div class="accordion-header js-accordion-header">Projects</div>
              <div class="accordion-body js-accordion-body">
                <div class="accordion-body__contents">
                  <div class="table-responsive">
                    <table class="table table-striped table-nowrap custom-table mb-0 datatable">
                      <thead>
                        <tr>
                          <th>Project Name</th>
                          <th>Status</th>
                          <th>User Responsible</th>
                          <th>Date Created</th>
                          <th class="text-end">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            Wilmer Deluna
                          </td>
                          <td>Completed</td>
                          <td>Williams</td>
                          <td>13-Jul-20 11:37 PM</td>
                          <td class="text-center">
                            <div class="dropdown dropdown-action">
                              <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class="material-icons">more_vert</i></a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Edit Link</a>
                                <a class="dropdown-item" href="#">Delete Link</a>

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
            <div class="tasks__item crms-task-item">
              <div class="accordion-header js-accordion-header">Contacts</div>
              <div class="accordion-body js-accordion-body">
                <div class="accordion-body__contents">
                  <div class="table-responsive">
                    <table class="table table-striped table-nowrap custom-table mb-0 datatable">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Title</th>
                          <th>phone</th>
                          <th>Email</th>
                          <th class="text-end">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>

                          <td>
                            Wilmer Deluna
                          </td>
                          <td>Call Enquiry</td>
                          <td>987675656</td>
                          <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                              data-cfemail="7b0c121717121a163b1c161a121755181416">[email&#160;protected]</a>
                          </td>
                          <td class="text-center">
                            <div class="dropdown dropdown-action">
                              <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class="material-icons">more_vert</i></a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Edit Link</a>
                                <a class="dropdown-item" href="#">Delete Link</a>

                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>

                          <td>
                            John Doe
                          </td>
                          <td>Enquiry</td>
                          <td>987675656</td>
                          <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                              data-cfemail="87ede8efe9c7e0eae6eeeba9e4e8ea">[email&#160;protected]</a></td>
                          <td class="text-center">
                            <div class="dropdown dropdown-action">
                              <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class="material-icons">more_vert</i></a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Edit Link</a>
                                <a class="dropdown-item" href="#">Delete Link</a>

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
            <div class="tasks__item crms-task-item">
              <div class="accordion-header js-accordion-header">Notes </div>
              <div class="accordion-body js-accordion-body">
                <div class="accordion-body__contents">
                  <div class="table-responsive">
                    <table class="table table-striped table-nowrap custom-table mb-0 datatable">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Size</th>
                          <th>Category</th>
                          <th>Date Added</th>
                          <th>Added by</th>
                          <th class="text-end">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>

                          <td>
                            Document
                          </td>
                          <td>50KB</td>
                          <td>Email</td>
                          <td>13-Jul-20 11:37 PM</td>
                          <td>John Doe</td>
                          <td class="text-center">
                            <div class="dropdown dropdown-action">
                              <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class="material-icons">more_vert</i></a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Edit Link</a>
                                <a class="dropdown-item" href="#">Delete Link</a>

                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>

                          <td>
                            Finance
                          </td>
                          <td>100KB</td>
                          <td>Phone call</td>
                          <td>13-Jul-20 11:37 PM</td>
                          <td>Smith</td>
                          <td class="text-center">
                            <div class="dropdown dropdown-action">
                              <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class="material-icons">more_vert</i></a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Edit Link</a>
                                <a class="dropdown-item" href="#">Delete Link</a>

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
            <div class="tasks__item crms-task-item">
              <div class="accordion-header js-accordion-header">Files </div>
              <div class="accordion-body js-accordion-body">
                <div class="accordion-body__contents">
                  <div class="table-responsive">
                    <table class="table table-striped table-nowrap custom-table mb-0 datatable">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Size</th>
                          <th>Category</th>
                          <th>Date Added</th>
                          <th>Added by</th>
                          <th class="text-end">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>

                          <td>
                            Document
                          </td>
                          <td>50KB</td>
                          <td>Phone Enquiry</td>
                          <td>13-Jul-20 11:37 PM</td>
                          <td>John Doe</td>
                          <td class="text-center">
                            <div class="dropdown dropdown-action">
                              <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class="material-icons">more_vert</i></a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Edit Link</a>
                                <a class="dropdown-item" href="#">Delete Link</a>

                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>

                          <td>
                            Finance
                          </td>
                          <td>100KB</td>
                          <td>Email</td>
                          <td>13-Jul-20 11:37 PM</td>
                          <td>Smith</td>
                          <td class="text-center">
                            <div class="dropdown dropdown-action">
                              <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class="material-icons">more_vert</i></a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Edit Link</a>
                                <a class="dropdown-item" href="#">Delete Link</a>

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
        </div>
      </div>
      <div class="tab-pane" id="task-activity">
        <div class="row">
          <div class="col-md-4">
            <div class="card bg-gradient-danger card-img-holder text-white h-100">
              <div class="card-body">
                <img src="assets/img/circle.png" class="card-img-absolute" alt="circle-image">
                <h4 class="font-weight-normal mb-3">Total Activities</h4>
                <span>2</span>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card bg-gradient-info card-img-holder text-white h-100">
              <div class="card-body">
                <img src="assets/img/circle.png" class="card-img-absolute" alt="circle-image">
                <h4 class="font-weight-normal mb-3">Last Activity</h4>
                <span>1</span>
              </div>
            </div>
          </div>

        </div>

        <div class="row">
          <div class="crms-tasks  p-2">
            <div class="tasks__item crms-task-item active">
              <div class="accordion-header js-accordion-header">Upcoming Activity </div>
              <div class="accordion-body js-accordion-body">
                <div class="accordion-body__contents">
                  <div class="table-responsive">
                    <table class="table table-striped table-nowrap custom-table mb-0 datatable">
                      <thead>
                        <tr>
                          <th>Type</th>
                          <th>Activity Name</th>
                          <th>Assigned To</th>
                          <th>Due Date</th>
                          <th>Status</th>
                          <th class="text-end">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>

                          <td>
                            Meeting
                          </td>
                          <td>Call Enquiry</td>
                          <td>John Doe</td>
                          <td>13-Jul-20 11:37 PM</td>
                          <td>
                            <label class="container-checkbox">
                              <input type="checkbox" checked="">
                              <span class="checkmark"></span>
                            </label>
                          </td>

                          <td class="text-center">
                            <div class="dropdown dropdown-action">
                              <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class="material-icons">more_vert</i></a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Add New Task</a>
                                <a class="dropdown-item" href="#">Add New Event</a>

                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>

                          <td>
                            Meeting
                          </td>
                          <td>Phone Enquiry</td>
                          <td>David</td>
                          <td>13-Jul-20 11:37 PM</td>

                          <td>
                            <label class="container-checkbox">
                              <input type="checkbox" checked="">
                              <span class="checkmark"></span>
                            </label>
                          </td>

                          <td class="text-center">
                            <div class="dropdown dropdown-action">
                              <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class="material-icons">more_vert</i></a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Add New Task</a>
                                <a class="dropdown-item" href="#">Add New Event</a>

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
            <div class="tasks__item crms-task-item">
              <div class="accordion-header js-accordion-header">Past Activity </div>
              <div class="accordion-body js-accordion-body">
                <div class="accordion-body__contents">
                  <div class="table-responsive">
                    <table class="table table-striped table-nowrap custom-table mb-0 datatable">
                      <thead>
                        <tr>
                          <th>Type</th>
                          <th>Activity Name</th>
                          <th>Assigned To</th>
                          <th>Due Date</th>
                          <th>Status</th>
                          <th class="text-end">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>

                          <td>
                            Meeting
                          </td>
                          <td>Call Enquiry</td>
                          <td>John Doe</td>
                          <td>13-Jul-20 11:37 PM</td>
                          <td>
                            <label class="container-checkbox">
                              <input type="checkbox" checked="">
                              <span class="checkmark"></span>
                            </label>
                          </td>

                          <td class="text-center">
                            <div class="dropdown dropdown-action">
                              <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class="material-icons">more_vert</i></a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Add New Task</a>
                                <a class="dropdown-item" href="#">Add New Event</a>

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
        </div>
      </div>
    </div>

  </div>
</div>

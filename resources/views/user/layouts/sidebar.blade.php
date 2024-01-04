<!-- Sidebar -->
<div class="sidebar" id="sidebar">
  <div class="sidebar-inner slimscroll">
    <form action="search.html" class="mobile-view">
      <input class="form-control" type="text" placeholder="Search here">
      <button class="btn" type="button"><i class="fa fa-search"></i></button>
    </form>
    <div id="sidebar-menu" class="sidebar-menu">

      <ul>
        <li class="nav-item nav-profile">
          <a href="#" class="nav-link">
            <div class="nav-profile-image">
              <img src="{{ userIcon() }}" alt="profile">
            </div>
            <div class="nav-profile-text d-flex flex-column">
              <span class="font-weight-bold mb-2">{{ session('userLoggedIn')['user_name'] }}</span>
              {{-- <span class="text-white text-small">Project Manager</span> --}}
            </div>
            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
          </a>
        </li>
        {{-- <li class="menu-title">
          <span>Main</span>
        </li> --}}

        <li>
          <a href="{{ url('user') }}"><i class="feather-home"></i> <span>Dashboard</span></a>
        </li>
        <li>
          <a href="#"><i class="feather-check-square"></i> <span>Tasks</span></a>
        </li>
        <li>
          <a href="#"><i class="feather-user"></i> <span>Leads</span></a>
        </li>
        <li>
          <a href="#"><i class="feather-bar-chart-2"></i> <span>Reports</span></a>
        </li>

      </ul>
    </div>
  </div>
</div>
<!-- /Sidebar -->

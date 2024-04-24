<div class="nk-header nk-header-fixed is-light">
  <div class="container-fluid">
    <div class="nk-header-wrap">
      <div class="nk-menu-trigger d-xl-none ms-n1">
        <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em
            class="icon ni ni-menu"></em></a>
      </div>
      <div class="nk-header-brand d-xl-none">
        <a href="{{ url('dashboard/overview') }}" class="logo-link">
          <h4 class="erp">Dashboard</h4>
          <span>Rentalpedia</span>
        </a>
      </div>
      <div class="nk-header-search ms-3 ms-xl-0">
        <em class="icon ni ni-search"></em>
        <input type="text" class="form-control border-transparent form-focus-none" placeholder="Search Course">
      </div><!-- .nk-header-news -->
      <div class="nk-header-tools">
        <ul class="nk-quick-nav">

          <li class="dropdown notification-dropdown">
            <a href="{{ url('/') }}" target="_blank" class="nk-quick-nav-icon">
              <em class="icon ni ni-monitor"></em>
            </a>
          </li>
          <li class="dropdown user-dropdown">
            <a href="#" class="dropdown-toggle me-n1" data-bs-toggle="dropdown">
              <div class="user-toggle">
                <div class="user-avatar sm">
                  <em class="icon ni ni-user-alt"></em>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-end">
              <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                <div class="user-card">

                  <div class="user-avatar">
                    <span>
                      {{ getInitial(auth()->user()->name) }}</span>
                  </div>

                  <div class="user-info">
                    <span class="lead-text">{{ auth()->user()->name }}</span>
                    <span class="sub-text">{{ auth()->user()->email }}</span>
                  </div>
                </div>
              </div>
              <div class="dropdown-inner">
                <ul class="link-list">
                  {{-- <li><a href="{{ url('dashboard/acc-settings') }}"><em
                        class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li> --}}
                  <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a>
                  </li>
                </ul>
              </div>
              <div class="dropdown-inner">
                <ul class="link-list">
                  <li><a href="{{ url('logout') }}"><em class="icon ni ni-signout"></em><span>Log Out</span></a></li>
                </ul>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div><!-- .nk-header-wrap -->
  </div><!-- .container-fliud -->
</div>

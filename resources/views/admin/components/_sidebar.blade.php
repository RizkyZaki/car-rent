<div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
  <div class="nk-sidebar-element nk-sidebar-head">
    <div class="nk-sidebar-brand">
      <a href="javascript:void(0);" class="logo-link nk-sidebar-logo">
        <span class="logo-dark logo-img">
          <h4><img class="aling-logo-landscape" src="{{ asset('storage/assets/logo/' . appSetting()->logo) }}"></h4>
        </span>
        <span class="logo-small logo-img logo-img-small">
          <h4><img class="aling-logo-small" src="{{ asset('storage/assets/logo/' . appSetting()->logo) }}"></h4>
        </span>
      </a>
    </div>
    <div class="nk-menu-trigger me-n2">
      <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em
          class="icon ni ni-arrow-left"></em></a>
      <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em
          class="icon ni ni-menu"></em></a>
    </div>
  </div><!-- .nk-sidebar-element -->
  <div class="nk-sidebar-element">
    <div class="nk-sidebar-content">
      <div class="nk-sidebar-menu" data-simplebar>
        <ul class="nk-menu">
          <li class="nk-menu-heading">
            <h6 class="overline-title text-primary-alt">Dashboard</h6>
          </li>

          <li class="nk-menu-item">
            <a href="{{ url('dashboard/overview') }}" class="nk-menu-link">
              <span class="nk-menu-icon"><em class="icon ni ni-home-alt"></em></span>
              <span class="nk-menu-text">Overview</span>
            </a>
          </li>
          <li class="nk-menu-heading">
            <h6 class="overline-title text-primary-alt">Information</h6>
          </li>
          <li class="nk-menu-item">
            <a href="{{ url('dashboard/inform/blog') }}" class="nk-menu-link">
              <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
              <span class="nk-menu-text">Blog</span>
            </a>
          </li>
          <li class="nk-menu-item">
            <a href="{{ url('dashboard/inform/post-car') }}" class="nk-menu-link">
              <span class="nk-menu-icon"><em class="icon ni ni-article"></em></span>
              <span class="nk-menu-text">Post Car</span>
            </a>
          </li>
          <li class="nk-menu-item">
            <a href="{{ url('dashboard/inform/brand') }}" class="nk-menu-link">
              <span class="nk-menu-icon"><em class="icon ni ni-swap-alt-fill"></em></span>
              <span class="nk-menu-text">Brand Car</span>
            </a>
          </li>
          <li class="nk-menu-item">
            <a href="{{ url('dashboard/inform/profile') }}" class="nk-menu-link">
              <span class="nk-menu-icon"><em class="icon ni ni-swap-alt-fill"></em></span>
              <span class="nk-menu-text">Profile</span>
            </a>
          </li>
          <li class="nk-menu-item">
            <a href="{{ url('dashboard/inform/overrage') }}" class="nk-menu-link">
              <span class="nk-menu-icon"><em class="icon ni ni-info"></em></span>
              <span class="nk-menu-text">Overrage</span>
            </a>
          </li>
          <li class="nk-menu-heading">
            <h6 class="overline-title text-primary-alt">Master</h6>
          </li>
          <li class="nk-menu-item">
            <a href="{{ url('dashboard/master/faq') }}" class="nk-menu-link">
              <span class="nk-menu-icon"><em class="icon ni ni-question"></em></span>
              <span class="nk-menu-text">FAQ</span>
            </a>
          </li>
          <li class="nk-menu-item">
            <a href="{{ url('dashboard/master/category') }}" class="nk-menu-link">
              <span class="nk-menu-icon"><em class="icon ni ni-tags"></em></span>
              <span class="nk-menu-text">Category</span>
            </a>
          </li>
          <li class="nk-menu-heading">
            <h6 class="overline-title text-primary-alt">Extra</h6>
          </li>
          <li class="nk-menu-item">
            <a href="{{ url('dashboard/settings') }}" class="nk-menu-link">
              <span class="nk-menu-icon"><em class="icon ni ni-setting-alt"></em></span>
              <span class="nk-menu-text">Settings</span>
            </a>
          </li>
        </ul><!-- .nk-menu -->
      </div><!-- .nk-sidebar-menu -->
    </div><!-- .nk-sidebar-content -->
  </div><!-- .nk-sidebar-element -->
</div>

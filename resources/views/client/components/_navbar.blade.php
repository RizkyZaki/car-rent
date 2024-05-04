<!-- HEADER
   ============================================= -->
<header id="header" class="tra-menu navbar-light white-scroll">
  <div class="header-wrapper">


    <!-- MOBILE HEADER -->
    <div class="wsmobileheader clearfix">
      <span class="smllogo"><img src="{{ asset('storage/assets/logo/' . appSetting()->logo) }}" alt="mobile-logo"></span>
      <a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>
    </div>


    <!-- NAVIGATION MENU -->
    <div class="wsmainfull menu clearfix">
      <div class="wsmainwp clearfix">


        <!-- HEADER BLACK LOGO -->
        <div class="desktoplogo">
          <a href="#hero-14" class="logo-black">
            <img class="light-theme-img" src="{{ asset('storage/assets/logo/' . appSetting()->logo) }}" alt="logo">
            <img class="dark-theme-img" src="{{ asset('storage/assets/logo/' . appSetting()->logo) }}" alt="logo">
          </a>
        </div>

        <!-- HEADER WHITE LOGO -->
        <div class="desktoplogo">
          <a href="#hero-14" class="logo-white"><img src="{{ asset('storage/assets/logo/' . appSetting()->logo) }}"
              alt="logo"></a>
        </div>


        <!-- MAIN MENU -->
        <nav class="wsmenu clearfix">
          <ul class="wsmenu-list nav-theme">

            <!-- SIMPLE NAVIGATION LINK -->
            <li class="nl-simple" aria-haspopup="true"><a href="{{ url('/') }}" class="h-link">Beranda</a></li>
            <li class="nl-simple" aria-haspopup="true"><a href="{{ url('blog') }}" class="h-link">Blog</a></li>
            <li class="nl-simple" aria-haspopup="true"><a href="{{ url('profile') }}" class="h-link">Profile Kami</a>
            </li>
            <li class="nl-simple" aria-haspopup="true"><a href="{{ url('contact') }}" class="h-link">Kontak</a></li>

          </ul>
        </nav> <!-- END MAIN MENU -->


      </div>
    </div> <!-- END NAVIGATION MENU -->


  </div> <!-- End header-wrapper -->
</header> <!-- END HEADER -->

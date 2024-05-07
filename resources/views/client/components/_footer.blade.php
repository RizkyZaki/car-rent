<!-- FOOTER-3
   ============================================= -->
<footer id="footer-3" class="pt-100 footer">
  <div class="container">

    <!-- FOOTER CONTENT -->
    <div class="row">

      <!-- FOOTER LOGO -->
      <div class="col-md-6">
        <div class="footer-info">
          <div class="d-flex px-2">
            <img class="footer-logo" src="{{ asset('storage/assets/logo/' . appSetting()->logo) }}" alt="footer-logo">
            <img class="footer-logo-dark" src="{{ asset('storage/assets/logo/' . appSetting()->logo) }}"
              alt="footer-logo">
            <h3>{{ appSetting()->company }}</h3>
          </div>
          <p class="mt-3">{{ appSetting()->description }}</p>
        </div>
      </div>

      <!-- FOOTER LINKS -->
      <div class="col-md-3">
        <div class="footer-links fl-1">

          <!-- Title -->
          <h6 class="s-17 w-700">About Us</h6>

          <!-- Links -->
          <ul class="foo-links clearfix">
            <li>
              <p><a href="{{ url('blog/syarat-dan-ketentuan') }}">Syarat &
                  Ketentuan</a></p>
            </li>
            <li>
              <p><a href="{{ url('blog/rentalpedia') }}">Company
                  Profile</a></p>
            </li>
            <li>
              <p><a href="https://wa.me/{{ appSetting()->phone }}">Hubungi Kami</a></p>
            </li>
            <li>
              <p><a href="{{ url('blog') }}">Blog</a></p>
            </li>
            <li>
              <p><a href="sitemap.xml">Sitemap</a></p>
            </li>
          </ul>

        </div>
      </div> <!-- END FOOTER LINKS -->

      <!-- FOOTER LINKS -->
      <div class="col-md-3">
        <div class="footer-links fl-4">

          <!-- Title -->
          <h6 class="s-17 w-700">Contact Us</h6>

          <!-- Mail Link -->
          <p class="footer-mail-link ico-25">
            <a href="https://wa.me/{{ appSetting()->phone }}">Whatsapp : {{ appSetting()->phone }}</a>
          </p>
          <p class="footer-mail-link ico-25">
            <a href="mailto:{{ appSetting()->email }}">Email : {{ appSetting()->email }}</a>
          </p>
        </div>
      </div> <!-- END FOOTER LINKS -->

    </div> <!-- END FOOTER CONTENT -->

    <hr> <!-- FOOTER DIVIDER LINE -->

    <!-- BOTTOM FOOTER -->
    <div class="bottom-footer">

      <!-- FOOTER COPYRIGHT -->
      <div class="text-center">
        <div class="footer-copyright">
          <p class="p-sm">{{ appSetting()->text_copyright }}</p>
        </div>
      </div>

      <!-- FOOTER SECONDARY LINK -->


    </div> <!-- End row -->
  </div> <!-- END BOTTOM FOOTER -->


  </div> <!-- End container -->
</footer> <!-- END FOOTER-3 -->

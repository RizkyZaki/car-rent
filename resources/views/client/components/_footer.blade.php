<!-- FOOTER-3
   ============================================= -->
<footer id="footer-3" class="pt-100 footer">
  <div class="container">

    <!-- FOOTER CONTENT -->
    <div class="row">

      <!-- FOOTER LOGO -->
      <div class="col-md-5">
        <div class="footer-info">
          <img class="footer-logo" src="{{ asset('storage/assets/logo/' . appSetting()->logo) }}" alt="footer-logo">
          <img class="footer-logo-dark" src="{{ asset('storage/assets/logo/' . appSetting()->logo) }}" alt="footer-logo">
          <p class="mt-3">{{ appSetting()->description }}</p>
        </div>
      </div>

      <!-- FOOTER LINKS -->
      <div class="col-md-5">
        <div class="footer-links fl-1">

          <!-- Title -->
          <h6 class="s-17 w-700">Menu</h6>

          <!-- Links -->
          <ul class="foo-links clearfix">
            <li>
              <p><a href="{{ url('blog') }}">Blog</a></p>
            </li>
            <li>
              <p><a href="{{ url('post') }}">Post</a></p>
            </li>
            <li>
              <p><a href="{{ url('contact') }}">Contact Us</a></p>
            </li>
          </ul>

        </div>
      </div> <!-- END FOOTER LINKS -->

      <!-- FOOTER LINKS -->
      <div class="col-md-2">
        <iframe src="https://www.google.com/maps/d/embed?mid=1t5CFC_db7pXOUslQd7uwWB-muXk&hl=en&ehbc=2E312F"
          width="200" height="180"></iframe>
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

<!-- EXTERNAL SCRIPTS
  ============================================= -->
<script src="{{ asset('client/js/jquery-3.7.0.min.js') }}"></script>
<script src="{{ asset('client/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('client/js/modernizr.custom.js') }}"></script>
<script src="{{ asset('client/js/jquery.easing.js') }}"></script>
<script src="{{ asset('client/js/jquery.appear.js') }}"></script>
<script src="{{ asset('client/js/menu.js') }}"></script>
<script src="{{ asset('client/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('client/js/pricing-toggle.js') }}"></script>
<script src="{{ asset('client/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('client/js/quick-form.js') }}"></script>
<script src="{{ asset('client/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('client/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('client/js/popper.min.js') }}"></script>
<script src="{{ asset('client/js/lunar.js') }}"></script>
<script src="{{ asset('client/js/wow.js') }}"></script>

<!-- Custom Script -->
<script src="{{ asset('client/js/custom.js') }}"></script>

<script>
  $(document).on({
    "contextmenu": function(e) {
      console.log("ctx menu button:", e.which);

      // Stop the context menu
      e.preventDefault();
    },
    "mousedown": function(e) {
      console.log("normal mouse down:", e.which);
    },
    "mouseup": function(e) {
      console.log("normal mouse up:", e.which);
    }
  });
</script>

<script>
  $(function() {
    $(".switch").click(function() {
      $("body").toggleClass("theme--dark");
      if ($("body").hasClass("theme--dark")) {
        $(".switch").text("Light Mode");
      } else {
        $(".switch").text("Dark Mode");
      }
    });
  });
</script>

<script>
  $(document).ready(function() {
    if ($("body").hasClass("theme--dark")) {
      $(".switch").text("Light Mode");
    } else {
      $(".switch").text("Dark Mode");
    }
  });
</script>

<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information. -->
<!--
  <script>
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-XXXXX-X']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script');
      ga.type = 'text/javascript';
      ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0];
      s.parentNode.insertBefore(ga, s);
    })();
  </script>
  -->

<script src="{{ asset('client/js/changer.js') }}"></script>
<script defer src="{{ asset('client/js/styleswitch.js') }}"></script>

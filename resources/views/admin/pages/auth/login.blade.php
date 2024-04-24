<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.plugins._top')
  <link rel="stylesheet" href="{{ asset('custom/css/login.css') }}">
</head>

<body>

  <body class="nk-body npc-default pg-auth"
    style="background-color: #4158d0;
  background-image: linear-gradient(
      43deg,
      #4158d0 0%,
      #c850c0 46%,
      #ffcc70 100%
  );">
    <div class="nk-app-root">
      <div class="nk-main">
        <div class="nk-wrap nk-wrap-nosidebar">
          <div class="nk-content">
            <div class="nk-block nk-block-middle nk-auth-body wide-xs">

              <div class="card card-bordered">
                <form class="form-validate is-alter" action="#">
                  <div class="card-inner card-inner-lg">
                    <div class="nk-block-head">
                      <div class="nk-block-head-content">
                        <h4 class="nk-block-title">Login</h4>
                        <div class="nk-block-des">
                          <p>
                            Access the {{ appSetting()->name }} panel by using Email and Password</p>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="form-label-group">
                        <label class="form-label" for="email">Email</label>
                      </div>
                      <div class="form-control-wrap">
                        <input type="email" name="email" id="email" class="form-control form-control-lg"
                          placeholder="Email" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="form-label-group">
                        <label class="form-label" for="password">Password</label>
                      </div>
                      <div class="form-control-wrap">
                        <span class="form-icon form-icon-right">
                          <em class="switch-icon icon ni ni-eye-off"></em>
                        </span>
                        <input type="password" name="password" id="password" class="form-control form-control-lg"
                          placeholder="Password" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <button class="btn login btn-lg btn-primary btn-block" name="login">
                        <div class="spinner-border visually-hidden" role="status"></div>Login
                      </button>

                    </div>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    @include('admin.plugins._bottom')
    <script>
      let csrfToken = $('meta[name="csrf-token"]').attr('content');
    </script>
    <script src="{{ asset('custom/js/auth/login.js') }}"></script>

</html>

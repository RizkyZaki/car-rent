<!DOCTYPE html>
<html lang="en">

<head>
  @include('client.plugins._top')
</head>

<body>

  <div id="loading" class="loading--theme">
    <div id="loading-center"><span class="loader"></span></div>
  </div>
  <div id="page" class="page font--jakarta">
    @include('client.components._navbar')
    @yield('content-client')
    @include('client.components._footer')
  </div>
  @include('client.plugins._bottom')

</body>

</html>

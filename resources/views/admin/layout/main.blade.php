<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
  @include('admin.plugins._top')
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
  <div class="overlay"></div>
  <div class="spanner">
    <div class="loader"></div>
  </div>
  <div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
      <!-- sidebar @s -->
      @include('admin.components._sidebar')
      <!-- sidebar @e -->
      <!-- wrap @s -->
      <div class="nk-wrap">
        <!-- main header @s -->
        @include('admin.components._header')
        <!-- main header @e -->
        <!-- content @s -->
        <div class="nk-content ">
          @yield('content-admin')
        </div>
        <!-- content @e -->
        <!-- footer @s -->
        <!-- footer @e -->
        @include('admin.components._footer')
      </div>
      <!-- wrap @e -->
    </div>
    <!-- main @e -->
  </div>
  <!-- app-root @e -->
  <!-- select region modal -->
  <!-- JavaScript -->
  @include('admin.plugins._bottom')
</body>

</html>

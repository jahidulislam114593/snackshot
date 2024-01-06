<!DOCTYPE html>
<html lang="en">
  <head>
       @include('admin.includes.head')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.includes.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->

      @include('admin.includes.nav')
      
        <!-- partial -->
    
      @yield('main')

      <!-- partial:partials/_footer.html -->


      <!-- @include('admin.includes.footer') -->


      
      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->

      @include('admin.includes.script')
    <!-- End custom js for this page -->
  </body>
</html>
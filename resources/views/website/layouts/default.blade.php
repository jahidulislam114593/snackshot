<!DOCTYPE html>
<html lang="en">

<head>
    @include('website.includes.head')
</head>

<body>
    <!-- Start Top Nav -->
    @include('website.includes.nav')
    <!-- Close Top Nav -->


    <!-- Header -->
    @include('website.includes.header')
    <!-- Close Header -->

    <!-- Modal -->
    @include('website.includes.modal')



    @yield('content')
    
    
    
    <!-- Start Footer -->
    @include('website.includes.footer')
    <!-- End Footer -->

    <!-- Start Script -->
    @include('website.includes.script')
    <!-- End Script -->
</body>

</html>
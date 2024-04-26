<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ESPACE EMPLOI</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    {{-- <link href="{{ asset('templateFiles/FrontOffice_/lib/animate/animate.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('templateFiles/FrontOffice_/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('templateFiles/FrontOffice_/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('templateFiles/FrontOffice_/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('templateFiles/FrontOffice_/css/style.css') }}" rel="stylesheet">

    <!-- Inclure les scripts de SweetAlert et Toastr -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    @include('component.toastrNotification')





    @yield('content')






    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('templateFiles/FrontOffice_/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('templateFiles/FrontOffice_/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('templateFiles/FrontOffice_/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('templateFiles/FrontOffice_/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('templateFiles/FrontOffice_/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('templateFiles/FrontOffice_/lib/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('templateFiles/FrontOffice_/lib/lightbox/js/lightbox.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('templateFiles/FrontOffice_/js/main.js') }}"></script>
</body>

</html>

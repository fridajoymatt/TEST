 <!-- Navbar Start -->
 <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
    <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-primary">EMPLOI</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{ route('home') }}" class="nav-item nav-link{{ Route::is('home') ? ' active' : '' }}">Accueil</a>

            <a href="{{ route('index_offre') }}" class="nav-item nav-link{{ Route::is('index_offre') || Route::is('postuler') || Route::is('step1') || Route::is('step2') || Route::is('step3') || Route::is('step4') || Route::is('step5') ? ' active' : '' }}">Nos offres</a>

            <a href="{{ route('contact') }}" class="nav-item nav-link{{ Route::is('contact') || Route::is('form-contact') ? ' active' : '' }}">Contact</a>

        </div>
        <a href="{{ route('login') }}" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Connexion<i class="fa fa-arrow-right ms-3"></i></a>
    </div>
</nav>
<!-- Navbar End -->

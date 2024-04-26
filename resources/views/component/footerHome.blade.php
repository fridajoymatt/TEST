    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Services</h4>
                    <a class="btn btn-link" href="">General Carpentry</a>
                    <a class="btn btn-link" href="">Furniture Remodeling</a>
                    <a class="btn btn-link" href="">Wooden Floor</a>
                    <a class="btn btn-link" href="">Wooden Furniture</a>
                    <a class="btn btn-link" href="">Custom Carpentry</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Our Services</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">Support</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Newsletter</h4>
                    <p>N'hésitez pas à rajouter votre email pour être à l'affut de nos informations.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <form id="myForm2" action="{{ route('newsletter.subscribe') }}" method="POST">
                            @csrf
                            <input class="form-control border-0 w-100 py-3 ps-4 pe-5" class="@error('email') is-invalid @enderror" name="email" type="email" placeholder="votre email">
                            <button type="submit" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">S'inscrire</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="https://sifsarl.com/">SIFS</a>, 2023.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Développé par <a class="border-bottom" href="https://firdaous-kpelafia.000webhostapp.com/">Firdaous KPELAFIA</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <script>
        $(document).ready(function() {
            $('#myForm2').submit(function(event) {
                event.preventDefault();

                Swal.fire({
                    title: 'Traitement en cours',
                    html: 'Veuillez patienter...',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                var formData = $(this).serialize();
                var form = this;

                $.ajax({
                    type: 'POST',
                    url: 'newsletter/subscribe',
                    data: formData,
                    success: function(response) {
                        Swal.fire({
                            title: response.title,
                            text: response.message,
                            icon: response.icon,
                            confirmButtonColor: '#2795c9',
                            confirmButtonText: 'OK',
                        });

                        form.reset();
                    },
                    error: function(error) {
                        Swal.fire({
                            title: 'Erreur!',
                            text: 'Une erreur s\'est produite lors de l\'envoi du formulaire',
                            icon: 'error',
                            confirmButtonColor: '#2795c9',
                            confirmButtonText: 'OK'
                        });
                    },
                    // complete: function() {
                    //     Swal.close();
                    // }
                });
            });
        });
    </script>



    {{-- <script>
        $(document).ready(function() {
            $('#myForm2').submit(function(event) {
                event.preventDefault(); // Empêche le rechargement de la page

                // Afficher une boîte de dialogue de confirmation avec un loader
                Swal.fire({
                    title: 'Traitement en cours',
                    html: 'Veuillez patienter...',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                // Récupérer les données du formulaire
                var formData = $(this).serialize();
                var form = this;

                $.ajax({
                    type: 'POST',
                    url: 'newsletter/subscribe',
                    data: formData,
                    success: function(response) {
                        console.log(response); // Afficher la réponse dans la console

                        // Vérifier la session "danger" dans la réponse
                        if (response.session_status === 'danger') {
                            Swal.fire({
                                title: 'Erreur!',
                                text: response.message, // Utiliser le message renvoyé par le serveur
                                icon: 'Warning',
                                confirmButtonColor: '#2795c9',
                                confirmButtonText: 'OK'
                            });
                        } else {
                            // Fermer le loader et afficher le message de succès avec SweetAlert
                            Swal.fire({
                                title: 'Succès!',
                                text: 'Cet e-mail est ajouté abonné à la newsletter.',
                                icon: 'success',
                                confirmButtonColor: '#2795c9',
                                confirmButtonText: 'OK'
                            });

                            // Réinitialiser le formulaire
                            form.reset();
                        }
                    },
                    error: function(error) {
                        // Fermer le loader et afficher le message d'erreur avec SweetAlert
                        Swal.fire({
                            title: 'Erreur!',
                            text: 'Une erreur s\'est produite lors de l\'envoi du formulaire',
                            icon: 'error',
                            confirmButtonColor: '#2795c9',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            });
        });
    </script> --}}


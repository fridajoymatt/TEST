@extends('layouts.frontOfficeLayout')

@section('content')
@include('component.topHeader')
@include('component.header')
@include('component.subHeaderContact')

{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <!-- Inclure les scripts de SweetAlert et Toastr -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}



    <!-- Contact Start -->
    <div class="container-fluid bg-light overflow-hidden px-lg-0" style="margin: 6rem 0;">
        <div class="container contact px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 contact-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 ps-lg-0">
                        <div class="section-title text-start">
                            <h1 class="display-5 mb-4">Contactez-nous</h1>
                        </div>
                        <p class="mb-4">Nous sommes ravis de vous accueillir sur notre site. Si vous avez des questions, des commentaires ou des suggestions, n'hésitez pas à nous contacter. Notre équipe est là pour vous aider et vous fournir les informations dont vous avez besoin.</p>
                        <form method="post" action="{{ route('form-contact') }}" id="myForm">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Entrer votre nom complet" required>
                                        <label for="name">Nom</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Entrer votre email" required>
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Entrer l'objet de votre mail" required>
                                        <label for="subject">Objet</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="message" placeholder="Laisser votre message ici" id="message" style="height: 100px" required></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Envoyer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 pe-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <iframe class="position-absolute w-100 h-100" style="object-fit: cover;"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                        frameborder="0" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@include('component.footerHome')

<!-- ... contenu HTML précédent ... -->

<script>
    $(document).ready(function() {
        $('#myForm').submit(function(event) {
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

            console.log(formData)

            $.ajax({
                type: 'POST',
                url: '/form-contact',
                data: formData,
                success: function(response) {
                    // Fermer le loader et afficher le message de succès avec SweetAlert
                    Swal.fire({
                        title: 'Succès!',
                        text: 'Formulaire envoyé avec succès',
                        icon: 'success',
                        confirmButtonColor: '#2795c9',
                        confirmButtonText: 'OK'
                    });

                    // Réinitialiser le formulaire
                    form.reset();
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
</script>

<!-- ... balises de fermeture du corps, pied de page, etc. ... -->





@endsection

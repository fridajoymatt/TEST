@extends('component.indexForm')

@section('container')
                <!-- Étape 3: Formation -->
                <div class="step">
                    <h3>Formations, Diplômes, Certifications</h3><br><br>
                            <span>Veuillez rentrer vos formations.</span><br><br>
                            <input type="text" name="formation_validation" hidden value="{{ $count }}">
                                <div class="row">

                                   <div class="col-6">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                                        Ajouter
                                      </button>
                                   </div>

                                      <!-- Modal CREATE-->
                                      {{-- <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> --}}
                                        <div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter une formation</h1>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="div">
                                                    <form action="{{ route('createFormation') }}" method="post"  enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="formationTitre" class="form-label">Titre de la Formation</label>
                                                            <input type="text" placeholder="enter le titre de la formation" class="form-control @error('libelle') is-invalid @enderror" id="formationTitre" name="libelle">
                                                            @error('libelle')
                                                                    <div class="invalid-feedback">
                                                                        <span class="violet">{{ $message }}</span>
                                                                    </div>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="formationTitre" class="form-label">Domaine de la Formation</label>
                                                            <select class="form-control  select2 my-1 mr-sm-2 @error('domaine_id') is-invalid @enderror" id="inlineFormCustomSelectPref" name="domaine_id" style="width: 100%">
                                                                <option selected="false" disabled>-- Choisir le domaine --</option>

                                                                @foreach ($domaines as $domaine)
                                                                <option value="{{ $domaine->id }}" @if (old('domaine_id') == $domaine->id) selected @endif>{{ $domaine->libelle }}</option>
                                                                @endforeach


                                                              </select>
                                                              @error('domaine_id')
                                                                <div class="invalid-feedback">
                                                                  {{ $message }}
                                                              </div>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="etablissement" class="form-label">Établissement</label>
                                                            <input type="text" placeholder="entrer votre etablissement de formation" class="form-control @error('etablissement') is-invalid @enderror" id="etablissement" name="etablissement">
                                                            @error('etablissement')
                                                            <div class="invalid-feedback">
                                                                <span class="violet">{{ $message }}</span>
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="formationTitre" class="form-label">Lieu de la Formation</label>
                                                            <select class="form-control custom-select my-1 mr-sm-2  @error('pays_id') is-invalid @enderror" name="pays_id">
                                                                <option selected="false" disabled>-- Choisir la pays --</option>

                                                                @foreach ($pays as $pays)
                                                                <option value="{{ $pays->id }}" @if (old('pays_id') == $pays->id) selected @endif>{{ $pays->libelle }}</option>
                                                                @endforeach


                                                              </select>
                                                              @error('pays_id')
                                                              <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                         @enderror
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="annee">Année d'obtention :</label>
                                                            <input type="month" class="form-control @error('annee_diplome') is-invalid @enderror" id="annee_diplome" name="annee_diplome" min="1950-01" max="<?php echo date("Y-m"); ?>" step="1">
                                                            @error('annee_diplome')
                                                            <div class="invalid-feedback">
                                                                <span class="violet">{{ $message }}</span>
                                                            </div>
                                                            @enderror
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="annee">Piece justificative:</label>
                                                            <input type="file" class="form-control @error('document') is-invalid @enderror" id="" name="document">

                                                            @error('document')
                                                            <div class="invalid-feedback">
                                                                <span class="violet">{{ $message }}</span>
                                                            </div>
                                                            @enderror
                                                        </div>

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                              <button type="submit" class="btn btn-primary">Enregistrer</button>
                                            </form>

                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                       <!-- Modal EDIT-->
                                       {{-- <div class="modal fade" id="addModal2" tabindex="-1" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true"> --}}
                                        <div class="modal fade" id="addModal2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h1 class="modal-title fs-5" id="exampleModalLabel">Mofifier la formation une formation</h1>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="div">
                                                    {{-- <td>{{ $formation->formation_libelle }}</td> --}}

                                                    <form action="{{ route('createFormation') }}" method="post">
                                                        @method('PUT')
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="formationTitre" class="form-label">Titre de la Formation</label>
                                                            <input type="text" placeholder="enter le titre de la formation" class="form-control @error('libelle') is-invalid @enderror" id="formationTitre" name="libelle">
                                                            @error('libelle')
                                                                    <div class="invalid-feedback">
                                                                        <span class="violet">{{ $message }}</span>
                                                                    </div>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="formationTitre" class="form-label">Domaine de la Formation</label>
                                                            <select class="form-control  select2 my-1 mr-sm-2 @error('domaine_id') is-invalid @enderror" id="inlineFormCustomSelectPref" name="domaine_id" style="width: 100%">
                                                                <option selected="false" disabled>-- Choisir le domaine --</option>

                                                                @foreach ($domaines as $domaine)
                                                                <option value="{{ $domaine->id }}" @if (old('domaine_id') == $domaine->id) selected @endif>{{ $domaine->libelle }}</option>
                                                                @endforeach


                                                              </select>
                                                              @error('domaine_id')
                                                                <div class="invalid-feedback">
                                                                  {{ $message }}
                                                              </div>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="etablissement" class="form-label">Établissement</label>
                                                            <input type="text" placeholder="entrer votre etablissement de formation" class="form-control @error('etablissement') is-invalid @enderror" id="etablissement" name="etablissement">
                                                            @error('etablissement')
                                                            <div class="invalid-feedback">
                                                                <span class="violet">{{ $message }}</span>
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="formationTitre" class="form-label">Lieu de la Formation</label>
                                                            <select class="form-control custom-select my-1 mr-sm-2  @error('pays_id') is-invalid @enderror" name="pays_id">
                                                                <option selected="false" disabled>-- Choisir la pays --</option>

                                                                @foreach ($pays2 as $pays)
                                                                <option value="{{ $pays->id }}" @if (old('pays_id') == $pays->id) selected @endif>{{ $pays->libelle }}</option>
                                                                @endforeach


                                                              </select>
                                                              @error('pays_id')
                                                              <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                         @enderror
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="annee">Année d'obtention :</label>
                                                            <input type="month" class="form-control @error('annee_diplome') is-invalid @enderror" id="annee_diplome" name="annee_diplome" min="1950-01" max="<?php echo date("Y-m"); ?>" step="1">

                                                            @error('annee_diplome')
                                                            <div class="invalid-feedback">
                                                                <span class="violet">{{ $message }}</span>
                                                            </div>
                                                            @enderror
                                                        </div>




                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                              <button type="submit" class="btn btn-primary">Enregistrer</button>
                                            </form>

                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                </div>

                            <br><br>
                            @if ($count !==0)
                            <div class="card">


                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Formation</th>
                                            <th scope="col">Domaine</th>
                                            <th scope="col">Etablissement</th>
                                            <th scope="col">Lieu de formation</th>
                                            <th scope="col">Année d'obtention</th>
                                            <th scope="col">Document</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($formations as $formation )
                                    <tr>
                                        <td>{{ $formation->formation_libelle }}</td>
                                        <td>{{ $formation->domaine_libelle }}</td>
                                            <td>{{ $formation->etablissement }}</td>
                                            <td>{{ $formation->pays_libelle }}</td>
                                            <?php
                                                // Définir l'encodage UTF-8
                                                header('Content-Type: text/html; charset=utf-8');

                                                // Date spécifique au format année-mois-jour (2023-08-15)
                                                $date = $formation->annee_diplome;
                                                setlocale(LC_TIME, 'fr_FR.utf8', 'fra');

                                                // Convertir la date en un objet DateTime
                                                $dateObj = new DateTime($date);

                                                // Fonction pour personnaliser le format du mois
                                                // function customMonthName($monthNumber) {
                                                //     $customNames = [
                                                //         1 => 'Janvier',
                                                //         2 => 'Février',
                                                //         3 => 'Mars',
                                                //         4 => 'Avril',
                                                //         5 => 'Mai',
                                                //         6 => 'Juin',
                                                //         7 => 'Juillet',
                                                //         8 => 'Août',
                                                //         9 => 'Septembre',
                                                //         10 => 'Octobre',
                                                //         11 => 'Novembre',
                                                //         12 => 'Décembre'
                                                //     ];

                                                //     return $customNames[$monthNumber] ?? '';
                                                // }

                                                // Obtenir le numéro du mois
                                                $monthNumber = intval($dateObj->format("m"));

                                                // Obtenir le nom personnalisé du mois
                                                $customMonth = customMonthName($monthNumber);

                                                // Obtenir l'année
                                                $year = $dateObj->format("Y");
                                            ?>

                                            <td>{{ $customMonth . ' ' . $year}}</td>
                                            <td>
                                                <a href="{{ asset('storage/' . $formation->document) }}" style="font-size: 100%;">Pdf</a>


                                            </td>
                                            {{-- <td> --}}
                                                {{-- <a href="" class="btn btn-outline-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                      </svg>
                                                </a> --}}

                                                {{-- <button data-bs-toggle="modal"  data-id="{{ $formation->id }}" data-bs-target="#addModal2" class="btn btn-outline-warning edit-button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                      </svg>
                                                </button> --}}




                                                {{-- <button id="sweetAlertButton" type="button" class="btn btn-outline-danger" data-id="{{$formation->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                              </svg></button> --}}


                                            {{-- </td> --}}

                                            <td><a class="btn btn-outline-danger" href="{{route('deleteFormation', $formation->id)}}"  onclick="alert('Cette formation va se supprimer !')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                              </svg></a></td>

                                    </tr>
                                    @endforeach

                                    </tbody>

                                </table>


                            </div>
                            @else
                            <div class="card" style="height: 40%">
                                {{-- <td>Aucune experience renseignée</td> --}}
                                @include('component.nofoundFormation')
                            </div>
                            @endif



                    <br><br>


                </div>

                <div class="row">
                    <div class="col-11">
                        <a href="{{ route('step1' , $offre->id) }}" type="button" class="btn btn-primary prev" style="float: right" >Précédent</a>

                    </div>
                    <div class="col">
                        <form action="{{ route('step2' , $offre->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary next" style="float: right" >Suivant</button>
                        </form>
                    </div>
                </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

                <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

                <script>
                    console.log("Le script est exécuté lorsque le document est prêt.");

                    // $(document).ready(function () {

                    //     // Testez ici d'autres actions ou interactions
                    // });
                </script>


            {{-- @if (session('warning')) --}}
                <script>
                //         $(document).ready(function () {
                //     $('#addModal').modal({
                //         show: true
                //     });
                // });
                </script>
            {{-- @endif --}}

            <script>
                    // document.getElementById('sweetAlertButton').addEventListener('click', function () {
                    //     const itemId = button.getAttribute('data-id');


                    //     Swal.fire({
                    //         title: 'Vous êtes sûre?',
                    //         text: "De vouloir supprimer !",
                    //         icon: 'warning',
                    //         showCancelButton: true,
                    //         confirmButtonColor: '#d33',
                    //         cancelButtonColor: '#3085d6',
                    //         confirmButtonText: 'Oui, bien-sûre !',
                    //         cancelButtonText: 'Non',
                    //     }).then((result) => {
                    //         if (result.isConfirmed) {
                    //             window.location.href = '/delete-formation/' + itemId;

                    //         }
                    //     });
                    // });



                // $(document).ready(function () {
                //     $('#addModal').modal({
                //         show: true
                //     });
                //     console.log("Mon code s'exécute ici !");

                // });
                    $(document).ready(function () {

                        window.$('#addModal').modal();                    // $('#addModal').modal({
                    //     show: true
                    //     })


                });

                // $('.edit-button').on('click', function () {
                //     var formationId = $(this).data('id');

                //         $.ajax({
                //             url: '/formation/' + formationId,
                //             method: 'GET',
                //             success: function (data) {
                //                 $('#id').val(data.id);
                //                 // $('#nom').val(data.nom);
                //                 // Pré-remplissez d'autres champs du formulaire
                //             },
                //             error: function (error) {
                //                 console.log(error);
                //             }
                //         });
                //     });
            </script>


<br><br><br>

@endsection



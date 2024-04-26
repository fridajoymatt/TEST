@extends('component.indexForm')

@section('container')

                <!-- Étape 4: Experience -->

                <div class="step">
                    <h3>Expérience Professionnelle</h3><br><br>
                    <span>Si vous n'avez aucune expérience professionnelle, veuillez cocher la case ci-dessous et cliquer sur "Suivant" pour continuer votre candidature.</span><br><br>
                <form action="{{ route('step3' , $offre->id) }}" method="POST">
                    @csrf
                    <label>
                        <input type="checkbox" name="no_experience" value="1" @if(old('no_experience', false)) checked @endif> Je n'ai pas d'expérience professionnelle
                    </label>
                    <br>
                    <div class="row">
                        <div class="col">
                            <br>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                Ajouter
                              </button>
                          </div>

                    </div>
                    <br><br>


                    @if ($count !==0)
                            <div class="card">


                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Employeur</th>
                                            <th scope="col">Fonction</th>
                                            <th scope="col">Lieu</th>
                                            {{-- <th scope="col">Description</th> --}}
                                            <th scope="col">Debut</th>
                                            <th scope="col">Fin</th>
                                            <th scope="col" hidden>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($experiences as $experience )
                                    <tr>
                                            <td>{{ $experience->employeur }}</td>
                                            <td>{{ $experience->fonction }}</td>
                                            <td>{{ $experience->libelle }}</td>
                                            {{-- <td>{{ $experience->description }}</td> --}}
                                            <?php
                                            $datedebut = $experience->debut;
                                            $datefin = $experience->fin;

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



                                            // Utilisation de la fonction pour formater les dates
                                            $formattedDateDebut = formatFrenchDate($datedebut);
                                            $formattedDateFin = formatFrenchDate($datefin);
                                        ?>


                                            <td>{{ $formattedDateDebut }}</td>
                                            <td>{{ $formattedDateFin }}</td>

                                            <td hidden>
                                                {{-- <a href="" class="btn btn-outline-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                      </svg>
                                                </a> --}}

                                                {{-- <a href="" class="btn btn-outline-warning">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                      </svg>
                                                </a> --}}

                                                <a class="btn btn-outline-danger" href="{{route('deleteExperience', $experience->id)}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                              </svg></a>
                                            </td>
                                    </tr>
                                    @endforeach

                                    </tbody>

                                </table>


                            </div>
                            @else
                            <div class="card" style="height: 40%">
                                {{-- <td>Aucune experience renseignée</td> --}}
                                @include('component.nofoundExperience')
                            </div>

                    @endif

                    </div>
                    <br><br>

                    <div class="row">
                        <div class="col-11">
                            <a href="{{ route('step2' , $offre->id) }}" type="button" class="btn btn-primary prev" style="float: right" >Précédent</a>

                        </div>
                        <div class="col">
                            {{-- <form action="{{ route('step3' , $offre->id) }}" method="POST">
                                @csrf --}}
                                <button type="submit" class="btn btn-primary next" style="float: right" >Suivant</button>
                            </form>
                        </div>
                    </div>


                </div>
                 <!-- Modal -->
                 <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter une experience</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="div">
                                <form action="{{ route('createExperience') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="employeur" class="form-label">Employeur</label>
                                        <input type="text" value="{{ old('employeur')}}" class="form-control  @error('employeur') is-invalid @enderror" id="employeur" name="employeur">
                                        @error('employeur')
                                              <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                          @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="fonction" class="form-label">Fonction</label>
                                        <input type="text" value="{{ old('fonction')}}" class="form-control @error('fonction') is-invalid @enderror" id="fonction" name="fonction">
                                        @error('fonction')
                                              <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                          @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="dateDebut" class="form-label">Date de Début</label>
                                            <input type="date" value="{{ old('debut')}}" min="1950-01-01" max="<?= date('Y-m-d'); ?>" class="form-control @error('debut') is-invalid @enderror" id="dateDebut" name="debut">
                                            @error('debut')
                                              <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                          @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="dateFin" class="form-label">Date de Fin</label>
                                            <input type="date" value="{{ old('fin')}}" class="form-control @error('fin') is-invalid @enderror" id="dateFin" name="fin" min="{{ old('debut') ? old('debut') : '1950-01-01' }}">
                                            @error('fin')
                                              <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                          @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="pays" class="form-label">Pays</label>
                                        <div class="mb-3">
                                            <label for="formationTitre" class="form-label">Lieu de l'emploi</label>
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
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control  @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description')}}</textarea>
                                        @error('description')
                                              <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                          @enderror
                                    </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                          <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </form>
                      </div>
                    </div>
                  </div>
                  <br><br><br>


@endsection

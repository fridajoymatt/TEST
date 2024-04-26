@extends('component.indexForm')

@section('container')

                <!-- Étape 5: Langue -->

                <div class="step">
                    <h3>Langue</h3><br><br>
                    <span>Veuillez rentrer les langues.</span><br><br>
                    <div class="col">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                            Ajouter
                          </button>
                      </div>

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter une langue</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="div">
                                    <form method="POST" action="{{ route('createLangue') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="libelle" class="form-label">Libellé de la Langue</label>
                                                    <input type="text" class="form-control @error('libelle') is-invalid @enderror" value="{{ old('libelle') }}" id="libelle" name="libelle">
                                                    @error('libelle')
                                                            <div class="invalid-feedback">
                                                                <span class="violet">{{ $message }}</span>
                                                            </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="niveau" class="form-label">Niveau</label>
                                                    <select class="form-select @error('niveau') is-invalid @enderror" id="niveau" name="niveau">
                                                        <option value="" selected disabled>-- Choisir le niveau --</option>
                                                        <option value="Débutant" @if (old('niveau') == 'Débutant') selected @endif>Débutant</option>
                                                        <option value="Intermédiaire" @if (old('niveau') == 'Intermédiaire') selected @endif>Intermédiaire</option>
                                                        <option value="Avancé" @if (old('niveau') == 'Avancé') selected @endif>Avancé</option>
                                                    </select>
                                                    @error('niveau')
                                                            <div class="invalid-feedback">
                                                                <span class="violet">{{ $message }}</span>
                                                            </div>
                                                    @enderror
                                                </div>
                                            </div>
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
                    {{-- <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="langue_anglais" class="form-label">Anglais</label>
                            <select class="form-select" id="langue_anglais" name="langue_anglais">
                                <option value="" selected disabled>-- Choisir le niveau --</option>
                                <option value="debutant">Débutant</option>
                                <option value="intermediaire">Intermédiaire</option>
                                <option value="avance">Avancé</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="langue_francais" class="form-label">Français</label>
                            <select class="form-select" id="langue_francais" name="langue_francais">
                                <option value="" selected disabled>-- Choisir le niveau --</option>
                                <option value="debutant">Débutant</option>
                                <option value="intermediaire">Intermédiaire</option>
                                <option value="avance">Avancé</option>
                            </select>
                        </div>
                    </div>
                    </div> --}}

                    <br><br>
                    @if ($count !==0)
                            <div class="card">


                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">libelle</th>
                                            <th scope="col">niveau</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($langues as $langue )
                                    <tr>
                                            <td>{{ $langue->libelle }}</td>
                                            <td>{{ $langue->niveau }}</td>

                                            <td><a class="btn btn-outline-danger" href="{{route('deleteLangue', $langue->id)}}"  onclick="alert('Cette langue va se supprimer !')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
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
                                 @include('component.nofoundLangue')
                            </div>
                            @endif

                    <br><br>

                    <div class="row">
                        <div class="col-11">
                            <a href="{{ route('step3', $offre->id) }}" type="button" class="btn btn-primary prev" style="float: right" >Précédent</a>

                        </div>
                        <div class="col">
                            <form action="{{ route('step4', $offre->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary next" style="float: right" >Suivant</button>
                            </form>
                        </div>
                    </div>




                    </div>

                    <br><br><br>
@endsection

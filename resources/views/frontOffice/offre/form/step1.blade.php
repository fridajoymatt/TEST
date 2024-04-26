@extends('component.indexForm')
@section('container')
<div class="container">
    <form id="stepForm" action="{{ route('step1', $offre->id) }}" method="post">
        @csrf
        <!-- Étape 1: Informations Personnelles -->
        <div class="step">
            <div class="card-body">
                <!-- Button trigger modal -->
                <h3>Informations Générales</h3><br><br>
                <span>Veuillez rentrer vos Information merci.</span><br><br>
                <input type="number" name="offre_id" value="{{ $offre_id_input ?: session('info_perso')['offre_id'] }}" hidden>
                <input type="text" name="offre_reference" value="{{ $offre_reference_input ?: session('info_perso')['offre_reference'] }}" hidden>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <input type="text" name="nom" class="form-control required-field @error('nom') is-invalid @enderror" id="exampleFormControlInput1" placeholder="entrer votre nom" value="{{ old('nom')?: @session('info_perso')['nom']  }}">
                            @error('nom')
                                <div >
                                <span class="violet">{{ $message }}</span>
                                </div>
                            @enderror
                          </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="exampleFormControlInput1" value="{{ old('prenom')?: @session('info_perso')['prenom']  }}" placeholder="entrer votre prenom" name="prenom">
                            @error('prenom')
                                <div >
                                <span class="violet">{{ $message }}</span>
                                </div>
                            @enderror
                          </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col" hidden>
                        <div class="mb-3">
                            <input type="text" class="form-control @error('lieuNaissance') is-invalid @enderror" id="exampleFormControlInput1" name="lieuNaissance" value="OFF">
                          </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <input type="date" id="dateOfBirth" max="{{ date('Y-m-d', strtotime('-18 years')) }}" class="form-control @error('dateNaissance') is-invalid @enderror" id="exampleFormControlInput1" name="dateNaissance" value="{{ old('dateNaissance')?: @session('info_perso')['dateNaissance']  }}">
                          </div>
                    </div>
                    <div class="col">
                        <div class="mb-3 form-group">
                            <select class="form-control @error('sexe') is-invalid @enderror" id="gender" name="sexe">
                                <option selected="false" disabled>-- Choisir le sexe --</option>
                                <option value="Feminin" @if ((old('sexe')?: @session('info_perso')['sexe']) ==  'Feminin') selected @endif>Feminin</option>
                                <option value="Masculin" @if ((old('sexe')?: @session('info_perso')['sexe']) ==  'Masculin') selected @endif>Masculin</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col">
                        <select class="form-control custom-select my-1 mr-sm-2  @error('nationnalite') is-invalid @enderror" name="nationnalite">
                            <option selected="false" disabled>-- Choisir la nationnalité --</option>

                            @foreach ($pays as $pays)
                            <option value="{{ $pays->id }}" @if ((old('nationnalite') ?: @session('info_perso')['nationnalite'])== $pays->id) selected @endif>{{ $pays->libelle }}</option>
                            @endforeach


                          </select>
                          @error('nationnalite')
                          <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>

                    <div class="col">
                        <select class="form-control custom-select my-1 mr-sm-2  @error('paysResidence') is-invalid @enderror" name="paysResidence">
                            <option selected="false" disabled>-- Choisir la pays de résidence --</option>

                            @foreach ($payss as $pays)
                            <option value="{{ $pays->id }}" @if ((old('paysResidence')?: @session('info_perso')['paysResidence']) == $pays->id) selected @endif>{{ $pays->libelle }}</option>
                            @endforeach


                          </select>
                          @error('paysResidence')
                          <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                </div>
<br>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <input type="tel" class="form-control  @error('email') is-invalid @enderror" id="exampleFormControlInput1" placeholder="adrese de email" name="email" value="{{ old('email')?: @session('info_perso')['email']  }}">
                            @error('email')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                              @enderror
                          </div>
                    </div>
                    <div class="col" hidden>
                        <input type="text" disabled class="form-control"  placeholder="" style="background-color: #c5c7cb;">
                    </div>
                </div>

                  <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <select class="form-control custom-select my-1 mr-sm-2  @error('niveau') is-invalid @enderror" name="niveau">
                                <option selected="false" disabled>-- Choisir le niveau d'étude --</option>

                                @foreach ($niveaux as $niveau)
                                <option value="{{ $niveau->id }}" @if ((old('niveau') ?: @session('info_perso')['niveau']) == $niveau->id) selected @endif>{{ $niveau->libelle }}</option>
                                @endforeach


                              </select>
                              @error('niveau')
                              <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror

                          </div>
                    </div>

                    {{-- <div class="row"> --}}
                        <div class="col">
                            <div class="mb-3 form-group">
                                <select class="form-control @error('sexe') is-invalid @enderror" id="gender" name="statut_emp">
                                    <option selected="false" disabled>-- Choisir le statut --</option>
                                    <option value="En emploi" @if ((old('statut_emp')?: @session('info_perso')['statut_emp']) ==  'En emploi') selected @endif>En emploi</option>
                                    <option value="Demandeur d'emploi" @if ((old('statut_emp')?: @session('info_perso')['statut_emp']) ==  'Demandeur d\'emploi') selected @endif>Demandeur d'emploi</option>
                                </select>
                                @error('statut_emp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        {{-- </div> --}}
                    </div>
                    <div class="col">
                        <label for="inputPassword2" class="visually-hidden">Total Années d'experience</label>

                        <input type="number" value="{{ old('adresse')?: @session('info_perso')['experience']  }}" class="form-control  @error('experience') is-invalid @enderror"  name="experience" placeholder="selectionner année d'experience" min="0">
                        @error('experience')
                        <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                    @enderror

                        {{-- <select class="form-control @error('experience') is-invalid @enderror" class="col-6" id="experience" name="experience">
                            <option selected="false" disabled>-- Selectionner l'année --</option>
                            <option value="0" @if ((old('experience')?: @session('info_perso')['experience']) ==  '0') selected @endif>Moins de 1 an</option>
                            <option value="1" @if ((old('experience')?: @session('info_perso')['experience']) ==  '1') selected @endif>1 an</option>
                            <option value="2" @if ((old('experience')?: @session('info_perso')['experience']) ==  '2') selected @endif>2 ans</option>
                            <option value="3" @if ((old('experience')?: @session('info_perso')['experience']) ==  '3') selected @endif>3 ans</option>
                            <option value="4" @if ((old('experience')?: @session('info_perso')['experience']) ==  '4') selected @endif>4 ans</option>
                            <option value="5" @if ((old('experience')?: @session('info_perso')['experience']) ==  '5') selected @endif>5 ans</option>
                            <option value="6" @if ((old('experience')?: @session('info_perso')['experience']) ==  '6') selected @endif>6 ans</option>
                            <option value="7" @if ((old('experience')?: @session('info_perso')['experience']) ==  '7') selected @endif>7 ans</option>
                            <option value="8" @if ((old('experience')?: @session('info_perso')['experience']) ==  '8') selected @endif>8 ans</option>
                            <option value="9" @if ((old('experience')?: @session('info_perso')['experience']) ==  '9') selected @endif>9 ans</option>
                            <option value="10" @if ((old('experience')?: @session('info_perso')['experience']) ==  '10') selected @endif>10 ans</option>
                            <option value="11" @if ((old('experience')?: @session('info_perso')['experience']) ==  '11') selected @endif>11 ans</option>
                            <option value="12" @if ((old('experience')?: @session('info_perso')['experience']) ==  '12') selected @endif>12 ans</option>
                            <option value="13" @if ((old('experience')?: @session('info_perso')['experience']) ==  '13') selected @endif>13 ans</option>
                            <option value="14" @if ((old('experience')?: @session('info_perso')['experience']) ==  '14') selected @endif>14 ans</option>
                            <option value="15" @if ((old('experience')?: @session('info_perso')['experience']) ==  '15') selected @endif>15 ans</option>
                            <option value="16" @if ((old('experience')?: @session('info_perso')['experience']) ==  '16') selected @endif>16 ans</option>
                            <option value="17" @if ((old('experience')?: @session('info_perso')['experience']) ==  '17') selected @endif>17 ans</option>
                            <option value="18" @if ((old('experience')?: @session('info_perso')['experience']) ==  '18') selected @endif>18 ans</option>
                            <option value="19" @if ((old('experience')?: @session('info_perso')['experience']) ==  '19') selected @endif>19 ans</option>
                            <option value="20" @if ((old('experience')?: @session('info_perso')['experience']) ==  '20') selected @endif>20 ans</option>
                            <option value="21" @if ((old('experience')?: @session('info_perso')['experience']) ==  '21') selected @endif>21 ans</option>
                            <option value="22" @if ((old('experience')?: @session('info_perso')['experience']) ==  '22') selected @endif>22 ans</option>
                            <option value="23" @if ((old('experience')?: @session('info_perso')['experience']) ==  '23') selected @endif>23 ans</option>
                            <option value="24" @if ((old('experience')?: @session('info_perso')['experience']) ==  '24') selected @endif>24 ans</option>
                            <option value="25" @if ((old('experience')?: @session('info_perso')['experience']) ==  '25') selected @endif>25 ans</option>

                            <option value="26" @if ((old('experience')?: @session('info_perso')['experience']) ==  '26') selected @endif>Plus de 25 ans</option>
                          <!-- Ajoutez d'autres options en fonction de vos besoins -->
                      </select> --}}
                      </div>
                  </div>



                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <div class="input-group">
                                <select class="form-control @error('indicatif1') is-invalid @enderror " name="indicatif1" id="countrySelect" class="select2" >
                                    <option selected="false" disabled>-- Choisir l'indicatif --</option>

                                    @foreach ($countries as $country)
                                        <option value="{{ $country->code }}" @if ((old('indicatif1')?: @session('info_perso')['indicatif1']) == $country->code) selected @endif>({{ $country->code }}) {{ $country->name }}</option>
                                    @endforeach
                                </select>
                                {{-- <input type="tel" class="form-control @error('numeroTel1') is-invalid @enderror" placeholder="Numéro de téléphone 1" name="numeroTel1" value="{{ old('numeroTel1') ?: session('info_perso')['numeroTel1'] }}"> --}}
                                <input type="tel" class="form-control @error('numeroTel1') is-invalid @enderror" placeholder="Numéro de téléphone 1" name="numeroTel1" value="{{ old('numeroTel1') ?: @session('info_perso')['numeroTel1']  }}">
                                @error('numeroTel1')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <div class="input-group">
                                <select class="form-control @error('indicatif2') is-invalid @enderror" class="select2">
                                    <option selected="false" disabled>-- Choisir l'indicatif --</option>
                                    @foreach ($countries as $country)
                                    <option value="{{ $country->code }}" @if ((old('indicatif2')?: @session('info_perso')['indicatif2']) == $country->code) selected @endif>({{ $country->code }}) {{ $country->name }}</option>                                    @endforeach
                                </select>

                                <input type="tel" class="form-control @error('numeroTel2') is-invalid @enderror" placeholder="Numéro de téléphone 1" name="numeroTel2" value="{{ old('numeroTel2') ?: @session('info_perso')['numeroTel2'] }}">

                                @error('numeroTel2')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>

                  <div class="mb-3">
                    <label for="comment">Adresse :</label>
                    <textarea class="form-control  @error('adresse') is-invalid @enderror" id="comment" name="adresse" rows="5" value="{{ old('adresse')?: @session('info_perso')['adresse']  }}">{{ old('adresse')?: @session('info_perso')['adresse']}}</textarea>
                    @error('adresse')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            </div>
            <br>
            <button type="submit" style="float: right" class="btn btn-primary next">Suivant</button>
        </div>






        <script>
            const dateOfBirthInput = document.getElementById('dateOfBirth');
            const ageError = document.getElementById('ageError');

            dateOfBirthInput.addEventListener('change', function() {
                const selectedDate = new Date(this.value);
                const currentDate = new Date();
                const ageDiff = currentDate.getFullYear() - selectedDate.getFullYear();

                if (ageDiff < 18) {
                    ageError.style.display = 'block';
                    this.value = '';
                } else {
                    ageError.style.display = 'none';
                }
            });
        </script>








        <!-- ... (Autres étapes) -->

    </form>
</div>
{{-- <button type="submit" class="btn btn-primary" id="submitForm" style="float: right">Soumettre</button> --}}
<br><br><br>





@endsection

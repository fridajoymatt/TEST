@extends('layouts.backOfficeLayout')
@include('component.toastrNotification')
@section('title')

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Offre</h5>
                    <p class="m-b-0">Creer une offre</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Paramètres</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection

@section('content')

<div class="content-wrapper">

    <div class="main">

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5>Liste de tous les offres existant</h5>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                            Ajouter <i class="fa fa-plus"></i>
                        </button>
                        <div class="card-header-right">
                                <div class="">
                                    <input type="text" name="query" class="form-control" placeholder="Rechercher...">
                                </div>
                        </div>
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Réference</th>
                                        <th>Libellé</th>
                                        <th>Date de création</th>
                                        <th>Crée par</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($offres as $offre)
                                    <tr>
                                        <th scope="row">{{ $offre->id }}</th>
                                        <td>{{ $offre->reference }}</td>
                                        <td>{{ $offre->libelle }}</td>
                                        {{-- <td><img class="card-img-top" height="75px" width="50px" src="{{ asset ( "storage/".$offre->image )}}" alt="{{ asset ( "storage/".$offre->image )}}" ></td> --}}
                                        <td>{{ $offre->created_at }}</td>
                                        <td>{{ $offre->user_id }}</td>
                                        <td style="font-size: 150%">

                                            {{-- <button class="btn btn-outline-warning" data-toggle="modal" data-target="#addModal3"><i class="fa fa-edit"></i></button> --}}
                                            <a href="{{ route('editProfil') }}" target="_blank" class="btn btn-outline-primary"><i class="fa fa-eye"></i></a>
                                            <button class="btn btn-outline-danger" onclick="deleteItem({{ $offre->id }})"><i class="fa fa-trash"></i></button>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#addModal2">
                            Liste des offres supprimées
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- MODAL BOOTSTRAP --}}


{{-- addModal --}}

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Ajouter une offre</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                    <span aria-hidden="true">&times;</span>
                </button>                                        </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('createOffre') }}"  enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label ">Référence d'offre(<span class="mdl-color-text--red">*</span>)</label>
                        <div class="col-sm-9">
                          <div class="input-group mb-3">
                            <span class="input-group-text">#</span>
                          <input type="text" name="reference" value="{{ old('reference') }}" class="form-control @error('reference') is-invalid @enderror" id="inputEmail3" placeholder="Saisir la référence de l'offre">
                          @error('reference')
                          <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                        </div>

                    </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label ">Libelle d'offre(<span class="mdl-color-text--red">*</span>)</label>
                        <div class="col-sm-9">
                          <div class="input-group mb-3">
                          <input type="text" name="libelle" value="{{ old('libelle') }}" class="form-control @error('libelle') is-invalid @enderror" id="inputEmail3" placeholder="Saisir le libelle de l'offre">
                          @error('libelle')
                          <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                        </div>

                    </div>
                      </div>

                          <div class="form-group row">

                              <label  for="inputEmail3" class="col-sm-3 col-form-label">Niveau d'étude(<span class="mdl-color-text--red">*</span>)</label>
                              <div class="col-sm-9">

                              <select class="custom-select  select2 my-1 mr-sm-2 @error('niveau_etudes_id') is-invalid @enderror" id="inlineFormCustomSelectPref" name="niveau_etudes_id" style="width: 100%">
                                <option selected="false" disabled>-- Choisir le niveau d'étude --</option>

                                @foreach ($niveaux as $niveau)
                                <option value="{{ $niveau->id }}" @if (old('niveau_etudes_id') == $niveau->id) selected @endif>{{ $niveau->libelle }}</option>
                                @endforeach


                              </select>
                              @error('niveau_etudes_id')
                                <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                            </div>
                              </div>

                              <div class="form-group row">

                                <label  for="inputEmail3" class="col-sm-3 col-form-label">Domaine(<span class="mdl-color-text--red">*</span>)</label>
                                <div class="col-sm-9">

                                <select class="custom-select  select2 my-1 mr-sm-2 @error('domaine_id') is-invalid @enderror" id="inlineFormCustomSelectPref" name="domaine_id" style="width: 100%">
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
                                </div>

                                <div class="form-group row">

                                    <label  for="inputEmail3" class="col-sm-3 col-form-label">Age(<span class="mdl-color-text--red">*</span>)</label>
                                    <div class="col-sm-9">

                                    <select class="custom-select my-1 mr-sm-2  @error('age_id') is-invalid @enderror" id="inlineFormCustomSelectPref" name="age_id">
                                        <option selected="false" disabled>-- Choisir la tranche d'age --</option>

                                        @foreach ($ages as $age)
                                        <option value="{{ $age->id }}" @if (old('age_id') == $age->id) selected @endif>{{ $age->debut }} à {{ $age->fin }}</option>
                                        @endforeach


                                      </select>
                                      @error('age_id')
                                      <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                  @enderror



                                  </div>
                                    </div>



                                <div class="form-group row">
                                    <label  for="inputEmail3" class="col-sm-3 col-form-label">Expérience(<span class="mdl-color-text--red">*</span>)</label>
                                    <div class="col-sm-9">

                                    {{-- <select class="custom-select my-1 mr-sm-2 @error('experience') is-invalid @enderror" id="experience" name="experience">
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
                                  <input type="number" class="form-control  @error('experience') is-invalid @enderror"  name="experience" placeholder="selectionner année d'experience" min="0">
                                  @error('experience')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                              @enderror
                                </div>
                                </div>

                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-3 col-form-label">Date limite(<span class="mdl-color-text--red">*</span>)</label>
                                  <div class="col-sm-9">
                                    <input type="date" min="<?= date('Y-m-d'); ?>" max="3000-04-20" class="form-control  @error('date_limite') is-invalid @enderror" id="inputEmail3"  name="date_limite" value="{{ old('date_limite') }}">
                                    @error('date_limite')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                                @enderror
                                  </div>
                                </div>

                                  <div class="" hidden>
                                    {{-- <input type="time" class="form-control  @error('heure_limite') is-invalid @enderror" id="inputEmail3"  name="heure_limite" value="{{ old('heure_limite') }}"> --}}
                                    <input type="time" value="00:00" name="heure_limite">
                                    @error('heure_limite')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                                @enderror
                                  </div>


                                <div class="form-group row">

                                  <label  for="inputEmail3" class="col-sm-3 col-form-label   " value="{{ old('resume') }}">Résumé(<span class="mdl-color-text--red">*</span>)</label>
                                  <div class="col-sm-9">

                                <textarea class="form-control @error('resume') is-invalid @enderror" rows="3" placeholder="Renseigner le resumé d'introduction sur l'offre" name="resume">{{ old('resume') }}</textarea>
                                @error('resume')
                                <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                              </div>
                          </div>


                          <div class="form-group row">

                            <label  for="inputEmail3" class="col-sm-3 col-form-label   " value="{{ old('details') }}">Détails(<span class="mdl-color-text--red">*</span>)</label>
                            <div class="col-sm-9">

                          <textarea style="min-height: 150px" class="form-control @error('details') is-invalid @enderror" rows="3" placeholder="Renseigner des détails sur l'offre" name="details">{{ old('details') }}</textarea>
                          @error('details')
                          <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                        </div>
                    </div>

                          <div class="form-group row">

                            <label  for="inputEmail3" class="col-sm-3 col-form-label">Piece jointe</label>
                            <div class="col-sm-9">
                          <div class="">
                           <div class="form-input" style="width: 100%">
                             <div class="preview">
                               <img id="file-ip-1-preview">
                             </div>
                             <label for="file-ip-1">Charger</label>
                             <input type="file" name="pdfFile" accept=".pdf" required>

                           </div>
                         </div>
                        </div>
                      </div>
                      <small class="text-danger center">{{ $errors->first('image')}}</small>
                      <small class=" center">NB: Inserer une image ou l'image par défaut est celle du contrat.</small>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Ajouter</button>                                        </div>
        </div>
    </form>
    </div>
</div>


{{-- addModal2 --}}

<div class="modal fade" id="addModal2" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Liste des offres désactivées</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                    <span aria-hidden="true">&times;</span>
                </button>                                        </div>
            <div class="modal-body">
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Référence</th>
                                    <th>Libellé</th>
                                    <th>Date de création</th>
                                    <th>Crée par</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($offre_deletes as $offre_delete)
                                <tr>
                                    <th scope="row">{{ $offre_delete->id }}</th>
                                    <td>{{ $offre_delete->reference }}</td>
                                    <td>{{ $offre_delete->libelle }}</td>
                                    <td><img class="card-img-top" height="50px" width="50px" src="{{ asset ( "storage/".$offre_delete->image )}}" alt="{{ asset ( "storage/".$offre->image )}}"></td>
                                    <td>{{ $offre_delete->created_at }}</td>
                                    <td>{{ $offre_delete->user_id }}</td>
                                    <td style="font-size: 150%">

                                        <button class="btn btn-outline-warning" onclick="restoreItem({{ $offre_delete->id }})"><i class="fa fa-undo"></i></button>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        </div>
    </div>
</div>



<script>
    function deleteItem(itemId) {
        Swal.fire({
            title: 'Vous êtes sûre?',
            text: "De vouloir supprimer !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, bien-sûre !',
            cancelButtonText: 'Non',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/delete-offre/' + itemId;

            }
        });
    }

    function restoreItem(itemId) {
        Swal.fire({
            title: 'Vous êtes sûre?',
            text: "De vouloir restorer !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: 'orange',
            confirmButtonText: 'Oui, bien-sûre !',
            cancelButtonText: 'Non',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/restore-offre/' + itemId;
            }
        });
    }


</script>

@if (session('warning'))
<html>
    <script>
            $(document).ready(function () {
        $('#addModal').modal({
            show: true
        });
    });
    </script>
</html>
@endif

<script>
    $(document).ready(function () {
        $('#addModal').modal({
            show: false
        });
    });

    $(document).ready(function () {
        $('#addModal2').modal({
            show: false
        });
    });

    $(document).ready(function () {
        $('#addModal3').modal({
            show: false
        });
    });
</script>

@endsection

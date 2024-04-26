@extends('component.indexForm')

@section('container')

                <!-- Étape 6: Documents -->

                <div class="step">
                    <h3>Documents / Pièces justificatives</h3><br><br>
                    <span>Veuillez rentrer les documents.</span><br><br>
                    <form method="post" action="{{ route('step5', $offre->id) }}" enctype="multipart/form-data">
                        @csrf
                    {{-- <div class="mb-3">
                        <label for="cv" class="form-label">CV</label>
                        <input type="file"  class="file-input__input @error('cv') is-invalid @enderror" value="{{ old('cv') }}" class="form-control" id="cv" name="cv">
                        @error('cv')
                                <div class="invalid-feedback">
                                    <span class="violet">{{ $message }}</span>
                                </div>
                        @enderror
                    </div> --}}

                    {{-- <input type="text" hidden value="step5"> --}}

                    <div class="mb-3">
                        <label for="cv" class="form-label">CV</label>
                        <input type="file" value="{{ old('cv') }}" class="form-control @error('cv') is-invalid @enderror" id="piece" name="cv">
                        @error('cv')
                                <div class="invalid-feedback">
                                    <span class="violet">{{ $message }}</span>
                                </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="type_piece" class="form-label">Type de Pièce d'Identité</label>
                        <div class="form-check @error('type_piece') is-invalid @enderror">
                            <input class="form-check-input" @if(old('type_piece') === 'carte_identite') checked @endif type="radio" name="type_piece" id="carte_identite" value="carte_identite">
                            <label class="form-check-label" for="carte_identite">Carte d'Identité</label>
                        </div>
                        <div class="form-check @error('type_piece') is-invalid @enderror">
                            <input class="form-check-input"  type="radio" name="type_piece"  @if(old('type_piece') === 'passeport') checked @endif id="passeport" value="passeport">
                            <label class="form-check-label" for="passeport">Passeport</label>
                        </div>
                        <!-- Ajoutez d'autres types de pièces si nécessaire -->

                        @error('type_piece')
                            <div class="invalid-feedback">
                                <span class="violet">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="piece" class="form-label">Pièce d'Identité</label>
                        <input type="file" value="{{ old('piece') }}" class="form-control @error('piece') is-invalid @enderror" id="piece" name="piece">
                        @error('piece')
                                <div class="invalid-feedback">
                                    <span class="violet">{{ $message }}</span>
                                </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nationnalite_doc" class="form-label">Nationalité</label>
                        <input type="file" value="{{ old('nationnalite_doc') }}" class="form-control  @error('nationnalite_doc') is-invalid @enderror" id="piece" name="nationnalite_doc">
                        @error('nationnalite_doc')
                                <div class="invalid-feedback">
                                    <span class="violet">{{ $message }}</span>
                                </div>
                        @enderror
                    </div><br>
                    <div class="row">
                        <div class="col-11">
                            <a href="{{ route('step4', $offre->id) }}" type="button" class="btn btn-primary prev" style="float: right" >Précédent</a>

                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary next" style="float: right" >Valider</button>

                        </div>
                    </div>

                </form>
                </div>

                <br><br><br>
@endsection

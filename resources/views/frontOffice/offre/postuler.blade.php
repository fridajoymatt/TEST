@extends('layouts.frontOfficeLayout')

@include('component.header')

@include('component.subHeaderPostuler')

@section('content')
<br><br><br>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Annonce de l'offre
            </div>
            <div class="card-body">

                <p>
                    <strong class="text-underlined">Résumé :</strong>
                    <span class="text-normal">{{ $offre->resume }}</span>
                </p>
            </div>
        </div>

        <br><br>
        <div class="card">
            <div class="card-header">
                Description de l'offre
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <p>
                            <strong class="text-underlined">Référence de l'offre :</strong>
                            <span class="text-normal">#{{ $offre->reference }}</span>
                        </p>
                        <p>
                            <strong class="text-underlined">Titre de l'offre :</strong>
                            <span class="text-normal">{{ $offre->offre_libelle }}</span>
                        </p>
                        <p>
                            <strong class="text-underlined">Domaine :</strong>
                            <span class="text-normal">{{ $offre->domaine_libelle }}</span>
                        </p>
                        <p>
                            <strong class="text-underlined">Niveau d'étude :</strong>
                            <span class="text-normal">{{ $offre->niveau_etudes_libelle }}</span>
                        </p>
                        <p>
                            <strong class="text-underlined">Année d'expérience :</strong>
                            <span class="text-normal">{{ $offre->experience }} an(s)</span>
                        </p>
                        <p>
                            <strong class="text-underlined">Tranche d'âge :</strong>
                            <span class="text-normal">Entre {{ $offre->debut }} et {{ $offre->fin }}</span>
                        </p>

                    </div>
                    <div class="col">
                        <img src="{{asset('images/PDF2.png')}}" height="210px" alt="">
                        <a href="{{ asset('storage/' . $offre->pdfFile) }}" style="font-size: 200%" download="{{ $offre->pdfFile }}">Télécharger le PDF
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                              </svg>
                        </a>
                    </div>
                </div>

                <p>
                    <strong class="text-underlined">Détails :</strong>
                </p>
                <p> {{ $offre->details }}</p>
                <br>



            </div>
        </div>
        <br>
        <div class="row md-3" style="float: right">
            <div class="col">
                <a class="btn btn-primary" href="{{ route('index_offre') }}" style="float: right">Retour</a>

            </div>
            <div class="col">
                    <a class="btn btn-primary" href="{{ route('step1',$offre->id) }}" style="float: right">Postuler</a>
            </div>
        </div>
    </div>
    <br><br>
    @include('component.footerHome')

@endsection

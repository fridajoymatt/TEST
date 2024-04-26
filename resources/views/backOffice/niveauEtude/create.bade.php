@extends('layouts.backOfficeLayout')

@section('title')

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Niveau d'études</h5>
                    <p class="m-b-0">Creer un niveau d'étude</p>
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

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Ajouter un niveau</h5>
                    <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                </div>
                <div class="card-block">
                    <form method ="post" action="{{ route('createNiveau') }}" enctype="multipart/form-data">
                        @csrf
                        @include('component.flashMessage')

                        <div class="form-group">
                            <label for="niveau_libelle">Nom du niveau(<span class="mdl-color-text--red">*</span>)</label>
                            <input type="texte" class="form-control" id="niveau_libelle" name="niveau_libelle" placeholder="Entrer nom de niveau" value="{{ old('liveau_libelle') }}" placeholder="Renseigner le niveau">
                            <small class="text-danger">{{ $errors->first('niveau_libelle')}}</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                <a href="{{ route('indexNiveau') }}" class="btn btn-secondary">CONSULTER LES NIVEAUX DISPONIBLE</a></button>

                    </form>
                </div>
            </div>
        </div>
    </div>


</div>


@endsection

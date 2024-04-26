@extends('layouts.backOfficeLayout')
@include('component.toastrNotification')
@section('title')

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Groupe d'age</h5>
                    <p class="m-b-0">Creer un age</p>
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
                        <h5>Liste de tous les ages existant</h5>
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
                                        <th>Intervalle</th>
                                        <th>Date de création</th>
                                        <th>Crée par</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ages as $age)
                                    <tr>
                                        <th scope="row">{{ $age->id }}</th>
                                        <td>{{ $age->debut }} à {{ $age->fin }}</td>
                                        <td>{{ $age->created_at }}</td>
                                        <td>{{ $age->user_id }}</td>
                                        <td style="font-size: 150%">

                                            {{-- <button class="btn btn-outline-warning" data-toggle="modal" data-target="#addModal3"><i class="fa fa-edit"></i></button> --}}
                                            <button class="btn btn-outline-danger" onclick="deleteItem({{ Auth::user()->id }})"><i class="fa fa-trash"></i></button>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#addModal2">
                            Liste des ages supprimés
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
                <h5 class="modal-title" id="addModalLabel">Ajouter un groupe d'age</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                    <span aria-hidden="true">&times;</span>
                </button>                                        </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('createAge') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Début') }}</label>

                        <div class="col-md-6">
                            <input id="debut" type="number" min="0" class="form-control @error('debut') is-invalid @enderror" name="debut" value="{{ old('debut') }}"  autocomplete="debut" autofocus>

                            @error('debut')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Fin') }}</label>

                        <div class="col-md-6">
                            <input id="fin" type="number" min="0" class="form-control @error('fin') is-invalid @enderror" name="fin" value="{{ old('fin') }}"  autocomplete="fin" autofocus>

                            @error('fin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
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
                <h5 class="modal-title" id="addModalLabel">Liste des groupes d'ages désactivés</h5>
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
                                    <th>Intevalle</th>
                                    <th>Date de création</th>
                                    <th>Crée par</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($age_deletes as $age_delete)
                                <tr>
                                    <th scope="row">{{ $age_delete->id }}</th>
                                    <td>{{ $age_delete->debut }} à {{ $age_delete->fin }}</td>
                                    <td>{{ $age_delete->created_at }}</td>
                                    <td>{{ $age_delete->user_id }}</td>
                                    <td style="font-size: 150%">

                                        <button class="btn btn-outline-warning" onclick="restoreItem({{ $age_delete->id }})"><i class="fa fa-undo"></i></button>

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

{{-- addModal2 --}}
<div class="modal fade" id="addModal3" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Ajouter un age</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                    <span aria-hidden="true">&times;</span>
                </button>                                        </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('createAge') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('debut') }}</label>

                        <div class="col-md-6">
                            <input id="debut" type="text" class="form-control @error('debut') is-invalid @enderror" name="debut" value="{{ old('debut') }}"  autocomplete="debut" autofocus>

                            @error('debut')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('fin') }}</label>

                        <div class="col-md-6">
                            <input id="fin" type="text" class="form-control @error('fin') is-invalid @enderror" name="fin" value="{{ old('fin') }}"  autocomplete="fin" autofocus>

                            @error('fin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Ajouter</button>                                        </div>
        </div>
    </form>
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
                window.location.href = '/delete-age/' + itemId;

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
                window.location.href = '/restore-age/' + itemId;
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

@extends('layouts.backOfficeLayout')
@include('component.toastrNotification')
@section('title')

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Candidature</h5>
                    <p class="m-b-0">Les candidats en fonction des offres</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Candidature</a>
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
                        <h5>Liste de toute les candidatures</h5>
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
                                        <th>nom</th>
                                        <th>prenom</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($candidatures as $candidature)
                                    <tr>
                                        <th scope="row">{{ $candidature->id }}</th>
                                        <td>{{ $candidature->nom }}</td>
                                        <td>{{ $candidature->prenom }}</td>
                                        <td style="font-size: 150%">

                                            {{-- <button class="btn btn-outline-warning" data-toggle="modal" data-target="#addModal3"><i class="fa fa-edit"></i></button> --}}
                                            {{-- <button class="btn btn-outline-danger" onclick="deleteItem({{ $offre->id }})"><i class="fa fa-trash"></i></button> --}}

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        {{-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#addModal2">
                            Liste des offres supprimées
                        </button> --}}
                    </div>
                </div>
            </div>
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

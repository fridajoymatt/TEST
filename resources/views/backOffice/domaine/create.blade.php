@extends('layouts.backOfficeLayout')

@section('title')

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Domaine</h5>
                    <p class="m-b-0">Creer un domaine</p>
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
                        <h5>Liste de tous les domaines existant</h5>
                        <a href="" class="btn btn-primary">Ajouter <i class="fa fa-plus"></i></a>
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
                                        <th>Libellé</th>
                                        <th>Date de création</th>
                                        <th>Crée par</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td style="font-size: 150%">

                                            <button class="btn btn-outline-warning" onclick="deleteItem({{ Auth::user()->id }})"><i class="fa fa-edit"></i></button>
                                            <button class="btn btn-outline-danger" onclick="deleteItem({{ Auth::user()->id }})"><i class="fa fa-trash"></i></button>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td style="font-size: 150%">
                                            <a href=""><button class="btn waves-effect waves-light btn-warning btn-outline-warning"><i class="fa fa-edit"></i></button></a>
                                            <a href=""><button class="btn waves-effect waves-light btn-danger btn-outline-danger"><i class="fa fa-trash"></i></button></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('dashboard') }}" onclick=confirmation(event) class="btn btn-danger">Liste des domaines supprimés</a>
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
                // If confirmed, redirect to the delete route (adjust the route accordingly)
                window.location.href = '/items/' + itemId + '/delete';
            }
        });
    }
</script>



@endsection

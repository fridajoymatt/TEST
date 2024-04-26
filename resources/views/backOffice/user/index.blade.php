@extends('layouts.backOfficeLayout')

@section('title')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Liste des utilisateurs</h5>
                    <p class="m-b-0">Ajouter, modifier et supprimer</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Utilsateur</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection

@section('content')
@include('component.toastrNotification')

<div class="content-wrapper">

    <div class="main">

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5>Liste de tous les utilisateurs existant</h5>
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
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Email</th>
                                        <th>Function</th>
                                        <th>Statut</th>
                                        <th>Crée par</th>
                                        <th>Date de création</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->surname }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->group }}</td>
                                        <td @if ($user->state == 'Actif')
                                            {
                                                style="color: green"
                                            }

                                            @else
                                            {
                                                style="color: red"
                                            }

                                            @endif


                                        >{{ $user->state }}</td>
                                        <td>{{ $user->by }}</td>
                                        <td style="">@if (isset($user->created_at) )
                                            {{ $user->created_at }}
                                        @else
                                        0000-00-00 00:00:00
                                        @endif</td>
                                        <td style="font-size: 150%">

                                            <button class="btn-outline-warning" data-toggle="modal" data-target="#addModal3">
                                                <i class="fa fa-edit"></i></i>
                                            </button>
                                            <button class="btn-outline-danger" onclick="deleteItem({{ $user->id }})"><i class="fa fa-trash"></i></button>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#addModal2">
                            Liste des utilisateurs supprimés
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
                <h5 class="modal-title" id="addModalLabel">Ajouter un utilisateur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                    <span aria-hidden="true">&times;</span>
                </button>                                        </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('createUser') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Prénom') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}"  autocomplete="surname" autofocus>

                            @error('surname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3" >
                        <label for="inputEmail3" class="col-sm-4 col-form-label ">Fonction</label>
                        <div class="col-sm-6">
                            <select class="custom-select my-1 mr-sm-6 @error('group') is-invalid @enderror" id="inlineFormCustomSelectPref"  name="group" >
                                <option selected="false" disabled>-- Choisir le groupe --</option>
                                <option value="Administrateur" {{ old('group') === 'Administrateur' ? 'selected' : '' }}>Administrateur</option>
                                <option value="Utilisateur" {{ old('group') === 'Utilisateur' ? 'selected' : '' }}>Utilisateur</option>


                            </select>
                            @error('group')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                        </div>
                    </div>

                    {{-- <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div> --}}
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
                <h5 class="modal-title" id="addModalLabel">Liste des utilisateurs désactivés</h5>
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
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Email</th>
                                    <th>Function</th>
                                    <th>Statut</th>
                                    <th>Crée par</th>
                                    <th>Date de création</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users_deletes as $users_delete)
                                <tr>
                                    <th scope="row">{{ $users_delete->id }}</th>
                                    <td>{{ $users_delete->name }}</td>
                                    <td>{{ $users_delete->surname }}</td>
                                    <td>{{ $users_delete->email }}</td>
                                    <td>{{ $users_delete->group }}</td>
                                    <td @if ($users_delete->state == 'Actif')
                                        {
                                            style="color: green"
                                        }

                                        @else
                                        {
                                            style="color: red"
                                        }

                                        @endif


                                    >{{ $users_delete->state }}</td>
                                    <td>{{ $users_delete->by }}</td>
                                    <td style="">@if (isset($users_delete->created_at) )
                                        {{ $users_delete->created_at }}
                                    @else
                                    0000-00-00 00:00:00
                                    @endif</td>
                                    <td style="font-size: 150%">

                                        <button class="btn btn-outline-warning" onclick="restoreItem({{ $users_delete->id }})"><i class="fa fa-undo"></i></button>

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

{{-- addModal3 --}}
<div class="modal fade" id="addModal3" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Liste des utilisateurs désactivés</h5>
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
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Email</th>
                                    <th>Function</th>
                                    <th>Statut</th>
                                    <th>Crée par</th>
                                    <th>Date de création</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users_deletes as $users_delete)
                                <tr>
                                    <th scope="row">{{ $users_delete->id }}</th>
                                    <td>{{ $users_delete->name }}</td>
                                    <td>{{ $users_delete->surname }}</td>
                                    <td>{{ $users_delete->email }}</td>
                                    <td>{{ $users_delete->group }}</td>
                                    <td @if ($users_delete->state == 'Actif')
                                        {
                                            style="color: green"
                                        }

                                        @else
                                        {
                                            style="color: red"
                                        }

                                        @endif


                                    >{{ $users_delete->state }}</td>
                                    <td>{{ $users_delete->by }}</td>
                                    <td style="">@if (isset($users_delete->created_at) )
                                        {{ $users_delete->created_at }}
                                    @else
                                    0000-00-00 00:00:00
                                    @endif</td>
                                    <td style="font-size: 150%">

                                        <button class="btn btn-outline-warning" onclick="restoreItem({{ $users_delete->id }})"><i class="fa fa-undo"></i></button>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                {{-- <button type="button" class="btn btn-primary">Ajouter</button>                                        </div> --}}
        </div>
    </div>
</div>

    


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

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
                window.location.href = '/delete-user/' + itemId;
                // window.location.href = '/items/' + itemId + '/delete';
                // window.location.href = {{ route('deleteUser',$user->id) }};
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
                // If confirmed, redirect to the delete route (adjust the route accordingly)
                window.location.href = '/restore-user/' + itemId;
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

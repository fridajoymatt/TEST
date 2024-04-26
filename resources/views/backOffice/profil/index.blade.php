@extends('layouts.backOfficeLayout')

@section('title')

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Utilisateur</h5>
                    <p class="m-b-0">Les informations de mon profil</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Profil</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection

@section('content')

@include('component.toastrNotification')


<div class="profile-sidebar">
    <div class="card-header">
        Mon profil
    </div>
    <div class="card card-topline">
      <div class="card-body no-padding height-9">

        <div class="row">
          <div class="profile-userpic">
            <img src="{{ asset('images/avatar.png') }}" class="img-responsive" alt=""> </div>
        </div><br>
        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b>Nom</b> <a class="pull-right">{{ Auth::user()->name }}</a>
          </li>
          <li class="list-group-item">
            <b>Prénom</b> <a class="pull-right">{{ Auth::user()->surname }}</a>
          </li>
          <li class="list-group-item">
            <b>Fonction</b> <a class="pull-right">{{ Auth::user()->group }}</a>
          </li>
          <li class="list-group-item">
            <b>Email</b> <a class="pull-right">{{ Auth::user()->email }}</a>
          </li>

          <li class="list-group-item">
            <b>Statut</b> <a @if (Auth::user()->state == 'Actif')
                {
                    style="color: green"
                }

                @else
                {
                    style="color: red"
                }

                @endif class="pull-right">{{ Auth::user()->state }}</a>
          </li>

          <li class="list-group-item">
            <b>Date de création</b> <a class="pull-right">@if (isset(Auth::user()->created_at) )
                {{ Auth::user()->created_at }}
            @else
                ---------
            @endif</a>
          </li>

          <li class="list-group-item">
            <b>Crée par</b> <a class="pull-right">{{ Auth::user()->by }}</a>
          </li>

        </ul>
        <br><br>
        <!-- END SIDEBAR USER TITLE -->
        <!-- SIDEBAR BUTTONS -->
        <div class="profile-userbuttons">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal2">
            Modifier
        </button>
        <div class="modal fade" id="addModal2" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Modifier mon profil</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                            <span aria-hidden="true">&times;</span>
                        </button>                                        </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('updateProfil') }}">
                            @csrf

                        <div class="row">
                          <div class="profile-userpic">
                            <img src="{{ asset('images/avatar.png') }}" class="img-responsive" alt=""> </div>
                        </div><br>
                        <ul class="list-group list-group-unbordered">
                          <li class="list-group-item">
                            <b>Nom</b> <a class="pull-right"><input  value="{{ Auth::user()->name }}" name="name" required></a>
                          </li>
                          <li class="list-group-item">
                            <b>Prénom</b> <a class="pull-right"><input  value="{{ Auth::user()->surname }}" name="surname" required></a>
                          </li>
                          <li class="list-group-item">
                            <b>Fonction</b> <a class="pull-right"><input disabled value="{{ Auth::user()->group }}" name="group"></a>
                          </li>
                          <li class="list-group-item">
                            <b>Email</b> <a class="pull-right"><input value="{{ Auth::user()->email }}" name="email" required></a>
                          </li>

                          <li class="list-group-item">
                            <b>Mot de passe</b> <a class="pull-right"><input name="password" required type="password"></a>
                          </li>

                          <li class="list-group-item">
                            <b>Confirmer mot de passe</b> <a class="pull-right"><input id="password-confirm" name="confirm_password" required autocomplete="new-password" type="password"></a>
                          </li>



                            <br><br>

                        </ul>

                        
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Enrégistrer</button>
                    </form>                                        </div>
                </div>
            </div>
        </div>
        </div>
        <!-- END SIDEBAR BUTTONS -->
      </div>
    </div>

  </div>

  <script>
    $(document).ready(function () {
        $('#addModal2').modal({
            show: false
        });
    });
</script>
@endsection

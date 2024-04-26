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


<div class="profile-sidebar">
    <div class="card card-topline">
      <div class="card-body no-padding height-9">
        <form method="post" action="{{ route('updateProfil') }}">
            @csrf

        <div class="row">
          <div class="profile-userpic">
            <img src="{{ asset('images/avatar.png') }}" class="img-responsive" alt=""> </div>
        </div><br>
        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b>Nom</b> <a class="pull-right"><input  value="{{ Auth::user()->name }}" name="name"></a>
          </li>
          <li class="list-group-item">
            <b>Prénom</b> <a class="pull-right"><input  value="{{ Auth::user()->surname }}" name="surname"></a>
          </li>
          <li class="list-group-item">
            <b>Fonction</b> <a class="pull-right"><input disabled value="{{ Auth::user()->group }}" name="group"></a>
          </li>
          <li class="list-group-item">
            <b>Email</b> <a class="pull-right"><input disabled value="{{ Auth::user()->email }}" name="email"></a>
          </li>

          <li class="list-group-item">
            <b>Mot de passe</b> <a class="pull-right"><input name="password" required type="password"></a>
          </li>

          <li class="list-group-item">
            <b>Confirmer mot de passe</b> <a class="pull-right"><input id="password-confirm" name="confirm_password" required autocomplete="new-password" type="password"></a>
          </li>



            <br><br>

        </ul>
        <!-- END SIDEBAR USER TITLE -->
        <!-- SIDEBAR BUTTONS -->
        <div class="profile-userbuttons">
            <a type="" href="{{ route('monProfil') }}" class="btn btn-secondary">Retour</a>

          <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>

        </form>
        <!-- END SIDEBAR BUTTONS -->
      </div>
    </div>

  </div>@endsection

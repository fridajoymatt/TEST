<link href="{{ asset("templatesFiles/spice/assets/plugins/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />

  
<main>
  <div class="container">
    <div class="row center" style="margin-top:10%">
      
      <div class="col-md-6 align-self-center">
        <h1 >Erreur 403</h1>
        <p >Vous n'êtes pas autoriser à acceder à cette connexion, veuillez vous connecter au bon profil d'utilisateur</p>
        
        <a href="{{ route('logout') }}"><button  class="btn btn-primary" >Connexion</button></a>
        {{-- <a href="{{ route('HomeFrontOffice') }}"><button  class="btn btn-primary" >Accueil</button></a> --}}
      </div>
    </div>
  </div>
</main>


<style>
  body{
      background:#3c3f50;
      color: white;
      margin-left: 20%;
  }
  
</style>
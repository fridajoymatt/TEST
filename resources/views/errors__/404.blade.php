<link href="{{ asset("templatesFiles/spice/assets/plugins/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />


  <main>
    <div class="container">
      <div class="row center" style="margin-top:10%">

        <div class="col-md-6 align-self-center">
          <h1 >Erreur 404</h1>
          <h2 >UH OH! Vous vous êtes perdu.</h2>
          <p >La page que vous recherchez n'existe pas.
            Comment vous êtes arrivé ici est un mystère. Mais vous pouvez cliquer sur le bouton ci-dessous
            pour revenir à la page d'accueil.
          </p>
          <a href="{{ route('welcome') }}"><button  class="btn btn-primary" >Accueil</button></a>
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

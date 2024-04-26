
  <link href="{{ asset("templatesFiles/spice/assets/plugins/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />


  <main>
    <div class="container">
      <div class="row center" style="margin-top:10%">

        <div class="col-md-6 align-self-center">
          <h1 >Erreur 500</h1>
          <h3 >Erreur interne du serveur.</h3>
          <p >Le serveur a rencontré quelque chose d'inattendu qui ne lui a pas permis de terminer la demande. <br>
            Veuillez réesayer ou contactez la maintenance si le problàme persiste.
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

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
        }
        h2 {
            color: #2795c9;
        }
        p {
            margin-bottom: 10px;
        }
        .bold {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Récapitulatif de votre candidature</h2>
        <p>Merci d'avoir soumis votre candidature.</p>
        <p>Voici les détails de votre candidature :</p>

        <p><span class="bold">Nom et prénom :</span> {{ $data['nom'] }} {{ $data['prenom'] }}</p>
        {{-- <p><span class="bold">Adresse email :</span> {{ $data['email'] }}</p> --}}
        <p><span class="bold">Domaine :</span> {{ $data['poste'] }}</p>
        {{-- <p><span class="bold">Expérience :</span> 3 ans</p> --}}
        {{-- <p><span class="bold">Lettre de motivation :</span> Votre lettre de motivation...</p> --}}

        <p>Nous vous remercions pour votre intérêt et votre candidature. Notre équipe examinera votre dossier et vous recontactera bientôt.</p>

        <p>Cordialement,<br>
        L'équipe de Recrutement {{ config('app.name') }}</p>
    </div>
</body>
</html>

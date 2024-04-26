<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
  }
  .container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }
  h2 {
    color: #333;
  }
  p {
    margin-bottom: 10px;
  }
  strong {
    color: #555;
  }
</style>
<title>Nouveau Message de Contact</title>
</head>
<body>
  <div class="container">
    <h2>Recapitulatif de votre message de contact</h2>
    <p><strong>Nom :</strong> {{ $data['name'] }}</p>
    <p><strong>Objet :</strong> {{ $data['subject'] }}</p>
    <p><strong>Email :</strong> {{ $data['email'] }}</p>

    <h3>Message :</h3>
    <p>{{ $data['message'] }}</p>

    <p>Merci,</p>
    <p>L'équipe de {{ config('app.name') }}</p>
  </div>
</body>
</html>


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
    </style>
    <title>Bienvenue à Notre Newsletter</title>
</head>
<body>
    <div class="container">
        <h2>Bienvenue à Notre Newsletter</h2>
        <p>Merci de vous être abonné à notre newsletter !</p>
        <p>Vous recevrez bientôt des mises à jour passionnantes et des informations sur nos produits et services.</p>
        <p>Merci de nous avoir rejoint !</p>
        <p>L'équipe de {{ config('app.name') }}</p>
    </div>
</body>
</html>

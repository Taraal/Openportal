<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>OpenPortal - Connexion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="main.js"></script>
</head>

<body>
    <div class="container">
        <h1 class="title">OpenPortal</h1>
        <div class="connection">
            <h3>Vérification</h3>
            <form class="form-horizontal" method="POST" action="./../module/traitement-connection.php">
                <div class="form-group">
                    <input required type="email" name="email_connection" id="email_connection" placeholder="Votre mail" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" name="password_connection" id="password_connection" placeholder="mot de passe" class="form-control" required>
                </div>
                    <p class="not_member">Un mail as été envoyez à votre adresse mail !</p>
                <div class="form-group">
                    <input type="submit" value="Valider" name="connection" id="connection">
                </div>
            </form>
        </div>
    </div>
</body>

</html>
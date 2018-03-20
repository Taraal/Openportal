<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>OpenPortal - Connexion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Aldrich|Questrial" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="main.js"></script>
</head>

<body>
    <!--___________________ HEADER ___________________-->
    <header>
        <img src="img/openportal_logo.svg" alt="OP" id="logo">
        <h1 class="title">OpenPortal</h1>
        <p class="baseline">Osez aller au-delà de vous-même</p>
    </header>

    <main>
        <!--_______________ CONNECTION _______________-->
        <div class="connection">
            <h3>Connexion</h3>
            <form class="form-horizontal connection_form" method="POST" action="./../module/traitement-connection.php">
                <div class="form-group">
                    <input required type="email" name="email_connection" id="email_connection" placeholder="Votre mail" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" name="password_connection" id="password_connection" placeholder="mot de passe" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Se connecter" name="connection" id="connection">
                </div>
                <?php  if(isset($_GET['error1'])) { echo $_GET['error1']; } ?>
            </form>
            <p class="not_member">Pas encore membre ?</p>
            <a href="#" id="not_member">S'inscrire</a>
        </div>

        <!--________________INSCRIPTION ________________-->
        <div class="Inscription">
            <h3>Inscription</h3>
            <form class="form-horizontal" method="POST" action="./../module/traitement-inscription.php">
                <div class="form-group">
                    <input type="text" placeholder="Votre prénom" id="prenom_register" name="prenom_register" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Votre nom" id="nom_register" name="nom_register" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="email" placeholder="Votre adress email" id="email_register" name="email_register" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="email" placeholder=" confirmer votre email" id="email2_register" name="email2_register" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Votre mot de passe" id="password_register" name="password_register" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="password" placeholder="confirmer mot de passe" id="password2_register" name="password2_register" class="form-control" required>
                </div>
                <?php  if(isset($_GET['error'])) { echo $_GET['error']; } ?>
                <?php  if(isset($_GET['good'])) { echo $_GET['good']; } ?>
                <div class="form-group">
                    <input type="submit" value="S'inscrire" name="inscription" id="inscription">
                </div>
            </form>
        </div>
    </main>
</body>

</html>
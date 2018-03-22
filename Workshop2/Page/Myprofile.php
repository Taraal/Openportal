<?php
session_start();

if(isset($_SESSION['id'])) {

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>OpenPortal - Profil</title>
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
        <div class="disconnection">
            <a href="module/traitement-deconnection.php"><img src="img/disconnection.svg" alt="" class="disconnection_icon"></a>
        </div>
        <img src="img/openportal_logo.svg" alt="OP" class="logo">
        <h1 class="title">OpenPortal</h1>
    </header>
    <div class="board-access">
            <a href="board.php"><img src="img/board-icon.svg" alt="" class="board_icon"></a>
    </div>
    <main>
        <div class="profile_photo">
            <img src="img/profile/avatar_a-tatibouet.jpg" alt="" class="avatar">
        </div>
        <div class="identity">
            <h3 class="fisrtname"><?php echo $_SESSION['prenom']; ?></h3>
            <h3 class="lastname"><?php echo $_SESSION['nom']; ?></h3><br>
            <a href="mailto:<?php echo $_SESSION['email']; ?>"><?php echo $_SESSION['email']; ?></a>
        </div>
        <div class="skills">
            <div class="table student">
                <h4>Apprenant</h4>
                <table class="student">
                    <thead>
                        <tr>
                            <th scope="col">Professeur</th>
                            <th scope="col">Liste des matières</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>Sylouan Corfa</td>
                        <td>Compétence</td>
                    </tr>
                    <tr>
                        <td>Sylouan Corfa</td>
                        <td>Compétence</td>
                    </tr>
                    <tr>
                        <td>Sylouan Corfa</td>
                        <td>Compétence</td>
                    </tr>
                    <tr>
                        <td>Sylouan Corfa</td>
                        <td>Compétence</td>
                    </tr>
                    <tr>
                        <td>Sylouan Corfa</td>
                        <td>Compétence</td>
                    </tr>
                </table>
            </div>
            <div class="teacher">
                <h4>Professeur</h4>
                <table class="table teacher">
                    <thead>
                        <tr>
                            <th scope="col">Liste des matières</th>
                        </tr>
                        <tr>
                            <td>Compétence</td>
                        </tr>
                        <tr>
                            <td>Compétence</td>
                        </tr>
                        <tr>
                            <td>Compétence</td>
                        </tr>
                        <tr>
                            <td>Compétence</td>
                        </tr>
                        <tr>
                            <td>Compétence</td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </main>
    <footer class="profile-footer">
        <p>Alexandre CAILLER - Elian BOURDU</p>
        <p>Sylouan CORFA - Anaïs TATIBOUËT</p>
        <p>Workshop 2018 - B1</p>
    </footer>
</body>

</html>

<?php

} else {

header('location: index.php?error1=Vous devez vous connecter pour voir votre profil');

}

?>
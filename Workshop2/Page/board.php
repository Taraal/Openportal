<?php

session_start();

if(isset($_SESSION['email'])) {

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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <div class="disconnection">
            <a href="#">
                <img src="img/disconnection.svg" alt="" class="icon">
            </a>
        </div>
        <img src="img/openportal_logo.svg" alt="OP" id="logo">
        <h1 class="title">OpenPortal</h1>
    </header>
    <main>
        <section class="courses_taught-list">
            <h3 class="board_title">Matières enseignées</h3>
            <div class="courses_taught-list">
                <ul>
                    <li><a href="#">Compétence enseignée</a></li>
                    <li><a href="#">Compétence enseignée</a></li>
                    <li><a href="#">Compétence enseignée</a></li>
                    <li><a href="#">Compétence enseignée</a></li>
                    <li><a href="#">Compétence enseignée</a></li>
                    <li><a href="#">Compétence enseignée</a></li>
                    <li><a href="#">Compétence enseignée</a></li>
                </ul>
            </div>
        </section>
        <section class="courses_followed-list">
            <h3 class="board_title">Mes cours</h3>
            <ul>
                    <li><a href="#">Compétence suivie</a></li>
                    <li><a href="#">Compétence suivie</a></li>
                    <li><a href="#">Compétence suivie</a></li>
                    <li><a href="#">Compétence suivie</a></li>
                    <li><a href="#">Compétence suivie</a></li>
                    <li><a href="#">Compétence suivie</a></li>
                    <li><a href="#">Compétence suivie</a></li>
                </ul>
        </section>
        <section class="courses-list">
            <h3 class="board_title">Compétences</h3>
            <ul>
                <li><a href="#">Compétence</a></li>
                <li><a href="#">Compétence</a></li>
                <li><a href="#">Compétence</a></li>
                <li><a href="#">Compétence</a></li>
                <li><a href="#">Compétence</a></li>
                <li><a href="#">Compétence</a></li>
                <li><a href="#">Compétence</a></li>
                <li><a href="#">Compétence</a></li>
                <li><a href="#">Compétence</a></li>
                <li><a href="#">Compétence</a></li>
                <li><a href="#">Compétence</a></li>
                <li><a href="#">Compétence</a></li>
                <li><a href="#">Compétence</a></li>
                <li><a href="#">Compétence</a></li>
                <li><a href="#">Compétence</a></li>
                <li><a href="#">Compétence</a></li>
                <li><a href="#">Compétence</a></li>
                <li><a href="#">Compétence</a></li>
                <li><a href="#">Compétence</a></li>
                <li><a href="#">Compétence</a></li>
                <li><a href="#">Compétence</a></li>
                <li><a href="#">Compétence</a></li>
                <li><a href="#">Compétence</a></li>
                <li><a href="#">Compétence</a></li>
                <li><a href="#">Compétence</a></li>
                <li><a href="#">Compétence</a></li>
                <li><a href="#">Compétence</a></li>
                <li><a href="#">Compétence</a></li>
            </ul>
            <form action="">
                    <input type="search" name="" id="" placeholder="rechercher compétence">
                    <input type="submit" value="Rechercher">
            </form>
        </section>
        <section class="chat">

        </section>
        <div class="chat_button">
            <a href=""><img src="img/speech-bubble.svg" class="icon" alt="chat"></a>
        </div>
    </main>
    <script src="js/main.js"></script>
</body>

</html>
<?php 

} else {

    header('location: index.php?error1=Vous devez vous connecter pour voir votre profil');
    
}

?>
<?php

session_start();

if(isset($_SESSION['email'])) {


    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="vendor\bootstrap\css\bootstrap.css" />
    <script src="main.js"></script>
</head>
<body>
    <p> Prenom: <?= $_SESSION['prenom']?>
        <br>
        Nom: <?= $_SESSION['nom']?>
    <p>
    <div class="container-fluid">
        <div class="text-center">
            <h1 class="title">OpenPortal</h1>
        </div>
        <div class="row col-md-offset-1">
            <div class="col-lg-9 col-md-4 col-sm-6 col-xs-12" style="background-color:antiquewhite">
                <h3 class="title">Professeur</h3>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" style="background-color:aqua; z-index: 3; position: fixed-right">
                <h3 class="title">Table des matières</h3>
                <br>h<br><br>h<br><br>h<br><br>h<br><br>h<br><br>h<br><br>h<br><br>h<br><br>h<br>r><br>h<br><br>h<br><br>h<br>r><br>h<br><br>h<br><br>h<br>r><br>h<br><br>h<br><br>h<br>
            </div>  
            <div class="col-lg-9 col-md-4 col-sm-6 col-xs-12" style="background-color:rgb(57, 76, 105)">
                <h3 class="title">Table des matières</h3>
            </div>
        </div>
        <a href="Myprofile.php">Mon profil</a>
        <a href="chatroom.php">Les chatroom</a>
    </div>
</body>
</html>
<?php 

} else {

    header('location: index.php?error1=Vous devez vous connecter pour voir votre profil');
    
}

?>
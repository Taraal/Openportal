<?php

session_start();

if(isset($_SESSION['email'])) {

?>
<?php
$id = $_GET['id'];
$connect = new PDO("mysql:host=localhost;dbname=workshop2", "root", "");

    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  

    $sql1 = "SELECT * FROM matieres WHERE id = ". $_GET['id'] ."";

    $statement = $connect->prepare($sql1);

    $statement->bindParam(':id', $id);

    $statement->execute();

    $matiere = $statement->fetch();

unset($statement);

unset($connect);

    $sql2 = "SELECT * FROM enseignants WHERE id_matiere = ".$_GET['id']."";

    

    $sql3 = "SELECT * FROM utilisateurs WHERE id = ".$enseignant['id_user'].""

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
            <a href="../module/traitement-deconnection.php">
                <img src="img/disconnection.svg" alt="" class="disconnection_icon">
            </a>
        </div>
        <img src="img/openportal_logo.svg" alt="OP" id="logo">
        <h1><?php echo $matiere['intitule'];?></h1>
    </header>
    <main>
        <h2>Les Proffesseur ensseignant cette matiere<hr style="width: 50%"></h2>

    </main>
    <script src="js/main.js"></script>
</body>

</html>



<?php 

} else {

    header('location: index.php?error1=Vous devez vous connecter pour voir votre profil');
    
}

?>
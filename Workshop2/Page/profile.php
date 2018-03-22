<?php

$id = $_GET['id'];

$connect = new PDO("mysql:host=localhost;dbname=workshop2;charset=utf8", "root", "");

    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  

    $sql = "SELECT * FROM utilisateurs WHERE id = ". $_GET['id'] ."";

    $statement = $connect->prepare($sql);

    $statement->bindParam(':id', $id);

    $statement->execute();

    $profile = $statement->fetch();

unset($statement);

$sql2 = "SELECT * FROM enseignants WHERE id_user = ".$_GET['id']."";
$statement2 = $connect->prepare($sql2);
$statement2->bindParam(':id',$id);
$statement2->execute();


$sql4 = "SELECT * FROM apprenants WHERE id_user = ".$_GET['id']."";
$statement4 = $connect->prepare($sql4);
$statement4->bindParam(':id',$id);
$statement4->execute();

?>


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
        <img src="img/openportal_logo.svg" alt="OP" id="logo">
        <h1 class="title">OpenPortal</h1>
    </header>
    <main>
        <div class="profile_photo">
            <img src="img/profile/avatar_a-tatibouet.jpg" alt="" class="avatar">
        </div>
        <div class="identity">
            <h3 class="fisrtname"><?php echo $profile['Prenom'] ?></h3>
            <h3 class="lastname"><?php echo $profile['Nom'] ?></h3><br>
            <a href="mailto:<?php echo $profile['Email']; ?>"><?php echo $profile['Email']; ?></a>
        </div>
        <div class="skills">
            <div class="table student">
                <h4>Apprenants</h4>
                <table class="student">
                    <thead>
                        <tr>
                            <th scope="col">Liste des matières</th>
                        </tr>
                    
                        <?php while ($apprenant = $statement4->fetch()) {

                        $sql5 = "SELECT * FROM matieres WHERE id = ".$apprenant['id_matiere']."";

                        $statement5 = $connect->prepare($sql5);

                        $statement5->bindParam(':id',$id);

                        $statement5->execute();

                        while ($apprenant2 = $statement5->fetch()) {

                                echo "<tr><td><a href='page-matiere.php?id=".$apprenant2['id']."&nom=".$apprenant2['intitule']."'><span>".$apprenant2['intitule']."</span></a></td></tr>";

                        }

                        $statement5->closeCursor();

                        }

                        $statement4->closeCursor();
                        ?>
                    </thead>
                    
                </table>
            </div>
            <div class="teacher">
                <h4>Professeur</h4>
                <table class="table teacher">
                    <thead>
                        <tr>
                            <th scope="col">Liste des matières</th>
                        </tr>
                        
                   
                        
                       <?php while ($enseignant = $statement2->fetch()) {

                            $sql3 = "SELECT * FROM matieres WHERE id = ".$enseignant['id_matiere']."";

                            $statement3 = $connect->prepare($sql3);

                            $statement3->bindParam(':id',$id);

                            $statement3->execute();

                            while ($enseignant2 = $statement3->fetch()) {

                                    echo "<tr><td><a href='page-matiere.php?id=".$enseignant2['id']."&nom=".$enseignant2['intitule']."'><span>".$enseignant2['intitule']."</span></a></td></tr>";

                            }

                            $statement3->closeCursor();

                            }

                            $statement2->closeCursor();
                        
                    
                     unset($connect);?>
                        
                    </thead>
                </table>
            </div>
        </div>
    </main>
    <footer class="board-footer">
        <p>Alexandre CAILLER - Elian</p>
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
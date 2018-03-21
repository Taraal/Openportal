<?php
$id = $_GET['id'];
    $connect = new PDO("mysql:host=localhost;dbname=workshop2", "root", "");
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
    $sql = "SELECT * FROM utilisateurs WHERE id = ". $_GET['id'] ."";
    $statement = $connect->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $row = $statement->fetch();
unset($statement);
unset($connect);
?>


<?php
session_start();

if(isset($_SESSION['email'])) {
    
    $email_session = $_SESSION['email'];
    $bdd = new PDO('mysql:host=localhost;dbname=workshop2;charset=utf8', 'root', '');
                   
            $reponse = $bdd->query("SELECT id FROM utilisateurs WHERE Email ='$email_session'");
                    
            $id_session = $reponse->fetch();
    echo $email_session;
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
            <h3 class="fisrtname"><?php echo $row['Prenom'] ?></h3>
            <h3 class="lastname"><?php echo $row['Nom'] ?></h3>
            <a href="mailto:<?php echo $row['Email']; ?>"><?php echo $row['Email']; ?></a>
        </div>
        <div class="skills">
            <div class="table student">
                <h4>Etudiant</h4>
                <table class="student">
                    <thead>
                        <tr>
                            <th scope="col">Liste des matières</th>
                            <th scope="col">Professeur</th>
                        </tr>
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
                        //<?php 
//                   while ($a <= 10) {
//                        echo '<tr>
//                                <td>'.$row['intitule'].'</td>
//                            </tr>';
//                    }
//                    ?>
                    </thead>
                </table>
            </div>
        </div>
        <?php
        
        // Connexion à la base de données
        try{
            $bdd = new PDO('mysql:host=localhost;dbname=workshop2;charset=utf8', 'root', '');
        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }

        echo $id_session[0];
        echo $id;
        // Récupération des 10 derniers messages
        $reponse = $bdd->query("SELECT Prenom, contenu, to_user_id, from_user_id FROM messages as m JOIN utilisateurs as u ON u.id=m.from_user_id WHERE from_user_id = '$id' AND to_user_id = '$id_session[0]' OR from_user_id = '$id_session[0]' AND to_user_id = '$id' ORDER BY id_message DESC LIMIT 0, 5");

                
        // Affichage de chaque message
        while ($donnees = $reponse->fetch()){
            echo '<p><strong>' . htmlspecialchars($donnees['Prenom']) . '</strong> : ' . htmlspecialchars($donnees['contenu']) . '</p>';
        }

        $reponse->closeCursor();
        ?>
        <form action="../module/traitement-message.php" class="form-horizontal connection_form" method="POST">  
            <input type="text" name="contenu" placeholder=" Votre Message..."  required>
            <input type='hidden' name='to_user_id' value='<?php echo "$id";?>'/> 
            <input type='hidden' name='from_user_id' value='<?php echo "$id_session[0]";?>'/> 
            <input class="boutton" type="submit" value="Envoyer" name="send" >
        </form>
    </main>
    <footer>
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
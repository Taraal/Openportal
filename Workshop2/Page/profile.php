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

if(isset($_SESSION['email'])) {
    
    $email_session = $_SESSION['email'];
    $bdd = new PDO('mysql:host=localhost;dbname=workshop2;charset=utf8', 'root', '');
                   
            $reponse = $bdd->query("SELECT id, Prenom FROM utilisateurs WHERE Email ='$email_session'");
            
            $answer = $reponse->fetch();
            
            $id_session = $answer['id'];
            
            $prenom = $answer['Prenom'];
            
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
    <script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!--___________________ HEADER ___________________-->
    <div class="disconnection">
            <a href="../module/traitement-deconnection.php">
                <img src="img/disconnection.svg" alt="" class="disconnection_icon">
            </a>
    </div>
    <div class="board-access">
            <a href="board.php"><img src="img/board-icon.svg" alt="" class="board_icon"></a>
    </div> 
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
                    </thead>
                        <?php 
                        
                        while ($apprenant = $statement4->fetch()) {

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


<!--__________________________________________ CHAT __________________________________________-->

    <section class="chat-window">
        <h3 class="chat_title">CHAT</h3>
        <div id="chat">
            <?php
            
                // Connexion à la base de données
                    try {
                        $bdd = new PDO('mysql:host=localhost;dbname=workshop2;charset=utf8', 'root', '');
                    } 
                    catch(Exception $e){
                        die('Erreur : '.$e->getMessage());
                    }

                    // Récupération des 10 derniers messages
                    $reponse = $bdd->prepare("SELECT id_message, Prenom, contenu, to_user_id, from_user_id FROM messages as m JOIN utilisateurs as u ON u.id=m.from_user_id WHERE from_user_id = :id AND to_user_id = '$id_session[0]' OR from_user_id = '$id_session[0]' AND to_user_id = :id ORDER BY id_message DESC LIMIT 0, 5");
                    $reponse->execute(array(':id' => $id));
                    $answer = $reponse->fetchAll(PDO::FETCH_ASSOC);
                    
                    foreach ($answer as &$msg) {
                        echo '<p class="id-message-info message_block" data-id="' . $msg['id_message'] . '</p>"><h4 class="name_user">' . htmlspecialchars($msg['Prenom']) . '</h4>' . htmlspecialchars($msg['contenu']) . '</p>';
                    }
                    
                    $reponse->closeCursor();
                ?>

                <div class="send-message-container"> 
                    <input id="message" type="text" name="contenu" placeholder=" Tapez votre message"  class="form-control" required>
                    <input id="to" type='hidden' name='to_user_id' value='<?php echo "$id";?>'/>
                    <input id="my_name" type="hidden" value='<?php echo htmlspecialchars($prenom);?>'/>
                    <input id="from" type='hidden' name='from_user_id' value='<?php echo "$id_session[0]";?>'/> 
                    <div onclick="send()" class="boutton">
                        <button class="btn-send-msg">Envoyer</button>
                    </div>
                </div>

            </div>
        </section>
        <!--____________________________________ FIN CHAT  ____________________________________-->
    </main>
    <section class="chat">
            <div class="chat_button">
                <img src="img/speech-bubble.svg" id="speach_icon" alt="chat">
            </div>
    </section>
    <footer class="board-footer">
        <p>Alexandre CAILLER - Elian BOURDU</p>
        <p>Sylouan CORFA - Anaïs TATIBOUËT</p>
        <p>Workshop 2018 - B1</p>
    </footer>
    <script src="../module/messages.js"></script>
    <script src="js/script.js"></script>
    <script src="js/main.js"></script> 
</body>

</html>
<?php

} else {

header('location: index.php?error1=Vous devez vous connecter pour voir votre profil');

}

?>
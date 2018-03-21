<?php
                       
            $bdd = new PDO('mysql:host=localhost;dbname=workshop2;charset=utf8', 'root', '');
                   
            $reponse = $bdd->query("SELECT id FROM utilisateurs WHERE Email ='$email'");
                    
            $id = $reponse->fetch();
                            
        ?>
        
        
        <?php
        
        // Connexion à la base de données
        try{
            $bdd = new PDO('mysql:host=localhost;dbname=workshop2;charset=utf8', 'root', '');
        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }

        
        // Récupération des 10 derniers messages
        $reponse = $bdd->query("SELECT Prenom, contenu, to_user_id, from_user_id FROM messages as m JOIN utilisateurs as u ON u.id=m.from_user_id WHERE from_user_id = '$id[0]' OR to_user_id = '$id[0]' ORDER BY id_message DESC LIMIT 0, 50");

                
        // Affichage de chaque message
        while ($donnees = $reponse->fetch()){
            echo '<p><strong>' . htmlspecialchars($donnees['Prenom']) . '</strong> : ' . htmlspecialchars($donnees['contenu']) . '</p>';
        }

        $reponse->closeCursor();
        ?>
        
        
        
        <form action="../module/traitement-message.php" class="form-horizontal connection_form" method="POST">  
            <input type="text" name="contenu" placeholder=" Votre Message..."  required>
            <input type='hidden' name='id' value='<?php echo "$id[0]";?>'/> 
            <input class="boutton" type="submit" value="Envoyer" name="send" >
        </form>
        
        
        
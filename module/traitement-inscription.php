<?php

$connect = new PDO("mysql:host=localhost;dbname=workshop2;charset=utf8","root","");
echo 'sdf';
if(isset($_POST['inscription'])) {
    
    if(isset($_POST['nom_register'],$_POST['prenom_register'],$_POST['email_register'],$_POST['email2_register'],$_POST['password_register'],$_POST['password2_register'])) {
        
        if(!empty($_POST['nom_register']) AND !empty($_POST['prenom_register']) AND !empty($_POST['email_register']) AND !empty($_POST['email2_register']) AND !empty($_POST['password_register']) AND !empty($_POST['password2_register'])) {

            $prenom = strip_tags(htmlspecialchars($_POST['prenom_register']));

            $nom = strip_tags(htmlspecialchars($_POST['nom_register']));

            $email = strip_tags(htmlspecialchars($_POST['email_register']));

            $email2 = strip_tags(htmlspecialchars($_POST['email2_register']));

            $password = strip_tags(htmlspecialchars($_POST['password_register']));

            $password2 = strip_tags(htmlspecialchars($_POST['password2_register']));

            if (strlen($prenom) < 100) {

                if (strlen($nom) < 100) {
                    
                    if (strlen($email) < 50) {
                        
                        if (strlen($password) < 50) {
                            
                            if ($email == $email2) {
                                
                                if ($password == $password2) {
                                    
                                    $password =  sha1($password);
                                    
                                    $insert = $connect->prepare("INSERT INTO utilisateurs (Nom,Prenom,Email, Mdp) VALUES (?, ?, ?, ?)");
                                    
                                    $insert->execute(array($nom, $prenom, $email, $password));
                                    
                                    header("location: ./../Page/index.php?good=Vous êtes inscrit");
                                }
                            } else {
                                header("location: ./../Page/index.php?erreur= 15");
                            }
                        } else {
                            header("location: ./../Page/index.php?erreur= 16");
                        }
                    } else {
                        header("location: ./../Page/index.php?erreur= 17");
                    }
                } else {
                    header("location: ./../Page/index.php?erreur= 18");
                }
            } else {
                header("location: ./../Page/index.php?erreur= 19");
            }

            
        }       
    }
}


?>
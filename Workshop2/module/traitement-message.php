<?php
session_start();

$connect = new PDO("mysql:host=localhost;dbname=workshop2;charset=utf8","root","");

$email = $_SESSION['email'];
        
            try{
                $bdd = new PDO('mysql:host=localhost;dbname=workshop2;charset=utf8', 'root', '');
               }

            catch(Exception $e){
                die('Erreur : '.$e->getMessage());
               }
            
            $data = $connect->query("SELECT id FROM utilisateurs WHERE Email ='$email'");
            
            $result = $data->fetch();
            
            $push = $connect->prepare('INSERT INTO messages (id_utilisateur, contenu) VALUES(? , ?)');
$push->execute(array($result[0], $_POST['contenu']));
// Redirection du visiteur vers son profil

header('Location: ../Page/MyProfile.php');
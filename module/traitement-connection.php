<?php
$connect = new PDO("mysql:host=localhost;dbname=workshop2;charset=utf8","root","");
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
session_start();
//session_start();
//$connect = new PDO("mysql:host=localhost;dbname=guillaume;charset=utf8","root","");

if (isset($_POST['connection'])) {

    if (!empty($_POST['email_connection']) AND !empty($_POST['password_connection'])) {

        $email = htmlspecialchars($_POST['email_connection']);

        $password = htmlspecialchars($_POST['password_connection']);

        $password = sha1($password);

        $recorvery_user = $connect->prepare("SELECT * FROM utilisateurs WHERE Email = ? AND Mdp = ?");

        $recorvery_user->execute(array($email,$password));

        if($recorvery_user->rowcount() == 1) {

            $info_user = $recorvery_user->fetch();

            $_SESSION['prenom'] = $info_user['Prenom']; 

            $_SESSION['nom'] = $info_user['Nom'];

            $_SESSION['email'] = $info_user['Email']; 

            $_SESSION['password'] = $info_user['Mdp'];

            header('location: ./../Page/principal.php');

            /*setcookie('email', $recorvery_user->id . '-----' . sha1($recorvery_user->firstname . $recorvery_user->password . $_SERVER['REMOTE_ADDR']);
            time() + 3600 * 24 * 36512, '/', 'localhost', false, true);
            }
            if ($recorvery_user) {
                $_SESSION['email'] = (array)$recorvery_user;*/
                
        } else {
            header('location: ./../Page/index.php?error1=Votre adresse mail ou votre mot de passe sont incorrect');
        }
    } else {
        header('location: ./../Page/index.php?error1=Veuillez remplir tous les champs');
    }

} else {
    header('location: ./../Page/index.php?error1=Requête non soumise');
}

?>
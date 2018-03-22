<?php

header('Content-type: text/HTML');

try{
    $bdd = new PDO('mysql:host=localhost;dbname=workshop2;charset=utf8', 'root', '');
}
catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}

// Récupération des 10 derniers messages
$reponse = $bdd->prepare("SELECT id_message, Prenom, contenu, to_user_id, from_user_id "
        . "FROM messages as m JOIN utilisateurs as u ON u.id=m.from_user_id "
        . "WHERE id_message > :idm AND from_user_id = :ids AND to_user_id = :id "
        . "OR from_user_id = :id AND to_user_id = :ids AND id_message > :idm ORDER BY id_message");

$reponse->execute(array(
    ':id' => $_POST['id'],
    ':idm' => $_POST['maxid'],
    ':ids' => $_POST['ids']
));

$answer = $reponse->fetchAll(PDO::FETCH_ASSOC);

foreach ($answer as &$msg) {
    echo '<p class="id-message-info" data-id="' . $msg['id_message'] . '"><strong>' . htmlspecialchars($msg['Prenom']) . '</strong> : ' . htmlspecialchars($msg['contenu']) . '</p>';
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


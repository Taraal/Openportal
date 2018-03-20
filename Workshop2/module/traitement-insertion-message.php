<?php

$roomid = $_GET['roomid'];

$connect =  new PDO("mysql:host=localhost;dbname=workshop2", "root", "");

$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$message = ;

$insert = $connect->prepare("INSERT INTO chat VALUES (?) ");
    
$insert->execute(array($message));



?>
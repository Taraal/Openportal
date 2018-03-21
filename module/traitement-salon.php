<?php
session_start();

$connect = new PDO("mysql:host=localhost;dbname=workshop2;charset=utf8","root","");

$room = $connect->query('INSERT INTO `salons`(`id_salon`) VALUES (DEFAULT)');

header('Location: ../Page/MyProfile.php');
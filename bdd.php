<?php

    $host = 'localhost'; //adresse de bdd
    $db = 'reseaupaf'; //nom de la base de données
    $user = 'root'; //user de la base de données
    $pass = ''; //mdp de la base de données
    $charset = 'utf8mb4'; //laissez ca

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $pdo = new PDO($dsn, $user, $pass);

?>
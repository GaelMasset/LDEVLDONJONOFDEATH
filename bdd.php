<?php

    $host = 'mysql.info.unicaen.fr'; //adresse de bdd
    $db = 'masset232_0'; //nom de la base de données
    $user = 'masset232'; //user de la base de données
    $pass = 'OnguoZeekoepigh4'; //mdp de la base de données
    $charset = 'utf8mb4'; //laissez ca

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $pdo = new PDO($dsn, $user, $pass);

?>
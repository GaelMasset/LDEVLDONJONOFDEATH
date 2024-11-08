<?php

    $host = 'localhost'; //adresse de bdd
    $db = 'masset_0'; //nom de la base de données
    $user = 'root'; //user de la base de données
    $pass = ''; //mdp de la base de données
    $charset = 'utf8mb4'; //laissez ca
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    try {
        // Connexion à la base de données
        $db = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
        // Définition des attributs de PDO pour afficher les erreurs
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
        exit;
    }

?>
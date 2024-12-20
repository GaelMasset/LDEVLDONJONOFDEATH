<?php
    session_start();
    include_once('bdd.php');

    $classe = isset($_POST['classe']);
    $nom = isset($_POST['nom']);
    $background = isset($_POST['background']);

    //TODO : 
    // faire la requête permettant de créer un nouveau personnage avec les données plus haut

    //Problème : 
    // il faut le lier a l'utilisateur, peut-être en utilisant le session

?>
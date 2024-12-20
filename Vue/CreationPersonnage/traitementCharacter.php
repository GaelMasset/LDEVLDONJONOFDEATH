<?php
    //session_start();
    include_once('bdd.php');
    require 'header/style_header.css';

    if(!(isset($_POST['classe'])) || !(isset($_POST['nom'])) || !(isset($_POST['background']))){
        echo("<p>Quelque chose s'est mal passé</p>");
    }else{

        $classe = $_POST['classe'];
        $nom = $_POST['nom'];
        $background = $_POST['background'];

    }

    if($classe==1){
        $pdo = new PDO($dsn, $user, $pass);
        $requete = $pdo->prepare("insert into hero (name, image, biography, pv, mana, strength, initiative, xp, current_level, idCompte, current_chapter) 
                                    values (.$classe., 'images/Berserker.jpg', .$background., 30, 0, 15, 5, 0, 1, .$_SESSION['id']. , 1)");
        $requete->execute();
    }
    

    //TODO : 
    // faire la requête permettant de créer un nouveau personnage avec les données plus haut

    //Problème : 
    // il faut le lier a l'utilisateur, peut-être en utilisant le session

?>
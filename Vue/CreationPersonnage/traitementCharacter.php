<?php
    //session_start();
    include_once('bdd.php');
    //require 'header/style_header.css';

    if(!(isset($_POST['classe'])) || !(isset($_POST['nom'])) || !(isset($_POST['background']))){
        echo("<p>Quelque chose s'est mal passé</p>");
    }else{

        $classe = $_POST['classe'];
        $nom = $_POST['nom'];
        $background = $_POST['background'];

    }

    if($classe==1){
        try{
            $pdo = new PDO($dsn, $user, $pass);
            $requete = $pdo->prepare("SELECT into hero (name, image, biography, pv, mana, strength, initiative, xp, current_level, idCompte, current_chapter) 
                                        values (.$classe., 'images/Berserker.jpg', .$background., 30, 0, 15, 5, 0, 1, $_SESSION['id'] , 1)");
            $requete->execute();
        }catch (PDOException $e) {
        }
    }

    if($classe==2){
        try{
            $pdo = new PDO($dsn, $user, $pass);
            $requete = $pdo->prepare("SELECT into hero (name, image, biography, pv, mana, strength, initiative, xp, current_level, spell_list, idCompte, current_chapter) 
                                        values (.$classe., 'images/Magician02.jpg', .$background., 10, 30, 5, 10, 0, 1, 'Boule de feu, Soin mineure',$_SESSION['id'] , 1)");
            $requete->execute();
        }catch (PDOException $e) {
        }
    }

    if($classe==3){
        try{
            $pdo = new PDO($dsn, $user, $pass);
            $requete = $pdo->prepare("SELECT into hero (name, image, biography, pv, mana, strength, initiative, xp, current_level, idCompte, current_chapter) 
                                        values (.$classe., 'images/Thief.jpg', .$background., 20, 0, 10, 20, 0, 1, $_SESSION['id'] , 1)");
            $requete->execute();
        }catch (PDOException $e) {
        }
    }

    header('Location: profile');
    exit();
    

    //TODO : 
    // faire la requête permettant de créer un nouveau personnage avec les données plus haut
    // Une par classe

    //Problème : 
    // il faut le lier a l'utilisateur en utilisant le $_SESSION

?>
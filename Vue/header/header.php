<?php
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}

if (isset($_SESSION['date_inscription'])) {
    $date_inscription = $_SESSION['date_inscription'];
}

if (isset($_SESSION['prenom'])) {
    $prenom = $_SESSION['prenom'];
}

if (isset($_SESSION['nom'])) {
    $nom = $_SESSION['nom'];
}

if (isset($_SESSION['age'])) {
    $age = $_SESSION['age'];
}

if (isset($_SESSION['mail'])) {
    $mail = $_SESSION['mail'];
}

if (isset($_SESSION['logged_in'])) {
    $logged_in = $_SESSION['logged_in'];
}

?>

<ul class="nav_bar">
    <li><a href="/LDEVLDONJONOFDEATH">Accueil</a></li>
    <li><a href="apropos">À propos</a></li>
    <li id="connex">
        <?php
        if(isset($_SESSION['username'])) {
            echo'<a href="profile" class="txtLogged"> Bienvenue, '.$username.'</a>';
            echo'<a href="logout" class="txtDeconnexion">Se déconnecter</a>';
        } else{
            echo'<a href="login"> Connexion </a>';
        }
        ?>
    </li>
    <li hidden><a href="#">Compte</a>
    <li>
</ul>

<style>
    <?php require_once 'styles/header.css';?>
</style>
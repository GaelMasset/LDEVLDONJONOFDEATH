<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />





  <!-- Google Fonts !-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jacquarda+Bastarda+9&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Playwrite+DE+Grund:wght@100..400&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">


  <title>Mon profil</title>
</head>
<?php
$username = $_SESSION['username'];
$date_inscription = $_SESSION['date_inscription'];
$prenom = $_SESSION['prenom'];
$nom = $_SESSION['nom'];
$age = $_SESSION['age'];
$mail = $_SESSION['mail'];
$logged_in = $_SESSION['logged_in'];
?>
<main>
<p>Ce site est le fruit du travail de 4 étudiants dans le cadre du projets "DungeonXplorer".</p>
      <p>Pour jouer au jeu, il est nécessaire de s'inscrire et/ou de se connecter.</p>
      <p>Une fois cela fait, retourner sur la page d'accueil et cliquer sur le bouton central permettra de déclencher l'aventure.</p>
      <p>Celle-ci nécessitera de créer son personnage, d'effectuer des choix et de faire des combats</p>
</main>

<style>
<?php 
include __DIR__ . '/../../styles/flexboxs/flexboxsGeneral.css'; 
include __DIR__ . '/../../styles/flexboxs/flexboxsPageProfile.css'; 
include __DIR__ . '/../../styles/styleGeneral.css';  ?>
</style>

</html>
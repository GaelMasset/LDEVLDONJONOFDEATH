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
    <div class="div-2-colonnes-50-50 fondBase txtBlanc">
        <!-- Partie de gauche !-->
        <div class="child-2-colonnes-50-50 bordureDroite bordBlanche">
            <div class="div-2-lignes">
                <div class="child-2-lignes h20">
                    <div class="div-pp-info">
                        <div class="child-pp-info">
                            <img src="images/Logo.png" alt="Mon image" class="imageFullDiv"/>
                        </div>
                        <div class="child-pp-info">
                            <?php
                                echo '<div class="titre1"> Bienvenue, ', $username ,'</div>';
                            ?>
                            <button class="boutonClickable">Accéder au forum</button>
                        </div>
                    </div>
                </div>
                <div class="child-2-lignes hReste">
                    <div class="div-texte-bloc">
                        <div class="child-texte-bloc">
                            <div>
                                <?php
                                if($_SESSION['isAdmin'] == true){
                                    echo'<a class="lienSimple" href="panelAdmin">Panel Administrateur</a><br/>';
                                }
                                ?>
                                <a class="lienSimple" href="modifProfile">Modifier mon compte</a>
                                <br/>
                                <a class="lienSimple" href="#">Supprimer mon compte</a>
                            </div>
                        </div>
                        <div class="child-texte-bloc">
                            <h2 class="titre1">Partie en cours</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Partie de droite !-->
        <div class="child-2-colonnes-50-50 bordureGauche bordBlanche">
            <h1 class="titre1">Statistiques</h1>
        </div>
    </div>

<?php
$pseudo = $_SESSION['username'];
?>
</main>

<style>
<?php 
include __DIR__ . '/../../styles/flexboxs/flexboxsGeneral.css'; 
include __DIR__ . '/../../styles/flexboxs/flexboxsPageProfile.css'; 
include __DIR__ . '/../../styles/styleGeneral.css';  ?>
</style>

</html>
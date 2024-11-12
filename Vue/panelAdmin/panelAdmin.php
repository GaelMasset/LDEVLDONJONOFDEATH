<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
  <link rel="stylesheet" href="style.css" />

  <!-- CSS !-->
  <link rel="stylesheet" href="flexboxs.css" />
  <link rel="stylesheet" href="styleFormulaireAjout.css" />
  <link rel="stylesheet" href="style.css" />


  <!-- Google Fonts !-->
<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">


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
    <div class="div-titre-reste">
        <div class="child-titre-reste">
            <h1 id="titre">Panel Administrateur</h1>
        </div>
        <div class="child-titre-reste">
            <div class="div-gauche-droite">
                <div class="child-gauche-droite">
                    <h2 id="titre">Liste des joueurs</h2>
                    <?php include'gestionJoueurs/listeJoueur.php'?>
                </div>
                <div class="child-gauche-droite">
                    <h2 id="titre">Liste du contenu</h2>

                    <h3>Monstres</h3>
                    <div class="boxMonstres">   
                        <?php include 'gestionMonstres/getMonstres.php'; ?>
                    </div>

                    <h3>Items</h3>
                    <div class="boxMonstres">   
                        <?php include 'gestionItems/getItems.php'; ?>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>



<script></script>
</main>

</html>
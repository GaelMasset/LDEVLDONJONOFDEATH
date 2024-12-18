
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
    <div class="div-titre-reste fondBase txtBlanc">
        <div class="child-titre-reste">
            <h1 class="titre1">Panel Administrateur</h1>
        </div>
        <div class="child-titre-reste">
                    <h2 class="titre3">Liste des joueurs</h2>
                    <?php include'gestionJoueurs/listeJoueur.php'?>
                </div>
                    <h2 class="titre3">Liste du contenu</h2>

                    <h3 class="titre3">Monstres</h3>
                    <div class="boxMonstres">   
                        <?php include 'gestionMonstres/getMonstres.php'; ?>
                    </div>

                    <h3 class="titre3">Items</h3>
                    <div class="boxMonstres">   
                        <?php include 'gestionItems/getItems.php'; ?>
                    </div>

                    <h3 class="titre3">Loots</h3>
                    <div class="boxMonstres">   
                        <?php include 'gestionLoots/getLoots.php'; ?>
                    </div>

                    <h3 class="titre3">Chapitres</h3>
                    <div class="boxMonstres">   
                        <?php include 'gestionChapitres/getChapitres.php'; ?>
                    </div>

                    <h3 class="titre3">Images</h3>
                    <?php include 'images/listeImages.php'; 
                    ?>
                    
                    <h1>Ajouter une image</h1>
                    
                    <form action="uploadImage" method="post" enctype="multipart/form-data" class="form-centre-sobre">
                        <label for="image">Sélectionner une image :</label>
                        <input type="file" name="image" id="image" accept="image/*" required>
                        <br><br>
                        
                        <label for="filename">Nom du fichier :</label>
                        <input type="text" name="filename" id="filename" placeholder="Entrez le nom du fichier" required>
                        <br><br>
                        
                        <button type="submit" name="submit">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



<script></script>
</main>
<style>
<?php 
include __DIR__ . '/../../styles/flexboxs/flexboxsGeneral.css'; 
include __DIR__ . '/../../styles/styleGeneral.css';
include __DIR__ . '/../../styles/styleImages.css';  ?>;
</style>
</html>
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
    <div class="div-stats-profil">
        <!-- Partie de gauche !-->
        <div class="child-stats-profil">
            <div class="div-pp-sous">
                <div class="child-pp-sous">
                    <div class="div-pp-info">
                        <div class="child-pp-info">
                            <img src="Berserker.jpg" id="iconeProfil">
                        </div>
                        <div class="child-pp-info">
                            <?php
                                echo '<div id="pseudo"> Bienvenue, ', $username ,'</div>';
                                echo '<div id="dateCompte"> Compte créé le ', $date_inscription ,'</div>';

                            ?>
                        </div>
                    </div>
                </div>
                <div class="child-pp-sous">
                    aa
                </div>
            </div>
        </div>
        <!-- Partie de droite !-->
        <div class="child-stats-profil">
            
        </div>
    </div>






<?php
$pseudo = $_SESSION['username'];
echo $pseudo;
?>

<script></script>
</main>

</html>
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
    <?php include'../header/header.php'; ?>
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
                                if(ISSET($dateInscription)){
                                    echo '<div id="dateCompte"> Compte créé le ', $date_inscription->format('Y-m-d H:i:s'),'</div>';
                                }
                            ?>
                            <button id="boutonForum">Accéder au forum</button>
                        </div>
                    </div>
                </div>
                <div class="child-pp-sous">
                    <div class="div-modifCompte-reste">
                        <div class="child-modifCompte-reste">
                            <div class="lien">
                                <?php
                                if($_SESSION['isAdmin'] == true){
                                    echo'<a class="lien" href="../panelAdmin/panelAdmin.php">Panel Administrateur</a><br/>';
                                }
                                ?>
                                <a class="lien" href="modifCompte/modifCompte.php">Modifier mon compte</a>
                                <br/>
                                <a class="lien" href="#">Supprimer mon compte</a>
                            </div>
                        </div>
                        <div class="child-modifCompte-reste">
                            <h2>Partie en cours</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Partie de droite !-->
        <div class="child-stats-profil">
            <h1 id="titreDroite">Statistiques</h1>
        </div>
    </div>

<?php
$pseudo = $_SESSION['username'];
?>
<script></script>
</main>

</html>
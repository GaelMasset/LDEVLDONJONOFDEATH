
<!DOCTYPE html>
<html lang="fr">

    <?php

    ?>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Donjon</title>
        <link href="style.css" rel="stylesheet"> 
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pirata One">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    </head>
    <body>
        
        <div id="popupOverlay">
	        <div class="popupContent">
	            <h2>vous venez de sauvegarder</h2>
		        <p>merci</p>
		        <a href="#" id="fermerPop" class="popupLink">Retour à l'accueil</a>
	        </div>
        </div>
        
        <div id="mySidenav" class="sidenav">
            <a id="closeBtn" href="#" class="close">X</a>
            <ul>
                <li><a href="propos.php">A propos</a></li>
                <li><a href="jouer.php">Jouer</a></li>
                <li><a href="#" id="ouvrirPop">Sauvegarder</a></li>
                <li><a href="#">Quitter</a></li>
            </ul>
        </div>

        <a href="#" id="openBtn">
            <span class="burger-icon">
            <span></span>
            <span></span>
            <span></span>
            </span>
        </a>

    <h1 class="titre1 mainTitre">Bienvenue, cher aventurier</h1>

    <form method="POST">
        <button class="boutonAventure" type="submit" name="demander_aventure">Commencer une nouvelle aventure</button>
    </form>
    <script defer src="java.js"></script>

    </body>

    

    <?php
        function commencerAventure() {
            try {
                include 'bdd.php';
                $pdo = new PDO($dsn, $user, $pass);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT count(*) FROM Adventure WHERE idCompte = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id', $_SESSION['id'], PDO::PARAM_STR);
                $stmt->execute();
                $nbAdventure = $stmt->fetchColumn();
                if($nbAdventure > 0){
                    header("Location: profile");
                }
                else{
                    header("Location: accueil");
                }
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['demander_aventure'])) {
            commencerAventure();
        }
    ?>
<style>
    <?php
    include 'styles/styleMenuprincipal.css';
    include 'styles/flexboxs/flexboxsGeneral.css'; 
    include 'styles/styleGeneral.css';
    include 'styles/styleImages.css'; 
    include 'Vue/style.css';
    ?>
    </style>
</html>
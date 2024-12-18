
<!DOCTYPE html>
<html lang="fr">

    <?php
    $nbAdventure=0;
        include 'bdd.php';
        try {
            $pdo = new PDO($dsn, $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT count(*) FROM Hero WHERE idCompte = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $_SESSION['id'], PDO::PARAM_STR);
            $stmt->execute();
            $nbAdventure = $stmt->fetchColumn();
            
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
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

    <h1 class="titre1 mainTitre fade-in">Bienvenue, cher aventurier</h1>

    <form method="POST">
        <button class="boutonAventure fade-in-apres" type="submit" name="demander_aventure">
            <?php
            if($nbAdventure > 0) echo 'Continuer l\'aventure';
            else echo 'Commencer une nouvelle aventure';
            ?>
        </button>
    </form>
    <script defer src="java.js"></script>

    </body>

    

    <?php
        function commencerAventure($nbAdventure) {
            if($nbAdventure == 0){
                //creer une nouvelle aventure
                //Peut etre le truc d'antoine la creation d'un hero je crois
            }
            
            header("Location: aventure");
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['demander_aventure'])) {
            commencerAventure($nbAdventure);
        }
    ?>
<style>
    <?php
    include 'styles/styleMenuprincipal.css';
    include 'styles/flexboxs/flexboxsGeneral.css'; 
    include 'styles/styleGeneral.css';
    include 'styles/styleImages.css';
    include 'styles/animationsGeneral.css'; 
    include 'Vue/style.css';
    ?>
    </style>
</html>
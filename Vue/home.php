
<!DOCTYPE html>
<html lang="fr">

    <?php
    $nbAdventure=0;
        include 'bdd.php';
        try {
            $pdo = new PDO($dsn, $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT count(*) FROM hero WHERE idCompte = :id";
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

    <h1 class="titre1 mainTitre fade-in">Bienvenue, cher aventurier</h1>

    <form method="POST" class="formCentre">
        <button class="boutonAnime fade-in-apres" type="submit" name="demander_aventure">
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
            if(isset($_SESSION['id'])){
                if($nbAdventure == 0){
                    header("Location: character");
                }else{
                    header("Location: aventure");
                }
            }else{
                header("Location: login");
            }
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
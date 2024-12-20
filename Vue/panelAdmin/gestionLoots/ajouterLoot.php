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
  <link rel="stylesheet" href="../CSSForm.css" />
  
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jacquarda+Bastarda+9&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Playwrite+DE+Grund:wght@100..400&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

  <title>Mon profil</title>
</head>

<body>

<?php
$username = $_SESSION['username'];
$date_inscription = $_SESSION['date_inscription'];
$prenom = $_SESSION['prenom'];
$nom = $_SESSION['nom'];
$age = $_SESSION['age'];
$mail = $_SESSION['mail'];
$logged_in = $_SESSION['logged_in'];
$isAdmin = $_SESSION['isAdmin'];
?>

<main>
    <?php
    if($isAdmin == false){
        header("Location: ../profil/pageProfil.php");
    }
    ?>
    

    <h1 class="titre1" id="titre">Ajouter un loot</h1>
<div class="div-form">
    <form class="formulaireAChaqueLigne" action="ajouterLootTraitement" method="POST" class="form-profil">
        <label class="titre2" for="id">Id du loot :</label>
        <input type="number" id="id" name="id" required>

        <label class="titre2" for="name">Nom du loot :</label>
        <input type="text" id="name" name="name" maxlength="32" pattern="[A-Za-zÀ-ÿ\s]+" required>

        <label class="titre2" for="idItem">ID de l'item lié :</label>
        <input type="number" id="idItem" name="idItem" required>

        <label class="titre2" for="qtt">Quantité :</label>
        <input type="number" id="qtt" name="qtt" min="1" required>

        <input type="submit" value="Ajouter le loot">
    </form>
</div>

</div>
</main>

</body>
<style>
<?php 
include __DIR__ . '/../../../styles/flexboxs/flexboxsGeneral.css'; 
include __DIR__ . '/../../../styles/styleGeneral.css';  ?>
</style>

</html>

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

    <?php
    if($isAdmin == false){
        header("Location: ../profil/pageProfil.php");
    }
    ?>
    

    <h1 class="titre" id="titre">Ajouter un monstre</h1>

    <form action="ajouterMonstreTraitement" method="POST" class="form-profil">
        <label for="username">Id du monstre :</label>
        <input type="text" id="id" name="id">

        <label for="username">Nom du monstre :</label>
        <input type="text" id="name" name="name">

        <label for="username">PV :</label>
        <input type="text" id="pv" name="pv">
        
        <label for="username">MANA :</label>
        <input type="text" id="mana" name="mana">

        <label for="username">Initiative :</label>
        <input type="text" id="initiative" name="initiative">

        <label for="username">Force :</label>
        <input type="text" id="strength" name="strength">

        <label for="username">Attaque :</label>
        <input type="text" id="attack" name="attack">

        <label for="username">Id du loot du monstre</label>
        <input type="text" id="loot" name="loot">

        <label for="username">XP a la mort :</label>
        <input type="text" id="xp" name="xp">

        <button type="submit" class="btn">Ajouter le monstre</button>
    </form>


</body>

<style>
<?php 
include __DIR__ . '/../../../styles/flexboxs/flexboxsGeneral.css'; 
include __DIR__ . '/../../../styles/styleGeneral.css';  ?>
</style>
</html>

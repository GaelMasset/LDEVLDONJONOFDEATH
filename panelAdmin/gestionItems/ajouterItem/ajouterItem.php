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
    <?php include '../../../header/header.php'; 
    if($isAdmin == false){
        header("Location: ../profil/pageProfil.php");
    }
    ?>
    

    <h1 class="titre" id="titre">Ajouter un monstre</h1>

    <form action="traitementAjoutItem.php" method="POST" class="form-profil">
        <label for="username">Id de l'item :</label>
        <input type="text" id="id" name="id">

        <label for="username">Nom de l'item :</label>
        <input type="text" id="name" name="name">

        <label for="username">Description de l'item :</label>
        <input type="text" id="description" name="description">

        <button type="submit" class="btn">Ajouter l'item</button>
    </form>
</main>

</body>
</html>

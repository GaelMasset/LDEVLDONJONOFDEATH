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
  <link rel="stylesheet" href="flexboxs.css" />
  
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
?>

<main>
    <?php include '../../header/header.php'; ?>
    
    <h1 class="titreDroite">Modifier votre profil</h1>

    <!-- Formulaire -->
    <form action="updateprofile.php" method="POST" class="form-profil">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" required>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($prenom); ?>" required>

        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($nom); ?>" required>

        <label for="age">Âge :</label>
        <input type="number" id="age" name="age" value="<?php echo htmlspecialchars($age); ?>" required>

        <label for="mail">E-mail :</label>
        <input type="email" id="mail" name="mail" value="<?php echo htmlspecialchars($mail); ?>" required>

        <button type="submit" class="btn">Mettre à jour</button>
    </form>
</main>

</body>
</html>

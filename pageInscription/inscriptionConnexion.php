<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">


<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  

  <!-- CSS du header !-->
  <link rel="stylesheet" href="flexboxs.css" />
  <link rel="stylesheet" href="style.css" />


   <!-- Google Fonts !-->
   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jacquarda+Bastarda+9&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Playwrite+DE+Grund:wght@100..400&display=swap" rel="stylesheet">


  <title>Inscription/Connexion</title>
</head>
<main>
    
    <div class="div-inscr-conn">
        <div class="child-inscr-conn">
            <div class="div-titre-par">
                <div class="child-titre-par">
                    <div class="titre">
                        Inscription
                    </div>
                </div>
                <div class="child-titre-par">
                    <div class="div-form">
                    <form class="formulaireStyle" action="/LDEVLDONJONOFDEATH/pageInscription/traitementInscription.php" method="POST">

                        <label for="username">Pseudo:</label>
                        <input type="text" id="username" name="username" required>

                        <label for="password">Mot de passe:</label>
                        <input type="password" id="password" name="password" required>

                        <label for="mail">Mail:</label>
                        <input type="mail" id="mail" name="mail" required>

                        <label for="prenom">Prenom:</label>
                        <input type="prenom" id="prenom" name="prenom" required>

                        <label for="nom">Nom:</label>
                        <input type="nom" id="nom" name="nom" required>

                        <label for="age">Age:</label>
                        <input type="number" id="age" name="age" min="18" max="65">

                        <input type="submit" value="Inscription">

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="child-inscr-conn">
        <div class="div-titre-par">
                <div class="child-titre-par">
                    <div class="titre">
                            Connexion
                        </div>
                    </div>
                <div class="child-titre-par">
                    <div class="div-form">
                        <form class="formulaireStyle" action="/LDEVLDONJONOFDEATH/pageInscription/traitementConnexion.php" method="POST">
                            <label for="username">Pseudo:</label>
                            <input type="text" id="username" name="username" required>
                            
                            <label for="password">Mot de passe:</label>
                            <input type="password" id="password" name="password" required>
                            
                            <input type="submit" value="Connexion">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

            
                

  <script></script>
</main>

</html>
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

    <h1>bienvenu au titre</h1>

    <script defer src="java.js"></script>

    </body>

    <style>
    <?php
    include 'styles/flexboxs/flexboxsGeneral.css'; 
    include 'styles/styleGeneral.css';
    include 'styles/styleImages.css'; 
    ?>
    </style>

</html>
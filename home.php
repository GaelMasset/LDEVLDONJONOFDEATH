<!DOCTYPE html>
<html lang="fr">

    <?php

    ?>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Donjon</title>
        <link href="style.css" rel="stylesheet"> 
    </head>
    <body>
        <div id="mySidenav" class="sidenav">
            <a id="closeBtn" href="#" class="close">X</a>
            <ul>
                <li><a href="propos.php">A propos</a></li>
                <li><a href="jouer.php">Jouer</a></li>
                <li>
                    <button onClick="togglePopup()">Sauvegarder</button>
                    <div id="popup_overlay">
	                    <div class="popup-content">
	                        <h2>vous venez de sauvegarder</h2>
		                    <p>merci</p>
		                    <a href="/" class="popup-link">Retour à l'accueil</a>
	                    </div>
                    </div>
                </li>
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

    <h1>Sa marche</h1>

    <script defer src="java.js"></script>

    </body>

</html>
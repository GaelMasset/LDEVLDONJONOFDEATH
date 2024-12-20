<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <title>Création de personnage</title>
    </head>
    <body>

        <h2>Création de personnage</h2>
        <p>Soyez prêt à entrer dans le Val Perdu...</p>

        <form id = "CreationPersonnage" method = "POST" action = "traitementCharacter.php">
            <!-- Choix de la classe -->
            <p>Quelle voie choisirez-vous ?</p>

            <label for="optionGuerrier" class="classeOption">
                <img id = "imgGuerrier" alt="La voie du Guerrier" src="images/Berserker.jpg">
                <br />
                La voie du Guerrier
            </label>
            <input name = "classe" type="radio" id="optionGuerrier" value="option1" hidden>

            <label for="optionMage" class="classeOption">
                <img id="imgMage" alt="La voie du Mage" src="images/Magician02.jpg">
                <br />
                La voie du Mage
            </label>
            <input name = "classe" type="radio" id="optionMage" value="option2" hidden>

            <label for="optionVoleur" class="classeOption">
                <img id="imgVoleur" alt="La voie du Voleur" src="images/Thief.jpg">
                <br/>
                La voie du Voleur
            </label>
            <input name = "classe" type="radio" id="optionVoleur" value="option3" hidden>

            <!-- Choix du nom -->
            <p>Quel nom entrera dans la légende ?</p>
            <label for="nomDuPersonnage">Votre nom</label>
            <input name="nom" id="nomDuPersonnage" type="text">
            </br>

            <!-- Possibilité de renseigner un background -->
            <p>Quel est votre histoire, héros ?</p>
            <label for="backgroundPersonnage">Votre background</label>
            <input name="background" id="backgroundPersonnage" type="text">
            </br>

            <button type = "submit" >Je suis prêt !</button>
        </form>
    </body> 
    <script>
        <? include 'header/style_header.css' ?>
        <? include 'style_CreationPersonnage.css' ?>
    </script>
</html>
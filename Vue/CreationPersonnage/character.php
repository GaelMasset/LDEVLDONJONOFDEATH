<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php require '../../header/header.php' ?>
        <link rel="stylesheet" href="style_character.css">
        <title>Création de personnage</title>
    </head>
    <body>

        <h2>Création de personnage</h2>
        <p>Soyez prêt à entrer dans le Val Perdu...</p>

        <form id = "CreationPersonnage" method = "POST" action = "traitementCharacter.php">
            <!-- Choix de la classe -->
            <p>Quelle voie choisirez-vous ?</p>

            <label for="optionGuerrier">La voie du Guerrier
                <img id = "imgGuerrier" alt="La voie du Guerrier" src="../../images/Berserker.jpg">
            </label>
            <input name = "classe" type="radio" id="optionGuerrier" value="option1" hidden>

            <label for="optionMage">La voie du Mage
                <img id="imgMage" alt="La voie du Mage" src="../../images/Magician02.jpg">
            </label>
            <input name = "classe" type="radio" id="optionMage" value="option2" hidden>

            <label for="optionVoleur">La voie du Voleur
                <img id="imgVoleur" alt="La voie du Voleur" src="../../images/Thief.jpg">
            </label>
            <input name = "classe" type="image" id="optionVoleur" value="option3" hidden>

            <!-- Choix du nom -->
            <p>Quel nom entrera dans la légende ?</p></br>
            <label for="nomDuPersonnage">Votre nom</label>
            <input name="nom" id="nomDuPersonnage" type="text">

            <!-- Possibilité de renseigner un background -->
            <p>Quel est votre histoire, héros ?</p></br>
            <label for="backgroundPersonnage">Votre background</label>
            <input name="background" id="backgroundPersonnage" type="text">

            <button type = "submit" >Je suis prêt !</button>
        </form>
    </body> 
</html>
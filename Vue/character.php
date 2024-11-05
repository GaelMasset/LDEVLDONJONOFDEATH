<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php require '../header/header.php' ?>
    </head>
    <body>

        <h2>Création de personnage</h2>
        <p>Soyez prêt à entrer dans le Val Perdu...</p>

        <form>
            <!-- Choix de la classe -->
            <p>Quelle voie choisirez-vous ?</p></br>

            <label for="imgGuerrier">La voie du Guerrier</label>
            <input type="img" id="imgGuerrier" alt="La voie du Guerrier" src="../images/Berserker.jpg">

            <label for="imgMage">La voie du Mage</label>
            <input type="img" id="imgMage" alt="La voie du Mage" src="../images/Magician02.jpg">

            <label for="imgVoleur">La voie du Voleur</label>
            <input type="img" id="imgVoleur" alt="La voie du Voleur" src="../images/Thief.jpg">

            <!-- Choix du nom -->
            <p>Quel nom entrera dans la légende ?</p></br>
            <label for="nomDuPersonnage">Votre nom</label>
            <input id="nomDuPersonnage" type="text"></br>

            <!-- Possibilité de renseigner un background -->
            <p>Quel est votre histoire héros ?</p></br>
            <label for="backgroundPersonnage">Votre nom</label>
            <input id="backgroundPersonnage" type="text"></br>

            <button type = "submit">
        </form>
    </body> 
</html>
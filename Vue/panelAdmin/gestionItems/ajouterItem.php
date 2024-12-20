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

    if(isset($_POST['modifie'])){
        echo'<h1 class="titre1" id="titre">Modifier un item</h1>';
    } else {
        echo'<h1 class="titre1" id="titre">Ajouter un item</h1>';
    }
    ?>
    
    

<div class="div-form">
    <form class="formulaireAChaqueLigne" action="ajouterItemTraitement" method="POST" class="form-profil">
        <label class="titre2" for="id">Id de l'item :</label>
        <input type="number" id="id" name="id" required <?php if(isset($_POST['id'])) echo'value="'.$_POST['id'].'"'; if(isset($_POST['modifie'])) echo'readonly'; ?>>

        <label class="titre2" for="name">Nom de l'item :</label>
        <input type="text" id="name" name="name" maxlength="32" pattern="[A-Za-zÀ-ÿ\s]+" required <?php if(isset($_POST['item_name'])) echo'value="'.$_POST['item_name'].'"' ?>>

        <label class="titre2" for="description">Description de l'item :</label>
        <input type="text" id="description" name="description" maxlength="255" required <?php if(isset($_POST['description'])) echo'value="'.$_POST['description'].'"' ?>>
       
        <label class="titre2" for="description">Image de l'item :</label>
        <input type="text" id="cheminImage" name="cheminImage" maxlength="255" required <?php if(isset($_POST['cheminImage'])) echo'value="'.$_POST['cheminImage'].'"' ?>>
        <input type="hidden" name="modifie" value="<?php $_POST['modifie'] ?>">;
        <?php
        if(isset($_POST['modifie'])){
            echo'<input type="submit" value="Modifier l\'item">';
        } else {
            echo'<input type="submit" value="Ajouter l\'item">';
        }
        ?>
        
    </form>

</div>
</main>

</body>
<style>
<?php 
include __DIR__ . '/../../../styles/flexboxs/flexboxsGeneral.css'; 
include __DIR__ . '/../../../styles/styleGeneral.css';  ?>
</style>
</style>

</html>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Google Fonts !-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jacquarda+Bastarda+9&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Playwrite+DE+Grund:wght@100..400&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">


  <title>Aventure</title>
</head>
<?php
include 'bdd.php';
$username = $_SESSION['username'];
$date_inscription = $_SESSION['date_inscription'];
$prenom = $_SESSION['prenom'];
$nom = $_SESSION['nom'];
$age = $_SESSION['age'];
$mail = $_SESSION['mail'];
$logged_in = $_SESSION['logged_in'];


$pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT content FROM Chapter where id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $_POST['id']]);
    $contenu = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<main>

<h1 class="titre1" id="titre">Editer un chapitre</h1>
<div class="div-form">
    <form class="formulaireAChaqueLigne" action="editerChapitreTraitement" method="POST" class="form-profil">
        <?php echo'<input type="hidden" name="id" value="'.$_POST['id'].'">'; ?>
        <textarea id="content" name="content" rows="4" cols="50">
        <?php echo $contenu['content']; ?>
        </textarea>


        <input type="submit" value="Modifier le chapitre">
    </form>
</div>



</main>

<style>
<?php 
include __DIR__ . '/../../../styles/flexboxs/flexboxsGeneral.css'; 
include __DIR__ . '/../../../styles/flexboxs/flexboxsPageProfile.css'; 
include __DIR__ . '/../../../styles/styleGeneral.css';
include __DIR__ . '/../../../styles/styleAventure.css';  ?>
</style>
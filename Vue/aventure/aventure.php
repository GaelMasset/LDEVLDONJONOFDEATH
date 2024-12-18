<?php
session_start();
?>
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
?>
<main>
  <?php

  $pdo = new PDO($dsn, $user, $pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "SELECT * FROM Hero where idCompte = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['id' => $_SESSION['id']]);
  $hero = $stmt->fetch(PDO::FETCH_ASSOC);

  $sql = "SELECT * FROM Chapter where id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['id' => $hero['current_chapter']]);
  $chapitre = $stmt->fetch(PDO::FETCH_ASSOC);

  $sql = "SELECT * FROM links where chapter_id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['id' => $hero['current_chapter']]);
  $links = $stmt->fetchAll(PDO::FETCH_ASSOC); 
  ?>

  <div class="div-2-lignes">
    <div class="child-2-lignes h80">
      <div class="menu-container">
        <div class="burger" onclick="toggleMenu()">
          <div class="bar"></div>
          <div class="bar"></div>
          <div class="bar"></div>
        </div>

        <div id="menu" class="menu">
          <ul>
            <li><a href="/LDEVLDONJONOFDEATH">Accueil</a></li>
            <li><a href="profile">Profil</a></li>
          </ul>
        </div>
      </div>
      <?php
        echo $chapitre['content'];
      ?>
    </div>
    <div class="child-2-lignes h10">
      <div class="div-3-colonnes-33">
        <?php
          foreach($links as $link) {
            echo '
            <div class="child-3-colonnes-33">
              <form class="formulaireAChaqueLigne" action="updateChapterHero" method="POST" class="form-profil">
                <button class="boutonAdventure">'.$link['description'].'</button>
                <input type="hidden" name="id" value="'.$link['id'].'">
              </form>
            </div>
            ';
          }
        ?>

        
      </div>
    </div>
  




  




</main>

<style>
  <?php
  include __DIR__ . '/../../styles/flexboxs/flexboxsGeneral.css';
  include __DIR__ . '/../../styles/flexboxs/flexboxsPageProfile.css';
  include __DIR__ . '/../../styles/styleGeneral.css';
  include __DIR__ . '/../../styles/styleAventure.css';  ?>
</style>

<script>

function toggleMenu() {
  const menu = document.getElementById('menu');
  menu.style.display = menu.style.display === 'flex' ? 'none' : 'flex';
}

</script>
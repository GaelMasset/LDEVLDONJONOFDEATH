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
$id = $_SESSION['id'];
?>
<main>
  <?php

  $pdo = new PDO($dsn, $user, $pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "SELECT * FROM hero where idCompte = :id";
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

  $sql = "SELECT * FROM `inventory` join Items on inventory.item_id = Items.id join hero on inventory.hero_id = hero.id where hero_id  = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['id' => $hero['id']]);
  $objets = $stmt->fetchAll(PDO::FETCH_ASSOC); 

//Le bouton "utiliser" de l'inventaire pour chaque objet
if(isset($_POST['bout1'])) {
    echo "This is Button1 that is selected";
}

//Le bouton "supprimer", il reload la page pour actualiser l'inventaire
if(isset($_POST['bout2'])) {
  $sql = "DELETE from inventory where idInv = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['id' => $_POST['id']]);
  header('Location: aventure');
}
  ?>
  <div class="div-droite-gauche">
    <!-- partie de gauche (les stats sans doute) !-->
    <div class="child-droite-gauche">
        <!-- Menu burger !-->
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

        <!-- Listes des stats !-->
        <?php
          echo'<lu class="listeStats">';
          echo'<li><label>'.$hero['name'].'</label></li>';
          echo'<li><label>'.'TODO : LA CLASSE'.'</label></li>';
          echo'<li><label>'.$hero['biography'].'</label></li>';
          echo'<li><label>Pv : '.$hero['pv'].'</label></li>';
          echo'<li><label>Mana : '.$hero['mana'].'</label></li>';
          echo'<li><label>Force : '.$hero['strength'].'</label></li>';
          echo'<li><label>Initiative : '.$hero['initiative'].'</label></li>';
          echo'<li><label>Armure : '.$hero['armor'].'</label></li>';
          echo'<li><label>Arme principale : '.'TODO : Arme principale'.'</label></li>';
          echo'<li><label>Arme secondaire : '.'TODO : Arme Secondaire'.'</label></li>';
          echo'<li><label>Bouclier : '.'TODO : Bouclier'.'</label></li>';
          echo'<li><label>XP : '.$hero['xp'].'</label></li>';
          echo'<li><label>Niveau : '.$hero['current_level'].'</label></li>';

          echo'</lu>';
        ?>

        <!-- L'inventaire !-->
        <div class="inventory">
          <button id="showWindowBtn">Inventaire</button>
          <div id="inv" class="window">
            <div class="window-header">
              <h2>Inventaire</h2>
              <span id="closeWindowBtn" class="close-btn">X</span>
            </div>
            <div class="contenu">
              <?php
                foreach ($objets as $objet) {
                  echo '<div class="image-container">';
                  echo '<span class="nomObjet">'.$objet['item_name'].'</span>';?>
                  <form method="post">
                    <input type="submit" name="bout1"
                          value="Utiliser"/>
                    <input type="submit" name="bout2"
                          value="Jeter"/>
                    <?php 
                    echo'<input type="hidden" name="id" value="' . $objet['idInv'] . '">';
                    ?>
                  </form>
                  <?php
                  echo '  <img src="images/' . $objet['cheminImage'] . '" alt="Objet" class="imageInventory">';
                  echo '</div>';
                }                
              ?>
            </div>
          </div>
        </div>
      </div>
    <!-- Partie de droite !-->
    <div class="child-droite-gauche">
      <div class="child-2-lignes h80">
      <!-- Le contenu du chapitre !-->
      <?php
            echo $chapitre['content'];
      ?>
      </div>
      <div class="child-2-lignes h10">  
        <!-- Les 3 boutons !-->      
        <div class="div-3-colonnes-33">
          <?php
            foreach($links as $link) {
            echo '
            <div class="child-3-colonnes-33">
              <form class="formulaireAChaqueLigne" action="updateChapterHero" method="POST" class="form-profil">
                <button class="boutonAnime">'.$link['description'].'</button>
                <input type="hidden" name="id" value="'.$link['id'].'">
              </form>
            </div>
            ';
            }
          ?>
        </div>
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

//Fonction qui fait le menu burger
function toggleMenu() {
  const menu = document.getElementById('menu');
  menu.style.display = menu.style.display === 'flex' ? 'none' : 'flex';
}

const showWindowBtn = document.getElementById('showWindowBtn');
const inv = document.getElementById('inv');
const closeWindowBtn = document.getElementById('closeWindowBtn');

showWindowBtn.addEventListener('click', function() {
  inv.style.display = 'block';
});

closeWindowBtn.addEventListener('click', function() {
  inv.style.display = 'none';
});


</script>